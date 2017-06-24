<?php
/**
 * Ingresos: Clase estática para el control de ingresos
 *
 * @package    Roraima
 * @subpackage ingresos
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Ingresos.class.php 38785 2010-06-11 19:39:38Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Ingresos
{
  //Guarda los detalles del traslado
  public static function salvarDetalletraslado($citrasla, $grid)
  {
    try{
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getCodori()<>'' and $x[$j]->getMonmov()<>0){
        $x[$j]->setReftra($citrasla->getReftra());
        $x[$j]->setStamov('A');
        $x[$j]->save();
      }
     $j++;
    }

    $z=$grid[1];
    $j=0;
    while ($j<count($z))
    {
      $z[$j]->delete();
      $j++;
    }
    return -1;

    } catch (Exception $ex){
      return 0;
    }
  }

  //Guarda el detalle del nivel presupuestario
  public static function salvarNiveles($cidefniv, $grid){

  	$t= new Criteria();
  	CinivelesPeer::doDelete($t);

    $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {

        $x[$j]->setConsec($j+1);
        $x[$j]->setStaniv('A');
        $x[$j]->save();

     $j++;
      }

      $z=$grid[1];
      $j=0;
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }

  }

  public static function ListaCatpar()
  {

    $tipo = array('C' => 'Categoría', 'P' => 'Partida');

    return $tipo;

  }

  public static function ListaPeriodos()
  {
     $c = new Criteria();
     $lista= CiperejePeer::doSelect($c);
     $per = array();
     foreach($lista as $obj)
       {
     $per += array($obj->getPereje() => $obj->getPereje());
     }
     return $per;
  }
  //Guarda los detalles de las Adiciones/Disminuciones
    public static function salvarMovadi($ciadidis, $grid)
    {
      try{
        $x     = $grid[0];
        $j     = 0;
        $fecha = $ciadidis->getFecadi();
        $sql   = "select pereje from cipereje where '".$fecha."'>=fecdes and '".$fecha."'<=fechas";

        if (H::BuscarDatos($sql,$dato))
        {
          while ($j<count($x))
          {
            $x[$j]->setRefadi($ciadidis->getRefadi());
            $x[$j]->setPerpre($dato[0]["pereje"]);
            $x[$j]->setStamov('A');
            $x[$j]->save();
           $j++;
          }

          $z=$grid[1];
          $j=0;
          while ($j<count($z))
          {
            $z[$j]->delete();
            $j++;
          }
        }else{
          return 0;
        }

      return -1;
    } catch (Exception $ex){
      return 0;
    }

  }
  //Guarda los movimientos del ajuste
    public static function salvarMovaju($ciajuste, $grid, $refiere){

    $x=$grid[0];
      $j=0;
      if ($refiere=='S'){


    $monto=$x[$j]->getMonaju();

      while ($j<count($x))
      {

    if ($x[$j]->getCodpre()!=''){

        $cimovaju= new Cimovaju();
        $cimovaju->setRefaju($ciajuste->getRefaju());
        $cimovaju->setCodpre($x[$j]->getCodpre());
        $cimovaju->setMonaju($monto);
        $cimovaju->setStamov('A');
        //H::printR($cimovaju);exit;
        $cimovaju->save();

    }

        $j++;

        }

      }else{

      while ($j<count($x))
      {
    $x[$j]->setRefaju($ciajuste->getRefaju());
        $x[$j]->setStamov('A');
        $x[$j]->save();

     $j++;
      }

      }

      $z=$grid[1];
      $j=0;
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }

  }

  //Guarda los detalles del ingreso
  public static function salvarImping($cireging, $grid, &$previsto=true)
  {
    $x = $grid[0];
    $j = 0;
    $previsto = true;
    //Cambio de Moneda
    $moneda=$cireging->getCodmon();
    $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
    $mandev=H::getConfApp2('mandev', 'ingresos', 'ingreging');
    if ($moneda2!=$moneda)
            $valor=$cireging->getValmon();
    else
        $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);
    $acum1=0;
    $acum2=0;
    $acum3=0;
    $acum4=0;
    while ($j<count($x))
    {
      $x[$j]->setRefing($cireging->getRefing());
      $x[$j]->setFecing($cireging->getFecing());
      if ($moneda2!=$moneda)
      {
        if ($mandev=='S' && $x[$j]->getDeving()=='S'){
          $x[$j]->setMoning(($x[$j]->getMoning()*-1)*$valor);
          $x[$j]->setMontot(($x[$j]->getMontot()*-1)*$valor);
        }
        else{
          $x[$j]->setMoning($x[$j]->getMoning()*$valor);
          $x[$j]->setMontot($x[$j]->getMontot()*$valor);
        }
        $x[$j]->setMonrec($x[$j]->getMonrec()*$valor);
        $x[$j]->setMondes($x[$j]->getMondes()*$valor);
        
      }else {
        if ($mandev=='S' && $x[$j]->getDeving()=='S') {
          $x[$j]->setMoning($x[$j]->getMoning()*-1);
          $x[$j]->setMontot($x[$j]->getMontot()*-1);
        }
      }
      
      $acum1 += $x[$j]->getMoning();
      $acum2 += $x[$j]->getMonrec();
      $acum3 += $x[$j]->getMondes();
      $acum4 += $x[$j]->getMontot();
      $x[$j]->setMonaju(0);
      $x[$j]->setStaimp('A');

      //Buscar si es previsto
      if (!(self::Es_Previsto($x[$j]->getCodpre(),$x[$j]->getMoning())))
      {
        $previsto = false;
      }
      $x[$j]->save();
      $j++;
    }
    
    $cireging->setMoning($acum1);
    $cireging->setMonrec($acum2);
    $cireging->setMondes($acum3);
    $cireging->setMontot($acum4);
    $cireging->save();
    $z=$grid[1];
    $j=0;
    while ($j<count($z))
    {
      $z[$j]->delete();
      $j++;
    }
  }

  public static function Es_Previsto($codpre,$moning)
  {
    $PeriodoAsignacion = "00";
    $feccie = substr(Herramientas::getX('Codemp','Cidefniv','feccie','001'),0,4);
    $sql="select sum(monasi) as monasi, sum(monprc) as monprc from ciasiini where codpre like '$codpre%' and anopre='$feccie' and perpre='$PeriodoAsignacion' ";

    $valor = false;
    if (Herramientas :: BuscarDatos($sql, $result))
    {
      if (($moning + $result[0]['monprc']) <= $result[0]['monasi']){
        $valor = true;
      }
    }
    return $valor;

  }

  //Guarda los periodos del nivel presupuestario
  public static function salvarPereje($cidefniv, $grid)
  {
      $x = $grid[0];
      $j = 0;

      $sql="delete from cipereje";
      H::insertarRegistros($sql);

      while ($j<count($x))
      {
        $cipereje= new Cipereje();

        $cipereje->setPereje($x[$j]["pereje"]);
        $cipereje->setFecdes($x[$j]["fecdes"]);
        $cipereje->setFechas($x[$j]["fechas"]);
        $cipereje->setFecini($cidefniv->getFecini());
        $cipereje->setFeccie($cidefniv->getFeccie());
        $cipereje->setCerrado('N');

        if ($x[$j]["pereje"]!=''){
          $cipereje->save();
        }
        $j++;
      }
  }

  public static function GrabarGrid($ciasiini, $grid)
  {
    try{
      $x = $grid[0];

      $c= new Criteria();
      $c->add(CiasiiniPeer::CODPRE,$ciasiini->getCodpre());
      $c->add(CiasiiniPeer::ANOPRE,$ciasiini->getAnopre());
      $c->add(CiasiiniPeer::PERPRE,'00',Criteria::NOT_EQUAL);
      CiasiiniPeer::doDelete($c);

      $j = 0;
      while ($j < count($x)) {
          $c = new Ciasiini();
          $c->setCodpre($ciasiini->getCodpre());
          $c->setNompre($ciasiini->getNompre());
          $c->setPerpre($x[$j]["perpre"]);
          $c->setAnopre($ciasiini->getAnopre());
          $c->setMonasi($x[$j]["monasi"]);
          $c->setMondis($x[$j]["monasi"]);
        $c->setMonprc('0');
        $c->setMoncom('0');
        $c->setMoncau('0');
        $c->setMonpag('0');
        $c->setMontra('0');
        $c->setMontrn('0');
        $c->setMonadi('0');
        $c->setMondim('0');
        $c->setMonaju('0');
        $c->setDifere('0');
          $c->setStatus('A');
          $c->save();
        $j++;
      }

    return -1;

  } catch (Exception $ex){
    return 0;
  }
  }

  //Guarda los detalles de la Estimacion Inicial
  public static function salvarEstimacion($ciasiini, $grid)
  {
    if (self::GrabarGrid($ciasiini, $grid)!= -1){ return 0; }
    $ciasiini->setPerpre('00');
    $ciasiini->setNompre($ciasiini->getNompre());
    $ciasiini->setStatus('A');
    $ciasiini->setMonprc('0');
    $ciasiini->setMoncom('0');
    $ciasiini->setMoncau('0');
    $ciasiini->setMonpag('0');
    $ciasiini->setMontra('0');
    $ciasiini->setMontrn('0');
    $ciasiini->setMonadi('0');
    $ciasiini->setMondim('0');
    $ciasiini->setMonaju('0');
    $ciasiini->setDifere('0');
    $ciasiini->setMondis($ciasiini->getMonasi());
    $ciasiini->save();
    return -1;
  }


  public static function generarperiodos($fecha,$incmes,$fecfinal,$numper,$contador){

  $datos=array();
  $datos='';
    //if($fecha<$fecfinal && $contador<=$numper){


      $fecha1=$fecha;
      $fecini=substr($fecha,6,4)."-".substr($fecha,3,2)."-".substr($fecha,0,2);
      $fecfin=H::dateAdd('d',-1,(H::dateAdd('m',(int)$incmes,$fecini,'+')),'+');

    //}

      if ($contador<10){
        $per="0".(string)$contador;

      }else{
        $per=(string)$contador;
      }


    $datos[0]=$per;
    $datos[1]=$fecha1;
    $datos[2]=substr($fecfin,8,2)."/".substr($fecfin,5,2)."/".substr($fecfin,0,4);


  return $datos;
  }

  public static function movimientos(){

    $c = new Criteria();
    $ingresos = CiregingPeer::doSelectOne($c);

    $c = new Criteria();
    $adiciones = CiadidisPeer::doSelectOne($c);

    $c = new Criteria();
    $ajuste = CiajustePeer::doSelectOne($c);

    $c = new Criteria();
    $asignacion = CiasiiniPeer::doSelectOne($c);

    $c = new Criteria();
    $traslados = CitraslaPeer::doSelectOne($c);

  if ($ingresos or $adiciones or $ajuste or $asignacion or $traslados){

    return 1;
  }else{

    return 0 ;
  }

  }

  public static function generar_movimientos_segun_libros($cireging,$grid2)
  {
    $grabocontabilidad = true;
    $cardeplot=H::getConfApp2('cardeplot', 'ingresos', 'ingreging');
    $fechaunica=H::getConfApp2('fechaunica', 'ingresos', 'ingreging');
    if ($cardeplot=='S'){
      $x=$grid2[0];
      $j=0;
      while ($j<count($x))
      {
        if ($x[$j]->getNumcue()!='' && $x[$j]->getNumdep()!='' && $x[$j]->getTipmov()!='' && $x[$j]->getMondep()>0){
          $x[$j]->setRefing($cireging->getRefing());
          $tsmovlib = new Tsmovlib();
          $tsmovlib->setNumcue($x[$j]->getNumcue());
          $tsmovlib->setReflib($x[$j]->getNumdep());
          $tsmovlib->setCedrif($cireging->getRifcon());
          if ($fechaunica=='S')
            $tsmovlib->setFeclib($cireging->getFecing());
          else
            $tsmovlib->setFeclib($x[$j]->getFecha());
          $tsmovlib->setFecing($cireging->getFecing());
          $tsmovlib->setTipmov($x[$j]->getTipmov());
          $tsmovlib->setMonmov($x[$j]->getMondep());
          $tsmovlib->setCodcta(H::getX_vacio('NUMCUE','Tsdefban','Codcta',$x[$j]->getNumcue()));
          $tsmovlib->setDeslib($cireging->getDesing());
          $tsmovlib->setStatus('C');
          $tsmovlib->setStacon('N');
          if ($grabocontabilidad){
            $tsmovlib->setStatus('C');   //Contabilizado
            $tsmovlib->setFeccom($cireging->getFecing());
            $tsmovlib->setNumcom($cireging->getNumcom());
          }else{
            $tsmovlib->setStatus('N');
            $tsmovlib->setNumcom('');
            $tsmovlib->setCodcta('');
            $tsmovlib->setFeccom('NULO');         
          }
          $moneda=$cireging->getCodmon();
          $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
          if ($moneda2!=$moneda)
              $valor=$cireging->getValmon();
          else
              $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);
          $tsmovlib->setCodmon($moneda);
          $tsmovlib->setValmon($valor);  
          $tsmovlib->save();

         $x[$j]->save();
        }
       $j++;
      }
    }else {
      $tsmovlib = new Tsmovlib();
      $tsmovlib->setNumcue($cireging->getCtaban());
      $tsmovlib->setReflib($cireging->getNumdep());
      $tsmovlib->setCedrif($cireging->getRifcon());
      if ($cireging->getFecdep()!="")
        $tsmovlib->setFeclib($cireging->getFecdep());
      else $tsmovlib->setFeclib($cireging->getFecing());
      $tsmovlib->setFecing($cireging->getFecing());
      $tsmovlib->setTipmov($cireging->getTipmov());
      $tsmovlib->setMonmov($cireging->getMontot());
      $tsmovlib->setCodcta($cireging->getCtaban());
      $tsmovlib->setDeslib($cireging->getDesing());
      $tsmovlib->setStatus('C');
      $tsmovlib->setStacon('N');
      if ($grabocontabilidad){
        $tsmovlib->setStatus('C');   //Contabilizado
        $tsmovlib->setFeccom($cireging->getFecing());
        $tsmovlib->setNumcom($cireging->getNumcom());

      }else{
        $tsmovlib->setStatus('N');
        $tsmovlib->setNumcom('');
        $tsmovlib->setCodcta('');
        $tsmovlib->setFeccom('NULO');
      }
      $moneda=$cireging->getCodmon();
      $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
      if ($moneda2!=$moneda)
        $valor=$cireging->getValmon();
      else
        $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);
      $tsmovlib->setCodmon($moneda);
      $tsmovlib->setValmon($valor);  
      $tsmovlib->save();
    }
  }//Fin generar_movimientos_segun_libros()


  public static function generar_msl_anulado($cireging)
  {
    try{
    $cardeplot=H::getConfApp2('cardeplot', 'ingresos', 'ingreging');
    if ($cardeplot=='S'){
      $q= new Criteria();
      $q->add(CidepingPeer::REFING,$cireging->getRefing());
      $regq= CidepingPeer::doSelect($q);
      if ($regq)
      {
        foreach ($regq as $objregq) {
          $c= new Criteria();
          $c->add(TsmovlibPeer::NUMCUE,$objregq->getNumcue());
          $c->add(TsmovlibPeer::REFLIB,$objregq->getNumdep());
          $c->add(TsmovlibPeer::TIPMOV,$objregq->getTipmov());
          $datos=TsmovlibPeer::doSelectOne($c);
          if ($datos){
              if ($datos->getStacon()!='C'){
                $tsmovlibnew= new Tsmovlib();
                $tsmovlibnew->setNumcue($datos->getNumcue());
                $tsmovlibnew->setReflib('A'.substr($objregq->getNumdep(),1,strlen($objregq->getNumdep())));
                $tsmovlibnew->setCedrif($cireging->getCedrif());
                $tsmovlibnew->setFeclib($cireging->getFecanu());
                $tsmovlibnew->setTipmov("ANUD");
                $tsmovlibnew->setMonmov($datos->getMonmov());
                $tsmovlibnew->setNumcom($cireging->getNumcom());
                $tsmovlibnew->setCodcta($datos->getCodcta());
                $tsmovlibnew->setFeccom($cireging->getFecing());
                $tsmovlibnew->setStatus('C');
                $tsmovlibnew->setStacon('C');
                $tsmovlibnew->setDeslib('Ingreso Anulado');
                $tsmovlibnew->setReflibpad($datos->getReflib());
                $tsmovlibnew->setTipmovpad($objregq->getTipmov());
                $tsmovlibnew->save();

                self::actualiza_bancos2($objregq,'A','C');
              }
          }
        }
      }
    }else {
      $c= new Criteria();
      $c->add(TsmovlibPeer::NUMCUE,$cireging->getCtaban());
      $c->add(TsmovlibPeer::REFLIB,$cireging->getNumdep());
      $c->add(TsmovlibPeer::TIPMOV,$cireging->getTipmov());
      $datos=TsmovlibPeer::doSelectOne($c);
      if ($datos){
          if ($datos->getStacon()!='C'){

            $tsmovlibnew= new Tsmovlib();
            $tsmovlibnew->setNumcue($datos->getNumcue());
            $tsmovlibnew->setReflib('A'.substr($cireging->getNumdep(),1,strlen($cireging->getNumdep())));
            $tsmovlibnew->setCedrif($cireging->getCedrif());
            /*if ($cireging->getFecdep()!="")
            $tsmovlibnew->setFeclib($cireging->getFecdep());
            else $tsmovlibnew->setFeclib($cireging->getFecing());*/
            $tsmovlibnew->setFeclib($cireging->getFecanu());
            $tsmovlibnew->setTipmov("ANUD");
            $tsmovlibnew->setMonmov($datos->getMonmov());
            $tsmovlibnew->setNumcom($cireging->getNumcom());
            $tsmovlibnew->setCodcta($datos->getCodcta());
            $tsmovlibnew->setFeccom($cireging->getFecing());
            $tsmovlibnew->setStatus('C');
            $tsmovlibnew->setStacon('C');
            $tsmovlibnew->setDeslib('Ingreso Anulado');
            $tsmovlibnew->setReflibpad($datos->getReflib());
            $tsmovlibnew->setTipmovpad($cireging->getTipmov());
            $tsmovlibnew->save();

            self::actualiza_bancos($cireging,'A','C');


          }else{
             return 'El movimiento según libros está CONCILIADO, No puede ser Anulado';

          }
      }
    }
    return -1;
    } catch (Exception $ex){
      return 0;
    }

  }//Fin generar_msl_anulado()

  public static function actualiza_bancos($cireging,$accion,$debcre){

  $c= new Criteria();
  $c->add(TsdefbanPeer::NUMCUE,$cireging->getCtaban());
  $datos=TsdefbanPeer::doSelectOne($c);
  if ($debcre=='D'){

    if ($accion='A'){
       $debito=$datos->getDeblib();
       $total=$debito+$cireging->getMontot();
       $datos->setDeblib($total);
       $datos->save();

    }elseif($accion='E'){
       $debito=$datos->getDeblib();
       $total=$debito-$cireging->getMontot();
       $datos->setDeblib($total);
       $datos->save();

    }

  }elseif($debcre=='C'){

  if ($accion='A'){
       $credito=$datos->getCrelib();
       $total=$credito+$cireging->getMontot();
       $datos->setCrelib($total);
       $datos->save();

    }elseif($accion='E'){
       $credito=$datos->getCrelib();
       $total=$credito-$cireging->getMontot();
       $datos->setCrelib($total);
       $datos->save();

    }

  }

 }//Fin actualiza_bancos()


