<?php

/**
 * almordenv actions.
 *
 * @package    siga
 * @subpackage almordenv
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class almordenvActions extends autoalmordenvActions
{
  public function executeIndex()
  {
    return $this->redirect('almordenv/edit');
  }
  
  
  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
      $this->configGrid();
  }

  public function configGrid($operacion='')
  {
    $c = new Criteria();
    $c->add(CaordcomPeer::STAORD,'N',Criteria::NOT_EQUAL);
    if ($operacion=='R') $c->add(CaordcomPeer::ENVIAD,null);
    else if ($operacion=='E') $c->add(CaordcomPeer::ENVIAD,'R');
    else
        $c->add(CaordcomPeer::ORDCOM,'');
    $detalle = CaordcomPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/almordenv/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');

    $this->obj =$this->columnas[0]->getConfig($detalle);

    $this->caordcom->setObj($this->obj);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');

    switch ($ajax){
      case '1':
        $this->params=array();
        $this->labels = $this->getLabels();
        $this->caordcom = $this->getCaordcomOrCreate();
        $this->configGrid($codigo);
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    //return sfView::HEADER_ONLY;
  }


  /**
   *
   * FunciÃ³n que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones especÃ­ficas del negocio del formulario
   * Para mayor informaciÃ³n vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
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
   * FunciÃ³n para actualziar el grid en el post si ocurre un error
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
      Compras::salvardatosEnvioOC($clasemodelo,$grid);
    return -1;
  }
}
