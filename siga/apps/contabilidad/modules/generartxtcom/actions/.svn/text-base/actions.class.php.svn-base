<?php

/**
 * generartxtcom actions.
 *
 * @package    siga
 * @subpackage generartxtcom
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class generartxtcomActions extends autogenerartxtcomActions
{
  private $dir="";
  
  public function executeIndex()
  {
    return $this->forward('generartxtcom', 'edit');
  }

  public function executeEdit()
  {
    $this->params=array();
    $this->contabc = $this->getContabcOrCreate();

    $this->editing();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateContabcFromRequest();

      if($this->saveContabc($this->contabc) ==-1){
        {$this->setFlash('notice', 'El Archivo Txt ha sido generado Satisfactoriamente.');

         $id= $this->contabc->getId();
         $this->SalvarBitacora($id ,'Guardo');}

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('generartxtcom/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('generartxtcom/list');
        }
        else
        {            
            return $this->redirect('generartxtcom/edit?direc='.$this->dir);
        }

      }else{
        $this->labels = $this->getLabels();
      }

    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function editing()
  {
     $this->contabc->setDireccion($this->getRequestParameter('direc'));
     $this->configGrid();
  }

  public function configGrid($tipcom="", $fecdes="", $fechas="", $estatus="")
  {
     $t= new Criteria();
     if ($tipcom=="" && $fecdes=="" && $fechas=="" && $estatus=="")
     {
        $t->add(ContabcPeer::NUMCOM,'');
     }
     else
     {
         if ($tipcom!="") $t->add(ContabcPeer::TIPCOM,$tipcom);
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
         if ($estatus!="" && $estatus!="T") $t->add(ContabcPeer::STACOM,$estatus);
     }
     $result=  ContabcPeer::doSelect($t);

     $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/generartxtcom/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_comprobantes');

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
          $tipcom=$this->getRequestParameter('tipcom');
          $fecha1=$this->getRequestParameter('fecdes');
          if ($fecha1!="")
          {
            $dateFormat = new sfDateFormat('es_VE');
            $fecdes = $dateFormat->format($fecha1, 'i', $dateFormat->getInputPattern('d'));
          }else $fecdes="";
          $fecha2=$this->getRequestParameter('fechas');
          if ($fecha2!="")
          {
            $dateFormat = new sfDateFormat('es_VE');
            $fechas = $dateFormat->format($fecha2, 'i', $dateFormat->getInputPattern('d'));
          }else $fechas="";
          $estatus=$this->getRequestParameter('estatus');
          $this->configGrid($tipcom,$fecdes,$fechas,$estatus);
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
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
    
    $this->dir=Contabilidad::generarTxtComprobantes($clasemodelo,$grid);

    return -1;
  }


}
