<?php

/**
 * tesregvenfacmen actions.
 *
 * @package    siga
 * @subpackage tesregvenfacmen
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class tesregvenfacmenActions extends autotesregvenfacmenActions
{
  public function executeIndex()
  {
    return $this->forward('tesregvenfacmen', 'edit');
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid();

  }

  public function configGrid()
  {
    $q= new Criteria();
    $resulq=OpvenfacmenPeer::doSelect($q);
    if (!$resulq){
       $per=array();
       for ($i=1; $i <= 12; $i++) { 
         $facmes= New Opvenfacmen();
         if ($i<=9)
           $facmes->setMes('0'.$i);
         else
          $facmes->setMes($i);
         $facmes->setNonmes(H::ObtenerMesenLetras($facmes->getMes()));
         $facmes->setMongra(0);
         $facmes->setMosgra(0);
         $facmes->setTotmes(0);
         $per[]=$facmes;
       }
       $meses=$per;
    }else $meses=$resulq;

     $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/tesregvenfacmen/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');

    $this->obj =$this->columnas[0]->getConfig($meses);

    $this->opvenfacmen->setObj($this->obj);
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
     H::Guardar_Grid($grid);
    return -1;
  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxfila()
  {
    $name = $this->getRequestParameter('grid','a');
    $grid = $this->getRequestParameter('grid'.$name,'');
    $fila = $this->getRequestParameter('fila','');
    $col = $this->getRequestParameter('columna', '');
    $javascript="";  $jsonextra="";

    switch ($col) {
         case ('3' || '4'):   //Monto Ventas Gravadas y Monto Ventas no Gravadas
            if (H::toFloat($grid[$fila][$col-1])>=0)
            {
              $mon1=H::toFloat($grid[$fila][2]);
              $mon2=H::toFloat($grid[$fila][3]);
              $suma=$mon1 + $mon2;

              $grid[$fila][4]=H::FormatoMonto($suma);              
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
