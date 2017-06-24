<?php

/**
 * almaprgesadm actions.
 *
 * @package    siga
 * @subpackage almaprgesadm
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class almaprgesadmActions extends autoalmaprgesadmActions
{
  public function executeIndex()
  {
    return $this->forward('almaprgesadm', 'edit');
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid();
  }

  public function configGrid($fec1='', $fec2='')
  {
    $this->nometiact="";
    $this->filnoapr="";
    $reg=array();
    $varemp = $this->getUser()->getAttribute('configemp');
    if ($varemp)
      if(array_key_exists('aplicacion',$varemp))
       if(array_key_exists('compras',$varemp['aplicacion']))
         if(array_key_exists('modulos',$varemp['aplicacion']['compras']))
           if(array_key_exists('almaprsolegr',$varemp['aplicacion']['compras']['modulos'])){
           if(array_key_exists('filnoapr',$varemp['aplicacion']['compras']['modulos']['almaprsolegr']))
             {
              $this->filnoapr=$varemp['aplicacion']['compras']['modulos']['almaprsolegr']['filnoapr'];
             }
           }

    $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
    $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr');

    if ($fec1!='' && $fec2!='')
    {
      $cade=" and casolart.fecreq>='".$fec1."' and  casolart.fecreq<='".$fec2."' ";
    }else $cade="";

    if ($filsoldir=='S')
      if ($cade!='')
        $cade.=' and casolart.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
      else
        $cade=' and casolart.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';


     $c = new Criteria();
     $c->add(CasolartPeer::STAREQ,'A');      
     $c->add(CasolartPeer::APRREQ,'S');      
     $sql = "casolart.aprdiradq='N' and casolart.reqart not in (select distinct(reqart) from caartord where reqart is not null) ".$cade."";
     $c->add(CasolartPeer::REQART, $sql, Criteria :: CUSTOM);   
     $c->addAscendingOrderByColumn(CasolartPeer::REQART);
     $c->addAscendingOrderByColumn(CasolartPeer::FECREQ);
     $reg = CasolartPeer::doSelect($c);

     $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/almaprgesadm/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');

   
    $this->columnas[1][2]->setHTML('type="text" size="10" readOnly=true onBlur="javascript:event.keyCode=13; ajaxmostrardetalle(event,this.id);"');
    
    if ($this->filnoapr=='S')
      $this->columnas[1][1]->setOculta(true);

    $this->obj =$this->columnas[0]->getConfig($reg);

    $this->casolart->setObj($this->obj);

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
          if ($cajtexmos=='casolart_fechas')
          {
                $dateFormat = new sfDateFormat('es_VE');
                $fec1 = $dateFormat->format($codigo, 'i', $dateFormat->getInputPattern('d'));  //Fecha Desde

                if ($this->getRequestParameter('fecha')!="") {
                  $dateFormat = new sfDateFormat('es_VE');
                  $fec2 = $dateFormat->format($this->getRequestParameter('fecha'), 'i', $dateFormat->getInputPattern('d'));  //Fecha Hasta
                  
                  if ($fec1>$fec2)
                  {
                      $js="alert('La fechas Desde no puede ser mayor la Fecha Hasta'); $('casolart_fecdes').value=''; $('casolart_fecdes').focus();";
                      $this->params=array();
                      $this->labels = $this->getLabels();
                      $this->casolart = $this->getCasolartOrCreate();
                      $this->configGrid();
                  }else {
                      $this->params=array();
                      $this->labels = $this->getLabels();
                      $this->casolart = $this->getCasolartOrCreate();
                      $this->configGrid($fec1, $fec2);
                  }
                }else { $this->params=array();
                    $this->labels = $this->getLabels();
                    $this->casolart = $this->getCasolartOrCreate();
                    $this->configGrid();
                }
          }else {
                $dateFormat = new sfDateFormat('es_VE');
                $fec1 = $dateFormat->format($this->getRequestParameter('fecha'), 'i', $dateFormat->getInputPattern('d'));  //Fecha Desde

                $dateFormat = new sfDateFormat('es_VE');
                $fec2 = $dateFormat->format($codigo, 'i', $dateFormat->getInputPattern('d'));  //Fecha Hasta
                
                if ($fec1>$fec2)
                {
                    $js="alert('La fechas Desde no puede ser mayor la Fecha Hasta'); $('casolart_fechas').value=''; $('casolart_fechas').focus();";
                    $this->params=array();
                    $this->labels = $this->getLabels();
                    $this->casolart = $this->getCasolartOrCreate();
                    $this->configGrid();
                }else {
                    $this->params=array();
                    $this->labels = $this->getLabels();
                    $this->casolart = $this->getCasolartOrCreate();
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
        if($dat->getAprobar1()=='1')
        {
            $c = new Criteria();
            $c->add(CasolartPeer::REQART,$dat->getReqart());
            $per = CasolartPeer::doSelectOne($c);            
            if($per)
            {
               $per->setAprgesadm('S');
               $per->setUsuaprgad($loguse);
               $per->setFecaprgad(date('Y-m-d'));
               $per->save();
            }
        }
        if ($dat->getRechazar1()=='1')
       {
          $c = new Criteria();
          $c->add(CasolartPeer::REQART,$dat->getReqart());
          $per = CasolartPeer::doSelectOne($c);            
          if($per)
          {
             $per->setAprgesadm('N');
             $per->setUsuaprgad(null);
             $per->setFecaprgad(null);
             $per->save();
          }
       } 
    }
    return -1;
  }



}
