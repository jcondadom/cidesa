<?php

/**
 * nomasonomcontur actions.
 *
 * @package    siga
 * @subpackage nomasonomcontur
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nomasocptjorActions extends autonomasocptjorActions
{
  public function executeIndex()
  {
    return $this->forward('nomasocptjor', 'edit');
  }  
    
    
  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
      $this->configGrid();

  }

    public function configGrid($codjor = '', $codnom='') {
        
        $c = new Criteria();
        $c->add(NpjorcptPeer::CODJOR, $codjor);
        $c->add(NpjorcptPeer::CODNOM, $codnom);
        $reg = NpjorcptPeer :: doSelect($c);
        

        $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/nomasocptjor/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_det_nom');
        
        $params = array('param1' => "'+$('npjorcpt_codnom').value+'",'val2');
        $this->columnas[1][0]->setCatalogo('npdefcpt', 'sf_admin_edit_form', array('Codcon' => 1, 'Nomcon' => 2), 'Npdefcpt_Vacdefgen', $params);
        
        $this->obj = $this->columnas[0]->getConfig($reg);

        $this->npjorcpt->setObj($this->obj);
    }    

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $js=""; $dato=""; $sw=true;
    switch ($ajax){
      case '1':
          $t= new Criteria();
          $t->add(NpjorturPeer::CODJOR,$codigo);
          $reg= NpjorturPeer::doSelectOne($t);
          if($reg)
          {
              $dato=$reg->getDesjor();
          }else {
              $js="alert('La Jornada no se encuentra definida'); $('npjorcpt_codjor').value=''; $('npjorcpt_codjor').focus();";
          }         
          
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '2':        
        $jornada = $this->getRequestParameter('jornada','');
        $sw=false;  
        $c= new Criteria();
        $c->add(NpnominaPeer::CODNOM,$codigo);
        $reg= NpnominaPeer::doSelectOne($c);
        if ($reg)
        {
            if ($jornada!='')
            {
                $dato=$reg->getNomnom();
            }else {
               $js="alert('Debe Seleccionar la Jornada'); $('npjorcpt_codnom').value=''; $('npjorcpt_codnom').focus();"; 
               $codigo=""; $jornada="";
            }
        }else {
           $js="alert_('La N&oacute;mina no existe'); $('npjorcpt_codnom').value=''; $('npjorcpt_codnom').focus();"; 
           $codigo=""; $jornada="";
        }
        $this->params=array();
        $this->npjorcpt = $this->getNpjorcptOrCreate();
        $this->updateNpjorcptFromRequest();
        $this->labels = $this->getLabels();
        $this->configGrid($jornada,$codigo);
        
        $output = '[["javascript","'.$js.'",""],["'.$cajtexmos.'","'.$dato.'",""],["","",""]]';
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
        
        $this->npjorcpt = $this->getNpjorcptOrCreate();
      $this->updateNpjorcptFromRequest();
      $this->configGrid();	  
      $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
	  
      if(count($grid[0])==0)
      {
            $this->coderr=4;
      }	  

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
    Nomina::salvarJornadasConceptos($clasemodelo,$grid);
    return -1;
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
    $codjor= $this->getRequestParameter('npjorcpt_codjor','');
    $codnom= $this->getRequestParameter('npjorcpt_codnom','');    
    $fila = $this->getRequestParameter('fila','');
    $col = $this->getRequestParameter('columna', '');
    $javascript="";  $jsonextra=""; $com='';

    switch ($col) {
          case '1':
              if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
              {
                 $w= new Criteria();
                 $w->add(NpdefcptPeer::CODCON,$grid[$fila][$col-1]);
                 $reg= NpdefcptPeer::doSelectOne($w);
                 if ($reg)
                 {
                    $q= new Criteria();
                    $q->add(NpasiconnomPeer::CODNOM,$codnom);
                    $q->add(NpasiconnomPeer::CODCON,$grid[$fila][$col-1]);
                    $result = NpasiconnomPeer::doSelectOne($q);
                    if ($result)
                    {
                       $grid[$fila][1]=$reg->getNomcon();   
                    }else {
                        $grid[$fila][$col-1]="";
                          $grid[$fila][1]="";
                         $javascript="alert_('El Concepto no esta Asociado a esa N&oacute;mina');";
                    }
                 }else {
                     $grid[$fila][$col-1]="";
                  $grid[$fila][1]="";
                 $javascript="alert('El Concepto no existe');";
                 }                     
              }else {
                  $grid[$fila][$col-1]="";
                  $grid[$fila][1]="";
                 $javascript="alert('El Concepto esta Repetido');";
              }
            $jsonextra = ',["javascript","' . $javascript . '",""]'.$com;
            break;
          default:
            break;
        }

    $output = Herramientas::grid_to_json($grid,$name,$jsonextra);
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::HEADER_ONLY;
  }  

}
