<?php

/**
 * asigcenuni actions.
 *
 * @package    siga
 * @subpackage asigcenuni
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class asigcenuniActions extends autoasigcenuniActions
{

  public function editing()
  {
      $this->configGrid($this->npcatpre->getCodcat());
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

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npcatpre/filters');

    $mascaracategoria= Herramientas::getObtener_FormatoCategoria();
    $loncat=strlen($mascaracategoria);
    
    
     // 15    // pager
    $this->pager = new sfPropelPager('Npcatpre', 15);
    $c = new Criteria();
    $this->sql = "length(CodCat) = '" . $loncat . "'";
    $c->add(NpcatprePeer :: CODCAT, $this->sql, Criteria :: CUSTOM);
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }  

  public function configGrid($codcat="")
  {
    $c= new Criteria();
    $c->add(CaunicenPeer::CODCAT,$codcat);
    $reg= CaunicenPeer::doSelect($c);
    
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/asigcenuni/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_cc');

    $this->obj =$this->columnas[0]->getConfig($reg);

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
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxgrid()
  {
    $name = $this->getRequestParameter('grid','a');
    $grid = $this->getRequestParameter('grid'.$name,'');
    $fila = $this->getRequestParameter('fila','');
    $col = $this->getRequestParameter('columna', '');
    $javascript="";  $jsonextra="";

    switch ($col) {
          case '1':
            $c= new Criteria();
            $c->add(CadefcenPeer::CODCEN,$grid[$fila][$col-1]);
            $reg= CadefcenPeer::doSelectOne($c);
            if ($reg) {
              if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
              {
                  $grid[$fila][1]=$reg->getDescen();
              }else {
                 $grid[$fila][$col-1]="";
                 $grid[$fila][1]="";
                 $javascript="alert('El Centro de Costo esta Repetido');";
              }
            }else {
                $grid[$fila][$col-1]="";
                $grid[$fila][1]="";
                $javascript="alert('El Centro de Costo no Existe ...');";
            }
       
            $jsonextra = ',["javascript","' . $javascript . '",""]';
            break;
          default:
            break;
        }

    $output = Herramientas::grid_to_json($grid,$name,$jsonextra);
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
     Compras::salvarAsigCenUni($clasemodelo,$grid);
      
    return -1;
  }
}
