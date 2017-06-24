<?php
/**
 * Cierre de Nomina: Clase estática para procesar el cierre de pre-nóminas
 *
 * @package    Roraima
 * @subpackage nomina
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: CierredeNomina.class.php 39386 2010-07-08 20:48:25Z cramirez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class CierredeNomina
{
  public static function Consulta($codigo,$fecult,$fecpro,&$visible)
  {
  	 $c= new Criteria();
	 $c->add(NpnomcalPeer::CODNOM,$codigo);
	 $c->add(NpnomcalPeer::FECNOM,$fecult,Criteria::GREATER_EQUAL);
	 $c->add(NpnomcalPeer::FECNOM,$fecpro,Criteria::LESS_EQUAL);
	 $c->add(NpnomcalPeer::ESPECIAL,'S',Criteria::NOT_EQUAL);
	 $datos = NpnomcalPeer::doSelectOne($c);
	 if ($datos)
	 { $visible='0';
	  return true;
	 }
	 else
	 { $visible='1';
	 return false;
	 }
 }

 public static function Consulta2($codigo,$fec)
 {
 	$c= new Criteria();
 	$c->add(NphisconPeer::CODNOM,$codigo);
 	$c->add(NphisconPeer::FECNOM,$fec);
 	$c->add(NphisconPeer::ESPECIAL,'S',Criteria::NOT_EQUAL);
 	$resultado= NphisconPeer::doSelectOne($c);
 	if ($resultado)
 	{ return true;}else {return false;}
 }

 public static function procesoCierre($codnomina,$fecha,&$msj, $intpre, &$cod)
 {
   $msj = '';
   $cod='';
   $profecha = Herramientas::getX('CODNOM','Npnomina','Profec',$codnomina);

   if (self::generarNompag($codnomina,date('d/m/Y', strtotime($profecha)),$sobregiro,$intpre, $cod))
   {
	   	if ($intpre=='S')
	   	{
		     $msj = $sobregiro == true ? '497' : '';
		     if ($msj != '497')
		     {
		     	self::cierre($codnomina,$fecha);
		        self::eliminarNpnomcal($codnomina,$profecha);
		     }
	   	}else{
	   		   	self::cierre($codnomina,$fecha);
		        self::eliminarNpnomcal($codnomina,$profecha);
	   	}
   }
   else
   {
     $msj='1'; //La Nómina no puede ser Cerrada
   }
 }

 public static function generarNompag($codnomina,$fecha,&$sobregiro,$intpre, &$cod)
 {
   self::eliminarCierre($codnomina,$fecha);
   if(self::generar($codnomina,$fecha,$sobregiro,$intpre,$cod))
   { return true;}
   else {return false;}
 }

 public static function eliminarCierre($codnomina,$fecha)
 {
   $dateFormat = new sfDateFormat('es_VE');
   $fecha = $dateFormat->format($fecha, 'i', $dateFormat->getInputPattern('d'));

   $c= new Criteria();
   $c->add(NpcienomPeer::CODNOM,$codnomina);
   $c->add(NpcienomPeer::FECNOM,$fecha);
   $c->add(NpcienomPeer::ESPECIAL,'N');
   NpcienomPeer::doDelete($c);
   /*$resul= NpcienomPeer::doSelect($c);
   if ($resul)
   {
   	 foreach ($resul as $update)
   	 {
   	   $update->delete();
   	 }
   }*/
 }

 public static function generar($codnomina,$fecha,&$sobregiro=false, $intpre='N', &$cod="")
 {
   $dateFormat = new sfDateFormat('es_VE');
   $fecha = $dateFormat->format($fecha, 'i', $dateFormat->getInputPattern('d'));
   $anopresu = substr(Herramientas :: getX('codemp', 'cpdefniv', 'fecper', '001'), 0, 4);
   $mes= substr($fecha,5,2);
   $variable=array();
   $actsqlnew=H::getConfApp2('actsqlnew','nomina','nomnomcienom');
   $cod="";
   /*if ($actsqlnew=='S')
   {*/


       $sql="Select Z.* from (
			select a.codnom,a.codcon,a.fecnom,
			categoriaemp(a.codnom,a.codemp,a.codcar,a.codcon)||'-'||partidaconcepto(a.codcon,a.codnom,a.codcar) as codpre,
			'1' as codcta,sum(saldo) as monto,a.asided,c.codtipgas,sum(a.cantidad) as cantidad,
			(CASE when B.CodTipPag='01' then b.Codban else b.Codemp end) as codigobancario,
			a.especial,a.codnomesp,a.nomnomesp
			from npnomcal a,nphojint b,npasicaremp c,npdefcpt d
			where
			a.codnom=c.codnom and
			a.codemp=c.codemp and
			a.codcar=c.codcar and
			a.codemp=b.codemp and
			a.codcon=d.codcon and
			a.codnom='".$codnomina."' and
			fecnom='".$fecha."' And
			c.status='V' and
			d.ordpag='S' and
			d.impcpt=(case when a.asided='P' then impcpt else 'S' end) and
			especial='N'
			group by
			a.codnom,a.codcon,a.fecnom,
			categoriaemp(a.codnom,a.codemp,a.codcar,a.codcon)||'-'||partidaconcepto(a.codcon,a.codnom,a.codcar),
			a.asided,c.codtipgas,(CASE when B.CodTipPag='01' then b.Codban else b.Codemp end),
			a.especial,a.codnomesp,a.nomnomesp) Z,CPDEFTIT W
			WHERE Z.CODPRE=W.CODPRE
			ORDER BY ASIDED,CODPRE";
		if (Herramientas::BuscarDatos($sql,$result))
		{
		  // Inicializamos la memoria
			$t = count($result);
			$limit_mem='128M';
			if ($t>100 && $t<450)
			  $limit_mem='512M';
			else if ($t>=450 && $t<900)
			  $limit_mem='1024M';
			else if ($t>=900)
			   $limit_mem=-1;

		    ini_set("memory_limit",$limit_mem);

		  if ($intpre=='S') {  //Validar Presupuesto
			   foreach ($result as $regnew1)
		       {
			      if (Herramientas::Monto_disponible_ejecucion($anopresu,$regnew1['codpre'],$mes,$mondis))
			      {
			        if ($regnew1['monto'] > $mondis){
	                  $sobregiro = true;
	                  $cod=$regnew1['codpre'];
			          break;
			        }
			       }else{
			      	$sobregiro = true; //Esto nunca deberia suceder, pero se coloco para su validacion
	                        $cod=$regnew1['codpre'];
			      	break;
			      }
			   }
		  }
		}

    if($sobregiro!= true)
	{
	   	$sql1="insert into npcienom
			(codnom,codcon,fecnom,codpre,codcta,monto,asided,codtipgas,cantidad,codban,especial,codnomesp,nomnomesp)
			Select Z.* from
			(
			select a.codnom,a.codcon,a.fecnom,
			categoriaemp(a.codnom,a.codemp,a.codcar,a.codcon)||'-'||partidaconcepto(a.codcon,a.codnom,a.codcar) as codpre,
			'1'::text as codcta,sum(saldo) as monto,a.asided,c.codtipgas,sum(a.cantidad) as cantidad,
			(CASE when B.CodTipPag='01' then b.Codban else b.Codemp end) as codigobancario,
			a.especial,a.codnomesp,a.nomnomesp
			from npnomcal a,nphojint b,npasicaremp c,npdefcpt d
			where
			a.codnom=c.codnom and
			a.codemp=c.codemp and
			a.codcar=c.codcar and
			a.codemp=b.codemp and
			a.codcon=d.codcon and
			a.codnom='".$codnomina."' and
			fecnom='".$fecha."' And
			c.status='V' and
			d.ordpag='S' and
			d.impcpt=(case when a.asided='P' then impcpt else 'S' end) and
			especial='N'
			group by
			a.codnom,a.codcon,a.fecnom,
			categoriaemp(a.codnom,a.codemp,a.codcar,a.codcon)||'-'||partidaconcepto(a.codcon,a.codnom,a.codcar),
			a.asided,c.codtipgas,(CASE when B.CodTipPag='01' then b.Codban else b.Codemp end),
			a.especial,a.codnomesp,a.nomnomesp) Z,CPDEFTIT W
			WHERE Z.CODPRE=W.CODPRE
			ORDER BY ASIDED,CODPRE";
		Herramientas::insertarRegistros($sql1);
        $gencom=H::getConfApp2('gencom', 'nomina', 'nomnomcienom');
		if ($gencom=='S')
		  self::generarCompromisoNomina($codnomina,$fecha);
		return true;
	}else return false;

   /*}else {
	   $c= new Criteria();
	   $c->add(NpnomcalPeer::CODNOM,$codnomina);
	   $c->add(NpnomcalPeer::SALDO,0,Criteria::NOT_EQUAL);
	   $c->add(NpnomcalPeer::ESPECIAL,'N');
	   $resultados= NpnomcalPeer::doSelect($c);
	   if ($resultados)
	   {
	   	foreach ($resultados as $npnomcal)
	   	{
	   	 $sql="Select A.codemp as codemp,A.codcar as codcar,A.codnom as codnom,A.codcat as codcat,A.fecasi as fecasi,A.nomemp as nomemp,A.nomcar as nomcar,A.nomnom as nomnom,A.nomcat as nomcat,A.unieje as unieje,A.sueldo as sueldo,A.status as status,A.nronom as nronom,A.montonomina as montonomina,A.codtip as codtip,A.codtipgas as codtipgas,A.codniv as codniv,A.grado as grado,A.paso as paso,
	      (CASE when C.CodTipPag='01' then C.Codban else C.Codemp end) as codigobancario
	      From NPAsiCarEmp A,NPHOJINT C Where
	      A.CodNom = '".$npnomcal->getCodnom()."' And
	      A.CodCar = '" .$npnomcal->getCodcar()."'   And
	      A.CodEmp = '" .$npnomcal->getCodemp()."' And
	      A.Status = 'V' And A.CODEMP = C.CODEMP";

	   	 if (Herramientas::BuscarDatos($sql,$result))
		 {

		   $b= new Criteria();
		   $b->add(NpdefcptPeer::CODCON,$npnomcal->getCodcon());
		   $dato= NpdefcptPeer::doSelectOne($b);
		   if ($dato)
		   {
			$sql  ="select
						categoriaemp('".$npnomcal->getCodnom()."','".$npnomcal->getCodemp()."','".$npnomcal->getCodcar()."','".$npnomcal->getCodcon()."') as categoria,
						partidaconcepto('".$npnomcal->getCodcon()."','".$npnomcal->getCodnom()."','".$npnomcal->getCodcar()."') as partida
					from
					empresa";

	   		if (Herramientas::BuscarDatos($sql,$resul))
		   	{
		   		$codpre = $resul[0]["categoria"].'-'.$resul[0]["partida"];
		   	}

		   	 if (($dato->getOrdpag()=='S' && $dato->getImpcpt()=='S' && ($dato->getOpecon()=='A' || $dato->getOpecon()=='D'))||($dato->getOrdpag()=='S' && $dato->getOpecon()=='P'))
		   	 {
		   	 	$genord=true;
		   	 }else {$genord=false;}

		   	 if ($genord==true)
		   	 {
		   	   $s= new Criteria();
		   	   $s->add(CpdeftitPeer::CODPRE,$codpre);
		   	   $data=CpdeftitPeer::doSelectOne($s);
		   	   if ($data)
		   	   {
		   	   	 $t= new Criteria();
		   	   	 $t->add(NpcienomPeer::CODTIPGAS,$result[0]['codtipgas']);
		   	   	 $t->add(NpcienomPeer::CODPRE,$codpre);
		   	   	 $t->add(NpcienomPeer::CODCON,$npnomcal->getCodcon());
		   	   	 $t->add(NpcienomPeer::CODNOM,$codnomina);
		   	   	 $t->add(NpcienomPeer::ASIDED,$npnomcal->getAsided());
		   	   	 $t->add(NpcienomPeer::FECNOM,$npnomcal->getFecnom());
		   	   	 $t->add(NpcienomPeer::CODBAN,$result[0]['codigobancario']);
		   	   	 $resultado=NpcienomPeer::doSelectOne($t);
		   	   	 if (count($resultado)>0)
		   	   	 {
		   	       $resultado->setMonto($resultado->getMonto() + $npnomcal->getSaldo());
		   	       $variable[]=$resultado;
		   	   	 }
		   	   	 else
		   	   	 {
		   	   	 	$npcienom = new Npcienom();
		   	   	 	$npcienom->setCodnom($npnomcal->getCodnom());
		   	   	 	$npcienom->setCodcon($npnomcal->getCodcon());
		   	   	 	$npcienom->setFecnom($npnomcal->getFecnom());
		   	   	 	$npcienom->setEspecial($npnomcal->getEspecial());
		   	   	 	$npcienom->setCodpre($codpre);
		   	   	 	$npcienom->setCodcta('1');
		   	   	 	$npcienom->setMonto($npnomcal->getSaldo());
		   	   	 	$npcienom->setCantidad($npnomcal->getCantidad());
		   	   	 	$npcienom->setAsided($npnomcal->getAsided());
		   	   	 	$npcienom->setCodtipgas($result[0]['codtipgas']);
		   	   	 	$npcienom->setCodban($result[0]['codigobancario']);
		   	   	 	$variable[]=$npcienom;
		   	   	 }
		   	   }
		   	 }
		   }
		 }
	   	}
			     ////  Validar contra Presupuesto  ////
   	 if ($intpre=='S')
   	 {
	   	foreach ($variable as $grabar)
	   	{
	      if (Herramientas::Monto_disponible_ejecucion($anopresu,$grabar->getCodpre(),$mes,$mondis))
	      {
	        if ($grabar->getMonto() > $mondis){
                        $sobregiro = true;
	          break;
	        }
	       }else{
	      	$sobregiro = true; //Esto nunca deberia suceder, pero se coloco para su validacion
	      	 break;
	      }
		 }
	 }

		if($sobregiro!= true)
		{
		   	foreach ($variable as $grabar)
		   	{
		       	$grabar->save();
		    }

		    unset($npnomcal);
		    unset($result);
		    unset($dato);
		    unset($data);
		    unset($resultado);
		    unset($grabar);

	   	return true;
	   }else return false;
	 } else {return false;}
   }*/
 }

 public static function cierre($codnomina,$fecha)
 {
  $actsqlnew=H::getConfApp2('actsqlnew','nomina','nomnomcienom');

  //if ($actsqlnew=='S')
  //{
	    $sql1="INSERT INTO NPHISCON (codnom,codemp, codcar, codcon, fecnom, monto, codcat, codpar, codescuela, codniv, codtipgas,
		nomcon, numrec, cantidad, fecnomdes, especial, fecnomespdes, fecnomesphas,
		codnomesp, nomnomesp, codban,nomban,cuenta_banco,nomemp,cedemp,nomcar,desniv,nomcat, asided, varia, codtippag, impcpt, ordpag, afepre, codtipemp, nomnom, moncar)
		SELECT A.CodNom,A.CodEmp,A.CodCar,A.CodCon,A.FecNom,A.Saldo,categoriaemp(A.CodNom,A.CodEmp,A.CodCar,A.CodCon),partidaconcepto(A.CodCon,A.CodNom,A.CodCar),
		''::text AS ESCUELA,D.CodNiv,B.CODTIPGAS,
		C.NOMCON,A.NUMREC,A.CANTIDAD,A.FECNOMDES,A.ESPECIAL,A.FECNOMESPDES,A.FECNOMESPHAS,A.CODNOMESP,A.NOMNOMESP,
		(CASE when D.CodTipPag='01' then D.Codban else D.Codemp end) as codigobancario,
		(CASE when D.CodTipPag='01' then (select nomban from npbancos where codban=d.codban) else D.nomemp end) as nombanco,
		d.numcue,d.nomemp,d.cedemp,b.nomcar,(select desniv from npestorg where codniv=d.codniv) as desniv,b.nomcat,A.asided, A.varia, D.codtippag, C.impcpt, C.ordpag, C.afepre, B.codtipemp, A.nomnom, F.suecar
		FROM NPNOMCAL A,NPASICAREMP B,NPDEFCPT C,NPHOJINT D, NPCARGOS F
		WHERE
		A.CODNOM=B.CODNOM AND
		A.CODEMP=B.CODEMP AND
		A.CODEMP=D.CODEMP AND
		A.CODCAR=B.CODCAR AND
		A.CODCON=C.CODCON AND
		A.CODCAR=F.CODCAR AND
		A.CODNOM='".$codnomina."' AND
		A.ESPECIAL='N' AND
		A.SALDO>0 AND
		C.ACUHIS='S' AND
		B.STATUS='V'";

		Herramientas::insertarRegistros($sql1);

 /* }else {
	//Para Conceptos que no estan asociados a Categorias Especiales
	  $sql1="Insert into Nphiscon    (codnom,codemp, codcar, codcon, fecnom, monto, codcat, codpar, codescuela, codniv, codtipgas, nomcon, numrec, cantidad, fecnomdes, especial, fecnomespdes, fecnomesphas,
				     codnomesp, nomnomesp, codban )
	  		(SELECT A.CodNom,A.CodEmp,A.CodCar,A.CodCon,A.FecNom,A.Saldo,categoriaemp(A.CodNom,A.CodEmp,A.CodCar,A.CodCon),partidaconcepto(A.CodCon,A.CodNom,A.CodCar),'',D.CodNiv,B.CODTIPGAS,C.NOMCON,A.NUMREC,A.CANTIDAD,A.FECNOMDES,A.ESPECIAL,A.FECNOMESPDES,A.FECNOMESPHAS,'','',(CASE when D.CodTipPag='01' then D.Codban else D.Codemp end) as codigobancario
	   FROM NPNOMCAL A,NPASICAREMP B,NPDEFCPT C,NPHOJINT D
	   WHERE A.CODNOM='".$codnomina."' AND A.ESPECIAL='N' AND
	   A.SALDO>0 AND A.CODEMP=B.CODEMP AND
	   A.CODNOM=B.CODNOM AND A.CODCAR=B.CODCAR AND
	   A.CODCON=C.CODCON AND A.CODEMP=D.CODEMP AND  C.ACUHIS='S' AND B.STATUS='V'  AND
	   A.CODCON NOT IN (SELECT CODCON FROM NPCONCEPTOSCATEGORIA) AND
	   A.CODCON NOT IN (SELECT CODCON FROM NPASICATCONEMP))";

	  Herramientas::insertarRegistros($sql1);


	//Para Conceptos que estan asociados a Categorias Especiales
	  $sql2="Insert into Nphiscon  (codnom,codemp, codcar, codcon, fecnom, monto, codcat, codpar, codescuela, codniv, codtipgas, nomcon, numrec, cantidad, fecnomdes, especial, fecnomespdes, fecnomesphas,
				     codnomesp, nomnomesp, codban )   (SELECT A.CodNom,A.CodEmp,A.CodCar,A.CodCon,A.FecNom,A.Saldo,categoriaemp(A.CodNom,A.CodEmp,A.CodCar,A.CodCon),partidaconcepto(A.CodCon,A.CodNom,A.CodCar),'',D.CodNiv,B.CODTIPGAS,C.NOMCON,A.NUMREC,A.CANTIDAD,A.FECNOMDES,A.ESPECIAL,A.FECNOMESPDES,A.FECNOMESPHAS,'','',(CASE when D.CodTipPag='01' then D.Codban else D.Codemp end) as codigobancario
	     FROM NPNOMCAL A,NPASICAREMP B,NPDEFCPT C,NPHOJINT D,NPCONCEPTOSCATEGORIA E
	       WHERE A.CODNOM='".$codnomina."' AND A.ESPECIAL='N' AND
	       A.SALDO>0 AND A.CODEMP=B.CODEMP AND
	       A.CODNOM=B.CODNOM AND A.CODCAR=B.CODCAR AND
	       C.ACUHIS='S'  AND B.STATUS='V' AND A.CODCON=C.CODCON AND
	       A.CODEMP=D.CODEMP AND A.CODCON=E.CODCON AND
	       A.CODCON NOT IN (SELECT CODCON FROM NPASICATCONEMP))";

	    Herramientas::insertarRegistros($sql2);

	 //Para Conceptos que estan asociados a Categorias Especiales
	 $sql3="Insert into Nphiscon (codnom,codemp, codcar, codcon, fecnom, monto, codcat, codpar, codescuela, codniv, codtipgas, nomcon, numrec, cantidad, fecnomdes, especial, fecnomespdes, fecnomesphas,
				     codnomesp, nomnomesp, codban ) (SELECT A.CodNom,A.CodEmp,A.CodCar,A.CodCon,A.FecNom,A.Saldo,categoriaemp(A.CodNom,A.CodEmp,A.CodCar,A.CodCon),partidaconcepto(A.CodCon,A.CodNom,A.CodCar),'',D.CodNiv,B.CODTIPGAS,C.NOMCON,A.NUMREC,A.CANTIDAD,A.FECNOMDES,A.ESPECIAL, A.FECNOMESPDES,A.FECNOMESPHAS,'','',(CASE when D.CodTipPag='01' then D.Codban else D.Codemp end) as codigobancario
	     FROM NPNOMCAL A,NPASICAREMP B,NPDEFCPT C,NPHOJINT D,NPASICATCONEMP E
	       WHERE A.CODNOM='".$codnomina."' AND A.ESPECIAL='N' AND
	       A.SALDO>0 AND A.CODEMP=B.CODEMP AND
	       A.CODNOM=B.CODNOM AND A.CODCAR=B.CODCAR AND  C.ACUHIS='S' AND B.STATUS='V' AND
	       A.CODCON=C.CODCON AND A.CODEMP=D.CODEMP AND A.CODCON=E.CODCON AND A.CODEMP=E.CODEMP AND
	       A.CODCON NOT IN (SELECT CODCON FROM NPCONCEPTOSCATEGORIA))";

	    Herramientas::insertarRegistros($sql3);
}*/