///Comprobante*******************REVISAR**************
public static function incluir_asiento($cuenta,$descripcion,$referencia,$debcre,$monasi,$asiento){

  //asiento es el arreglo que contiene todos los datos del grid

  $ind=0;
  $enc=false;
  $numasientos=count($asiento);

  while ($ind<$numasientos and $enc==false){

    if ($asiento->getCodcta()==$cuenta  and $asiento->getDebcre()==$debcre){
      $enc=true;
    }else{
      $ind=$ind+1;
    }

  }


  if ($enc==false){

    $asiento[$numasientos]->setCuenta($cuenta);
    $asiento[$numasientos]->setDescripcion($descripcion);
    $asiento[$numasientos]->setReferencia($referencia);
    $asiento[$numasientos]->setDebcre($debcre);
    $asiento[$numasientos]->setMonasi($monasi);

  }else{

    $asiento->setMonasi($asiento->getMonasi()+$monasi);
  }


}// fin incluir asiento

public static function eliminar_comprobante($cireging){

  $c= new Criteria();
  $c->add(ContabcPeer::NUMCOM,$cireging->getRefing());
  $c->add(ContabcPeer::FECCOM,$cireging->getFecing());
  $datos=ContabcPeer::doSelect($c);

  if ($datos){

  foreach ($datos as $per2){
        $per2->delete();
    }

    $c= new Criteria();
  $c->add(Contabc1Peer::NUMCOM,$cireging->getRefing());
  $c->add(Contabc1Peer::FECCOM,$cireging->getFecing());
  $datos=Contabc1Peer::doSelect($c);

  foreach ($datos as $per2){
        $per2->delete();
    }

  }else{
    return 'El comprobante Nro. '.$cireging->getRefing().' no fué eliminado';
  }


}// fin eliminar_comprobante

