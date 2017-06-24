<?php

/**
 * manordtra actions.
 *
 * @package    siga
 * @subpackage manordtra
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class manordtraActions extends automanordtraActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid();
  }

  public function configGrid()
  {
    $this->configGridTareas($this->manordtra->getNumord());
    $this->configGridRRHH($this->manordtra->getNumord());
    $this->configGridRequisiciones($this->manordtra->getNumord());
    $this->configGridAvance($this->manordtra->getNumord());
    $this->configGridComponentes($this->manordtra->getNumord());
    $this->configGridRRHHReal($this->manordtra->getNumord());
  }

  public function configGridTareas($numord='',$codact='', $nuevo='')
  {
    $det=array();
    if ($nuevo!=''){
      $c= new Criteria();
      $c->add(MantaractPeer::CODACT,$codact);
      $regc= MantaractPeer::doSelect($c);
      if ($regc){
        foreach ($regc as $objc) {
          $mantarord_new= new Mantarord();
          $mantarord_new->setNumtar($objc->getNumtar());
          $mantarord_new->setDestar($objc->getDestar());
          $mantarord_new->setCodins($objc->getCodins());
          $mantarord_new->setCodest($objc->getCodest());
          $mantarord_new->setRutina($objc->getRutina());
          $det[]=$mantarord_new;
        }
    }else{
      $mantarord_new= new Mantarord();
      $det[]=$mantarord_new;
    }
  }else {
    $c= new Criteria();
    $c->add(MantarordPeer::NUMORD,$numord);
    $det= MantarordPeer::doSelect($c);
  }
     

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/manordtra/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_tareas');
    
    $this->obj =$this->columnas[0]->getConfig($det);

    $this->manordtra->setObj($this->obj);
  }

  public function configGridRRHH($numord='',$codact='', $nuevo='')
  {
    $det=array();
    if ($nuevo!=''){
      $c= new Criteria();
      $c->add(ManrehactPeer::CODACT,$codact);
      $regc= ManrehactPeer::doSelect($c);
      if ($regc){
        foreach ($regc as $objc) {
          $manrehord_new= new Manrehord();
          $manrehord_new->setCodcar($objc->getCodcar());
          $manrehord_new->setCanrec($objc->getCanrec());
          $manrehord_new->setCanhor($objc->getCanhor());
          $det[]=$manrehord_new;
        }
    }else{
      $manrehord_new= new Manrehord();
      $det[]=$manrehord_new;
    }
  }else {
    $c= new Criteria();
    $c->add(ManrehordPeer::NUMORD,$numord);
    $det= ManrehordPeer::doSelect($c);
  }
     

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/manordtra/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_rrhh');
    
    $this->obj1 =$this->columnas[0]->getConfig($det);

    $this->manordtra->setObj1($this->obj1);
  }  

  public function configGridRequisiciones($numord='')
  {
    $c= new Criteria();
    $c->add(MandetreqPeer::NUMORD,$numord);
    $det= MandetreqPeer::doSelect($c);
     

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/manordtra/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_req');
    
    $this->columnas[1][1]->setHTML('type="text" size="1" style="border:none" class="imagenalmacen" onClick=buscarRequisicion(this.id);'); //Buscar Requesicion
    
    $this->obj2 =$this->columnas[0]->getConfig($det);

    $this->manordtra->setObj2($this->obj2);
  }

  public function configGridAvance($numord='')
  {
    $c= new Criteria();
    $c->add(ManavaordPeer::NUMORD,$numord);
    $det= ManavaordPeer::doSelect($c);
     

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/manordtra/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_avance');
    
    $this->obj3 =$this->columnas[0]->getConfig($det);

    $this->manordtra->setObj3($this->obj3);
  }  

  public function configGridComponentes($numord='', $arreglo=array())
  {
    $c= new Criteria();
    $c->add(MancomordPeer::NUMORD,$numord);
    $det= MancomordPeer::doSelect($c);
     

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/manordtra/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_componentes');
    
    $this->obj4 =$this->columnas[0]->getConfig($det);

    $this->manordtra->setObj4($this->obj4);
  } 

  public function configGridRRHHReal($numord='')
  {
    $c= new Criteria();
    $c->add(ManrhcordPeer::NUMORD,$numord);
    $det= ManrhcordPeer::doSelect($c);     

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/manordtra/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_rrhh_cierre');
    
    $this->obj5 =$this->columnas[0]->getConfig($det);

    $this->manordtra->setObj5($this->obj5);
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
          $q->add(ManregequPeer::NUMEQU,$codigo);
          $reg= ManregequPeer::doSelectOne($q);
          if ($reg)
          {
             $dato=$reg->getNomequ();             
             $centro=$reg->getCodcencos().' - '.$reg->getDescencos();
             $estatus=$reg->getCodest().' - '.$reg->getDesest();
             $tipequ=$reg->getCodteq().' - '.$reg->getDesteq();

             $output = '[["'.$cajtexmos.'","'.$dato.'",""],["manordtra_centro","'.$centro.'",""],
             ["manordtra_estatus","'.$estatus.'",""],["manordtra_tipequ","'.$tipequ.'",""],
             ["javascript","'.$js.'",""]]';
          }else {
            $js="alert_('El C&oacute;digo del Equipo no esta registrado'); $('manordtra_numequ').value=''; $('manordtra_nomequ').value=''; $('manordtra_centro').value=''; $('manordtra_estatus').value=''; $('manordtra_tipequ').value=''; $('manordtra_numequ').focus();";
            $output = '[["javascript","'.$js.'",""]]';        
          }
        break;
      case '2':  
          $q= new Criteria();
          $q->add(ManactestPeer::CODACT,$codigo);
          $reg= ManactestPeer::doSelectOne($q);
          if ($reg)
          {
             $desact=$reg->getDesact();
             $priori=$reg->getPriori();
             
             $cedemp=$reg->getCedemp();
             $nomemp=$reg->getNomemp();

             $cedres=$reg->getCedres();
             $nomres=$reg->getNomempp();

             $codtma=$reg->getCodtma();
             $destma=$reg->getDestma();

             $tipo=$reg->getTipord();

             $codgrr=$reg->getCodgrr();
             $desgrr=$reg->getDesgrr();

             $js="CargarTareas('$codigo'); CargarRRHH('$codigo');";
             $output = '[["manordtra_desact","'.$desact.'",""],["manordtra_priori","'.$priori.'",""],["manordtra_cedemp","'.$cedemp.'",""],["manordtra_nomemp","'.$nomemp.'",""],
             ["manordtra_cedres","'.$cedres.'",""],["manordtra_nomempp","'.$nomres.'",""],
             ["manordtra_codtma","'.$codtma.'",""],["manordtra_destma","'.$destma.'",""],
             ["manordtra_tipord","'.$tipo.'",""],
             ["manordtra_codgrr","'.$codgrr.'",""],["manordtra_desgrr","'.$desgrr.'",""],
             ["javascript","'.$js.'",""]]';
          }else{
            $js="alert_('El Est&aacute;ndar de Trabajo no existe'); $('manordtra_codact').value=''; $('manordtra_codact').focus();";
            $output = '[["javascript","'.$js.'",""]]';        
          }
          break;
      case '3':  
          $codsis=$this->getRequestParameter('codsis'); 
          $q= new Criteria();
          $q->add(MansinfalPeer::CODSFA,$codigo);
          $q->add(MansinfalPeer::CODSIS,$codsis);
          $reg= MansinfalPeer::doSelectOne($q);
          if ($reg)
          {
            $dato=$reg->getDessfa();
          }else
            $js="alert_('El S&iacuet;ntoma de la Falla no existe o est&aacute; Asociado a ese Sistema de Operaci&oacute;n'); $('manordtra_codsfa').value=''; $('manordtra_codsfa').focus();";   
          
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '4':  
          $codsfa=$this->getRequestParameter('codsfa'); 
          $q= new Criteria();
          $q->add(MandeffalPeer::CODDFA,$codigo);
          $q->add(MandeffalPeer::CODSFA,$codsfa);
          $reg= MandeffalPeer::doSelectOne($q);
          if ($reg)
          {
            $dato=$reg->getDesdfa();
          }else
            $js="alert_('El Defecto de la Falla no existe o est&aacute; Asociado a ese S&iacute;ntoma'); $('manordtra_coddfa').value=''; $('manordtra_coddfa').focus();";   
          
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '5':  
          $coddfa=$this->getRequestParameter('coddfa'); 
          $q= new Criteria();
          $q->add(MancaufalPeer::CODCFA,$codigo);
          $q->add(MancaufalPeer::CODDFA,$coddfa);
          $reg= MancaufalPeer::doSelectOne($q);
          if ($reg)
          {
            $dato=$reg->getDescfa();
          }else
            $js="alert_('La Causa de la Falla no existe o est&aacute; Asociado a ese Defecto'); $('manordtra_codcfa').value=''; $('manordtra_codcfa').focus();";   
          
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '6':
          $q= new Criteria();
          $q->add(ManordtraPeer::CODACT,$codigo);
          $reg= ManordtraPeer::doSelectOne($q);
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

             $js="$('manordtra_codact').value=''; $('manordtra_desact').value=''; $('manordtra_codgru').value=''; $('manordtra_desgru').value=''; CargarTareas('$codigo'); CargarRRHH('$codigo');";
             $output = '[["manordtra_priori","'.$priori.'",""],["manordtra_cedemp","'.$cedemp.'",""],["manordtra_nomemp","'.$nomemp.'",""],
             ["manordtra_cedres","'.$cedres.'",""],["manordtra_nomempp","'.$nomres.'",""],
             ["manordtra_codtma","'.$codtma.'",""],["manordtra_destma","'.$destma.'",""],
             ["manordtra_tipord","'.$tipo.'",""],
             ["manordtra_codgrr","'.$codgrr.'",""],["manordtra_desgrr","'.$desgrr.'",""],
             ["javascript","'.$js.'",""]]';
          }else
            $output = '[["manordtra_numord","########",""]]';        
        break;
      case '7':
        $sw=false;
        $codigo=$this->getRequestParameter('codigo');    
      
        $this->params=array();
        $this->labels = $this->getLabels();
        $this->manordtra = $this->getManordtraOrCreate();
        $this->configGridTareas('',$codigo,'S');
        $output = '[["javascript","'.$js.'",""]]';
        break;
      case '8':
        $sw=false;
        $codigo=$this->getRequestParameter('codigo');    
      
        $this->params=array();
        $this->labels = $this->getLabels();
        $this->manordtra = $this->getManordtraOrCreate();
        $this->configGridRRHH('',$codigo,'S');
        $output = '[["javascript","'.$js.'",""]]';
        break;
      case '9':
        $sw=false;
        $this->formulario=array();
        $this->idfilareq="";
        $this->i="";
        $i=0;
        $form="sf_admin/manordtra/almreq";
        $f[$i]=$form.$i;
        $this->getUser()->setAttribute('idfilareq',$codigo,$f[$i]);
        $this->formulario=$f;
        $this->idfilareq=$codigo;
        $this->i=$i;
        $output = '[["","",""],["","",""],["","",""]]';
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
    $grid1 = Herramientas::CargarDatosGridv2($this,$this->obj1);
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);
    $grid3 = Herramientas::CargarDatosGridv2($this,$this->obj3);
    $grid4 = Herramientas::CargarDatosGridv2($this,$this->obj4);
    $grid5 = Herramientas::CargarDatosGridv2($this,$this->obj5);

  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    $grid1 = Herramientas::CargarDatosGridv2($this,$this->obj1);
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);
    $grid3 = Herramientas::CargarDatosGridv2($this,$this->obj3);
    $grid4 = Herramientas::CargarDatosGridv2($this,$this->obj4);
    $grid5 = Herramientas::CargarDatosGridv2($this,$this->obj5);
    Mantenimiento::salvarOrdendeTrabajo($clasemodelo,$grid,$grid1,$grid2,$grid3,$grid4,$grid5);
    return -1;
  }

  public function deleting($clasemodelo)
  {
    H::EliminarRegistro('Mantarord','Numord',$clasemodelo->getNumord());
    H::EliminarRegistro('Manrehord','Numord',$clasemodelo->getNumord());
    H::EliminarRegistro('Mandetreq','Numord',$clasemodelo->getNumord());
    H::EliminarRegistro('Manavaord','Numord',$clasemodelo->getNumord());
    H::EliminarRegistro('Mancomord','Numord',$clasemodelo->getNumord());
    H::EliminarRegistro('Manrhcord','Numord',$clasemodelo->getNumord());
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
              case ('4'):  //Código Lista de Repuestos
                $c= new Criteria();
                $c->add(ManesttraPeer::CODEST,$grid[$fila][$col-1]);
                $reg= ManesttraPeer::doSelectOne($c);
                if ($reg)
                  $grid[$fila][$col]=$reg->getDesest();
                else {
                  $javascript = "alert_('El Est&aacute;ndar de Trabajo no Existe');";
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
        case ('c'):   //grid Requisiciones 
            switch ($col) { 
              case ('1'):  //Número de Requisición
              if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
              {
                $c= new Criteria();
                $c->add(CareqartPeer::REQART,$grid[$fila][$col-1]);
                $reg= CareqartPeer::doSelectOne($c);
                if (!$reg){
                  $javascript = "alert_('La Requisici&oacute;n no Existe');";
                  $grid[$fila][$col-1]="";
                } 
              }else {
                  $javascript = "alert_('La Requisici&oacute;n esta repetida');";
                  $grid[$fila][$col-1]="";
              }
                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;      
              default:
                break;
            }
          break;    
        case ('e'):   //grid Componentes 
            switch ($col) { 
              case ('3'):  //Tipo de componente
                $c= new Criteria();
                $c->add(MantipcomPeer::CODTCO,$grid[$fila][$col-1]);
                $reg= MantipcomPeer::doSelectOne($c);
                if ($reg)
                  $grid[$fila][$col]=$reg->getDestco();
                else {
                  $javascript = "alert_('El Tipo de Componente no Existe');";
                  $grid[$fila][$col-1]="";
                  $grid[$fila][$col]="";
                } 
                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;        
              default:
                break;
            }
          break;    
        case ('f'):   //grid RRHH Real 
            switch ($col) { 
              case ('1'):  //Cédula del Empleado
                $c= new Criteria();
                $c->add(NphojintPeer::CEDEMP,$grid[$fila][$col-1]);
                $reg= NphojintPeer::doSelectOne($c);
                if ($reg)
                  $grid[$fila][$col]=$reg->getNomemp();
                else {
                  $javascript = "alert_('La C&eacute;dula del Empleado no Existe');";
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
