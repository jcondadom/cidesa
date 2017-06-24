<?php

/**
 * manesttra actions.
 *
 * @package    siga
 * @subpackage manesttra
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class manesttraActions extends automanesttraActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
     $this->configGrid($this->manesttra->getCodest());
     if ($this->manesttra->getFeccre()=='')      
      $this->manesttra->setFeccre(date('Y-m-d'));    

  }

  public function configGrid($codest='')
  {
   $c= new Criteria();
   $c->add(MandetesttraPeer::CODEST,$codest);
   $det= MandetesttraPeer::doSelect($c);
     

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/manesttra/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_det');
    $mascara=H::getMascaraArticulo();
    $lonarti=strlen($mascara);

    $obj= array('codart' => 1, 'desart' => 2);
    $params= array('param1' => $lonarti, 'val2');

    $this->columnas[1][0]->setHTML('type="text" size="20" maxlength="'.chr(39).$lonarti.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;} perderfocus(event,this.id,3);"');
    $this->columnas[1][0]->setCatalogo('Caparfabart','sf_admin_edit_form',$obj,'Mantenimiento_Caparfabart',$params);
    $this->obj =$this->columnas[0]->getConfig($det);

    $this->manesttra->setObj($this->obj);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');

    switch ($ajax){
      case '1':
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::HEADER_ONLY;
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
  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    Mantenimiento::grabarDetalleEstandar($clasemodelo,$grid);
    return -1;
  }

  public function deleting($clasemodelo)
  {
    H::EliminarRegistro('Mandetesttra','Codest',$clasemodelo->getCodest());
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
        case ('a'):   //grid Detalle
            switch ($col) { 
              case ('1'):  //Código Artículo
               $lonart=strlen(H::getMascaraArticulo());
              if ($lonart==strlen($grid[$fila][$col-1])){
                $c= new Criteria();
                $c->add(CaregartPeer::CODART,$grid[$fila][$col-1]);
                $reg= CaregartPeer::doSelectOne($c);
                if ($reg)
                  $grid[$fila][$col]=$reg->getDesart();
                else {
                  $javascript = "alert_('El C&oacute;digo del Art&iacute;culo no Existe');";
                  $grid[$fila][$col-1]="";
                  $grid[$fila][$col]="";
                } 
              }else {
                 $javascript = "alert_('El C&oacute;digo del Art&iacute;culo no es de &Uacute;ltimo Nivel');";
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
