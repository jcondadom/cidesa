<?php

/**
 * almevadespro actions.
 *
 * @package    siga
 * @subpackage almevadespro
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class almevadesproActions extends autoalmevadesproActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    if (!$this->caevadespro->getId()){
      $this->caevadespro->setFeceva(date('Y-m-d'));
       $t= new Criteria();
       $t->setLimit(1);
       $t->addDescendingOrderByColumn(CaevadesproPeer::CODEVA);
       $reg= CaevadesproPeer::doSelectOne($t);
       if ($reg)
       {
           $this->caevadespro->setCodeva(str_pad(($reg->getCodeva()+1),8,'0',STR_PAD_LEFT));
       }else $this->caevadespro->setCodeva('00000001');
    }
    $this->configGrid();
  }

  public function configGrid(){
    $this->configGridCuantitativo($this->caevadespro->getCodeva());
    $this->configGridCualitativo($this->caevadespro->getCodeva());
  }

    /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridCuantitativo($codeva='', $clapro= '') {
    $regt=array();
    $c = new Criteria();
    if ($clapro!= '') {         
      $c->add(CadepregPeer::TIPPRG, 'T');
      if ($clapro=='P')
        $c->add(CadepregPeer::PREPRO, true);
      elseif ($clapro=='I')
        $c->add(CadepregPeer::PREINS, true);
      elseif ($clapro=='S')
        $c->add(CadepregPeer::PREPYS, true);
      $dreg = CadepregPeer::doSelect($c);
      foreach ($dreg as $obj)
      {
        $capretevades2= new Capretevades();
        $capretevades2->setCodprg($obj->getCodprg());
        $regt[]=$capretevades2;
      }
    }else {
      $c->add(CapretevadesPeer::CODEVA , $codeva);
      $regt = CapretevadesPeer::doSelect($c);
    }
        
    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/almevadespro/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_t');

    $this->columnas[0]->setFilas(count($regt));
    $this->objt = $this->columnas[0]->getConfig($regt);

    $this->caevadespro->setObjt($this->objt);
  }

      /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridCualitativo($codeva='', $clapro= '') {
    $regl=array();
    $c = new Criteria();
    if ($clapro!= '') {         
      $c->add(CadepregPeer::TIPPRG, 'L');
      if ($clapro=='P')
        $c->add(CadepregPeer::PREPRO, true);
      elseif ($clapro=='I')
        $c->add(CadepregPeer::PREINS, true);
      elseif ($clapro=='S')
        $c->add(CadepregPeer::PREPYS, true);
      $dreg = CadepregPeer::doSelect($c);
      foreach ($dreg as $obj)
      {
        $caprelevades2= new Caprelevades();
        $caprelevades2->setCodprg($obj->getCodprg());
        $regl[]=$caprelevades2;
      }
    }else {
      $c->add(CaprelevadesPeer::CODEVA , $codeva);
      $regl = CaprelevadesPeer::doSelect($c);
    }
        
    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/almevadespro/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_l');
    
    $this->columnas[0]->setFilas(count($regl));

    $this->objl = $this->columnas[0]->getConfig($regl);

    $this->caevadespro->setObjl($this->objl);
  }


  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexcom = $this->getRequestParameter('cajtexcom');
    $cajtexmos = $this->getRequestParameter('cajtexmos');
    $js=""; $dato=""; $sw=true;

    switch ($ajax){
      case '1':
        $q= new Criteria();
        $q->add(CaproveePeer::RIFPRO,$codigo);
        $reg= CaproveePeer::doSelectOne($q);
        if ($reg){
          $dato=$reg->getNompro();
          $codpro=$reg->getCodpro();
          $dirpro=$reg->getDirpro();
          $telpro=$reg->getTelpro();
          $email=$reg->getEmail();
          $js="$('caevadespro_codpro').value='$codpro'; $('caevadespro_dirpro').value='$dirpro'; $('caevadespro_telpro').value='$telpro'; $('caevadespro_email').value='$email'; ";
        }else {
          $js="alert('El Proveedor no esta Registrado'); $('caevadespro_rifpro').value=''; $('caevadespro_nompro').value=''; $('caevadespro_codpro').value=''; $('caevadespro_dirpro').value=''; $('caevadespro_telpro').value=''; $('caevadespro_email').value=''; $('caevadespro_rifpro').focus();"; 
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["","",""],["javascript","'.$js.'",""]]';
        break;
      case '2':
        $sw=false;
        $this->ajax='2';
        $this->params=array();
        $this->caevadespro = $this->getCaevadesproOrCreate();
        $this->labels = $this->getLabels();
        $this->configGridCuantitativo('',$codigo);

        $js="toAjaxUpdater('divgridl',3,getUrlModuloAjax(),'$codigo');";
        
        $output = '[["","",""],["javascript","'.$js.'",""]]';
        break;
      case '3':
        $sw=false;
        $this->ajax='3';
        $this->params=array();
        $this->caevadespro = $this->getCaevadesproOrCreate();
        $this->labels = $this->getLabels();
        $this->configGridCualitativo('',$codigo);

        $output = '[["","",""],["javascript","'.$js.'",""]]';
        break;
      case '4':
        $lonniv = $this->getRequestParameter('longitud','');
        if (strlen($codigo)==$lonniv)
        {    
          $c = new Criteria();                            
          $c->add(NpestorgPeer::CODNIV,$codigo);                            
          $alm = NpestorgPeer::doSelectOne($c);
          if ($alm)
          {
            $dato=$alm->getDesniv();                       
          }else {
            $js="alert_('La Unidad Origen no esta Registrada'); $('caevadespro_codniv').value=''; $('caevadespro_desniv').value=''; $('caevadespro_codniv').focus();";
          }
        }else {
          $js="alert_('La Unidad Origen no es de &uacute;ltimo nivel'); $('caevadespro_codniv').value=''; $('caevadespro_desniv').value=''; $('caevadespro_codniv').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
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

    $gridt = Herramientas::CargarDatosGridv2($this,$this->objt);
    $gridl = Herramientas::CargarDatosGridv2($this,$this->objl);
  }

  public function saving($clasemodelo)
  {
    $gridt = Herramientas::CargarDatosGridv2($this,$this->objt);
    $gridl = Herramientas::CargarDatosGridv2($this,$this->objl);
    $arreglo=array('codeva');
    H::Guardar_Grid($gridt,$arreglo,$clasemodelo);
    H::Guardar_Grid($gridl,$arreglo,$clasemodelo);
    $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
    $clasemodelo->setLoguse($loguse);
    return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    Herramientas::EliminarRegistro("Capretevades", "Codeva", $clasemodelo->getCodeva());
    Herramientas::EliminarRegistro("Caprelevades", "Codeva", $clasemodelo->getCodeva());
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
    $javascript="";  $jsonextra="";
      switch ($name) {         
        case ('a'):  // grid Cunatitativo
          switch ($col) {                 
              case ('3'):  //Puntuación             
               if (H::toFloat($grid[$fila][$col-1])<=100 && H::toFloat($grid[$fila][$col-1])>=1)
                 $javascript="ActualizarSaldosGrid('a',ArrTotales_a); monto_total_eva();";
               else {
                  $grid[$fila][$col-1]="1,00";                        
                  $javascript="alert_('La Puntuaci&oacute;n debe estar en un rango entre 1 y 100');";
               }
              $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;         
              default:
                break;
            }
          break;
        case ('b'):  // grid Cualitativo
          switch ($col) {
             case ('3'):  //Puntuación             
               if (H::toFloat($grid[$fila][$col-1])<=100 && H::toFloat($grid[$fila][$col-1])>=1)
                 $javascript="ActualizarSaldosGrid('a',ArrTotales_b); monto_total_eva();";
               else {
                  $grid[$fila][$col-1]="1,00";                        
                  $javascript="alert_('La Puntuaci&oacute;n debe estar en un rango entre 1 y 100');";
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
