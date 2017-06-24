<?php

/**
 * almordcomv2 actions.
 *
 * @package    Roraima
 * @subpackage almordcomv2
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 41715 2010-12-13 19:41:51Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class almordcomv2Actions extends autoalmordcomv2Actions {

  public $coderror1 = -1;
  public $coderror2 = -1;
  public $coderror3 = -1;
  public $coderror4 = -1;
  public $mosmondisart;
  public $codigo_presupuestario = '';

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/caordcom/filters');

    $loguse= $this->getUser()->getAttribute('loguse');
    $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr'); 
    $filusuroc=H::getConfApp2('filusuroc', 'compras', 'almordcom'); 

     // 15    // pager
    $this->pager = new sfPropelPager('Caordcom', 15);
    $c = new Criteria();
    if ($filsoldir=='S'){
      $this->sql='Caordcom.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
      $c->add(CaordcomPeer::CODDIREC,$this->sql,Criteria::CUSTOM); 
    }else if ($filusuroc=='S'){
      $c->add(CaordcomPeer::USUROC,$loguse);
    }
    
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }  

  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit() {
    $this->caordcom = $this->getCaordcomOrCreate();
    $this->updateCaordcomFromRequest();

    if ($this->getRequest()->getMethod() == sfRequest::POST) {
      //if ($this->getRequestParameter('id') == "") {|
      $grid_detalle = Herramientas::CargarDatosGridv2($this, $this->obj, true); //0
      $grid_entregas = Herramientas::CargarDatosGridv2($this, $this->obj_entregas, true); //0
      $grid_formas_entregas = Herramientas::CargarDatosGridv2($this, $this->obj_formas); //0
      $grid_detalle_detallado = $grid_detalle[0];

      $c = new Criteria();
      $cadefart_search = CadefartPeer::doSelectOne($c);

      $grid_resumen = Herramientas::CargarDatosGridv2($this, $this->obj_resumen, true); //0
      if($this->getRequestParameter('caordcom[refsol]')!="")
            $refe='1';
          else
            $refe='0';
      if ($refe==0) $moneda=$this->getRequestParameter('caordcom[tipmon]');
          else $moneda=Herramientas::getX('reqart','Casolart','Tipmon',$this->getRequestParameter('caordcom[refsol]'));
          $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
      // Validacion del nro de la orden de compra
      if ($this->caordcom->getOrdcom()!='########') {
        $numord = str_replace('#', '0', $this->caordcom->getOrdcom());
        $numord = str_pad($numord, 8, '0', STR_PAD_LEFT);

        $prefijomixto = H::getConfApp('prefijomixto', 'compras', 'almordcom');
        $mancormext=H::getConfApp2('mancormext', 'compras', 'almordcom');
        if ($mancormext=='S') {
          if ($moneda!=$moneda2)
                $numord = 'OE' . substr($numord, 2, 6);
          else {
              if (($this->caordcom->getTipord() == 'S') || ($this->caordcom->getTipord() == 'M') || ($this->caordcom->getTipord() == 'T') || ($this->caordcom->getTipord() == 'G') || ($this->caordcom->getTipord() == 'A')) {
                if ($prefijomixto != "" && $this->caordcom->getTipord() == 'M')
                  $numord = $prefijomixto . substr($numord, 2, 6);
                elseif ($this->caordcom->getTipord() == 'T')
                  $numord = 'CO' . substr($numord, 2, 6);
                elseif ($this->caordcom->getTipord() == 'G')
                  $numord = 'SG' . substr($numord, 2, 6);
                elseif ($this->caordcom->getTipord() == 'A')
                  $numord = 'OM' . substr($numord, 2, 6);
                else
                  $numord = 'OS' . substr($numord, 2, 6);
                }else {         
                     $numord = 'OC' . substr($numord, 2, 6);          
                }
          }
        }else {
          if (($this->caordcom->getTipord() == 'S') || ($this->caordcom->getTipord() == 'M') || ($this->caordcom->getTipord() == 'T') || ($this->caordcom->getTipord() == 'G') || ($this->caordcom->getTipord() == 'A')) {
            if ($prefijomixto != "" && $this->caordcom->getTipord() == 'M')
              $numord = $prefijomixto . substr($numord, 2, 6);
            elseif ($this->caordcom->getTipord() == 'T')
              $numord = 'CO' . substr($numord, 2, 6);
            elseif ($this->caordcom->getTipord() == 'G')
              $numord = 'SG' . substr($numord, 2, 6);
            elseif ($this->caordcom->getTipord() == 'A')
              $numord = 'OM' . substr($numord, 2, 6);
            else
              $numord = 'OS' . substr($numord, 2, 6);
          }else {         
               $numord = 'OC' . substr($numord, 2, 6);          
          }
      }

        // Validación numord
        if (Herramientas::getX_vacio('ordcom', 'caordcom', 'ordcom', $numord) != '' && $this->getRequestParameter('id') == "") { //&& !($cadefart_search->getComasopre() == 'S') and !($cadefart_search->getComreqapr() == 'S')) {
          $this->coderror1 = 102;
          $this->caordcom->setOrdcom($numord);
          return false;
        }
    }

      /*$tiecom = Herramientas::getX_vacio('refcom','cpcompro','refcom',$numord);
      if ($tiecom!='')
      {
        $this->coderror1 = 3004;
        $this->caordcom->setOrdcom($numord);
        return false;
      }*/

      $valtiepro= H::getConfApp2('valtiepro', 'compras', 'almordcom');
       if($valtiepro=='S' && $this->getRequestParameter('id')==""){
        if ($this->getRequestParameter('caordcom[tippro]')==""){
          $this->coderror4=3012;
          return false;
        }
       }

       $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr');
       $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
       if($filsoldir=='S' && $this->getRequestParameter('id')==""){
        if ($this->getRequestParameter('caordcom[coddirec]')==""){
          if ($cambiareti=='S') $this->coderror4=3014; else $this->coderror4=3013;
          return false;
        }
       }

       $maxcomut= H::getConfApp2('maxcomut', 'compras', 'almsolegr');
       if($maxcomut=='S' && $this->getRequestParameter('id')==""){
          $valunitri=H::toFloat(H::getX_vacio('CODEMP','Opdefemp','unitri','001'));
          $canunitri=0;
          $q= new Criteria();
          $q->add(CaunitridirPeer::CODDIREC,$this->getRequestParameter('caordcom[coddirec]'));
          $q->addDescendingOrderByColumn(CaunitridirPeer::FECVIG);
          $reg= CaunitridirPeer::doSelectOne($q);
          if ($reg)
          {
             $canunitri=$reg->getCanunitri();
          }
          $monto=$canunitri*$valunitri;
          if (H::toFloat($this->getRequestParameter('caordcom[monord]'))>H::toFloat($monto))
          {
            $this->coderror4=3008;
            return false;
          }
       }

       $valfecultreg= H::getConfApp2('valfecultreg', 'compras', 'almordcom');
      if ($valfecultreg=='S')
      {
         $t= new Criteria();
         $t->setLimit(1);
         $t->add(CaordcomPeer::TIPORD,$this->getRequestParameter('caordcom[tipord]'));
         $t->addDescendingOrderByColumn(CaordcomPeer::FECORD);
         $reg= CaordcomPeer::doSelectOne($t);
         if ($reg)
         {
            $dateFormat = new sfDateFormat('es_VE');
            $fecha = $dateFormat->format($this->getRequestParameter('caordcom[fecord]'), 'i', $dateFormat->getInputPattern('d'));
            if ($fecha<$reg->getFecord()) {
              $this->coderror4=2107;
              return false;
            }

         }
      }
      
      if (H::getX_vacio('TipCom','CpDocCom','RefPrc',$this->caordcom->getDoccom())!='N' && $this->caordcom->getRefsol()=='')
         {
            $this->coderror4 = 222;
            return false;
         }

        if(H::getConfApp2('valreclim', 'compras', 'almordcom')=='S'){
          $p= new Criteria();
          $p->add(CaproveePeer::RIFPRO,$this->getRequestParameter('caordcom[rifpro]'));
          $datp= CaproveePeer::doSelectOne($p);
          if ($datp)
          {
            $grurec=$datp->getCodtiprec();
            $codpro=$datp->getCodpro();
          }
          $unitri=H::getX_vacio('CODEMP','Opdefemp','Unitri','001');
          $r= new Criteria();
          $r->add(CarecaudPeer::CODTIPREC,$grurec);
          $r->add(CarecaudPeer::LIMREC,'S');
          $recaudos= CarecaudPeer::doSelect($r);
          if ($recaudos)
          {
            foreach ($recaudos as $objrec) {
              if ($objrec->getCanutr()==0)
              {
                $rp= new Criteria();
                $rp->add(CarecproPeer::CODPRO,$codpro);
                $rp->add(CarecproPeer::CODREC,$objrec->getCodrec());
                $rep= CarecproPeer::doSelectOne($rp);
                if (!$rep)
                {
                  $this->coderror4 = 3002;
                  return false;
                }
              }else  if ($objrec->getCanutr()>0){                
                $totbs=H::toFloat($unitri*$objrec->getCanutr());
                $totord=H::toFloat($this->getRequestParameter('caordcom[monord]'))*H::toFloat($this->getRequestParameter('caordcom[valmon]'),6);
                if ($totord>=$totbs)
                {
                  $rp= new Criteria();
                  $rp->add(CarecproPeer::CODPRO,$codpro);
                  $rp->add(CarecproPeer::CODREC,$objrec->getCodrec());
                  $rep= CarecproPeer::doSelectOne($rp);
                  if (!$rep)
                  {
                    $this->coderror4 = 3002;
                    return false;
                  }
                }
              }
            }
          }
        }
         
      if (H::getConfApp2('valresp', 'compras', 'almordcom') == 'S') {
        if ($this->getRequestParameter('caordcom[codemp]') == "") {
          $this->coderror4 = 209;
          return false;
        }
      }

      if (H::getConfApp2('valunidad', 'compras', 'almordcom') == 'S') {
        if ($this->getRequestParameter('caordcom[coduni]') == "") {
          $this->coderror4 = 567;
          return false;
        } else {
          $r = new Criteria();
          $r->add(BnubicaPeer::CODUBI, $this->getRequestParameter('caordcom[coduni]'));
          $reg = BnubicaPeer::doSelectOne($r);
          if (!$reg) {
            $this->coderror4 = 568;
            return false;
          }
        }
      }
      $oculcencos=H::getConfApp2('oculcencos', 'compras', 'almsolegr');
      /*if ($oculcencos!='S') {
        if ($this->getRequestParameter('caordcom[codcen]') == "") {
          $this->coderror4 = 569;
          return false;
        } else {
          $r = new Criteria();
          $r->add(CadefcenPeer::CODCEN, $this->getRequestParameter('caordcom[codcen]'));
          $reg = CadefcenPeer::doSelectOne($r);
          if (!$reg) {
            $this->coderror4 = 570;
            return false;
          }
        }
      }*/

      $manevento=H::getConfApp2('manevento', 'compras', 'almsolegr');
      if ($manevento=='S' && !$this->caordcom->getId())
      {
        if ($this->getRequestParameter('caordcom[codeve]')==''){
          $this->coderror4=2108;
          return false;
       }
      }
      

      $this->mannivelapr = "";
      $varemp = $this->getUser()->getAttribute('configemp');
      if ($varemp)
        if (array_key_exists('generales', $varemp))
          if (array_key_exists('mannivapr', $varemp['generales'])) {
            $this->mannivelapr = $varemp['generales']['mannivapr'];
          }

      if ($this->mannivelapr == 'S') {
        $login = $this->getUser()->getAttribute('loguse');
        Autenticacion::validadNivelAprobacion($login, H::tofloat($this->getRequestParameter('caordcom[monord]')), $erro);
        if ($erro != -1) {
          $this->coderror4 = $erro;
          return false;
        }
      }

     /* if ($this->getRequestParameter('caordcom[genctaord]') == 'S') {
        $grabocom = $this->getUser()->getAttribute('grabo', null, $this->getUser()->getAttribute('formulario'));

        if ($grabocom == '') {
          $this->coderror4 = 508;
          return false;
        }

        if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('caordcom[fecord]')) == true) {
          $this->coderror3 = 529;
          return false;
        }
      }*/


      /*if (!Herramientas::validarPeriodoPresuesto($this->getRequestParameter('caordcom[fecord]'))) {
        $this->coderror1 = 151;
        return false;
      }*/

      if (!Herramientas::validarPeriodoFiscal($this->getRequestParameter('caordcom[fecord]'))) {
        $this->coderror1 = 150;
        return false;
      }

      $codart = '';
      if (!Orden_compra::VerificarDuplicidadArticulosDetalleOrden($grid_detalle_detallado, $codart)) {
        $this->coderror1 = 2101;
        $this->codart = $codart;
        return false;
      }

      Orden_compra::armarArregloTotalesRecargo($this->caordcom, $grid_detalle_detallado, $grid_recargos_detalle);
      $i = 0;
      $hay_disponibilidad = true;
      $verificardisponibilidad = $this->caordcom->AfectaDisponibilidad();

      $desaprcom=H::getConfApp2('desaprcom', 'presupuesto', 'precompro');
      // TODO - Verificar que no salte en los demás casos
      if($desaprcom == false or ($desaprcom == "S" and Herramientas::getX_vacio('ordcom', 'caordcom', 'ordcom', $numord)==""))
      {
        if ($verificardisponibilidad && ($cadefart_search->getComasopre() == 'S') and !($cadefart_search->getComreqapr() == 'S')) {
         if (!Herramientas::validarPeriodoPresuesto($this->getRequestParameter('caordcom[fecord]'))) {
            $this->coderror1 = 151;
            return false;
          }

           if($this->getRequestParameter('caordcom[refsol]')!="")
            $refe='1';
          else
            $refe='0';
              
          if ($refe==0)
          {
            $campo12='rgoart';//tabla Caartord
            $campo11='dtoart';//tabla Caartord
            $campo9='preart';//tabla Caartord
            $campo13='totart';//tabla Caartord
            $campo15='codpre';//tabla Caartord
          }
          else
          {
            $campo12='monrgo';//tabla Caartsol
            $campo11='dondes';//tabla Caartsol
            $campo9='costo';//tabla Caartsol
            $campo13='montot';//tabla Caartsol
            $campo15='codigopre';//tabla Caartsol
          }
   
          if ($refe==0) $moneda=$this->getRequestParameter('caordcom[tipmon]');
          else $moneda=Herramientas::getX('reqart','Casolart','Tipmon',$this->getRequestParameter('caordcom[refsol]'));
          $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
          if ($moneda2!=$moneda) {
                  if ($refe==0) $valor=H::toFloat($this->getRequestParameter('caordcom[valmon]'),6);
                  else $valor=Herramientas::getX('reqart','Casolart','Valmon',$caordcom->getRefsol());
          }else
              $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);
          
            $datosGrid = array();
            $tiporec = Herramientas::getX_vacio('codemp','cadefart','asiparrec','001');
            $grid_detalle_orden_arreglos=$grid_detalle[0];
            while ($i<count($grid_detalle_orden_arreglos))
            {
              $codigo_presupuestario =  $grid_detalle_orden_arreglos[$i]['codcat']."-".$grid_detalle_orden_arreglos[$i]['codpar'];
              $a= new Criteria();
              $a->add(CpasiiniPeer::PERPRE,'00');
              $a->add(CpasiiniPeer::CODPRE,$codigo_presupuestario);
              $data2= CpasiiniPeer::doSelectOne($a);
              if (!$data2)
              {
                  $hay_disponibilidad=false;
                  $this->codigo_presupuestario=$codigo_presupuestario;
                  $this->coderror1=512;
                  return false;
              }

              $codpre=H::getCodPreDis($codigo_presupuestario);
              if ($tiporec=='C') {       
                if ($moneda2!=$moneda) $elmonto=H::toFloat(str_replace("'","",$grid_detalle_orden_arreglos[$i][$campo13]))*H::toFloat($valor,6);
                 else $elmonto=str_replace("'","",$grid_detalle_orden_arreglos[$i][$campo13]); 
              }
              else {
                if ($moneda2!=$moneda) $elmonto=((H::toFloat($grid_detalle_orden_arreglos[$i][$campo13])*H::toFloat($valor,6))-$grid_detalle_orden_arreglos[$i][$campo12]);
                 else $elmonto=($grid_detalle_orden_arreglos[$i][$campo13]-$grid_detalle_orden_arreglos[$i][$campo12]);
              }

              $pos=  Presupuesto::posicion_en_el_grid2($datosGrid, $codpre);
              if ($pos==0)
              {
               $j=count($datosGrid)+1;
               $datosGrid[$j-1]["codpre"]=$codpre;
               $datosGrid[$j-1]["monimp"]=$elmonto;
               $datosGrid[$j-1]["codpre2"]=$codigo_presupuestario;
              }
              else
              {
               $datosGrid[$pos-1]["monimp"]=$datosGrid[$pos-1]["monimp"]+$elmonto;
              }           

              $i++;
            }
            
            $p=0;
              while ($p<count($datosGrid))
              {
                $disponible = H::Monto_disponible($datosGrid[$p]["codpre"],$this->caordcom->getFecord());
                if(H::toFloat($datosGrid[$p]["monimp"]) > H::toFloat($disponible)){
                    $hay_disponibilidad=false;
                    $mimp=H::toFloat($datosGrid[$p]["monimp"]);
                    $mdis=H::toFloat($disponible);
                    $resta=$mimp-$mdis;
                    $this->codigo_presupuestario=$datosGrid[$p]["codpre2"].", el monto a imputar es de: ".H::FormatoMonto($mimp) ." y el monto disponible es: ".H::FormatoMonto($mdis).", necesita una disponibilidad adicional de: ".H::FormatoMonto($resta);
                    $this->coderror1=118;
                    return false;
                }
                $p++;
              }
            $comnoiva=H::getConfApp2('comnoiva', 'compras', 'almordcom');
            if ($hay_disponibilidad)
            {
              $i=0;
              $datosGridRec=array();
              if (count($grid_recargos_detalle)>0 && $comnoiva!='S')
              {
                while ($i<count($grid_recargos_detalle))
                {
                   $c= new Criteria();
                   $c->add(CarecargPeer::CODRGO,$grid_recargos_detalle[$i]['codrgo']);
                   $data= CarecargPeer::doSelectOne($c);
                   if ($data)
                   {
                      if ($tiporec=='P') {          
                         $t= new Criteria();
                         $t->add(CpdeftitPeer::CODPRE,$data->getCodpre());
                         $trajo= CpdeftitPeer::doSelectOne($t);
                         if ($trajo) {
                          $a= new Criteria();
                          $a->add(CpasiiniPeer::PERPRE,'00');
                          $a->add(CpasiiniPeer::CODPRE,$data->getCodpre());
                          $data2= CpasiiniPeer::doSelectOne($a);
                          if (!$data2)
                          {
                              $this->codigo_presupuestario=$data->getCodpre();
                              $this->coderror1=512;
                              return false;
                          }
                         }else {
                             $this->codigo_presupuestario=$data->getCodpre();
                              $this->coderror1=2103;
                              return false;
                         }
                          $codpre=H::getCodPreDis($data->getCodpre());
                      }
                      else  {
                         $t= new Criteria();
                         $t->add(CpdeftitPeer::CODPRE,$grid_recargos_detalle[$i]['codcat'].'-'.$data->getCodpre());
                         $trajo= CpdeftitPeer::doSelectOne($t);
                         if ($trajo) {
                              $a= new Criteria();
                              $a->add(CpasiiniPeer::PERPRE,'00');
                              $a->add(CpasiiniPeer::CODPRE,$grid_recargos_detalle[$i]['codcat'].'-'.$data->getCodpre());
                              $data2= CpasiiniPeer::doSelectOne($a);
                              if (!$data2)
                              {
                                  $this->codigo_presupuestario=$grid_recargos_detalle[$i]['codcat'].'-'.$data->getCodpre();
                                  $this->coderror1=512;
                                  return false;
                              }
                         }else {
                             $this->codigo_presupuestario=$grid_recargos_detalle[$i]['codcat'].'-'.$data->getCodpre();
                              $this->coderror1=2103;
                              return false;
                         }
                         $codpre=H::getCodPreDis($grid_recargos_detalle[$i]['codcat'].'-'.$data->getCodpre());
                      }

                      if ($moneda2!=$moneda) $monrecar=$grid_recargos_detalle[$i]['monrgo']*$valor;
                      else  $monrecar=$grid_recargos_detalle[$i]['monrgo'];
                      $pos=  Presupuesto::posicion_en_el_grid2($datosGridRec, $codpre);
                      if ($pos==0)
                      {
                       $j=count($datosGridRec)+1;
                       $datosGridRec[$j-1]["codpre"]=$codpre;
                       $datosGridRec[$j-1]["monimp"]=$monrecar;
                      }
                      else
                      {
                       $datosGridRec[$pos-1]["monimp"]=$datosGridRec[$pos-1]["monimp"]+$monrecar;
                      }  
                   }
                $i++;
                }
                $g=0;
                   while ($g<count($datosGridRec))
                   {
                    $disponible = H::Monto_disponible($datosGridRec[$g]["codpre"],$this->caordcom->getFecord());
                    if(H::toFloat($datosGridRec[$g]["monimp"]) > H::toFloat($disponible)){
                      $mimp=H::toFloat($datosGridRec[$g]["monimp"]);
                      $mdis=H::toFloat($disponible);
                      $resta=$mimp-$mdis;
                      $this->codigo_presupuestario=$datosGridRec[$g]["codpre"].", el monto a imputar es de: ".H::FormatoMonto($mimp) ." y el monto disponible es: ".H::FormatoMonto($mdis).", necesita una disponibilidad adicional de: ".H::FormatoMonto($resta);
                      $this->coderror1=119;
                      return false;
                    }
                    $g++;
                   }
              }
            
          }
        }
      }
      // return true;
      //} else {
      if (Herramientas::getX_vacio('ordcom', 'caordcom', 'staord', $this->caordcom->getOrdcom()) == 'N') {
        $this->coderror1 = 159;
        return false;
      } else {
        return true;
      }
      //}
      return true;
    }else
      return true;
  }

  /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function handleErrorEdit() {
    $this->preExecute();
    $this->caordcom = $this->getCaordcomOrCreate();
    if ($this->tipordsergen == 'S')
      $this->listatipocompra = Constantes::ListaTipoCompraSerGen();
    else
      $this->listatipocompra = Constantes::ListaTipoCompra();
    $this->imp = $this->getRequestParameter('impche');
    $this->readonly = '';

    try {
      $this->updateCaordcomFromRequest();
    } catch (Exception $ex) {

    }
    $this->setVars();
    $this->labels = $this->getLabels();
    if ($this->getRequest()->getMethod() == sfRequest::POST) {
      if ($this->coderror1 != -1) {
        $err = Herramientas::obtenerMensajeError($this->coderror1);
        if ($this->coderror1 == 118 || $this->coderror1 == 119)
          $this->getRequest()->setError('', $err . '  ->  ' . $this->codigo_presupuestario);
        elseif ($this->coderror1 == 2101)
          $this->getRequest()->setError('', $err . '  ->  ' . $this->codart);
        else
          $this->getRequest()->setError('', $err);
      }
      if ($this->coderror3 != -1) {
        $err3 = Herramientas::obtenerMensajeError($this->coderror3);
        $this->getRequest()->setError('caordcom{fecord}', $err3);
      }
      if ($this->coderror4 != -1) {
        $err3 = Herramientas::obtenerMensajeError($this->coderror4);
        $this->getRequest()->setError('', $err3);
      }
    }
    return sfView::SUCCESS;
  }

  public function ValidarGeneroComprobantes() {
    $var = false;
    if ($this->getUser()->getAttribute('contabc[numcom]', null, $this->getUser()->getAttribute('formulario')))
      $var = true;
    return $var;
  }

  protected function getCaordcomOrCreate($id = 'id') {
    if (!$this->getRequestParameter($id)) {
      $caordcom = new Caordcom();
      $caordcom->setCodemp(Herramientas::getCodempFromCedemp());
      $this->aprobacion = 'N';
      $c = new Criteria();
      $cadefart_search = CadefartPeer::doSelectOne($c);
      if ($cadefart_search) {
        if (($cadefart_search->getComasopre() == 'S') and ($cadefart_search->getComreqapr() == 'S'))
          $this->aprobacion = 'S';
        else
          $this->aprobacion = 'N';
      }
      $this->setVars();
      $tipopro = H::getX('RIFPRO', 'Caprovee', 'Tipo', $this->getRequestParameter('caordcom[rifpro]'));
      $this->funciones_combos($this->getRequestParameter('caordcom[codpai]'), $this->getRequestParameter('caordcom[codedo]'), $this->getRequestParameter('caordcom[codmun]'));
      //si viene de una referencia y no se carga parcialmente
      if (($this->getRequestParameter('caordcom[refsol]') != "") and ($this->getRequestParameter('parcial') == "N"))
        $this->configGrid($this->getRequestParameter('caordcom[refsol]'), '1', $tipopro);
      //si viene de una referencia y se carga parcialmente
      else if (($this->getRequestParameter('caordcom[refsol]') != "") and ($this->getRequestParameter('parcial') == "S")) {
        if ($this->getRequestParameter('caordcom[rifpro]') != '') {
          if (Orden_compra::Verificar_proveedor(trim($this->getRequestParameter('caordcom[refsol]')), trim($this->getRequestParameter('caordcom[rifpro]')), $rifpro, $msg, $cancotpril, $strrifpro, $srtrefcot))
            $this->configGrid_Parcial($this->getRequestParameter('caordcom[refsol]'), trim($this->getRequestParameter('caordcom[rifpro]')), $tipopro);
        }
      }
      //si no viene de una referencia y no se carga parcialmente
      else
        $this->configGrid($this->getRequestParameter('caordcom[ordcom]'), '0', '');

      /*  if (($this->getRequestParameter('caordcom[refsol]')!="") and ($this->getRequestParameter('parcial')=="S"))
        $this->configGrid_Recargos($this->getRequestParameter('caordcom[refsol]'),$this->getRequestParameter('caordcom[rifpro]'));
        else
        $this->configGrid_Recargos($this->getRequestParameter('caordcom[ordcom]'),'0'); */
      $this->configGridRecargo();
      $this->configGrid_Resumen($this->getRequestParameter('caordcom[ordcom]'));
      $this->configGrid_ResumenPartidas($this->getRequestParameter('caordcom[ordcom]'));
      $this->configGrid_Entregas($this->getRequestParameter('caordcom[ordcom]'));
      $this->configGrid_FormasEntrega($this->getRequestParameter('caordcom[ordcom]'));
      $this->configGrid_EntregasPDA($this->getRequestParameter('caordcom[ordcom]'));
    }
    else {
      $this->aprobacion = 'N';
      $c = new Criteria();
      $cadefart_search = CadefartPeer::doSelectOne($c);
      if ($cadefart_search) {
        if (($cadefart_search->getComasopre() == 'S') and ($cadefart_search->getComreqapr() == 'S'))
          $this->aprobacion = 'S';
        else
          $this->aprobacion = 'N';
      }
      $caordcom = CaordcomPeer::retrieveByPk($this->getRequestParameter($id));
      $tipopro = H::getX('RIFPRO', 'Caprovee', 'Tipo', $caordcom->getRifpro());
      $sql = "Select fecanu from caordcom Where ordcom='" . $caordcom->getOrdcom() . "' and staord='N'";
      /* if (Herramientas::BuscarDatos($sql,&$result))
        {
        $fec=adodb_date('d/m/Y',adodb_strtotime($result[0]['fecanu']));
        $this->setFlash('notice','Orden de Compra fue Anulada el dia '.$fec);
        } */
      $this->setVars();
      $this->funciones_combos($caordcom->getCodpai(), $caordcom->getCodedo(), $caordcom->getCodmun());
      $this->configGrid($caordcom->getOrdcom(), '0', $tipopro);
      $this->configGridRecargo();
      $this->configGrid_Resumen($caordcom->getOrdcom());
      $this->configGrid_ResumenPartidas($caordcom->getOrdcom());
      $this->configGrid_Entregas($caordcom->getOrdcom());
      $this->configGrid_FormasEntrega($caordcom->getOrdcom());
      $this->configGrid_EntregasPDA($caordcom->getOrdcom());
      $this->forward404Unless($caordcom);
    }

    return $caordcom;
  }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit() {
    $this->caordcom = $this->getCaordcomOrCreate();
    $this->caordcom->setOculsave($this->oculsave);
    $this->imp = $this->getRequestParameter('impche');
    if ($this->tipordsergen == 'S')
      $this->listatipocompra = Constantes::ListaTipoCompraSerGen();
    else
      $this->listatipocompra = Constantes::ListaTipoCompra();
    $this->readonly = '';
    //$err = Herramientas::obtenerMensajeError($coderror);

    if ($this->caordcom->getOrdcom() != '')
      $this->readonly = true;

    if (!$this->caordcom->getId()){        
        $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr');
        if ($filsoldir=='S'){
           $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
           $t= new Criteria();
           $t->add(SegdirusuPeer::LOGUSE,$loguse);
           $t->setLimit(1);
           $t->addAscendingOrderByColumn(SegdirusuPeer::CODDIREC);
           $regt= SegdirusuPeer::doSelectOne($t); 
           if ($regt){
            if ($this->caordcom->getCoddirec()=='')
              $this->caordcom->setCoddirec($regt->getCoddirec());
           }
          
        }
      }

    if ($this->getRequest()->getMethod() == sfRequest::POST) {
      $this->updateCaordcomFromRequest();
      $coderr = $this->saveCaordcom($this->caordcom);
      if ($coderr == -1) {
        $this->caordcom->setId(Herramientas::getX_vacio('ordcom', 'caordcom', 'id', $this->caordcom->getOrdcom()));
         $this->SalvarBitacora($this->caordcom->getId() ,'Guardo');
        $this->setFlash('notice', 'Your modifications have been saved');

        $c = new Criteria();
        $resul = CadefartPeer::doSelectOne($c);
        if ($resul) {
          if ($resul->getComasopre() == 'S' && $resul->getComreqapr() != 'S') {
            $tip = H::getX('CODPRO', 'Caprovee', 'Tipo', $this->caordcom->getCodpro());
            if ($tip == 'P') {
              $totaimp = Orden_compra::totalImputacion($this->caordcom->getOrdcom());
              $moneda = $this->caordcom->getTipmon();
              $moneda2 = H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
              if ($moneda2 != $moneda) {
                $valor = $this->caordcom->getValmon();
              }else
                $valor=H::getX_vacio('CODMON', 'Tsdesmon', 'Valmon', $moneda);
              if ((H::toFloat($this->caordcom->getMonord()) * H::toFloat($valor,6)) != H::toFloat($totaimp)) {
                $this->setFlash('notice', 'El Monto de la Imputaciones Generadas no es igual al de la Solicitud, Por favor verificar esta solicitud');
              }
            }
          }
        }


        if ($this->getRequestParameter('save_and_add'))
          return $this->redirect('almordcomv2/create');
        else if ($this->getRequestParameter('save_and_list'))
          return $this->redirect('almordcomv2/list');
        else
          return $this->redirect('almordcomv2/edit?imp=S&id=' . $this->caordcom->getId());
      }//if ($this->saveCaordcom($this->caordcom)==-1)
      else if ($coderr == -11) {

        $this->setFlash('notice', 'Se ha guardado solamente la Descripción');
        $this->Bitacora('Guardo');

        if ($this->getRequestParameter('save_and_add')) {
          return $this->redirect('almordcomv2/create');
        } else if ($this->getRequestParameter('save_and_list')) {
          return $this->redirect('almordcomv2/list');
        } else {
          return $this->redirect('almordcomv2/edit?id=' . $this->caordcom->getId());
        }
      } else {
        if ($coderr != -1) {
          $err = Herramientas::obtenerMensajeError($coderr);
          $this->getRequest()->setError('', $err);
        }

        $this->labels = $this->getLabels();
        return sfView::SUCCESS;
      }
    } else
      $this->labels = $this->getLabels();
  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxcompromiso() {
    $this->getUser()->getAttributeHolder()->remove('genero_compromiso');
    $this->getUser()->setAttribute('genero_compromiso', 'S');

    $this->caordcom = $this->getCaordcomOrCreate();
    $this->updateCaordcomFromRequest();
    Orden_compra::verificarDispComprometer($this->caordcom, $error1, $cod1, $error2, $error3,$mdis,$mimp,$resta);
    if ($error3 == -1) {
      if ($error1 == -1) {
        if ($error2 == -1) {
          Orden_compra::Grabar_compromiso($this->caordcom);
          $totaimp = Orden_compra::totalImputacion($this->caordcom->getOrdcom());
          $moneda = $this->caordcom->getTipmon();
          $moneda2 = H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
          if ($moneda2 != $moneda) {
            $valor = $this->caordcom->getValmon();
          }else
            $valor=H::getX_vacio('CODMON', 'Tsdesmon', 'Valmon', $moneda);
            $v1=H::toFloat($totaimp);
            $v2=H::toFloat(H::toFloat($this->caordcom->getMonord()) * H::toFloat($valor,6));
          if ($v2 != $v1) {
            $msj = "El Monto de la Imputaciones Generadas no es igual al de la Solicitud, Por favor verificar esta solicitud".$v1.'-'.$v2;
          } else {
            $msj = "Se genero el Compromiso satisfactoriamente";
          }
         // $this->getUser()->getAttributeHolder()->remove('genero_compromiso');
        } else {
          $msj = "No hay disponibilidad para el siguiente Código presupuestario: ".$cod1.", el monto a imputar es de: ".H::FormatoMonto($mimp) ." y el monto disponible es: ".H::FormatoMonto($mdis).", necesita una disponibilidad adicional de: ".H::FormatoMonto($resta);
        }
      }else
        $msj="No hay disponibilidad para el siguiente Código presupuestario: ".$cod1.", el monto a imputar es de: ".H::FormatoMonto($mimp) ." y el monto disponible es: ".H::FormatoMonto($mdis).", necesita una disponibilidad adicional de: ".H::FormatoMonto($resta);
    }else
      $msj="La Fecha no se encuentra dentro de un Perido Abierto.";

    $this->getUser()->getAttributeHolder()->remove('genero_compromiso');

    $javascript = "alert('" . $msj . "'); $('btncomp').hide();";
    $output = '[["javascript","' . $javascript . '",""]]';

    $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
    return sfView::HEADER_ONLY;
  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxcomprobante() {
    $this->caordcom = $this->getCaordcomOrCreate();
    $this->updateCaordcomFromRequest();
    $this->i = "";
    $this->msjuno = "";
    $this->formulario = array();
    $referencia = $this->getUser()->getAttribute('referencia');
    $total = 0;
    $detalle = Herramientas::CargarDatosGridv2($this, $this->obj, true);

    $x = $detalle[0];
    $j = 0;
    while ($j < count($x)) {
      if ($referencia == 0)
        $mont = $x[$j]["totart"];
      else
        $mont=$x[$j]["montot"];

      $total = $total + $mont;
      $j++;
    }


    $c = new Criteria();
    $reg = OpdefempPeer::doSelectOne($c);
    if ($reg) {
      /* if ($reg->getGencomalc()=='S')
        {
        Orden_compra::generarComprobante($this->caordcom,$detalle,$referencia,$total,&$msjuno,&$comprobante);
        }
        else
        { */
      Orden_compra::generarComprobanteOrden($this->caordcom, $total, $msjuno, $comprobante);
      //}

      if ($msjuno == "") {
        $form = "sf_admin/almordcomv2/confincomgen";
        $i = 0;
        $f[$i] = $form . $i;
        $this->getUser()->setAttribute('grabar', $comprobante[0]->getGrabar(), $f[$i]);
        $this->getUser()->setAttribute('reftra', $comprobante[0]->getReftra(), $f[$i]);
        $this->getUser()->setAttribute('numcomp', $comprobante[0]->getNumcom(), $f[$i]);
        $this->getUser()->setAttribute('fectra', $comprobante[0]->getFectra(), $f[$i]);
        $this->getUser()->setAttribute('destra', $comprobante[0]->getDestra(), $f[$i]);
        $this->getUser()->setAttribute('ctas', $comprobante[0]->getCtas(), $f[$i]);
        $this->getUser()->setAttribute('desctas', $comprobante[0]->getDesc(), $f[$i]);
        $this->getUser()->setAttribute('tipmov', '');
        $this->getUser()->setAttribute('mov', $comprobante[0]->getMov(), $f[$i]);
        $this->getUser()->setAttribute('montos', $comprobante[0]->getMontos(), $f[$i]);
        $this->i = 0;
        $this->formulario = $f;
      } else {
        $this->msjuno = $msjuno;
      }
    }
  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax() {
    $cajtexmos = $this->getRequestParameter('cajtexmos');
    $cajtexcom = $this->getRequestParameter('cajtexcom');
    $cajtexmos2 = $this->getRequestParameter('cajtexmos2');
    $javascript = "";
    $this->ajaxs=$this->getRequestParameter('ajax');
    if ($this->getRequestParameter('ajax') == '2') {
      $codigo = trim(strtoupper($this->getRequestParameter('codigo')));
      $cardetocvie=H::getConfApp2('cardetocvie', 'compras', 'almordcom');
      $dato = CpdoccomPeer::getNomext($codigo);
      $this->mostrar = false;
      if ($codigo != '') {
        if (Herramientas::getX_vacio('TipCom', 'CpDocCom', 'RefPrc', $codigo) != 'N') {
          $this->mostrar = true;
          $val = true;
          $opcion = '1';
          $javascript = "$('div_solicitud').show();$('caordcom_refprc_s').checked=true;";
          $output = '[["' . $cajtexcom . '","' . $codigo . '",""],["' . $cajtexmos . '","' . $dato . '",""],["javascript","' . $javascript . '",""]]';
        } else {
          $javascript = "$('div_solicitud').hide(); $('caordcom_refprc_n').checked=true;";
          if ($cardetocvie=='S')
            $javascript.= "$('divBtnCarOC').show();";
          $output = '[["' . $cajtexcom . '","' . $codigo . '",""],["' . $cajtexmos . '","' . $dato . '",""],["javascript","' . $javascript . '",""]]';
        }
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        return sfView::HEADER_ONLY;
      }//if (trim($this->getRequestParameter('codigo'))!='')
    } else if ($this->getRequestParameter('ajax') == '3') {
      $tipord = $this->getRequestParameter('tipord');
      $longitudart = strlen(Herramientas::getMascaraArticulo());
      //print $tipord;
      $c = new Criteria();
      $c->add(CaregartPeer::CODART, $this->getRequestParameter('codigo'));
      if ($tipord == 'T')
        $tipord = 'S';
      if ($tipord == 'S' || $tipord == 'A' || $this->getRequestParameter('tipord') == 'T')
        $c->add(CaregartPeer::TIPO, $tipord);
      $reg = CaregartPeer::doSelectOne($c);
      if ($reg) {
        if ($longitudart == strlen($this->getRequestParameter('codigo'))) {
          $dato = eregi_replace("[\n|\r|\n\r]", "", htmlspecialchars($reg->getDesart()));
          $dato1 = $reg->getUnimed();
          $dato2 = number_format($reg->getCosult(), 2, ',', '.');
          $dato3 = $reg->getCodpar();
          //    $dato4=NppartidasPeer::getNompar($dato3);
          $output = '[["' . $cajtexmos . '","' . $dato . '",""],["' . $this->getRequestParameter('unidad') . '","' . $dato1 . '",""],["' . $this->getRequestParameter('costo') . '","' . $dato2 . '",""],["' . $this->getRequestParameter('partida') . '","' . $dato3 . '",""]]';
        } else {
          $javascript = "alert('El Codigo del Articulo no es de Ultimo Nivel');$('" . $cajtexmos . "').value='';$('" . $cajtexcom . "').value='';$('" . $this->getRequestParameter('unidad') . "').value='';$('" . $this->getRequestParameter('costo') . "').value='0.00';$('" . $this->getRequestParameter('partida') . "').value=''";
          $output = '[["javascript","' . $javascript . '",""]]';
        }
      } else {
        $javascript = "alert('Articulo no existe, o no es un Articulo/Servicio');$('" . $cajtexmos . "').value='';$('" . $cajtexcom . "').value='';$('" . $this->getRequestParameter('unidad') . "').value='';$('" . $this->getRequestParameter('costo') . "').value='0.00';$('" . $this->getRequestParameter('partida') . "').value=''";
        $output = '[["javascript","' . $javascript . '",""]]';
      }
      $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
      return sfView::HEADER_ONLY;
    } else if ($this->getRequestParameter('ajax') == '4') {
      $dato = CarecargPeer::getRecargo(trim($this->getRequestParameter('codigo')));
      $output = '[["' . $cajtexmos . '","' . $dato . '",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
      return sfView::HEADER_ONLY;
    } else if ($this->getRequestParameter('ajax') == '5') {
      $dato = CpasiiniPeer::getExiste_pre(trim($this->getRequestParameter('codigo')));
      if ($dato == '')
        $dato = 'Codigo Presupuestario no Existe';
      $output = '[["' . $cajtexmos . '","' . $dato . '",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
      return sfView::HEADER_ONLY;
    }
    else if ($this->getRequestParameter('ajax') == '6') {
      $dato = CaconpagPeer::getDesconpag(trim($this->getRequestParameter('codigo')));
      $output = '[["' . $cajtexmos . '","' . $dato . '",""],["' . $cajtexmos2 . '","' . $this->getRequestParameter('codigo') . '",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
      return sfView::HEADER_ONLY;
    } else if ($this->getRequestParameter('ajax') == '7') {
      $dato = CaforentPeer::getDesforent(trim($this->getRequestParameter('codigo')));
      $output = '[["' . $cajtexmos . '","' . $dato . '",""],["' . $cajtexmos2 . '","' . $this->getRequestParameter('codigo') . '",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
      return sfView::HEADER_ONLY;
    } else if ($this->getRequestParameter('ajax') == '8') {
      $catprofor=H::getConfApp2('catprofor', 'compras', 'almordcom');
      $dato=$js="";
      if ($catprofor=='S'){
        $p= new Criteria();
        $p->add(FordefpryPeer::CODPRO,$this->getRequestParameter('codigo'));
        $regp= FordefpryPeer::doSelectOne($p);
        if ($regp)
          $dato=$regp->getNompro();
        else
          $js="alert('El Proyecto no existe'); $('$cajtexcom').value=''; $('$cajtexmos').value=''; $('$cajtexcom').focus();";
      }else{
        $p= new Criteria();
        $p->add(CatipproPeer::CODPRO,$this->getRequestParameter('codigo'));
        $regp= CatipproPeer::doSelectOne($p);
        if ($regp)
         $dato = $regp->getDespro();
       else
        $js="alert('El Proyecto no existe'); $('$cajtexcom').value=''; $('$cajtexmos').value=''; $('$cajtexcom').focus();";
      }
      $output = '[["' . $cajtexmos . '","' . $dato . '",""],["javascript","' .$js. '",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
      return sfView::HEADER_ONLY;
      
    } else if ($this->getRequestParameter('ajax') == '9') {
      $javascript="";
      $codpre=$this->getRequestParameter('codpre1');
      $finpre=H::getConfApp2('finpre', 'compras', 'almsolegr');
      $q= new Criteria();
      $q->add(FortipfinPeer::CODFIN,$this->getRequestParameter('codigo'));
      if ($finpre=='S'){
        $q->add(CpdisfuefinPeer::CODPRE,$codpre);
        $q->add(CpdisfuefinPeer::ORIGEN,'INICIAL');
        $q->addJoin(FortipfinPeer::CODFIN,CpdisfuefinPeer::FUEFIN);
      }
      $reg= FortipfinPeer::doSelectOne($q);
      if ($reg)
      {
         $dato=$reg->getNomext();                
      }else {
          $dato="";
          $javascript="alert_('La Financiamiento no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
      }
      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';

      $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
      return sfView::HEADER_ONLY;
    } else if ($this->getRequestParameter('ajax') == '10') {
      $dato = BnubicaPeer::getDesubi(trim($this->getRequestParameter('codigo')));
      $output = '[["' . $cajtexmos . '","' . $dato . '",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
      return sfView::HEADER_ONLY;
    } else if ($this->getRequestParameter('ajax') == '11') {
      $dato = NphojintPeer::getNomemp(trim($this->getRequestParameter('codigo')));
      $output = '[["' . $cajtexmos . '","' . $dato . '",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
      return sfView::HEADER_ONLY;
    } else if ($this->getRequestParameter('ajax') == '12') {
      $dato = CpasiiniPeer::getExiste_pre(trim($this->getRequestParameter('codigo')));
      if ($dato == '')
        $dato = '';
      $output = '[["' . $cajtexmos . '","' . $dato . '",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
      return sfView::HEADER_ONLY;
    }
    else if ($this->getRequestParameter('ajax') == '13') {
      $bandera = trim($this->getRequestParameter('bandera'));
      $codigo = trim($this->getRequestParameter('codigo'));
      $ano = substr(trim($this->getRequestParameter('fecha')), 6, 4);
      $mes = substr(trim($this->getRequestParameter('fecha')), 3, 2);
      $monto = trim($this->getRequestParameter('monto'));
      $tipmon = trim($this->getRequestParameter('moneda'));
      $valmon = H::toFloat($this->getRequestParameter('valmon'),6);
      $vacio = '';
      $result = array();
      $monto = Herramientas::tofloat($monto) * $valmon;
      $sql = "Select mondis from CPAsiIni WHERE CodPre = '" . $codigo . "' AND PERPRE = '00' and AnoPre='" . $ano . "'";
      if (Herramientas::BuscarDatos($sql, $result)) {
        $mondis = SolicituddeEgresos::montoDisponible($codigo,$mes);
        if ($monto > $mondis) {
          $javascript = "alert_('El C&oacute;digo " . $codigo . " no tiene disponibilidad. Solo Dispone de: " . H::FormatoMonto($mondis) . "');";
        }
      } else {
        $javascript = "alert_('El C&oacute;digo Presupuestario no existe');";
      }
      $output = '[["javascript","' . $javascript . '",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
      return sfView::HEADER_ONLY;
    } else if ($this->getRequestParameter('ajax') == '14') {
      $var = '';
      $fecha = $this->getRequestParameter('codigo');
      if (!Herramientas::validarPeriodoPresuesto($this->getRequestParameter('codigo'))) {
        $var = 'P';
        $fecha = '';
      }
      if ((!Herramientas::validarPeriodoFiscal($this->getRequestParameter('codigo')) and ($var == ''))) {
        $var = 'F';
        $fecha = '';
      }
      $cajtexmos = 'periodo';
      $cajtexmos_fecha = 'caordcom_fecord';
      $output = '[["' . $cajtexmos . '","' . $var . '",""],["' . $cajtexmos_fecha . '","' . $fecha . '",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
      return sfView::HEADER_ONLY;
    } else if ($this->getRequestParameter('ajax') == '15') {//Calcular Recargos
      $comnoiva=H::getConfApp2('comnoiva', 'compras', 'almordcom');
      $d = new Criteria();
      $d->add(CarecargPeer::CODRGO, $this->getRequestParameter('codigo'));
      $recargosreg = CarecargPeer::doSelectOne($d);
      if ($recargosreg) {
        if ($comnoiva=='S')
        {
          $desrgo = $recargosreg->getNomrgo();
          $montorgotab = $recargosreg->getMonrgo();
          $monrgo = number_format($montorgotab, 2, ',', '.');
          $tiprgo = $recargosreg->getTiprgo();
          $reccal = SolicituddeEgresos::CalcularRecargos($tiprgo, $montorgotab, $this->getRequestParameter('monart'));
          $reccalformat = $reccal; //number_format($reccal,2,',','.');
          $codpar = $recargosreg->getCodpre();
          if ($tiprgo == 'M')//Tipo recargo puntual (monto)
            $javascript = "$('" . $this->getRequestParameter('moncal') . "').readOnly=false;actualizarsaldos_r();";
          else //Tipo de recargo por porcentaje
            $javascript="actualizarsaldos_r();";
        }else {
          if ($recargosreg->getCodpre() != "") {
            $desrgo = $recargosreg->getNomrgo();
            $montorgotab = $recargosreg->getMonrgo();
            $monrgo = number_format($montorgotab, 2, ',', '.');
            $tiprgo = $recargosreg->getTiprgo();
            $reccal = SolicituddeEgresos::CalcularRecargos($tiprgo, $montorgotab, $this->getRequestParameter('monart'));
            $reccalformat = $reccal; //number_format($reccal,2,',','.');
            $codpar = $recargosreg->getCodpre();
            if ($tiprgo == 'M')//Tipo recargo puntual (monto)
              $javascript = "$('" . $this->getRequestParameter('moncal') . "').readOnly=false;actualizarsaldos_r();";
            else //Tipo de recargo por porcentaje
              $javascript="actualizarsaldos_r();";
          }else {
            $desrgo = "";
            $monrgo = "0,00";
            $tiprgo = "";
            $reccalformat = "0,00";
            $codpar = "";
            $javascript = "alert('Debe asociarle al Recargo el Código Presupuestario'); $('$cajtexcom').value='';";
          }
        }
      } else {
        $desrgo = "";
        $monrgo = "0,00";
        $tiprgo = "";
        $reccalformat = "0,00";
        $codpar = "";
        $javascript = "alert('El Recargo no existe'); $('$cajtexcom').value='';";
      }
      $output = '[["' . $cajtexmos . '","' . $desrgo . '",""],["' . $cajtexcom . '","4","c"],["' . $this->getRequestParameter('monto') . '","' . $monrgo . '",""],["' . $this->getRequestParameter('tipo') . '","' . $tiprgo . '",""],["' . $this->getRequestParameter('moncal') . '","' . $reccalformat . '",""],["' . $this->getRequestParameter('codpar') . '","' . $codpar . '",""],["javascript","' . $javascript . '",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
      return sfView::HEADER_ONLY;
    } else if ($this->getRequestParameter('ajax') == '16') {//Trae la partida de cada recargo
      $this->getRequestParameter('codigo');
      $partida = H::getX('CODRGO', 'Carecarg', 'Codpre', $this->getRequestParameter('codigo'));
      $output = '[["caordcom_partrec","' . $partida . '",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
      return sfView::HEADER_ONLY;
    } else if ($this->getRequestParameter('ajax') == '17') {
      $q = new Criteria();
      $q->add(CadefcenPeer::CODCEN, $this->getRequestParameter('codigo'));
      $reg = CadefcenPeer::doSelectOne($q);
      if ($reg) {
        $dato = $reg->getDescen();
        $javascript = "";
      } else {
        $dato = "";
        $javascript = "alert('El Centro de Costo no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
      }

      $output = '[["' . $cajtexmos . '","' . $dato . '",""],["javascript","' . $javascript . '",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
      return sfView::HEADER_ONLY;
    } else if ($this->getRequestParameter('ajax') == '18') {
      $edad = Nomina::obtenerEdad($this->getRequestParameter('codigo'));
      $output = '[["' . $cajtexmos . '","' . $edad . '",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
      return sfView::HEADER_ONLY;
    } else if ($this->getRequestParameter('ajax') == '19') {
      $q = new Criteria();
      $q->add(CadefcenacoPeer::CODCENACO, $this->getRequestParameter('codigo'));
      $reg = CadefcenacoPeer::doSelectOne($q);
      if ($reg) {
        $dato = $reg->getDescenaco();
        $javascript = "";
      } else {
        $dato = "";
        $javascript = "alert('El Centro de Acopio no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
      }

      $output = '[["' . $cajtexmos . '","' . $dato . '",""],["javascript","' . $javascript . '",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
      return sfView::HEADER_ONLY;
    } else if ($this->getRequestParameter('ajax') == '20') {      
      $this->unidades = array();
      $javascript = "";
      $this->unidades = CaunialartPeer :: getUnidades($this->getRequestParameter('codigo'));
      $output = '[["javascript","' . $javascript . '",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
    } else if ($this->getRequestParameter('ajax') == '21') {
      $q = new Criteria();
      $q->add(CadefalmPeer::CODALM, $this->getRequestParameter('codigo'));
      $reg = CadefalmPeer::doSelectOne($q);
      if ($reg) {
        $dato = $reg->getNomalm();
        $javascript = "";
      } else {
        $dato = "";
        $javascript = "alert_('El Almac&eacute;n no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
      }

      $output = '[["' . $cajtexmos . '","' . $dato . '",""],["javascript","' . $javascript . '",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
      return sfView::HEADER_ONLY;
    } else if ($this->getRequestParameter('ajax') == '22') {
      $longitudart = strlen(Herramientas::getMascaraArticulo());
      $c = new Criteria();
      $c->add(CaregartPeer::CODART, $this->getRequestParameter('codigo'));
      $reg = CaregartPeer::doSelectOne($c);
      if ($reg) {
        if ($longitudart == strlen($this->getRequestParameter('codigo'))) {
          $dato = eregi_replace("[\n|\r|\n\r]", "", $reg->getDesart());
          $javascript = "verificardetalle('" . $cajtexcom . "');";
          $output = '[["' . $cajtexmos . '","' . $dato . '",""],["javascript","' . $javascript . '",""]]';
        } else {
          $javascript = "alert('El Codigo del Articulo no es de Ultimo Nivel'); $('" . $cajtexmos . "').value=''; $('" . $cajtexcom . "').value=''; $('" . $cajtexcom . "').focus();";
          $output = '[["javascript","' . $javascript . '",""]]';
        }
      } else {
        $javascript = "alert('Articulo no existe, o no es un Articulo/Servicio');$('" . $cajtexmos . "').value='';$('" . $cajtexcom . "').value=''; $('" . $cajtexcom . "').focus();";
        $output = '[["javascript","' . $javascript . '",""]]';
      }
      $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
      return sfView::HEADER_ONLY;
    } else if ($this->getRequestParameter('ajax') == '23') {
      $js = "";
      $dato = "";
      $mosdatadiext=H::getConfApp2('mosdatadiext', 'compras', 'almordcom');
      $monofi=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
      if ($this->getRequestParameter('nuevo') == '') {
        if ($this->getRequestParameter('refsol') != '') {
          if ($this->getRequestParameter('codigo') == $this->getRequestParameter('moneref')) {
            $q = new Criteria();
            $q->add(TsdesmonPeer::CODMON, $this->getRequestParameter('codigo'));
            $q->addDescendingOrderByColumn(TsdesmonPeer::FECMON);
            $reg = TsdesmonPeer::doSelectOne($q);
            if ($reg) {
              $dato = number_format($reg->getValmon(), 6, ',', '.');
              if ($this->getRequestParameter('codigo')!=$monofi && $mosdatadiext=='S'){
                $js = "$('tab10').show(); $('datadi').show();";
              }else $js = "$('tab10').hide(); $('datadi').hide();";
            }
          } else {
            $js = "alert('La Moneda debe ser la misma de la Solicitud'); $('caordcom_tipmon').value='" . $this->getRequestParameter('moneref') . "'";
            $dato = $this->getRequestParameter('valmone');
          }
        } else {
          $q = new Criteria();
          $q->add(TsdesmonPeer::CODMON, $this->getRequestParameter('codigo'));
          $q->addDescendingOrderByColumn(TsdesmonPeer::FECMON);
          $reg = TsdesmonPeer::doSelectOne($q);
          if ($reg) {
            $dato = number_format($reg->getValmon(), 6, ',', '.');
            if ($this->getRequestParameter('codigo')!=$monofi && $mosdatadiext=='S'){
                $js = "$('tab10').show(); $('datadi').show();";
            }else $js = "$('tab10').hide(); $('datadi').hide();";
          }
        }
      } else {
        $js = "$('caordcom_tipmon').value='" . $this->getRequestParameter('variable') . "'";
        $dato = $this->getRequestParameter('valmone');
      }
      $output = '[["' . $cajtexmos . '","' . $dato . '",""],["javascript","' . $js . '",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
      return sfView::HEADER_ONLY;
    }else if ($this->getRequestParameter('ajax') == '24') {
        $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
        $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr');
        $q= new Criteria();
        if ($filsoldir=='S'){
          $codigo=$this->getRequestParameter('codigo');
          $sql='cadefdirec.coddirec=\''.$codigo.'\' and cadefdirec.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
          $q->add(CadefdirecPeer::CODDIREC,$sql,Criteria::CUSTOM); 
        }else $q->add(CadefdirecPeer::CODDIREC,$this->getRequestParameter('codigo'));
        $reg= CadefdirecPeer::doSelectOne($q);
        if ($reg)
        {
           $dato=$reg->getDesdirec(); $javascript="";
        }else {
            $dato="";
            $javascript="alert_('La Direcci&oacute;n no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        }

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
      return sfView::HEADER_ONLY;
    }else if ($this->getRequestParameter('ajax') == '25') {
       $q= new Criteria();
        $q->add(CadefdiviPeer::CODDIVI,$this->getRequestParameter('codigo'));
        $q->add(CadefdiviPeer::CODDIREC,$this->getRequestParameter('coddirec'));
        $reg= CadefdiviPeer::doSelectOne($q);
        if ($reg)
        {
           $dato=$reg->getDesdivi(); $javascript="";
        }else {
            $dato="";
            $javascript="alert_('La Divisi&oacute;n no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        }

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
      return sfView::HEADER_ONLY;
    }
    else  if ($this->getRequestParameter('ajax')=='26')
    {
      $q= new Criteria();
      $q->add(CpeveprePeer::CODEVE,$this->getRequestParameter('codigo'));
      $reg= CpeveprePeer::doSelectOne($q);
      if ($reg)
      {
         $dato=$reg->getDeseve(); $javascript="";
      }else {
          $dato="";
          $javascript="alert('El Evento no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
      }

      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
      return sfView::HEADER_ONLY;
    }    
    else  if ($this->getRequestParameter('ajax')=='27')
    {
      $w= new Criteria();
      $w->add(CaordcomPeer::ORDCOM,$this->getRequestParameter('codigo'));
      $reg= CaordcomPeer::doSelectOne($w);
      if ($reg) {
        $desord = eregi_replace("[\n|\r|\n\r]", "", $reg->getDesord());
        $tipord=$reg->getTipord();
        $codigopro = $reg->getCodpro();
        $e= new Criteria();
        $e->add(CaproveePeer::CODPRO,$codigopro);
        $rege= CaproveePeer::doSelectOne($e);
        if ($rege){
          $despro=$rege->getNompro();
          $tippro=$rege->getTipo();
          $rifpro=$rege->getRifpro();
        }
        $this->setVars();
        $javascript=" ActualizarSaldosGrid('a',ArrTotales_a);total_completo();";
        $this->configGrid('', '0', '',$this->getRequestParameter('codigo'));
        $output = '[["caordcom_desord","'.$desord.'",""],["caordcom_tipord","'.$tipord.'",""],["caordcom_rifpro","' . $rifpro . '",""],["caordcom_nompro","' . $despro . '",""],["caordcom_tipopro","' . $tippro . '",""],["caordcom_codigoproveedor","' . $codigopro . '",""],["javascript","'.$javascript.'",""]]';
    }else {
      $this->setVars();
      $javascript="alert('La Orden de Compra no existe'); $('caordcom_ordcomvie').value=''; $('caordcom_ordcomvie').focus();";
      $this->configGrid('', '', '','');
      $output = '[["","",""],["javascript","'.$javascript.'",""]]';
    }      
      $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
    }   
    else  if ($this->getRequestParameter('ajax')=='28')
    {
      $q= new Criteria();
      $q->add(CadefgarPeer::CODGAR,$this->getRequestParameter('codigo'));
      $reg= CadefgarPeer::doSelectOne($q);
      if ($reg)
      {
         $dato=$reg->getDesgar(); $javascript="";
      }else {
          $dato="";
          $javascript="alert('La Garantía no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
      }

      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
      return sfView::HEADER_ONLY;
    }
    else  if ($this->getRequestParameter('ajax')=='29')
    {
      $datos=split('!',$this->getRequestParameter('codigo'));
      $codigo=$datos[0];
      $cajtexcom=$datos[1];
      $codart=$datos[2];
      $cajtexmos=$datos[3];
      $q= new Criteria();
      $q->add(CaunialartPeer::CODART,$codart);
      $q->add(CaunialartPeer::UNIALT,$codigo);
      $reg= CaunialartPeer::doSelectOne($q);
      if ($reg)
      {
         $dato=H::FormatoMonto($reg->getCosuni(),6); $javascript="recalcularecargos2('$cajtexmos'); ";
      }else {
          $dato="";
          $javascript="alert('La Unidad de Medida no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
      }

      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
      return sfView::HEADER_ONLY;
    }
    
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($ordcom='', $referencia='', $tipo='', $ordcomvie='') {
    $this->getUser()->getAttributeHolder()->remove('referencia');
    $claartdes=H::getConfApp2('claartdes', 'compras', 'almsolegr');
    $reccoo=H::getX_vacio('CODEMP','Cadefart','Reccoo','001');
    $refcom = "";
    $per1=array();
    $c = new Criteria();
    if ($referencia == 0) {

      $c->add(CaartordPeer::ORDCOM, $ordcom);
      $c->addAscendingOrderByColumn(CaartordPeer::CODART);
      $per = CaartordPeer::doSelect($c);
      if (!$per){
         if ($ordcomvie!=''){
             $r = new Criteria();
             $r->add(CaartordPeer::ORDCOM, $ordcomvie);
             $perr = CaartordPeer::doSelect($r);
             if ($perr){
               foreach ($perr as $objr) {
                 $newcaartord= new Caartord();
                 $newcaartord->setCheck($objr->getCheck());
                 $newcaartord->setCodart($objr->getCodart());
                 $newcaartord->setDesart($objr->getDesart());
                 $newcaartord->setCodcat($objr->getCodcat());
                 $newcaartord->setCanord($objr->getCanord());
                 $newcaartord->setPreart($objr->getPreart());
                 $newcaartord->setCancost($objr->getCancost());
                 $newcaartord->setCanrec($objr->getCanrec());
                 $newcaartord->setCanaju($objr->getCanaju());
                 $newcaartord->setCantot($objr->getCantot());
                 $newcaartord->setDtoart($objr->getDtoart());
                 $newcaartord->setRgoart($objr->getRgoart());
                 $newcaartord->setTotart($objr->getTotart());
                 $newcaartord->setUnimed($objr->getUnimed());
                 $newcaartord->setCodpar($objr->getCodpar());
                 $newcaartord->setCodpre($objr->getCodpre());
                 $newcaartord->setDatosrecargo($objr->getDatosrecargo());
                 $newcaartord->setCodcen($objr->getCodcen());
                 $newcaartord->setCodunimed($objr->getCodunimed());
                 $per1[]=$newcaartord;

               }
               $per=$per1;
             }
         }
      }
      $campo_col5 = 'Canord'; //tabla Caartord
      $campo_col6 = 'Canaju'; //tabla Caartord
      $campo_col8 = 'Cantot'; //tabla Caartord
      $campo_col9 = 'Preart'; //tabla Caartord
      $campo_col11 = 'Dtoart'; //tabla Caartord
      $campo_col12 = 'Rgoart'; //tabla Caartord
      $campo_col13 = 'Totart'; //tabla Caartord
      $campo_col14 = 'Unimed'; //tabla Caartord
      $campo_col15 = 'Codpre'; //tabla Caartord
      $this->getUser()->setAttribute('referencia', '0');
      if (Herramientas::getX_vacio('ordcom', 'Caartord', 'ordcom', $ordcom) != '') {
        $refcom = H::getX_vacio('REFCOM', 'Cpcompro', 'REFCOM', $ordcom);
        if ($refcom != "")
          $filas_arreglo = 0;
        else
          $filas_arreglo=50;
      }
      else
        $filas_arreglo=50;
    }
    elseif ($referencia == 1) {
      $tipdoc=Compras::ObtenerTipoDocumentoPrecompromiso();
      $valor=H::getX_vacio('REQART', 'Casolart', 'Valmon', $ordcom);
      $c = new Criteria();
      $c->add(CaartsolPeer::REQART, $ordcom);
      $sql2="caartsol.canord<caartsol.canreq";
      $c->add(CaartsolPeer::CANORD, $sql2,Criteria::CUSTOM);
      $per = CaartsolPeer::doSelect($c);
      if ($per)
      {
        foreach ($per as $objw) {
          $acum=0;
          $datosrecargo="";
           $cq= new Criteria();
           $cq->add(CadisrgoPeer::REQART,$objw->getReqart());
           $cq->add(CadisrgoPeer::CODART,$objw->getCodart());
           if ($claartdes=='S') $cq->add(CadisrgoPeer::DESART,$objw->getDesart());
           $cq->add(CadisrgoPeer::CODCAT,$objw->getCodcat());
           $cq->add(CadisrgoPeer::TIPDOC,$tipdoc);
           $result=CadisrgoPeer::doSelect($cq);
           if ($result)
           {
              foreach ($result as $datos)
              {                 
                 $reccal=SolicituddeEgresos::CalcularRecargos2($datos->getTiprgo(),$datos->getMonrgoc(),H::toFloat($objw->getCancost(),6),$objw->getMondes(),$objw->getMonrgo());
                 $monrgoc=number_format($datos->getMonrgoc(),2,',','.');
                 if ($datos->getTiprgo()=='M')
                   $reccal=number_format($datos->getMonrgo(),4,',','.');
                 else 
                  $reccal=number_format($reccal,4,',','.');
                 $datosrecargo=$datosrecargo . $datos->getCodrgo().'_' . $datos->getNomrgo().'_' . $monrgoc .'_'. $datos->getTiprgo().'_' . $reccal .'_'. $datos->getCodpar(). '!'; 
                 $acum=$acum+H::toFloat($reccal,4);
              }
           
          $objw->setMonrgo(H::toFloat($acum,4));
          $objw->setDatosrecargo($datosrecargo);
          }
          $objw->setMontot((H::toFloat($objw->getCancost(),6)+(H::toFloat($objw->getMonrgo(),4)*$valor)-($objw->getMondes()*$valor))*$valor);
          $per1[]=$objw;
        }
        $per=$per1;
      }

      $campo_col5 = 'Canord2'; //tabla Caartsol
      $campo_col6 = 'Canaju'; //tabla Caartsol
      $campo_col8 = 'Canreq'; //tabla Caartsol
      $campo_col9 = 'Costo'; //tabla Caartsol
      $campo_col11 = 'Mondes'; //tabla Caartsol
      $campo_col12 = 'Monrgo'; //tabla Caartsol
      $campo_col13 = 'Montot'; //tabla Caartsol
      $campo_col14 = 'Unimed'; //tabla Caartsol
      $campo_col15 = 'codigopre'; //tabla Caartsol
      $this->getUser()->setAttribute('referencia', '1');
      $filas_arreglo = 0;
    }
    $mascaraarticulo = $this->mascaraarticulo;
    $lonart = strlen($mascaraarticulo);
    $formatocategoria = $this->formatocategoria;
    $loncat = strlen($formatocategoria);
    $params2 = array('param1' => $loncat);


    // Se crea el objeto principal de la clase OpcionesGrid
    $opciones = new OpcionesGrid();
    // Se configuran las opciones globales del Grid
    if ($filas_arreglo > 0)
      $opciones->setEliminar(true);
    else
      $opciones->setEliminar(false);
    $opciones->setFilas($filas_arreglo);
    if ($referencia == 0)
      $opciones->setTabla('Caartord');
    else
      $opciones->setTabla('Caartsol');
    $opciones->setName('a');
    $opciones->setAncho(2300);
    $opciones->setAnchoGrid(1000);
    $opciones->setTitulo('Detalle de la Orden de Requisición');
    $opciones->setHTMLTotalFilas(' ');
    $opciones->setTabindex(true);
    $opciones->setTabindexstart(1000);

    $col1 = new Columna('Marque');
    $col1->setTipo(Columna::CHECK);
    $col1->setNombreCampo('check');
    $col1->setEsGrabable(true);
    $col1->setHTML(' onClick="desmarcarfila(this.id)" ');
    if ($tipo == 'P' && $reccoo!='S')
      $col1->setOculta(true);

    $lonart = strlen($this->mascaraarticulo);
    //$params= array('param1' => $lonart);

    $params = array('param1' => $lonart, 'param2' => "'+$('caordcom_tipord').value+'", 'param3' => "'+$('caordcom_coddirec').value+'", 'val2');
    // Se generan las columnas
    $col2 = new Columna('Código  Artículo');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setNombreCampo('Codart');
    $jscol2 = 'onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}" onKeyDown="javascript:return dFilter (event.keyCode, this,' . "'" . $mascaraarticulo . "'" . ')"';
    if ($referencia == 0 and $filas_arreglo > 0)
      $col2->setHTML('type="text" size="15"  maxlength="' . chr(39) . $lonart . chr(39) . '" ' . $jscol2);
    if ($referencia == 1 or $filas_arreglo == 0)
      $col2->setHTML('type="text" size="15"  readonly=true ');
    if ($referencia == 0 and $filas_arreglo > 0)
      $col2->setCatalogo('caregart', 'sf_admin_edit_form', array('codart' => 2, 'desart' => 3, 'cospro' => 9, $campo_col13 => 13, 'codpar' => 16), 'Caregart_Almsolegr', $params);
    if ($referencia == 0)
      $col2->setHTML('type="text" size="15"  maxlength="' . chr(39) . $lonart . chr(39) . '" ' . $jscol2);

    //onBlur="actualizo_cod_presupuestario(this.id);ajax_detalle_codigo_pre(event,this.id);ajaxdetalle(event,this.id);"
    $col2->setAjaxfila(true);
    $col2->setAjaxonchange(true);
    $col2->setAjaxadicionales(array('caordcom_tipord', 'caordcom_coddirec'));


    $col3 = new Columna('Descripción');
    $col3->setTipo(Columna::TEXTAREA);
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setNombreCampo('Desart');
    $col3->setEsGrabable(true);
    if  ($claartdes=='S')
        $col3->setHTML('type="text" size="30x1" maxlength=2000 onkeyup="javascript:return ismaxlength(this)"');
    else
    $col3->setHTML('type="text" size="30x1" readonly=true');

    $col4 = new Columna('Cod. Unidad');
    $col4->setTipo(Columna::TEXTO);
    $col4->setEsGrabable(true);
    $col4->setAlineacionObjeto(Columna::DERECHA);
    $col4->setAlineacionContenido(Columna::DERECHA);
    $col4->setNombreCampo('Codcat');
    $jscol4 = 'onKeyDown="javascript:return dFilter (event.keyCode, this,' . chr(39) . $formatocategoria . chr(39) . ')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"';
    if ($referencia == 0 and $filas_arreglo > 0)
      $col4->setHTML('type="text" size="15"  maxlength="' . chr(39) . $loncat . chr(39) . '" ' . $jscol4);
    if ($referencia == 1 or $filas_arreglo == 0)
      $col4->setHTML('type="text" size="15" readonly=true');
    if ($referencia == 0 and $filas_arreglo > 0)
      $col4->setCatalogo('Npcatpre', 'sf_admin_edit_form', array('codcat' => 4), 'Npcatpre_Almsolegr', $params2);

    $col4->setAjaxfila(true);
    $col4->setAjaxonchange(true);
    $col4->setAjaxadicionales(array('caordcom_tipord'));


    $col5 = new Columna('Cant. Ordenada');
    $col5->setTipo(Columna::MONTO);
    $col5->setEsGrabable(true);
    $col5->setAlineacionContenido(Columna::DERECHA);
    $col5->setAlineacionObjeto(Columna::DERECHA);
    $col5->setNombreCampo($campo_col5);
    $col5->setEsNumerico(true);
    //if ($referencia == 0 and $filas_arreglo > 0)
      $col5->setHTML('type="text" size="10" onBlur="javascript: obj=this; ValidarMontoGridv2(obj,2); event.keyCode=13; recalcularecargos(event,obj.id)"');
   // if ($referencia == 1 or $filas_arreglo == 0)
     // $col5->setHTML('type="text" size="10" readonly=true');
    // TODO: EL observer para recalcularecargos(event,this.id);
    $col5->setAjaxfila(true);
    $col5->setAjaxonchange(true);
    $col5->setAjaxadicionales(array('caordcom_fecord','caordcom_valmon','caordcom_refsol'));

    $col6 = clone $col5;
    $col6->setTitulo('Cant. Ajustada');
    $col6->setNombreCampo($campo_col6);
    if ($referencia == 0)
      $col6->setHTML('type="text" size="10" readonly=true');


    $col7 = clone $col6;
    $col7->setTitulo('Cant.  Recibida');
    if ($referencia == 0)
      $col7->setHTML('type="text" size="10" readonly=true');
    $col7->setNombreCampo('Canrec');

    $col8 = clone $col6;
    $col8->setTitulo('Cant. Total');
    if ($referencia == 0)
      $col8->setHTML('type="text" size="10" readonly=true');
    $col8->setNombreCampo($campo_col8);

    $col9 = clone $col6;
    $col9->setTitulo('Costo');
    $col9->setHTML('type="text" size="10"');
    $col9->setNombreCampo($campo_col9);
    $col9->setDecimal(6);
     if ($referencia == 0)
    $col9->setHTML('type="text" size="10" onBlur="javascript: obj=this; ValidarMontoGridv2(obj,6); event.keyCode=13; recalcularecargos(event,obj.id)"');
    else
      $col9->setHTML('type="text" size="10" readonly=true');
    //$col9->setJScript('onKeypress="entermonto(event,this.id); ');
    $col9->setAjaxfila(true);
    $col9->setAjaxonchange(true);
    $col9->setAjaxadicionales(array('caordcom_fecord','caordcom_valmon'));


    $col10 = clone $col6;
    $col10->setTitulo('Cant x Costo');
    $col10->setNombreCampo('cancost');
    $col10->setDecimal(6);
    $col10->setHTML('type="text" size="10" readonly=true');
    $col10->setEsTotal(true, 'caordcom_totorden');

    $col11 = clone $col6;
    $col11->setTitulo('Descuento');
    $col11->setNombreCampo($campo_col11);
    //$col11->setHTML('type="text" size="10"');
    if ($referencia==0 and $filas_arreglo>0) $col11->setHTML('type="text" size="10" onBlur="javascript: obj=this; ValidarMontoGridv2(obj,2); event.keyCode=13; actualizar_total_grid_detalle_datos(event,obj.id,"S"); verifica_presupuesto(event,obj.id);"');
    //if ($referencia==1) $col11->setHTML('type="text" size="10" onBlur="javascript: obj=this; ValidarMontoGridv2(obj,2); event.keyCode=13;actualizar_sumatoria_total_cuando_esta_referida();"');
    $col11->setEsTotal(true, 'sumatoria_descuentos');

    $col11->setAjaxfila(true);
    $col11->setAjaxonchange(true);
    $col11->setAjaxadicionales(array('caordcom_fecord','caordcom_valmon'));


    $col12 = clone $col6;
    $col12->setTitulo('Monto Recargo');
    $col12->setNombreCampo($campo_col12);
    $col12->setDecimal(4);
    if ($tipo == 'P' && $reccoo!='S'){
      $col12->setOculta(true);
      $col12->setTipo(Columna::TEXTO);
    }//else $col12->setEsTotal(true, 'caordcom_totrecargo');
      
    if ($referencia == 0) {
      if ($this->deshabmonrec == 'S') {
        $col12->setHTML('type="text" size="10"');
      } else {
        $col12->setHTML('type="text" size="10" readonly=true');
      }
    }
    

    $col13 = clone $col6;
    $col13->setTitulo('Total');
    $col13->setNombreCampo($campo_col13);
    $col13->setDecimal(6);
    $col13->setHTML('type="text" size="10"');
    //$col13->setEsTotal(true, 'caordcom_monord');
    $col13->setTipo(Columna::MONTO);
    
    $manunialt=H::getConfApp2('manunialt','compras','almregart');
    if ($manunialt=='S')
    {   
      $signo="-";
      $signomas="+";
      if ($referencia==0) {
        $col14 = new Columna('Unidad Medida');
        $col14->setTipo(Columna::COMBO);
        $col14->setEsGrabable(true);
        $col14->setCombo(CaunialartPeer::getUnidades());
        $col14->setNombreCampo($campo_col14);
        $col14->setAjaxfila(true);
        $col14->setAjaxadicionales(array('caordcom_fecord','caordcom_valmon','caordcom_refsol'));
        $col14->setHTML('');
        //$col14->setHTML('onChange="toAjax(29,getUrlModuloAjax(),this.value+'.chr(39).'!'.chr(39).'+this.id+'.chr(39).'!'.chr(39).'+$(obtenerColumna(this.id,12,'.chr(39).$signo.chr(39).')).value+'.chr(39).'!'.chr(39).'+obtenerColumna(this.id,5,'.chr(39).$signo.chr(39).'),devuelveParVacios(),devuelveParVacios());"');
      }else {
        $col14 = new Columna('Unidad Medida');
        $col14->setTipo(Columna::TEXTO);
        $col14->setEsGrabable(true);
        $col14->setAlineacionObjeto(Columna::CENTRO);
        $col14->setAlineacionContenido(Columna::CENTRO);
        $col14->setNombreCampo($campo_col14);
        $col14->setHTML('type="text" size="10" readonly=true');
      }
    }else {
    $col14 = new Columna('Unidad Medida');
    $col14->setTipo(Columna::TEXTO);
    $col14->setEsGrabable(true);
    $col14->setAlineacionObjeto(Columna::CENTRO);
    $col14->setAlineacionContenido(Columna::CENTRO);
    $col14->setNombreCampo($campo_col14);
    $col14->setHTML('type="text" size="10"');
  }

    $col15 = new Columna('Codigo Presupuestario');
    $col15->setEsGrabable(true);
    $col15->setTipo(Columna::TEXTO);
    $col15->setAlineacionObjeto(Columna::CENTRO);
    $col15->setAlineacionContenido(Columna::CENTRO);
    $col15->setNombreCampo($campo_col15);
    if ($referencia == 0)
      $col15->setHTML('type="text" size="32"');
    if ($referencia == 1)
      $col15->setHTML('type="text" size="32" readonly=true');
    if ($referencia == 0) {
      $col15->setAjaxfila(true);
      //$col15->setAjaxonchange(true);
      $col15->setAjaxadicionales(array('caordcom_fecord','caordcom_valmon'));
   }

    $paramsq = array('param1' => "'+$(this.id).up().previous(13).descendants()[0].value+'");

    $col16 = new Columna('Codigo Partida');
    $col16->setTipo(Columna::TEXTO);
    $col16->setEsGrabable(true);
    //$col16->setOculta(true);
    $col16->setAlineacionObjeto(Columna::CENTRO);
    $col16->setAlineacionContenido(Columna::CENTRO);
    $col16->setNombreCampo('Codpar');
    $col16->setHTML('type="text" size="20" readOnly="true"');
    $col16->setCatalogo('caartpar', 'sf_admin_edit_form', array('codpar' => 16), 'Nppartidas_Caregart', $paramsq);
    $col16->setAjaxfila(true);

    $col17 = new Columna('Recargos');
    $col17->setTipo(Columna::TEXTO);
    $col17->setEsGrabable(false);
    $col17->setAlineacionObjeto(Columna::CENTRO);
    $col17->setAlineacionContenido(Columna::CENTRO);
    $col17->setNombreCampo('anadir');
    if ($tipo == 'P' && $reccoo!='S')
      $col17->setOculta(true);
    $col17->setHTML('type="text" size="1" style="border:none" class="imagenalmacen" onClick="mostrargridrecargos(this.id)"');

    $col18 = new Columna('cadena_datos_recargo');
    $col18->setTipo(Columna::TEXTO);
    $col18->setEsGrabable(true);
    $col18->setAlineacionObjeto(Columna::IZQUIERDA);
    $col18->setAlineacionContenido(Columna::IZQUIERDA);
    $col18->setNombreCampo('datosrecargo');
    $col18->setOculta(true);

    $col19 = new Columna('Nombre Partida');
    $col19->setTipo(Columna::TEXTO);
    $col19->setOculta(true);
    $col19->setAlineacionObjeto(Columna::CENTRO);
    $col19->setAlineacionContenido(Columna::CENTRO);
    $col19->setNombreCampo('nompar');
    $col19->setHTML('type="text" size="20"');

    $oculcencos=H::getConfApp2('oculcencos', 'compras', 'almsolegr');
    $col20 = new Columna('Centro de Costo');
    $col20->setTipo(Columna::TEXTO);
    $col20->setEsGrabable(true);
    $col20->setAlineacionObjeto(Columna::CENTRO);
    $col20->setAlineacionContenido(Columna::CENTRO);
    $col20->setNombreCampo('codcen');
    $col20->setHTML('type="text" size="4" maxlength="32"');
    $col20->setCatalogo('Cadefcen', 'sf_admin_edit_form', array('codcen' => 20, 'descen' => 21), 'Cadefcen_Almsolegr');
    //$col20->setAjax('almordcom',17,21);
    if ($oculcencos=='S') $col20->setOculta(true);

    $col21 = new Columna('Descripción');
    $col21->setTipo(Columna::TEXTO);
    $col21->setEsGrabable(true);
    $col21->setAlineacionObjeto(Columna::IZQUIERDA);
    $col21->setAlineacionContenido(Columna::IZQUIERDA);
    $col21->setNombreCampo('descen');
    $col21->setHTML('type="text" size="25" readonly="true"');
    if ($oculcencos=='S') $col21->setOculta(true);

    $col22 = new Columna('Disponibilidad');
    $col22->setTipo(Columna::MONTO);
    $col22->setEsGrabable(true);
    $col22->setNombreCampo('mondis');
    $col22->setHTML('type="text" size="8" readonly="true"');

    $col23 = new Columna('Unidad de Medida');
    $col23->setTipo(Columna::TEXTO);
    $col23->setEsGrabable(true);
    $col23->setAlineacionObjeto(Columna::CENTRO);
    $col23->setAlineacionContenido(Columna::CENTRO);
    $col23->setNombreCampo('codunimed');
    $col23->setHTML('type="text" size="7" maxlength="6"');
   // $col23->setCatalogo('Cadefunimed','sf_admin_edit_form', array('codunimed' => 22,'desunimed' => 23),'Cadefunimed_Almregart');
    //$col23->setAjax('almordcom',24,23);
    $col23->setOculta(true);

    $col24 = new Columna('Descripción');
    $col24->setTipo(Columna::TEXTO);
    $col24->setEsGrabable(true);
    $col24->setAlineacionObjeto(Columna::IZQUIERDA);
    $col24->setAlineacionContenido(Columna::IZQUIERDA);
    $col24->setNombreCampo('desunimed');
    $col24->setHTML('type="text" size="25" readonly="true"');  
    $col24->setOculta(true);  

    $col25 = new Columna('Cant. Requerida');
    $col25->setTipo(Columna::MONTO);
    $col25->setEsGrabable(true);
    $col25->setAlineacionContenido(Columna::DERECHA);
    $col25->setAlineacionObjeto(Columna::DERECHA);
    $col25->setNombreCampo('canreq');
    $col25->setEsNumerico(true);
    $col25->setOculta(true);
    $col25->setHTML('type="text" size="10" readonly=true');

    // Se guardan las columnas en el objetos de opciones
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
    $opciones->addColumna($col7);
    $opciones->addColumna($col8);
    $opciones->addColumna($col9);
    $opciones->addColumna($col10);
    $opciones->addColumna($col11);
    $opciones->addColumna($col12);
    $opciones->addColumna($col13);
    $opciones->addColumna($col14);
    $opciones->addColumna($col15);
    $opciones->addColumna($col16);
    $opciones->addColumna($col17);
    $opciones->addColumna($col18);
    $opciones->addColumna($col19);
    $opciones->addColumna($col20);
    $opciones->addColumna($col21);
    //if ($this->mosmondisart == 'S')
    $opciones->addColumna($col22);
    $opciones->addColumna($col23);
    $opciones->addColumna($col24);
    $opciones->addColumna($col25);

    // Ee genera el arreglo de opciones necesario para generar el grid
    $this->obj = $opciones->getConfig($per);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid_Parcial($refsol='', $rifpro='', $tipo='') {
    Orden_compra::Obtener_Grid_Parcial($refsol, $rifpro, $output);
    $reccoo=H::getX_vacio('CODEMP','Cadefart','Reccoo','001');
    $per = $output;
    $filas_arreglo = 0;
    $this->getUser()->setAttribute('referencia', '1');

    // Se crea el objeto principal de la clase OpcionesGrid
    $opciones = new OpcionesGrid();
    // Se configuran las opciones globales del Grid
    $opciones->setEliminar(true);
    $opciones->setFilas($filas_arreglo);
    $opciones->setTabla('Caartord');
    $opciones->setName('a');
    $opciones->setAncho(2300);
    $opciones->setAnchoGrid(1000);
    $opciones->setTitulo('Detalle de la Orden de Requisición');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Marque');
    $col1->setTipo(Columna::CHECK);
    $col1->setNombreCampo('check');
    if ($tipo == 'P' && $reccoo!='S')
      $col1->setOculta(true);
    $col1->setEsGrabable(true);
    $col1->setHTML(' ');

    // Se generan las columnas
    $col2 = new Columna('Código  Artículo');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setNombreCampo('Codart');
    $col2->setHTML('type="text" size="15" readonly=true');

    $col3 = new Columna('Descripción');
    $col3->setTipo(Columna::TEXTAREA);
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setNombreCampo('Desart');
    $col3->setEsGrabable(true);
    $col3->setHTML('type="text" size="30x1" readonly=true');

    $col4 = new Columna('Cod. Unidad');
    $col4->setTipo(Columna::TEXTO);
    $col4->setEsGrabable(true);
    $col4->setAlineacionObjeto(Columna::DERECHA);
    $col4->setAlineacionContenido(Columna::DERECHA);
    $col4->setNombreCampo('Codcat');
    $col4->setHTML('type="text" size="15" readonly=true');

    $col5 = new Columna('Cant. Ordenada');
    $col5->setTipo(Columna::MONTO);
    $col5->setEsGrabable(true);
    $col5->setAlineacionContenido(Columna::DERECHA);
    $col5->setAlineacionObjeto(Columna::DERECHA);
    $col5->setNombreCampo('Canord2');
    $col5->setEsNumerico(true);
    $col5->setHTML('type="text" size="10" readonly=true');


    $col6 = clone $col5;
    $col6->setTitulo('Cant. Ajustada');
    $col6->setNombreCampo('Canaju');


    $col7 = clone $col6;
    $col7->setTitulo('Cant.  Recibida');
    $col7->setNombreCampo('Canrec');

    $col8 = clone $col6;
    $col8->setTitulo('Cant. Total');
    $col8->setNombreCampo('Canreq');

    $col9 = clone $col6;
    $col9->setTitulo('Costo');
    $col9->setHTML('type="text" size="10"');
    $col9->setNombreCampo('Costo');
    $col9->setDecimal(6);

    $col10 = clone $col6;
    $col10->setTitulo('Cant x Costo');
    $col10->setNombreCampo('cancost');
    $col10->setHTML('type="text" size="10" readonly=true');
    $col10->setEsTotal(true, 'caordcom_totorden');

    $col11 = clone $col6;
    $col11->setTitulo('Descuento');
    $col11->setNombreCampo('Mondes');
    $col11->setHTML('onKeypress="entermonto(event,this.id);"');
    $col11->setEsTotal(true, 'sumatoria_descuentos');

    $col12 = clone $col6;
    $col12->setTitulo('Monto Recargo');
    $col12->setNombreCampo('Monrgo');
    $col12->setDecimal(4);
    if ($tipo == 'P' && $reccoo!='S')
      $col12->setOculta(true);
//    $col12->setEsTotal(true, 'caordcom_totrecargo');

    $col13 = clone $col6;
    $col13->setTitulo('Total');
    $col13->setNombreCampo('Montot');
    $col13->setDecimal(6);
    $col13->setHTML('onKeypress="entermonto(event,this.id);"');
    //$col13->setEsTotal(true, 'caordcom_monord');

    /*$manunialt=H::getConfApp2('manunialt', 'compras', 'almregart');
    if ($manunialt=='S')
    {
      $col14 = new Columna('Unidad Medida');
      $col14->setTipo(Columna::COMBO);
      $col14->setEsGrabable(true);
      $col14->setCombo(CaunialartPeer::getUnidades());
      $col14->setNombreCampo('Unimed');
      $col14->setHTML('');
    }else {*/
    $col14 = new Columna('Unidad Medida');
    $col14->setTipo(Columna::TEXTO);
    $col14->setEsGrabable(true);
    $col14->setAlineacionObjeto(Columna::CENTRO);
    $col14->setAlineacionContenido(Columna::CENTRO);
    $col14->setNombreCampo('Unimed');
    $col14->setHTML('type="text" size="10" readOnly=true');
    //}

    $col15 = new Columna('Codigo Presupuestario');
    $col15->setEsGrabable(true);
    $col15->setTipo(Columna::TEXTO);
    $col15->setAlineacionObjeto(Columna::CENTRO);
    $col15->setAlineacionContenido(Columna::CENTRO);
    if ($refsol != "")
      $col15->setNombreCampo('codigopre');
    else
      $col15->setNombreCampo('codpre');
    $col15->setHTML('type="text" size="32" readonly=true');

    $col16 = new Columna('Codigo Partida');
    $col16->setTipo(Columna::TEXTO);
    $col16->setEsGrabable(true);
    $col16->setOculta(true);
    $col16->setAlineacionObjeto(Columna::CENTRO);
    $col16->setAlineacionContenido(Columna::CENTRO);
    $col16->setNombreCampo('Codpar');
    $col16->setHTML('type="text" size="20"');

    $col17 = new Columna('Recargos');
    $col17->setTipo(Columna::TEXTO);
    $col17->setEsGrabable(false);
    $col17->setAlineacionObjeto(Columna::CENTRO);
    $col17->setAlineacionContenido(Columna::CENTRO);
    $col17->setNombreCampo('anadir');
    if ($tipo == 'P' && $reccoo!='S')
      $col17->setOculta(true);
    $col17->setHTML('type="text" size="1" style="border:none" class="imagenalmacen" onClick="mostrargridrecargos(this.id)"');

    $col18 = new Columna('cadena_datos_recargo');
    $col18->setTipo(Columna::TEXTO);
    $col18->setEsGrabable(true);
    $col18->setAlineacionObjeto(Columna::IZQUIERDA);
    $col18->setAlineacionContenido(Columna::IZQUIERDA);
    $col18->setNombreCampo('datosrecargo');
    $col18->setOculta(true);

    $col19 = new Columna('Centro de Costo');
    $col19->setTipo(Columna::TEXTO);
    $col19->setEsGrabable(true);
    $col19->setAlineacionObjeto(Columna::CENTRO);
    $col19->setAlineacionContenido(Columna::CENTRO);
    $col19->setNombreCampo('codcen');
    $col19->setHTML('type="text" size="4" maxlength="32"');
    $col19->setCatalogo('Cadefcen', 'sf_admin_edit_form', array('codcen' => 20, 'descen' => 21), 'Cadefcen_Almsolegr');
    $col19->setOculta(true);

    $col20 = new Columna('Unidad de Medida');
    $col20->setTipo(Columna::TEXTO);
    $col20->setEsGrabable(true);
    $col20->setAlineacionObjeto(Columna::CENTRO);
    $col20->setAlineacionContenido(Columna::CENTRO);
    $col20->setNombreCampo('codunimed');
    $col20->setHTML('type="text" size="7" maxlength="6"');
    $col20->setOculta(true);


    // Se guardan las columnas en el objetos de opciones
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
    $opciones->addColumna($col7);
    $opciones->addColumna($col8);
    $opciones->addColumna($col9);
    $opciones->addColumna($col10);
    $opciones->addColumna($col11);
    $opciones->addColumna($col12);
    $opciones->addColumna($col13);
    $opciones->addColumna($col14);
    $opciones->addColumna($col15);
    $opciones->addColumna($col16);
    $opciones->addColumna($col17);
    $opciones->addColumna($col18);
    $opciones->addColumna($col19);
    $opciones->addColumna($col20);


    // Ee genera el arreglo de opciones necesario para generar el grid
    $this->obj = $opciones->getConfig($per);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid_Recargos($ordcom='', $referencia_recargo='') {
    $c = new Criteria();
    if (trim($referencia_recargo) == '0') {
      $c->add(CadisrgoPeer::REQART, $ordcom);
      $per3 = CadisrgoPeer::doSelect($c);

      $filas_arreglo = 10;

      // Se crea el objeto principal de la clase OpcionesGrid
      $opciones = new OpcionesGrid();
      // Se configuran las opciones globales del Grid
      $opciones->setEliminar(true);
      $opciones->setFilas($filas_arreglo);

      $opciones->setTabla('Cadisrgo');
      $opciones->setName('r');

      $opciones->setAncho(500);
      $opciones->setAnchoGrid(500);
      $opciones->setTitulo('Detalle de Recargos');
      $opciones->setHTMLTotalFilas(' ');

      // Se generan las columnas
      $col1 = new Columna('Código  Recargo');
      $col1->setTipo(Columna::TEXTO);
      $col1->setEsGrabable(true);
      $col1->setAlineacionObjeto(Columna::CENTRO);
      $col1->setAlineacionContenido(Columna::CENTRO);
      $col1->setNombreCampo('codrgo');
      $col1->setHTML('type="text" size="4" maxlength="4"');
      $col1->setCatalogo('Carecarg', 'sf_admin_edit_form', array('codrgo' => 1, 'nomrgo' => 2, 'monrgo' => 4, 'tiprgo' => 5));
      $col1->setJScript('onKeypress="entermonto_r(event,this.id);actualizar_calculo_grid_recargo_por_fila()"');
      $col1->setAjax('almordcomv2', 4, 2, 4);

      $col2 = new Columna('Descripción');
      $col2->setTipo(Columna::TEXTO);
      $col2->setEsGrabable(true);
      $col2->setAlineacionObjeto(Columna::IZQUIERDA);
      $col2->setAlineacionContenido(Columna::IZQUIERDA);
      $col2->setNombreCampo('nomrgo');
      $col2->setHTML('type="text" size="25" readonly="true"');

      $col3 = new Columna('Monto Recargo');
      $col3->setTipo(Columna::MONTO);
      $col3->setEsGrabable(true);
      $col3->setAlineacionContenido(Columna::DERECHA);
      $col3->setAlineacionObjeto(Columna::DERECHA);
      $col3->setNombreCampo('recargototal');
      $col3->setEsNumerico(true);
      $col3->setDecimal(4);
      $col3->setHTML('type="text" size="10"');
      //$col3->setJScript('onKeypress="entermonto_r(event,this.id);actualizar_calculo_grid_recargo_por_fila();"');
      //$col3->setEsTotal(true, 'sumatoria_recargos');
      $col3->setEsTotal(true, 'totrecar');

      $col4 = new Columna('Cant. Total');
      $col4->setTipo(Columna::MONTO);
      $col4->setEsGrabable(true);
      $col4->setOculta(true);
      $col4->setAlineacionContenido(Columna::DERECHA);
      $col4->setAlineacionObjeto(Columna::DERECHA);
      $col4->setNombreCampo('por_monrgo');
      $col4->setEsNumerico(true);
      $col4->setHTML('type="text" size="10"');
      //$col4->setJScript('onKeypress="entermonto(event,this.id);actualizar_calculo_grid_recargo_por_fila();"');

      $col5 = new Columna('Tipo Recargo');
      $col5->setTipo(Columna::TEXTO);
      $col5->setEsGrabable(true);
      $col5->setOculta(true);
      $col5->setAlineacionContenido(Columna::DERECHA);
      $col5->setAlineacionObjeto(Columna::DERECHA);
      $col5->setNombreCampo('tiprgodos');
      $col5->setHTML('type="text" size="1"');

      // Se guardan las columnas en el objetos de opciones
      $opciones->addColumna($col1);
      $opciones->addColumna($col2);
      $opciones->addColumna($col3);
      $opciones->addColumna($col4);
      $opciones->addColumna($col5);
    } else {
      $c->add(CargosolPeer::REQART, $ordcom);
      $per3 = CargosolPeer::doSelect($c);

      $filas_arreglo = 0;

      // Se crea el objeto principal de la clase OpcionesGrid
      $opciones = new OpcionesGrid();
      // Se configuran las opciones globales del Grid
      $opciones->setEliminar(true);
      $opciones->setFilas($filas_arreglo);
      $opciones->setTabla('Cargosol');
      $opciones->setName('r');
      $opciones->setAncho(500);
      $opciones->setAnchoGrid(500);
      $opciones->setTitulo('Detalle de Recargos');
      $opciones->setHTMLTotalFilas(' ');

      // Se generan las columnas
      $col1 = new Columna('Código  Recargo');
      $col1->setTipo(Columna::TEXTO);
      $col1->setEsGrabable(true);
      $col1->setAlineacionObjeto(Columna::CENTRO);
      $col1->setAlineacionContenido(Columna::CENTRO);
      $col1->setNombreCampo('codrgo');
      $col1->setHTML('type="text" size="4" maxlength="4"');


      $col2 = new Columna('Descripción');
      $col2->setTipo(Columna::TEXTO);
      $col2->setEsGrabable(false);
      $col2->setAlineacionObjeto(Columna::IZQUIERDA);
      $col2->setAlineacionContenido(Columna::IZQUIERDA);
      $col2->setNombreCampo('nomrgo');
      $col2->setHTML('type="text" size="25" readonly=true');

      $col3 = new Columna('Monto Recargo');
      $col3->setTipo(Columna::MONTO);
      $col3->setEsGrabable(true);
      $col3->setAlineacionContenido(Columna::DERECHA);
      $col3->setAlineacionObjeto(Columna::DERECHA);
      $col3->setNombreCampo('recargototal');
      $col3->setEsNumerico(true);
      $col3->setDecimal(4);
      $col3->setHTML('type="text" size="10"');
      //$col3->setJScript('onKeypress="entermonto_r(event,this.id);actualizar_calculo_grid_recargo_por_fila();"');
      $col3->setEsTotal(true, 'sumatoria_recargos');

      $col4 = new Columna('Cant. Total');
      $col4->setTipo(Columna::MONTO);
      $col4->setEsGrabable(true);
      $col4->setOculta(true);
      $col4->setAlineacionContenido(Columna::DERECHA);
      $col4->setAlineacionObjeto(Columna::DERECHA);
      $col4->setNombreCampo('por_monrgo');
      $col4->setEsNumerico(true);
      $col4->setHTML('type="text" size="10"');
      //$col4->setJScript('onKeypress="entermonto(event,this.id);actualizar_calculo_grid_recargo_por_fila();"');

      $col5 = new Columna('Tipo Recargo');
      $col5->setTipo(Columna::TEXTO);
      $col5->setEsGrabable(true);
      $col5->setOculta(true);
      $col5->setAlineacionContenido(Columna::DERECHA);
      $col5->setAlineacionObjeto(Columna::DERECHA);
      $col5->setNombreCampo('tiprgodos');
      $col5->setHTML('type="text" size="1"');

      // Se guardan las columnas en el objetos de opciones
      $opciones->addColumna($col1);
      $opciones->addColumna($col2);
      $opciones->addColumna($col3);
      $opciones->addColumna($col4);
      $opciones->addColumna($col5);
    }
    // Ee genera el arreglo de opciones necesario para generar el grid
    $this->obj_recargos = $opciones->getConfig($per3);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid_Parcial_Recargo($refsol='', $rifpro='') {
    Orden_compra::Obtener_Grid_Parcial_Recargos($refsol, $rifpro, $output);
    $per = $output;
    $filas_arreglo = 6;

    // Se crea el objeto principal de la clase OpcionesGrid
    $opciones = new OpcionesGrid();
    // Se configuran las opciones globales del Grid
    $opciones->setEliminar(true);
    $opciones->setFilas($filas_arreglo);
    $opciones->setTabla('Cargosol');
    $opciones->setName('r');
    $opciones->setAncho(500);
    $opciones->setAnchoGrid(500);
    $opciones->setTitulo('Detalle de Recargos');
    $opciones->setHTMLTotalFilas(' ');

    // Se generan las columnas
    $col1 = new Columna('Código  Recargo');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codrgo');
    $col1->setHTML('type="text" size="4" maxlength="4"');


    $col2 = new Columna('Descripción');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(false);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('nomrgo');
    $col2->setHTML('type="text" size="25" readonly=true');

    $col3 = new Columna('Monto Recargo');
    $col3->setTipo(Columna::MONTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionContenido(Columna::DERECHA);
    $col3->setAlineacionObjeto(Columna::DERECHA);
    $col3->setNombreCampo('recargototal');
    $col3->setDecimal(4);
    $col3->setEsNumerico(true);
    if ($this->deshabmonrec == 'S') {
      $col3->setHTML('type="text" size="10"');
    } else {
      $col3->setHTML('type="text" size="10" readonly=true');
    }
    //$col3->setJScript('onKeypress="entermonto_r(event,this.id);actualizar_calculo_grid_recargo_por_fila();"');
    //$col3->setEsTotal(true, 'sumatoria_recargos');
    $col3->setEsTotal(true, 'totrecar');

    $col4 = new Columna('Cant. Total');
    $col4->setTipo(Columna::MONTO);
    $col4->setEsGrabable(true);
    $col4->setOculta(true);
    $col4->setAlineacionContenido(Columna::DERECHA);
    $col4->setAlineacionObjeto(Columna::DERECHA);
    $col4->setNombreCampo('por_monrgo');
    $col4->setEsNumerico(true);
    $col4->setHTML('type="text" size="10" onKeypress="entermonto(event,this.id)');

    $col5 = new Columna('Tipo Recargo');
    $col5->setTipo(Columna::TEXTO);
    $col5->setEsGrabable(true);
    $col5->setOculta(true);
    $col5->setAlineacionContenido(Columna::DERECHA);
    $col5->setAlineacionObjeto(Columna::DERECHA);
    $col5->setNombreCampo('tiprgodos');
    $col5->setHTML('type="text" size="1"');



    // Se guardan las columnas en el objetos de opciones
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);

    // Ee genera el arreglo de opciones necesario para generar el grid
    $this->obj_recargos = $opciones->getConfig($per);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid_Resumen($ordcom='', $articulos=array()) {

    if (count($articulos) > 0) {

      // TODO: llenar los objetos de tipo Caresordcom con los registro del arreglo $articulos
      $per4 = array();
      foreach ($articulos as $key => $value) {

        $caresordcom = new Caresordcom();
        $caresordcom->setCodart($value[0]);
        $caresordcom->setDesres($value[1]);
        $caresordcom->setCodartpro($value[2]);
        $caresordcom->setCanord($value[3]);
        $caresordcom->setCanaju($value[4]);
        $caresordcom->setCanrec($value[5]);
        $caresordcom->setCantot($value[6]);
        $caresordcom->setCosto($value[7]);
        $caresordcom->setRgoart($value[8]);
        $caresordcom->setTotart($value[9]);



        $per4[] = $caresordcom;
      }
    } else {
      $c = new Criteria();
      $c->add(CaresordcomPeer::ORDCOM, $ordcom);
      $per4 = CaresordcomPeer::doSelect($c);
    }

    $filas_arreglo = 0;
    $mascaraarticulo = $this->mascaraarticulo;
    $formatocategoria = $this->formatocategoria;
    // Se crea el objeto principal de la clase OpcionesGrid
    $opciones = new OpcionesGrid();
    // Se configuran las opciones globales del Grid
    $opciones->setEliminar(false);
    $opciones->setFilas($filas_arreglo);
    $opciones->setTabla('Caresordcom');
    $opciones->setName('b');
    $opciones->setAncho(1000);
    $opciones->setAnchoGrid(1020);
    $opciones->setTitulo('Detalle de la Orden de Requisición');
    $opciones->setHTMLTotalFilas(' ');

    // Se generan las columnas
    $col1 = new Columna('Código  Artículo');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('Codart');
    $col1->setHTML('type="text" size="15" readonly="true"');

    $col2 = new Columna('Descripción');
    $col2->setTipo(Columna::TEXTAREA);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('Desres');
    $col2->setHTML('type="text" size="30x1" ');

    $col3 = new Columna('Cod. Art.Contratistas de Bienes o Servicio y Cooperativas');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::DERECHA);
    $col3->setAlineacionContenido(Columna::DERECHA);
    $col3->setNombreCampo('Codartpro');
    $col3->setHTML('type="text" size="15"');

    $col4 = new Columna('Cant. Ordenada');
    $col4->setTipo(Columna::MONTO);
    $col4->setEsGrabable(true);
    $col4->setAlineacionContenido(Columna::DERECHA);
    $col4->setAlineacionObjeto(Columna::DERECHA);
    $col4->setNombreCampo('Canord');
    $col4->setEsNumerico(true);
    $col4->setHTML('type="text" size="5"');

    $col5 = clone $col4;
    $col5->setTitulo('Cant. Ajustada');
    $col5->setNombreCampo('Canaju');
    $col5->setHTML('type="text" size="5"');

    $col6 = clone $col5;
    $col6->setTitulo('Cant.  Recibida');
    $col6->setNombreCampo('Canrec');
    $col6->setHTML('type="text" size="5"');

    $col7 = clone $col5;
    $col7->setTitulo('Cant. Total');
    $col7->setNombreCampo('Cantot');
    $col7->setHTML('type="text" size="5"');

    $col8 = clone $col5;
    $col8->setTitulo('Costo');
    $col8->setNombreCampo('Costo');
    $col8->setDecimal(6);
    $col8->setHTML('type="text" size="8"');

    $col9 = clone $col5;
    $col9->setTitulo('Monto Recargo');
    $col9->setNombreCampo('Rgoart');
    $col9->setDecimal(4);
    $col9->setHTML('type="text" size="8"');

    $col10 = clone $col5;
    $col10->setTitulo('Total');
    $col10->setDecimal(6);
    $col10->setNombreCampo('Totart');
    $col10->setHTML('type="text" size="8"');


    // Se guardan las columnas en el objetos de opciones
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
    $opciones->addColumna($col7);
    $opciones->addColumna($col8);
    $opciones->addColumna($col9);
    $opciones->addColumna($col10);

    // Ee genera el arreglo de opciones necesario para generar el grid
    $this->obj_resumen = $opciones->getConfig($per4);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid_ResumenPartidas($ordcom='', $articulos=array()) {
    $escodpre = 'N';

    if (count($articulos) > 0) {
      $reg = $articulos;
      $resp = count($articulos);
    } else {
      $sql = "select 9 as id, '' as nompar, codpar, sum(totarti) as totart, recargo from (select 9 as id, '' as nompar,  a.codpar as codpar, sum((a.totart-a.rgoart)) as totarti, 'N' as recargo from caartord a
            where a.ordcom='" . $ordcom . "'  group by  a.codpar,a.totart,a.rgoart
            union
            select 9 as id, '' as nompar, c.codpre as codpar,sum(b.monrgo) as totarti, 'S' as recargo from cargosol b, carecarg c
            where reqart='" . $ordcom . "' and b.codrgo=c.codrgo group by c.codpre) as nueva group by codpar, recargo";
      $resp = Herramientas::BuscarDatos($sql, $reg);
    }

    //verificar si la imputacion presupuestaria asociada al recargo es una partida o un codigo presupuestario
    $c = new Criteria();
    $cadefart_search = CadefartPeer::doSelectOne($c);
    if ($cadefart_search) {
      if ($cadefart_search->getAsiparrec() == 'P')
        $escodpre = "S";
    }
    //obtener partida para el caso que la imputacion presupuestaria del recargo este asociada a un codigo presupuestario
    if ($escodpre == "S") {
      $res = array();
      $misql = "Select rupcat, ruppar From CpDefNiv";
      $i = 1;
      if (Herramientas::BuscarDatos($misql, $res)) {
        $categoria = $res[0]['rupcat'];
        $partidas = $res[0]['ruppar'];
      }
    }// if ($escodpre=="S")
    $i = 0;
    while ($i < count($reg)) {
      if ($reg[$i]["recargo"] == "S" and $escodpre == "S")
        $reg[$i]["codpar"] = substr($reg[$i]["codpar"], $categoria + 2);

      $reg[$i]["nompar"] = NppartidasPeer::getNompar($reg[$i]["codpar"]);

      //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
      $i++;
    }


    $c = new Criteria();
    // Se crea el objeto principal de la clase OpcionesGrid
    $opciones = new OpcionesGrid();
    // Se configuran las opciones globales del Grid
    $opciones->setEliminar(false);
    $opciones->setFilas(0);
    $opciones->setTabla('Caartord');
    $opciones->setName('z');
    $opciones->setAncho(600);
    $opciones->setAnchoGrid(800);
    $opciones->setTitulo('');
    $opciones->setHTMLTotalFilas(' ');

    // Se generan las columnas
    $col1 = new Columna('Código  Partida');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('Codpar');
    $col1->setHTML('type="text" size="25" readonly="true"');

    $col2 = new Columna('Nombre');
    $col2->setTipo(Columna::TEXTAREA);
    $col2->setEsGrabable(true);
    if ($ordcom == "")
      $col2->setOculta(true);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('nompar');
    $col2->setHTML('type="text" size="30x1" readonly="true');

    $col3 = new Columna('Monto');
    $col3->setTipo(Columna::MONTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionContenido(Columna::DERECHA);
    $col3->setAlineacionObjeto(Columna::DERECHA);
    $col3->setNombreCampo('totart');
    $col3->setEsNumerico(true);
    $col3->setHTML('type="text" size="10" readonly="true');



    // Se guardan las columnas en el objetos de opciones
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);

    // Ee genera el arreglo de opciones necesario para generar el grid
    $this->obj_respartidas = $opciones->getConfig($reg);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid_FormasEntrega($ordcom='', $articulos=array()) {

    if (count($articulos) > 0) {

      $reg = array();
      foreach ($articulos as $key => $value) {

        $caentord = new Caentord();
        $caentord->setCodart($value[0]);
        $caentord->setDesres($value[1]);
        $caentord->setCodartpro($value[2]);
        $caentord->setCanord($value[3]);
        $caentord->setCanaju($value[4]);
        $caentord->setCanrec($value[5]);

        $reg[] = $caentord;
      }
    } else {
      $c = new Criteria();
      $c->add(CaentordPeer::ORDCOM, $ordcom);
      $reg = CaentordPeer::doSelect($c);
    }

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(true);
    $opciones->setFilas(30);
    $opciones->setTabla('Caentord');
    $opciones->setName('t');
    $opciones->setAncho(950);
    $opciones->setAnchoGrid(980);
    $opciones->setTitulo(' ');
    $opciones->setHTMLTotalFilas(' ');

    $mascaraarticulo = $this->mascaraarticulo;
    $lonart = strlen($mascaraarticulo);

    $params = array('param1' => $lonart, 'param2' => "'+$('caordcom_tipord').value+'", 'val2');

    $col1 = new Columna('Código  Artículo');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codart');
    $col1->setHTML('type="text" size="10"  maxlength="' . chr(39) . $lonart . chr(39) . '" onKeyDown="javascript:return dFilter (event.keyCode, this,' . chr(39) . $mascaraarticulo . chr(39) . ')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
    $col1->setCatalogo('caregart', 'sf_admin_edit_form', array('codart' => 1, 'desart' => 2), 'Caregart_Almsolegr', $params);
    $col1->setAjax('almordcomv2', 22, 2);

    $col2 = new Columna('Descripción');
    $col2->setTipo(Columna::TEXTAREA);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('desart');
    $col2->setEsGrabable(true);
    $col2->setHTML('type="text" size="15x1" readonly=true');

    $col3 = new Columna('Código  Almacén');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setNombreCampo('codalm');
    $col3->setHTML('type="text" size="8" maxlength="20"');
    $col3->setCatalogo('Cadefalm', 'sf_admin_edit_form', array('codalm' => 3, 'nomalm' => 4), 'Cadefalm_Alminvfis');
    $col3->setAjax('almordcomv2', 21, 4);

    $col4 = new Columna('Descripción');
    $col4->setTipo(Columna::TEXTO);
    $col4->setEsGrabable(true);
    $col4->setAlineacionObjeto(Columna::IZQUIERDA);
    $col4->setAlineacionContenido(Columna::IZQUIERDA);
    $col4->setNombreCampo('nomalm');
    $col4->setHTML('type="text" size="20" readonly="true"');

    $col5 = new Columna('Cant. Entregar');
    $col5->setTipo(Columna::MONTO);
    $col5->setEsGrabable(true);
    $col5->setAlineacionContenido(Columna::DERECHA);
    $col5->setAlineacionObjeto(Columna::DERECHA);
    $col5->setNombreCampo('canent');
    $col5->setEsNumerico(true);
    $col5->setHTML('type="text" size="8" onKeyPress="entermonto_t(event,this.id); verificarcantidad(this.id)"');

    $col6 = new Columna('Cant. Recibida');
    $col6->setTipo(Columna::MONTO);
    $col6->setEsGrabable(true);
    $col6->setAlineacionContenido(Columna::DERECHA);
    $col6->setAlineacionObjeto(Columna::DERECHA);
    $col6->setNombreCampo('canrec');
    $col6->setEsNumerico(true);
    $col6->setHTML('type="text" size="8" readonly="true"');

    $col7 = new Columna('Fecha de Entrega');
    $col7->setNombreCampo('fecent');
    $col7->setTipo(Columna::FECHA);
    $col7->setHTML('');
    $col7->setEsGrabable(true);

    // Se guardan las columnas en el objetos de opciones
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
    $opciones->addColumna($col7);

    // Ee genera el arreglo de opciones necesario para generar el grid
    $this->obj_formas = $opciones->getConfig($reg);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid_Entregas($ordcom='', $articulos=array()) {
    /*     * ***********************************************************************
     * *         Grid de Entregas de la Orden de Compra Formulario Amlordcom  **
     * *                                                                      **
     * ************************************************************************ */


    if (count($articulos) > 0) {
      // TODO: generar objetos de tipo Caartfec por cada registro del arreglo

      $per5 = array();

      $filas_arreglo = 0;
      foreach ($articulos as $art) {
        $caartfec = new Caartfec();

        $caartfec->setCodart($art[0]);
        $caartfec->setDesart($art[1]);
        $caartfec->setCanart($art[2]);
        $caartfec->setFecent($art[3]);

        $per5[] = $caartfec;
      }
    } else {
      $c = new Criteria();
      $c->add(CaartfecPeer::ORDCOM, $ordcom);
      $per5 = CaartfecPeer::doSelect($c);
      $filas_arreglo = 0;
    }

    $mascaraarticulo = $this->mascaraarticulo;
    $formatocategoria = $this->formatocategoria;
    // Se crea el objeto principal de la clase OpcionesGrid
    $opciones2 = new OpcionesGrid();
    // Se configuran las opciones globales del Grid
    $opciones2->setEliminar(false);
    $opciones2->setFilas($filas_arreglo);
    $opciones2->setTabla('Caartfec');
    $opciones2->setAncho(675);
    $opciones2->setAnchoGrid(700);
    $opciones2->setName('c');
    $opciones2->setTitulo('Detalle de la Orden de Requisición');
    $opciones2->setHTMLTotalFilas(' ');

    // Se generan las columnas
    $col1 = new Columna('Código  Artículo');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::DERECHA);
    $col1->setAlineacionContenido(Columna::DERECHA);
    $col1->setNombreCampo('Codart');
    $col1->setHTML('type="text" size="15" readonly="readonly" onKeyDown="javascript:return dFilter (event.keyCode, this,' . chr(39) . $mascaraarticulo . chr(39) . ')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');

    $col2 = new Columna('Descripción');
    $col2->setTipo(Columna::TEXTAREA);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('Desart');
    $col2->setHTML('type="text" size="35x1"');

    $col3 = new Columna('Cantidad');
    $col3->setTipo(Columna::MONTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionContenido(Columna::DERECHA);
    $col3->setAlineacionObjeto(Columna::DERECHA);
    $col3->setNombreCampo('Canart');
    $col3->setEsNumerico(true);
    $col3->setHTML('type="text" size="8" readonly="readonly"');


    $col4 = new Columna('Fecha de Entrega');
    $col4->setNombreCampo('Fecent');
    $col4->setTipo(Columna::FECHA);
    $col4->setHTML('');
    $col4->setEsGrabable(true);
    $col4->setHTML('type="text" size="8"');


    // Se guardan las columnas en el objetos de opciones
    $opciones2->addColumna($col1);
    $opciones2->addColumna($col2);
    $opciones2->addColumna($col3);
    $opciones2->addColumna($col4);

    // Ee genera el arreglo de opciones necesario para generar el grid
    $this->obj_entregas = $opciones2->getConfig($per5);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid_EntregasPDA($ordcom='', $articulos=array()) {
    /*     * ***********************************************************************
     * *         Grid de Entregas de la Orden de Compra Formulario Amlordcom  **
     * *                                                                      **
     * ************************************************************************ */


    if (count($articulos) > 0) {
      // TODO: generar objetos de tipo Caartfec por cada registro del arreglo

      $per6 = array();

      $filas_arreglo = 1;
      foreach ($articulos as $art) {
        $caentpda = new Caentpda();

        $caentpda->setCodart($art[0]);
        $caentpda->setDesart($art[1]);
        $caentpda->setCanart($art[2]);
        $caentpda->setFecent($art[3]);
        $caentpda->setTiptra($art[4]);
        $caentpda->setDirori($art[5]);
        $caentpda->setCanart2($art[6]);
        $caentpda->setObserv($art[7]);

        $per6[] = $caentpda;
      }
    } else {
      $c = new Criteria();
      $c->add(CaentpdaPeer::ORDCOM, $ordcom);
      $per6 = CaentpdaPeer::doSelect($c);
      $filas_arreglo = 1;
    }
    // Se crea el objeto principal de la clase OpcionesGrid
    $opciones2 = new OpcionesGrid();
    // Se configuran las opciones globales del Grid
    $opciones2->setEliminar(true);
    $opciones2->setFilas($filas_arreglo);
    $opciones2->setTabla('Caentpda');
    $opciones2->setAncho(1500);
    $opciones2->setAnchoGrid(1000);
    $opciones2->setName('p');
    $opciones2->setTitulo('Detalle de la Orden');
    $opciones2->setHTMLTotalFilas(' ');

    // Se generan las columnas
    $col1 = new Columna('Código  Artículo');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::DERECHA);
    $col1->setAlineacionContenido(Columna::DERECHA);
    $col1->setNombreCampo('Codart');
    $col1->setHTML('type="text" size="15" readonly="true" ');

    $col2 = new Columna('Descripción');
    $col2->setTipo(Columna::TEXTAREA);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('Desart');
    $col2->setHTML('type="text" size="35x1" readonly="true"');

    $col3 = new Columna('Cantidad');
    $col3->setTipo(Columna::MONTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionContenido(Columna::DERECHA);
    $col3->setAlineacionObjeto(Columna::DERECHA);
    $col3->setNombreCampo('Canart');
    $col3->setEsNumerico(true);
    $col3->setHTML('type="text" size="8" onBlur="ValidarMontoGridv2(this); validartotal(this.id)"');

    $col4 = new Columna('Fecha de Entrega');
    $col4->setNombreCampo('Fecent');
    $col4->setTipo(Columna::FECHA);
    $col4->setHTML('');
    $col4->setEsGrabable(true);
    $col4->setHTML('type="text" size="8"');

    $col5 = new Columna('Tipo de Trasporte');
    $col5->setTipo(Columna::COMBO);
    $col5->setEsGrabable(true);
    $col5->setNombreCampo('tiptra');
    $col5->setCombo(CatiptransPeer::getTipTrans());
    $col5->setHTML(' ');

    $col6 = new Columna('Dirección Origen');
    $col6->setTipo(Columna::TEXTAREA);
    $col6->setEsGrabable(true);
    $col6->setAlineacionObjeto(Columna::IZQUIERDA);
    $col6->setAlineacionContenido(Columna::IZQUIERDA);
    $col6->setNombreCampo('dirori');
    $col6->setHTML('type="text" size="35x1"');

    $col7 = new Columna('Agregar');
    $col7->setTipo(Columna::TEXTO);
    $col7->setEsGrabable(false);
    $col7->setAlineacionObjeto(Columna::CENTRO);
    $col7->setAlineacionContenido(Columna::CENTRO);
    $col7->setNombreCampo('agregar');
    $col7->setHTML('type="text" size="1" style="border:none" class="imagenannadir" onClick="agregarfilaspda(this.id)"');
    //$col7->setJScript('onClick="agregarfilaspda(this.id)"');

    $col8 = new Columna('Cantidad 2');
    $col8->setTipo(Columna::MONTO);
    $col8->setEsGrabable(true);
    $col8->setAlineacionContenido(Columna::DERECHA);
    $col8->setAlineacionObjeto(Columna::DERECHA);
    $col8->setNombreCampo('Canart2');
    $col8->setEsNumerico(true);
    $col8->setHTML('type="text" size="8" ');
    $col8->setOculta(true);

    $col9 = new Columna('Observación');
    $col9->setTipo(Columna::TEXTAREA);
    $col9->setEsGrabable(true);
    $col9->setAlineacionObjeto(Columna::IZQUIERDA);
    $col9->setAlineacionContenido(Columna::IZQUIERDA);
    $col9->setNombreCampo('observ');
    $col9->setHTML('type="text" size="40x2" maxlength="500"');

    // Se guardan las columnas en el objetos de opciones
    $opciones2->addColumna($col1);
    $opciones2->addColumna($col2);
    $opciones2->addColumna($col3);
    $opciones2->addColumna($col4);
    $opciones2->addColumna($col5);
    $opciones2->addColumna($col6);
    $opciones2->addColumna($col7);
    $opciones2->addColumna($col8);
    $opciones2->addColumna($col9);

    // Ee genera el arreglo de opciones necesario para generar el grid
    $this->obj_entrepda = $opciones2->getConfig($per6);
  }

  public function setVars() {
    $this->mascaraarticulo = Herramientas::getMascaraArticulo();
    $this->formatocategoria = Herramientas::getObtener_FormatoCategoria();
    $this->deshabmonrec = "";
    $this->ordcomdesh = "";
    $this->mansolocor = "";
    $this->bloqfec = "";
    $this->oculeli = "";
    $this->oculsave = "";
    $this->fechaanuserv = "";
    $this->etiqtipord = "Licitación";

    $this->deshabmonrec = H::getConfApp2('deshabilmonrec', 'compras', 'almordcom');
    $this->ordcomdesh = H::getConfApp2('ordcomdesh', 'compras', 'almordcom');
    $this->mansolocor = H::getConfApp2('mansolocor', 'compras', 'almordcom');
    $this->bloqfec = H::getConfApp2('bloqfec', 'compras', 'almordcom');
    $this->oculeli = H::getConfApp2('oculeli', 'compras', 'almordcom');
    $this->oculsave = H::getConfApp2('oculsave', 'compras', 'almordcom');
    $this->fechaanuserv = H::getConfApp2('fechaanuserv', 'compras', 'almordcom');
    $this->etiqtipord = H::getConfApp2('etiqtipord', 'compras', 'almordcom');
    $this->tipordsergen = H::getConfApp2('tipordsergen', 'compras', 'almordcom');
    $this->mosmondisart = H::getConfApp2('mosmondisart', 'compras', 'almordcom');
  }

  public function executeAutocomplete() {
    if ($this->getRequestParameter('ajax') == '1')
      $this->tags = Herramientas::autocompleteAjax('CODUBI', 'Bnubibie', 'Codubi', trim($this->getRequestParameter('codcatreq')));
  }

  protected function deleteCaordcom($caordcom) {
    $id = $this->getRequestParameter('id');
    if (!Orden_compra::Eliminar($caordcom, $coderror)) {
      if ($coderror != -1) {
        $err = Herramientas::obtenerMensajeError($coderror);
        $this->getRequest()->setError('delete', $err);
        return $this->forward('almordcomv2', 'list');
      }else {
        $this->SalvarBitacora($id ,'Elimino');
      }
    }
  }

//<--------------------------------------------------------------------------------------------------------------------------------------------------->
  /**
   * Función para manejar el salvado del formulario.
   * cabe destacar que en las versiones nuevas del formulario (cidesaPropel)
   * llama internamente a la función $this->saving
   * Esta función saving siempre debe retornar un valor >=-1.
   * En esta funcción se debe realizar el proceso de guardado de informacion
   * del negocio en la base de datos. Este proceso debe ser realizado llamado
   * a funciones de las clases del negocio que se encuentran en lib/bussines
   * todos los procesos de guardado deben estar en la clases del negocio (lib/bussines/"modulo")
   *
   */
  protected function saveCaordcom($caordcom) {
    //<!-----------------------------Grid Arreglos---------------------->
    $grid_detalle_orden_arreglos = Herramientas::CargarDatosGridv2($this, $this->obj, true); //0
    $grid_detalle_resumen_arreglos = Herramientas::CargarDatosGridv2($this, $this->obj_resumen, true); //1
    $grid_detalle_entrega_arreglos = Herramientas::CargarDatosGridv2($this, $this->obj_entregas, true); //2
    $grid_detalle_recargo_arreglos = Herramientas::CargarDatosGridv2($this, $this->obj_recargos, true); //3
    $grid_detalle_entregapda_arreglos = Herramientas::CargarDatosGridv2($this, $this->obj_entrepda, true); //4
    $arreglo_arreglo = array($grid_detalle_orden_arreglos, $grid_detalle_resumen_arreglos, $grid_detalle_entrega_arreglos, $grid_detalle_recargo_arreglos, $grid_detalle_entregapda_arreglos);

    //<!-----------------------------Grid Objetos---------------------->
    $grid_detalle_resumen_objetos = Herramientas::CargarDatosGridv2($this, $this->obj_resumen); //0
    $grid_detalle_entrega_objetos = Herramientas::CargarDatosGridv2($this, $this->obj_entregas); //1
    $grid_detalle_formas_entrega = Herramientas::CargarDatosGridv2($this, $this->obj_formas); //2
    $grid_detalle_entrega_pda = Herramientas::CargarDatosGridv2($this, $this->obj_entrepda); //2
    $arreglo_objetos = array($grid_detalle_resumen_objetos, $grid_detalle_entrega_objetos, $grid_detalle_formas_entrega, $grid_detalle_entrega_pda);

    //<!-----------------------------campos ocultos---------------------->
    $total = $this->getRequestParameter('sumatoria_detalle_orden'); //0
    $total_descuento = $this->getRequestParameter('sumatoria_descuentoss'); //1
    $total_recargo = $this->getRequestParameter('sumatoria_recargo'); //2
    $codigo_proveedor = H::getX('RIFPRO', 'Caprovee', 'Codpro', $this->getRequestParameter('caordcom[rifpro]')); //$this->getRequestParameter('caordcom[codigoproveedor]'); //3
    $tasacambio = $this->getRequestParameter('tasacambio'); //4
    $referencia = $this->getUser()->getAttribute('referencia'); //5
    $genero_compromiso = $this->getUser()->getAttribute('genero_compromiso'); //6
    $codconpag_dos = $this->getRequestParameter('codconpag_dos'); //7
    $codforent_dos = $this->getRequestParameter('codforent_dos'); //8
    $this->getUser()->getAttributeHolder()->remove('referencia'); //9
    $this->getUser()->getAttributeHolder()->remove('genero_compromiso'); //10
    $arreglo_campos = array($total, $total_descuento, $total_recargo, $codigo_proveedor, $tasacambio, $referencia, $codconpag_dos, $codforent_dos, $genero_compromiso);


    $this->verificarResumenes($arreglo_arreglo, $arreglo_objetos);

    //<!-----------------------------funciones clase Orden de Compra---------------------->
    if (Orden_compra::Salvar($caordcom, $arreglo_arreglo, $arreglo_objetos, $arreglo_campos, $grid_detalle_formas_entrega, $coderror)) {
      //<!-----------------------------guardo comprobante---------------------->
     /* if ($this->getUser()->getAttribute('grabo', null, $this->getUser()->getAttribute('formulario')) == 'S') {
        $numcom = $this->getUser()->getAttribute('contabc[numcom]', null, $this->getUser()->getAttribute('formulario'));
        $reftra = $this->getUser()->getAttribute('contabc[reftra]', null, $this->getUser()->getAttribute('formulario'));
        $feccom = $this->getUser()->getAttribute('contabc[feccom]', null, $this->getUser()->getAttribute('formulario'));
        $descom = $this->getUser()->getAttribute('contabc[descom]', null, $this->getUser()->getAttribute('formulario'));
        $debito = $this->getUser()->getAttribute('debito', null, $this->getUser()->getAttribute('formulario'));
        $credito = $this->getUser()->getAttribute('credito', null, $this->getUser()->getAttribute('formulario'));
        $grid = $this->getUser()->getAttribute('grid', null, $this->getUser()->getAttribute('formulario'));

        $this->getUser()->getAttributeHolder()->remove('contabc[numcom]', $this->getUser()->getAttribute('formulario'));
        $this->getUser()->getAttributeHolder()->remove('contabc[reftra]', $this->getUser()->getAttribute('formulario'));
        $this->getUser()->getAttributeHolder()->remove('contabc[feccom]', $this->getUser()->getAttribute('formulario'));
        $this->getUser()->getAttributeHolder()->remove('contabc[descom]', $this->getUser()->getAttribute('formulario'));
        $this->getUser()->getAttributeHolder()->remove('debito', $this->getUser()->getAttribute('formulario'));
        $this->getUser()->getAttributeHolder()->remove('credito', $this->getUser()->getAttribute('formulario'));
        $this->getUser()->getAttributeHolder()->remove('grid', $this->getUser()->getAttribute('formulario'));

        $numcom = Comprobante::SalvarComprobante($numcom, $reftra, $feccom, $descom, $debito, $credito, $grid, $this->getUser()->getAttribute('grabar', null, $this->getUser()->getAttribute('formulario')));
        $this->getUser()->getAttributeHolder()->remove('grabo', $this->getUser()->getAttribute('formulario'));
      }*/
      return $coderror;
    }//  if (Orden_compra::Salvar($caordcom,$arreglo_arreglo,$arreglo_objetos,$arreglo_campos))
    else
      return $coderror;
  }

//<--------------------------------------------------------------------------------------------------------------------------------------------------->

  /**
   * Actualiza la informacion que viene de la vista
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateCaordcomFromRequest() {
    $caordcom = $this->getRequestParameter('caordcom');
    if (isset($caordcom['ordcom']))
      $this->caordcom->setOrdcom(trim($caordcom['ordcom']));
    $this->caordcom->setRefcom('');
    if (isset($caordcom['staord']))
      $this->caordcom->setStaord('A');
    $this->caordcom->setAfepre('N');

    if (isset($caordcom['fecord'])) {
      if ($caordcom['fecord']) {
        try {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
          if (!is_array($caordcom['fecord'])) {
            $value = $dateFormat->format($caordcom['fecord'], 'i', $dateFormat->getInputPattern('d'));
          } else {
            $value_array = $caordcom['fecord'];
            $value = $value_array['year'] . '-' . $value_array['month'] . '-' . $value_array['day'] . (isset($value_array['hour']) ? ' ' . $value_array['hour'] . ':' . $value_array['minute'] . (isset($value_array['second']) ? ':' . $value_array['second'] : '') : '');
          }
          $this->caordcom->setFecord($value);
        } catch (sfException $e) {
          // not a date
        }
      } else {
        $this->caordcom->setFecord(null);
      }
    }
    if (isset($caordcom['tipmon'])) {
      $this->caordcom->setTipmon(trim($caordcom['tipmon']));
    }
    if (isset($caordcom['codpro'])) {
      $this->caordcom->setCodpro(trim($caordcom['codpro']));
    }
    /* if (isset($caordcom['nompro']))
      {
      $this->caordcom->setNompro($caordcom['nompro']);
      } */
    if (isset($caordcom['rifpro'])) {
      $this->caordcom->setRifpro(trim($caordcom['rifpro']));
      $this->caordcom->setCodpro(Herramientas::getX_vacio('rifpro', 'caprovee', 'codpro', $caordcom['rifpro']));
    }
    if (isset($caordcom['desord'])) {
      $this->caordcom->setDesord($caordcom['desord']);
    }
    if (isset($caordcom['desord'])) {
      $this->caordcom->setDesord($caordcom['desord']);
    }
    if (isset($caordcom['crecon'])) {
      $this->caordcom->setCrecon($caordcom['crecon']);
    }
    if (isset($caordcom['monord'])) {
      setlocale(LC_MONETARY, 'it_IT');
      //money_format('%.2n', $caordcom['monord'])
      //$this->caordcom->setMonord(money_format('%.2n', $caordcom['monord']));
      $this->caordcom->setMonord($caordcom['monord']);
    }
    if (isset($caordcom['doccom'])) {
      $this->caordcom->setDoccom(trim($caordcom['doccom']));
    }
    /* if (isset($caordcom['nomext']))
      {
      $this->caordcom->setNomext($caordcom['nomext']);
      } */
    if (isset($caordcom['refsol'])) {
      $this->caordcom->setRefsol(trim($caordcom['refsol']));
    }
    if (isset($caordcom['tipord'])) {
      $this->caordcom->setTipord(trim($caordcom['tipord']));
    }
    if (isset($caordcom['tippro'])) {
      $this->caordcom->setTippro(trim($caordcom['tippro']));
    }
    if (isset($caordcom['tipfin'])) {
      $this->caordcom->setTipfin(trim($caordcom['tipfin']));
    }
    if (isset($caordcom['tipo'])) {
      $this->caordcom->setTipo(trim($caordcom['tipo']));
    }
    if (isset($caordcom['codconpag'])) {
      $this->caordcom->setCodconpag(trim($caordcom['codconpag']));
    }
    /* if (isset($caordcom['desconpag']))
      {
      $this->caordcom->setDesconpag($caordcom['desconpag']);
      } */
    if (isset($caordcom['plaent'])) {
      $this->caordcom->setPlaent(trim($caordcom['plaent']));
    }
    if (isset($caordcom['tiecan'])) {
      $this->caordcom->setTiecan(trim($caordcom['tiecan']));
    }
    if (isset($caordcom['dtoord'])) {
      $this->caordcom->setDtoord(trim($caordcom['dtoord']));
    }
    if (isset($caordcom['conpag'])) {
      $this->caordcom->setConpag(trim($caordcom['conpag']));
    }
    if (isset($caordcom['forent'])) {
      $this->caordcom->setForent(trim($caordcom['forent']));
    }
    if (isset($caordcom['fecanu'])) {
      if ($caordcom['fecanu']) {
        try {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
          if (!is_array($caordcom['fecanu'])) {
            $value = $dateFormat->format($caordcom['fecanu'], 'i', $dateFormat->getInputPattern('d'));
          } else {
            $value_array = $caordcom['fecanu'];
            $value = $value_array['year'] . '-' . $value_array['month'] . '-' . $value_array['day'] . (isset($value_array['hour']) ? ' ' . $value_array['hour'] . ':' . $value_array['minute'] . (isset($value_array['second']) ? ':' . $value_array['second'] : '') : '');
          }
          $this->caordcom->setFecanu($value);
        } catch (sfException $e) {
          // not a date
        }
      } else {
        $this->caordcom->setFecanu(null);
      }
    }
    if (isset($caordcom['valmon'])) {
      $this->caordcom->setValmon(trim($caordcom['valmon']));
    }
    if (isset($caordcom['tipcom'])) {
      $this->caordcom->setTipcom(trim($caordcom['tipcom']));
    }
    if (isset($caordcom['coduni'])) {
      $this->caordcom->setCoduni(trim($caordcom['coduni']));
    }
    if (isset($caordcom['codemp'])) {
      $this->caordcom->setCodemp(trim($caordcom['codemp']));
    }
    if (isset($caordcom['notord'])) {
      $this->caordcom->setNotord($caordcom['notord']);
    }
    if (isset($caordcom['tipdoc'])) {
      $this->caordcom->setTipdoc(trim($caordcom['tipdoc']));
    }
    if (isset($caordcom['justif'])) {
      $this->caordcom->setJustif($caordcom['justif']);
    }
    if (isset($caordcom['refprc'])) {
      $this->caordcom->setRefprc(trim($caordcom['refprc']));
    }
    if (isset($caordcom['despro'])) {
      $this->caordcom->setDespro($caordcom['despro']);
    }
    if (isset($caordcom['codforent'])) {
      $this->caordcom->setCodforent(trim($caordcom['codforent']));
    }
    /*
      if (isset($caordcom['desforent']))
      {
      $this->caordcom->setDesforent($caordcom['desforent']);
      } */
    if (isset($caordcom['nomfin'])) {
      $this->caordcom->setNomfin($caordcom['nomfin']);
    }
    /* if (isset($caordcom['desubi']))
      {
      $this->caordcom->setDesubi($caordcom['desubi']);
      } */
    if (isset($caordcom['nomemp'])) {
      $this->caordcom->setNomemp($caordcom['nomemp']);
    }
    if (isset($caordcom['codigoproveedor'])) {
      $this->caordcom->setCodigoproveedor($caordcom['codigoproveedor']);
    }

    if ($this->AfectaProyecto()) {
      $this->caordcom->setAfePro('S');
    } else {
      $this->caordcom->setAfePro('N');
    }

    if (isset($caordcom['numsigecof'])) {
      $this->caordcom->setNumsigecof(trim($caordcom['numsigecof']));
    }

    if (isset($caordcom['fecsigecof'])) {
      if ($caordcom['fecsigecof']) {
        try {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
          if (!is_array($caordcom['fecsigecof'])) {
            $value = $dateFormat->format($caordcom['fecsigecof'], 'i', $dateFormat->getInputPattern('d'));
          } else {
            $value_array = $caordcom['fecsigecof'];
            $value = $value_array['year'] . '-' . $value_array['month'] . '-' . $value_array['day'] . (isset($value_array['hour']) ? ' ' . $value_array['hour'] . ':' . $value_array['minute'] . (isset($value_array['second']) ? ':' . $value_array['second'] : '') : '');
          }
          $this->caordcom->setFecsigecof($value);
        } catch (sfException $e) {
          // not a date
        }
      } else {
        $this->caordcom->setFecsigecof(null);
      }
    }


    if (isset($caordcom['expsigecof'])) {
      $this->caordcom->setExpsigecof(trim($caordcom['expsigecof']));
    }
    if (isset($caordcom['totrecargo'])) {
      $this->caordcom->setTotrecargo($caordcom['totrecargo']);
    }
    if (isset($caordcom['totorden'])) {
      $this->caordcom->setTotorden($caordcom['totorden']);
    }
    if (isset($caordcom['codmedcom'])) {
      $this->caordcom->setCodmedcom($caordcom['codmedcom']);
    }
    if (isset($caordcom['codprocom'])) {
      $this->caordcom->setCodprocom($caordcom['codprocom']);
    }
    if (isset($caordcom['codpai'])) {
      $this->caordcom->setCodpai($caordcom['codpai']);
    }
    if (isset($caordcom['codedo'])) {
      $this->caordcom->setCodedo($caordcom['codedo']);
    }
    if (isset($caordcom['codmun'])) {
      $this->caordcom->setCodmun($caordcom['codmun']);
    }
    if (isset($caordcom['aplart'])) {
      $this->caordcom->setAplart($caordcom['aplart']);
    }
    if (isset($caordcom['aplart6'])) {
      $this->caordcom->setAplart6($caordcom['aplart6']);
    }
    if (isset($caordcom['eti'])) {
      $this->caordcom->setEti($caordcom['eti']);
    }
    if (isset($caordcom['codcen'])) {
      $this->caordcom->setCodcen($caordcom['codcen']);
    }
    if (isset($caordcom['tipocom'])) {
      $this->caordcom->setTipocom($caordcom['tipocom']);
    }
    if (isset($caordcom['ceddon'])) {
      $this->caordcom->setCeddon($caordcom['ceddon']);
    }
    if (isset($caordcom['nomdon'])) {
      $this->caordcom->setNomdon($caordcom['nomdon']);
    }
    if (isset($caordcom['fecdon'])) {
      if ($caordcom['fecdon']) {
        try {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
          if (!is_array($caordcom['fecdon'])) {
            $value = $dateFormat->format($caordcom['fecdon'], 'i', $dateFormat->getInputPattern('d'));
          } else {
            $value_array = $caordcom['fecdon'];
            $value = $value_array['year'] . '-' . $value_array['month'] . '-' . $value_array['day'] . (isset($value_array['hour']) ? ' ' . $value_array['hour'] . ':' . $value_array['minute'] . (isset($value_array['second']) ? ':' . $value_array['second'] : '') : '');
          }
          $this->caordcom->setFecdon($value);
        } catch (sfException $e) {
          // not a date
        }
      } else {
        $this->caordcom->setFecdon(null);
      }
    }
    if (isset($caordcom['sexdon'])) {
      $this->caordcom->setSexdon($caordcom['sexdon']);
    }
    if (isset($caordcom['edadon'])) {
      $this->caordcom->setEdadon($caordcom['edadon']);
    }
    if (isset($caordcom['serdon'])) {
      $this->caordcom->setSerdon($caordcom['serdon']);
    }
    if (isset($caordcom['manorddon'])) {
      $this->caordcom->setManorddon($caordcom['manorddon']);
    }
    if (isset($caordcom['codcenaco'])) {
      $this->caordcom->setCodcenaco($caordcom['codcenaco']);
    }
    if (isset($caordcom['coddirec'])) {
      $this->caordcom->setCoddirec($caordcom['coddirec']);
    }
    if (isset($caordcom['coddivi'])) {
      $this->caordcom->setCoddivi($caordcom['coddivi']);
    }
    if (isset($caordcom['codeve'])) {
      $this->caordcom->setCodeve($caordcom['codeve']);
    }
    if (isset($caordcom['lugfec'])) {
      $this->caordcom->setLugfec($caordcom['lugfec']);
    }
    if (isset($caordcom['dirent'])) {
      $this->caordcom->setDirent($caordcom['dirent']);
    }
    if (isset($caordcom['numpro'])) {
      $this->caordcom->setNumpro($caordcom['numpro']);
    }
    if (isset($caordcom['percon']))
    {
      $this->caordcom->setPercon($caordcom['percon']);
    }
    if (isset($caordcom['telcon']))
    {
      $this->caordcom->setTelcon($caordcom['telcon']);
    }
    if (isset($caordcom['faxcon']))
    {
      $this->caordcom->setFaxcon($caordcom['faxcon']);
    }
    if (isset($caordcom['emacon']))
    {
      $this->caordcom->setEmacon($caordcom['emacon']);
    }
    if (isset($caordcom['codgar']))
    {
      $this->caordcom->setCodgar($caordcom['codgar']);
    }
  }

  public function AfectaProyecto() {
    if ($this->caordcom->getTippro()) {
      $result = array();
      $sql = "Select ctaord,ctaper from catippro where Codpro ='" . $this->caordcom->getTippro() . "'";
      if (Herramientas::BuscarDatos($sql, $result)) {
        if (($result[0]['ctaord'] <> '') && ($result[0]['ctaper'] <> ''))
          return true;
        else
          return false;
      }
      else
        return '';
    }
  }

  public function executeGrid_parcial() {
    if ($this->getRequestParameter('ajax') == '1') {
      if (($this->getRequestParameter('refsol') != '') and ($this->getRequestParameter('rifpro') != '')) {
        if (Orden_compra::Verificar_proveedor(trim($this->getRequestParameter('refsol')), trim($this->getRequestParameter('rifpro')), $rifpro, $msg, $cancotpril, $strrifpro, $srtrefcot)) {
          $result = array();
          $num_filas = 0;
          $sql = "Select reqart,codart,codcat,canreq,canrec,montot,costo,monrgo,canord,mondes,relart,unimed,codpar,desart From CaArtSol Where ReqArt='" . $this->getRequestParameter('refsol') . "' order By CodArt";
          if (Herramientas::BuscarDatos($sql, $result)) {
            $i = 0;
            $j = 0;
            while ($i < count($result)) {
              $id = $i;
              if ($result[$i]['canord'] <= $result[$i]['canreq']) {
                if ($cancotpril > 0) {
                  //ARTICULO DE LA COTIZACION CON PRIORIDAD #1 PARA EL NUMERO DE FILAS DEL GRID
                  $result1 = array();
                  $claartdes = H::getConfApp2('claartdes', 'compras', 'almsolegr');
                  if ($claartdes == 'S')
                    $sql1 = "select refcot,codart,canord,costo,totdet,fecent,priori,justifica,mondes from cadetcot where refcot='" . $srtrefcot . "' and codart='" . $result[$i]['codart'] . "' and desart='" . $result[$i]['desart'] . "' and priori='1'";
                  else
                    $sql1 = "select refcot,codart,canord,costo,totdet,fecent,priori,justifica,mondes from cadetcot where refcot='" . $srtrefcot . "' and codart='" . $result[$i]['codart'] . "' and priori='1'";
                  if (Herramientas::BuscarDatos($sql1, $result1))
                    $num_filas++;
                }
              }
              $i++;
            }
          }
          $filas = 'numero_filas_orden';
          $var = 'S';
          $output = '[["' . $filas . '","' . $num_filas . '",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
          $tipopro = H::getX('RIFPRO', 'Caprovee', 'Tipo', $this->getRequestParameter('rifpro'));
          if (($this->getRequestParameter('refsol') != '') and ($this->getRequestParameter('rifpro') != '') and ($this->getRequestParameter('parcial') == 'S')) {
            //print '1';
            $this->configGrid_Parcial($this->getRequestParameter('refsol'), $this->getRequestParameter('rifpro'), $tipopro);
          } else {
            //print '2';
            $this->configGrid($this->getRequestParameter('refsol'), '1', $tipopro);
          }
        } else {
          //print 'hola';
          $tipopro = H::getX('RIFPRO', 'Caprovee', 'Tipo', $this->getRequestParameter('rifpro'));
          $this->configGrid('0', '0', $tipopro);
        }
      }
    }
  }

  public function executeGrid() {
    $cajtexmos = $this->getRequestParameter('cajtexmos');
    $filas_orden = $this->getRequestParameter('filas_orden');
    $cajita = 'fecha_egresos';
    $validacion_fec_egresos = '0';
    $loguse= $this->getUser()->getAttribute('loguse');
    $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr'); 
    $mosdatadiext=H::getConfApp2('mosdatadiext', 'compras', 'almordcom');
    $monofi=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
    $nivapradi=H::getConfApp2('nivapradi', 'compras', 'almsolegr'); 
    $moslugent=H::getConfApp2('moslugent', 'compras', 'almsolegr');
    $js = "";
    if ($this->getRequestParameter('ajax') == '1') {
      if ($this->getRequestParameter('ordcom') != "") {
        $c = new Criteria();
        $c->add(CasolartPeer :: REQART, $this->getRequestParameter('ordcom'));
        $c->add(CasolartPeer :: STAREQ, "A");
        if ($nivapradi=='S')
          $c->add(CasolartPeer :: APRDIRADQ, "S");    //Verifica si la solicitud de egreso esta aprobada
        else
          $c->add(CasolartPeer :: APRREQ, "S");    //Verifica si la solicitud de egreso esta aprobada
        if ($filsoldir=='S'){
          $this->sql='casolart.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
          $c->add(CasolartPeer::CODDIREC,$this->sql,Criteria::CUSTOM); 
        }
        $c->addJoin(CasolartPeer::REQART, CaartsolPeer::REQART);
        $filas = CasolartPeer::doSelect($c);

        $numero_filas = count($filas);
        $fecord = "";

        //darle formato a la fecha
        if ($numero_filas > 0) {
            if (H::getX_vacio('TipCom','CpDocCom','RefPrc',str_replace('*', '/', $this->getRequestParameter('doccom')))=='N')
           {
              $w= new Criteria();
              $w->add(CpprecomPeer::REFPRC,$this->getRequestParameter('ordcom'));
              $trajo= CpprecomPeer::doSelectOne($w);
              if ($trajo) {
                 $javascript="alert('La Referencia : ".$this->getRequestParameter('refsol').", tiene asociado un Precompromiso...'); $('caordcom_refsol').value=''; $('caordcom_refsol').focus();";

                $output = '[["javascript","'.$javascript.'"]]';
                $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
                return sfView::HEADER_ONLY;
              }else {
                $result=array();
                $sql = "Select reqart,sum(coalesce(canreq,0)) as canreq,sum(coalesce(canord,0)) as canrec From CAArtSol Where ReqArt = '".$this->getRequestParameter('ordcom')."' Group By ReqArt";
                if (Herramientas::BuscarDatos($sql,$result))
                {
                    if (($result[0]['canreq']-$result[0]['canrec'])<=0)
                    {
                        $javascript="alert('La Solicitud se encuentra totalmente saldada...');";

                        $output = '[["caordcom_refsol",""],["javascript","'.$javascript.'"]]';
                        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
                        return sfView::HEADER_ONLY;
                    }else {                    
                      if (trim($this->getRequestParameter('fecord')) != "") {
                        $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                        $fecord = $dateFormat->format($this->getRequestParameter('fecord'), 'i', $dateFormat->getInputPattern('d'));
                      }
                      if (!Orden_compra::Validar_fecha_egreso($fecord, $this->getRequestParameter('refsol'))) {
                        $validacion_fec_egresos = '1';
                        $output = '[["' . $cajita . '","' . $validacion_fec_egresos . '",""]]';
                        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                        return sfView::HEADER_ONLY;
                      } else {
                        // Verifico si el ganador es un sólo proveedor
                        $sql = "select a.refsol, a.codpro, b.priori from cacotiza a inner join cadetcot b on a.refcot=b.refcot where b.priori=1 and a.refsol='" . $this->getRequestParameter('ordcom') . "'
                            group by a.refsol, a.codpro, b.priori";
                        if (Herramientas::BuscarDatos($sql, $result)) {
                          if (count($result) == 1) {
                            $codigopro = $result[0]["codpro"];
                            $despro = Herramientas::getX('codpro', 'Caprovee', 'nompro', $result[0]["codpro"]);
                            $tippro = Herramientas::getX('codpro', 'Caprovee', 'tipo', $result[0]["codpro"]);
                            $rifpro = Herramientas::getX('codpro', 'Caprovee', 'rifpro', $result[0]["codpro"]);
                            $provee = ',["caordcom_rifpro","' . $rifpro . '",""],["caordcom_nompro","' . $despro . '",""],["caordcom_tipopro","' . $tippro . '",""],["caordcom_codigoproveedor","' . $codigopro . '",""]';
                          } else {
                            $provee = '';
                            $codigopro = "";
                            $tippro = "";
                            $rifpro = "";
                          }
                        } else {
                          $provee = '';
                          $codigopro = "";
                          $tippro = "";
                          $rifpro = "";
                        }

                        $dato = Herramientas::getX('reqart', 'Casolart', 'monreq', trim($this->getRequestParameter('ordcom')));
                        $desreq = eregi_replace("[\n|\r|\n\r]", "", htmlspecialchars(Herramientas::getX('reqart', 'Casolart', 'desreq', trim($this->getRequestParameter('ordcom')))));
                        $desfin = Herramientas::getX('codfin', 'Fortipfin', 'nomext', $filas[0]->getTipfin());
                        $codcen = Herramientas::getX('reqart', 'Casolart', 'codcen', trim($this->getRequestParameter('ordcom')));
                        $tipreq = Herramientas::getX('reqart', 'Casolart', 'Tipreq', trim($this->getRequestParameter('ordcom')));
                        $descen = Herramientas::getX('codcen', 'Cadefcen', 'descen', $codcen);
                        $tipmon = Herramientas::getX('reqart', 'Casolart', 'Tipmon', trim($this->getRequestParameter('ordcom')));
                        $valmon = number_format(Herramientas::getX('reqart', 'Casolart', 'Valmon', trim($this->getRequestParameter('ordcom'))), 6, ',', '.');
                        $coddirec = Herramientas::getX('reqart', 'Casolart', 'coddirec', trim($this->getRequestParameter('ordcom')));
                        $desdirec = Herramientas::getX('coddirec', 'Cadefdirec', 'desdirec', $coddirec);
                        $coddivi= Herramientas::getX('reqart', 'Casolart', 'coddivi', trim($this->getRequestParameter('ordcom')));
                        $desdivi = Herramientas::getX('coddivi', 'Cadefdivi', 'desdivi', $coddivi);
                        $codeve = Herramientas::getX_vacio('reqart', 'Casolart', 'codeve', trim($this->getRequestParameter('ordcom')));
                        $deseve = eregi_replace("[\n|\r|\n\r]", "", htmlspecialchars(Herramientas::getX_vacio('codeve', 'Cpevepre', 'deseve', $codeve)));
                        if ($mosdatadiext=='S' && $tipmon!=$monofi)
                          $js = "$('caordcom_valmon').readOnly=true; $('moneref').value='" . $tipmon . "'; updateVarsGrida(); ActualizarSaldosGrid('a',ArrTotales_a); total_completo(); $('tab10').show(); $('datadi').show();";
                        else
                          $js = "$('caordcom_valmon').readOnly=true; $('moneref').value='" . $tipmon . "'; updateVarsGrida(); ActualizarSaldosGrid('a',ArrTotales_a); total_completo(); $('tab10').hide(); $('datadi').hide();";
                        $catbnubica=H::getConfApp2('catbnubica', 'compras', 'almsolegr');
                        if ($catbnubica=='S'){
                          $unires= Herramientas::getX_vacio('reqart', 'Casolart', 'Unires', trim($this->getRequestParameter('ordcom')));
                          $desubi = Herramientas::getX_vacio('codubi', 'Bnubica', 'desubi', $unires);
                          $js.="$('caordcom_coduni').value='" .$unires. "'; $('caordcom_desubi').value='" .$desubi. "';";
                        }

                        $js.="$('caordcom_tipord').value='" .$tipreq. "';";
                        if ($moslugent=='S'){
                          $lugar = Herramientas::getX_vacio('reqart', 'Casolart', 'lugent', trim($this->getRequestParameter('ordcom')));
                          $js.="$('caordcom_lugfec').value='" .$lugar. "';";
                        }

                        $output = '[["' . $cajtexmos . '","' . $dato . '",""],["' . $filas_orden . '","' . $numero_filas . '",""],["' . $cajita . '","' . $validacion_fec_egresos . '",""],["caordcom_desord","' . $desreq . '",""],["caordcom_tipfin","' . $filas[0]->getTipfin() . '",""],["caordcom_nomfin","' . $desfin . '",""],["caordcom_codcen","' . $codcen . '",""],["caordcom_descen","' . $descen . '",""],["caordcom_tipmon","' . $tipmon . '",""],["caordcom_valmon","' . $valmon . '",""],["caordcom_coddirec","' . $coddirec . '",""],["caordcom_desdirec","' . $desdirec . '",""],["caordcom_coddivi","' . $coddivi . '",""],["caordcom_desdivi","' . $desdivi . '",""],["caordcom_codeve","' . $codeve . '",""],["caordcom_deseve","' . $deseve . '",""],["javascript","' . $js . '",""]' . $provee . ']';
                        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                        if ($codigopro != "") {
                          $tipopro = H::getX('CODPRO', 'Caprovee', 'Tipo', $codigopro);
                          $this->configGrid($this->getRequestParameter('ordcom'), $this->getRequestParameter('referencia'), $tipopro);
                        } else {
                          $tipopro = H::getX('RIFPRO', 'Caprovee', 'Tipo', $this->getRequestParameter('rifpro'));
                          $this->setVars();
                          $this->configGrid($this->getRequestParameter('ordcom'), $this->getRequestParameter('referencia'), $tipopro);
                        }
                    }
                }
            }
          }
       }else {

        $w= new Criteria();
        $w->add(CpprecomPeer::REFPRC,$this->getRequestParameter('ordcom'));
        $trajo= CpprecomPeer::doSelectOne($w);
        if (!$trajo) {
           $javascript="alert('La Referencia : ".$this->getRequestParameter('refsol').", no tiene asociado un Precompromiso...'); $('caordcom_refsol').value=''; $('caordcom_refsol').focus();";

          $output = '[["javascript","'.$javascript.'"]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;
        }else {
           $result=array();
        $sql = "Select reqart,sum(coalesce(canreq,0)) as canreq,sum(coalesce(canord,0)) as canrec From CAArtSol Where ReqArt = '".$this->getRequestParameter('ordcom')."' Group By ReqArt";
        if (Herramientas::BuscarDatos($sql,$result))
        {
            if (($result[0]['canreq']-$result[0]['canrec'])<=0)
            {
                $javascript="alert('La Solicitud se encuentra totalmente saldada...');";

                $output = '[["caordcom_refsol",""],["javascript","'.$javascript.'"]]';
                $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
                return sfView::HEADER_ONLY;
            }else {            
              if (trim($this->getRequestParameter('fecord')) != "") {
                $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                $fecord = $dateFormat->format($this->getRequestParameter('fecord'), 'i', $dateFormat->getInputPattern('d'));
              }

              if (!Orden_compra::Validar_fecha_egreso($fecord, $this->getRequestParameter('refsol'))) {
                $validacion_fec_egresos = '1';
                $output = '[["' . $cajita . '","' . $validacion_fec_egresos . '",""]]';
                $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                return sfView::HEADER_ONLY;
              } else {
                //print 'Hola';
                // Verifico si el ganador es un sólo proveedor
                $sql = "select a.refsol, a.codpro, b.priori from cacotiza a inner join cadetcot b on a.refcot=b.refcot where b.priori=1 and a.refsol='" . $this->getRequestParameter('ordcom') . "'
                    group by a.refsol, a.codpro, b.priori";
                if (Herramientas::BuscarDatos($sql, $result)) {
                  if (count($result) == 1) {
                    $codigopro = $result[0]["codpro"];
                    $despro = Herramientas::getX('codpro', 'Caprovee', 'nompro', $result[0]["codpro"]);
                    $tippro = Herramientas::getX('codpro', 'Caprovee', 'tipo', $result[0]["codpro"]);
                    $rifpro = Herramientas::getX('codpro', 'Caprovee', 'rifpro', $result[0]["codpro"]);
                    $provee = ',["caordcom_rifpro","' . $rifpro . '",""],["caordcom_nompro","' . $despro . '",""],["caordcom_tipopro","' . $tippro . '",""],["caordcom_codigoproveedor","' . $codigopro . '",""]';
                  } else {
                    $provee = '';
                    $codigopro = "";
                    $tippro = "";
                    $rifpro = "";
                  }
                } else {
                  $provee = '';
                  $codigopro = "";
                  $tippro = "";
                  $rifpro = "";
                }

                $dato = Herramientas::getX('reqart', 'Casolart', 'monreq', trim($this->getRequestParameter('ordcom')));
                $desreq = eregi_replace("[\n|\r|\n\r]", "", htmlspecialchars(Herramientas::getX('reqart', 'Casolart', 'desreq', trim($this->getRequestParameter('ordcom')))));
                $desfin = Herramientas::getX('codfin', 'Fortipfin', 'nomext', $filas[0]->getTipfin());
                $codcen = Herramientas::getX('reqart', 'Casolart', 'codcen', trim($this->getRequestParameter('ordcom')));
                $tipreq = Herramientas::getX('reqart', 'Casolart', 'Tipreq', trim($this->getRequestParameter('ordcom')));
                $descen = Herramientas::getX('codcen', 'Cadefcen', 'descen', $codcen);
                $tipmon = Herramientas::getX('reqart', 'Casolart', 'Tipmon', trim($this->getRequestParameter('ordcom')));
                $valmon = number_format(Herramientas::getX('reqart', 'Casolart', 'Valmon', trim($this->getRequestParameter('ordcom'))), 6, ',', '.');
                 $coddirec = Herramientas::getX('reqart', 'Casolart', 'coddirec', trim($this->getRequestParameter('ordcom')));
                 $desdirec = Herramientas::getX('coddirec', 'Cadefdirec', 'desdirec', $coddirec);
                 $coddivi= Herramientas::getX('reqart', 'Casolart', 'coddivi', trim($this->getRequestParameter('ordcom')));
                 $desdivi = Herramientas::getX('coddivi', 'Cadefdivi', 'desdivi', $coddivi);
                 $codeve = Herramientas::getX_vacio('reqart', 'Casolart', 'codeve', trim($this->getRequestParameter('ordcom')));
                 $deseve = eregi_replace("[\n|\r|\n\r]", "", htmlspecialchars(Herramientas::getX_vacio('codeve', 'Cpevepre', 'deseve', $codeve)));
                 if ($mosdatadiext=='S' && $tipmon!=$monofi)
                   $js = "$('caordcom_valmon').readOnly=true; $('moneref').value='" . $tipmon . "'; updateVarsGrida(); ActualizarSaldosGrid('a',ArrTotales_a); total_completo(); $('tab10').show(); $('datadi').show();";
                 else
                   $js = "$('caordcom_valmon').readOnly=true; $('moneref').value='" . $tipmon . "'; updateVarsGrida(); ActualizarSaldosGrid('a',ArrTotales_a); total_completo(); $('tab10').hide(); $('datadi').hide();";
                $catbnubica=H::getConfApp2('catbnubica', 'compras', 'almsolegr');
                if ($catbnubica=='S'){
                  $unires= Herramientas::getX_vacio('reqart', 'Casolart', 'Unires', trim($this->getRequestParameter('ordcom')));
                  $desubi = Herramientas::getX_vacio('codubi', 'Bnubica', 'desubi', $unires);
                  $js.="$('caordcom_coduni').value='" .$unires. "'; $('caordcom_desubi').value='" .$desubi. "';";
                }

                $js.="$('caordcom_tipord').value='" .$tipreq. "';";
                if ($moslugent=='S'){
                  $lugar = Herramientas::getX_vacio('reqart', 'Casolart', 'lugent', trim($this->getRequestParameter('ordcom')));
                  $js.="$('caordcom_lugfec').value='" .$lugar. "';";
                }
                        
                $output = '[["' . $cajtexmos . '","' . $dato . '",""],["' . $filas_orden . '","' . $numero_filas . '",""],["' . $cajita . '","' . $validacion_fec_egresos . '",""],["caordcom_desord","' . $desreq . '",""],["caordcom_tipfin","' . $filas[0]->getTipfin() . '",""],["caordcom_nomfin","' . $desfin . '",""],["caordcom_codcen","' . $codcen . '",""],["caordcom_descen","' . $descen . '",""],["caordcom_tipmon","' . $tipmon . '",""],["caordcom_valmon","' . $valmon . '",""],["caordcom_coddirec","' . $coddirec . '",""],["caordcom_desdirec","' . $desdirec . '",""],["caordcom_coddivi","' . $coddivi . '",""],["caordcom_desdivi","' . $desdivi . '",""],["caordcom_codeve","' . $codeve . '",""],["caordcom_deseve","' . $deseve . '",""],["javascript","' . $js . '",""]' . $provee . ']';
                $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                if ($codigopro != "") {
                  $tipopro = H::getX('CODPRO', 'Caprovee', 'Tipo', $codigopro);
                  $this->configGrid($this->getRequestParameter('ordcom'), $this->getRequestParameter('referencia'), $tipopro);
                } else {
                  $tipopro = H::getX('RIFPRO', 'Caprovee', 'Tipo', $this->getRequestParameter('rifpro'));
                  $this->setVars();
                  $this->configGrid($this->getRequestParameter('ordcom'), $this->getRequestParameter('referencia'), $tipopro);
                }
             }
            }
        }
      }
       }
        } else {

          $javascript = "alert('La Referencia : " . $this->getRequestParameter('refsol') . ", no existe o no esta aprobado...');";

          $output = '[["javascript","' . $javascript . '"]]';
          $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
          return sfView::HEADER_ONLY;
        }
      } else {
        $this->setVars();
        $tipopro = H::getX('RIFPRO', 'Caprovee', 'Tipo', $this->getRequestParameter('rifpro'));
        $this->configGrid($this->getRequestParameter('caordcom[ordcom]'), '0', $tipopro);
      }
    }
  }

  public function executeGrid_recargos() {
    if ($this->getRequestParameter('ajax') == '1') {
      $this->setVars();
      $cajtexmos = $this->getRequestParameter('cajtexmos');
      $numfilas = $this->getRequestParameter('numfilas');
      $parcial = $this->getRequestParameter('parcial');
      $cajtexcom = $this->getRequestParameter('cajtexcom');
      $cajtexmos2 = $this->getRequestParameter('cajtexmos2');
      $codigo_provee = $this->getRequestParameter('codigo_provee');
      $refsol = $this->getRequestParameter('refsol');
      $mostrar_msg = $this->getRequestParameter('msg');
      $codconpag = $this->getRequestParameter('codconpag');
      $codforent = $this->getRequestParameter('codforent');
      $codconpag_des = $this->getRequestParameter('codconpag_des');
      $codforent_des = $this->getRequestParameter('codforent_des');
      $codconpag_result = '';
      $codforent_result = '';
      $codconpag_codigo = $this->getRequestParameter('codconpag_codigo');
      $codforent_codigo = $this->getRequestParameter('codforent_codigo');
      $cancotpril_caja = $this->getRequestParameter('cancotpril');
      $seguir = true;
      if (($refsol != '') and (trim($this->getRequestParameter('codigo')) != '')) {
        if (!Orden_compra::Verificar_proveedor($refsol, trim($this->getRequestParameter('codigo')), $rifpro, $msg, $cancotpril, $strrifpro, $srtrefcot)) {
          $mensaje = $msg;
          $rif_encontrado = $rifpro;
          $seguir = false;
        } else {
          $mensaje = '';
          $rif_encontrado = trim($this->getRequestParameter('codigo'));
        }
        if ($rif_encontrado != '') {
          $dato = CaproveePeer::getNompro(trim($rif_encontrado));
          $dato1 = CaproveePeer::getCod_provee(trim($rif_encontrado));
          $dato2 = H::getX('RIFPRO', 'Caprovee', 'Tipo', trim($rif_encontrado));
        } else {
          $dato = ''; //CaproveePeer::getNompro_vacio(trim($this->getRequestParameter('codigo')));
          $dato1 = ''; //CaproveePeer::getCod_provee(trim($this->getRequestParameter('codigo')));
          $dato2 = '';
        }
        $c = new Criteria();
        $c->add(CadisrgoPeer::REQART, $refsol);
        $filas = CadisrgoPeer::doSelect($c);
        $numero_filas = count($filas);

        $result = array();
        //en produccion	se elimino el campo   b.estpro='A' x q esta en desarrollo   y no se ha probado.. 29-07-09
        $sql = "select a.refcot as refcot,a.conpag as conpag,a.forent as forent from cacotiza a,caprovee b where b.estpro='A' and refsol='" . $refsol . "' and b.rifpro='" . $rif_encontrado . "' and a.codpro=b.codpro";
        if (Herramientas::BuscarDatos($sql, $result)) {
          $codconpag_result = $result[0]['conpag'];
          $codforent_result = $result[0]['forent'];
        }
        $codconpag_des_result = CaconpagPeer::getDesconpag(trim($codconpag_result));
        $codforent_des_result = CaforentPeer::getDesforent(trim($codforent_result));
        $output = '[["' . $cajtexcom . '","' . $rif_encontrado . '",""],["' . $cajtexmos . '","' . $dato . '",""],["' . $codigo_provee . '","' . $dato1 . '",""],["' . $mostrar_msg . '","' . $mensaje . '",""],["' . $codconpag . '","' . $codconpag_result . '",""],["' . $codforent . '","' . $codforent_result . '",""],["' . $codconpag_des . '","' . $codconpag_des_result . '",""],["' . $codforent_des . '","' . $codforent_des_result . '",""],["' . $numfilas . '","' . $numero_filas . '",""],["' . $codconpag_codigo . '","' . $codconpag_result . '",""],["' . $codforent_codigo . '","' . $codforent_result . '",""],["' . $cancotpril_caja . '","' . $cancotpril . '",""],["caordcom_tipopro","' . $dato2 . '",""]]';
      } else {
        $dato = CaproveePeer::getNompro(trim($this->getRequestParameter('codigo')));
        $dato1 = CaproveePeer::getCod_provee(trim($this->getRequestParameter('codigo')));
        $dato2 = H::getX('RIFPRO', 'Caprovee', 'Tipo', $this->getRequestParameter('codigo'));
        $output = '[["' . $cajtexmos . '","' . $dato . '",""],["' . $codigo_provee . '","' . $dato1 . '",""],["caordcom_tipopro","' . $dato2 . '",""]]';
      }

      $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
      /*     if (($refsol!='') and ($this->getRequestParameter('codigo')!='') and ($parcial=='S') and ($seguir))
        $this->configGrid_Parcial_Recargo($this->getRequestParameter('refsol'),$this->getRequestParameter('codigo'));
        else if (($refsol!='') and ($this->getRequestParameter('codigo')!='') and ($parcial=='N') and ($seguir))
        $this->configGrid_Recargos($this->getRequestParameter('refsol'),'1');
        else if (($refsol=='') and ($seguir))
        $this->configGrid_Recargos($this->getRequestParameter('refsol'),'0');
        else
        $this->configGrid_Recargos('0','0'); */
    }
    return sfView::HEADER_ONLY;
  }

  public function executeAnular() {
    $obj1 = $this->getRequestParameter('obj1');
    $c = new Criteria();
    $c->add(CaordcomPeer::ORDCOM, $obj1);
    $this->caordcom = CaordcomPeer::doSelectOne($c);
    sfView::SUCCESS;
  }

  public function executeSalvaranu() {
    $ordcom = $this->getRequestParameter('ordcom'); //0
    $fecord = $this->getRequestParameter('fecord'); //1
    $descripcion = $this->getRequestParameter('valor'); //2
    $fecanu = $this->getRequestParameter('fecha'); //3
    $fecanuvalidar = $this->getRequestParameter('fecha'); //3
    $fecserv = $this->getRequestParameter('fecserv');
    $motanu = $this->getRequestParameter('motanu');
    $fechaanula=$fecanu;

    $dateFormat = new sfDateFormat('es_VE');
    $fecord = $dateFormat->format($fecord, 'i', $dateFormat->getInputPattern('d'));
    $fecanu = $dateFormat->format($fecanu, 'i', $dateFormat->getInputPattern('d'));
    $this->msgerr = "";
    $this->btn = "";


    if ($fecserv == 'S') {
      $fecanu = date('Y-m-d');
      $fecanuvalidar = date('d/m/Y');
    }

    /*if (Tesoreria::validaPeriodoCerrado($fecanuvalidar) == true) {
      $this->msgerr = Herramientas::obtenerMensajeError('529');
      $this->btn = "S";
    } else {*/

      if (strtotime($fecanu) < strtotime($fecord)) {
        $this->msgerr = Herramientas::obtenerMensajeError('144');
        $this->btn = "S";
      } else { //fecha correcta
        $c = new Criteria();
        $c->add(CaordcomPeer::ORDCOM, $ordcom);
        $c->add(CaordcomPeer::FECORD, $fecord);
        $caordcom = CaordcomPeer::doSelectOne($c);

        if (count($caordcom) > 0) {
          $afecom=H::getX_vacio('TIPCOM','Cpdoccom','Afecom',$caordcom->getDoccom());

          if ($caordcom->getStaord() != 'N') {
          // Verificamos que el compromiso no esté aprobado para poder anular
            $desaprcom=H::getConfApp2('desaprcom', 'presupuesto', 'precompro');
            if ($desaprcom == "S" and $caordcom->getComproaprob()=="S"){
              $this->msgerr = Herramientas::obtenerMensajeError('2109');
            }else if ($afecom=='S' && (!Herramientas::validarPeriodoPresuesto($fechaanula))) {
               $this->msgerr = Herramientas::obtenerMensajeError('142');
            }else{
              Orden_compra::Salvar_anular($caordcom, $descripcion, $fecanu, $coderror);
              if ($coderror != -1)
                $this->msgerr = Herramientas::obtenerMensajeError($coderror);
              else
                $this->msgerr = Herramientas::obtenerMensajeError('158');              
            }
          }
          }else
            $this->msgerr = Herramientas::obtenerMensajeError('169');
      }//else Fecha Correcta
    //}
  }

  public function executeCombosnc() {
    if ($this->getRequestParameter('par') == '1') {
      $this->estados = $this->Cargarestados($this->getRequestParameter('pais'));
      $this->tipo = 'P';
    } elseif ($this->getRequestParameter('par') == '2') {
      $this->municipio = $this->Cargarmunicipio($this->getRequestParameter('pais'), $this->getRequestParameter('estado'));
      $this->tipo = 'E';
    } elseif ($this->getRequestParameter('par') == '3') {
      $this->parroquia = $this->Cargarparroquia($this->getRequestParameter('pais'), $this->getRequestParameter('estado'), $this->getRequestParameter('municipio'));
      $this->tipo = 'M';
    }
  }

  public function Cargarpais() {
    $tablas = array('ocpais'); //areglo de los joins de las tablas
    $filtros_tablas = array(''); //arreglo donde mando los filtros de las clases
    $filtros_variales = array(''); //arreglo donde mando los parametros de la funcion
    $campos_retornados = array('codpai', 'nompai'); // arreglos donde me traigo el nombre y el codigo
    return $pais = Herramientas::Cargarcombo($tablas, $filtros_tablas, $filtros_variales, $campos_retornados);
  }

  public function Cargarestados($codpais) {
    $tablas = array('ocestado'); //areglo de los joins de las tablas
    $filtros_tablas = array('codpai'); //arreglo donde mando los filtros de las clases
    $filtros_variales = array($codpais); //arreglo donde mando los parametros de la funcion
    $campos_retornados = array('codedo', 'nomedo'); // arreglos donde me traigo el nombre y el codigo
    return $estado = Herramientas::Cargarcombo($tablas, $filtros_tablas, $filtros_variales, $campos_retornados);
  }

  public function Cargarmunicipio($codpais, $codestado) {
    $tablas = array('ocmunici'); //areglo de los joins de las tablas
    $filtros_tablas = array('codpai', 'codedo'); //arreglo donde mando los filtros de las clases
    $filtros_variales = array($codpais, $codestado); //arreglo donde mando los parametros de la funcion
    $campos_retornados = array('codmun', 'nommun'); // arreglos donde me traigo el nombre y el codigo
    return $municipio = Herramientas::Cargarcombo($tablas, $filtros_tablas, $filtros_variales, $campos_retornados);
  }

  public function Cargarparroquia($codpais, $codestado, $codmunicipio) {
    $tablas = array('ocparroq'); //areglo de los joins de las tablas
    $filtros_tablas = array('codpai', 'codedo', 'codmun'); //arreglo donde mando los filtros de las clases
    $filtros_variales = array($codpais, $codestado, $codmunicipio); //arreglo donde mando los parametros de la funcion
    $campos_retornados = array('codpar', 'nompar'); // arreglos donde me traigo el nombre y el codigo
    return $parroquia = Herramientas::Cargarcombo($tablas, $filtros_tablas, $filtros_variales, $campos_retornados);
  }

  public function funciones_combos($pais, $estado, $municipio) {
    $this->desste = '';
    $this->pais = $this->Cargarpais();
    $this->estados = $this->Cargarestados($pais); //colocar lo q viene de bd
    $this->municipio = $this->Cargarmunicipio($pais, $estado); //colocar lo q viene de bd
    $this->parroquia = $this->Cargarparroquia($pais, $estado, $municipio); //colocar lo q viene de bd
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridRecargo($refere="", $codart="", $coduni="", $tipdoc="", $desart="") {

    $c = new Criteria();
    $c->add(CadisrgoPeer::REQART, $refere);
    $c->add(CadisrgoPeer::CODART, $codart);
    $c->add(CadisrgoPeer::CODCAT, $coduni);
    if ($desart!="") $c->add(CadisrgoPeer::DESART,trim($desart));
    $c->add(CadisrgoPeer::TIPDOC, $tipdoc);
    $c->addAscendingOrderByColumn(CadisrgoPeer::CODRGO);
    $reg = CadisrgoPeer::doSelect($c);

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(true);
    $opciones->setTabla('Cadisrgo');
    $opciones->setAncho(670);
    $opciones->setAnchoGrid(700);
    $opciones->setTitulo('Recargos');
    $opciones->setName('r');
    $opciones->setFilas(6);
    $opciones->setHTMLTotalFilas(' ');
    $opciones->setTabindex(true);
    $opciones->setTabindexstart(5000);

    $col1 = new Columna('Código Recargo');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codrgo');
    $col1->setHTML('type="text" size="15" maxlength="4" onKeypress="javascript: perderfocus(event,this.id,6);"');
    $col1->setCatalogo('carecarg', 'sf_admin_edit_form', array('codrgo' => 1, 'nomrgo' => 2, 'monrgo' => 3, 'tiprgo' => 4));
    //$col1->setJScript(' onBlur="javascript:event.keyCode=13; ajaxrecargo(event,this.id);"');
    $col1->setAjaxgrid(true);
    $col1->setAjaxadicionales(array('totartsinrec'));

    $col2 = new Columna('Descripción');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('nomrgo');
    $col2->setHTML('type="text" size="35" readonly=true');

    $col3 = new Columna('Monto  Por Recargo');
    $col3->setTipo(Columna::TEXTO);
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setNombreCampo('monrgoc');
    $col3->setEsNumerico(true);
    $col3->setOculta(true);

    $col4 = new Columna('Tipo Recargo');
    $col4->setTipo(Columna::TEXTO);
    $col4->setAlineacionContenido(Columna::CENTRO);
    $col4->setAlineacionObjeto(Columna::CENTRO);
    $col4->setNombreCampo('tiprgo');
    $col4->setOculta(true);

    $col5 = new Columna('Monto Recargo');
    $col5->setTipo(Columna::MONTO);
    $col5->setEsGrabable(true);
    $col5->setAlineacionContenido(Columna::DERECHA);
    $col5->setAlineacionObjeto(Columna::DERECHA);
    $col5->setNombreCampo('monrgo');
    $col5->setEsNumerico(true);
    $col5->setHTML('type="text" size="25"');
    if ($this->deshabmonrec == 'S') {
      $col5->setHTML('');
    } else {
      $col5->setHTML('readOnly=true; ');
    }
    $col5->setEsTotal(true, 'totrecar');

    $col6 = new Columna('Partida');
    $col6->setTipo(Columna::TEXTO);
    $col6->setAlineacionObjeto(Columna::IZQUIERDA);
    $col6->setAlineacionContenido(Columna::IZQUIERDA);
    $col6->setNombreCampo('codpar');
    $col6->setOculta(true);
    $col6->setHTML('type="text" size="35" readonly=true');


    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);

    $this->obj_recargos = $opciones->getConfig($reg);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridRecargoConsulta($refere="", $codart="", $coduni="", $tipdoc="", $desart="") {
    $c = new Criteria();
    $c->add(CadisrgoPeer::REQART, $refere);
    $c->add(CadisrgoPeer::CODART, $codart);
    if ($desart!="") $c->add(CadisrgoPeer::DESART,trim($desart));
    $c->add(CadisrgoPeer::CODCAT, $coduni);
    $c->add(CadisrgoPeer::TIPDOC, $tipdoc);
    $c->addAscendingOrderByColumn(CadisrgoPeer::CODRGO);
    $reg = CadisrgoPeer::doSelect($c);


    $opciones = new OpcionesGrid();
    $opciones->setEliminar(false);
    $opciones->setTabla('Cargosol');
    $opciones->setAncho(700);
    $opciones->setAnchoGrid(700);
    $opciones->setTitulo('Recargos');
    $opciones->setName('r');
    $opciones->setFilas(6);
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Código Recargo');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codrgo');
    $col1->setHTML('type="text" size="15" maxlength="4" readonly="true"');

    $col2 = new Columna('Descripción');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('nomrgo');
    $col2->setHTML('type="text" size="35" readonly=true');

    $col3 = new Columna('Monto  Por Recargo');
    $col3->setTipo(Columna::TEXTO);
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setNombreCampo('monrgoc');
    $col3->setEsNumerico(true);
    $col3->setOculta(true);

    $col4 = new Columna('Tipo Recargo');
    $col4->setTipo(Columna::TEXTO);
    $col4->setAlineacionContenido(Columna::CENTRO);
    $col4->setAlineacionObjeto(Columna::CENTRO);
    $col4->setNombreCampo('tiprgo');
    $col4->setOculta(true);

    $col5 = new Columna('Monto Recargo');
    $col5->setTipo(Columna::MONTO);
    $col5->setEsGrabable(true);
    $col5->setAlineacionContenido(Columna::DERECHA);
    $col5->setAlineacionObjeto(Columna::DERECHA);
    $col5->setNombreCampo('monrgo');
    $col5->setEsNumerico(true);
    $col5->setDecimal(4);
    if ($this->deshabmonrec == 'S') {
      $col5->setHTML('type="text" size="25" ');
    } else {
      $col5->setHTML('type="text" size="25" readonly="true"');
    }
    $col5->setJScript('onKeypress="entermonto_b(event,this.id);"');
    //$col5->setEsTotal(true, 'totrecar');

    $col6 = new Columna('Partida');
    $col6->setTipo(Columna::TEXTO);
    $col6->setAlineacionObjeto(Columna::IZQUIERDA);
    $col6->setAlineacionContenido(Columna::IZQUIERDA);
    $col6->setNombreCampo('codpar');
    $col6->setOculta(true);
    $col6->setHTML('type="text" size="35" readonly=true');


    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);

    $this->obj_recargos = $opciones->getConfig($reg);
  }

  public function executeRecargos() {
    $articulo = $this->getRequestParameter('articulo');
    $codunidad = $this->getRequestParameter('codunidad');
    $nuevo = $this->getRequestParameter('nuevo');
    $refsol = $this->getRequestParameter('refsol');
    $ordcom = $this->getRequestParameter('ordcom');
    $doccom = $this->getRequestParameter('tipcom');
    $claartdes=H::getConfApp2('claartdes', 'compras', 'almsolegr');
    if ($claartdes=='S')
        $desarticulo=trim($this->getRequestParameter('desarticulo'));
    else
        $desarticulo="";
    $t = new Criteria();
    $t->add(CpdoccomPeer::TIPCOM, $doccom);
    $reg = CpdoccomPeer::doSelectOne($t);
    if ($reg) {
      $refprc = $reg->getRefprc();
      $afeprc = $reg->getAfeprc();
      $afecom = $reg->getAfecom();
      $afedis = $reg->getAfedis();
    } else {
      $refprc = "";
      $afeprc = "";
      $afecom = "";
      $afedis = "";
    }
    $this->setVars();


    if ($nuevo == 'S') {
      if ($refsol != "") {
        if ($refprc == 'N' && $afeprc == 'S' && $afecom == 'S' && $afedis == 'R')
          $this->configGridRecargo($ordcom, $articulo, $codunidad, $doccom, $desarticulo);
        else
          $this->configGridRecargoConsulta($refsol, $articulo, $codunidad, $doccom, $desarticulo);
      }
      else
        $this->configGridRecargo($ordcom, $articulo, $codunidad, $doccom, $desarticulo);
    }
    else {
      $refcom = H::getX_vacio('REFCOM', 'Cpcompro', 'REFCOM', $ordcom);
      if ($refcom == '')
        $this->configGridRecargo($ordcom, $articulo, $codunidad, $doccom, $desarticulo);
      else
        $this->configGridRecargoConsulta($ordcom, $articulo, $codunidad, $doccom, $desarticulo);
    }
    $output = '[["javascript","Total_grid_recargos2()",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
  }

  public function executeCreate() {
    $c = new Criteria();
    $monedas = TsdesmonPeer::doSelectOne($c);
    if (!$monedas) {
      $this->getRequest()->setError('valida', 'Debe registrar al menos un Tipo de Moneda.');
      return $this->forward('almordcomv2', 'list');
    } else {
      $o = new Criteria();
      $o->add(OpdefempPeer::CODEMP, '001');
      $defmon = OpdefempPeer::doSelectOne($o);
      if ($defmon) {
        if ($defmon->getCodmon() == '') {
          $this->getRequest()->setError('valida', 'Debe definir en el Modulo de Tesoreria -> Empresa la Moneda Oficial.');
          return $this->forward('almordcom', 'list');
        }
      }
    }

    $d = new Criteria();
    $tipfin = FortipfinPeer::doSelectOne($d);
    if (!$tipfin) {
      $this->getRequest()->setError('valida', 'Debe definir al menos un Tipo de Finaciamiento.');
      return $this->forward('almordcomv2', 'list');
    }

    $q = new Criteria();
    $doccom = CpdoccomPeer::doSelectOne($q);
    if (!$doccom) {
      $this->getRequest()->setError('valida', 'Debe definir al menos un Tipo de Compromiso.');
      return $this->forward('almordcomv2', 'list');
    }

    $l = new Criteria();
    $provee = CaproveePeer::doSelectOne($l);
    if (!$provee) {
      $this->getRequest()->setError('valida', 'Debe definir al menos un Proveedor.');
      return $this->forward('almordcomv2', 'list');
    }

    $p = new Criteria();
    $conpag = CaconpagPeer::doSelectOne($p);
    if (!$conpag) {
      $this->getRequest()->setError('valida', 'Debe definir al menos una Condición de Pago.');
      return $this->forward('almordcomv2', 'list');
    }

    $o = new Criteria();
    $forent = CaforentPeer::doSelectOne($o);
    if (!$forent) {
      $this->getRequest()->setError('valida', 'Debe definir al menos una Forma de Entrega.');
      return $this->forward('almordcomv2', 'list');
    }


    return $this->forward('almordcomv2', 'edit');
  }

  public function executeAjaxfila() {
    $name = $this->getRequestParameter('grid', 'a');
    $grid = $this->getRequestParameter('grid' . $name, '');

    $fila = $this->getRequestParameter('fila', '');
    $columna = $this->getRequestParameter('columna', '');

    $jsonextra = '';


    switch ($name) {
      case "a":
        $this->ajaxFilaGridA($name, $fila, $columna, $grid, $jsonextra);
        break;
      case "r":
        $this->ajaxFilaGridR($name, $fila, $columna, $grid, $jsonextra);
        break;

      default:
        break;
    }

    $output = Herramientas::grid_to_json($grid, $name, $jsonextra);

    $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');

    return sfView::HEADER_ONLY;
  }

  public function executeAjaxgrid() {
    $name = $this->getRequestParameter('grid','a');
    $grid = $this->getRequestParameter('grid'.$name,'');
    $fila = $this->getRequestParameter('fila','');
    $col = $this->getRequestParameter('columna', '');    
    $javascript="";  $jsonextra="";
    $comnoiva=H::getConfApp2('comnoiva', 'compras', 'almordcom');
    switch ($name) {     
      case ('r'):
        switch ($col) {
             case ('1'):
                  if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1)) {
                    $d = new Criteria();
                    $d->add(CarecargPeer::CODRGO, $grid[$fila][$col-1]);
                    $recargosreg = CarecargPeer::doSelectOne($d);
                    if ($recargosreg) {
                      if ($comnoiva=='S')
                      {
                          $desrgo = $recargosreg->getNomrgo();
                          $grid[$fila][$col] = $desrgo;
                          $montorgotab = $recargosreg->getMonrgo();
                          $monrgo = number_format($montorgotab, 2, ',', '.');
                          $grid[$fila][$col+1] = $monrgo;
                          $tiprgo = $recargosreg->getTiprgo();
                          $grid[$fila][$col+2] = $tiprgo;
                          $reccal = SolicituddeEgresos::CalcularRecargos($tiprgo, $montorgotab, H::toFloat($this->getRequestParameter('totartsinrec'),6));
                          $reccalformat = $reccal; //number_format($reccal,2,',','.');
                          $grid[$fila][$col+3] = number_format($reccal, 4, ',', '.');
                          $codpar = $recargosreg->getCodpre();
                          $grid[$fila][$col+4] = $codpar;
                          if ($tiprgo == 'M') {//Tipo recargo puntual (monto)
                            $javascript = "$('rx_" . $fila . "_5').readOnly=false; Total_grid_recargos2();";
                            $jsonextra = ',["javascript","' . $javascript . '",""]';
                          } else {
                            $javascript = "Total_grid_recargos()";
                            $jsonextra = ',["javascript","' . $javascript . '",""]';
                          }
                      }else {
                        if ($recargosreg->getCodpre() != "") {
                          $desrgo = $recargosreg->getNomrgo();
                          $grid[$fila][$col] = $desrgo;
                          $montorgotab = $recargosreg->getMonrgo();
                          $monrgo = number_format($montorgotab, 2, ',', '.');
                          $grid[$fila][$col+1] = $monrgo;
                          $tiprgo = $recargosreg->getTiprgo();
                          $grid[$fila][$col+2] = $tiprgo;
                          $reccal = SolicituddeEgresos::CalcularRecargos($tiprgo, $montorgotab, H::toFloat($this->getRequestParameter('totartsinrec'),6));
                          $reccalformat = $reccal; 
                          $grid[$fila][$col+3] = number_format($reccal, 4, ',', '.');
                          $codpar = $recargosreg->getCodpre();
                          $grid[$fila][$col+4] = $codpar;
                          if ($tiprgo == 'M') {//Tipo recargo puntual (monto)
                            $javascript = "$('rx_" . $fila . "_5').readOnly=false; Total_grid_recargos2();";
                            $jsonextra = ',["javascript","' . $javascript . '",""]';
                          } else {
                            $javascript = "Total_grid_recargos2()"; 
                            $jsonextra = ',["javascript","' . $javascript . '",""]';
                          }
                        } else {
                            $javascript = "alert('Debe asociarle al Recargo el Código Presupuestario');";
                            $grid[$fila][$col-1]="";
                            $grid[$fila][$col]="";
                            $grid[$fila][$col+1]="";
                            $grid[$fila][$col+2]="";
                            $grid[$fila][$col+3]="";
                            $grid[$fila][$col+4]="";
                            $grid[$fila][$col+5]="";
                        }
                    }
                  }else {
                    $javascript = "alert('El Recargo no existe');";
                    $grid[$fila][$col-1]="";
                    $grid[$fila][$col]="";
                    $grid[$fila][$col+1]="";
                    $grid[$fila][$col+2]="";
                    $grid[$fila][$col+3]="";
                    $grid[$fila][$col+4]="";
                    $grid[$fila][$col+5]="";
                  }
                }else {
                  $javascript = "alert('El Recargo esta Repetido');";
                  $grid[$fila][$col-1]="";
                  $grid[$fila][$col]="";
                  $grid[$fila][$col+1]="";
                  $grid[$fila][$col+2]="";
                  $grid[$fila][$col+3]="";
                  $grid[$fila][$col+4]="";
                  $grid[$fila][$col+5]="";
                }
                $jsonextra = ',["javascript","' . $javascript . '",""]';
              break;            
            default:
              break;
           }
          break;
        default:
          break;            
      }

    $output = Herramientas::grid_to_json($grid,$name,$jsonextra);
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::HEADER_ONLY;

    }

  private function ajaxFilaGridR($name, $fila, $columna, &$grid, &$jsonextra='') {

    $g = $grid[$fila];
    $comnoiva=H::getConfApp2('comnoiva', 'compras', 'almordcom');
    //Calcular Recargos
    if (!Hacienda::Repetido($grid,$grid[$fila][$columna-1],$fila,$columna-1)) {
      $d = new Criteria();
      $d->add(CarecargPeer::CODRGO, $g[0]);
      $recargosreg = CarecargPeer::doSelectOne($d);
      if ($recargosreg) {
        if ($comnoiva=='S')
        {
            $desrgo = $recargosreg->getNomrgo();
            $g[1] = $desrgo;
            $montorgotab = $recargosreg->getMonrgo();
            $monrgo = number_format($montorgotab, 2, ',', '.');
            $g[2] = $monrgo;
            $tiprgo = $recargosreg->getTiprgo();
            $g[3] = $tiprgo;
            $reccal = SolicituddeEgresos::CalcularRecargos($tiprgo, $montorgotab, H::toFloat($this->getRequestParameter('totartsinrec'),6));
            $reccalformat = $reccal; //number_format($reccal,2,',','.');
            $g[4] = number_format($reccal, 4, ',', '.');
            $codpar = $recargosreg->getCodpre();
            $g[5] = $codpar;
            if ($tiprgo == 'M') {//Tipo recargo puntual (monto)
              $javascript = "$('rx_" . $fila . "_5').readOnly=false; Total_grid_recargos2();";
              $jsonextra = ',["javascript","' . $javascript . '",""]';
            } else {
              $javascript = "Total_grid_recargos()";//"ActualizarSaldosGrid('r',ArrTotales_r);";
              $jsonextra = ',["javascript","' . $javascript . '",""]';
            }
        }else {
          if ($recargosreg->getCodpre() != "") {
            $desrgo = $recargosreg->getNomrgo();
            $g[1] = $desrgo;
            $montorgotab = $recargosreg->getMonrgo();
            $monrgo = number_format($montorgotab, 2, ',', '.');
            $g[2] = $monrgo;
            $tiprgo = $recargosreg->getTiprgo();
            $g[3] = $tiprgo;
            $reccal = SolicituddeEgresos::CalcularRecargos($tiprgo, $montorgotab, H::toFloat($this->getRequestParameter('totartsinrec'),6));
            $reccalformat = $reccal; //number_format($reccal,2,',','.');
            $g[4] = number_format($reccal, 4, ',', '.');
            $codpar = $recargosreg->getCodpre();
            $g[5] = $codpar;
            if ($tiprgo == 'M') {//Tipo recargo puntual (monto)
              //$javascript = "$('rx_" . $fila . "_5').readOnly=false; ActualizarSaldosGrid('r',ArrTotales_r);";
              $javascript = "$('rx_" . $fila . "_5').readOnly=false; Total_grid_recargos2();";
              $jsonextra = ',["javascript","' . $javascript . '",""]';
            } else {
              $javascript = "Total_grid_recargos2()"; //"ActualizarSaldosGrid('r',ArrTotales_r);";
              $jsonextra = ',["javascript","' . $javascript . '",""]';
            }
          } else {
            $this->limpiarFilaGridR($g);
            $javascript = "alert('Debe asociarle al Recargo el Código Presupuestario');";
            $jsonextra = ',["javascript","' . $javascript . '",""]';
          }
      }
    } else {
        $this->limpiarFilaGridR($g);
        $javascript = "alert('El Recargo no existe');";
        $jsonextra = ',["javascript","' . $javascript . '",""]';
    }
  }else {
        $this->limpiarFilaGridR($g);
        $javascript = "alert('El Recargo esta Repetido');";
        $jsonextra = ',["javascript","' . $javascript . '",""]';
    }

    $grid[$fila] = $g;
  }

  private function ajaxFilaGridA($name, $fila, $columna, &$grid, &$jsonextra='') {
    $g = $grid[$fila];

    // Se verifica en base a la columna que ejecuto el ajax que se debe validar
    if ($columna == '2' || $columna == '4' || $columna == '16') {

      // Verificación del codigo del artículo  (Ajax 3)
      if ($g[1] != '' && $columna != '16' && $columna != '4') {
        $tipord = $this->getRequestParameter('caordcom_tipord');
        $codirec = $this->getRequestParameter('caordcom_coddirec');
        $filartreg=H::getConfApp2('filartreg', 'compras', 'almsolegr');
        $manconstruc=H::getConfApp2('manconstruc', 'compras', 'almregart');
        $longitudart = strlen(Herramientas::getMascaraArticulo());
        //print $tipord;
        $c = new Criteria();
        $c->add(CaregartPeer::CODART, $g[1]);
        if ($tipord == 'S' || $tipord == 'A')
          $c->add(CaregartPeer::TIPO, $this->getRequestParameter('caordcom_tipord'));
        if ($filartreg=='S'){
          $escentral=H::getX_vacio('CODDIREC','Cadefdirec','Escentral',$codirec);
          if ($escentral)
            $c->add(CaregartPeer::CLAART,'C');
          else
            $c->add(CaregartPeer::CLAART,'R');
        }
        if ($manconstruc=='S'){
          $sql= " (consbue is null or consbue=false)";
          $c->add(CaregartPeer :: CONSBUE, $sql, Criteria :: CUSTOM);
        }
        $reg = CaregartPeer::doSelectOne($c);
        if ($reg) {
          if ($longitudart == strlen($g[1])) {
            $g[2] = eregi_replace("[\n|\r|\n\r]", "", htmlspecialchars($reg->getDesart()));   // Descripcion Articulo
            $g[13] = $reg->getUnimed();                                     // Unidad de Medida
            $g[8] = number_format($reg->getCosult(), 6, ',', '.');          // Costo
            $g[15] = $reg->getCodpar();     
            $manunialt=H::getConfApp2('manunialt','compras','almregart');
            $idfila=$name."x_".$fila."_".$columna;
            if ($manunialt=='S'){
              $javascript = "CargarUnidades('$idfila');";
              $jsonextra = ',["javascript","' . $javascript . '",""]';
            }
            
          } else {
            $this->limpiarFilaGridA($g);
            $javascript = "alert('El Codigo del Articulo no es de Ultimo Nivel');";
            $jsonextra = ',["javascript","' . $javascript . '",""]';
          }
        } else {
          $this->limpiarFilaGridA($g);
          $javascript = "alert('Articulo no existe, o no es un Articulo/Servicio');";
          $jsonextra = ',["javascript","' . $javascript . '",""]';
        }
      }

      // Verificación del código presupuestario (Ajax 12)
      if ($g[1] != '' && $g[3] != '') {
        if ($g[15] == '') {
          $javascript = "alert('El artículo no tiene partida asociada');";
          $jsonextra = ',["javascript","' . $javascript . '",""]';
        } else {
          $dato = CpasiiniPeer::getExiste_pre(trim($g[3] . '-' . $g[15]));
          if ($dato == '') {
            // TODO: limpiar campos

            $javascript = "alert('El Código Presupuestario " . $g[3] . '-' . $g[15] . " no Existe');";
            $jsonextra = ',["javascript","' . $javascript . '",""]';
            $g[3]='';
          } else {
            $finpre=H::getConfApp2('finpre', 'compras', 'almsolegr');
            if ($fila==0 && $finpre=='S'){
              $q= new Criteria();
              $q->add(CpdisfuefinPeer::CODPRE,$g[3] . '-' . $g[15]);
              $q->add(CpdisfuefinPeer::ORIGEN,'INICIAL');
              $reg= CpdisfuefinPeer::doSelectOne($q);
              if ($reg)
              {
                 $g[14] = $g[3] . '-' . $g[15];
                 $dato=$reg->getFuefin();     
                 $desc=H::getX_vacio('Codfin','Fortipfin','Nomext',$dato);  
                 $jsonextra = ',["caordcom_tipfin","'.$dato.'",""],["caordcom_nomfin","'.$desc.'",""]';        
              }else{
                $g[14] = '';
                $g[3]='';
                $javascript="alert_('El Código Presupuestario " . $g[3] . '-' . $g[15] . " no tiene Fuente de Financiamiento Asociada');";
                $jsonextra = ',["javascript","'.$javascript.'",""]';
              }
            }else
               $g[14] = $g[3] . '-' . $g[15];               
            
          }
        }
      }
    }

    if ($columna == '5' || $columna == '9' || $columna == '11' || $columna == '14') {
      $refsol = $this->getRequestParameter('caordcom_refsol');
      $manunialt=H::getConfApp2('manunialt','compras','almregart');
      if ($columna=='14' && $manunialt=='S' && $refsol==''){
        $q= new Criteria();
        $q->add(CaunialartPeer::CODART,$g[1]);
        $q->add(CaunialartPeer::UNIALT,$g[13]);
        $reg= CaunialartPeer::doSelectOne($q);
        if ($reg){
          $g[8]=H::FormatoMonto($reg->getCosuni(),6);
        }
      }
      if ($columna=='5' && $refsol!='' && H::toFloat($g[4])>H::toFloat($g[24])){
            $g[4]=0;  $g[9]='0,00'; $g[12]='0,000000';
            $javascript = "alert('La Cantidad a Ordenar es mayor a la requerida');";
            $jsonextra = ',["javascript","' . $javascript . '",""]';          
      }else {
      $cantxcost = H::toFloat(H::toFloat($g[4]) * H::toFloat($g[8],6), 6);
      $g[9] = H::FormatoMonto($cantxcost,6);
      $totalgeneral = $cantxcost - H::toFloat($g[10]) + H::toFloat($g[11]);
      $g[12] = H::FormatoMonto($totalgeneral,6);
      $fecha = $this->getRequestParameter('caordcom_fecord');
      $fecha = explode('/', $fecha);

      if ($totalgeneral > 0.0 && $g[14] != '' && $refsol=='') {
        $info = $this->disponibilidad(H::getCodPreDis($g[14]), $totalgeneral, $fecha[2],$mondis,$this->getRequestParameter('caordcom_valmon','1'),$fecha[1]);
        if ($info != '') {
          $g[4]=0;  $g[9]='0,00'; $g[12]='0,000000';
          $javascript = "alert('$info');";
          $jsonextra = ',["javascript","' . $javascript . '",""]';
        }else {
          $idfila=$name."x_".$fila."_".$columna;
            $javascript="recalcularecargos2('$idfila'); ";
            $jsonextra = ',["javascript","' . $javascript . '",""]';
        }
      }
    }
      $g[4] = H::FormatoMonto(H::toFloat($g[4]));
      $g[8] = H::FormatoMonto(H::toFloat($g[8],6),6);
      $g[10] = H::FormatoMonto(H::toFloat($g[10]));
    }

    if ($columna == '15') {
      $fecha = $this->getRequestParameter('caordcom_fecord');
      $fecha = explode('/', $fecha);
      $totalgeneral = H::toFloat($g[12],6);
      if ($totalgeneral > 0.0 && $g[14] != '' && $refsol=='') {
        $info = $this->disponibilidad(H::getCodPreDis($g[14]), $totalgeneral, $fecha[2], $mondis,$this->getRequestParameter('caordcom_valmon','1'), $fecha[1]);
        if ($info != '') {
          $javascript = "alert('$info');";
          $jsonextra = ',["javascript","' . $javascript . '",""]';
        }
        $g[21] = H::FormatoMonto($mondis);
      }
    }


    $grid[$fila] = $g;
  }

  private function disponibilidad($codigo, $monto, $ano, &$mondis,$difcam=1,$mes) {

    // Ajax 13
    $result = array();
    $monto = Herramientas::tofloat($monto);
    $monto = $monto*H::toFloat($difcam,6);
    //Print $codigo;
    $sql = "Select mondis from CPAsiIni WHERE CodPre like '" . $codigo . "%' AND PERPRE = '00' and AnoPre='" . $ano . "'";    
    if (Herramientas::BuscarDatos($sql, $result)) {
      H::Monto_disponible_ejecucion($ano,$codigo,$mes,$mondis);
      if (H::toFloat($monto) > H::toFloat($mondis)) {
        return "El C&oacute;digo " . $codigo . " no tiene disponibilidad. Solo Dispone de: ".H::FormatoMonto($mondis)." Bs.";
      }else
        return '';
    } else {
      return "El C&oacute;digo Presupuestario " . $codigo . " no existe";
    }
  }

  private function limpiarFilaGridA(&$g) {
    $g[1] = "";
    $g[2] = "";
    $g[13] = "";
    $g[8] = "";
    $g[15] = "";
  }

  private function limpiarFilaGridR(&$g) {
    $g[0] = "";
    $g[1] = "";
    $g[2] = "0,00";
    $g[3] = "";
    $g[4] = "";
    $g[5] = "";
  }

  public function executeResumen() {

    $grida = $this->getRequestParameter('grida', '');
    $gridr = $this->getRequestParameter('gridr', array());

    $resumen = $this->generarResumen($grida, $gridr);

    $this->configGrid_Resumen('', $resumen);
  }

  public function executeEntregas() {

    $grida = $this->getRequestParameter('grida', '');
    $gridc = $this->getRequestParameter('gridc', array());

    $entregas = $this->generarEntregas($grida, $gridc);

    $this->configGrid_Entregas('', $entregas);
  }

  public function executeResumenpartidas() {

    $grida = $this->getRequestParameter('grida', '');

    $resumenpartidas = $this->generarResumenPartidas($grida);

    $this->configGrid_ResumenPartidas('', $resumenpartidas);
  }

  public function executeDespachos() {

    $grida = $this->getRequestParameter('grida', '');

    $despachos = $this->generarDespachos($grida);

    $this->configGrid_ResumenPartidas('', $despachos);
  }

  public function generarResumen($grida, $gridr) {

    $articulos = array();
    $claartdes=H::getConfApp2('claartdes', 'compras', 'almsolegr');


    foreach ($grida as $cicloA) {
      $encontrado = false;

      foreach ($articulos as $i => $cicloR) {
        if ($claartdes=='S'){
          if ($cicloA[1] != '' && $cicloA[1] == $cicloR[0] && $cicloA[2] == $cicloR[1] && $cicloA[3] == $cicloR[2]) {
            $encontrado = true;
            $indice = $i;
          }
        }else {
          if ($cicloA[1] != '' && $cicloA[1] == $cicloR[0] && $cicloA[3] == $cicloR[2]) {
            $encontrado = true;
            $indice = $i;
          }
        }
      }

      if (!$encontrado) {
        if ($cicloA[1] != '' && H::toFloat($cicloA[4])>0)
          $articulos[] = array($cicloA[1], $cicloA[2], $cicloA[3], H::toFloat($cicloA[4]), H::toFloat($cicloA[5]), H::toFloat($cicloA[6]), H::toFloat($cicloA[7]), H::toFloat($cicloA[8],6), H::toFloat($cicloA[11],4), H::toFloat($cicloA[12],6));
      }else {
        $articulos[$indice][3] += $cicloA[4];
        $articulos[$indice][4] += $cicloA[5];
        $articulos[$indice][5] += $cicloA[6];
        $articulos[$indice][6] += $cicloA[7];
        $articulos[$indice][7] += $cicloA[8];
        $articulos[$indice][8] += $cicloA[11];
        $articulos[$indice][9] += $cicloA[12];
      }
    }

    foreach ($articulos as $art) {

      foreach ($gridr as $res) {
        if ($art[0] == $res[0]) {
          $art[1] == $res[1];
          break;
        }
      }
    }


    return $articulos;
  }

  public function generarEntregas($grida, $gridc) {

    $articulos = array();
    $claartdes=H::getConfApp2('claartdes', 'compras', 'almsolegr');


    foreach ($grida as $cicloA) {
      $encontrado = false;

      foreach ($articulos as $i => $cicloR) {
        if ($claartdes=='S')
        {
          if ($cicloA[1] != '' && $cicloA[1] == $cicloR[0] && $cicloA[2] == $cicloR[1]) {
            $encontrado = true;
            $indice = $i;
          }
        }else {
          if ($cicloA[1] != '' && $cicloA[1] == $cicloR[0]) {
            $encontrado = true;
            $indice = $i;
          }
        }
      }

      if (!$encontrado) {
        if ($cicloA[1] != '' && H::toFloat($cicloA[4])>0)
          $articulos[] = array($cicloA[1], $cicloA[2], H::toFloat($cicloA[4]), date('Y-m-d'));
      }else {
        $articulos[$indice][2] += $cicloA[4];
      }
    }

    foreach ($articulos as $art) {

      foreach ($gridc as $ent) {
        if ($art[0] == $ent[0]) {
          $art[3] == $ent[3];
          break;
        }
      }
    }

    return $articulos;
  }

  public function generarResumenPartidas($grida) {

    $articulos = array();

    foreach ($grida as $cicloA) {
      $encontrado = false;

      foreach ($articulos as $i => $cicloR) {

        if ($cicloA[15] != '' && $cicloA[15] == $cicloR['codpar']) {
          $encontrado = true;
          $indice = $i;
        }
      }

      if (!$encontrado) {
        if ($cicloA[15] != '')
          $articulos[] = array('id' => '9', 'codpar' => $cicloA[15], 'totart' => (H::toFloat($cicloA[9],6) - H::toFloat($cicloA[10])), 'totarti' => H::toFloat($cicloA[11],6), 'recargo' => 'N');
      }else {
        $articulos[$indice]['totart'] += ( H::toFloat($cicloA[9],6) - H::toFloat($cicloA[10]));
        $articulos[$indice]['totarti'] += H::toFloat($cicloA[11],6);
      }
    }


    foreach ($grida as $cicloA) { //Recargos
      $encontrado = false;

      $auxrec = explode('!', $cicloA[17]);
      $q=0;
      while ($q<(count($auxrec)-1)){

        $recarg = explode('_', $auxrec[$q]);
        //if (count($recarg) > 1)
          //$recarg[5] = substr($recarg[5], 0, -1);

        foreach ($articulos as $i => $cicloR) {

          if (count($recarg) > 1) {
            if ($recarg[5] != '' && $recarg[5] == $cicloR['codpar']) {
              $encontrado = true;
              $indice = $i;
            }
          }
        }


        if (!$encontrado) {
          if (count($recarg) > 1)
            if ($recarg[5] != '')
              $articulos[] = array('id' => '9', 'codpar' => $recarg[5], 'totart' => H::toFloat($recarg[4],4), 'totarti' => H::toFloat($recarg[4],4), 'recargo' => 'S');
        }else {
          $articulos[$indice]['totart'] += H::toFloat($recarg[4],4);
          $articulos[$indice]['totarti'] += H::toFloat($recarg[4],4);
          $articulos[$indice]['recargo'] = 'S';       
        }
      $q++;
     }
    }
    $i=0;
    while ($i<count($articulos))
    {
      if ($articulos[$i]["recargo"]=='N') {
        $articulos[$i]["totart"]=H::FormatoMonto($articulos[$i]["totart"],6);
        $articulos[$i]["totarti"]=H::FormatoMonto($articulos[$i]["totarti"],6);
      }else {
        $articulos[$i]["totart"]=H::FormatoMonto($articulos[$i]["totart"],4);
        $articulos[$i]["totarti"]=H::FormatoMonto($articulos[$i]["totarti"],4);
      }
      $i++;
    }   

    //H::PrintR($articulos); exit;

    return $articulos;
  }

  public function generarDespachos($grida) {

    $articulos = array();

    foreach ($grida as $cicloA) {
      $encontrado = false;

      foreach ($articulos as $i => $cicloR) {

        if ($cicloA[1] != '' && $cicloA[1] == $cicloR[0]) {
          $encontrado = true;
          $indice = $i;
        }
      }

      if (!$encontrado) {
        if ($cicloA[1] != '')
          $articulos[] = array($cicloA[1], $cicloA[2], H::toFloat($cicloA[4]), date('Y-m-d'));
      }else {
        $articulos[$indice][2] += $cicloA[4];
      }
    }

    return $articulos;
  }

  private function verificarResumenes(&$arreglo_arreglo, &$arreglo_objetos) {

    $grid_detalle_orden_arreglos = $arreglo_arreglo[0][0];
    $grid_detalle_resumen_arreglos = $arreglo_arreglo[1][0];
    $grid_detalle_entrega_arreglos = array();
    $claartdes=H::getConfApp2('claartdes', 'compras', 'almsolegr');


    $grid_detalle_resumen_objetos = $arreglo_objetos[0][0];
    $grid_detalle_entrega_objetos = $arreglo_objetos[1][0];
    $grid_detalle_formas_entrega = $arreglo_objetos[2][0];

    // Verifico que el resumen este completo
    // Se blaquean las cantidades para recalcularlas
    foreach ($grid_detalle_resumen_objetos as $cicloR1) {
      $cicloR1->setCanord(0);
      $cicloR1->setCanaju(0);
      $cicloR1->setCanrec(0);
      $cicloR1->setCantot(0);
      $cicloR1->setCosto(0);
      $cicloR1->setRgoart(0);
      $cicloR1->setTotart(0);
    }

    foreach ($grid_detalle_entrega_objetos as $cicloR) {
      $cicloR->setCanart(0);
    }


    foreach ($grid_detalle_orden_arreglos as $cicloA) {
      $encontrado = false;

      foreach ($grid_detalle_resumen_objetos as $i => $cicloR1) {
        if ($claartdes=='S')
        {
          if ($cicloA['codart'] != '' && $cicloA['codart'] == $cicloR1->getCodart() && $cicloA['desart'] == $cicloR1->getDesres() && $cicloA['codcat'] == $cicloR1->getCodartpro()) {
            $encontrado = true;
            $indice = $i;
          }
        }else {
          if ($cicloA['codart'] != '' && $cicloA['codart'] == $cicloR1->getCodart() && $cicloA['codcat'] == $cicloR1->getCodartpro()) {
            $encontrado = true;
            $indice = $i;
          }
        }
      }

      if (!$encontrado) {
        if ($cicloA['codart'] != '') {

          $caresordcom = new Caresordcom();
          $caresordcom->setCodart($cicloA['codart']);
          $caresordcom->setDesres($cicloA['desart']);
          $caresordcom->setCodartpro($cicloA['codcat']);
          $caresordcom->setCanord(isset($cicloA['canord']) ? $cicloA['canord'] : $cicloA['canord2']);
          $caresordcom->setCanaju($cicloA['canaju']);
          $caresordcom->setCanrec($cicloA['canrec']);
          $caresordcom->setCantot($cicloA['cantot']);
          $caresordcom->setCosto(isset($cicloA['costo']) ? $cicloA['costo'] : $cicloA['preart']);
          $caresordcom->setRgoart(isset($cicloA['rgoart']) ? $cicloA['rgoart'] : $cicloA['monrgo']);
          $caresordcom->setTotart(isset($cicloA['totart']) ? $cicloA['totart'] : $cicloA['montot']);
          if ($caresordcom->getCanord()>0) {
            $grid_detalle_resumen_objetos[] = $caresordcom;
            $grid_detalle_resumen_arreglos[] = $caresordcom->toArray(BasePeer::TYPE_FIELDNAME);            
          }
        }
      } /*else {
        $grid_detalle_resumen_objetos[$indice]->setCanord($grid_detalle_resumen_objetos[$indice]->getCanord() + (isset($cicloA['canord']) ? $cicloA['canord'] : $cicloA['canord2']));
        $grid_detalle_resumen_objetos[$indice]->setCanaju($grid_detalle_resumen_objetos[$indice]->getCanaju() + $cicloA['canaju']);
        $grid_detalle_resumen_objetos[$indice]->setCanrec($grid_detalle_resumen_objetos[$indice]->getCanrec() + $cicloA['canrec']);
        $grid_detalle_resumen_objetos[$indice]->setCantot($grid_detalle_resumen_objetos[$indice]->getCantot() + $cicloA['cantot']);
        $grid_detalle_resumen_objetos[$indice]->setCosto($grid_detalle_resumen_objetos[$indice]->getCosto() + $cicloA['preart']);
        $grid_detalle_resumen_objetos[$indice]->setRgoart($grid_detalle_resumen_objetos[$indice]->getRgoart() + $cicloA['rgoart']);
        $grid_detalle_resumen_objetos[$indice]->setTotart($grid_detalle_resumen_objetos[$indice]->getTotart() + $cicloA['totart']);
        if ($grid_detalle_resumen_objetos[$indice]->getCanord()>0)
          $grid_detalle_resumen_arreglos[] = $grid_detalle_resumen_objetos[$indice]->toArray(BasePeer::TYPE_FIELDNAME);
      }*/
    }

    // Verifico que las entregas esten completas

    foreach ($grid_detalle_orden_arreglos as $cicloA) {
      $encontrado = false;

      foreach ($grid_detalle_entrega_objetos as $i => $cicloR) {
        if ($claartdes=='S')
        {
          if ($cicloA['codart'] != '' && $cicloA['codart'] == $cicloR->getCodart() && $cicloA['desart'] == $cicloR->getDesart()) {
            $encontrado = true;
            $indice = $i;
          }
        }else {
          if ($cicloA['codart'] != '' && $cicloA['codart'] == $cicloR->getCodart()) {
            $encontrado = true;
            $indice = $i;
          }
        }
      }

      if (!$encontrado) {
        if ($cicloA['codart'] != '') {

          $caartfec = new Caartfec();

          $caartfec->setCodart($cicloA['codart']);
          $caartfec->setDesart($cicloA['desart']);
          $caartfec->setCanart(isset($cicloA['canord']) ? $cicloA['canord'] : $cicloA['canord2']);
          $caartfec->setFecent(date('Y-m-d'));
          if ($caartfec->getCanart()>0) {
            $grid_detalle_entrega_objetos[] = $caartfec;
            $grid_detalle_entrega_arreglos[] = $caartfec->toArray(BasePeer::TYPE_FIELDNAME);
          }
        }
      } else {
        $grid_detalle_entrega_objetos[$indice]->setCanart($grid_detalle_entrega_objetos[$indice]->getCanart() + (isset($cicloA['canord']) ? $cicloA['canord'] : $cicloA['canord2']));
        if ($grid_detalle_entrega_objetos[$indice]->getCanart()>0)
          $grid_detalle_entrega_arreglos[] = $grid_detalle_entrega_objetos[$indice]->toArray(BasePeer::TYPE_FIELDNAME);
      }
    }

    $arreglo_arreglo[1][0] = $grid_detalle_resumen_arreglos;
    $arreglo_arreglo[2][0] = $grid_detalle_entrega_arreglos;

    $arreglo_objetos[0][0] = $grid_detalle_resumen_objetos;
    $arreglo_objetos[1][0] = $grid_detalle_entrega_objetos;
  }

  public function executeEntrepda() {

    $grida = $this->getRequestParameter('grida', '');
    $gridp = $this->getRequestParameter('gridp', array());
    $proveedor = $this->getRequestParameter('proveedor', '');

    $entregaspda = $this->generarEntregasPDA($grida, $gridp, $proveedor);

    $this->configGrid_EntregasPDA('', $entregaspda);
  }

  public function generarEntregasPDA($grida, $gridp, $proveedor) {

    $articulos = array();


    foreach ($grida as $cicloA) {
      $encontrado = false;

      foreach ($articulos as $i => $cicloR) {

        if ($cicloA[1] != '' && $cicloA[1] == $cicloR[0]) {
          $encontrado = true;
          $indice = $i;
        }
      }

      if (!$encontrado) {
        if ($cicloA[1] != '')
          $articulos[] = array($cicloA[1], $cicloA[2], H::toFloat($cicloA[4]), date('Y-m-d'), 'P', H::getX_vacio('Rifpro', 'Caprovee', 'Dirpro', $proveedor), H::toFloat($cicloA[4]),'');
      }else {
        $articulos[$indice][2] += $cicloA[4];
      }
    }

    foreach ($articulos as $art) {

      foreach ($gridp as $ent) {
        if ($art[0] == $ent[0]) {
          $art[3] == $ent[3];
          break;
        }
      }
    }

    return $articulos;
  }

  public function getLabels()
  {
    $labels = parent::getLabels();
    $etidec1=H::getConfApp2('etidec1', 'compras', 'almordcom');
    $etidec2=H::getConfApp2('etidec2', 'compras', 'almordcom');
    $ocullic=H::getConfApp2('ocullic', 'compras', 'almordcom');
    if ($etidec1!='')
      $labels['caordcom{aplart}'] = 'Artículo -';
    if ($etidec2!='')
      $labels['caordcom{aplart6}'] = 'Artículo -';
    if ($ocullic=='S')
      $labels['caordcom{tipo}'] = 'Modalidad de Contratación';

    $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
    if ($cambiareti=='S')
      $labels['caordcom{coddirec}'] = 'Estado';
    return $labels;
  }

  protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['ordcom_is_empty']))
    {
      $criterion = $c->getNewCriterion(CaordcomPeer::ORDCOM, '');
      $criterion->addOr($c->getNewCriterion(CaordcomPeer::ORDCOM, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['ordcom']) && $this->filters['ordcom'] !== '')
    {
      $c->add(CaordcomPeer::ORDCOM, '%'.strtr($this->filters['ordcom'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['refsol_is_empty']))
    {
      $criterion = $c->getNewCriterion(CaordcomPeer::REFSOL, '');
      $criterion->addOr($c->getNewCriterion(CaordcomPeer::REFSOL, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['refsol']) && $this->filters['refsol'] !== '')
    {
      $c->add(CaordcomPeer::REFSOL, '%'.strtr($this->filters['refsol'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['desord_is_empty']))
    {
      $criterion = $c->getNewCriterion(CaordcomPeer::DESORD, '');
      $criterion->addOr($c->getNewCriterion(CaordcomPeer::DESORD, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['desord']) && $this->filters['desord'] !== '')
    {
      $c->add(CaordcomPeer::DESORD, '%'.strtr($this->filters['desord'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['fecord_is_empty']))
    {
      $criterion = $c->getNewCriterion(CaordcomPeer::FECORD, '');
      $criterion->addOr($c->getNewCriterion(CaordcomPeer::FECORD, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['fecord']))
    {
      if (isset($this->filters['fecord']['from']) && $this->filters['fecord']['from'] !== '')
      {
        $criterion = $c->getNewCriterion(CaordcomPeer::FECORD, date('Y-m-d', $this->filters['fecord']['from']), Criteria::GREATER_EQUAL);
      }
      if (isset($this->filters['fecord']['to']) && $this->filters['fecord']['to'] !== '')
      {
        if (isset($criterion))
        {
          $criterion->addAnd($c->getNewCriterion(CaordcomPeer::FECORD, date('Y-m-d', $this->filters['fecord']['to']), Criteria::LESS_EQUAL));
        }
        else
        {
          $criterion = $c->getNewCriterion(CaordcomPeer::FECORD, date('Y-m-d', $this->filters['fecord']['to']), Criteria::LESS_EQUAL);
        }
      }

      if (isset($criterion))
      {
        $c->add($criterion);
      }
    }
    if (isset($this->filters['staord_is_empty']))
    {
      $criterion = $c->getNewCriterion(CaordcomPeer::STAORD, '');
      $criterion->addOr($c->getNewCriterion(CaordcomPeer::STAORD, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['staord']) && $this->filters['staord'] !== '')
    {
      $c->add(CaordcomPeer::STAORD, '%'.strtr($this->filters['staord'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['codpro_is_empty']))
    {
      $criterion = $c->getNewCriterion(CaordcomPeer::CODPRO, '');
      $criterion->addOr($c->getNewCriterion(CaordcomPeer::CODPRO, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codpro']) && $this->filters['codpro'] !== '')
    {
      $c->add(CaordcomPeer::CODPRO, '%'.strtr($this->filters['codpro'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['nompro_is_empty']))
    {
      $criterion = $c->getNewCriterion(CaordcomPeer::NOMPRO, '');
      $criterion->addOr($c->getNewCriterion(CaordcomPeer::NOMPRO, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nompro']) && $this->filters['nompro'] !== '')
    {
      $c->add(CaproveePeer::NOMPRO, strtr("%".$this->filters['nompro']."%", '*', '%'), Criteria::LIKE);
      $c->addJoin(CaordcomPeer::CODPRO, CaproveePeer::CODPRO);
      $c->setIgnoreCase(true);
    }
    if (isset($this->filters['codcen_is_empty']))
    {
      $criterion = $c->getNewCriterion(CaordcomPeer::CODCEN, '');
      $criterion->addOr($c->getNewCriterion(CaordcomPeer::CODCEN, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codcen']) && $this->filters['codcen'] !== '')
    {
      $c->add(CaordcomPeer::CODCEN, '%'.strtr($this->filters['codcen'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
  }

}