//Inicialización de Conceptos
  $sql4="update npasiconemp set monto=0, cantidad=0 where codemp||codcar||codcon in (select a.codemp ||a.codcar||b.codcon from npasicaremp a,npdefmov b,npdefcpt c where b.codnom='".$codnomina."' and
  c.inimon='S' and b.codcon=c.codcon and a.codnom=b.codnom and a.status='V')";

 Herramientas::insertarRegistros($sql4);

//Actualización de Prestamos
   //if ($actsqlnew=='S')
   	   $sql5="select * from Nptippre a,(select distinct codcon from npnomcal where codnom='".$codnomina."') b where a.codcon=b.codcon";
   	/*else
   		$sql5="select * from Nptippre where codcon in (select codcon from npnomcal where codnom='".$codnomina."')";*/
   if (Herramientas::BuscarDatos($sql5,$resul5))
   {
	 foreach ($resul5 as $regnew5)
	 {
	 	$c= new Criteria();
	 	$c->add(NpasiconempPeer::CODCON,$regnew5['codcon']);
	 	$c->addAscendingOrderByColumn(NpasiconempPeer::CODEMP);
	 	$reg2= NpasiconempPeer::doSelect($c);
	 	if ($reg2)
	 	{
	 		foreach ($reg2 as $npasiconemp)
	 		{
	 		  $d= new Criteria();
	 	      $d->add(NpnomcalPeer::CODNOM,$codnomina);
	 	      $d->add(NpnomcalPeer::CODEMP,$npasiconemp->getCodemp());
	 	      $d->add(NpnomcalPeer::CODCAR,$npasiconemp->getCodcar());
	 	      $d->add(NpnomcalPeer::CODCON,$npasiconemp->getCodcon());
	 	      $reg3=NpnomcalPeer::doSelectOne($d);
	 	      if ($reg3)
	 	      {
	 	      	$monpre=$reg3->getSaldo();
	 	      	$saldo=$npasiconemp->getAcumulado()-$reg3->getSaldo();
	 	      	$npasiconemp->setAcumulado($saldo);
	 	      	if ($saldo<0)
	 	      	{
	 	      	  $monpre=$npasiconemp->getAcumulado()-$reg3->getSaldo();
	 	      	  $saldo=0;
	 	      	  $npasiconemp->setCantidad(0);
	 	      	  $npasiconemp->setAcumulado(0);
	 	      	}
	 	      	else
	 	      	{
	 	      	  if ($saldo<=$monpre)
	 	      	  {
	 	      	  	$npasiconemp->setCantidad($saldo);
	 	      	  }
	 	      	}
	 	      	$npasiconemp->save();

	 	      	if ($monpre>0)
	 	      	{
	 	      	 $nphispre= new Nphispre();
	 	      	 $nphispre->setCodemp($npasiconemp->getCodemp());
	 	      	 $nphispre->setCodtippre($regnew5['codtippre']);
	 	      	 $nphispre->setFechispre($reg3->getFecnom());
	 	      	 $nphispre->setDeshispre('Abono a Préstamo por Nómina');
	 	      	 $nphispre->setMonpre($monpre*(-1));
	 	      	 $nphispre->setSaldo($saldo);
	 	         $nphispre->save();
	 	        }
	 	      }
	 		}
	 	 }
	  }
   }
   unset($regnew5);
   unset($npasiconemp);
   unset($reg3);
   unset($nphispre);

