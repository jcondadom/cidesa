<?php

/**
 * almranrot actions.
 *
 * @package    siga
 * @subpackage almranrot
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class almranrotActions extends autoalmranrotActions
{
public function executeIndex()
  {
    return $this->forward('almranrot', 'edit');
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid();

  }

  public function configGrid()
  {
    $c = new Criteria();
    $per = CaranrotPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/almranrot/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
    
    $this->columnas[1][0]->setCombo(array('A' => 'ALTA', 'M' => 'MEDIA', 'B' => 'BAJA', 'N' => 'NULA'));

    $this->grid = $this->columnas[0]->getConfig($per);

    $this->caranrot->setGrid($this->grid);


  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');

    switch ($ajax){
      case '1':
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::HEADER_ONLY;

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
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
    Compras::salvarRangosRotacion($grid);
    return -1;
  }

}
