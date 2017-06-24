<?php

/**
 * manactest actions.
 *
 * @package    siga
 * @subpackage manactest
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class manactestActions extends automanactestActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid();
  }

   public function configGrid(){
    $this->configGridTareas($this->manactest->getCodact());
    $this->configGridRRHH($this->manactest->getCodact());
  }

  public function configGridTareas($codact='')
  {
   $c= new Criteria();
   $c->add(MantaractPeer::CODACT,$codact);
   $det= MantaractPeer::doSelect($c);
     

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/manactest/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_tareas');
    
    $this->obj =$this->columnas[0]->getConfig($det);

    $this->manactest->setObj($this->obj);
  }

  public function configGridRRHH($codact='')
  {
   $c= new Criteria();
   $c->add(ManrehactPeer::CODACT,$codact);
   $det= ManrehactPeer::doSelect($c);
     

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/manactest/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_rrhh');
    
    $this->obj2 =$this->columnas[0]->getConfig($det);

    $this->manactest->setObj1($this->obj2);
  } 

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $dato=$js=""; $sw=true; 
    $this->ajaxs=$ajax;

    switch ($ajax){
      case '1':
          $q= new Criteria();
          $q->add(ManactestPeer::CODACT,$codigo);
          $reg= ManactestPeer::doSelectOne($q);
          if ($reg)
          {
             $priori=$reg->getPriori();
             
             $cedemp=$reg->getCedemp();
             $nomemp=H::getX_vacio('cedemp','Nphojint','Nomemp',$cedemp);

             $cedres=$reg->getCedres();
             $nomres=H::getX_vacio('cedemp','Nphojint','Nomemp',$cedres);

             $codtma=$reg->getCodtma();
             $destma=H::getX_vacio('codtma','Mantipman','Destma',$codtma);

             $tipo=$reg->getTipord();

             $codgrr=$reg->getCodgrr();
             $desgrr=H::getX_vacio('codgrr','Mangrutre','Desgrr',$codgrr);       

             $js="$('manactest_codact').value=''; $('manactest_desact').value=''; $('manactest_codgru').value=''; $('manactest_desgru').value=''; CargarTareas('$codigo'); CargarRRHH('$codigo');";
             $output = '[["manactest_priori","'.$priori.'",""],["manactest_cedemp","'.$cedemp.'",""],["manactest_nomemp","'.$nomemp.'",""],
             ["manactest_cedres","'.$cedres.'",""],["manactest_nomempp","'.$nomres.'",""],
             ["manactest_codtma","'.$codtma.'",""],["manactest_destma","'.$destma.'",""],
             ["manactest_tipord","'.$tipo.'",""],
             ["manactest_codgrr","'.$codgrr.'",""],["manactest_desgrr","'.$desgrr.'",""],
             ["javascript","'.$js.'",""]]';
          }else
            $output = '[["","",""]]';        
        break;
      case '2':
        $sw=false;
        $codigo=$this->getRequestParameter('codigo');    
      
        $this->params=array();
        $this->labels = $this->getLabels();
        $this->manactest = $this->getManactestOrCreate();
        $this->configGridTareas($codigo);
        $output = '[["javascript","'.$js.'",""]]';
        break;
      case '3':
        $sw=false;
        $codigo=$this->getRequestParameter('codigo');    
      
        $this->params=array();
        $this->labels = $this->getLabels();
        $this->manactest = $this->getManactestOrCreate();
        $this->configGridRRHH($codigo);
        $output = '[["javascript","'.$js.'",""]]';
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
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);

  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);
    Mantenimiento::salvarActividades($clasemodelo,$grid,$grid2);
    return -1;
  }

  public function deleting($clasemodelo)
  {
    H::EliminarRegistro('Mantaract','Codact',$clasemodelo->getCodact());
    H::EliminarRegistro('Manrehact','Codact',$clasemodelo->getCodact());
    return parent::deleting($clasemodelo);
  }

     /**
 * Función para procesar _todas_ las funciones Ajax del formulario
 * Cada función esta identificada con el valor de la vista "ajax"
 * el cual traerá el indice de lo que se quiere procesar.
 *
 */
  public function executeAjaxgrid() {
    $name = $this->getRequestParameter('grid','a');
    $grid = $this->getRequestParameter('grid'.$name,'');
    $fila = $this->getRequestParameter('fila','');
    $col = $this->getRequestParameter('columna', '');    
    $idfila = $this->getRequestParameter('this[id]', '');    
    $valuefila = $this->getRequestParameter('this[value]', ''); 
    $javascript="";  $jsonextra="";
      switch ($name) {
        case ('a'):   //grid Tareas 
            switch ($col) { 
              case ('3'):  //Instrucción de Seguridad
                $c= new Criteria();
                $c->add(ManinssegPeer::CODINS,$grid[$fila][$col-1]);
                $reg= ManinssegPeer::doSelectOne($c);
                if ($reg)
                  $grid[$fila][$col]=$reg->getDesins();
                else {
                  $javascript = "alert_('La Instrucci&oacute;n de Seguridad no Existe');";
                  $grid[$fila][$col-1]="";
                  $grid[$fila][$col]="";
                } 
                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;
              case ('4'):  //Código de la Lista de Repuestos
                $c= new Criteria();
                $c->add(ManesttraPeer::CODEST,$grid[$fila][$col-1]);
                $reg= ManesttraPeer::doSelectOne($c);
                if ($reg)
                  $grid[$fila][$col]=$reg->getDesest();
                else {
                  $javascript = "alert_('La Lista de Repuestos no Existe');";
                  $grid[$fila][$col-1]="";
                  $grid[$fila][$col]="";
                } 
                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;        
              default:
                break;
            }
          break;
        case ('b'):   //grid RRHH 
            switch ($col) { 
              case ('1'):  //Cargo
                $c= new Criteria();
                $c->add(NpcargosPeer::CODCAR,$grid[$fila][$col-1]);
                $reg= NpcargosPeer::doSelectOne($c);
                if ($reg)
                  $grid[$fila][$col]=$reg->getNomcar();
                else {
                  $javascript = "alert_('El Cargo no Existe');";
                  $grid[$fila][$col-1]="";
                  $grid[$fila][$col]="";
                } 
                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;        
              default:
                break;
            }
          break;       
        default:
          break;
        }

      $output = Herramientas::grid_to_json($grid,$name,$jsonextra);
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
    }

}
