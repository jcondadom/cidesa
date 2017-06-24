<?php

/**
 * npasiconparxcar actions.
 *
 * @package    siga
 * @subpackage npasiconparxcar
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class npasiconparxcarActions extends autonpasiconparxcarActions
{

  public function executeIndex()
  {
    return $this->forward('npasiconparxcar', 'edit');
  }  

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
     $this->configGrid();
  }

  public function configGrid($codcar='')
  {
     $c= new Criteria();
     $c->add(NpasiconparcarPeer::CODCAR,$codcar);
     $per= NpasiconparcarPeer::doSelect($c);

     $mascarapar=H::getMascaraPartida();
     $lonpar=strlen($mascarapar);

     $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/npasiconparxcar/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
     $this->columnas[1][2]->setHTML('type="text" size="17" maxlength="'.chr(39).$lonpar.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascarapar.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
     $this->grid =$this->columnas[0]->getConfig($per);

     $this->npasiconparcar->setGrid($this->grid);      
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $dato=""; $js="";

    switch ($ajax){
      case '1':
        $c= new Criteria();
        $c->add(NpcargosPeer::CODCAR,$codigo);
        $reg= NpcargosPeer::doSelectOne($c);
        if ($reg)
        {
          $dato=$reg->getNomcar();
        }else {
          $codigo="";
          $js="alert_('El Cargo no esta registrado'); $('npasiconparcar_codcar').value=''; $('npasiconparcar_nomcar').value='';  $('npasiconparcar_codcar').focus();";
        }
        $this->params=array();
        $this->npasiconparcar = $this->getNpasiconparcarOrCreate();
        $this->labels = $this->getLabels();

        $this->configGrid($codigo);

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    //return sfView::HEADER_ONLY;
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

      $this->npasiconparcar = $this->getNpasiconparcarOrCreate();

      $this->configGrid();

      $grid = Herramientas::CargarDatosGridv2($this,$this->grid);

      $x=$grid[0];
      if (count($x)==0)
        $this->coderr=4;

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

    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
 }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
    Nomina::salvarAsigConcParCar($clasemodelo,$grid);
    return -1;
  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traer el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxgrid()
  {
    $name = $this->getRequestParameter('grid','a');
    $grid = $this->getRequestParameter('grid'.$name,'');
    $fila = $this->getRequestParameter('fila','');
    $col = $this->getRequestParameter('columna', '');
    $javascript="";  $jsonextra="";

    switch ($col) {
          case '1':
            if ($grid[$fila][2]!='') {
              if (!Hacienda::Repetido2($grid,$grid[$fila][$col-1].'-'.$grid[$fila][2],$fila,$col-1,$col+1))
              {
                  $t= new Criteria();
                  $t->add(NpdefcptPeer::CODCON,$grid[$fila][$col-1]);
                  $reg= NpdefcptPeer::doSelectOne($t);
                  if ($reg)
                  {
                     $grid[$fila][$col]=$reg->getNomcon();                      
                  }else {                  
                     $grid[$fila][$col-1]="";
                     $grid[$fila][$col]="";
                     $javascript="alert('La Concepto no existe');";
                  }                    
              }else {
                  
                 $grid[$fila][$col-1]="";
                 $grid[$fila][$col]="";
                 $javascript="alert('La Concepto esta repetido con esa misma Partida');";
              }   
            }else {
                $t= new Criteria();
                $t->add(NpdefcptPeer::CODCON,$grid[$fila][$col-1]);
                $reg= NpdefcptPeer::doSelectOne($t);
                if ($reg)
                {
                   $grid[$fila][$col]=$reg->getNomcon();                      
                }else {                  
                   $grid[$fila][$col-1]="";
                   $grid[$fila][$col]="";
                   $javascript="alert('La Concepto no existe');";
                }        
            }        
       
            $jsonextra = ',["javascript","' . $javascript . '",""]';
            break; 
          case '3':
              if ($grid[$fila][0]!='') {
                if (!Hacienda::Repetido2($grid,$grid[$fila][$col-1].'-'.$grid[$fila][0],$fila,$col-1, $col-3))
                {
                    $t= new Criteria();
                    $t->add(NppartidasPeer::CODPAR,$grid[$fila][$col-1]);
                    $reg= NppartidasPeer::doSelectOne($t);
                    if ($reg)
                    {
                       $grid[$fila][$col]=$reg->getNompar();                      
                    }else {                  
                       $grid[$fila][$col-1]="";
                       $grid[$fila][$col]="";
                       $javascript="alert('La Partida no existe');";
                    }                    
                }else {
                    
                   $grid[$fila][$col-1]="";
                   $grid[$fila][$col]="";
                   $javascript="alert('La Partida esta repetida con ese mismo Concepto');";
                }      
              }else {
                    
                   $grid[$fila][$col-1]="";
                   $grid[$fila][$col]="";
                   $javascript="alert('Debe seleccionar el Concepto');";
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
