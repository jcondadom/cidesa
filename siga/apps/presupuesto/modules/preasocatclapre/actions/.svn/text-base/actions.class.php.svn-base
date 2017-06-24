<?php

/**
 * preasocatclapre actions.
 *
 * @package    siga
 * @subpackage preasocatclapre
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class preasocatclapreActions extends autopreasocatclapreActions
{

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

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npcatpre/filters');

    $longcat=strlen(H::getMascaraCategoria());
     // 15    // pager
    $this->pager = new sfPropelPager('Npcatpre', 15);
    $c = new Criteria();
    $sql = "length(CodCat) = '".$longcat."'";
    $c->add(NpcatprePeer::CODCAT,$sql, Criteria::CUSTOM);
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid($this->npcatpre->getCodcat());

  }

  public function configGrid($codcat='')
  {
    $lonpar=strlen(H::getMascaraPartida());
    $c = new Criteria();
    $sql=" length(cpdefparpre.codparpre)='".$lonpar."' and '".$codcat."'||'-'||cpdefparpre.codparpre not in (select codpre from cpdeftit)";
    $c->add(CpdefparprePeer::CODPARPRE,$sql,Criteria::CUSTOM);
    $per = CpdefparprePeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/preasocatclapre/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');

    $this->obj = $this->columnas[0]->getConfig($per);
    
    $this->npcatpre->setObj($this->obj);
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

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    Presupuesto::generarCodigosPresupuestarios($clasemodelo,$grid);
    return -1;
  }
}
