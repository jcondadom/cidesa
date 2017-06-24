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

class nomasonomconturActions extends autonomasonomconturActions
{
  public function executeIndex()
  {
    return $this->forward('nomasonomcontur', 'edit');
  }  
    
    
  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
      $this->configGrid();

  }

    public function configGrid($codtur = '', $codnom='') {
        
        $c = new Criteria();
        $c->add(NpturcptPeer::CODTUR, $codtur);
        $c->add(NpturcptPeer::CODNOM, $codnom);
        $reg = NpturcptPeer :: doSelect($c);
        

        $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/nomasonomcontur/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_det_nom');
        
        $params = array('param1' => "'+$('npturcpt_codnom').value+'",'val2');
        $this->columnas[1][0]->setCatalogo('npdefcpt', 'sf_admin_edit_form', array('Codcon' => 1, 'Nomcon' => 2), 'Npdefcpt_Vacdefgen', $params);
        
        $this->obj = $this->columnas[0]->getConfig($reg);

        $this->npturcpt->setObj($this->obj);
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
          $t->add(NpturnosPeer::CODTUR,$codigo);
          $reg= NpturnosPeer::doSelectOne($t);
          if($reg)
          {
              $dato=$reg->getDestur();
          }else {
              $js="alert('El Turno no se encuentra definido'); $('npturcpt_codtur').value=''; $('npturcpt_codtur').focus();";
          }         
          
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '2':        
        $turno = $this->getRequestParameter('turno','');
        $sw=false;  
        $c= new Criteria();
        $c->add(NpnominaPeer::CODNOM,$codigo);
        $reg= NpnominaPeer::doSelectOne($c);
        if ($reg)
        {
            if ($turno!='')
            {
                $dato=$reg->getNomnom();
            }else {
               $js="alert('Debe Seleccionar el Turno'); $('npturcpt_codnom').value=''; $('npturcpt_codnom').focus();"; 
               $codigo=""; $turno="";
            }
        }else {
           $js="alert_('La N&oacute;mina no existe'); $('npturcpt_codnom').value=''; $('npturcpt_codnom').focus();"; 
           $codigo=""; $turno="";
        }
        $this->params=array();
        $this->npturcpt = $this->getNpturcptOrCreate();
        $this->updateNpturcptFromRequest();
        $this->labels = $this->getLabels();
        $this->configGrid($codigo,$turno);
        
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
   * FunciÃ³n que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones especÃ­ficas del negocio del formulario
   * Para mayor informaciÃ³n vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;

    if($this->getRequest()->getMethod() == sfRequest::POST){
        
        $this->npturcpt = $this->getNpturcptOrCreate();
      $this->updateNpturcptFromRequest();
      $this->configGrid();	  
      $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
	  
      if(count($grid[0])==0)
      {
            $this->coderr=4409;
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
    $this->configGrid();

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    Nomina::salvarTurnosNomCon($clasemodelo,$grid);
    return -1;
  }

  
  /**
   * FunciÃ³n para procesar _todas_ las funciones Ajax del formulario
   * Cada funciÃ³n esta identificada con el valor de la vista "ajax"
   * el cual traerÃ¡ el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxgrid()
  {
    $name = $this->getRequestParameter('grid','a');
    $grid = $this->getRequestParameter('grid'.$name,'');
    $codtur= $this->getRequestParameter('npturcpt_codtur','');
    $codnom= $this->getRequestParameter('npturcpt_codnom','');    
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
