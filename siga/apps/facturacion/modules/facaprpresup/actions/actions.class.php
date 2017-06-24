<?php

/**
 * facaprpresup actions.
 *
 * @package    siga
 * @subpackage facaprpresup
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class facaprpresupActions extends autofacaprpresupActions
{

  public function executeList()
  {
    return $this->forward('facaprpresup', 'edit');
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid();
  }

    public function configGrid($fecdes="", $fechas="", $reg = array())
  {
     if ($fecdes!="" && $fechas!="") {
         $c = new Criteria();     
         $this->sql="fapresup.fecpre>='".$fecdes."' and fapresup.fecpre<='".$fechas."' and (fapresup.staapr<>'A' or fapresup.staapr is null)";
         $c->add(FapresupPeer::FECPRE,$this->sql, Criteria::CUSTOM);         
         $reg = FapresupPeer::doSelect($c);
     }
     
     $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facaprpresup/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
     

     $this->obj = $this->obj[0]->getConfig($reg);
     $this->fapresup->setGrid($this->obj);

  }


  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos= $this->getRequestParameter('cajtexmos','');
    $js=""; $dato=""; $sw=true;
    
    switch ($ajax){
      case '1':            
          $sw=false;
          if ($cajtexmos=='fapresup_fechas')
          {
                $dateFormat = new sfDateFormat('es_VE');
                $fec1 = $dateFormat->format($codigo, 'i', $dateFormat->getInputPattern('d'));  //Fecha Desde

                if ($this->getRequestParameter('fecha')!="") {
                $dateFormat = new sfDateFormat('es_VE');
                $fec2 = $dateFormat->format($this->getRequestParameter('fecha'), 'i', $dateFormat->getInputPattern('d'));  //Fecha Hasta
                
                if ($fec1>$fec2)
                {
                    $js="alert('La fechas Desde no puede ser mayor la Fecha Hasta'); $('fapresup_fecdes').value=''; $('fapresup_fecdes').focus();";
                    $this->params=array();
                    $this->labels = $this->getLabels();
                    $this->fapresup = $this->getFapresupOrCreate();
                    $this->configGrid();
                }else {
                    $this->params=array();
                    $this->labels = $this->getLabels();
                    $this->fapresup = $this->getFapresupOrCreate();
                    $this->configGrid($fec1, $fec2);
                }
                }else { $this->params=array();
                    $this->labels = $this->getLabels();
                    $this->fapresup = $this->getFapresupOrCreate();
                    $this->configGrid();
                }
          }else {
                $dateFormat = new sfDateFormat('es_VE');
                $fec1 = $dateFormat->format($this->getRequestParameter('fecha'), 'i', $dateFormat->getInputPattern('d'));  //Fecha Desde

                $dateFormat = new sfDateFormat('es_VE');
                $fec2 = $dateFormat->format($codigo, 'i', $dateFormat->getInputPattern('d'));  //Fecha Hasta
                
                if ($fec1>$fec2)
                {
                    $js="alert('La fechas Desde no puede ser mayor la Fecha Hasta'); $('fapresup_fechas').value=''; $('fapresup_fechas').focus();";
                    $this->params=array();
                    $this->labels = $this->getLabels();
                    $this->fapresup = $this->getFapresupOrCreate();
                    $this->configGrid();
                }else {
                    $this->params=array();
                    $this->labels = $this->getLabels();
                    $this->fapresup = $this->getFapresupOrCreate();
                    $this->configGrid($fec1, $fec2);
                }
          }
        $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    if ($sw) return sfView::HEADER_ONLY;

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
      $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
      foreach($grid[0] as  $dat)
      {
          if($dat->getCheck()=='1')
          {
              $c = new Criteria();
              $c->add(FapresupPeer::REFPRE,$dat->getRefpre());
              $per = FapresupPeer::doSelectOne($c);            
              if($per)
              {
                 $per->setStaapr('A');
                 $per->setUsuapr($loguse);
                 $per->setFecapr(date('Y-m-d'));
                 $per->save();
              }
          }
      }

    return -1;
  }

}