//Actualizaciones de Vacaciones
  $sql6="Update Npvacregsal set Stavac='S' where codemp||codnom in
(Select CodEmp||codnom From  NPVACREGCALNOM b Where b.CodNom='".$codnomina."') and stavac='N'";

  Herramientas::insertarRegistros($sql6);
  $fecha = Herramientas::getX('CODNOM','Npnomina','Profec',$codnomina);
  //if ($actsqlnew=='S')
  //{
  	$sql7="update nphojint set staemp='V'
        where codemp in (select codemp from npvacsalidas where fecsalnom=to_date('".$fecha."','yyyy-mm-dd')) and
	      StaEmp='A' and
	      (select pagoad from npvacdefgen where codnomvac='".$codnomina."' limit 1)='S'";
	//print $sql7;exit;
    Herramientas::insertarRegistros($sql7);
  //}

//Actualizacion de fechas
   $u= new Criteria();
   $u->add(NpnominaPeer::CODNOM,$codnomina);
   $registros= NpnominaPeer::doSelectOne($u);
   if ($registros)
   {
   	 if (!is_null($registros->getNumsem()))
   	 {
   	 	$registros->setNumsem($registros->getNumsem()+1);
   	 }
   	 $fecha2=Herramientas::dateAdd('d',1,$registros->getProfec(),'+');
   	 $registros->setUltfec($fecha2);

   	 switch($registros->getFrecal())
     {
	   case 'S':
		 $intervalo='ww';
		 $cant=1;
      	 break;
	   case  'Q':
	   	 $intervalo='d';
		 $cant=15;
		 $ultfec=split('-',$registros->getUltfec());
		 $tal= $ultfec[0].'-'.$ultfec[1].'-'.'01';
   	     $fec2=Herramientas::dateAdd('d',13,$registros->getUltfec(),'+');
   	     $feccompara=split('-',$fec2);
         $fechafin=Herramientas::dateAdd('d',1,(Herramientas::dateAdd('m',1,$tal,'+')),'-');
   	     if ((intval($ultfec[2])>15) && (intval($ultfec[1])==intval($feccompara[1])))
   	     {
   	     	$cant=48;
   	     	$registros->setProfec($fechafin);
   	     }

         if ((intval($ultfec[2])>15) && (intval($ultfec[1])==2))
   	     {
   	     	$cant=48;
   	     	$registros->setProfec($fechafin);
   	     }
		 break;
	   case ('M' || 'A'):
		 $intervalo='m';
		 $cant=1;
		 $ultfec=split('-',$registros->getUltfec());
		 if ((intval($ultfec[1])==2) && (intval($ultfec[2])==1))
		 {
		   $fec2=Herramientas::dateAdd('d',28,$registros->getUltfec(),'+');
   	       $feccompara=split('-',$fec2);
   	       if (intval($feccompara[1])==3)
   	       {
   	       	 $intervalo='d';
		     $cant=28;
   	       }
   	       else
   	       {
   	       	 $intervalo='d';
		     $cant=29;
   	       }
		 }
		 $fec3=Herramientas::dateAdd('d',1,$registros->getUltfec(),'+');
   	     $feccompara2=split('-',$fec3);
		 if ((intval($ultfec[1])==2) && (intval($feccompara2[1])==3))
		 {
		   $intervalo='d';
		   $cant=31;
		 }

		 if ((intval($ultfec[1])==4) || (intval($ultfec[1])==6) || (intval($ultfec[1])==9) || (intval($ultfec[1])==11) || (intval($ultfec[2])==30))
		 {
		   $intervalo='d';
		   $cant=31;
		 }

         if ((intval($ultfec[1])==3) || (intval($ultfec[1])==5) || (intval($ultfec[1])==7) || (intval($ultfec[1])==10) || (intval($ultfec[1])==12) || (intval($ultfec[2])==31))
		 {
		   $intervalo='d';
		   $cant=30;
		 }
      	 break;
	 }

	 if ($cant!=48)
	 { $registros->setProfec(Herramientas::dateAdd('d',1,(Herramientas::dateAdd($intervalo,$cant,$registros->getUltfec(),'+')),'-'));}

	 $registros->save();
   }
   unset($registros);
 }

 public static function eliminarNpnomcal($codnomina,$fecnom)
 {
   $c= new Criteria();
   $c->add(NpnomcalPeer::CODNOM,$codnomina);
   $c->add(NpnomcalPeer::FECNOM,$fecnom);
   $c->add(NpnomcalPeer::ESPECIAL,'N');
   NpnomcalPeer::doDelete($c);
 }


 public static function Validarcodprenominav2($codnomina,$fecha,&$sobregiro=false, $intpre = 'N'){
     $anopresu = substr(Herramientas :: getX('codemp', 'cpdefniv', 'fecper', '001'), 0, 4);
     $sql="select a.*
            from
            (SELECT categoriaemp(a.codnom,a.codemp,a.codcar,a.codcon)||'-'||partidaconcepto(a.codcon,a.codnom,a.codcar) as codpre,
            sum(case when b.opecon='D' then a.saldo*-1 else a.saldo end) as saldo
            FROM NPNOMCAL a,npdefcpt b
            WHERE a.CODNOM='".$codnomina."'
            AND a.SALDO <> 0 AND
            a.ESPECIAL='N' and
            ((b.ordpag='S' and b.impcpt='S' and (b.opecon='A' or b.opecon='D'))
            or
            (b.ordpag='S' and opecon='P')) and
            a.codcon=b.codcon
            group by  categoriaemp(a.codnom,a.codemp,a.codcar,a.codcon),partidaconcepto(a.codcon,a.codnom,a.codcar)) a,cpasiini b
            where b.perpre='00'
            and b.anopre='".$anopresu."'
            and a.codpre=b.codpre
            group by a.codpre,a.saldo
            having a.saldo>sum(monasi +
                  coalesce(obtener_ejecucion(rtrim(a.codpre),'01','12',b.anopre,'TRA'),0) +
                  coalesce(obtener_ejecucion(rtrim(a.codpre),'01','12',b.anopre,'ADI'),0) -
                  coalesce(obtener_ejecucion(rtrim(a.codpre),'01','12',b.anopre,'TRN'),0) -
                  coalesce(obtener_ejecucion(rtrim(a.codpre),'01','12',b.anopre,'DIS'),0) -
                  coalesce(obtener_ejecucion(rtrim(a.codpre),'01','12',b.anopre,'PRC'),0)) ";
     if (Herramientas::BuscarDatos($sql,$result)) {
         $sobregiro = true;
     }

     unset($result);

     return true;
 }

 public static function Validarcodprenomina($codnomina, $fecha, &$sobregiro=false, $intpre = 'N') {
        $dateFormat = new sfDateFormat('es_VE');
        $fecha = $dateFormat->format($fecha, 'i', $dateFormat->getInputPattern('d'));
        $anopresu = substr(Herramientas :: getX('codemp', 'cpdefniv', 'fecper', '001'), 0, 4);
        $mes = substr($fecha,5,2);
        $variable = array();

        $c = new Criteria();
        $c->add(NpnomcalPeer::CODNOM, $codnomina);
        $c->add(NpnomcalPeer::SALDO, 0, Criteria::NOT_EQUAL);
        $c->add(NpnomcalPeer::ESPECIAL, 'N');
        $resultados = NpnomcalPeer::doSelect($c);
        if ($resultados) {
            $fechanom = $resultados[0]->getFecnom();
            foreach ($resultados as $npnomcal) {
                $sql = "Select A.codemp as codemp,A.codcar as codcar,A.codnom as codnom,A.codcat as codcat,A.fecasi as fecasi,A.nomemp as nomemp,A.nomcar as nomcar,A.nomnom as nomnom,A.nomcat as nomcat,A.unieje as unieje,A.sueldo as sueldo,A.status as status,A.nronom as nronom,A.montonomina as montonomina,A.codtip as codtip,A.codtipgas as codtipgas,A.codniv as codniv,A.grado as grado,A.paso as paso,
                      (CASE when C.CodTipPag='01' then C.Codban else C.Codemp end) as codigobancario
                      From NPAsiCarEmp A,NPHOJINT C Where
                      A.CodNom = '" . $npnomcal->getCodnom() . "' And
                      A.CodCar = '" . $npnomcal->getCodcar() . "'   And
                      A.CodEmp = '" . $npnomcal->getCodemp() . "' And
                      A.Status = 'V' And A.CODEMP = C.CODEMP";

                if (Herramientas::BuscarDatos($sql, $result)) {
                    $b = new Criteria();
                    $b->add(NpdefcptPeer::CODCON, $npnomcal->getCodcon());
                    $dato = NpdefcptPeer::doSelectOne($b);
                    if ($dato) {
                        /*
                          $a= new Criteria();
                          $a->add(NpasiparconPeer::CODNOM,$npnomcal->getCodnom());
                          $a->add(NpasiparconPeer::CODCAR,$npnomcal->getCodcar());
                          $a->add(NpasiparconPeer::CODCON,$npnomcal->getCodcon());
                          $dato1= NpasiparconPeer::doSelectOne($a);
                          if ($dato1)
                          { $partida=$dato1->getCodpar();}
                          else
                          {
                          $cri= new Criteria();
                          $cri->add(NpasicodprePeer::CODNOM,$npnomcal->getCodnom());
                          $cri->add(NpasicodprePeer::CODCON,$npnomcal->getCodcon());
                          $resul= NpasicodprePeer::doSelectOne($cri);
                          if ($resul)
                          { $partida=$resul->getCodpre();}
                          else
                          { $partida=$dato->getCodpar();}
                          }//else if $dato1

                          $p= new Criteria();
                          $p->add(NpconceptoscategoriaPeer::CODCON,$npnomcal->getCodcon());
                          $dato2=NpconceptoscategoriaPeer::doSelectOne($p);
                          if ($dato2)
                          { $categoria=$dato2->getCodcat();}
                          else
                          {
                          $f=new Criteria();
                          $f->add(NpasicatconempPeer::CODEMP,$npnomcal->getCodemp());
                          $f->add(NpasicatconempPeer::CODCAR,$npnomcal->getCodcar());
                          $f->add(NpasicatconempPeer::CODNOM,$npnomcal->getCodnom());
                          $f->add(NpasicatconempPeer::CODCON,$npnomcal->getCodcon());
                          $dato3= NpasicatconempPeer::doselectOne($f);
                          if ($dato3)
                          { $categoria=$dato3->getCodcat();}
                          else {$categoria=$result[0]['codcat'];}
                          }
                          $codpre=$categoria.'-'.$partida;
                         */


                        $sql = "select
					categoriaemp('" . $npnomcal->getCodnom() . "','" . $npnomcal->getCodemp() . "','" . $npnomcal->getCodcar() . "','" . $npnomcal->getCodcon() . "') as categoria,
					partidaconcepto('" . $npnomcal->getCodcon() . "','" . $npnomcal->getCodnom() . "','" . $npnomcal->getCodcar() . "') as partida
				from
				empresa";

                        if (Herramientas::BuscarDatos($sql, $resul)) {
                            $codpre = $resul[0]["categoria"] . '-' . $resul[0]["partida"];
                        }

                        if (($dato->getOrdpag() == 'S' && $dato->getImpcpt() == 'S' && ($dato->getOpecon() == 'A' || $dato->getOpecon() == 'D')) || ($dato->getOrdpag() == 'S' && $dato->getOpecon() == 'P')) {
                            $genord = true;
                        } else {
                            $genord = false;
                        }

                        if ($genord == true) {
                            $s = new Criteria();
                            $s->add(CpdeftitPeer::CODPRE, $codpre);
                            $data = CpdeftitPeer::doSelectOne($s);
                            if ($data) {
                                $t = new Criteria();
                                $t->add(NpcienomPeer::CODTIPGAS, $result[0]['codtipgas']);
                                $t->add(NpcienomPeer::CODPRE, $codpre);
                                $t->add(NpcienomPeer::CODCON, $npnomcal->getCodcon());
                                $t->add(NpcienomPeer::CODNOM, $codnomina);
                                $t->add(NpcienomPeer::ASIDED, $npnomcal->getAsided());
                                $t->add(NpcienomPeer::FECNOM, $npnomcal->getFecnom());
                                $t->add(NpcienomPeer::CODBAN, $result[0]['codigobancario']);
                                $resultado = NpcienomPeer::doSelectOne($t);
                                if (count($resultado) > 0) {
                                    $resultado->setMonto($resultado->getMonto() + $npnomcal->getSaldo());
                                    $variable[] = $resultado;
                                } else {
                                    $npcienom = new Npcienom();
                                    $npcienom->setCodnom($npnomcal->getCodnom());
                                    $npcienom->setCodcon($npnomcal->getCodcon());
                                    $npcienom->setFecnom($npnomcal->getFecnom());
                                    $npcienom->setEspecial($npnomcal->getEspecial());
                                    $npcienom->setCodpre($codpre);
                                    $npcienom->setCodcta('1');
                                    $npcienom->setMonto($npnomcal->getSaldo());
                                    $npcienom->setCantidad($npnomcal->getCantidad());
                                    $npcienom->setAsided($npnomcal->getAsided());
                                    $npcienom->setCodtipgas($result[0]['codtipgas']);
                                    $npcienom->setCodban($result[0]['codigobancario']);
                                    $variable[] = $npcienom;
                                }
                            }
                        }
                    }
                }
            }
            foreach ($variable as $grabar) {
                ////  Validar contra Presupuesto  ////
                if (Herramientas::Monto_disponible_ejecucion($anopresu, $grabar->getCodpre(),$mes, $mondis)) {
                    if ($grabar->getMonto() > $mondis) {
                        $sobregiro = true;
                        break;
                    }
                } else {
                    $sobregiro = true; //Esto nunca deberia suceder, pero se coloco para su validacion
                }
            }
            $fechanom = Herramientas::getX('CODNOM','Npnomina','Profec',$codnomina);
            $sql = "update nphojint set staemp='V'
                where codemp in (select codemp from npvacsalidas where fecsalnom=to_date('$fechanom','yyyy-mm-dd')) and
                      StaEmp='A' and
                      (select pagoad from npvacdefgen where codnomvac='$codnomina' limit 1)='S'";
            //print $sql; exit;
            H::insertarRegistros($sql);

            unset($npnomcal);
            unset($result);
            unset($dato);
            //unset($dato1);
            //unset($dato2);
            //unset($dato3);
            unset($data);
            unset($resultado);
            unset($grabar);
            return true;
        } else {
            return false;
        }
    }
