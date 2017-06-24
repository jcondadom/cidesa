<?php

/**
 * preconprecon actions.
 *
 * @package    siga
 * @subpackage preconprecon
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class preconpreconActions extends autopreconpreconActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
     $this->configGrid();
  }

   /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->listing();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/cpdeftit/filters');


     // 15    // pager
    $this->pager = new sfPropelPager('Cpdeftit', 15);
    $c = new Criteria();
    $mask=strlen(H::getX_vacio('CODEMP','Cpdefniv','Forpre','001'));
    $numegr=H::getX_vacio('CODEMP','Contaba','Codegd','001');
    $sql = "length(Codpre) = '" . $mask . "' and codcta like '$numegr%'";
    $c->add(CpdeftitPeer::CODPRE, $sql, Criteria::CUSTOM);
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  public function configGrid()
  {
     $this->configGrid1($this->cpdeftit->getCodpre(),$this->cpdeftit->getCodcta());
     $this->configGrid2($this->cpdeftit->getCodpre(),$this->cpdeftit->getCodcta());
     $this->configGrid3($this->cpdeftit->getCodpre(),$this->cpdeftit->getCodcta());
     $this->configGrid4($this->cpdeftit->getCodpre(),$this->cpdeftit->getCodcta());
  }

  public function configGrid1($codpre='',$codcta=''){
    
    $reg=Presupuesto::CargarDatosGridConciliacion($codpre,$codcta,'1');
    
    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/preconprecon/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid1');

    $this->obj1 = $this->columnas[0]->getConfig($reg);

    $this->cpdeftit->setObj($this->obj1);
  }

  public function configGrid2($codpre='',$codcta=''){

    $reg=Presupuesto::CargarDatosGridConciliacion($codpre,$codcta,'2');
        
    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/preconprecon/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid1');

    $this->obj2 = $this->columnas[0]->getConfig($reg);

    $this->cpdeftit->setObj2($this->obj2);
  }

  public function configGrid3($codpre='',$codcta=''){

    $reg=Presupuesto::CargarDatosGridConciliacion($codpre,$codcta,'3');
    
    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/preconprecon/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid1');

    $this->obj3 = $this->columnas[0]->getConfig($reg);

    $this->cpdeftit->setObj3($this->obj3);
  }

  public function configGrid4($codpre='',$codcta=''){
    
    $reg=Presupuesto::CargarDatosGridConciliacion($codpre,$codcta,'4');

    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/preconprecon/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid1');

    $this->obj4 = $this->columnas[0]->getConfig($reg);

    $this->cpdeftit->setObj4($this->obj4);
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

    $grid1 = Herramientas::CargarDatosGridv2($this,$this->obj1);
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);
    $grid3 = Herramientas::CargarDatosGridv2($this,$this->obj3);
    $grid4 = Herramientas::CargarDatosGridv2($this,$this->obj4);
  }

  public function saving($clasemodelo)
  {
    return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
