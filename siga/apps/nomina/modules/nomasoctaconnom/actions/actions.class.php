<?php

/**
 * nomasoctaconnom actions.
 *
 * @package    siga
 * @subpackage nomasoctaconnom
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nomasoctaconnomActions extends autonomasoctaconnomActions
{
  public function executeIndex()
  {
    return $this->forward('nomasoctaconnom', 'edit');
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
     $this->configGrid();
  }

  
  public function configGrid($codcon='') {   
    $reg=array();
    $c = new Criteria();
    $c->add(NpasiconnomPeer::CODCON,$codcon);
    $c->addAscendingOrderByColumn(NpasiconnomPeer :: CODNOM);
    $npasiconnom =  NpasiconnomPeer::doSelect($c);
    if ($npasiconnom) {
      foreach($npasiconnom as $regconnom)
      {
          $aux= new Npctaconnom();
          $aux->setCodcon($regconnom->getCodcon());
          $aux->setCodnom($regconnom->getCodnom());
          $cri= new Criteria();
          $cri->add(NpctaconnomPeer::CODCON,$codcon);
          $cri->add(NpctaconnomPeer::CODNOM,$regconnom->getCodnom());
          $regctaconnom =  NpctaconnomPeer::doSelectOne($cri);
          if ($regctaconnom)            
            $aux->setCodcta($regctaconnom->getCodcta()); 
          $reg[] = $aux;
      }
    }
    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/nomasoctaconnom/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_cuentas');
    
    $this->obj = $this->columnas[0]->getConfig($reg);

    $this->npctaconnom->setObj($this->obj);
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
        $t->add(NpnominaPeer::CODNOM,$codigo);
        $reg= NpnominaPeer::doSelectOne($t);
        if($reg)
        {
            $dato=$reg->getNomnom();
        }else {
            $js="alert('La N&oacute;mina no se encuentra registrada'); $('npctaconnom_codnom').value=''; $('npctaconnom_nomnom').value=''; $('npctaconnom_codnom').focus();";
        }         
          
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '2':        
        $sw=false;  
        $c= new Criteria();
        $c->add(NpdefcptPeer::CODCON,$codigo);
        $reg= NpdefcptPeer::doSelectOne($c);
        if ($reg)
        {
          $dato=$reg->getNomcon();
        }else {
           $js="alert_('El Concepto no existe'); $('npctaconnom_codcon').value=''; $('npctaconnom_nomcon').value=''; $('npctaconnom_codcon').focus();"; 
           $codigo="";
        }
        $this->params=array();
        $this->npctaconnom = $this->getNpctaconnomOrCreate();
        $this->updateNpctaconnomFromRequest();
        $this->labels = $this->getLabels();
        $this->configGrid($codigo);
        
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

      $this->npctaconnom = $this->getNpctaconnomOrCreate();
      $this->updateNpctaconnomFromRequest();
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
    Nomina::salvarCuentasContablesConceptos($clasemodelo,$grid);
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
    $codcon= $this->getRequestParameter('npctaconnom_codcon','');
    $fila = $this->getRequestParameter('fila','');
    $col = $this->getRequestParameter('columna', '');
    $javascript="";  $jsonextra=""; $com='';

    switch ($col) {
          case '3':
              if (!Hacienda::Repetido2($grid,$grid[$fila][$col-1].'-'.$grid[$fila][$col-3],$fila,$col-1,$col-3))
              {
                 $w= new Criteria();
                 $w->add(ContabbPeer::CODCTA,$grid[$fila][$col-1]);
                 $w->add(ContabbPeer::CARGAB,'C');
                 $reg= ContabbPeer::doSelectOne($w);
                 if ($reg)
                 {
                   $grid[$fila][3]=$reg->getDescta();                       
                 }else {
                     $grid[$fila][$col-1]="";
                    $grid[$fila][3]="";
                   $javascript="alert('La Cuenta Contable no esta registrada o no es Cargable');";
                 }                     
              }else {
                  $grid[$fila][$col-1]="";
                  $grid[$fila][3]="";
                  $javascript="alert('La Cuenta Contable esta Repetida Con esa Nómina');";
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