public static function generar_comprobante($cireging,$arreglo=array()){

  $numerocomprobante=$cireging->getRefing();

  $c= new Criteria();
  $c->add(TsdefbanPeer::NUMCUE,$cireging->getCtaban());
  $datos=TsdefbanPeer::doSelectOne($c);

  $descripcion=$datos->getNomcue();

  self::incluir_asiento($cireging->getCtaban(),$descripcion,$numerocomprobante,'D',$cireging->getMontot(),$arreglo);

  $ind=0;
  $numreg=count($arreglo);
  while ($ind<$numreg){

    $c1= new Criteria();
    $c1->add(CideftitPeer::CODPRE,$arreglo[$ind]->getCodpre());
    $dat=CideftitPeer::doSelectone();

    if ($dat){

      if ($dat->getCodcta()!=''){
        $codigocuenta=$dat->getCodcta();
      }else{
        $codigocuenta='';
      }

    }

    $c2= new Criteria();
    $c2->add(ContabbPeer::CODCTA,$codigocuenta);
    $d=ContabbPeer::doSelect($c2);

    if ($d){
      self::incluir_asiento($d->getCodcta(),$d->getDescta(),$numerocomprobante,'C',$arreglo[$ind]->getMontot(),$arreglo[$ind]);
    }else{
      return 'El Código presupuestario '.$arreglo[$ind]->getCodpre().' no tiene un código contable asociado';
    }

    $ind++;
  }


}// fin generar_comprobante


