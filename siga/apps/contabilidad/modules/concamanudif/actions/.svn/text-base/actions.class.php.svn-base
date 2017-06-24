<?php

/**
 * concamanudif actions.
 *
 * @package    siga
 * @subpackage concamanudif
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class concamanudifActions extends autoconcamanudifActions
{

 public function executeIndex()
  {
    return $this->forward('concamanudif', 'edit');
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid();
  }

public function configGrid($fecdes="", $fechas="")
  {
     $t= new Criteria();
     if ($fecdes=="" && $fechas=="")
     {
        $t->add(ContabcPeer::NUMCOM,'');
     }
     else
     {
         if ($fecdes!="" && $fechas!="")
         {
             $t->add(ContabcPeer::FECCOM,$fecdes,Criteria::GREATER_EQUAL);
             $t->add(ContabcPeer::FECCOM,$fechas,Criteria::LESS_EQUAL);
         }else if ($fecdes!="")
         {
            $t->add(ContabcPeer::FECCOM,$fecdes);
         }else if ($fechas!="")
         {
             $t->add(ContabcPeer::FECCOM,$fechas);
         }
         $t->add(ContabcPeer::STACOM,'N');
     }
     $result=  ContabcPeer::doSelect($t);

     $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/concamanudif/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_comprobantes');

     $this->obj =$this->columnas[0]->getConfig($result);

     $this->contabc->setObj($this->obj);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    switch ($ajax){
      case '1':
          $this->contabc = $this->getContabcOrCreate();
          $this->params=array();
          $this->labels = $this->getLabels();
          $fecha1=$this->getRequestParameter('fecdes','');
          if ($fecha1!="")
          {
            $dateFormat = new sfDateFormat('es_VE');
            $fecdes = $dateFormat->format($fecha1, 'i', $dateFormat->getInputPattern('d'));
          }else $fecdes="";
          $fecha2=$this->getRequestParameter('fechas','');
          if ($fecha2!="")
          {
            $dateFormat = new sfDateFormat('es_VE');
            $fechas = $dateFormat->format($fecha2, 'i', $dateFormat->getInputPattern('d'));
          }else $fechas="";
          $this->configGrid($fecdes,$fechas);
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

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

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      // $this->configGrid();
      // $grid = Herramientas::CargarDatosGrid($this,$this->obj);

      // Aqui van los llamados a los métodos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

      // $resp = Compras::validarAlmajuoc($this->caajuoc,$grid);

       //$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);

      // al final $resp es analizada en base al código que retorna
      // Todas las funciones de validación y procesos del negocio
      // deben retornar códigos >= -1. Estos código serám buscados en
      // el archivo errors.yml en la función handleErrorEdit()

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
    Contabilidad::ReversarAnulados($grid);
    return -1;
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
