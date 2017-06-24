<?php
/**
 * Viaticos: Clase estática para procesar los viaticos
 *
 * @package    Roraima
 * @subpackage viaticos
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Viaticos
{
  public static function EliminarTipoServicio($clasemodelo)
  {
    try {
      $c = new criteria();
      $c->add(ViadettipserPeer::VIAREGTIPSER_ID,$clasemodelo->getId());
      ViadettipserPeer::doDelete($c);

      $clasemodelo->delete();
    return -1;
  }catch (Exception $ex){
    return 0;
  }
  }

  public static function SalvarViaregente($clasemodelo,$grid)
  {
    try {
      $clasemodelo->save();
      $id = $clasemodelo->getId();
      $x  = $grid[0];
      $j  = 0;

      //H::printR($x);
      //exit();
      while ($j<count($x))
       {
         $x[$j]->setViaregenteid($id);
         $x[$j]->save();
         $j++;
     }
       $z=$grid[1];
       $j=0;
       if (!empty($z[$j]))
       {
       while ($j<count($z))
       {
         $z[$j]->delete();
         $j++;
       }
        }


       return -1;
  }catch (Exception $ex){
    exit($ex);
    return 0;
  }
  }


  public static function SalvarViaRegtipser($clasemodelo,$grid)
  {
    try {
      $clasemodelo->save();
      $x  = $grid[0];
      $j  = 0;

    while ($j<count($x))
    {
      $x[$j]->setViaregtipserid($clasemodelo->getId());
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

       return -1;

  }catch (Exception $ex){
    return 0;
  }
  }
/////
  public static function SalvarViaregsolvia($clasemodelo,$gridTrabajo)
  {
  try{
       $totalgastos = 0;
       $refcom      = 0;
       if ((self::SalvarGridGastos($clasemodelo,$gridTrabajo,$totalgastos))!=(-1)){ exit('5');return 1601; }
     if ((self::GenerarCompromiso($clasemodelo,$gridTrabajo,$totalgastos,$refcom))!=(-1)){ exit('4');return 1602; }

     $clasemodelo->setRefcom($refcom);         //Compromiso
     $clasemodelo->setMonto($totalgastos);  //Monto
     $clasemodelo->save();


     if ((self::SalvarGridTrabajo($clasemodelo,$gridTrabajo,$totalgastos))!=(-1)){ return 1600; }

     return -1;

  } catch (Exception $ex){
    exit($ex);
    return 0;
  }

  }

  public static function GenerarCompromiso($clasemodelo,$grid,$totalgastos,&$refcom)
  {
  try{
    $x = $grid[0];
    $j = 0;

  if (!($clasemodelo->getId()))   //Nuevo
  {
      if (Herramientas::getVerCorrelativo('corcom','cpdefniv',$r))
      {
        $ref = str_pad($r, 8, '0', STR_PAD_LEFT);
        $refcom = Herramientas::getBuscar_correlativoV2($ref,'cpdefniv','corcom','cpcompro','refcom');

        H::getSalvarCorrelativo('corcom','cpdefniv','Registo Solicitud de Viatico',$refcom,$msg);

        $cpcompro_new = new Cpcompro();
        $cpcompro_new->setRefcom($refcom);
        $cpcompro_new->setTipcom($clasemodelo->getTipcom());
        $cpcompro_new->setFeccom($clasemodelo->getFecha());
        $cpcompro_new->setAnocom(substr($clasemodelo->getFecha(),0,4));
        $cpcompro_new->setStacom('A');
        $cpcompro_new->setRefprc('NULO');
        $cpcompro_new->setDescom($clasemodelo->getDescr());
        $cpcompro_new->setMoncom($totalgastos);
        $cpcompro_new->setSalcau(0);
        $cpcompro_new->setSalpag(0);
        $cpcompro_new->setSalaju(0);
        $cpcompro_new->setCedrif($clasemodelo->getCedemp());
        $cpcompro_new->save();

    //Imputaciones
        $cpimpcom_new = new Cpimpcom();
        $cpimpcom_new->setRefcom($refcom);
        $cpimpcom_new->setCodpre($clasemodelo->getCodpre());
        $cpimpcom_new->setMonimp($totalgastos);
      $cpimpcom_new->setMoncau(0);
        $cpimpcom_new->setMonpag(0);
        $cpimpcom_new->setMonaju(0);
        $cpimpcom_new->setRefere('NULO');
        $cpimpcom_new->setStaimp('A');
        $cpimpcom_new->save();
      }else{
        return 2;  //El numero inicial del Correlativo no ha sido definido
      }
  }else{
    //Documento
    $c = new criteria();
    $c->add(CpcomproPeer::REFCOM,$clasemodelo->getRefcom());
    $per = CpcomproPeer::doSelectone($c);
    if ($per)
    {
        $per->setTipcom($clasemodelo->getTipcom());
        $per->setFeccom($clasemodelo->getFecha());
        $per->setAnocom(substr($clasemodelo->getFecha(),0,4));
        $per->setStacom('A');
        $per->setRefprc('NULO');
        $per->setDescom($clasemodelo->getDescr());
        $per->setMoncom($totalgastos);
        $per->setCedrif($clasemodelo->getCedemp());
        $per->save();
    }

    //Imputaciones
    $c = new criteria();
    $c->add(CpimpcomPeer::REFCOM,$clasemodelo->getRefcom());
    $per = CpimpcomPeer::doSelectone($c);
    if ($per)
    {
          $per->setCodpre($clasemodelo->getCodpre());
          $per->setMonimp($totalgastos);
          $per->setStaimp('A');
          $per->setRefere('NULO');
        $per->save();
    }
  }
      return -1;

  } catch (Exception $ex){
    //exit($ex);
    return 0;
  }

  }


  public static function SalvarGridTrabajo($clasemodelo,$grid,$totalgastos)
  {
  try{
    $x = $grid[0];
    //H::printR($x);exit();
    $j = 0;

    while ($j<count($x))
    {
      $x[$j]->setViaregsolviaid($clasemodelo->getId());
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

  return -1;

  } catch (Exception $ex){
    //exit($ex);
    return 0;
  }

  }


  public static function SalvarGridGastos($clasemodelo,$grid,&$total_gastos)
  {
  try{
    $x            = $grid[0];
    $j            = 0;    //Puntero del grid_Gastos
    $pl           = 0;   //Puntero del grid_plan de trabajo
    $total_gastos = 0;
    while ($pl<count($x))
    {
      $j            = 0;    //Puntero del grid_Gastos
      $reg          = $x[$pl]->getGastos();
      $gastos_filas = split("/",$reg);
      array_pop($gastos_filas);  //Elimina la ultima posicion del array

      $c = new criteria();
      $c->add(ViaregdetgassolviaPeer::VIAREGDETSOLVIA_ID,$x[$pl]->getId());
      ViaregdetgassolviaPeer::doDelete($c);

      while ($j<count($gastos_filas))
      {
        $gastos = split("_",substr($gastos_filas[$j],0,strlen($gastos_filas[$j])-2));
        $total_gastos += H::QuitarMonto($gastos[1]);
        $c = new Viaregdetgassolvia();
        $c->setViaregdetsolviaid($x[$pl]->getId());
        $c->setViaregtipserid($gastos[0]);
        $c->setDetgasmont($gastos[1]);
        $c->save();
        $j++;
      }
      $pl++;
    }

    $z=$grid[1];
    $j=0;
    while ($j<count($z))
    {
      $z[$j]->delete();
      $j++;
    }

    return true;
  } catch (Exception $ex){
    return 0;
  }
  }

  public static function ValidarCompromiso($clasemodelo)   //ViaRegSolVia
  {
  $c = new criteria();
  $c->add(CpcausadPeer::REFCOM,$clasemodelo->getRefcom());
  $per = CpcausadPeer::doSelectone($c);

  if ($per) return 1604;

    return -1;
  }

  public static function EliminarGastos($clasemodelo)
  {
    try {
    $c = new criteria();
    $c->add(ViaregdetsolviaPeer::VIAREGSOLVIA_ID,$clasemodelo->getId());
    $per = ViaregdetsolviaPeer::doSelect($c);

    if ($per)
    {
      foreach ($per as $reg)
      {
        $c = new criteria();
        $c->add(ViaregdetgassolviaPeer::VIAREGDETSOLVIA_ID,$reg->getId());
        ViaregdetgassolviaPeer::doDelete($c);
      }
    }

    return -1;
  }catch (Exception $ex){
    return 0;
  }
  }


  public static function EliminarPlanTrabajo($clasemodelo)
  {
    try {
    $c = new criteria();
      $c->add(ViaregdetsolviaPeer::VIAREGSOLVIA_ID,$clasemodelo->getId());
      ViaregdetsolviaPeer::doDelete($c);

    return -1;
  }catch (Exception $ex){
    return 0;
  }
  }

  public static function validarEliminarViaregente($clasemodelo)
  {
    try {
      $c = new criteria();
      $c->add(ViaregdetsolviaPeer::VIAREGENTE_ID,$clasemodelo->getId());
      $per =ViaregdetsolviaPeer::doSelectone($c);
      if ($per) return 5;

      return -1;

  }catch (Exception $ex){
    return 0;
  }
  }

  public static function validarEliminarViaregtipser($clasemodelo)
  {
    try {
      $c = new criteria();
      $c->add(ViaregdetgassolviaPeer::VIAREGTIPSER_ID,$clasemodelo->getId());
      $per = ViaregdetgassolviaPeer::doSelectone($c);
      if ($per) return 5;

      return -1;

  }catch (Exception $ex){
    return 0;
  }
  }

  public static function EliminarCompromiso($clasemodelo)
  {
    try {
    $c = new criteria();
      $c->add(CpcomproPeer::REFCOM,$clasemodelo->getRefcom());
      CpcomproPeer::doDelete($c);

    $c = new criteria();
      $c->add(CpimpcomPeer::REFCOM,$clasemodelo->getRefcom());
      CpimpcomPeer::doDelete($c);


    return -1;
  }catch (Exception $ex){
    return 0;
  }
  }

  public static function validarViadettabcar($clasemodelo,$grid)
  {
    $x = $grid[0];
    if (empty($x))
    {
      return 4;
    }
      return -1;
  }

  public static function validarViaregente($clasemodelo,$grid)
  {
    /// Valida que en el grid hayan datos ///
    $x = $grid[0];
    if (empty($x))
    {
      return 4;
    }else{
    }
    /////////////

    return -1;
  }

  public static function GenerarCompromisov2($clasemodelo,$monto,$cedrif,&$refcom)
  {
  //try{
       $refcom='';
       if (Herramientas::getVerCorrelativo('corcom','cpdefniv',$rq))
       {
            $tienecorrelativo=true;
            $encontrado=false;
            while (!$encontrado)
            {
              $numero=str_pad($rq, 8, '0', STR_PAD_LEFT);

              $sql="select refcom from cpcompro where refcom='".$numero."'";
              if (Herramientas::BuscarDatos($sql,$result))
              {
                $rq=$rq+1;
              }
              else
              {
                $encontrado=true;
              }
            }
            $refcom=str_pad($rq, 8, '0', STR_PAD_LEFT);               
            

            //Imputaciones
            $c = new Criteria();
            $c->add(ViadetcalviatraPeer::NUMCAL,$clasemodelo->getNumcal());
            $per = ViadetcalviatraPeer::doSelect($c);
            if($per)
            {
                $datosGrid = array();
                foreach($per as $r)
                {
                    $codigo=$clasemodelo->getCodcat().'-'.$r->getPartida();
                    $codpre=H::getCodPreDis($codigo);
                    $pos=  Presupuesto::posicion_en_el_grid2($datosGrid, $codpre);
                    if ($pos==0)
                    {
                     $i=count($datosGrid)+1;
                     $datosGrid[$i-1]["codpre"]=$codpre;
                     $datosGrid[$i-1]["monimp"]=$r->getMontot();
                    }
                    else
                    {
                     $datosGrid[$pos-1]["monimp"]=$datosGrid[$pos-1]["monimp"]+$r->getMontot();
                    }    
                }
            }
            
            $p=0;
            $sigue=true;
            while ($p<count($datosGrid))
            {
              $disponible = H::Monto_disponible($datosGrid[$p]["codpre"],$clasemodelo->getFeccal());
              if($datosGrid[$p]["monimp"] > $disponible){
                $sigue=false;
                $refcom='';
              }
              $p++;
            }
            
            if ($sigue)
            {
                $cpcompro_new = new Cpcompro();
                $cpcompro_new->setRefcom($refcom);
                $cpcompro_new->setTipcom($clasemodelo->getTipcom());
                $cpcompro_new->setFeccom($clasemodelo->getFecha());
                $cpcompro_new->setAnocom(substr($clasemodelo->getFecha(),0,4));
                $cpcompro_new->setStacom('A');
                $cpcompro_new->setRefprc('NULO');
                $cpcompro_new->setDescom($clasemodelo->getDescrip());
                $cpcompro_new->setMoncom($monto);
                $cpcompro_new->setSalcau(0);
                $cpcompro_new->setSalpag(0);
                $cpcompro_new->setSalaju(0);
                $coddirec=H::getX_vacio('NUMSOL','Viasolviatra','Coddirec',$clasemodelo->getRefsol());
                $cpcompro_new->setCoddirec($coddirec);
                /*$rifemp=H::getX_vacio('CODEMP','Nphojint','Rifemp',$clasemodelo->getCodemp());
                if ($rifemp!="")
                    $cpcompro_new->setCedrif($rifemp);
                else
                    $cpcompro_new->setCedrif(H::getX_vacio('CODEMP','Nphojint','Cedemp',$clasemodelo->getCodemp())); 

                if ($cpcompro_new->getCedrif()=='')
                   $cpcompro_new->setCedrif(H::getX_vacio('RIFNEMP','Vianoemp','Rifnemp',$clasemodelo->getCodemp())); 

                if (H::getX_vacio('CEDRIF','Opbenefi','Cedrif',$cpcompro_new->getCedrif())=='')
                   return 1623;*/
                $cpcompro_new->setCedrif($cedrif);
                $reqaut=H::getX('TIPCOM','Cpdoccom','Reqaut',$clasemodelo->getTipcom());
                if ($reqaut=='S')              
                  $cpcompro_new->setAprcom('N');
                else 
                  $cpcompro_new->setAprcom('S');
                $cpcompro_new->save();                 
                
                $w=0;
                while ($w<count($datosGrid))
                {
                    $cpimpcom_new = new Cpimpcom();
                    $cpimpcom_new->setRefcom($refcom);
                    $cpimpcom_new->setCodpre($datosGrid[$w]["codpre"]);
                    $cpimpcom_new->setMonimp($datosGrid[$w]["monimp"]);
                    $cpimpcom_new->setMoncau(0);
                    $cpimpcom_new->setMonpag(0);
                    $cpimpcom_new->setMonaju(0);
                    $cpimpcom_new->setRefere('NULO');
                    $cpimpcom_new->setStaimp('A');
                    $cpimpcom_new->save();                     
                  $w++;
                }
                if ($tienecorrelativo==true)
                {
                   Herramientas::getSalvarCorrelativo('corcom','cpdefniv','Referencia',$rq,$msg);
                }         

               $tipdoc=H::getX_vacio('REFCOM','Cpcompro','Tipcom',$refcom);
               $codeve=H::getX_vacio('NUMSOL','Viasolviatra','Codeve',$clasemodelo->getRefsol());
               if ($codeve!='') {
                 $e= new Criteria();
                 $e->add(CpimpcomPeer::REFCOM,$refcom);
                 $trajo= CpimpcomPeer::doSelect($e);
                 if ($trajo)
                 {
                   foreach ($trajo as $objcom) {
                      $cpdiseve= new Cpdiseve();
                      $cpdiseve->setRefdoc($objcom->getRefcom());
                      $cpdiseve->setCodpre($objcom->getCodpre());
                      $cpdiseve->setCodeve($codeve);
                      $cpdiseve->setMoneve($objcom->getMonimp());
                      $cpdiseve->setTipdoc($tipdoc);
                      $cpdiseve->setTipmov('COM');
                      $cpdiseve->save();
                   }
                 }
             }                     
            }                      

          }else{
            return 2;  //El numero inicial del Correlativo no ha sido definido
            $viat=$viat.'-'.$clasemodelo->getNumcal();
          }
      return -1;
  /*} catch (Exception $ex){
    exit($ex);
    return 0;
  }*/

  }

  public static function GenerarCompromisoviarelvia($clasemodelo,$grid,&$refcom)
  {
  try{
       $refcom='';
       $sol1='';
       $moneda=$clasemodelo->getCodmon();
       $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
       if ($moneda2!=$moneda)
         $valor=$clasemodelo->getValmon();
       else
         $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);
       if (Herramientas::getVerCorrelativo('corcom','cpdefniv',$rq))
          {
            $tienecorrelativo=true;
            $encontrado=false;
            while (!$encontrado)
            {
              $numero=str_pad($rq, 8, '0', STR_PAD_LEFT);

              $sql="select refcom from cpcompro where refcom='".$numero."'";
              if (Herramientas::BuscarDatos($sql,$result))
              {
                $rq=$rq+1;
              }
              else
              {
                $encontrado=true;
              }
            }
            $refcom=str_pad($rq, 8, '0', STR_PAD_LEFT);    

            $per=$grid[0];
            $h=0;
            if(count($per)>0)
            {
              $datosGrid = array();
              foreach($per as $r)
              {
                 if ($h==0) $sol1=$r->getRefsol();
                  $codigo=$r->getCodcat().'-'.$r->getCodpar();
                  $codpre=H::getCodPreDis($codigo);
                  $pos=  Presupuesto::posicion_en_el_grid2($datosGrid, $codpre);
                  if ($pos==0)
                  {
                   $i=count($datosGrid)+1;
                   $datosGrid[$i-1]["codpre"]=$codpre;
                   $datosGrid[$i-1]["monimp"]=$r->getMontonet()*$valor;
                  }
                  else
                  {
                   $datosGrid[$pos-1]["monimp"]=$datosGrid[$pos-1]["monimp"]+ ($r->getMontonet()*$valor);
                  }    

                  $h++;
              }              
            }
            
            $p=0;
            $sigue=true;
            while ($p<count($datosGrid))
            {
              $disponible = H::Monto_disponible($datosGrid[$p]["codpre"],$clasemodelo->getFecrel());
              if($datosGrid[$p]["monimp"] > $disponible){
                $sigue=false;
                $refcom='';
                return 152;
              }
              $p++;
            }
            
            if ($sigue)
            {
              #MAESTRO
              $cpcompro_new = new Cpcompro();
              $cpcompro_new->setRefcom($refcom);
              $cpcompro_new->setTipcom($clasemodelo->getTipcom());
              $cpcompro_new->setFeccom($clasemodelo->getFecrel());
              $cpcompro_new->setAnocom(substr($clasemodelo->getFecrel(),0,4));
              $cpcompro_new->setStacom('A');
              $cpcompro_new->setRefprc('NULO');
              $cpcompro_new->setDescom($clasemodelo->getDesrel());
              $cpcompro_new->setMoncom($clasemodelo->getTotfac()*$valor);
              $cpcompro_new->setSalcau(0);
              $cpcompro_new->setSalpag(0);
              $cpcompro_new->setSalaju(0);
              $codemp=H::getX_vacio('NUMSOL','Viasolviatra','Codemp',$sol1);
              $rifemp=H::getX_vacio('CODEMP','Nphojint','Rifemp',$codemp);
              if ($rifemp=='')
                 $rifemp=H::getX_vacio('CODEMP','Nphojint','Cedemp',$codemp);
               if ($rifemp=='')
                   $rifemp=H::getX_vacio('RIFNEMP','Vianoemp','Rifnemp',$codemp);
              if ($rifemp!="")
                  $cpcompro_new->setCedrif($rifemp);                  
              $cpcompro_new->save();
              //Detalle Compromiso
                $w=0;
                while ($w<count($datosGrid))
                {
                  $cpimpcom_new = new Cpimpcom();
                  $cpimpcom_new->setRefcom($refcom);
                  $cpimpcom_new->setCodpre($datosGrid[$w]["codpre"]);
                  $cpimpcom_new->setMonimp($datosGrid[$w]["monimp"]);
                  $cpimpcom_new->setMoncau(0);
                  $cpimpcom_new->setMonpag(0);
                  $cpimpcom_new->setMonaju(0);
                  $cpimpcom_new->setRefere('NULO');
                  $cpimpcom_new->setStaimp('A');
                  $cpimpcom_new->save();      
                  $w++;       
                }
              
              if ($tienecorrelativo==true)
                H::getSalvarCorrelativo('corcom','cpdefniv','Referencia',$rq,$msg);               
          }
      }else{
        return 2;  //El numero inicial del Correlativo no ha sido definido
      }
      return -1;
  } catch (Exception $ex){
    //exit($ex);
    return 0;
  }

  }
  
