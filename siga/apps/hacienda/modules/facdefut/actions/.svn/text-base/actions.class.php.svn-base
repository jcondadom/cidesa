<?php

/**
 * facdefut actions.
 *
 * @package    siga
 * @subpackage facdefut
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class facdefutActions extends autofacdefutActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {


  }

  public function configGrid($reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;

    if(!count($reg)>0)
    {
      // AquÃ­ va el cÃ³digo para traernos los registros que contendrÃ¡ el grid
      $reg = array();
      // AquÃ­ va el cÃ³digo para generar arreglo de configuraciÃ³n del grid
    $this->obj = array();
    }


  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $fechafin =  $this->getRequestParameter('fecfin','');
    $ajax   = $this->getRequestParameter('ajax','');
    $this->ajax=$ajax;
    $javascript='';
    switch ($ajax){
      case '1':
        $dateFormat = new sfDateFormat('es_VE');
        $fec1 = $dateFormat->format($codigo, 'i', $dateFormat->getInputPattern('d'));
        $dateFormat = new sfDateFormat('es_VE');
        $fec2 = $dateFormat->format($fechafin, 'i', $dateFormat->getInputPattern('d'));
        if ($fec1>$fec2)
          {
           $javascript="alert('La Fecha de Inicio no puede ser mayor a la Fecha Fin'); $('fcdefut_fecini').value='';$('fcdefut_fecini').focus();";
          }
        $output = '[["javascript","' . $javascript . '",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::HEADER_ONLY;

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
    $id='';
    if($this->getRequest()->getMethod() == sfRequest::POST){
     $fecha= $this->getRequestParameter('fcdefut[fecini]');
     $id= $this->getRequestParameter('fcdefut[id]');
    if (Hacienda::verificarFechaIni($fecha,$id)){
         $this->coderr=757;
         return false;
    }

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
    //$this->configGrid();

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

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