public static function buscar_comprobante($cireging,$accion,$fecanu){

  if ($accion=='E'){

    $c= new Criteria();
    $c->add(ContabcPeer::NUMCOM,$cireging->getNumcom());
    $contabc=ContabcPeer::doSelectOne($c);
    if ($contabc){

      $c1= new Criteria();
      $c1->add(Contabc1Peer::NUMCOM,$cireging->getNumcom());
      $contabc1=Contabc1Peer::doSelect($c);
      if ($contabc1){

        $c1= new Criteria();
        $c1->add(Contabc1Peer::NUMCOM,$cireging->getNumcom());
        $asiento=Contabc1Peer::doSelect($c);

        if(count($contabc1)==count($asiento)){
          $eliminar = true;
        }else{
          $eliminar = false;
        }

        $c1= new Criteria();
        $c1->add(Contabc1Peer::NUMCOM,$cireging->getNumcom());
        Contabc1Peer::doDelete($c);

        if ($eliminar){
          $c= new Criteria();
          $c->add(ContabcPeer::NUMCOM,$cireging->getNumcom());
          ContabcPeer::doDelete($c);
        }

      }

      }else{ return 'El comprobante Nro. '.$cireging->getNumcom().' no fué anulado'; }

  }else{

    $c= new Criteria();
    $c->add(ContabcPeer::NUMCOM,$cireging->getNumcom());
    $contabc=ContabcPeer::doSelectOne($c);
    if ($contabc){

    	$confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
        if ($confcorcom=='N')
         $numcom2="A".substr($cireging->getRefing(),1,7);
        else { $numcom2 = Comprobante::Buscar_Correlativo($fecanu);
            $antponera="";
            $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
            if ($varemp) {
            if(array_key_exists('generales',$varemp)) {
               if(array_key_exists('antponera',$varemp['generales']))
               {
                $antponera=$varemp['generales']['antponera'];
               }
              }
            }
            if ($antponera=='S')
            {
                $numcom2= 'A'.substr($numcom2,1,7);
            }
        }
        
      $tcontabc= new Contabc();

      $tcontabc->setNumcom($numcom2);
      $tcontabc->setFeccom($fecanu);
      $tcontabc->setReftra($contabc->getReftra());
      $tcontabc->setDescom($contabc->getDescom());
      $tcontabc->setStacom('D');
      $tcontabc->setTipcom('');
      $tcontabc->setMoncom($contabc->getMoncom());
      $tcontabc->save();

      $c= new Criteria();
      $c->add(Contabc1Peer::NUMCOM,$cireging->getNumcom());
      $contabc1=Contabc1Peer::doSelect($c);

      foreach ($contabc1 as $per){
        $tcontabc1= new Contabc1();
        $tcontabc1->setNumcom($numcom2);
        $tcontabc1->setFeccom($fecanu);
        $tcontabc1->setCodcta($per->getCodcta());
        $tcontabc1->setNumasi($per->getNumasi());
        $tcontabc1->setRefasi($per->getRefasi());
        $tcontabc1->setDesasi($per->getDesasi());
        $tcontabc1->setMonasi($per->getMonasi());

        if ($per->getDebcre()=='D'){ $tcontabc1->setDebcre('C');}
        else{ $tcontabc1->setDebcre('D');}

        $tcontabc1->save();
      }

    }else{
      return 'El comprobante Nro. '.$cireging->getNumcom().' no fué anulado';
    }
  }

  return -1;

}///Fin buscar_comprobante


  public static function grabarComprobante($cireging,$grid,$grid2,&$arrcompro,&$msjuno)
  {
    $mensaje="";
    $numeroorden="";
    $r='';
    $cardeplot=H::getConfApp2('cardeplot', 'ingresos', 'ingreging');
    $comctarec=H::getConfApp2('comctarec', 'ingresos', 'ingreging');
    $comctades=H::getConfApp2('comctades', 'ingresos', 'ingreging');
    $mandev=H::getConfApp2('mandev', 'ingresos', 'ingreging');
    if ($cireging->getRefing()=='########')
    {
      if (Herramientas::getVerCorrelativo('coring','cidefniv',$r))
      {
         $encontrado=false;
         while (!$encontrado)
         {
          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
          $c= new Criteria();
          $c->add(CiregingPeer::REFING,$numero);
          $resul= CiregingPeer::doSelectOne($c);
          if ($resul)
          {
            $r=$r+1;
          }
          else
          {
            $encontrado=true;
          }
         }
         $numorden=$numero;
      }
    }else{
      $numorden=str_replace('#','0',$cireging->getRefing());
    }

    //$numerocomprob = $numeroorden;
    //$numerocomprob=Comprobante::Buscar_Correlativo();
     $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
    if ($confcorcom=='N')
    {
      $numerocomprob= $numorden;
    }else $numerocomprob= '########';
    $reftra=$numorden;
    $cuentaporpagarrendicion = "";
    $moneda=$cireging->getCodmon();
    $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
    if ($moneda2!=$moneda)
            $valor=$cireging->getValmon();
    else
        $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);

    $codctarec=H::getX_vacio('CODEMP', 'Cidefniv', 'Codctarec', '001');
    $codctades=H::getX_vacio('CODEMP', 'Cidefniv', 'Codctades', '001');

    $codigocuenta = "";
    $tipo  = "";
    $des   = "";
    $monto = "";

    $codigocuentas = "";
    $tipo1  = "";
    $desc   = "";
    $monto1 = "";

    $codigocuenta2 = "";
    $tipo2  ="";
    $des2   ="";
    $monto2 ="";

    $cuentas= "";
    $tipos  = "";
    $montos ="";
    $descr  ="";

    $msjuno = "";
    $msjdos = "";

    $x = $grid[0];
    $j = 0;

      while ($j<count($x))
      {
        $c= new Criteria();
        $c->add(CideftitPeer::CODPRE,$x[$j]->getCodpre());
        $regis = CideftitPeer::doSelectOne($c);
        if ($regis)
        {
          $cuenta = H::iif(!is_null($regis->getCodcta()),$regis->getCodcta(),'');

          $b= new Criteria();
          $b->add(ContabbPeer::CODCTA,$cuenta);
          $regis2 = ContabbPeer::doSelectOne($b);
          if ($regis2)
          {
              if ($comctarec=='S') {
                $moncau=$x[$j]->getMoning()-$x[$j]->getMondes();   // = $x[$j]->getMontot()
                $codigocuenta=$regis2->getCodcta();
                $codctabb=H::getX_vacio('CODCTA','Contabb','Codcta',$codctarec);
                if ($codctabb!='') {
                  $montox=$x[$j]->getMonrec();
                  if ($montox>0) {
                    $codigocuenta=$codigocuenta.'_'.$codctabb;
                    if ($mandev=='S' && $x[$j]->getDeving()=='S')
                      $tipo='D_C';
                    else
                      $tipo='C_C';
                    $des="";
                    $monto=$moncau;
                    if ($moneda2!=$moneda) $monto=$monto*$valor;                  
                    if ($moneda2!=$moneda) $montox=$montox*$valor;
                    $monto=$monto.'_'.$montox;
                  }else {
                    $codigocuenta=$codigocuenta;
                    if ($mandev=='S' && $x[$j]->getDeving()=='S')
                      $tipo='D';
                    else
                      $tipo='C';
                    $des="";
                    $monto=$moncau;
                    if ($moneda2!=$moneda) $monto=$monto*$valor;                 
                  }                  

                }else {
                  $msjuno='La Cuenta Contable asociada a Recargo '.$codctarec.' no existe'; return true;
                }
              }
              else {
                if ($comctades=='S'){                  
                  $moncau=$x[$j]->getMoning()+$x[$j]->getMonrec();   // = $x[$j]->getMontot()
                  $mondes=$x[$j]->getMondes();
                  if ($moneda2!=$moneda) {
                    $moncau=$moncau*$valor;
                    $mondes=$mondes*$valor;
                  }
                  if ($mondes>0){
                    $codctadesc=H::getX_vacio('CODCTA','Contabb','Codcta',$codctades);
                    $codigocuenta=$regis2->getCodcta()."_".$codctadesc;
                    if ($mandev=='S' && $x[$j]->getDeving()=='S')
                      $tipo='D_D';
                    else
                      $tipo='C_D';
                    $des="";
                    $monto=$moncau."_".$mondes;                  
                  }else {
                    $codigocuenta=$regis2->getCodcta();
                    if ($mandev=='S' && $x[$j]->getDeving()=='S')
                      $tipo='D';
                    else
                      $tipo='C';
                    $des="";
                    $monto=$moncau;
                    if ($moneda2!=$moneda) $monto=$monto*$valor;
                  }
                }else {
                  $moncau=$x[$j]->getMoning()+$x[$j]->getMonrec()-$x[$j]->getMondes();   // = $x[$j]->getMontot()
                  $codigocuenta=$regis2->getCodcta();
                  if ($mandev=='S' && $x[$j]->getDeving()=='S')
                    $tipo='D';
                  else
                    $tipo='C';
                  $des="";
                  $monto=$moncau;
                  if ($moneda2!=$moneda) $monto=$monto*$valor;
                }
              }

          }else { $msjuno='La Cuenta Contable asociada a El Código Presupuestario '.$x[$j]->getCodpre().' no existe'; return true;}
        }
         if ($j==0)
         {
           $codigocuentas=$codigocuenta;
           $desc=$des;
           $tipo1=$tipo;
           $monto1=$monto;
         }
         else
         {
           $codigocuentas=$codigocuentas.'_'.$codigocuenta;
           $desc=$desc.'_'.$des;
           $tipo1=$tipo1.'_'.$tipo;
           $monto1=$monto1.'_'.$monto;
          }
        $j++;
      }

    //Obtener cta asociada al banco
      
      $codigo="";
      if ($cardeplot!='S') {
        $codigocuenta2=$cireging->getCtaban();
        $b1= new Criteria();
        $b1->add(TsdefbanPeer::NUMCUE,$codigocuenta2);
        $regis3 = TsdefbanPeer::doSelectOne($b1);
        if ($regis3) {
          $codigo = $regis3->getCodcta();
        }

        //Obtener la descripcion del codigo de cuenta
        $b2= new Criteria();
        $b2->add(ContabbPeer::CODCTA,$codigo);
        $regis4  = ContabbPeer::doSelectOne($b2);
        if ($regis4) {
          $nomcta = $regis4->getDescta();
          $tipo2  = 'D';
          $des2   = $regis4->getDescta();
          $monto2 = $cireging->getMontot();
          if ($moneda2!=$moneda) $monto2=$monto2*$valor;
        }else {
          	$msjuno='La Cuenta Contable asociada a Cuenta Bancaria '.$codigocuenta2.' no existe';
          	return true;

        }
      }else {
        $l = $grid2[0];
        $y = 0;
        while ($y<count($l))
        {
          $c= new Criteria();
          $c->add(TsdefbanPeer::NUMCUE,$l[$y]->getNumcue());
          $regis = TsdefbanPeer::doSelectOne($c);
          if ($regis)
          {
            $cuenta = H::iif(!is_null($regis->getCodcta()),$regis->getCodcta(),'');

            $b= new Criteria();
            $b->add(ContabbPeer::CODCTA,$cuenta);
            $regis2 = ContabbPeer::doSelectOne($b);
            if ($regis2)
            {
                $codigocuenta2=$regis2->getCodcta();
                $tipo='D';
                $des1="";
                $monto=$l[$y]->getMondep();
                if ($moneda2!=$moneda) $monto=$monto*$valor;
            }else { $msjuno='La Cuenta Contable asociada a la Cuenta Bancaria '.$l[$y]->getNumcue().' no existe'; return true;}
          }
           if ($y==0)
           {
             $codigo=$codigocuenta2;
             $desc2=$des1;
             $tipo2=$tipo;
             $monto2=$monto;
           }
           else
           {
             $codigo=$codigo.'_'.$codigocuenta2;
             $desc2=$desc2.'_'.$des1;
             $tipo2=$tipo2.'_'.$tipo;
             $monto2=$monto2.'_'.$monto;
            }
          $y++;
        }
      }

      $cuentas=$codigo.'_'.$codigocuentas;
      $descr=$des2.'_'.$desc;
      $tipos=$tipo2.'_'.$tipo1;
      $montos=$monto2.'_'.$monto1;

      $clscommpro=new Comprobante();
      $clscommpro->setGrabar("N");
      $clscommpro->setNumcom($numerocomprob);
      $clscommpro->setReftra($reftra);
      $clscommpro->setFectra(date("d/m/Y",strtotime($cireging->getFecing())));
      $clscommpro->setDestra($cireging->getDesing());
      $clscommpro->setCtas($cuentas);
      $clscommpro->setDesc($descr);
      $clscommpro->setMov($tipos);
      $clscommpro->setMontos($montos);
      $arrcompro[]=$clscommpro;

  return true;
  }

    public static function movcod($codpre){

    $c1 = new Criteria();
    $c1->add(CiasiiniPeer::CODPRE,$codpre);
    $c1->add(CiasiiniPeer::PERPRE,'00');
    $asiini = CiasiiniPeer::doSelectOne($c1);

   /* $c2 = new Criteria();
    $c2->add(CimovajuPeer::CODPRE,$codpre);
    $ajustes = CimovajuPeer::doSelectOne($c2);

    $c3 = new Criteria();
    $c3->add(CimovadiPeer::CODPRE,$codpre);
    $adiciones = CimovadiPeer::doSelectOne($c3);

    $c4 = new Criteria();
    $c4->add(CimovtraPeer::CODORI,$codpre);
    $c4->addOr(CimovtraPeer::CODDES,$codpre);
    $traslados = CimovtraPeer::doSelectOne($c4);

    $c5 = new Criteria();
    $c5->add(CiimpingPeer::CODPRE,$codpre);
    $ingresos = CiimpingPeer::doSelectOne($c5);*/

    $c6 = new Criteria();
    $c6->add(CitiprubPeer::CODPRE,$codpre);
    $rubro = CitiprubPeer::doSelectOne($c6);

  if ($rubro or $asiini){

    return 1;
  }else{

    return 0 ;
  }

  }//fin de movcod

  public static function anularmovajuste($ciajuste){

    $c = new Criteria();
    $c->add(CimovajuPeer::REFAJU,$ciajuste->getRefaju());
    $per = CimovajuPeer::doSelect($c);

    foreach ($per as $dato){
      $dato->setStamov('N');
        $dato->save();
    }

  }

  public static function hayasignacion($codigo){

  $sql="Select substr(feccie,1,4) as ano from cidefniv where codemp='001'";

    Herramientas::BuscarDatos($sql,$anocierre);


    $c = new Criteria();
    $c->add(CiasiiniPeer::PERPRE,'00');
    $c->add(CiasiiniPeer::CODPRE,$codigo);
    $c->add(CiasiiniPeer::ANOPRE,$anocierre[0]["ano"]);
    $asignacion = CiasiiniPeer::doSelect($c);

    //H::printR($asignacion);exit;

    if ($asignacion!=''){
      $valor=1;
    }else{
      $valor=0;}

    return $valor;
  }

  public static function verificardisponibilidadajuste($codigo,$monto)
  {
    $verificardisponibilidad=true;
    $c= new Criteria();
    $c->add(CiasiiniPeer::CODPRE,$codigo);
    $c->add(CiasiiniPeer::PERPRE,'00');
    $reg=CiasiiniPeer::doSelectOne($c);

    if ($reg->getMondis()-$monto<0) {
      return false;
    }else{return true;}
  }

  public static function verificardisponibilidad($reg)
  {
     foreach ($reg as $dato){
      $c= new Criteria();

      //para que funcione en la forma de traslado
      $c->add(CiasiiniPeer::CODPRE,H::iif($dato->getCodpre(),$dato->getCodpre(),$dato->getCodori()));
      $c->add(CiasiiniPeer::PERPRE,'00');
      $reg=CiasiiniPeer::doSelectOne($c);

      if ($reg){
          if ($reg->getMondis()<$dato->getMonmov()){
            return 2;
          }
      }else{
        return 3;
      }
     }
     return 1;
  }

  public static function buscarcodigohijo($codigo){

    $c=new Criteria();
    $c->add(CideftitPeer::CODPRE,$codigo,LIKE);
    $reg=CideftitPeer::doSelectOne($c);

    if ($reg){
      return true;
    }else{
      return false;
    }

  }

  public static function SalvarIngreging($cireging, $grid, $grid2)
  {
    $nogenmovcom=H::getConfApp2('nogenmovcom', 'ingresos', 'ingreging');
    if ($cireging->getRefing()=='########')
    {
       $mansec=H::getConfApp2('mansec', 'ingresos', 'ingreging');
       if ($mansec=='S')
       {
           if (true)
           {
             $cidefniv = new Cidefniv();
             $r = $cidefniv->getSecing();
             $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
             $cireging->setRefing($numero);
          }
         H::getSalvarCorrelativo('coring','cidefniv','refing',$r,$msg);
       }else {
           if (Herramientas::getVerCorrelativo('coring','cidefniv',$r))
           {
             $encontrado=false;
             while (!$encontrado)
             {
              $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
              $c= new Criteria();
              $c->add(CiregingPeer::REFING,$numero);
              $resul= CiregingPeer::doSelectOne($c);
              if ($resul)
              {
                $r=$r+1;
              }
              else
              {
                $encontrado=true;
              }
             }
             $cireging->setRefing($numero);
          }
         H::getSalvarCorrelativo('coring','cidefniv','refing',$r,$msg);
       }    
    }
    else
    {
       $cireging->setRefing(str_replace('#','0',$cireging->getRefing()));
    }
    
    if (!$cireging->getId()) 
        $nuevo='S';
    else 
        $nuevo='N';

    $ano  = substr($cireging->getFecing(),0,4);
    $cireging->setAnoing($ano);
    if ($cireging->getStaing()=='')
            $cireging->setStaing('A');
    if ($nuevo=='S')
    {
      $cardeplot=H::getConfApp2('cardeplot', 'ingresos', 'ingreging');
      if ($cardeplot=='S')
      {
        $cireging->setCtaban($grid2[0][0]->getNumcue());
        $cireging->setTipmov($grid2[0][0]->getTipmov());
        $cireging->setNumdep($grid2[0][0]->getNumdep());
        $cireging->setFecdep($grid2[0][0]->getFecha());
      }
    }
    $cireging->save();
    $previsto = true;
    $graboing = self::salvarImping($cireging, $grid, $previsto);   //Graba el Grid
    $esta=H::getX_vacio('rifcon','ciconrep','nomcon',$cireging->getRifcon());
    if ($esta=='')
    {
        $ciconrep= new Ciconrep();
        $ciconrep->setRifcon($cireging->getRifcon());
        $ciconrep->setNomcon($cireging->getNomcon());
        $ciconrep->setNaccon('V');
        $ciconrep->setTipcon('J');
        $ciconrep->setRepcon('C');
        $ciconrep->save();
    }

    if ($nuevo=='S'){ //Nuevo
      if (!$previsto)   //Si es falso
      {
        $cireging->setPrevis('N');
        $cireging->save();
      }
      if ($nogenmovcom!='S')
        $grabodet = self::generar_movimientos_segun_libros($cireging,$grid2);
    }else {
        //actualizo movimiento segun Libros
        $t= new Criteria();
        $t->add(TsmovlibPeer::NUMCUE,$cireging->getCtaban());
        $t->add(TsmovlibPeer::REFLIB,$cireging->getNumdep2());
        $t->add(TsmovlibPeer::FECLIB,$cireging->getFecdep2());
        $t->add(TsmovlibPeer::TIPMOV,$cireging->getTipmov());
        $reg= TsmovlibPeer::doSelectOne($t);
        if ($reg)
        {
            $reg->setReflib($cireging->getNumdep());
            $reg->setFeclib($cireging->getFecdep());
            $reg->save();
        }
    }    
  return -1;

  }


  public static function SalvarIngadidis($ciadidis, $grid)
  {
    try{
      if (!$ciadidis->getId()) {
      $ano = substr(date('d/m/YY'),6,4);
      $ciadidis->setAnoadi($ano);
      $ciadidis->setStaadi('A');
      if ($ciadidis->getRefadi()=='00000000')
      {
          $num = H::getNextvalSecuencia('ciadidis_refadi_seq');
          $ciadidis->setRefadi(str_pad($num,8,'0',STR_PAD_LEFT));
      }
      $ciadidis->save();

      return Ingresos::salvarMovadi($ciadidis, $grid);
    }else $ciadidis->save();

    } catch (Exception $ex){
      return 0;
    }
  }

  public static function ValidarIngajustenew($clase)
  {
    if (($clase->getRefmov()=='S') and ($clase->getRefere()==''))
    {
      return 1508;
    }
    return -1;
  }
  
  public static function MontoDevengado($codpre,$perpre)
  {
      $monto=0;
      
      $r= new Criteria();
      $r->add(CiregingPeer::PERPRE,$perpre);
      $r->add(CiimpingPeer::CODPRE,$codpre);
      $r->addJoin(CiimpingPeer::REFING,  CiregingPeer::REFING);
      $result= CiimpingPeer::doSelect($r);
      if ($result)
      {
          foreach ($result as $obj)
          {
              $monto= $monto + $obj->getMonimp();
          }
      }
      
      return $monto;
  }