public static function salvarPrimaNiveles($clasemodelo, $grid) {
    //Grabar Niveles Primas
    $x = $grid[0];
    $j = 0;
    while ($j < count($x)) {
      if ($x[$j]->getCodniv() != "") {
        $x[$j]->setCodpri($clasemodelo->getCodpri());
        $x[$j]->save();
      }
      $j++;
    }
    $z = $grid[1];
    $l = 0;
    if (!empty($z[$l])) {
      while ($l < count($z)) {
        $z[$l]->delete();
        $l++;
      }
    }
  }

  public static function GenerarCompromisoExtension($clasemodelo,$grid,&$refcom)
  {
       $refcom='';
       if (Herramientas::getVerCorrelativo('corcom','cpdefniv',$rq))
       {
            $tienecorrelativo=true;
            $encontrado=false;
            while (!$encontrado)
            {
              $numero=str_pad($rq, 8, '0', STR_PAD_LEFT);

              $sql="select refcom from cpcompro where refcom='".$numero."'";
              if (Herramientas::BuscarDatos($sql,$result))
              {
                $rq=$rq+1;
              }
              else
              {
                $encontrado=true;
              }
            }
            $refcom=str_pad($rq, 8, '0', STR_PAD_LEFT);               
            

            //Imputaciones
            $datosGrid = array();
             foreach($grid[0] as $reg)
            {
              if($reg['check']=='1' && H::toFloat($reg['montot'])!=0)
              {                 

                $codigo=$clasemodelo->getCodcat().'-'.H::getX_vacio('Codrub','Viadefrub','Codpar',$reg['codrub']);
                $codpre=H::getCodPreDis($codigo);
                $pos=  Presupuesto::posicion_en_el_grid2($datosGrid, $codpre);
                if ($pos==0)
                {
                 $i=count($datosGrid)+1;
                 $datosGrid[$i-1]["codpre"]=$codpre;
                 $datosGrid[$i-1]["monimp"]=H::toFloat($reg['montot']);
                }
                else
                {
                 $datosGrid[$pos-1]["monimp"]=$datosGrid[$pos-1]["monimp"]+H::toFloat($reg['montot']);
                }
              }                   
           }           
            
            $p=0;
            $sigue=true;
            while ($p<count($datosGrid))
            {
              $disponible = H::Monto_disponible($datosGrid[$p]["codpre"],$clasemodelo->getFecext());
              if($datosGrid[$p]["monimp"] > $disponible){
                $sigue=false;
                $refcom='';
              }
              $p++;
            }
            
            if ($sigue)
            {
                $cpcompro_new = new Cpcompro();
                $cpcompro_new->setRefcom($refcom);
                $cpcompro_new->setTipcom(H::getX_vacio('NUMCAL','Viacalviatra','Tipcom',$clasemodelo->getRefcal()));
                $cpcompro_new->setFeccom($clasemodelo->getFecext());
                $cpcompro_new->setAnocom(substr($clasemodelo->getFecext(),0,4));
                $cpcompro_new->setStacom('A');
                $cpcompro_new->setRefprc('NULO');
                $cpcompro_new->setDescom($clasemodelo->getObservaciones());
                $cpcompro_new->setMoncom(H::toFloat($clasemodelo->getTotvia()));
                $cpcompro_new->setSalcau(0);
                $cpcompro_new->setSalpag(0);
                $cpcompro_new->setSalaju(0);
                $codigoemp=H::getX_vacio('NUMCAL','Viacalviatra','Codemp',$clasemodelo->getRefcal());
                $rifemp=H::getX_vacio('CODEMP','Nphojint','Rifemp',$codigoemp);
                if ($rifemp!="")
                    $cpcompro_new->setCedrif($rifemp);
                else
                    $cpcompro_new->setCedrif(H::getX_vacio('CODEMP','Nphojint','Cedemp',$codigoemp));                    
                $cpcompro_new->save();                 
                
                $w=0;
                while ($w<count($datosGrid))
                {
                    $cpimpcom_new = new Cpimpcom();
                    $cpimpcom_new->setRefcom($refcom);
                    $cpimpcom_new->setCodpre($datosGrid[$w]["codpre"]);
                    $cpimpcom_new->setMonimp($datosGrid[$w]["monimp"]);
                    $cpimpcom_new->setMoncau(0);
                    $cpimpcom_new->setMonpag(0);
                    $cpimpcom_new->setMonaju(0);
                    $cpimpcom_new->setRefere('NULO');
                    $cpimpcom_new->setStaimp('A');
                    $cpimpcom_new->save();                     
                  $w++;
                }
                if ($tienecorrelativo==true)
                {
                   Herramientas::getSalvarCorrelativo('corcom','cpdefniv','Referencia',$rq,$msg);
                }                
            }                      

          }else{
            return 2;  //El numero inicial del Correlativo no ha sido definido
          }
      return -1;
  }    

  public static function verificarCalculoViatico($grid){
        $g=$grid[0];
        $n=0;
        while ($n<count($g)){
          if($g[$n]->getCheck()==1){
              $g[$n]->setVerificado('S');
              $g[$n]->save();
          }
          $n++;
        }
    }

    public static function reversarCalculoViatico($grid){
        $g=$grid[0];
        $n=0;
        while ($n<count($g)){
          if($g[$n]->getCheck()==1){
              $g[$n]->setVerificado('N');
              $g[$n]->save();
          }
          $n++;
        }
    }

  public static function salvarAcompanantes($clasemodelo,$grid)
  {
    try {
      $x  = $grid[0];
      $graempaco=H::getConfApp2('graempaco', 'viaticos', 'viasolviatra');
      $j  = 0;
      while ($j<count($x))
       {
        if ($x[$j]->getCodempaco()!='' && $x[$j]->getCodnivaco()!='') {
          if ($graempaco=='S'){
            if ($j==0){
              $clasemodelo->setCodempaco($x[$j]->getCodempaco());
              $clasemodelo->setCodnivaco($x[$j]->getCodnivaco());
              $clasemodelo->save();

              $x[$j]->setNumsol($clasemodelo->getNumsol());
              $x[$j]->save();

              break;
            
            }
          }else {
            $x[$j]->setNumsol($clasemodelo->getNumsol());
            $x[$j]->save();
          }
        }
         $j++;
       }

       $z=$grid[1];
       $j=0;
       if (!empty($z[$j]))
       {
         while ($j<count($z))
         {
           $z[$j]->delete();
           $j++;
         }
       }
       return -1;
    }catch (Exception $ex){
      exit($ex);
      return 0;
    }
  }

  public static function salvarDetalleRelVia($clasemodelo,$grid)
  {
    $moneda=$clasemodelo->getCodmon();
    $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
    if ($moneda2!=$moneda)
      $valor=$clasemodelo->getValmon();
    else
      $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);

      $x  = $grid[0];
      $j  = 0;
      while ($j<count($x))
      {
        if ($x[$j]->getCodart()!='' && $x[$j]->getCodpar()!='') {
          $x[$j]->setNumrel($clasemodelo->getNumrel());
          $x[$j]->setFecrel($clasemodelo->getFecrel());
          if ($moneda2!=$moneda)
          {
            $x[$j]->setMontonet($x[$j]->getMontonet()*$valor);
            $x[$j]->setMontorec($x[$j]->getMontorec()*$valor);
          }
          $x[$j]->save();
        }
         $j++;
      }

     $z=$grid[1];
     $j=0;
     if (!empty($z[$j]))
     {
       while ($j<count($z))
       {
         $z[$j]->delete();
         $j++;
       }
     }
  }

  public static function guardarBolAer($clasemodelo,$grid){    
    if (Herramientas::getVerCorrelativo('corsolbol', 'viadefgen', $r)) {      
      $viasolbolaer_new= new Viasolbolaer();  
      $encontrado = false;
      while (!$encontrado) {
        $numero = str_pad($r, 8, '0', STR_PAD_LEFT);

        $sql = "select numsol from viasolbolaer where numsol='" . $numero . "'";
        if (Herramientas::BuscarDatos($sql, $result)) {
          $r = $r + 1;
        } else {
          $encontrado = true;
        }
      }          
      $viasolbolaer_new->setNumsol($numero);
      $viasolbolaer_new->setFecsol($clasemodelo->getFecsol());
      $viasolbolaer_new->setCoddirec($clasemodelo->getCoddirec());
      $viasolbolaer_new->setCodeve($clasemodelo->getCodeve());
      $viasolbolaer_new->setCodniv(H::getX_vacio('CODEMP','Nphojint','Codniv',$clasemodelo->getCodemp()));
      $viasolbolaer_new->setFecsal($clasemodelo->getFecsal());
      $viasolbolaer_new->setHorsal($clasemodelo->getHorsalb());
      $viasolbolaer_new->setFecreg($clasemodelo->getFecreg());
      $viasolbolaer_new->setHorreg($clasemodelo->getHorreg());
      $viasolbolaer_new->setRutbolaer($clasemodelo->getRutbolaer());
      $viasolbolaer_new->setMotviabol($clasemodelo->getMotviabol());
      $viasolbolaer_new->setTippas($clasemodelo->getTippas());
      $viasolbolaer_new->setNumsolvi($clasemodelo->getNumsol());
      $viasolbolaer_new->save();
      Herramientas::getSalvarCorrelativo('corsolbol', 'viadefgen', 'Solicitud de Boleto Áereo', $r, $msg);    
      self::grabarGridBolAer($viasolbolaer_new,$grid);
    }
  }

  public static function grabarGridBolAer($viasolbolaer_new,$grid){
      $x  = $grid[0];
      $j  = 0;
      while ($j<count($x))
      {
        if ($x[$j]->getCedpercon()!='' && $x[$j]->getApepercon()!='' && $x[$j]->getNompercon()!='') {
          $viadetsolbolaer_new= new Viadetsolbolaer();  
          $viadetsolbolaer_new->setNumsol($viasolbolaer_new->getNumsol());
          $viadetsolbolaer_new->setCedperpas($x[$j]->getCedpercon());
          $viadetsolbolaer_new->setApeperpas($x[$j]->getApepercon());
          $viadetsolbolaer_new->setNomperpas($x[$j]->getNompercon());
          $viadetsolbolaer_new->save();
        }
        $j++;
      }
  }  

  public static function salvarBoletosAereos($clasemodelo,$grid)
  {
    try {
      $x  = $grid[0];
      $j  = 0;
      while ($j<count($x))
       {
        if ($x[$j]->getCedpercon()!='' && $x[$j]->getApepercon()!='' && $x[$j]->getNompercon()!='') {
          $x[$j]->setNumsol($clasemodelo->getNumsol());    
          $x[$j]->setLogusu(sfContext::getInstance()->getUser()->getAttribute('loguse'));      
          $x[$j]->save();
        }
         $j++;
       }

       $z=$grid[1];
       $j=0;
       if (!empty($z[$j]))
       {
         while ($j<count($z))
         {
           $z[$j]->delete();
           $j++;
         }
       }
       self::guardarBolAer($clasemodelo, $grid);
       return -1;
    }catch (Exception $ex){
      exit($ex);
      return 0;
    }
  }

    public static function guardarTraTer($clasemodelo,$grid){    
    if (Herramientas::getVerCorrelativo('corsoltra', 'viadefgen', $r)) {
      $viasoltraterre_new= new Viasoltraterre();  
      $encontrado = false;
      while (!$encontrado) {
        $numero = str_pad($r, 8, '0', STR_PAD_LEFT);
        $sql = "select numsol from viasoltraterre where numsol='" . $numero . "'";
        if (Herramientas::BuscarDatos($sql, $result)) {
          $r = $r + 1;
        } else {
          $encontrado = true;
        }
      }               
     
      $viasoltraterre_new->setNumsol($numero);
      $viasoltraterre_new->setFecsol($clasemodelo->getFecsol());
      $viasoltraterre_new->setCoddirec($clasemodelo->getCoddirec());
      $viasoltraterre_new->setCodeve($clasemodelo->getCodeve());
      $viasoltraterre_new->setCodniv(H::getX_vacio('CODEMP','Nphojint','Codniv',$clasemodelo->getCodemp()));
      $viasoltraterre_new->setEsnoemp($clasemodelo->getEsnoemp());
      //$viasoltraterre_new->setCodempusu($clasemodelo->getCodempusu());
      $viasoltraterre_new->setCodempusu($clasemodelo->getCodemp());
      $viasoltraterre_new->setTipserv($clasemodelo->getTipserv());
      $viasoltraterre_new->setCanvehi($clasemodelo->getCanvehi());
      $viasoltraterre_new->setTipvehi($clasemodelo->getTipvehi());
      $viasoltraterre_new->setCandias($clasemodelo->getCandias());
      $viasoltraterre_new->setCanpasaj($clasemodelo->getCanpasaj());
      $viasoltraterre_new->setEquipaj($clasemodelo->getEquipaj());
      $viasoltraterre_new->setInstrum($clasemodelo->getInstrum());
      $viasoltraterre_new->setBultos($clasemodelo->getBultos());
      $viasoltraterre_new->setConesper($clasemodelo->getConesper());
      $viasoltraterre_new->setAdisposi($clasemodelo->getAdisposi());
      $viasoltraterre_new->setAdisposi($clasemodelo->getAdisposi());
      $viasoltraterre_new->setTelemp($clasemodelo->getCelemp());
      $viasoltraterre_new->setNompercon($clasemodelo->getNompercon());      
      $viasoltraterre_new->setApepercon($clasemodelo->getApepercon());
      $viasoltraterre_new->setNumcelpercon($clasemodelo->getNumcelpercon());
      $viasoltraterre_new->setNumsolvi($clasemodelo->getNumsol());
      $viasoltraterre_new->save();
      Herramientas::getSalvarCorrelativo('corsoltra', 'viadefgen', 'Solicitud de Transporte Terrestre', $r, $msg);    
      self::grabarGridTraTer($viasoltraterre_new,$grid);
    }
  }

  public static function grabarGridTraTer($viasoltraterre_new,$grid){
      $x  = $grid[0];
      $j  = 0;
      while ($j<count($x))
      {
        if ($x[$j]->getFecha()!='' && $x[$j]->getHora()!='' && $x[$j]->getRuta()!='') {
          $auxfec=explode('-', $x[$j]->getFecha());
          $viarutsoltran_new= new Viarutsoltran();  
          $viarutsoltran_new->setNumsol($viasoltraterre_new->getNumsol());
          $viarutsoltran_new->setDia($auxfec[2]);
          $viarutsoltran_new->setMes($auxfec[1]);
          $viarutsoltran_new->setHora($x[$j]->getHora());
          $viarutsoltran_new->setRuta($x[$j]->getRuta());
          $viarutsoltran_new->save();
        }
        $j++;
      }
  }

  public static function salvarTransporteTerrestre($clasemodelo,$grid)
  {
    try {
      $x  = $grid[0];
      $j  = 0;
      while ($j<count($x))
       {
        if ($x[$j]->getFecha()!='' && $x[$j]->getHora()!='' && $x[$j]->getRuta()!='') {
          $x[$j]->setNumsol($clasemodelo->getNumsol());
          $x[$j]->setLogusu(sfContext::getInstance()->getUser()->getAttribute('loguse'));      
          $x[$j]->save();
        }
         $j++;
       }

       $z=$grid[1];
       $j=0;
       if (!empty($z[$j]))
       {
         while ($j<count($z))
         {
           $z[$j]->delete();
           $j++;
         }
       }
       self::guardarTraTer($clasemodelo,$grid);
       return -1;
    }catch (Exception $ex){
      exit($ex);
      return 0;
    }
  }

  public static function salvarGridRutasSolTra($clasemodelo,$grid){
    try {
      $x  = $grid[0];
      $j  = 0;
      while ($j<count($x))
       {
        if ($x[$j]->getDia()!='' && $x[$j]->getMes()!='' && $x[$j]->getHora()!='' && $x[$j]->getRuta()!='') {
          $x[$j]->setNumsol($clasemodelo->getNumsol());
          $x[$j]->save();
        }
         $j++;
       }

       $z=$grid[1];
       $j=0;
       if (!empty($z[$j]))
       {
         while ($j<count($z))
         {
           $z[$j]->delete();
           $j++;
         }
       }
       return -1;
    }catch (Exception $ex){
      exit($ex);
      return 0;
    }
  }  

    

  public static function salvarGridPersonasSolBol($clasemodelo,$grid){
    try {
      $x  = $grid[0];
      $j  = 0;
      while ($j<count($x))
       {
        if ($x[$j]->getCedperpas()!='' && $x[$j]->getApeperpas()!='' && $x[$j]->getNomperpas()!='') {
          $x[$j]->setNumsol($clasemodelo->getNumsol());
          $x[$j]->save();
        }
         $j++;
       }

       $z=$grid[1];
       $j=0;
       if (!empty($z[$j]))
       {
         while ($j<count($z))
         {
           $z[$j]->delete();
           $j++;
         }
       }
       return -1;
    }catch (Exception $ex){
      exit($ex);
      return 0;
    }
  }

  public static function maximoNivel($numsol){
    $sql="select codniv as nivel from viasolviatra where numsol='".$numsol."' and status='A' 
          union
          select codnivaco as nivel from viadetsolacoemp where numsol='".$numsol."' order by 1 desc";
    if (Herramientas::BuscarDatos($sql, $result)) {
      return $result[0]["nivel"];
    }else return '';
  }

  public static function GenerarCompromisov3($clasemodelo,$monto,$cedrif,&$refcom)
  {
    //Validar Presupuesto.
    $c = new Criteria();
    $c->add(ViadetcalviatraPeer::NUMCAL,$clasemodelo->getNumcal());
    $per = ViadetcalviatraPeer::doSelect($c);
    if($per)
    {
        $datosGrid = array();
        foreach($per as $r)
        {
            $codigo=$clasemodelo->getCodcat().'-'.$r->getPartida();
            $codpre=H::getCodPreDis($codigo);
            $pos=  Presupuesto::posicion_en_el_grid2($datosGrid, $codpre);
            if ($pos==0)
            {
             $i=count($datosGrid)+1;
             $datosGrid[$i-1]["codpre"]=$codpre;
             $datosGrid[$i-1]["monimp"]=H::toFloat($r->getMontot());
            }
            else
            {
             $datosGrid[$pos-1]["monimp"]=H::toFloat($datosGrid[$pos-1]["monimp"])+H::toFloat($r->getMontot());
            }    
        }
    }

    $p=0;
    $sigue=true;
    while ($p<count($datosGrid))
    {
      $disponible = H::Monto_disponible($datosGrid[$p]["codpre"],$clasemodelo->getFeccal());
      if($datosGrid[$p]["monimp"] > $disponible){
        $sigue=false;
        $refcom='';
      }
      $p++;
    }

    if ($sigue){
      $p = new Criteria();
      $p->add(ViadetsolacoempPeer::NUMSOL, $clasemodelo->getRefsol());
      $regis = ViadetsolacoempPeer::doSelect($p);
      if ($regis) $numaco = count($regis); else $numaco = 0;
      $numempvia=$numaco+1;
      $refcom='';
      //Compromiso del Solicitante del Viático
      if (Herramientas::getVerCorrelativo('corcom','cpdefniv',$rq))
       {
        $tienecorrelativo=true;
        $encontrado=false;
        while (!$encontrado)
        {
          $numero=str_pad($rq, 8, '0', STR_PAD_LEFT);

          $sql="select refcom from cpcompro where refcom='".$numero."'";
          if (Herramientas::BuscarDatos($sql,$result))
          {
            $rq=$rq+1;
          }
          else
          {
            $encontrado=true;
          }
        }
        $refecom=str_pad($rq, 8, '0', STR_PAD_LEFT);  
        $refcom=$refcom.$refecom.'_';    

        $cpcompro_new = new Cpcompro();
        $cpcompro_new->setRefcom($refecom);
        $cpcompro_new->setTipcom($clasemodelo->getTipcom());
        $cpcompro_new->setFeccom($clasemodelo->getFecha());
        $cpcompro_new->setAnocom(substr($clasemodelo->getFecha(),0,4));
        $cpcompro_new->setStacom('A');
        $cpcompro_new->setRefprc('NULO');
        $cpcompro_new->setDescom($clasemodelo->getDescrip());
        $cpcompro_new->setMoncom($monto/$numempvia);
        $cpcompro_new->setSalcau(0);
        $cpcompro_new->setSalpag(0);
        $cpcompro_new->setSalaju(0);
        $cpcompro_new->setCedrif($cedrif);
        $reqaut=H::getX('TIPCOM','Cpdoccom','Reqaut',$clasemodelo->getTipcom());
        if ($reqaut=='S')              
          $cpcompro_new->setAprcom('N');
        else 
          $cpcompro_new->setAprcom('S');
        $cpcompro_new->save();                 
        
        $w=0;
        while ($w<count($datosGrid))
        {
            $cpimpcom_new = new Cpimpcom();
            $cpimpcom_new->setRefcom($refecom);
            $cpimpcom_new->setCodpre($datosGrid[$w]["codpre"]);
            $cpimpcom_new->setMonimp($datosGrid[$w]["monimp"]/$numempvia);
            $cpimpcom_new->setMoncau(0);
            $cpimpcom_new->setMonpag(0);
            $cpimpcom_new->setMonaju(0);
            $cpimpcom_new->setRefere('NULO');
            $cpimpcom_new->setStaimp('A');
            $cpimpcom_new->save();                     
          $w++;
        }
        if ($tienecorrelativo==true)
        {
           Herramientas::getSalvarCorrelativo('corcom','cpdefniv','Referencia',$rq,$msg);
        }         

       $tipdoc=H::getX_vacio('REFCOM','Cpcompro','Tipcom',$refecom);
       $codeve=H::getX_vacio('NUMSOL','Viasolviatra','Codeve',$clasemodelo->getRefsol());
       if ($codeve!='') {
         $e= new Criteria();
         $e->add(CpimpcomPeer::REFCOM,$refecom);
         $trajo= CpimpcomPeer::doSelect($e);
         if ($trajo)
         {
           foreach ($trajo as $objcom) {
              $cpdiseve= new Cpdiseve();
              $cpdiseve->setRefdoc($objcom->getRefcom());
              $cpdiseve->setCodpre($objcom->getCodpre());
              $cpdiseve->setCodeve($codeve);
              $cpdiseve->setMoneve($objcom->getMonimp());
              $cpdiseve->setTipdoc($tipdoc);
              $cpdiseve->setTipmov('COM');
              $cpdiseve->save();
           }
         }
       }                   
      }

      foreach ($regis as $objacom) {    
        $rifemp1=H::getX_vacio('CODEMP','Nphojint','Rifemp',$objacom->getCodempaco());
        if ($rifemp1!="")
            $cedrif1=$rifemp1;
        else
            $cedrif1=H::getX_vacio('CODEMP','Nphojint','Cedemp',$objacom->getCodempaco());

        if ($cedrif1=='')
           $cedrif1=H::getX_vacio('RIFNEMP','Vianoemp','Rifnemp',$objacom->getCodempaco());             
       if (Herramientas::getVerCorrelativo('corcom','cpdefniv',$rq))
       {
            $tienecorrelativo=true;
            $encontrado=false;
            while (!$encontrado)
            {
              $numero=str_pad($rq, 8, '0', STR_PAD_LEFT);

              $sql="select refcom from cpcompro where refcom='".$numero."'";
              if (Herramientas::BuscarDatos($sql,$result))
              {
                $rq=$rq+1;
              }
              else
              {
                $encontrado=true;
              }
            }
            $refecom=str_pad($rq, 8, '0', STR_PAD_LEFT);  
            $refcom=$refcom.$refecom.'_';    

            $cpcompro_new = new Cpcompro();
            $cpcompro_new->setRefcom($refecom);
            $cpcompro_new->setTipcom($clasemodelo->getTipcom());
            $cpcompro_new->setFeccom($clasemodelo->getFecha());
            $cpcompro_new->setAnocom(substr($clasemodelo->getFecha(),0,4));
            $cpcompro_new->setStacom('A');
            $cpcompro_new->setRefprc('NULO');
            $cpcompro_new->setDescom($clasemodelo->getDescrip());
            $cpcompro_new->setMoncom($monto/$numempvia);
            $cpcompro_new->setSalcau(0);
            $cpcompro_new->setSalpag(0);
            $cpcompro_new->setSalaju(0);
            $cpcompro_new->setCedrif($cedrif1);
            $reqaut=H::getX('TIPCOM','Cpdoccom','Reqaut',$clasemodelo->getTipcom());
            if ($reqaut=='S')              
              $cpcompro_new->setAprcom('N');
            else 
              $cpcompro_new->setAprcom('S');
            $cpcompro_new->save();                 
            
            $w=0;
            while ($w<count($datosGrid))
            {
                $cpimpcom_new = new Cpimpcom();
                $cpimpcom_new->setRefcom($refecom);
                $cpimpcom_new->setCodpre($datosGrid[$w]["codpre"]);
                $cpimpcom_new->setMonimp($datosGrid[$w]["monimp"]/$numempvia);
                $cpimpcom_new->setMoncau(0);
                $cpimpcom_new->setMonpag(0);
                $cpimpcom_new->setMonaju(0);
                $cpimpcom_new->setRefere('NULO');
                $cpimpcom_new->setStaimp('A');
                $cpimpcom_new->save();                     
              $w++;
            }
            if ($tienecorrelativo==true)
            {
               Herramientas::getSalvarCorrelativo('corcom','cpdefniv','Referencia',$rq,$msg);
            }         

           $tipdoc=H::getX_vacio('REFCOM','Cpcompro','Tipcom',$refecom);
           $codeve=H::getX_vacio('NUMSOL','Viasolviatra','Codeve',$clasemodelo->getRefsol());
           if ($codeve!='') {
             $e= new Criteria();
             $e->add(CpimpcomPeer::REFCOM,$refecom);
             $trajo= CpimpcomPeer::doSelect($e);
             if ($trajo)
             {
               foreach ($trajo as $objcom) {
                  $cpdiseve= new Cpdiseve();
                  $cpdiseve->setRefdoc($objcom->getRefcom());
                  $cpdiseve->setCodpre($objcom->getCodpre());
                  $cpdiseve->setCodeve($codeve);
                  $cpdiseve->setMoneve($objcom->getMonimp());
                  $cpdiseve->setTipdoc($tipdoc);
                  $cpdiseve->setTipmov('COM');
                  $cpdiseve->save();
               }
             }
           }                   
          }
          $objacom->setRefcom($refecom);
          $objacom->save();
        }
      }
    return -1;
  }

  public static function CargarRubrosInternacionales($numaco,$cambio,$arrrs,&$obj3){
    $acum = 0;
    $i=0;
    $per=array();
    $per1=array();
    $obj=array();
    $acumpri=H::getConfApp2('acumpri', 'viaticos', 'viacalviatra');
    $c = new Criteria();
    $result = ViadefgenPeer::doSelectOne($c);    
    if($result){
      $primasup=$result->getCodprisup();
      $primaadi=$result->getCodpriadi();
      $primagas=$result->getCodprigas();
      $rubint=$result->getRubint();
    }
    $monsup=0;
    $monadi=0;
    $mondiaint=0;

    foreach ($arrrs as $rs1) {
      $per1[$i]['check'] = $rs1['check'];
      $per1[$i]['codrub'] = $rs1['codrub'];
      $per1[$i]['desrub'] = $rs1['desrub'];
      $per1[$i]['numdia'] = ($rs1['numdia']);
      $per1[$i]['forcal'] = $rs1['forcal'];
      $per1[$i]['tipo'] = $rs1['tipo'];
      $per1[$i]['calculo'] = $rs1['calculo'];
      $per1[$i]['monpor'] = $rs1['monpor'];
      if ($per1[$i]['forcal']!='T') {
        $per1[$i]['mondia'] = H::FormatoMonto($rs1['mondia']);
        $per1[$i]['montot'] = H::FormatoMonto(($rs1['numdia'] * $rs1['mondia']) + ($rs1['numdia'] * $rs1['mondia'] * $numaco));
        $per1[$i]['mondiadol'] = H::FormatoMonto(($rs1['mondia'] / $cambio));
        $per1[$i]['montotdol'] = H::FormatoMonto((($rs1['mondia'] / $cambio) * $rs1['numdia']) + (($rs1['mondia'] / $cambio) * $rs1['numdia'] * $numaco));
      }else {
        $per1[$i]['mondia'] = H::FormatoMonto(0);
        $per1[$i]['montot'] = H::FormatoMonto(0);
        $per1[$i]['mondiadol'] = H::FormatoMonto(0);
        $per1[$i]['montotdol']= H::FormatoMonto(0);
      }
      if ($acumpri!='S') $acum+=H::toFloat($per1[$i]['mondia']);
      if ($rs1['codrub']==$rubint)
        if ($acumpri=='S') $acum+=H::toFloat($per1[$i]['mondia']);
        $mondiaint=H::toFloat($per1[$i]['mondia']);
      $per1[$i]['id'] = 9;  
      $i++;      
    }
    $i=0;
    foreach ($per1 as $rs) {  //Suplementaria
      $per[$i]['check'] = $rs['check'];
      $per[$i]['codrub'] = $rs['codrub'];
      $per[$i]['desrub'] = $rs['desrub'];
      $per[$i]['numdia'] = ($rs['numdia']);
      $per[$i]['forcal'] = $rs['forcal'];
      $per[$i]['tipo'] = $rs['tipo'];
      $per[$i]['calculo'] = $rs['calculo'];
      $per[$i]['monpor'] = $rs['monpor'];
      if ($per[$i]['codrub']==$primasup){
      if ($rs['forcal'] == 'T') {
        if ($rs['monpor']>0)
          $acum2=$acum*$rs['monpor']/100;
        else $acum2=$acum;
        $per[$i]['mondia'] = H::FormatoMonto($acum2);
        $per[$i]['montot'] = H::FormatoMonto(($per[$i]['numdia'] * $acum2) + ($per[$i]['numdia'] * $acum2 * $numaco));
        $per[$i]['mondiadol'] = H::FormatoMonto(($acum2 / $cambio));
        $per[$i]['montotdol'] = H::FormatoMonto((($acum2 / $cambio) * $per[$i]['numdia']) + (($acum2 / $cambio) * $per[$i]['numdia'] * $numaco));
        
      }else {
        if ($rs['monpor']>0)
          $acum2=$mondiaint*$rs['monpor']/100;
        else $acum2=$mondiaint;
        $per[$i]['mondia'] = H::FormatoMonto($acum2);
        $per[$i]['montot'] = H::FormatoMonto(($per[$i]['numdia'] * $acum2) + ($per[$i]['numdia'] * $acum2 * $numaco));
        $per[$i]['mondiadol'] = H::FormatoMonto(($acum2 / $cambio));
        $per[$i]['montotdol'] = H::FormatoMonto((($acum2 / $cambio) * $per[$i]['numdia']) + (($acum2 / $cambio) * $per[$i]['numdia'] * $numaco));
      }      
      $monsup= H::toFloat($per[$i]['mondia']); 
     }else {
        $per[$i]['mondia'] = $rs['mondia'];
        $per[$i]['montot'] = $rs['montot'];
        $per[$i]['mondiadol'] = $rs['mondiadol'];
        $per[$i]['montotdol'] = $rs['montotdol'];
     }
      $per[$i]['id'] = 9;       
      $i++;   
    }
    $i=0;
    foreach ($per as $obj1) {  //Adicional
      $obj[$i]['check'] = $obj1['check'];
      $obj[$i]['codrub'] = $obj1['codrub'];
      $obj[$i]['desrub'] = $obj1['desrub'];
      $obj[$i]['numdia'] = ($obj1['numdia']);
      $obj[$i]['forcal'] = $obj1['forcal'];
      $obj[$i]['tipo'] = $obj1['tipo'];
      $obj[$i]['calculo'] = $obj1['calculo'];
      $obj[$i]['monpor'] = $obj1['monpor'];
      if ($obj[$i]['codrub']==$primaadi){
        if ($obj1['forcal'] == 'T') {
          if ($obj1['monpor']>0) {
             if ($acumpri=='S')
              $acum3=($acum+$monsup)*$obj1['monpor']/100;
             else
              $acum3=($acum)*$obj1['monpor']/100;
          }else{ 
            if ($acumpri=='S')
              $acum3=($acum+$monsup);
            else
              $acum3=($acum);
          }

          $obj[$i]['mondia'] = H::FormatoMonto($acum3);
          $obj[$i]['montot'] = H::FormatoMonto(($obj[$i]['numdia'] * $acum3) + ($obj[$i]['numdia'] * $acum3 * $numaco));
          $obj[$i]['mondiadol'] = H::FormatoMonto(($acum3 / $cambio));
          $obj[$i]['montotdol'] = H::FormatoMonto((($acum3 / $cambio) * $obj[$i]['numdia']) + (($acum3 / $cambio) * $obj[$i]['numdia'] * $numaco));
        }else {
          if ($obj1['monpor']>0)
            if ($acumpri=='S')
              $acum3=($mondiaint+$monsup)*$obj1['monpor']/100;
            else
              $acum3=($mondiaint)*$obj1['monpor']/100;
          else 
            if ($acumpri=='S')
              $acum3=($mondiaint+$monsup);
            else
              $acum3=($mondiaint);

          $obj[$i]['mondia'] = H::FormatoMonto($acum3);
          $obj[$i]['montot'] = H::FormatoMonto(($obj[$i]['numdia'] * $acum3) + ($obj[$i]['numdia'] * $acum3 * $numaco));
          $obj[$i]['mondiadol'] = H::FormatoMonto(($acum3 / $cambio));
          $obj[$i]['montotdol'] = H::FormatoMonto((($acum3 / $cambio) * $obj[$i]['numdia']) + (($acum3 / $cambio) * $obj[$i]['numdia'] * $numaco));
        }
        $monadi=  H::toFloat($obj[$i]['mondia']);
      }else {      
        $obj[$i]['mondia'] = $obj1['mondia'];
        $obj[$i]['montot'] = $obj1['montot'];
        $obj[$i]['mondiadol'] = $obj1['mondiadol'];
        $obj[$i]['montotdol'] = $obj1['montotdol'];
      }
      $obj[$i]['id'] = 9; 
      $i++;
    }
    $i=0;
    foreach ($obj as $obj2) {  //Gastos de Representación
      $obj3[$i]['check'] = $obj2['check'];
      $obj3[$i]['codrub'] = $obj2['codrub'];
      $obj3[$i]['desrub'] = $obj2['desrub'];
      $obj3[$i]['numdia'] = ($obj2['numdia']);
      $obj3[$i]['forcal'] = $obj2['forcal'];
      $obj3[$i]['tipo'] = $obj2['tipo'];
      $obj3[$i]['calculo'] = $obj2['calculo'];
      $obj3[$i]['monpor'] = $obj2['monpor'];
      if ($obj3[$i]['codrub']==$primagas){
        if ($obj2['forcal'] == 'T') {
          if ($obj2['monpor']>0){
            if ($acumpri=='S')
              $acum3=($acum+$monsup+$monadi)*$obj2['monpor']/100;
            else 
              $acum3=($acum)*$obj2['monpor']/100;
          }
          else{ 
            if ($acumpri=='S')
              $acum3=($acum+$monsup+$monadi);
            else
              $acum3=($acum);
          }

          $obj3[$i]['mondia'] = H::FormatoMonto($acum3);
          $obj3[$i]['montot'] = H::FormatoMonto(($obj[$i]['numdia'] * $acum3) + ($obj[$i]['numdia'] * $acum3 * $numaco));
          $obj3[$i]['mondiadol'] = H::FormatoMonto(($acum3 / $cambio));
          $obj3[$i]['montotdol'] = H::FormatoMonto((($acum3 / $cambio) * $obj[$i]['numdia']) + (($acum3 / $cambio) * $obj[$i]['numdia'] * $numaco));
        }else {
          if ($obj2['monpor']>0)
            if ($acumpri=='S')
              $acum3=($mondiaint+$monsup+$monadi)*$obj2['monpor']/100;
            else
              $acum3=($mondiaint)*$obj2['monpor']/100;
          else 
            if ($acumpri=='S')
              $acum3=($mondiaint+$monsup+$monadi);
            else
              $acum3=$mondiaint;

          $obj3[$i]['mondia'] = H::FormatoMonto($acum3);
          $obj3[$i]['montot'] = H::FormatoMonto(($obj[$i]['numdia'] * $acum3) + ($obj[$i]['numdia'] * $acum3 * $numaco));
          $obj3[$i]['mondiadol'] = H::FormatoMonto(($acum3 / $cambio));
          $obj3[$i]['montotdol'] = H::FormatoMonto((($acum3 / $cambio) * $obj[$i]['numdia']) + (($acum3 / $cambio) * $obj[$i]['numdia'] * $numaco));
        }
      }else {      
        $obj3[$i]['mondia'] = $obj2['mondia'];
        $obj3[$i]['montot'] = $obj2['montot'];
        $obj3[$i]['mondiadol'] = $obj2['mondiadol'];
        $obj3[$i]['montotdol'] = $obj2['montotdol'];
      }
      $obj3[$i]['id'] = 9;

      $i++;
    }
  }  


/////////
}
?>