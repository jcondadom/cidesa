<?php

/**
 * Autenticacion: Clase para el manejo de usuarios y grupos dentro de la aplicacion
 *
 * @package    Roraima
 * @subpackage autenticacion
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Autenticacion.class.php 43291 2011-03-30 16:32:40Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Autenticacion {

  public static function salvarUsuarios($usuario)
  {
    /* if($usuario->getId()==''){

      $apliuser= new ApliUser();
      $apliuser->setLoguse($usuario->getLoguse());
      $apliuser->setCodemp(sfContext::getInstance()->getUser()->getAttribute('empresa'));
      $apliuser->setCodapl('CI0');
      $apliuser->setNomopc('menu');
      $apliuser->setPriuse('15');
      $apliuser->save();

      $apliuser= new ApliUser();
      $apliuser->setLoguse($usuario->getLoguse());
      $apliuser->setCodemp(sfContext::getInstance()->getUser()->getAttribute('empresa'));
      $apliuser->setCodapl('CI0');
      $apliuser->setNomopc('catalogo');
      $apliuser->setPriuse('15');
      $apliuser->save();

     }*/
     $valintdia=H::getConfApp2('valintdia', 'autenticacion', 'login');
     $numint=3;
     if ($valintdia=='S')
     {
        $a = new Criteria();
        $a->add(UsuariosPeer::LOGUSE,$usuario->getLoguse());
        $regdat = UsuariosPeer::doSelectOne($a);
        if ($regdat) {
          if ($regdat->getConint()>$numint && $regdat->getPasuse()!='md5'.md5(strtoupper($usuario->getLoguse()).$usuario->getPasuse()))
          {
              $usuario->setFecint(null);
              $usuario->setConint(0);
          }
        }
     }

     $usuario->setPasuse('md5'.md5(strtoupper($usuario->getLoguse()).$usuario->getPasuse()));

     $permiporgrupo="";
      $varemp =sfContext::getInstance()->getUser()->getAttribute('configemp');
      if ($varemp)
	if(array_key_exists('generales',$varemp))
	   if(array_key_exists('permiporgrupo',$varemp['generales']))
	   {
              $permiporgrupo=$varemp['generales']['permiporgrupo'];
	   }

     if ($permiporgrupo=='S' && $usuario->getCodgru()!='')
     {
         $empresa=sfContext::getInstance()->getUser()->getAttribute('empresa');

         $t= new Criteria();
         $t->add(SeggruaplPeer::CODGRU,$usuario->getCodgru());
         $t->add(SeggruaplPeer::CODEMP,$empresa);
         $result= SeggruaplPeer::doSelect($t);
         if ($result)
         {
            $c= new Criteria();
            $c->add(ApliUserPeer::LOGUSE,$usuario->getLoguse());
            $c->add(ApliUserPeer::CODEMP,$empresa);
            ApliUserPeer::doDelete($c);
            foreach ($result as $obj)
            {
                $apliuser= new ApliUser();
                $apliuser->setLoguse($usuario->getLoguse());
                $apliuser->setCodemp($empresa);
                $apliuser->setCodapl($obj->getCodapl());
                $apliuser->setNomopc($obj->getNomopc());
                $apliuser->setDesopc($obj->getDesopc());
                $apliuser->setPriuse($obj->getPriuse());
                $apliuser->save();
            }
         }
     }

     $usuario->save();

  }


  public static function salvarApliuser($apli_user,$grid,$empresa)
  {
    $login=$apli_user->getLoguse();
    $codigoapli=explode('_',$apli_user->getCodapl());
    $c= new Criteria();
    $c->add(ApliUserPeer::LOGUSE,$login);
    $c->add(ApliUserPeer::CODEMP,$empresa);
    $c->add(ApliUserPeer::CODAPL,$codigoapli[1]);
    ApliUserPeer::doDelete($c);

    $priv=false;
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]['priuse']!='')
      {
       $apliuser= new ApliUser();
       $apliuser->setLoguse($login);
       $apliuser->setCodemp($empresa);
       $apliuser->setCodapl($codigoapli[1]);
       $apliuser->setNomopc($x[$j]['nomopc']);
       $apliuser->setDesopc($x[$j]['desopc']);
       $apliuser->setPriuse($x[$j]['priuse']);
       $apliuser->save();
       $priv=true;
      }
      $j++;
    }

   // Agregando los privilegios minimos

    if ($apli_user->getAdministrador()=='')
    {
     if ($priv==true)
    {

    $apliuser= new ApliUser();
    $apliuser->setLoguse($login);
    $apliuser->setCodemp($empresa);
    $apliuser->setCodapl($codigoapli[1]);
    $apliuser->setNomopc('menu');
    $apliuser->setDesopc('menu');
    $apliuser->setPriuse('15');
    $apliuser->save();

    $apliuser= new ApliUser();
    $apliuser->setLoguse($login);
    $apliuser->setCodemp($empresa);
    $apliuser->setCodapl($codigoapli[1]);
    $apliuser->setNomopc('catalogo');
    $apliuser->setDesopc('catalogo');
    $apliuser->setPriuse('15');
    $apliuser->save();

    $apliuser= new ApliUser();
    $apliuser->setLoguse($login);
    $apliuser->setCodemp($empresa);
    $apliuser->setCodapl($codigoapli[1]);
    $apliuser->setNomopc('confincomgen');
    $apliuser->setDesopc('confincomgen');
    $apliuser->setPriuse('15');
    $apliuser->save();

    if ($codigoapli[1]=='CA0') {
      $apliuser= new ApliUser();
      $apliuser->setLoguse($login);
      $apliuser->setCodemp($empresa);
      $apliuser->setCodapl($codigoapli[1]);
      $apliuser->setNomopc('almdetsol');
      $apliuser->setDesopc('almdetsol');
      $apliuser->setPriuse('15');
      $apliuser->save();

      $apliuser= new ApliUser();
      $apliuser->setLoguse($login);
      $apliuser->setCodemp($empresa);
      $apliuser->setCodapl($codigoapli[1]);
      $apliuser->setNomopc('almdetsolreq');
      $apliuser->setDesopc('almdetsolreq');
      $apliuser->setPriuse('15');
      $apliuser->save();
    }

    if ($codigoapli[1]=='NP0') {
      $apliuser= new ApliUser();
      $apliuser->setLoguse($login);
      $apliuser->setCodemp($empresa);
      $apliuser->setCodapl($codigoapli[1]);
      $apliuser->setNomopc('nomfalperrep');
      $apliuser->setDesopc('nomfalperrep');
      $apliuser->setPriuse('15');
      $apliuser->save();
    }
    }
    }
   else
   {

   $apliuser= new ApliUser();
   $apliuser->setLoguse($login);
   $apliuser->setCodemp($empresa);
   $apliuser->setCodapl($codigoapli[1]);
   $apliuser->setNomopc('admin');
   $apliuser->setDesopc('admin');
   $apliuser->setPriuse('15');
   $apliuser->save();

   $apliuser= new ApliUser();
   $apliuser->setLoguse($login);
   $apliuser->setCodemp($empresa);
   $apliuser->setCodapl($codigoapli[1]);
   $apliuser->setNomopc('menu');
   $apliuser->setDesopc('menu');
   $apliuser->setPriuse('15');
   $apliuser->save();

   $apliuser= new ApliUser();
   $apliuser->setLoguse($login);
   $apliuser->setCodemp($empresa);
   $apliuser->setCodapl($codigoapli[1]);
   $apliuser->setNomopc('catalogo');
   $apliuser->setDesopc('catalogo');
   $apliuser->setPriuse('15');
   $apliuser->save();

    $apliuser= new ApliUser();
    $apliuser->setLoguse($login);
    $apliuser->setCodemp($empresa);
    $apliuser->setCodapl($codigoapli[1]);
    $apliuser->setNomopc('confincomgen');
    $apliuser->setDesopc('confincomgen');
    $apliuser->setPriuse('15');
    $apliuser->save();
   }

  }

  public static function validadNivelAprobacion($login,$monto,&$error)
  {
  	$error=-1;

  	$c= new Criteria();
  	$reg=OpdefempPeer::doSelectOne($c);
  	if ($reg)
  	{
  		if ($reg->getUnitri()>0)
  		{
  		  $unitrireal=$monto/$reg->getUnitri();
  		}else {
  			$error=533;
  			return $error;
  		}
  	}

    $u= new Criteria();
    $u->add(UsuariosPeer::LOGUSE,$login);
    $result= UsuariosPeer::doSelectOne($u);
    if ($result)
    {
      $p= new Criteria();
      $p->add(SegranaprPeer::CODNIV,$result->getCodniv());
      $registro= SegranaprPeer::doSelectOne($p);
      if ($registro)
      {
      	if ($unitrireal<=$registro->getRanhas() && $unitrireal>=$registro->getRandes())
      	{
         $error=-1;
      	}else{
      		$error=534;
      	}
      }
    }
    return $error;
  }

  public static function ActsaldosContables($empresa)
  {
     $codorigen='SIMA'.$empresa->getCodemp();
     $coddestino='SIMA'.$empresa->getCodempdes();

     $sql='Select * from "'.$coddestino.'".contaba';
     if (Herramientas::BuscarDatos($sql,$result)){
       $codingreso=$result[0]["codind"];
       $codegreso=$result[0]["codegd"];
       $codresant=$result[0]["codresant"];
       $codresact=$result[0]["codres"];
     }else{
       $codingreso="";
       $codegreso="";
       $codresant="";
       $codresact="";
     }

    $sql1='update "'.$coddestino.'".contabb set SalAnt=(Select SalAct from "'.$codorigen.'".contabb1 where "'.$codorigen.'".contabb1.codcta="'.$coddestino.'".contabb.codcta and PerEje=\'12\')';
    Herramientas::insertarRegistros($sql1);

    $sql2='update "'.$coddestino.'".contabb set salant=0,salprgper=0,salacuper=0 where codcta like \''.$codingreso.'%\'';
    Herramientas::insertarRegistros($sql2);

    $sql3='update "'.$coddestino.'".contabb set salant=0,salprgper=0,salacuper=0 where codcta like \''.$codegreso.'%\'';
    Herramientas::insertarRegistros($sql3);

    $sql4='update "'.$coddestino.'".contabb1 set salact=0,totdeb=0,totcre=0 where codcta like \''.$codingreso.'%\'';
    Herramientas::insertarRegistros($sql4);

    $sql5='update "'.$coddestino.'".contabb1 set salact=0,totdeb=0,totcre=0 where codcta like \''.$codegreso.'%\'';
    Herramientas::insertarRegistros($sql5);

  }

  public static function calcularDisponibilidad($numcue,$codorigen,&$saldo,&$saldoban,&$esta)
  {
    $saldo=0; $saldoban=0;
    $deb=0; $debban=0;
    $cre=0;  $creban=0;
    $anterior=0; $anteriorban=0;
    $esta=true;

    $sql='SELECT * FROM "'.$codorigen.'".CONTABA WHERE CODEMP=\'001\'';
    if (Herramientas::BuscarDatos($sql,$result)){
      $fecinicio=date('d/m/Y',strtotime($result[0]["fecini"]));
    }

    $sql1='SELECT now() as hoy,ANTLIB as antlib,ANTBAN as antban FROM "'.$codorigen.'".TSdefban WHERE NUMCUE =\''.$numcue.'\'';
    if (Herramientas::BuscarDatos($sql1,$result1)){
        $fecha=date('d/m/Y',strtotime($result1[0]["hoy"]));
        $anterior=$result1[0]["antlib"];
        $anteriorban=$result1[0]["antban"];
    }else {
      $esta=false;
    }

    if ($esta) {

    $sql2='SELECT coalesce(SUM(case when A.DEBCRE=\'D\' then B.MONMOV else 0 end),0) as debitos , coalesce(SUM(case when A.DEBCRE=\'C\' then B.MONMOV else 0 end),0) as  creditos
          FROM "'.$codorigen.'".TSTIPMOV A,"'.$codorigen.'".TSMOVLIB B,"'.$codorigen.'".TSDEFBAN C WHERE B.NUMCUE = \''.$numcue.'\' AND b.numcue = c.numcue and
          B.TIPMOV = A.CODTIP AND B.FECLib <= to_date(\''.$fecha.'\',\'dd/mm/yyyy\') AND B.FECLib >= to_date(\''.$fecinicio.'\',\'dd/mm/yyyy\')';
    if (Herramientas::BuscarDatos($sql2,$result2)){
        $deb=$result2[0]["debitos"];
        $cre=$result2[0]["creditos"];
    }

    $saldo= $anterior + $deb - $cre;

    $sql3='SELECT coalesce(SUM(case when A.DEBCRE=\'D\' then B.MONMOV else 0 end),0) as debitos , coalesce(SUM(case when A.DEBCRE=\'C\' then B.MONMOV else 0 end),0) as creditos
           FROM "'.$codorigen.'".TSTIPMOV A,"'.$codorigen.'".TSMOVBAN B,"'.$codorigen.'".TSDEFBAN C WHERE B.NUMCUE = \''.$numcue.'\' AND b.numcue = c.numcue and
           B.TIPMOV = A.CODTIP AND
           B.FECBan <=to_date(\''.$fecha.'\',\'dd/mm/yyyy\') AND
           B.FECBan >= to_date(\''.$fecinicio.'\',\'dd/mm/yyyy\')';
    if (Herramientas::BuscarDatos($sql3,$result3)){
        $debban=$result3[0]["debitos"];
        $creban=$result3[0]["creditos"];
    }

    $saldoban= $anteriorban + $debban - $creban;
  }

    return true;
  }

  public static function anoPeriodo($coddestino){
     $anoperiodo=date('YYYY');

      $sql='Select to_char(fecini,\'YYYY\') as  elano From "'.$coddestino.'".ConTaba';
      if (Herramientas::BuscarDatos($sql,$result)){
          $anoperiodo=$result[0]["elano"];
      }

     return $anoperiodo;
  }

    public static function anoPeriodo2(){
     $anoperiodo=date('YYYY');

      $sql='Select to_char(fecini,\'YYYY\') as  elano From ConTaba';
      if (Herramientas::BuscarDatos($sql,$result)){
          $anoperiodo=$result[0]["elano"];
      }

     return $anoperiodo;
  }

  public static function ActsaldosBancos($empresa)
  {
     $codorigen='SIMA'.$empresa->getCodemp();
     $coddestino='SIMA'.$empresa->getCodempdes();

     if ($empresa->getSalban()=='1')
     {
         $sql='Select * from "'.$coddestino.'".tsdefban';
         if (Herramientas::BuscarDatos($sql,$result)){
             foreach ($result as $datos){
                self::calcularDisponibilidad($datos["numcue"],$codorigen,$saldo,$saldoban,$esta);
                if ($esta) {
                $sql1='update "'.$coddestino.'".tsdefban set AntLib=\''.$saldo.'\' Where Numcue=\''.$datos["numcue"].'\'';
                Herramientas::insertarRegistros($sql1);

                $sql2='Update "'.$coddestino.'".tsdefban set AntBan=\''.$saldoban.'\' Where Numcue=\''.$datos["numcue"].'\'';
                Herramientas::insertarRegistros($sql2);
              }
             }
         }

     }

     if ($empresa->getMovtra()=='1')
     {
      $anoperiodo=self::anoPeriodo($coddestino);
      $sql3='Delete from "'.$coddestino.'".TSCheEmi Where to_char(fecemi,\'YYYY\')< \''.$anoperiodo.'\'';
      Herramientas::insertarRegistros($sql3);

      $sql4='Delete from "'.$coddestino.'".TSMovLib Where to_char(feclib,\'YYYY\')< \''.$anoperiodo.'\'';
      Herramientas::insertarRegistros($sql4);

      $sql5='Delete from "'.$coddestino.'".TSMovBan  Where to_char(fecban,\'YYYY\')< \''.$anoperiodo.'\'';
      Herramientas::insertarRegistros($sql5);

      $sql6='Delete from "'.$coddestino.'".TSConcil Where to_char(feclib,\'YYYY\')< \''.$anoperiodo.'\'';
      Herramientas::insertarRegistros($sql6);

      $sql7='Delete from "'.$coddestino.'".TSConcilhis Where to_char(feclib,\'YYYY\')< \''.$anoperiodo.'\'';
      Herramientas::insertarRegistros($sql7);

      $sql8='Insert into "'.$coddestino.'".TSmovlib (
            numcue, reflib, feclib, tipmov, deslib, monmov, codcta, numcom, 
            feccom, status, stacon, fecing, fecanu, tipmovpad, reflibpad, 
            transito, numcomadi, feccomadi, nombensus, orden, horing, stacon1, 
            motanu, refpag, loguse, cedrif, codmon, valmon, codconcepto, 
            stadif, codpro, tipmovaju, reflibaju, coddirec) 
            Select numcue, reflib, feclib, tipmov, deslib, monmov, codcta, numcom, 
            feccom, status, stacon, fecing, fecanu, tipmovpad, reflibpad, 
            transito, numcomadi, feccomadi, nombensus, orden, horing, stacon1, 
            motanu, refpag, loguse, cedrif, codmon, valmon, codconcepto, 
            stadif, codpro, tipmovaju, reflibaju, coddirec From "'.$codorigen.'".TsMovlib where stacon<>\'C\'';
      Herramientas::insertarRegistros($sql8);

      $sql9='Insert into "'.$coddestino.'".TSmovBan(
            numcue, codcta, refban, fecban, tipmov, desban, monmov, status, 
            stacon, transito, stacon1, codmon, valmon, coddirec, loguse) 
            Select numcue, codcta, refban, fecban, tipmov, desban, monmov, status, 
            stacon, transito, stacon1, codmon, valmon, coddirec, loguse From "'.$codorigen.'".TsMovBan where stacon<>\'C\'';
      Herramientas::insertarRegistros($sql9);

      $sql10='Insert Into "'.$coddestino.'".TSCheEmi(
        numche, numcue, cedrif, fecemi, monche, status, codemi, fecent, 
        codent, obsent, fecanu, cedrec, nomrec, tipdoc, fecing, temporal, 
        temporal2, nombensus, anopre, numtiq, cedaut, peraut, numcomegr, 
        motdev, fecdev, codmon, valmon, codconcepto, loguse, conformado, 
        nomfuncon, agenban, fecconfor, horconfor, fotper, fotced, fotche, 
        comentcon, coddirec, fecreg, cheimp, fecimp, fecentcon, codpro, 
        codseg)
        Select numche, numcue, cedrif, fecemi, monche, status, codemi, fecent, 
        codent, obsent, fecanu, cedrec, nomrec, tipdoc, fecing, temporal, 
        temporal2, nombensus, anopre, numtiq, cedaut, peraut, numcomegr, 
        motdev, fecdev, codmon, valmon, codconcepto, loguse, conformado, 
        nomfuncon, agenban, fecconfor, horconfor, fotper, fotced, fotche, 
        comentcon, coddirec, fecreg, cheimp, fecimp, fecentcon, codpro, 
        codseg From "'.$codorigen.'".TSCheEmi Where numcue||numche||tipdoc in (select numcue||reflib||tipmov from "'.$codorigen.'".tsmovlib where stacon<>\'C\')';
      Herramientas::insertarRegistros($sql10);

     }
  }

  public static function procesodeeliminacion($simades){
      $t= new Criteria();
      $subselect = "apernueper.nomtab IN (select table_name from information_schema.tables where table_schema='".$simades."' and TABLE_TYPE = 'BASE TABLE' )";
      $t->add(ApernueperPeer::NOMTAB, $subselect, Criteria::CUSTOM);
      $t->addAscendingOrderByColumn(ApernueperPeer::ORDEN);
      $result= ApernueperPeer::doSelect($t);

      if ($result)
      {
          foreach ($result as $datos){
              $sql='delete from "'.$simades.'".'.$datos->getNomtab();
              Herramientas::insertarRegistros($sql);
          }
      }
  }

  public static function actualizarPeriodo($empresa)
  {
	try {
		      if (($empresa->getAno() % 4)==0){
		          $diasno=366;
		      }else $diasno=365;

		      $elano=$empresa->getAno();
		      $simades="SIMA".$empresa->getCodempdes();
		      $simaori="SIMA".$empresa->getCodemp();
          if ($empresa->getCreesq()=='S') {
  		      $dir=CIDESA_CONFIG.'/databases.yml';
  		      cidesaTools::exitsfile($dir) ? $dir = $dir : $dir = sfConfig::get('sf_root_dir').'/config/databases.yml';
  		      $confbd = sfYaml::load($dir);

  		      if(is_array($confbd)){
  		      	$host     = $confbd['all']['propel']['param']['hostspec'];
  		        $nombd    = $confbd['all']['propel']['param']['database'];
              $password   = $confbd['all']['propel']['param']['password'];
  		        $userbd   = $confbd['all']['propel']['param']['username'];
  		        $verpostg = $confbd['all']['propel']['param']['postgres8.1'];

  		      }

  		      $esquema = sfContext::getInstance()->getUser()->getAttribute('schema');
  		      $ruta    = $_SERVER['DOCUMENT_ROOT'].'/uploads/apertura/'.strtoupper($simades).'.backup';

            //Renombramos el SIMA origibal al sima nuevo
            $sql='ALTER SCHEMA "'.$simaori.'" RENAME TO "'.$simades.'"';
            Herramientas::insertarRegistros2($sql);

            $comando0='export PGPASSWORD='.$password.'';
            $salida1=shell_exec($comando0);

		        // Creamos el backup
  		      //$simaorir='"'.$simaori.'"';
            $simaorir='"'.$simades.'"';
  		      if ($verpostg=='S'){  //8.1
  		      	$comando = 'pg_dump --username '.$userbd.' -h '.$host.' --format custom --verbose --file "'.$ruta.'" --schema '.$simaorir.' '.$nombd.'';
  		      }elseif ($verpostg=='L'){   //8.2
  		      	$comando = 'pg_dump --username '.$userbd.' -h '.$host.' --format custom --verbose --file "'.$ruta.'" --schema \''.$simaorir.'\' "'.$nombd.'"';
  		      }elseif ($verpostg=='8.3') {  //8.3
              $comando='pg_dump --host '.$host.' --port 5432 --username '.$userbd.' --format custom --verbose --file "'.$ruta.'" --schema \''.$simaorir.'\' "'.$nombd.'"';
  		      }else {
              $com='\\';
              //$simares='"'.$simaori.'\"';
              $simares='"'.$simades.'"';
              //$comando='pg_dump --host '.$host.' --port 5432 --username "'.$userbd.'" --verbose --file "'.$ruta.'" --schema  "'.$com.$simares.'"  "'.$nombd.'"';
              $comando='pg_dump -U "'.$userbd.'" -h '.$host.' -p 5432 -F c -b -w -v -f "'.$ruta.'" --schema   \''.$simares.'\'  "'.$nombd.'"';
            }

  		      $salida=shell_exec($comando);

  		    //Al esquema viejo le colocamos su nombre original
  		      $sql='ALTER SCHEMA "'.$simades.'" RENAME TO "'.$simaori.'"';
  		      Herramientas::insertarRegistros2($sql);
            print $sql;

  		    // Restauramos el nuevo esquema
            if ($verpostg=='S' || $verpostg=='L'){  //8.1 || 8.2
  		        $comando2='pg_restore --username '.$userbd.' -h '.$host.'  --dbname "'.$nombd.'" --format custom --verbose "'.$ruta.'"';
            }elseif ($verpostg=='8.3') {
              $comando2='pg_restore --host '.$host.' --port 5432 --username '.$userbd.' --dbname "'.$nombd.'" --verbose "'.$ruta.'"';
            }else {
              //$comando2='pg_restore --host '.$host.' --port 5432 --username "'.$userbd.'" --dbname "'.$nombd.'" --verbose "'.$ruta.'"';
              $comando2='pg_restore -h '.$host.' --port 5432 -U "'.$userbd.'" --dbname "'.$nombd.'" -w  -v  "'.$ruta.'"';
            }
  		       $salida=shell_exec($comando2);
          }

          $sql1='Insert Into "SIMA_USER".Empresa Values (\''.$empresa->getCodempdes().'\',\''.$empresa->getDescripcion().'\',\'\',\'\',\''.$simades.'\')';
          Herramientas::insertarRegistros($sql1);

          $sql2='insert into "SIMA_USER".apli_user select codapl, loguse, \''.$empresa->getCodempdes().'\', nomopc, priuse from "SIMA_USER".apli_user where codemp=\''.$empresa->getCodemp().'\'';
          Herramientas::insertarRegistros($sql2);

          // Deshabilitando Triggers Presupuesto Egresos

          $sql='ALTER TABLE "'.$simades.'".CPMOVAJU DISABLE TRIGGER ALL';
          Herramientas::insertarRegistros($sql);

          $sql1='ALTER TABLE "'.$simades.'".CPIMPPRC DISABLE TRIGGER ALL';
          Herramientas::insertarRegistros($sql1);

          $sql2='ALTER TABLE "'.$simades.'".CPIMPCOM DISABLE TRIGGER ALL';
          Herramientas::insertarRegistros($sql2);

          $sql3='ALTER TABLE"'.$simades.'".CPIMPCAU DISABLE TRIGGER ALL';
          Herramientas::insertarRegistros($sql3);

          $sql4='ALTER TABLE "'.$simades.'".CPIMPPAG DISABLE TRIGGER ALL';
          Herramientas::insertarRegistros($sql4);

          $sql5='ALTER TABLE "'.$simades.'".CPMOVTRA DISABLE TRIGGER  ALL';
          Herramientas::insertarRegistros($sql5);

          $sql6='ALTER TABLE "'.$simades.'".CPMOVADI DISABLE TRIGGER ALL';
          Herramientas::insertarRegistros($sql6);


          // Deshabilitando Triggers Presupuesto Ingresos

          $sql='ALTER TABLE "'.$simades.'".CIMOVAJU DISABLE TRIGGER ALL';
          Herramientas::insertarRegistros($sql);

          $sql1='ALTER TABLE "'.$simades.'".CIIMPING DISABLE TRIGGER ALL';
          Herramientas::insertarRegistros($sql1);

          $sql2='ALTER TABLE "'.$simades.'".CIMOVTRA DISABLE TRIGGER ALL';
          Herramientas::insertarRegistros($sql2);

          //Limpiando Tablas de todos los modulos grabados en la tabla Apernueper

          self::procesodeeliminacion($simades);

          //Habilitando Triggers Presupuesto Egresos

          $sql='ALTER TABLE "'.$simades.'".CPMOVAJU ENABLE TRIGGER ALL';
          Herramientas::insertarRegistros($sql);

          $sql1='ALTER TABLE "'.$simades.'".CPIMPPRC ENABLE TRIGGER ALL';
          Herramientas::insertarRegistros($sql1);

          $sql2='ALTER TABLE "'.$simades.'".CPIMPCOM ENABLE TRIGGER ALL';
          Herramientas::insertarRegistros($sql2);

          $sql3='ALTER TABLE "'.$simades.'".CPIMPCAU ENABLE TRIGGER ALL';
          Herramientas::insertarRegistros($sql3);

          $sql4='ALTER TABLE "'.$simades.'".CPIMPPAG ENABLE TRIGGER ALL';
          Herramientas::insertarRegistros($sql4);

          $sql5='ALTER TABLE "'.$simades.'".CPMOVTRA ENABLE TRIGGER ALL';
          Herramientas::insertarRegistros($sql5);

          $sql6='ALTER TABLE "'.$simades.'".CPMOVADI ENABLE TRIGGER ALL';
          Herramientas::insertarRegistros($sql6);


          // Habilitando Triggers Presupuesto Ingresos

          $sql='ALTER TABLE "'.$simades.'".CIMOVAJU ENABLE TRIGGER ALL';
          Herramientas::insertarRegistros($sql);

          $sql1='ALTER TABLE "'.$simades.'".CIIMPING ENABLE TRIGGER ALL';
          Herramientas::insertarRegistros($sql1);

          $sql2='ALTER TABLE "'.$simades.'".CIMOVTRA ENABLE TRIGGER ALL';
          Herramientas::insertarRegistros($sql2);

          $fecini=$elano."-01-01";
          $feclast=$elano."-12-01";
		      //Actualizaciones de Contabilidad

		      $sql2='Update "'.$simades.'".contaba set etadef=\'A\',fecini=\''.$fecini.'\' ,feccie=Last_Day(\''.$feclast.'\')';
		      Herramientas::insertarRegistros($sql2);

		      $sql3='update "'.$simades.'".contaba1 set fecini=\''.$fecini.'\',feccie=Last_Day(\''.$feclast.'\')';
		      Herramientas::insertarRegistros($sql3);

		      $sql4='update "'.$simades.'".contaba1 set fecdes=\''.$fecini.'\',fechas=Last_Day(\''.$fecini.'\') where pereje=\'01\'';
		      Herramientas::insertarRegistros($sql4);

		      $fecinifeb=$elano."-02-01";
		      $sql5='update "'.$simades.'".contaba1 set fecdes=\''.$fecinifeb.'\',fechas=Last_Day(\''.$fecinifeb.'\') where pereje=\'02\'';
		      Herramientas::insertarRegistros($sql5);

		      $fecinimar=$elano."-03-01";
		      $sql6='update "'.$simades.'".contaba1 set fecdes=\''.$fecinimar.'\',fechas=Last_Day(\''.$fecinimar.'\') where pereje=\'03\'';
		      Herramientas::insertarRegistros($sql6);

		      $feciniabr=$elano."-04-01";
		      $sql7='update "'.$simades.'".contaba1 set fecdes=\''.$feciniabr.'\',fechas=Last_Day(\''.$feciniabr.'\') where pereje=\'04\'';
		      Herramientas::insertarRegistros($sql7);

		      $fecinimay=$elano."-05-01";
		      $sql8='update "'.$simades.'".contaba1 set fecdes=\''.$fecinimay.'\',fechas=Last_Day(\''.$fecinimay.'\') where pereje=\'05\'';
		      Herramientas::insertarRegistros($sql8);

		      $fecinijun=$elano."-06-01";
		      $sql9='update "'.$simades.'".contaba1 set fecdes=\''.$fecinijun.'\',fechas=Last_Day(\''.$fecinijun.'\') where pereje=\'06\'';
		      Herramientas::insertarRegistros($sql9);

		      $fecinijul=$elano."-07-01";
		      $sql10='update "'.$simades.'".contaba1 set fecdes=\''.$fecinijul.'\',fechas=Last_Day(\''.$fecinijul.'\') where pereje=\'07\'';
		      Herramientas::insertarRegistros($sql10);

		      $feciniago=$elano."-08-01";
		      $sql11='update "'.$simades.'".contaba1 set fecdes=\''.$feciniago.'\',fechas=Last_Day(\''.$feciniago.'\') where pereje=\'08\'';
		      Herramientas::insertarRegistros($sql11);

		      $fecinisep=$elano."-09-01";
		      $sql12='update "'.$simades.'".contaba1 set fecdes=\''.$fecinisep.'\',fechas=Last_Day(\''.$fecinisep.'\') where pereje=\'09\'';
		      Herramientas::insertarRegistros($sql12);

		      $fecinioct=$elano."-10-01";
		      $sql13='update "'.$simades.'".contaba1 set fecdes=\''.$fecinioct.'\',fechas=Last_Day(\''.$fecinioct.'\') where pereje=\'10\'';
		      Herramientas::insertarRegistros($sql13);

		      $fecininov=$elano."-11-01";
		      $sql14='update "'.$simades.'".contaba1 set fecdes=\''.$fecininov.'\',fechas=Last_Day(\''.$fecininov.'\') where pereje=\'11\'';
		      Herramientas::insertarRegistros($sql14);

		      $fecinidic=$elano."-12-01";
		      $sql15='update "'.$simades.'".contaba1 set fecdes=\''.$fecinidic.'\',fechas=Last_Day(\''.$fecinidic.'\') where pereje=\'12\'';
		      Herramientas::insertarRegistros($sql15);

		      $sql16='Update "'.$simades.'".contaba1 set Status=\'A\'';
		      Herramientas::insertarRegistros($sql16);

		      $sql17='update "'.$simades.'".contabb set fecini=\''.$fecini.'\',feccie=Last_Day(\''.$feclast.'\')';
		      Herramientas::insertarRegistros($sql17);

		      $sql18='update "'.$simades.'".contabb set salant=0,salprgper=0,salacuper=0';
		      Herramientas::insertarRegistros($sql18);

		      $sql19='update "'.$simades.'".contabb1 set fecini=\''.$fecini.'\',feccie=Last_Day(\''.$feclast.'\')';
		      Herramientas::insertarRegistros($sql19);

		      $sql20='update "'.$simades.'".contabb1 set totdeb=0,totcre=0,salact=0';
		      Herramientas::insertarRegistros($sql20);

		      //Actualizaciones de Presupuesto

		      $sql21='update "'.$simades.'".cpdefniv set EtaDef=\'A\',fecini=\''.$fecini.'\',feccie=Last_Day(\''.$feclast.'\'),fecper=Last_Day(\''.$feclast.'\')';
		      Herramientas::insertarRegistros($sql21);

		      $sql22='update "'.$simades.'".cppereje set fecini=\''.$fecini.'\',feccie=Last_Day(\''.$feclast.'\')';
		      Herramientas::insertarRegistros($sql22);

		      $sql4='update "'.$simades.'".cppereje set fecdes=\''.$fecini.'\',fechas=Last_Day(\''.$fecini.'\') where pereje=\'01\'';
		      Herramientas::insertarRegistros($sql4);

		      $fecinifeb=$elano."-02-01";
		      $sql5='update "'.$simades.'".cppereje set fecdes=\''.$fecinifeb.'\',fechas=Last_Day(\''.$fecinifeb.'\') where pereje=\'02\'';
		      Herramientas::insertarRegistros($sql5);

		      $fecinimar=$elano."-03-01";
		      $sql6='update "'.$simades.'".cppereje set fecdes=\''.$fecinimar.'\',fechas=Last_Day(\''.$fecinimar.'\') where pereje=\'03\'';
		      Herramientas::insertarRegistros($sql6);

		      $feciniabr=$elano."-04-01";
		      $sql7='update "'.$simades.'".cppereje set fecdes=\''.$feciniabr.'\',fechas=Last_Day(\''.$feciniabr.'\') where pereje=\'04\'';
		      Herramientas::insertarRegistros($sql7);

		      $fecinimay=$elano."-05-01";
		      $sql8='update "'.$simades.'".cppereje set fecdes=\''.$fecinimay.'\',fechas=Last_Day(\''.$fecinimay.'\') where pereje=\'05\'';
		      Herramientas::insertarRegistros($sql8);

		      $fecinijun=$elano."-06-01";
		      $sql9='update "'.$simades.'".cppereje set fecdes=\''.$fecinijun.'\',fechas=Last_Day(\''.$fecinijun.'\') where pereje=\'06\'';
		      Herramientas::insertarRegistros($sql9);

		      $fecinijul=$elano."-07-01";
		      $sql10='update "'.$simades.'".cppereje set fecdes=\''.$fecinijul.'\',fechas=Last_Day(\''.$fecinijul.'\') where pereje=\'07\'';
		      Herramientas::insertarRegistros($sql10);

		      $feciniago=$elano."-08-01";
		      $sql11='update "'.$simades.'".cppereje set fecdes=\''.$feciniago.'\',fechas=Last_Day(\''.$feciniago.'\') where pereje=\'08\'';
		      Herramientas::insertarRegistros($sql11);

		      $fecinisep=$elano."-09-01";
		      $sql12='update "'.$simades.'".cppereje set fecdes=\''.$fecinisep.'\',fechas=Last_Day(\''.$fecinisep.'\') where pereje=\'09\'';
		      Herramientas::insertarRegistros($sql12);

		      $fecinioct=$elano."-10-01";
		      $sql13='update "'.$simades.'".cppereje set fecdes=\''.$fecinioct.'\',fechas=Last_Day(\''.$fecinioct.'\') where pereje=\'10\'';
		      Herramientas::insertarRegistros($sql13);

		      $fecininov=$elano."-11-01";
		      $sql14='update "'.$simades.'".cppereje set fecdes=\''.$fecininov.'\',fechas=Last_Day(\''.$fecininov.'\') where pereje=\'11\'';
		      Herramientas::insertarRegistros($sql14);

		      $fecinidic=$elano."-12-01";
		      $sql15='update "'.$simades.'".cppereje set fecdes=\''.$fecinidic.'\',fechas=Last_Day(\''.$fecinidic.'\') where pereje=\'12\'';
		      Herramientas::insertarRegistros($sql15);

		      $sql16='Update "'.$simades.'".cppereje set EstPer=\'A\'';
		      Herramientas::insertarRegistros($sql16);

		      // Inicializando Montos Presupesto de Egresos
		      if ($empresa->getPreegr()=='1')
		      {
		          $sql='Update "'.$simades.'".CPASIINI SET MONPRC = 0,MONCOM = 0,MONCAU = 0, MONPAG = 0, MONTRA = 0, MONTRN = 0,MONADI = 0,MONDIM = 0,MONAJU = 0, MONDIS = MonAsi';
		      }else {
		          $sql='Update "'.$simades.'".CPASIINI SET MONASI = 0,MONPRC = 0,MONCOM = 0,MONCAU = 0, MONPAG = 0, MONTRA = 0, MONTRN = 0,MONADI = 0,MONDIM = 0,MONAJU = 0, MONDIS = 0';
		      }
		      Herramientas::insertarRegistros($sql);

		      $sql16='Update "'.$simades.'".CPASIINI SET ANOPRE=\''.$elano.'\'';
		      Herramientas::insertarRegistros($sql16);

		      // Presupuesto Ingreso

		      $sql21='update "'.$simades.'".cidefniv set EtaDef=\'A\',fecini=\''.$fecini.'\',feccie=Last_Day(\''.$feclast.'\'),fecper=Last_Day(\''.$feclast.'\')';
		      Herramientas::insertarRegistros($sql21);

		      $sql22='update "'.$simades.'".cipereje set fecini=\''.$fecini.'\',feccie=Last_Day(\''.$feclast.'\')';
		      Herramientas::insertarRegistros($sql22);

		      $sql4='update "'.$simades.'".cipereje set fecdes=\''.$fecini.'\',fechas=Last_Day(\''.$fecini.'\') where pereje=\'01\'';
		      Herramientas::insertarRegistros($sql4);

		      $fecinifeb=$elano."-02-01";
		      $sql5='update "'.$simades.'".cipereje set fecdes=\''.$fecinifeb.'\',fechas=Last_Day(\''.$fecinifeb.'\') where pereje=\'02\'';
		      Herramientas::insertarRegistros($sql5);

		      $fecinimar=$elano."-03-01";
		      $sql6='update "'.$simades.'".cipereje set fecdes=\''.$fecinimar.'\',fechas=Last_Day(\''.$fecinimar.'\') where pereje=\'03\'';
		      Herramientas::insertarRegistros($sql6);

		      $feciniabr=$elano."-04-01";
		      $sql7='update "'.$simades.'".cipereje set fecdes=\''.$feciniabr.'\',fechas=Last_Day(\''.$feciniabr.'\') where pereje=\'04\'';
		      Herramientas::insertarRegistros($sql7);

		      $fecinimay=$elano."-05-01";
		      $sql8='update "'.$simades.'".cipereje set fecdes=\''.$fecinimay.'\',fechas=Last_Day(\''.$fecinimay.'\') where pereje=\'05\'';
		      Herramientas::insertarRegistros($sql8);

		      $fecinijun=$elano."-06-01";
		      $sql9='update "'.$simades.'".cipereje set fecdes=\''.$fecinijun.'\',fechas=Last_Day(\''.$fecinijun.'\') where pereje=\'06\'';
		      Herramientas::insertarRegistros($sql9);

		      $fecinijul=$elano."-07-01";
		      $sql10='update "'.$simades.'".cipereje set fecdes=\''.$fecinijul.'\',fechas=Last_Day(\''.$fecinijul.'\') where pereje=\'07\'';
		      Herramientas::insertarRegistros($sql10);

		      $feciniago=$elano."-08-01";
		      $sql11='update "'.$simades.'".cipereje set fecdes=\''.$feciniago.'\',fechas=Last_Day(\''.$feciniago.'\') where pereje=\'08\'';
		      Herramientas::insertarRegistros($sql11);

		      $fecinisep=$elano."-09-01";
		      $sql12='update "'.$simades.'".cipereje set fecdes=\''.$fecinisep.'\',fechas=Last_Day(\''.$fecinisep.'\') where pereje=\'09\'';
		      Herramientas::insertarRegistros($sql12);

		      $fecinioct=$elano."-10-01";
		      $sql13='update "'.$simades.'".cipereje set fecdes=\''.$fecinioct.'\',fechas=Last_Day(\''.$fecinioct.'\') where pereje=\'10\'';
		      Herramientas::insertarRegistros($sql13);

		      $fecininov=$elano."-11-01";
		      $sql14='update "'.$simades.'".cipereje set fecdes=\''.$fecininov.'\',fechas=Last_Day(\''.$fecininov.'\') where pereje=\'11\'';
		      Herramientas::insertarRegistros($sql14);

		      $fecinidic=$elano."-12-01";
		      $sql15='update "'.$simades.'".cipereje set fecdes=\''.$fecinidic.'\',fechas=Last_Day(\''.$fecinidic.'\') where pereje=\'12\'';
		      Herramientas::insertarRegistros($sql15);

		      // Inicializando Montos Presupesto de Ingresos
		      if ($empresa->getPreing()=='1')
		      {
		          $sql='Update "'.$simades.'".CIASIINI SET MONPRC = 0,MONCOM = 0,MONCAU = 0, MONPAG = 0, MONTRA = 0, MONTRN = 0,MONADI = 0,MONAJU = 0,MONDIM = 0, MONDIS = MONASI';
		      }else {
		          $sql='Update "'.$simades.'".CIASIINI SET MONASI = 0,MONPRC = 0,MONCOM = 0,MONCAU = 0, MONPAG = 0, MONTRA = 0, MONTRN = 0,MONADI = 0,MONAJU = 0,MONDIM = 0, MONDIS = 0';
		      }
		      Herramientas::insertarRegistros($sql);

		      $sql16='Update "'.$simades.'".CIASIINI SET ANOPRE=\''.$elano.'\'';
		      Herramientas::insertarRegistros($sql16);

		      // Tesoreria

		      $sql2='Update "'.$simades.'".opdefemp set NumINi=\'00000001\', corpagele=\'00000001\', cormovele=\'00000001\', corciecaj=\'00000001\'';
		      Herramientas::insertarRegistros($sql2);

           $sql22='Update "'.$simades.'".TSDEFCAJCHI set NumINi=\'00000001\'';
          Herramientas::insertarRegistros($sql22);

          $sql23='Update "'.$simades.'".TSDEFFONANT set NumINi=\'00000001\'';
          Herramientas::insertarRegistros($sql2);

          //Facturacion

          $sqln='Update "'.$simades.'".FACORRELAT SET CORPRE=0,CORPED=0,CORFAC=0,CORNOT=0,CORDPH=0,CORDEV=0,CORAJU=0,CODPRO=0,CORFACCONT=0, corprerot=0, corprepat=0, corantcli=0';
          Herramientas::insertarRegistros($sqln);

          $sqlq='Update "'.$simades.'".FADEFCAJ SET CORCAJ=0';
          Herramientas::insertarRegistros($sqlq);


          $sql4='update "'.$simades.'".faciemes set fecini=\''.$fecini.'\', fecdes=\''.$fecini.'\',feccie=Last_Day(\''.$fecini.'\'), fechas=Last_Day(\''.$fecini.'\') where pereje=\'01\'';
          Herramientas::insertarRegistros($sql4);

          $fecinifeb=$elano."-02-01";
          $sql5='update "'.$simades.'".faciemes set fecdes=\''.$fecinifeb.'\', fecini=\''.$fecinifeb.'\', fechas=Last_Day(\''.$fecinifeb.'\'), feccie=Last_Day(\''.$fecinifeb.'\') where pereje=\'02\'';
          Herramientas::insertarRegistros($sql5);

          $fecinimar=$elano."-03-01";
          $sql6='update "'.$simades.'".faciemes set fecini=\''.$fecinimar.'\', fecdes=\''.$fecinimar.'\',fechas=Last_Day(\''.$fecinimar.'\'), feccie=Last_Day(\''.$fecinimar.'\') where pereje=\'03\'';
          Herramientas::insertarRegistros($sql6);

          $feciniabr=$elano."-04-01";
          $sql7='update "'.$simades.'".faciemes set fecdes=\''.$feciniabr.'\',fechas=Last_Day(\''.$feciniabr.'\'), fecini=\''.$feciniabr.'\',feccie=Last_Day(\''.$feciniabr.'\') where pereje=\'04\'';
          Herramientas::insertarRegistros($sql7);

          $fecinimay=$elano."-05-01";
          $sql8='update "'.$simades.'".faciemes set fecdes=\''.$fecinimay.'\',fechas=Last_Day(\''.$fecinimay.'\'), fecini=\''.$fecinimay.'\',feccie=Last_Day(\''.$fecinimay.'\') where pereje=\'05\'';
          Herramientas::insertarRegistros($sql8);

          $fecinijun=$elano."-06-01";
          $sql9='update "'.$simades.'".faciemes set fecdes=\''.$fecinijun.'\',fechas=Last_Day(\''.$fecinijun.'\'), fecini=\''.$fecinijun.'\',feccie=Last_Day(\''.$fecinijun.'\') where pereje=\'06\'';
          Herramientas::insertarRegistros($sql9);

          $fecinijul=$elano."-07-01";
          $sql10='update "'.$simades.'".faciemes set fecdes=\''.$fecinijul.'\',fechas=Last_Day(\''.$fecinijul.'\'), fecini=\''.$fecinijul.'\',feccie=Last_Day(\''.$fecinijul.'\') where pereje=\'07\'';
          Herramientas::insertarRegistros($sql10);

          $feciniago=$elano."-08-01";
          $sql11='update "'.$simades.'".faciemes set fecdes=\''.$feciniago.'\',fechas=Last_Day(\''.$feciniago.'\'), fecini=\''.$feciniago.'\',feccie=Last_Day(\''.$feciniago.'\') where pereje=\'08\'';
          Herramientas::insertarRegistros($sql11);

          $fecinisep=$elano."-09-01";
          $sql12='update "'.$simades.'".faciemes set fecdes=\''.$fecinisep.'\',fechas=Last_Day(\''.$fecinisep.'\'), fecini=\''.$fecinisep.'\',feccie=Last_Day(\''.$fecinisep.'\') where pereje=\'09\'';
          Herramientas::insertarRegistros($sql12);

          $fecinioct=$elano."-10-01";
          $sql13='update "'.$simades.'".faciemes set fecdes=\''.$fecinioct.'\',fechas=Last_Day(\''.$fecinioct.'\'), fecini=\''.$fecinioct.'\',feccie=Last_Day(\''.$fecinioct.'\') where pereje=\'10\'';
          Herramientas::insertarRegistros($sql13);

          $fecininov=$elano."-11-01";
          $sql14='update "'.$simades.'".faciemes set fecdes=\''.$fecininov.'\',fechas=Last_Day(\''.$fecininov.'\'), fecini=\''.$fecininov.'\',feccie=Last_Day(\''.$fecininov.'\') where pereje=\'11\'';
          Herramientas::insertarRegistros($sql14);

          $fecinidic=$elano."-12-01";
          $sql15='update "'.$simades.'".faciemes set fecdes=\''.$fecinidic.'\',fechas=Last_Day(\''.$fecinidic.'\'), fecini=\''.$fecinidic.'\',feccie=Last_Day(\''.$fecinidic.'\') where pereje=\'12\'';
          Herramientas::insertarRegistros($sql15);

          $sql16='Update "'.$simades.'".faciemes set status=\'A\'';
          Herramientas::insertarRegistros($sql16);

          //Viaticos

          $sqlv='Update "'.$simades.'".VIADEFGEN SET NUMSOLVIA=0,NUMCALVIANAC=0,NUMCALVIAINT=0,NUMRELGASADI=0, corsolbol=0, corsoltra=0, corrensol=0';
          Herramientas::insertarRegistros($sqlv);

		      // Bancos

		      $sql3='update "'.$simades.'".tsdefban set debban=0,creban=0,deblib=0,crelib=0';
		      Herramientas::insertarRegistros($sql3);

          //Compras
          $sqlc='Update "'.$simades.'".cadefart set recart=\'1\',ordcom=\'1\',reqart=\'1\',dphart=\'1\',ordser=\'1\',solart=\'1\',solcom=\'1\',corcot=\'1\', cornac=0, corext=0, correc=\'1\', correq=\'1\', corord=\'1\', cordes=\'1\'';
          Herramientas::insertarRegistros($sqlc);

          $sqlc='Update "'.$simades.'".cacorrel set correc=\'1\', corsal=\'1\', corcot=\'1\', corcom=\'1\', corser=\'1\', correq=\'1\', corent=\'1\', corcont=\'1\', corsol=\'1\', corsolman=\'1\', corsolser=\'1\', cordes=\'1\'';
          Herramientas::insertarRegistros($sqlc);

          //ACTUALIZACION DE CORRELATIVOS ISLR, IVA, LTF Y COMPROBANTES –CONTABLES

          $sqlseq='select \'SELECT setval(\'||sequence_name||\', 1, true);\'  from information_schema.sequences
          where sequence_schema=\''.$simades.'\'
          AND SEQUENCE_NAME IN (\'correlativo_iva\', \'correlativo_ltf\', \'correlativo_islr\', \'contabc_numcom_seq\', \'cacorrel_seq_cordes\', \'cacorrel_seq_correq\', \'cacorrel_seq_corent\', \'cacorrel_seq_corsal\', \'cacorrel_seq_corajuoc\', \'viadefgen_seq_numsolvia\', \'viadefgen_seq_numcalvianac\', \'viadefgen_seq_numcalviaint\')';
          Herramientas::insertarRegistros($sqlseq);

	    return -1;
	  }catch (Exception $ex){
	  	echo $ex;
	  	exit();
	    return 0;
	  }
  }

  public static function grabarTablas($dat,$tablas)
  {
      try{
      	$c = new Criteria();
      	$c->add(ApernueperPeer::NOMTAB, $dat->getModulo().'%',Criteria::LIKE);
      	$reg = ApernueperPeer::doDelete($c);

      for ($i = 0; $i < count($tablas); $i++) {
          $newapertura= new Apernueper();
          $newapertura->setOrden($i);
          $newapertura->setNomtab($tablas[$i]);
          $newapertura->save();
      }

		return -1;
	} catch (Exception $ex){
	  return 0;
	}
  }

  public static function cargarResultados(){

   $arreglores=array();
   $i=0;
   $t= new Criteria();
   $resul=BdcriterioPeer::doSelect($t);
   if ($resul){

      foreach ($resul as $obj){
          $arreglores[$i]["criterio"]=$obj->getCriterio();
          $arreglores[$i]["temporal"]=$obj->getTemporal();
          $sql='select * from pg_class where upper(relname) = \''.strtoupper($obj->getTemporal()).'\'';
          if (Herramientas::BuscarDatos($sql,$result)){
              $sql1='DROP TABLE '.$obj->getTemporal().' CASCADE';
              Herramientas::insertarRegistros($sql1);
          }

          $sql1='CREATE  TABLE '.$obj->getTemporal().' AS ('.$obj->getSql().')';
          Herramientas::insertarRegistros($sql1);

          $sql2='select coalesce(Count(*),0) as cuantos from '.$obj->getTemporal().'';
          if (Herramientas::BuscarDatos($sql2,$resulta)){
          $arreglores[$i]["nroreg"]=$resulta[0]["cuantos"];
          }
          $arreglores[$i]["sql"]=$obj->getSql();
          $arreglores[$i]["id"]='9';
          $i++;
      }
   }
   return $arreglores;
  }

  public static function salvarPerfilGrupo($clasemodelo,$grid,$empresa)
  {
    $grupo=$clasemodelo->getCodgru();
    $codigoapli=explode('_',$clasemodelo->getCodapl());

    $c= new Criteria();
    $c->add(SeggruaplPeer::CODGRU,$grupo);
    $c->add(SeggruaplPeer::CODEMP,$empresa);
    $c->add(SeggruaplPeer::CODAPL,$codigoapli[1]);
    SeggruaplPeer::doDelete($c);

    $priv=false;
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]['priuse']!='')
      {
       $seggruapl= new Seggruapl();
       $seggruapl->setCodgru($grupo);
       $seggruapl->setCodemp($empresa);
       $seggruapl->setCodapl($codigoapli[1]);
       $seggruapl->setNomopc($x[$j]['nomopc']);
       $seggruapl->setDesopc($x[$j]['desopc']);
       $seggruapl->setPriuse($x[$j]['priuse']);
       $seggruapl->save();
       $priv=true;
}
      $j++;
    }

   // Agregando los privilegios minimos

    if ($clasemodelo->getAdmin()=='')
    {
      if ($priv==true)
      {
        $seggruapl= new Seggruapl();
        $seggruapl->setCodgru($grupo);
        $seggruapl->setCodemp($empresa);
        $seggruapl->setCodapl($codigoapli[1]);
        $seggruapl->setNomopc('menu');
        $seggruapl->setDesopc('menu');
        $seggruapl->setPriuse('15');
        $seggruapl->save();

        $seggruapl= new Seggruapl();
        $seggruapl->setCodgru($grupo);
        $seggruapl->setCodemp($empresa);
        $seggruapl->setCodapl($codigoapli[1]);
        $seggruapl->setNomopc('catalogo');
        $seggruapl->setDesopc('catalogo');
        $seggruapl->setPriuse('15');
        $seggruapl->save();

        $seggruapl= new Seggruapl();
        $seggruapl->setCodgru($grupo);
        $seggruapl->setCodemp($empresa);
        $seggruapl->setCodapl($codigoapli[1]);
        $seggruapl->setNomopc('confincomgen');
        $seggruapl->setDesopc('confincomgen');
        $seggruapl->setPriuse('15');
        $seggruapl->save();
      }
    }
   else
   {
        $seggruapl= new Seggruapl();
        $seggruapl->setCodgru($grupo);
        $seggruapl->setCodemp($empresa);
        $seggruapl->setCodapl($codigoapli[1]);
        $seggruapl->setNomopc('admin');
        $seggruapl->setDesopc('admin');
        $seggruapl->setPriuse('15');
        $seggruapl->save();

        $seggruapl= new Seggruapl();
        $seggruapl->setCodgru($grupo);
        $seggruapl->setCodemp($empresa);
        $seggruapl->setCodapl($codigoapli[1]);
        $seggruapl->setNomopc('menu');
        $seggruapl->setDesopc('menu');
        $seggruapl->setPriuse('15');
        $seggruapl->save();

        $seggruapl= new Seggruapl();
        $seggruapl->setCodgru($grupo);
        $seggruapl->setCodemp($empresa);
        $seggruapl->setCodapl($codigoapli[1]);
        $seggruapl->setNomopc('catalogo');
        $seggruapl->setDesopc('catalogo');
        $seggruapl->setPriuse('15');
        $seggruapl->save();

        $seggruapl= new Seggruapl();
        $seggruapl->setCodgru($grupo);
        $seggruapl->setCodemp($empresa);
        $seggruapl->setCodapl($codigoapli[1]);
        $seggruapl->setNomopc('confincomgen');
        $seggruapl->setDesopc('confincomgen');
        $seggruapl->setPriuse('15');
        $seggruapl->save();
    }

    //Chequeamos si hay usuarios que ya tienen ese asociado ese grupo.
    $empresa=sfContext::getInstance()->getUser()->getAttribute('empresa');
    $p= new Criteria();
    $p->add(UsuariosPeer::CODGRU,$grupo);
    $trajo=UsuariosPeer::doSelect($p);
    if ($trajo)
    {
        foreach ($trajo as $obj)
        {
         $t= new Criteria();
         $t->add(SeggruaplPeer::CODGRU,$obj->getCodgru());
         $t->add(SeggruaplPeer::CODEMP,$empresa);
         $result= SeggruaplPeer::doSelect($t);
         if ($result)
         {
            $c= new Criteria();
            $c->add(ApliUserPeer::LOGUSE,$obj->getLoguse());
            $c->add(ApliUserPeer::CODEMP,$empresa);
            ApliUserPeer::doDelete($c);
            foreach ($result as $obj2)
            {
                $apliuser= new ApliUser();
                $apliuser->setLoguse($obj->getLoguse());
                $apliuser->setCodemp($empresa);
                $apliuser->setCodapl($obj2->getCodapl());
                $apliuser->setNomopc($obj2->getNomopc());
                $apliuser->setDesopc($obj2->getDesopc());
                $apliuser->setPriuse($obj2->getPriuse());
                $apliuser->save();
            }
         }
        }
    }
  }

   public static function SalvarProcesosEspeciales($segperesp, $grid)
    {
       $t= new Criteria();
       $t->add(SegperespPeer::CEDEMP,$segperesp->getCedemp());
       $t->add(SegperespPeer::PASUSE,$segperesp->getPasuse());
       SegperespPeer::doDelete($t);

        $x=$grid[0];
        $j=0;
        while ($j<count($x)){
            if($x[$j]->getMarca()=="1"){
               $segperespG = new Segperesp();
               $segperespG->setCedemp($segperesp->getCedemp());
               $segperespG->setPasuse($segperesp->getPasuse());
	       $segperespG->setProceso($x[$j]->getProceso());
	       $segperespG->setCodapl($x[$j]->getCodapl());
               $segperespG->save();
            }
          $j++;
        }

    }

  public static function salvarAsoCatUsu($clasemodelo, $grid)
    {
       $t= new Criteria();
       $t->add(SegcatusuPeer::LOGUSE,$clasemodelo->getLoguse());
       SegcatusuPeer::doDelete($t);

       $gracatdir=H::getConfApp2('gracatdir', 'autenticacion', 'segasocatusu');
       if ($gracatdir=='S'){
        $l= new Criteria();
        $l->add(SegdirusuPeer::LOGUSE,$clasemodelo->getLoguse());
        SegdirusuPeer::doDelete($l);
       }

        $x=$grid[0];
        $j=0;
        while ($j<count($x)){
            if($x[$j]->getCheck()=="1"){
              $h= new Criteria();
              $h->add(NpcatprePeer::CODCAT,$x[$j]->getCodcat());
              $regh= NpcatprePeer::doSelectOne($h);
              if ($regh) {
               $x[$j]->setLoguse($clasemodelo->getLoguse());
               $x[$j]->save();
               if ($gracatdir=='S'){                 
                  $segdirusu_new= new Segdirusu();
                  $segdirusu_new->setLoguse($clasemodelo->getLoguse());
                  $segdirusu_new->setCoddirec($x[$j]->getCodcat());
                  $segdirusu_new->save();     
               }
             }
            }
          $j++;
        }

    }

  public static function salvarAsoUbiUsu($clasemodelo, $grid)
    {
       $t= new Criteria();
       $t->add(SegubausuPeer::LOGUSE,$clasemodelo->getLoguse());
       SegubausuPeer::doDelete($t);

        $x=$grid[0];
        $j=0;
        while ($j<count($x)){
            if($x[$j]->getCheck()=="1"){
               $x[$j]->setLoguse($clasemodelo->getLoguse());
               $x[$j]->save();
            }
          $j++;
        }

    }

    public static function salvarAsoCajUsu($clasemodelo, $grid)
    {
       $t= new Criteria();
       $t->add(SegcajusuPeer::LOGUSE,$clasemodelo->getLoguse());
       SegcajusuPeer::doDelete($t);

        $x=$grid[0];
        $j=0;
        while ($j<count($x)){
            if($x[$j]->getCheck()=="1"){
               $x[$j]->setLoguse($clasemodelo->getLoguse());
               $x[$j]->save();
            }
          $j++;
        }

    }

  public static function salvarAsoCenUsu($clasemodelo, $grid)
  {
     $t= new Criteria();
     $t->add(SegcenusuPeer::LOGUSE,$clasemodelo->getLoguse());
     SegcenusuPeer::doDelete($t);

      $x=$grid[0];
      $j=0;
      while ($j<count($x)){
          if($x[$j]->getCheck()=="1"){
             $x[$j]->setLoguse($clasemodelo->getLoguse());
             $x[$j]->save();
          }
        $j++;
      }

  }

  public static function salvarAsoNomUsu($clasemodelo, $grid)
    {
       $t= new Criteria();
       $t->add(SegusunomPeer::LOGUSE,$clasemodelo->getLoguse());
       SegusunomPeer::doDelete($t);

        $x=$grid[0];
        $j=0;
        while ($j<count($x)){
            if($x[$j]->getCheck()=="1"){
               $x[$j]->setLoguse($clasemodelo->getLoguse());
               $x[$j]->save();
            }
          $j++;
        }

    }

  public static function salvarAsoConUsu($clasemodelo, $grid)
  {
     $t= new Criteria();
     $t->add(SegconusuPeer::LOGUSE,$clasemodelo->getLoguse());
     SegconusuPeer::doDelete($t);

      $x=$grid[0];
      $j=0;
      while ($j<count($x)){
          if($x[$j]->getCheck()=="1"){
             $x[$j]->setLoguse($clasemodelo->getLoguse());
             $x[$j]->save();
          }
        $j++;
      }

  }

  public static function salvarAsoDirUsu($clasemodelo, $grid)
    {
       $t= new Criteria();
       $t->add(SegdirusuPeer::LOGUSE,$clasemodelo->getLoguse());
       SegdirusuPeer::doDelete($t);

        $x=$grid[0];
        $j=0;
        while ($j<count($x)){
            if($x[$j]->getCheck()=="1"){
              $h= new Criteria();
              $h->add(CadefdirecPeer::CODDIREC,$x[$j]->getCoddirec());
              $regh= CadefdirecPeer::doSelectOne($h);
              if ($regh){
               $x[$j]->setLoguse($clasemodelo->getLoguse());
               $x[$j]->save();
             }
            }
          $j++;
        }

    }

}

?>
