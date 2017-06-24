<?php

/**
 * confinelicom actions.
 *
 * @package    siga
 * @subpackage confinelicom
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class confinelicomActions extends autoconfinelicomActions
{
  public function executeIndex()
  {
    return $this->forward('confinelicom', 'edit');
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
     $this->configGrid();    
  }

  public function configGrid($numcom1='', $numcom2='')
  {
    $reg = array();

    if ($numcom1!='' && $numcom2!='')
    {
      $sql=" (contabc.numcom>='".$numcom1."' and contabc.numcom<='".$numcom2."') ";
      $c = new Criteria();
      $c->add(ContabcPeer::STACOM,'N');
      $c->add(ContabcPeer::NUMCOM,$sql,Criteria::CUSTOM);
      $c->addAscendingOrderByColumn(ContabcPeer::FECCOM);
      $c->addAscendingOrderByColumn(ContabcPeer::NUMCOM);
      $reg= ContabcPeer::doSelect($c);
    }

   $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/confinelicom/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_comanu');

   $this->obj =$this->columnas[0]->getConfig($reg);

   $this->contabc->setObj($this->obj);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');

    switch ($ajax){
      case '1':       
        $numcom1 = $this->getRequestParameter('numcom1','');
        $numcom2 = $this->getRequestParameter('numcom2','');

        $this->params=array();
        $this->contabc = $this->getContabcOrCreate();
        $this->updateContabcFromRequest();
        $this->labels = $this->getLabels();
        $this->configGrid($numcom1, $numcom2);
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
    
    return Contabilidad::EliminarComprobantesAnulados($grid);
  }

}
