<?php

/**
 * facdesartcli actions.
 *
 * @package    siga
 * @subpackage facdesartcli
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class facdesartcliActions extends autofacdesartcliActions
{
    
  public function executeIndex()
  {
    return $this->forward('facdesartcli', 'edit');
  }    

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
      $this->configGrid();
  }

  public function configGrid($fatipcte_id='')
  {
    $c = new Criteria();
    $c->add(FaartdtoctePeer::FATIPCTE_ID,$fatipcte_id);
    $reg = FaartdtoctePeer::doSelect($c);
    
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facdesartcli/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
    
    $mascara = Herramientas :: getMascaraArticulo();
    $lonarti = strlen($mascara);
    $obj = array ('codart' => 1, 'desart' => 2);
    $params2 = array ('param1' => $lonarti, 'val2');
    $this->columnas[1][0]->setHTML('type="text" size="17" maxlength="' . chr(39) . $lonarti . chr(39) . '" onKeyDown="javascript:return dFilter (event.keyCode, this,' . chr(39) . $mascara . chr(39) . ')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
    $this->columnas[1][0]->setCatalogo('caregart', 'sf_admin_edit_form', $obj, 'Caregart_Fapedido', $params2);
       
    $this->obj =$this->columnas[0]->getConfig($reg);

    $this->faartdtocte->setObj($this->obj);    

  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');
    $sw=true; $js=""; $dato="";
    switch ($ajax){
      case '1':
        $sw=false;
        $this->params=array();
        $this->labels = $this->getLabels();
        $this->faartdtocte = $this->getFaartdtocteOrCreate();
        $this->configGrid($codigo);
        $output = '[["","",""],["","",""],["","",""]]';
        break;       
      case '2':
         $t= new Criteria();
          $t->add(FadesctoPeer::CODDESC,$codigo);
          $reg= FadesctoPeer::doSelectOne($t);
          if($reg)
          {
              $dato=$reg->getDesdesc();
          }else {
              $js="alert('El Descuento no se encuentra definido'); $('".$cajtexcom."').value=''; $('".$cajtexcom."').focus();";
          }         
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
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
    Facturacionv2::SalvarDescuentosArticulosCliente($clasemodelo,$grid);
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
    $fila = $this->getRequestParameter('fila','');
    $col = $this->getRequestParameter('columna', '');
    $javascript="";  $jsonextra=""; $com='';
    switch ($col) {
          case '1':
              if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
              {
                 $w= new Criteria();
                 $w->add(CaregartPeer::CODART,$grid[$fila][$col-1]);
                 $reg= CaregartPeer::doSelectOne($w);
                 if ($reg)
                 {
                    $mascara = Herramientas :: getMascaraArticulo();
                    if (strlen($mascara)==strlen($grid[$fila][$col-1]))
                    {
                       $grid[$fila][1]=$reg->getDesart();   
                    }else {
                        $grid[$fila][$col-1]="";
                          $grid[$fila][1]="";
                         $javascript="alert_('El Art&iacute;culo no es de Ultimo Nivel');";
                    }
                 }else {
                     $grid[$fila][$col-1]="";
                     $grid[$fila][1]="";
                     $javascript="alert_('El Art&iacute;culo no existe');";
                 }                     
              }else {
                  $grid[$fila][$col-1]="";
                  $grid[$fila][1]="";
                 $javascript="alert_('El Art&iacute;culo esta Repetido');";
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
