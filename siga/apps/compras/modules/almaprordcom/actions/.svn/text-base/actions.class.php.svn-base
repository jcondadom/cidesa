<?php

/**
 * almaprordcom actions.
 *
 * @package    siga
 * @subpackage almaprordcom
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class almaprordcomActions extends autoalmaprordcomActions
{

  public function executeIndex()
  {
    return $this->forward('almaprordcom', 'edit');
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
     $this->configGrid();
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($ordcom1='', $ordcom2='', $fec1='', $fec2='')
  {
    $reg=array();
    $cade="";
    if ($ordcom1!='' && $ordcom2!='')    
      $cade=" and caordcom.ordcom>='".$ordcom1."' and  caordcom.ordcom<='".$ordcom2."' ";
    
    if ($fec1!='' && $fec2!='')    
      $cade.=" and caordcom.fecord>='".$fec1."' and  caordcom.fecord<='".$fec2."' ";

  if (($ordcom1!='' && $ordcom2!='') || ($fec1!='' && $fec2!='')) {
    $c = new Criteria();
    $sql = "caordcom.STAORD='A' ".$cade." and caordcom.staver='S' and caordcom.ordcom not in (select refcom from cpcompro)";
    $c->add(CaordcomPeer::ORDCOM, $sql, Criteria :: CUSTOM);
    $c->addAscendingOrderByColumn(CaordcomPeer::ORDCOM);
    $c->addAscendingOrderByColumn(CaordcomPeer::FECORD);
    $reg = CaordcomPeer::doSelect($c);
  }

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/almaprordcom/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
    
    $this->obj =$this->columnas[0]->getConfig($reg);

    $this->caordcom->setObj($this->obj);
  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $js=""; $dato=""; $sw=true;

    switch ($ajax){
      case '1':  
        $sw=false;        
        $this->ajax=$ajax;
        $ordcom1 = $this->getRequestParameter('ordcom1','');
        $ordcom2 = $this->getRequestParameter('ordcom2','');
        $fec1 = $this->getRequestParameter('fec1','');
        $fec2 = $this->getRequestParameter('fec2','');
        if ($fec1!='' && $fec2!=''){
          $dateFormat = new sfDateFormat('es_VE');
          $fec1 = $dateFormat->format($this->getRequestParameter('fec1',''), 'i', $dateFormat->getInputPattern('d'));  //Fecha Desde

          $dateFormat = new sfDateFormat('es_VE');
          $fec2 = $dateFormat->format($this->getRequestParameter('fec2',''), 'i', $dateFormat->getInputPattern('d'));  //Fecha Hasta
        }

        $this->params=array();
        $this->caordcom = $this->getCaordcomOrCreate();
        $this->updateCaordcomFromRequest();
        $this->labels = $this->getLabels();
        $this->configGrid($ordcom1,$ordcom2,$fec1,$fec2);

        $output = '[["","",""],["","",""],["","",""]]';
        break;
      case '2':
        $sw=false;
        $this->formulario=array();
        $this->i="";
        $this->ajax=$ajax;
        $i=0;
        $form="sf_admin/almaprordcom/almdetoc";
        $f[$i]=$form.$i;
        $this->getUser()->setAttribute('ordcom',$codigo,$f[$i]);
        $this->formulario=$f;
        $this->i=$i;

        $output = '[["","",""],["","",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    if ($sw) return sfView::HEADER_ONLY;

  }


  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    $this->configGrid();
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
  }

  public function saving($clasemodelo)
  {
     $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
     $coderr = Orden_compra::salvarAlmaprordcom($clasemodelo,$grid);

    return $coderr;
  }

  public function handleErrorEdit()
  {
    $this->params=array();
    $this->preExecute();
    $this->caordcom = $this->getCaordcomOrCreate();
    $this->updateCaordcomFromRequest();
    $this->updateError();
    $this->labels = $this->getLabels();
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        if ($this->coderr==3009)
             $this->getRequest()->setError('',$err);
        elseif ($this->coderr==152 || $this->coderr==142)
          $this->getRequest()->setError('',$err. ' Orden de Compra N°: '.$this->ord.' Articulo: '.$this->art.' Códido Presup: '.$this->codp);  
        else $this->getRequest()->setError('',$err.' '.$this->rec. ' Orden de Compra N°: '.$this->ord.' Articulo: '.$this->art.' Códido Presup: '.$this->codp);
      }
    }
    return sfView::SUCCESS;
  }

/**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;
  $this->ord="";
  $this->art="";
  $this->codp="";
  $this->rec="";

    if($this->getRequest()->getMethod() == sfRequest::POST){
        $this->caordcom = $this->getCaordcomOrCreate();
        try{ $this->updateCaordcomFromRequest();}
        catch (Exception $ex){}
      $this->configGrid();
      $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
      $x=$grid[0];
      $i=0;
      $l=0;
      $acum=0;
      while ($l<count($x))
      {
        if ($x[$l]->getAprobar()=='1')
        {
         $acum=$acum +1;
        }
        $l++;
      }
      if ($acum==1){
          while ($i<count($x))
          {
            if ($x[$i]->getAprobar()=='1')
            {
              $r= new Criteria();
              $r->add(CaordcomPeer::ORDCOM,$x[$i]->getOrdcom());
              $ordencompra= CaordcomPeer::doSelectOne($r);
              if ($ordencompra){
                if ($ordencompra->AfectaDisponibilidad()) {
                  Orden_compra::verificarDispGenComp($ordencompra,$msj1,$cod1,$msj2,$cod2,$cod3,$msj3,$mdis,$mimp,$resta);
                  if ($msj3!=-1)
                  {
                     $this->coderr=142; $this->ord=$x[$i]->getOrdcom(); $this->art=$cod1; $this->codp=$cod3.' Monto a Imputar: '.H::FormatoMonto($mimp).' Monto Disponible: '.H::FormatoMonto($mdis);
                     break;
                  }
                  if ($msj1!=-1)
                  {
                     $this->coderr=152; $this->ord=$x[$i]->getOrdcom(); $this->art=$cod1; $this->codp=$cod3.' Monto a Imputar: '.H::FormatoMonto($mimp).' Monto Disponible: '.H::FormatoMonto($mdis);
                     break;
                  }
                  if ($msj2!=-1)
                  {
                     $this->coderr=$msj2; $this->rec=$cod2; $this->ord=$x[$i]->getOrdcom(); $this->art=$cod1; $this->codp=$cod3.' Monto a Imputar: '.H::FormatoMonto($mimp).' Monto Disponible: '.H::FormatoMonto($mdis);
                     break;
                  }                   
                }
              }
            }
            $i++;
          }
    }else {
       if ($acum>1)
        $this->coderr=3009;            
    }               
    
    if($this->coderr!=-1){
      return false;
    } else return true;
    }else return true;
  }    
}