public static function actualiza_bancos2($cireging,$accion,$debcre){

  $c= new Criteria();
  $c->add(TsdefbanPeer::NUMCUE,$cireging->getNumcue());
  $datos=TsdefbanPeer::doSelectOne($c);
  if ($debcre=='D'){
    if ($accion='A'){
       $debito=$datos->getDeblib();
       $total=$debito+$cireging->getMondep();
       $datos->setDeblib($total);
       $datos->save();
    }elseif($accion='E'){
       $debito=$datos->getDeblib();
       $total=$debito-$cireging->getMondep();
       $datos->setDeblib($total);
       $datos->save();
    }
  }elseif($debcre=='C'){
    if ($accion='A'){
         $credito=$datos->getCrelib();
         $total=$credito+$cireging->getMondep();
         $datos->setCrelib($total);
         $datos->save();
    }elseif($accion='E'){
         $credito=$datos->getCrelib();
         $total=$credito-$cireging->getMondep();
         $datos->setCrelib($total);
         $datos->save();

    }
  }

 }//Fin actualiza_bancos()

  public static function validarFechaIngresos($fecanu) {
    $sql="SELECT cerrado FROM cipereje WHERE '".$fecanu."' BETWEEN fecdes AND fechas";

    if (!H::BuscarDatos($sql,$cerrado)){
      return 1390;
    }else {
      if ($cerrado[0]["cerrado"]=='C') {
        return 1391;
      }else {
        return -1;
      }
    }
  } 

  public static function CargarIngresos(){
    $per=array();
    $anno=(int)date('Y');   

    $sql="select last_day_month($anno,cast(mes as int)) as fecing,codpar as codpar,codrub as codrub,fecdep as fecdep,numdep as numdep,codban as codban,monmov as monmov from tmpingresos order by fecing, codpar";
    if (H::BuscarDatos($sql,$result)){
      $i=0;
      $j=0;
      while ($i<count($result))
      {
          $pos=self::posicion_en_el_grid($per,$result[$i]["fecing"],$result[$i]["codpar"]);
          if ($pos==0){
            $j=count($per)+1;
            $per[$j-1]["fecing"]=$result[$i]["fecing"];
            $per[$j-1]["codpar"]=$result[$i]["codpar"];
            $per[$j-1]["despar"]=Herramientas::getX('CODPAR','Cidefpar','Despar',$per[$j-1]["codpar"]);
            $per[$j-1]["moning"]=number_format($result[$i]["monmov"],2,',','.');
            $per[$j-1]["id"]="9";     
          }else {
            $valor=H::toFloat($per[$pos-1]["moning"]);
            $per[$pos-1]["moning"]=number_format(($valor+$result[$i]["monmov"]),2,',','.');
          }

        $i++;
      }
    }
    return $per;
  }

  public static function posicion_en_el_grid($arreglo,$fecha,$parque)
  {
    $enc=false;
    $ind=0;
    $anno=date('Y');
    while (($ind<count($arreglo)) && (!$enc))
    {
      if ($arreglo[$ind]["fecing"]==$fecha  && $arreglo[$ind]["codpar"]==$parque)
      { 
        $enc=true;
      }      
      $ind++;
    }

    if ($enc)
    { $posicionenelgrid=$ind;}else{ $posicionenelgrid=0;}

   return $posicionenelgrid;
  }

    public static function posicion_en_el_grid2($arreglo,$codpre)
  {
    $enc=false;
    $ind=0;
    while (($ind<count($arreglo)) && (!$enc))
    {
      if ($arreglo[$ind]["codpre"]==$codpre)
      { 
        $enc=true;
      }      
      $ind++;
    }

    if ($enc)
    { $posicionenelgrid=$ind;}else{ $posicionenelgrid=0;}

   return $posicionenelgrid;
  }

  public static function MigrarIngresos($grid){
      $x = $grid[0];
      $anno=date('Y');
      $j = 0;
      $p= new Criteria();
      $p->add(CidefnivPeer::CODEMP,'001');
      $regp= CidefnivPeer::doSelectOne($p);
      if ($regp){
        $rifcon=$regp->getRifcon();
        $tipmov=$regp->getTipmov();
        $tiping=$regp->getCodtip();
      }
      while ($j<count($x))
      {
        $fecing=$x[$j]["fecing"];
        $codpar=$x[$j]["codpar"];
        $fecha=date("d/m/Y",strtotime($fecing));
        //Grabo el Ingreso
        $mansec=H::getConfApp2('mansec', 'ingresos', 'ingreging');
        $cireging_new= new Cireging();
         if ($mansec=='S')
         {
           $cidefniv = new Cidefniv();
           $r = $cidefniv->getSecing();
           $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
           $cireging_new->setRefing($numero); 
         }else {
             if (Herramientas::getVerCorrelativo('coring','cidefniv',$r))
             {
               $encontrado=false;
               while (!$encontrado)
               {
                $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
                $c= new Criteria();
                $c->add(CiregingPeer::REFING,$numero);
                $resul= CiregingPeer::doSelectOne($c);
                if ($resul)
                {
                  $r=$r+1;
                }
                else
                {
                  $encontrado=true;
                }
               }
               $cireging_new->setRefing($numero);
            }
           H::getSalvarCorrelativo('coring','cidefniv','refing',$r,$msg);
         }    

    $ano  = substr($fecing,0,4);
    $cireging_new->setAnoing($ano);
    $cireging_new->setStaing('A');     
    $cireging_new->setFecing($fecing);   
    $cireging_new->setRifcon($rifcon);   
    $cireging_new->setCodtip($tiping);   
    $cireging_new->setMoning(H::toFloat($x[$j]["moning"]));  
    $cireging_new->setMonrec(0);
    $cireging_new->setMondes(0);
    $cireging_new->setMontot(H::toFloat($x[$j]["moning"]));
    $moneda=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
    $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);
    $cireging_new->setCodmon($moneda);
    $cireging_new->setValmon($valor);
    $cireging_new->setCodpar($codpar);  

    $sql="select last_day_month($anno,cast(mes as int)) as fecing,codpar as codpar,codrub as codrub,fecdep as fecdep,numdep as numdep,codban as codban,monmov as monmov, region, fecren, funcionario, mes from tmpingresos where last_day_month($anno,cast(mes as int))='".$fecing."' and codpar='".$codpar."'";
    if (H::BuscarDatos($sql,$result)){   
      $cireging_new->setCtaban(H::getX_vacio('CODBAN','Cibanco','Numcue',$result[0]["codban"]));
      $cireging_new->setTipmov($tipmov);
      $cireging_new->setNumdep($result[0]["numdep"]);
      $cireging_new->setFecdep($result[0]["fecdep"]);
      //$cireging_new->save();
      $previsto = true;

      self::salvarImpingMig($cireging_new, $result, $previsto);   //Graba el Grid
      if (!$previsto)   //Si es falso
      {
        $cireging_new->setPrevis('N');
        $cireging_new->save();
      }
      self::grabarComprobanteMigIng($cireging_new,$result);
      self::MovimientosSegunLibrosMig($cireging_new,$result);
    }
   $j++;
  }

    return -1;
  }

    //Guarda los detalles del ingreso
  public static function salvarImpingMig(&$cireging, $grid, &$previsto=true)
  {
    $j = 0;
    $pos=0;
    $per=array();
    $previsto = true;
    while ($j<count($grid))
    {
      $codpre=H::getX_vacio('CODTIPRUB','Citiprub','Codpre',$grid[$j]["codrub"]);
      $pos=self::posicion_en_el_grid2($per,$codpre);
      if ($pos==0){
        $y=count($per)+1;
        $per[$y-1]["codpre"]=$codpre;
        $per[$y-1]["codrub"]=$grid[$j]["codrub"];
        $per[$y-1]["moning"]=number_format($grid[$j]["monmov"],2,',','.');
        $per[$y-1]["id"]="9";     
      }else {
        $valor=H::toFloat($per[$pos-1]["moning"]);
        $per[$pos-1]["moning"]=number_format(($valor+$grid[$j]["monmov"]),2,',','.');
      }      
      $descripcion="Para registrar la rendición de los diferentes tipos de ingresos percibidos por el parque ".strtoupper(H::getX_vacio('CODPAR', 'Cidefpar', 'DESPAR', $grid[$j]["codpar"]))." perteneciente a la Región ".strtoupper($grid[$j]["region"])."  durante el mes de ".strtoupper(H::ObtenerMesenLetras($grid[$j]["mes"]));
      $cireging->setDesing($descripcion);   
      $cireging->save();
      $j++;
    }
    $q=0;
    while($q<count($per)){
      $ciimping_new= new Ciimping();
      $ciimping_new->setRefing($cireging->getRefing());
      $ciimping_new->setFecing($cireging->getFecing());
      $ciimping_new->setCodpre($per[$q]["codpre"]);
      $ciimping_new->setCodtiprub($per[$q]["codrub"]);
      $ciimping_new->setMoning($per[$q]["moning"]);
      $ciimping_new->setMonrec(0);
      $ciimping_new->setMondes(0);
      $ciimping_new->setMontot($per[$q]["moning"]);
      $ciimping_new->setMonaju(0);
      $ciimping_new->setStaimp('A');

      //Buscar si es previsto
      if (!(self::Es_Previsto($ciimping_new->getCodpre(),$ciimping_new->getMoning())))
      {
        $previsto = false;
      }
      $ciimping_new->save();
      $q++;
    }
    return true;
  }

