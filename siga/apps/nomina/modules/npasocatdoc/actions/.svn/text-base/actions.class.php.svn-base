<?php

/**
 * npasocatdoc actions.
 *
 * @package    siga
 * @subpackage npasocatdoc
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class npasocatdocActions extends autonpasocatdocActions
{
  public function executeIndex()
  {
    return $this->forward('npasocatdoc', 'edit');
  }


  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
     $this->configGrid();
     
  }

  public function configGrid($codemp='')
  {
     $c= new Criteria();
     $c->add(NpdoccatePeer::CODEMP,$codemp);
     $per= NpdoccatePeer::doSelect($c);

     $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/npasocatdoc/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_catedras');

     $this->obj =$this->columnas[0]->getConfig($per);

     $this->npdoccate->setObj($this->obj); 
     

  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $dato=""; $js="";

    switch ($ajax){
      case '1':
        $c= new Criteria();
        $c->add(NphojintPeer::CODEMP,$codigo);
        $reg= NphojintPeer::doSelectOne($c);
        if ($reg)
        {
          $dato=$reg->getNomemp();
        }else {
          $codigo="";
          $js="alert_('El Docente no esta registrado'); $('npdoccate_codemp').value=''; $('npdoccate_codemp').focus();";
        }
        $this->params=array();
        $this->npdoccate = $this->getNpdoccateOrCreate();
        $this->labels = $this->getLabels();

        $this->configGrid($codigo);

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
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
    Nomina::salvarAsigCatDoc($clasemodelo,$grid);
    return -1;
  }

  public function deleting($clasemodelo)
  {
    $t= new Criteria();
    $t->add(NpdoccatePeer::CODEMP,$clasemodelo->getCodemp());
    NpdoccatePeer::doDelete($t);

     return -1;
  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traer el indice de lo que se quiere procesar.
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
              if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
              {
                  $t= new Criteria();
                  $t->add(NpdefcatePeer::CODCATE,$grid[$fila][$col-1]);
                  $reg= NpdefcatePeer::doSelectOne($t);
                  if ($reg)
                  {
                     $grid[$fila][$col]=$reg->getDescate();                      
                  }else {                  
                     $grid[$fila][$col-1]="";
                     $javascript="alert('La C&aacute;tedra no existe');";
                  }                    
              }else {
                  
                 $grid[$fila][$col-1]="";
                 $javascript="alert('La C&aacute;tedra esta repetida');";
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
}
