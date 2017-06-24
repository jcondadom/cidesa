<?php
/**
 * Nómina Conceptos: Clase estática para trabajar con los conceptos de las nóminas
 *
 * @package    Roraima
 * @subpackage nomina
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class NominaConceptos{

	public static function ValidarExistenciaDatos($codnom,$codcon)
	{
		$c = new Criteria();
		$c->add(NpcalconPeer::CODCON,$codcon);
		$c->add(NpcalconPeer::CODNOM,$codnom);
		$obj = NpcalconPeer::doSelect($c);

		if ($obj)
		  return '0';
		else
          return '-1';
	}

  public static function obtenerObjNpasiconemp($codtippre,$codemp)
    {

    	$c = new Criteria();
		$c->add(NptipprePeer::CODTIPPRE,$codtippre);
		$obj = NptipprePeer::doSelectOne($c);
		if ($obj)
		    $codcon= $obj->getCodcon();
		else
		   $codcon="";

		$a = new Criteria();
		$a->add(NpasiconempPeer::CODCON,$codcon);
		$a->add(NpasiconempPeer::CODEMP,$codemp);
		$obj2 = NpasiconempPeer::doSelectOne($a);

		return $obj2;

    }



	public static function validarNomperhispre($codtippre, $codemp)
	{
        $obj2= self::obtenerObjNpasiconemp($codtippre,$codemp);
		if ($obj2)
		  return -1;
		else
          return 417;

    }


    public static function salvarNomperhispre($nphispre)
	{

		if($nphispre->getId()==''){

            $obj2= self::obtenerObjNpasiconemp($nphispre->getCodtippre(),$nphispre->getCodemp());

            if ($nphispre->getSigno()=='-'){

                  $actual=$nphispre->getSalant() - $nphispre->getMonpre();
                  $monpre= -1 * $nphispre->getMonpre();
				  $val=false;

		    }else {

		    	 $actual=$nphispre->getSalant() + $nphispre->getMonpre();
		    	 $monpre=$nphispre->getMonpre();
				 $val=true;

		    }

			$obj2->setAcumulado($actual);			
			if($val)
			{
				$obj2->setCantidad($nphispre->getMoncuota());	
				$obj2->setMonto($actual);
			}
				


	    	$nphispre->setMonpre($monpre);
	    	//print $nphispre->getMonpre();exit;

			$obj2->save();
			$nphispre->save();

		}

		return -1;
    }

        public static function borrarNomperhispre($nphispre)
	{
		if($nphispre->getId()!=''){

			$obj2= self::obtenerObjNpasiconemp($nphispre->getCodtippre(),$nphispre->getCodemp());
            if ($obj2) {
	            $monto=$obj2->getAcumulado() - $nphispre->getMonpre();
	            $obj2->setAcumulado($monto);
	            $obj2->setMonto($monto);
				$obj2->setCantidad($nphispre->getMoncuota());
	            $obj2->save();
            }
			$nphispre->delete();


		}

		return -1;


    }



    ////////////////Prestamos NomPerPrestamos /////////////////////////////////////

	public static function ActualizarNpasiconemp($grid)
	{
	  $x=$grid[0];
	  $j=0;
	  while ($j<count($x))
	  {
	    if ($x[$j]->getCodemp()!="")
	    {
		    $x[$j]->save();
	    }
	   $j++;
      }
	}

  public static function ValidarDatosenGrid($grid)
  {
      $x=$grid[0];
      $j=0;
      $sel=false;
      while ($j<count($x) && !$sel)
      {
        if ($x[$j]->getCodemp()!="")
        {
          if ($x[$j]->getCantidad() > $x[$j]->getMonto())
              return 418;
          else if ($x[$j]->getAcumulado()>$x[$j]->getMonto())
             return 419;
        }
        $j++;
      } //while ($j<count($x))
      return -1;

  }

  public static function generarTxtCestatickets($empresa,$grid)
  {
  	if ($empresa->getTiptxt()=='A') //Altas
  		$nombarchi='ALTAS';
  	else if ($empresa->getTiptxt()=='B') //Bajas
  		$nombarchi='BAJAS';
  	else if ($empresa->getTiptxt()=='R') //Recarga
  		$nombarchi='RECARGA';
  	else if ($empresa->getTiptxt()=='D') //Devoluciones
  		$nombarchi='DEVOLUCI';
  	else if ($empresa->getTiptxt()=='T') //Activación
  		$nombarchi='ACTIVTAR';
  	else if ($empresa->getTiptxt()=='E') //Reemplazos
  		$nombarchi='REEMPTAR';
  	else if ($empresa->getTiptxt()=='Q') //Bloqueo de Tarjeta
  		$nombarchi='BLOQTARJ';
    //Generar archivo txt
    $nombre_archivo=sfConfig::get('sf_upload_dir')."/cestatickets/".$nombarchi."_".strftime('%d_%m_%Y',time()).".txt";
    $dir="";

    if (!file_exists($nombre_archivo))
    {
       fopen($nombre_archivo,"w");
    }
    chmod ($nombre_archivo,0777);
    $cestatickets = fopen($nombre_archivo,'w+');
    $dir=$nombarchi."_".strftime('%d_%m_%Y',time()).".txt";

	$x=$grid[0];
	$j=0;
	$cadena="";
	$filler=' ';

 $sql="SELECT COUNT(*) AS correl FROM (SELECT fecnom from npcestatickets a, nphiscon b where a.codnom=b.codnom and a.codcon=b.codcon AND FECNOM<=TO_DATE('".$empresa->getFecnom()."','DD/MM/YYYY')group by fecnom) AS TABLA ";
//print($sql);exit;
 if (Herramientas::BuscarDatos($sql,$result)){
  $correlativo=$result[0]["correl"];}



	$h= new Criteria();
	$emp= EmpresaPeer::doSelectOne($h);
	if ($emp){
		$tipdoc=$emp->getTipdoc();
		$rifemp=$emp->getRifemp();
		$nomemp=substr($emp->getNomemp(),0,40);
		$numtaremp=$emp->getNumtar();

	}
	$fechaefe=date('d/m/Y',strtotime($empresa->getFecefe()));
    
    if ($empresa->getTiptxt()=='A'){  //Altas
    	//Encabezado  Tipo de Registro. Tipo de Documento de la Empresa. Numero de identificación de la Empresa (RIF). Numero de Lote: Número de plan más la fecha. Nombre de la Empresa. Cantidad de registros. Codigo del Plan o Mision. Fecha de generación del archivo DD/MM/AA. Hora de generación del archivo HH:MM:SS. Codigo de Respuesta. Nombre del archivo. Filler
    	$cadena='01'.str_pad(substr($rifemp,0,1), 1, '0', STR_PAD_LEFT).str_pad(substr($rifemp,1), 10, '0', STR_PAD_LEFT).str_pad(str_replace("/","",$empresa->getNumlot()), 15, '0', STR_PAD_LEFT).str_pad($nomemp, 40, ' ', STR_PAD_RIGHT).str_pad($empresa->getCanreg(), 7, '0', STR_PAD_LEFT).str_pad($empresa->getCodpla(), 8, ' ', STR_PAD_RIGHT).str_pad(date('d/m/y'), 8, ' ', STR_PAD_RIGHT).str_pad(date('H:i:s'), 8, ' ', STR_PAD_RIGHT).'00'.str_pad($nombarchi, 5, ' ', STR_PAD_RIGHT).str_pad($filler, 94, ' ', STR_PAD_RIGHT);
        fputs($cestatickets,$cadena.chr(13).chr(10));

	    while ($j<count($x))
		{
		  if ($x[$j]->getCheck()=="1")
		  {
		     $r= new Criteria();
		     $r->add(NphojintPeer::CODEMP,$x[$j]->getCodemp());
		     $registros= NphojintPeer::doSelect($r);
		     if ($registros)
		     {
		         foreach ($registros as $objetos)
		         {
		         	if ($x[$j]->getTiptel()=='Casa')
		         	{
                      $codarea=substr($objetos->getTelhab(),0,3);
	         		  $numtel=substr($objetos->getTelhab(),3,strlen($objetos->getTelhab()));                        
		         	}else if ($x[$j]->getTiptel()=='Celular'){
                       $codarea=substr($objetos->getCelemp(),0,3);
	         		   $numtel=substr($objetos->getCelemp(),3,strlen($objetos->getCelemp()));
		         	}else if ($x[$j]->getTiptel()=='Oficina'){
                       $codarea=substr($objetos->getTelotr(),0,3);
	         		  $numtel=substr($objetos->getTelotr(),3,strlen($objetos->getTelotr()));		         		
		         	}
		         	$aux=explode('-', $objetos->getFecnac());
		         	$fecnac=$aux[0].$aux[1].$aux[2];
		         	//Detalle Tipo de Registro. Tipo de Documento de la Empresa. Numero de Cedula o pasaporte. Primer Apellido. Filler. Inicial del Segundo Apellido. Filler. Primer Nombre. Filler. Ciudad. Estado. Codigo de Oficina. Sexo debe estar identificado con H=hombre y M=mujer. . Codigo del area del numero telefonico. Numero Telefonico. Descripcion del numero telefoico (celular, casa,oficina,etc). Fecha de nacimiento en formato AAAAMMDD.  Codigo de Respuesta. Filler
		             $cadena='02'.str_pad($objetos->getNacemp(), 1, ' ', STR_PAD_RIGHT).str_pad($objetos->getCedemp(), 10, '0', STR_PAD_LEFT).str_pad(substr($objetos->getPriape(),0,10), 10, ' ', STR_PAD_RIGHT).str_pad($filler, 10, ' ', STR_PAD_LEFT).str_pad(substr($objetos->getSegape(),0,1), 1, ' ', STR_PAD_LEFT).str_pad($filler, 19, ' ', STR_PAD_LEFT).str_pad(substr($objetos->getPrinom(),0,10), 10, ' ', STR_PAD_RIGHT).str_pad($filler, 30, ' ', STR_PAD_LEFT).str_pad(NpciudadPeer::getNomciu($objetos->getCodpai(),$objetos->getCodest(),$objetos->getCodciu()), 20, ' ', STR_PAD_RIGHT).str_pad(NpciudadPeer::getNomedo($objetos->getCodpai(),$objetos->getCodest()), 25, ' ', STR_PAD_RIGHT).str_pad('0212', 4, ' ', STR_PAD_LEFT).str_pad($objetos->getSexemp(), 1, ' ', STR_PAD_LEFT).str_pad($codarea, 7, '0', STR_PAD_LEFT).str_pad(str_replace(" ","",$numtel), 8, '0', STR_PAD_LEFT).str_pad($x[$j]->getTiptel(), 10, ' ', STR_PAD_RIGHT).str_pad($fecnac, 8, ' ', STR_PAD_LEFT).'0000'.str_pad($filler, 20, ' ', STR_PAD_RIGHT);
	                 fputs($cestatickets,$cadena.chr(13).chr(10));
		         }
		     }
		  }
		  $j++;
		}
    }else if ($empresa->getTiptxt()=='B'){  //Bajas
    	           	//Encabezado  Tipo de Registro. Tipo de Documento de la Empresa. Numero de identificación de la Empresa (RIF). Numero de Lote: Número de plan más la fecha. Nombre de la Empresa. Cantidad de registros. Codigo del Plan o Mision. Fecha de generación del archivo DD/MM/AA. Hora de generación del archivo HH:MM:SS. Codigo de Respuesta. Nombre del archivo. Filler
    	$cadena='01'.str_pad(substr($rifemp,0,1), 1, '0', STR_PAD_LEFT).str_pad(substr($rifemp,1), 10, '0', STR_PAD_LEFT).str_pad(str_replace("/","",$empresa->getNumlot()), 15, '0', STR_PAD_LEFT).str_pad($nomemp, 40, ' ', STR_PAD_RIGHT).str_pad($empresa->getCanreg(), 7, '0', STR_PAD_LEFT).str_pad($empresa->getCodpla(), 8, ' ', STR_PAD_RIGHT).str_pad(date('d/m/y'), 8, ' ', STR_PAD_RIGHT).str_pad(date('H:i:s'), 8, ' ', STR_PAD_RIGHT).'00'.str_pad($nombarchi, 8, ' ', STR_PAD_RIGHT).str_pad($filler, 41, ' ', STR_PAD_RIGHT);
        fputs($cestatickets,$cadena.chr(13).chr(10));

	    while ($j<count($x))
		{
		  if ($x[$j]->getCheck()=="1")
		  {
		     $r= new Criteria();
		     $r->add(NphojintPeer::CODEMP,$x[$j]->getCodemp());
		     $registros= NphojintPeer::doSelect($r);
		     if ($registros)
		     {
		         foreach ($registros as $objetos)
		         {
		         	//Detalle Tipo de Registro. Tipo de Documento de la Empresa. Numero de Cedula o pasaporte. PAN. Motivo de Baja. Codigo de Respuesta. Filler
		             $cadena='02'.str_pad($objetos->getNacemp(), 1, ' ', STR_PAD_RIGHT).str_pad($objetos->getCedemp(), 10, '0', STR_PAD_LEFT).str_pad($objetos->getNumtarces(), 20, ' ', STR_PAD_RIGHT).str_pad($x[$j]->getMotbaj(), 2, ' ', STR_PAD_LEFT).'0000'.str_pad($filler, 111, ' ', STR_PAD_RIGHT);
	                 fputs($cestatickets,$cadena.chr(13).chr(10));
		         }
		     }
		  }
		  $j++;
		}
    }else if ($empresa->getTiptxt()=='R'){ //Recarga
        //Encabezado  Identificación de Registro. Nombre de la Empresa. Identificación (numero de tarjeta) del Patron o Empresa. Numero consecutivo de control para el archivo. Fecha Efectiva del Cargo DD/MM/AA. Monto total de la nomina con dos decimales, sin separadores.Central. Espacios en Blanco. Codigo del banco.Numero de Lote para Identificar el Abono. Numero de Rif de la Empresa. Cantidad de abonos (sumatoria de registros detalle).Tipo de Nomina, T = total  /  P = parcial. Codigo del Plan o Mision. Fecha de generación del archivo DD/MM/AA. Hora de generación del archivo HH:MM:SS. Codigo de Respuesta. Nombre del archivo. Filler
    	$cadena='H'.str_pad($nomemp, 40, ' ', STR_PAD_RIGHT).str_pad($numtaremp, 20, ' ', STR_PAD_RIGHT).str_pad($correlativo, 2, '0',STR_PAD_LEFT).substr($empresa->getFecefe(),0,6).substr($empresa->getFecefe(),8,2).str_pad(str_replace(",","",str_replace(".","",$empresa->getMontot())), 13, '0', STR_PAD_LEFT).'03291'.'   '.'0102'.str_pad(str_replace("/","",$empresa->getNumlot()), 15, '0', STR_PAD_LEFT).str_pad($rifemp, 10, ' ', STR_PAD_RIGHT).str_pad($empresa->getCanreg(), 7, '0', STR_PAD_LEFT).str_pad($empresa->getTipnom(), 1, ' ', STR_PAD_RIGHT).str_pad($empresa->getCodpla(), 8, ' ', STR_PAD_RIGHT).str_pad(date('d/m/y'), 8, ' ', STR_PAD_RIGHT).str_pad(date('H:i:s'), 8, ' ', STR_PAD_RIGHT).'00'.str_pad($nombarchi, 8, ' ', STR_PAD_RIGHT).str_pad($filler, 17, ' ', STR_PAD_RIGHT);
        fputs($cestatickets,$cadena.chr(13).chr(10));

	    while ($j<count($x))
		{
		  if ($x[$j]->getCheck()=="1")
		  {
		     $r= new Criteria();
		     $r->add(NphojintPeer::CODEMP,$x[$j]->getCodemp());
		     $registros= NphojintPeer::doSelect($r);
		     if ($registros)
		     {
		         foreach ($registros as $objetos)
		         {
		         	//Detalle Identificación de Registro. Numero de tarjeta del empleado. Monto de la transacción con dos decimales, sin separadores. Filler. Nombre del Beneficiario. Numero de Cedula. Central. Codigo del banco. Numero de Lote para Identificar el Abono. Numero de Rif de la Empresa. Codigo de Respuesta. Filler
		             $cadena=str_pad('2', 1, ' ', STR_PAD_RIGHT).str_pad('', 20, ' ', STR_PAD_RIGHT).str_pad(($x[$j]->getMontra()*100), 11, '0', STR_PAD_LEFT).str_pad($filler, 4, ' ', STR_PAD_RIGHT).str_pad(substr(str_replace(",","",$objetos->getNomemp()),0,40), 40, ' ', STR_PAD_RIGHT).str_pad($objetos->getNacemp(), 1, ' ', STR_PAD_LEFT).str_pad($objetos->getCedemp(), 9, '0', STR_PAD_LEFT).'003291'.'0102'.str_pad(str_replace("/","",$empresa->getNumlot()), 15, '0', STR_PAD_LEFT).str_pad($rifemp, 10, ' ', STR_PAD_RIGHT).'0000'.str_pad($filler, 55, ' ', STR_PAD_RIGHT);
	                 fputs($cestatickets,$cadena.chr(13).chr(10));
		         }
		     }
		  }
		  $j++;
		}    	
    }else if ($empresa->getTiptxt()=='D'){  //Devoluciones
        //Encabezado  Identificación de Registro. Nombre de la Empresa. Identificación (numero de tarjeta) del Patron o Empresa. Numero consecutivo de control para el archivo. Fecha Efectiva del Cargo DD/MM/AA. Monto total de los cargos con dos decimales, sin separadores.Central. Espacios en Blanco. Codigo del banco.Numero de Lote para Identificar el Abono. Numero de Rif de la Empresa. Cantidad de abonos (sumatoria de registros detalle).Tipo de Cargo, T = total  /  P = parcial. Codigo del Plan o Mision. Fecha de generación del archivo DD/MM/AA. Hora de generación del archivo HH:MM:SS. Codigo de Respuesta. Nombre del archivo. Filler
    	$cadena='D'.str_pad($nomemp, 40, ' ', STR_PAD_RIGHT).str_pad($numtaremp, 20, ' ', STR_PAD_RIGHT).'01'.substr($empresa->getFecefe(),0,6).substr($empresa->getFecefe(),8,2).str_pad(str_replace(",","",str_replace(".","",$empresa->getMontot())), 13, '0', STR_PAD_LEFT).'03291'.'   '.'0102'.str_pad(str_replace("/","",$empresa->getNumlot()), 15, '0', STR_PAD_LEFT).str_pad($rifemp, 10, ' ', STR_PAD_RIGHT).str_pad($empresa->getCanreg(), 7, '0', STR_PAD_LEFT).str_pad($empresa->getTipnom(), 1, ' ', STR_PAD_RIGHT).str_pad($empresa->getCodpla(), 8, ' ', STR_PAD_RIGHT).str_pad(date('d/m/y'), 8, ' ', STR_PAD_RIGHT).str_pad(date('H:i:s'), 8, ' ', STR_PAD_RIGHT).'00'.str_pad($nombarchi, 8, ' ', STR_PAD_RIGHT).str_pad($filler, 17, ' ', STR_PAD_RIGHT);
        fputs($cestatickets,$cadena.chr(13).chr(10));

	    while ($j<count($x))
		{
		  if ($x[$j]->getCheck()=="1")
		  {
		     $r= new Criteria();
		     $r->add(NphojintPeer::CODEMP,$x[$j]->getCodemp());
		     $registros= NphojintPeer::doSelect($r);
		     if ($registros)
		     {
		         foreach ($registros as $objetos)
		         {
		         	//Detalle Identificación de Registro. Numero de tarjeta del empleado. Monto de la transacción con dos decimales, sin separadores. Filler. Nombre del Beneficiario. Numero de Cedula. Central. Codigo del banco. Numero de Lote para Identificar el Abono. Numero de Rif de la Empresa. Codigo de Respuesta. Filler
		             $cadena=str_pad('2', 1, ' ', STR_PAD_RIGHT).str_pad($objetos->getNumtarces(), 20, ' ', STR_PAD_RIGHT).str_pad(($x[$j]->getMontra()*100), 11, '0', STR_PAD_LEFT).str_pad($filler, 4, ' ', STR_PAD_RIGHT).str_pad(substr($objetos->getNomemp(),0,40), 40, ' ', STR_PAD_RIGHT).str_pad($objetos->getNacemp(), 1, ' ', STR_PAD_LEFT).str_pad($objetos->getCedemp(), 9, '0', STR_PAD_LEFT).'003291'.'0102'.str_pad(str_replace("/","",$empresa->getNumlot()), 15, '0', STR_PAD_LEFT).str_pad($rifemp, 10, ' ', STR_PAD_RIGHT).'0000'.str_pad($filler, 55, ' ', STR_PAD_RIGHT);
	                 fputs($cestatickets,$cadena.chr(13).chr(10));
		         }
		     }
		  }
		  $j++;
		}    	
    }else if ($empresa->getTiptxt()=='T'){ //Activación
    	//Encabezado  Tipo de Registro. Tipo de Documento de la Empresa. Numero de identificación de la Empresa (RIF). Numero de Lote: Número de plan más la fecha. Nombre de la Empresa. Cantidad de registros. Codigo del Plan o Mision. Fecha de generación del archivo DD/MM/AA. Hora de generación del archivo HH:MM:SS. Codigo de Respuesta. Nombre del archivo. Filler
    	$cadena='01'.str_pad(substr($rifemp,0,1), 1, '0', STR_PAD_LEFT).str_pad(substr($rifemp,1), 10, '0', STR_PAD_LEFT).str_pad(str_replace("/","",$empresa->getNumlot()), 15, '0', STR_PAD_LEFT).str_pad($nomemp, 40, ' ', STR_PAD_RIGHT).str_pad($empresa->getCanreg(), 7, '0', STR_PAD_LEFT).str_pad($empresa->getCodpla(), 8, ' ', STR_PAD_RIGHT).str_pad(date('d/m/y'), 8, ' ', STR_PAD_RIGHT).str_pad(date('H:i:s'), 8, ' ', STR_PAD_RIGHT).'00'.str_pad($nombarchi, 8, ' ', STR_PAD_RIGHT).str_pad($filler, 41, ' ', STR_PAD_RIGHT);
        fputs($cestatickets,$cadena.chr(13).chr(10));

	    while ($j<count($x))
		{
		  if ($x[$j]->getCheck()=="1")
		  {
		     $r= new Criteria();
		     $r->add(NphojintPeer::CODEMP,$x[$j]->getCodemp());
		     $registros= NphojintPeer::doSelect($r);
		     if ($registros)
		     {
		         foreach ($registros as $objetos)
		         {
		         	//Detalle Tipo de Registro. Tipo de Documento de la Empresa. Numero de Cedula o pasaporte. PAN. Motivo de Baja. Codigo de Respuesta. Filler
		             $cadena='02'.str_pad($objetos->getNacemp(), 1, ' ', STR_PAD_RIGHT).str_pad($objetos->getCedemp(), 10, '0', STR_PAD_LEFT).str_pad($objetos->getNumtarces(), 20, ' ', STR_PAD_RIGHT).str_pad($x[$j]->getMotbaj(), 2, ' ', STR_PAD_LEFT).'0000'.str_pad($filler, 111, ' ', STR_PAD_RIGHT);
	                 fputs($cestatickets,$cadena.chr(13).chr(10));
		         }
		     }
		  }
		  $j++;
		}
    }else if ($empresa->getTiptxt()=='E'){ //Reemplazos
    	//Encabezado  Tipo de Registro. Tipo de Documento de la Empresa. Numero de identificación de la Empresa (RIF). Numero de Lote: Número de plan más la fecha. Nombre de la Empresa. Cantidad de registros. Codigo del Plan o Mision. Fecha de generación del archivo DD/MM/AA. Hora de generación del archivo HH:MM:SS. Codigo de Respuesta. Nombre del archivo. Filler
    	$cadena='01'.str_pad(substr($rifemp,0,1), 1, '0', STR_PAD_LEFT).str_pad(substr($rifemp,1), 10, '0', STR_PAD_LEFT).str_pad(str_replace("/","",$empresa->getNumlot()), 15, '0', STR_PAD_LEFT).str_pad($nomemp, 40, ' ', STR_PAD_RIGHT).str_pad($empresa->getCanreg(), 7, '0', STR_PAD_LEFT).str_pad($empresa->getCodpla(), 8, ' ', STR_PAD_RIGHT).str_pad(date('d/m/y'), 8, ' ', STR_PAD_RIGHT).str_pad(date('H:i:s'), 8, ' ', STR_PAD_RIGHT).'00'.str_pad($nombarchi, 8, ' ', STR_PAD_RIGHT).str_pad($filler, 41, ' ', STR_PAD_RIGHT);
        fputs($cestatickets,$cadena.chr(13).chr(10));

	    while ($j<count($x))
		{
		  if ($x[$j]->getCheck()=="1")
		  {
		     $r= new Criteria();
		     $r->add(NphojintPeer::CODEMP,$x[$j]->getCodemp());
		     $registros= NphojintPeer::doSelect($r);
		     if ($registros)
		     {
		         foreach ($registros as $objetos)
		         {
		         	//Detalle Tipo de Registro. Tipo de Documento de la Empresa. Numero de Cedula o pasaporte. PAN. Motivo de Baja. Codigo de Respuesta. Filler
		             $cadena='02'.str_pad($objetos->getNacemp(), 1, ' ', STR_PAD_RIGHT).str_pad($objetos->getCedemp(), 10, '0', STR_PAD_LEFT).str_pad($objetos->getNumtarces(), 20, ' ', STR_PAD_RIGHT).str_pad($x[$j]->getPan(), 20, ' ', STR_PAD_RIGHT).'0000'.str_pad($filler, 93, ' ', STR_PAD_RIGHT);
	                 fputs($cestatickets,$cadena.chr(13).chr(10));
		         }
		     }
		  }
		  $j++;
		}
    }else if ($empresa->getTiptxt()=='Q'){ //Bloque de Tarjeta
    	//Encabezado  Tipo de Registro. Tipo de Documento de la Empresa. Numero de identificación de la Empresa (RIF). Numero de Lote: Número de plan más la fecha. Nombre de la Empresa. Cantidad de registros. Codigo del Plan o Mision. Fecha de generación del archivo DD/MM/AA. Hora de generación del archivo HH:MM:SS. Codigo de Respuesta. Nombre del archivo. Filler
    	$cadena='01'.str_pad(substr($rifemp,0,1), 1, '0', STR_PAD_LEFT).str_pad(substr($rifemp,1), 10, '0', STR_PAD_LEFT).str_pad(str_replace("/","",$empresa->getNumlot()), 15, '0', STR_PAD_LEFT).str_pad($nomemp, 40, ' ', STR_PAD_RIGHT).str_pad($empresa->getCanreg(), 7, '0', STR_PAD_LEFT).str_pad($empresa->getCodpla(), 8, ' ', STR_PAD_RIGHT).str_pad(date('d/m/y'), 8, ' ', STR_PAD_RIGHT).str_pad(date('H:i:s'), 8, ' ', STR_PAD_RIGHT).'00'.str_pad($nombarchi, 8, ' ', STR_PAD_RIGHT).str_pad($filler, 41, ' ', STR_PAD_RIGHT);
        fputs($cestatickets,$cadena.chr(13).chr(10));

	    while ($j<count($x))
		{
		  if ($x[$j]->getCheck()=="1")
		  {
		     $r= new Criteria();
		     $r->add(NphojintPeer::CODEMP,$x[$j]->getCodemp());
		     $registros= NphojintPeer::doSelect($r);
		     if ($registros)
		     {
		         foreach ($registros as $objetos)
		         {
		         	//Detalle Tipo de Registro. Tipo de Documento de la Empresa. Numero de Cedula o pasaporte. PAN. Motivo de Baja. Codigo de Respuesta. Filler
		             $cadena='02'.str_pad($objetos->getNacemp(), 1, ' ', STR_PAD_RIGHT).str_pad($objetos->getCedemp(), 10, '0', STR_PAD_LEFT).str_pad($objetos->getNumtarces(), 20, ' ', STR_PAD_RIGHT).str_pad($x[$j]->getMotbaj(), 2, ' ', STR_PAD_LEFT).'0000'.str_pad($filler, 111, ' ', STR_PAD_RIGHT);
	                 fputs($cestatickets,$cadena.chr(13).chr(10));
		         }
		     }
		  }
		  $j++;
		}
    }
  fclose($cestatickets);

  return $dir;
  }  

      //////////////////////////////////////////////////////////////////////
}
?>