public static function MovimientosSegunLibrosMig($cireging,$grid2)
  {
    $grabocontabilidad = true;
    $j=0;
    while ($j<count($grid2))
    {
      $a= new Criteria();
      $a->add(CibancoPeer::CODBAN,$grid2[$j]["codban"]);
      $rega= CibancoPeer::doSelectOne($a);
      if ($rega) {
      $numcue=$rega->getNumcue();
      $mancom=$rega->getMancom();
      if ($numcue!='' && $grid2[$j]["numdep"]!='' && $cireging->getTipmov()!='' && $grid2[$j]["monmov"]>0){
        $tsmovlib = new Tsmovlib();
        $tsmovlib->setNumcue($numcue);
        $tsmovlib->setReflib($grid2[$j]["numdep"]);
        $tsmovlib->setCedrif($cireging->getRifcon());
        $tsmovlib->setFeclib($cireging->getFecing());
        $tsmovlib->setFecing($cireging->getFecing());
        $tsmovlib->setTipmov($cireging->getTipmov());
        $tsmovlib->setMonmov($grid2[$j]["monmov"]);
        $tsmovlib->setCodcta(H::getX_vacio('NUMCUE','Tsdefban','Codcta',$numcue));
        $tsmovlib->setDeslib($cireging->getDesing());
        $tsmovlib->setStatus('C');
        $tsmovlib->setStacon('N');
        if ($grabocontabilidad){
          $tsmovlib->setStatus('C');   //Contabilizado
          $tsmovlib->setFeccom($cireging->getFecing());
          $tsmovlib->setNumcom($cireging->getNumcom());
        }else{
          $tsmovlib->setStatus('N');
          $tsmovlib->setNumcom('');
          $tsmovlib->setCodcta('');
          $tsmovlib->setFeccom('NULO');         
        }
        $tsmovlib->setCodmon($cireging->getCodmon());
        $tsmovlib->setValmon($cireging->getValmon());  
        $tsmovlib->save();

        $cideping_new= new Cideping();
        $cideping_new->setRefing($cireging->getRefing());
        $cideping_new->setNumdep($grid2[$j]["numdep"]);
        $cideping_new->setNumcue($numcue);
        $cideping_new->setTipmov($cireging->getTipmov());
        $cideping_new->setFecha($grid2[$j]["fecdep"]);
        $cideping_new->setMondep($grid2[$j]["monmov"]);
        $cideping_new->save();

        if ($mancom=='S'){
          $tsmovlib_com = new Tsmovlib();
          $tsmovlib_com->setNumcue($numcue);
          $tsmovlib_com->setReflib("CB".substr($grid2[$j]["numdep"],2,strlen($grid2[$j]["numdep"])));
          $tsmovlib_com->setCedrif($cireging->getRifcon());
          $tsmovlib_com->setFeclib($cireging->getFecing());
          $tsmovlib_com->setFecing($cireging->getFecing());
          $tsmovlib_com->setTipmov(H::getX_vacio('CODEMP','Cidefniv','Tipmovcom','001'));
          if ($mancom=='S')
            $moncom=$grid2[$j]["monmov"]*$rega->getPorcom()/100;
          else
            $moncom=0;
          $tsmovlib_com->setMonmov($moncom);
          $tsmovlib_com->setCodcta(H::getX_vacio('NUMCUE','Tsdefban','Codcta',$numcue));
          $tsmovlib_com->setDeslib($cireging->getDesing());
          $tsmovlib_com->setStatus('C');
          $tsmovlib_com->setStacon('N');
          if ($grabocontabilidad){
            $tsmovlib_com->setStatus('C');   //Contabilizado
            $tsmovlib_com->setFeccom($cireging->getFecing());
            $tsmovlib_com->setNumcom($cireging->getNumcom());
          }else{
            $tsmovlib_com->setStatus('N');
            $tsmovlib_com->setNumcom('');
            $tsmovlib_com->setCodcta('');
            $tsmovlib_com->setFeccom('NULO');         
          }
          $tsmovlib_com->setCodmon($cireging->getCodmon());
          $tsmovlib_com->setValmon($cireging->getValmon());  
          $tsmovlib_com->save();
          $tsmovlib_com->save();

          $cideping_new_com= new Cideping();
          $cideping_new_com->setRefing($cireging->getRefing());
          $cideping_new_com->setNumdep($tsmovlib_com->getReflib());
          $cideping_new_com->setNumcue($numcue);
          $cideping_new_com->setTipmov($tsmovlib_com->getTipmov());
          $cideping_new_com->setFecha($grid2[$j]["fecdep"]);
          $cideping_new_com->setMondep($tsmovlib_com->getmonmov());
          $cideping_new_com->save();
        }    

      }
    }
     $j++;
    }
    return true;
  }

  public static function grabarComprobanteMigIng(&$cireging,$grid)
  {
    $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
    if ($confcorcom=='N')
    {
      $numerocomprob= $cireging->getRefing();
    }else $numerocomprob= '########';
    $reftra=$cireging->getRefing();
    $codigocuenta = "";
    $tipo  = "";
    $monto = "";
    $codigocuentas = "";
    $tipo1  = "";
    $monto1 = "";
    $codigocuenta2 = "";
    $tipo2  ="";
    $monto2 ="";
    $cuentas= "";
    $tipos  = "";
    $montos ="";
    $refss=$refs1=$refes="";
    $refs=$refs2="";

    $j=0;
    $g= new Criteria();
    $g->add(CiimpingPeer::REFING,$cireging->getRefing());
    $regg= CiimpingPeer::doSelect($g);
    if ($regg){
      foreach ($regg as $objg) {
        $c= new Criteria();
        $c->add(CideftitPeer::CODPRE,$objg->getCodpre());
        $regis = CideftitPeer::doSelectOne($c);
        if ($regis)
        {
          $cuenta = H::iif(!is_null($regis->getCodcta()),$regis->getCodcta(),'');
          $b= new Criteria();
          $b->add(ContabbPeer::CODCTA,$cuenta);
          $regis2 = ContabbPeer::doSelectOne($b);
          if ($regis2)
          {
            $moncau=$objg->getMoning()+$objg->getMonrec()-$objg->getMondes();
            $codigocuenta=$regis2->getCodcta();
            $tipo='C';
            $refss="";
            $monto=$moncau;                    
          }
        }
         if ($j==0)
         {
           $codigocuentas=$codigocuenta;
           $tipo1=$tipo;
           $refs1=$refss;
           $monto1=$monto;
         }
         else
         {
           $codigocuentas=$codigocuentas.'_'.$codigocuenta;
           $tipo1=$tipo1.'_'.$tipo;
           $refs1=$refs1.'_'.$refss;
           $monto1=$monto1.'_'.$monto;
         }
        $j++;
      }
    }
    //Obtener cta asociada al banco
      
      $codigo="";      
      $y = 0;
      while ($y<count($grid))
      {
      $a= new Criteria();
      $a->add(CibancoPeer::CODBAN,$grid[$y]["codban"]);
      $rega= CibancoPeer::doSelectOne($a);
      if ($rega) {
        $numcue=$rega->getNumcue();
        $mancom=$rega->getMancom();
        $c= new Criteria();
        $c->add(TsdefbanPeer::NUMCUE,$numcue);
        $regis = TsdefbanPeer::doSelectOne($c);
        if ($regis)
        {
          $cuenta = H::iif(!is_null($regis->getCodcta()),$regis->getCodcta(),'');
          $b= new Criteria();
          $b->add(ContabbPeer::CODCTA,$cuenta);
          $regis2 = ContabbPeer::doSelectOne($b);
          if ($regis2)
          {              
              if ($mancom=='S'){
                $codigocuenta2=$regis2->getCodcta().'_'.$rega->getCodcta();
                $tipo='D_D';
                $refs=$grid[$y]["numdep"].'_'.$grid[$y]["numdep"];
                $moncom=$grid[$y]["monmov"]*$rega->getPorcom()/100;
                $monto=$grid[$y]["monmov"]-$moncom.'_'.$moncom;
              }else {
                $codigocuenta2=$regis2->getCodcta();
                $tipo='D';
                $refs=$grid[$y]["numdep"];
                $monto=$grid[$y]["monmov"];
              }
          }
        }
         if ($y==0)
         {
           $codigo=$codigocuenta2;
           $tipo2=$tipo;
           $refs2=$refs;
           $monto2=$monto;
         }
         else
         {
           $codigo=$codigo.'_'.$codigocuenta2;
           $tipo2=$tipo2.'_'.$tipo;
           $refs2=$refs2.'_'.$refs;
           $monto2=$monto2.'_'.$monto;
          }
        }
        $y++;
      }
      

    $cuentas=$codigo.'_'.$codigocuentas;
    $tipos=$tipo2.'_'.$tipo1;
    $refes=$refs2.'_'.$refs1;
    $montos=$monto2.'_'.$monto1;

    $arrecuentas=split("_",$cuentas);
    $arretipos=split("_",$tipos);
    $arrerefes=split("_",$refes);
    $arremontos=split("_",$montos);
    //$yapaso=array();
   // $dondesta=array();
     $t=0;
     foreach ($arrecuentas as $cta)
     {
      // $dondesta=array_keys($yapaso,$cta);
      // if (count($dondesta)==0)
       //{
        // $yapaso[]=$cta;
         // buscamos todas las posiciones de esa cta.
        // $posiciones=array();
        // $posiciones=array_keys($arrecuentas,$cta); //arreglo con las posiciones
        /* $contd=0;
         $contc=0;
         $acumd=0;
         $acumc=0;
         $sumdeb=0;
         $sumcre=0;
         foreach ($posiciones as $pos)
       {
          if ($arretipos[$pos]=='D')  //DEBITO
           {
             $acumd=$acumd+Herramientas::toFloat($arremontos[$pos]);
             $contd=$contd+1;
             $refere=$arrerefes[$pos];
          }
         else  //CREDITO
           {
             $acumc=$acumc+Herramientas::toFloat($arremontos[$pos]);
             $contc=$contc+1;
           }
         } // foreach 2
        if ($contd>=1)
       {*/
           $new_ctas[]=$cta;
           $new_descs[]=H::getX_vacio('codcta','Contabb','Descta',$cta);
           $new_movs[]=$arretipos[$t];
           $new_montos[]=H::toFloat($arremontos[$t]);
           $new_refs[]=$arrerefes[$t];
       /* }
        if ($contc>=1)
        {
           $new_ctas[]=$cta;
           $new_descs[]=H::getX_vacio('codcta','Contabb','Descta',$cta);
           $new_movs[]='C';
           $new_montos[]=$acumc;
        }*/

   // } // if dondesta
        $t++;
    } // foreach 1

   /* $i=0;
    while ($i<=(count($new_ctas)-1))
    {
      if ($new_ctas[$i]!="")
      {
          if ($new_movs[$i]=='D')
          {
            $sumdeb= $sumdeb +$new_montos[$i];
          }
          else
          {
            $sumcre= $sumcre + $new_montos[$i];
          }
      }
      $i++;
    }*/

    /*if (H::toFloat($sumdeb)!=H::toFloat($sumcre))
    {
        return false;
    }*/
    //Maestro Comprobante
    $correl3=Comprobante::Buscar_Correlativo($cireging->getFecing());
    $contabc = new Contabc();
    $contabc->setNumcom($correl3);
    $contabc->setReftra($reftra);
    $contabc->setFeccom($cireging->getFecing());
    $contabc->setDescom($cireging->getDesing());
    if ($sumdeb==$sumcre)
    $contabc->setStacom('D');
    else
    $contabc->setStacom('E');
    $contabc->setTipcom('ING');
    $contabc->setMoncom($sumdeb);
    $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
    $contabc->setLoguse($loguse);
    $contabc->setCodtiptra(H::getX_vacio('Modtiptra', 'Cotiptra', 'Codtiptra', true));
    $contabc->save();
    //Detalle Comprobante
    $i=0;
    while ($i<=(count($new_ctas)-1))
    {
      if ($new_ctas[$i]!="")
      {
          $contabc1= new Contabc1();
          $contabc1->setNumcom($correl3);
          $contabc1->setFeccom($cireging->getFecing());
          $contabc1->setCodcta($new_ctas[$i]);
          $numasi= $i +1;
          $contabc1->setNumasi($numasi);          
          $contabc1->setDesasi($new_descs[$i]);
          if ($new_movs[$i]=='D')
          {
            $contabc1->setRefasi($new_refs[$i]);
            $contabc1->setDebcre('D');
            $contabc1->setMonasi($new_montos[$i]);
          }
          else
          {
            $contabc1->setRefasi($reftra);
            $contabc1->setDebcre('C');
            $contabc1->setMonasi($new_montos[$i]);
          }
          $contabc1->save();
      }
      $i++;
    }

    $cireging->setNumcom($correl3);
    $cireging->save();
  return true;
  }

  public static function salvarIngasipar($clasemodelo,$grid){
     $datosgrid = $grid[0];
     $codigopre=$clasemodelo->getCodpre();
     $codigocon=$clasemodelo->getCodigo11();

     foreach ($datosgrid as $reg){
      if($reg->getChecked()=='1') {
        $concurrencia=1;        
        $PosGuion=H::instr($reg->getCodpre(),'-',0,$concurrencia);
        while ($PosGuion!=0){
            $CodigoMov= $codigopre."-".substr($reg->getCodpre(),0,$PosGuion-1);
            $CodigoMov=trim($CodigoMov);

            $c = new Criteria();
            $c->add(CideftitPeer::CODPRE,$CodigoMov);
            $regs = CideftitPeer::doSelectOne($c);
            if ($regs){
              $CodigoGrabar= $codigocon."-".substr($reg->getCodpre(),0,$PosGuion-1);
              $nompre=$regs->getNompre();
              $codcta=$regs->getCodcta();
              $c = new Criteria();
              $c->add(CideftitPeer::CODPRE,$CodigoGrabar);
              $regs = CideftitPeer::doSelectOne($c);
              if (!$regs){
                  $c = new Cideftit();
                  $c->setCodpre($CodigoGrabar);
                  $c->setNompre($nompre);
                  $c->setCodcta($codcta);
                  $c->setStacod('A');
                  $c->save();
              }
            }
              $concurrencia=$concurrencia+1;
              $PosGuion=H::instr($reg->getCodpre(),'-',0,$concurrencia);
            }
            $CodigoMov= $codigopre."-".$reg->getCodpre();
            $CodigoMov=trim($CodigoMov);
            $c = new Criteria();
            $c->add(CideftitPeer::CODPRE,$CodigoMov);
            $regs = CideftitPeer::doSelectOne($c);
            if ($regs){
              $CodigoGrabar= $codigocon."-".$reg->getCodpre();
              $nompre=$regs->getNompre();
              $codcta=$regs->getCodcta();

               $c = new Criteria();
               $c->add(CideftitPeer::CODPRE,$CodigoGrabar);
               $regs = CideftitPeer::doSelectOne($c);
               if (!$regs){
                $c = new Cideftit();
                $c->setCodpre($CodigoGrabar);
                $c->setNompre($nompre);
                $c->setCodcta($codcta);
                $c->setStacod('A');
                $c->save();
               }
            }
      }
    }
    return -1;
  }  
}
?>
