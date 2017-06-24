<?php

/**
 * nomtabcuosfn actions.
 *
 * @package    siga
 * @subpackage nomtabcuosfn
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nomtabcuosfnActions extends autonomtabcuosfnActions
{

  public function executeIndex()
  {
    return $this->forward('nomtabcuosfn', 'edit');
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid($this->nptabsfn->getCodcon());
  }

  public function configGrid($codcon='')
  {
    $c = new Criteria();
    $c->add(NptabsfnPeer::CODCON,$codcon);
    $detalle = NptabsfnPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/nomtabcuosfn/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
    
    $this->columnas[1][0]->setCombo($this->nptabsfn->Parentescos());
    $this->columnas[1][1]->setCombo(Constantes::ListaSexo());

    $this->obj =$this->columnas[0]->getConfig($detalle);

    $this->nptabsfn->setObj($this->obj); 
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $dato=""; $js="";
    switch ($ajax){
      case '1':
        $l= new Criteria();
        $l->add(NpdefcptPeer::CODCON,$codigo);
        $reg= NpdefcptPeer::doSelectOne($l);
        if ($reg)
        {
          $dato=$reg->getNomcon(); 
        }else{
           $codigo="";
           $js="alert_('El Concepto no existe'); $('nptabsfn_codcon').value=''; $('nptabsfn_codcon').focus();";
        }
        $this->params=array();
        $this->nptabsfn = $this->getNptabsfnOrCreate();
        $this->labels = $this->getLabels();
        $this->configGrid($codigo);

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
        break;      
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    //return sfView::HEADER_ONLY;

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

    if($this->getRequest()->getMethod() == sfRequest::POST){

     if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;
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
    $arreglo=array('codcon');
    H::Guardar_Grid($grid,$arreglo,$clasemodelo);
    return -1;
  }

}