public static function generarCompromisoNomina($codnom,$fecha){
	  $anopresu = substr(H:: getX_vacio('codemp', 'cpdefniv', 'fecper', '001'), 0, 4);
	  $mes= substr(date('Y-m-d'),5,2);
	  $cod="";
	  $sobregiro=false;
	  $c= new Criteria();
	  $c->add(CpdefnivPeer::CODEMP,'001');
	  $resulc= CpdefnivPeer::doSelectOne($c);


	  $sql="Select Z.* from (
			select a.codnom,a.codcon,a.fecnom,
			categoriaemp(a.codnom,a.codemp,a.codcar,a.codcon)||'-'||partidaconcepto(a.codcon,a.codnom,a.codcar) as codpre,
			'1' as codcta,sum(saldo) as monto,a.asided,c.codtipgas,sum(a.cantidad) as cantidad,
			(CASE when B.CodTipPag='01' then b.Codban else b.Codemp end) as codigobancario,
			a.especial,a.codnomesp,a.nomnomesp
			from npnomcal a,nphojint b,npasicaremp c,npdefcpt d
			where
			a.codnom=c.codnom and
			a.codemp=c.codemp and
			a.codcar=c.codcar and
			a.codemp=b.codemp and
			a.codcon=d.codcon and
			a.codnom='".$codnom."' and
			fecnom='".$fecha."' And
			c.status='V' and
			d.ordpag='S' and
			b.codtippag='01' and
			(a.asided='A') and
			d.impcpt=(case when a.asided='P' then impcpt else 'S' end) and
			especial='N'
			group by
			a.codnom,a.codcon,a.fecnom,
			categoriaemp(a.codnom,a.codemp,a.codcar,a.codcon)||'-'||partidaconcepto(a.codcon,a.codnom,a.codcar),
			a.asided,c.codtipgas,(CASE when B.CodTipPag='01' then b.Codban else b.Codemp end),
			a.especial,a.codnomesp,a.nomnomesp) Z,CPDEFTIT W
			WHERE Z.CODPRE=W.CODPRE
			ORDER BY ASIDED,CODPRE";

		if (Herramientas::BuscarDatos($sql,$result))
		{
		   $acum=0;
		   foreach ($result as $regnew1)
	       {
		      if (Herramientas::Monto_disponible_ejecucion($anopresu,$regnew1['codpre'],$mes,$mondis))
		      {
		        if ($regnew1['monto'] > $mondis){
                  $sobregiro = true;
                  $cod=$regnew1['codpre'];
		        }else $acum+=$regnew1['monto'];
		       }else{
		      	$sobregiro = true; //Esto nunca deberia suceder, pero se coloco para su validacion
                $cod=$regnew1['codpre'];
		      }
		   }

		   if (!$sobregiro){
              $refcom="";
			  if (Herramientas::getVerCorrelativo('corcom','cpdefniv',$r))
			  {
			    $encontrado = false;
			    while (!$encontrado) {
			      $numero = str_pad($r, 8, '0', STR_PAD_LEFT);
			      $sql2 = "select refcom from cpcompro where refcom='" . $numero . "'";
			      if (Herramientas::BuscarDatos($sql2, $result2)) {
			        $r = $r + 1;
			      } else {
			        $encontrado = true;
			      }
			    }
			    $refcom= $numero;

			    $cpcompro_new = new Cpcompro();
			    $cpcompro_new->setRefcom($refcom);
			    $cpcompro_new->setTipcom($resulc->getTipcom());
			    $cpcompro_new->setFeccom(date('Y-m-d'));
			    $cpcompro_new->setAnocom(substr(date('Y-m-d'),0,4));
			    $cpcompro_new->setStacom('A');
			    $cpcompro_new->setRefprc('NULO');
			    $cpcompro_new->setDescom('COMPROMISO GENERADO DE LA NÓMINA'.$codnom.'de Fecha'.date('d/m/Y',strtotime($fecha)));
   		        $cpcompro_new->setMoncom($acum);
			    $cpcompro_new->setSalcau(0);
			    $cpcompro_new->setSalpag(0);
			    $cpcompro_new->setSalaju(0);
			    $cpcompro_new->setCedrif($resulc->getCedrif());
			    $reqaut=H::getX('TIPCOM','Cpdoccom','Reqaut',$resulc->getTipcom());
                if ($reqaut=='S')
                  $cpcompro_new->setAprcom('N');
                else  {
	              	$loguse=sfContext::getInstance()->getUser()->getAttribute('loguse');
	              	$cpcompro_new->setLoguse($loguse);
	                $cpcompro_new->setAprcom('S');
	            }
			    $cpcompro_new->save();
			 	//Imputaciones
			    foreach ($result as $regnew1)
		        {
				    $cpimpcom_new = new Cpimpcom();
				    $cpimpcom_new->setRefcom($refcom);
				    $cpimpcom_new->setCodpre($regnew1['codpre']);
				    $cpimpcom_new->setMonimp($regnew1['monto']);
				    $cpimpcom_new->setMoncau(0);
				    $cpimpcom_new->setMonpag(0);
				    $cpimpcom_new->setMonaju(0);
				    $cpimpcom_new->setRefere('NULO');
				    $cpimpcom_new->setStaimp('A');
				    $cpimpcom_new->save();

				    //Actualizo npcienom
	                $l= new Criteria();
	                $l->add(NpcienomPeer::CODNOM,$regnew1['codnom']);
	                $l->add(NpcienomPeer::FECNOM,$regnew1['fecnom']);
	                $l->add(NpcienomPeer::CODTIPGAS,$regnew1['codtipgas']);
	                $l->add(NpcienomPeer::CODBAN,$regnew1['codigobancario']);
	 	            $l->add(NpcienomPeer::ESPECIAL,'N');
	                $l->add(NpcienomPeer::CODPRE,$regnew1['codpre']);
	                $sql="(npcienom.asided='A' or npcienom.asided='D')";
	                $l->add(NpcienomPeer::ASIDED,$sql,Criteria::CUSTOM);
	                $resultado= NpcienomPeer::doSelect($l);
	                if ($resultado)
	                {
	                    foreach ($resultado as $obj)
	                    {
	                        $obj->setRefcom($refcom);
	                        $obj->save();
	                    }
	                }
		        }
		   }
        }
    }
    return -1;
  }

}

?>
