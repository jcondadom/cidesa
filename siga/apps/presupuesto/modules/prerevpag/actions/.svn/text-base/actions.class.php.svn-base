<?php

/**
 * prerevpag actions.
 *
 * @package    siga
 * @subpackage prerevpag
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class prerevpagActions extends autoprerevpagActions
{

  public function executeIndex()
  {
    return $this->forward('prerevpag', 'edit');
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
     $this->configGrid();
  }
    /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($refpag='') {
      $t = new Criteria();
      $t->add(CpimppagPeer::REFPAG,$refpag);
      $reg2 = CpimppagPeer::doSelect($t);

      $this->columnas = Herramientas :: getConfigGrid('grid_detpagado');

      $mascara=H::formatoPresupuesto();
      $loncod=strlen($mascara);      
      
      $this->columnas[1][2]->setHTML('type="text" size="40" maxlength="'.chr(39).$loncod.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
      $this->columnas[1][2]->setCatalogo('cpasiini','sf_admin_edit_form',array('codpre' => 3),'PrePagar_Cpasiini');
      
      $this->obj = $this->columnas[0]->getConfig($reg2);
        
      $this->cpdocpag->setObj($this->obj);
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
        $c->add(CppagosPeer::REFPAG,$codigo);
        $reg= CppagosPeer::doSelectOne($c);
        if ($reg)
        {
          $dato=$reg->getDespag();
        }else {
          $codigo="";
          $js="alert_('El Pagado no esta registrado'); $('cpdocpag_refpag').value=''; $('cpdocpag_refpag').focus();";
        }
        $this->params=array();
        $this->cpdocpag = $this->getCpdocpagOrCreate();
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
    Presupuesto::ReversarPagado($clasemodelo,$grid);
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
          case '3':
              if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
              {
                  $t= new Criteria();
                  $t->add(CpasiiniPeer::CODPRE,$grid[$fila][$col-1]);
                  $reg= CpasiiniPeer::doSelectOne($t);
                  if ($reg)
                  {
                     $grid[$fila][$col]=$reg->getDescate();                      
                  }else {                  
                     $grid[$fila][$col-1]="";
                     $javascript="alert('El C&oacute;digo Presupuestario no existe');";
                  }                    
              }else {
                  
                 $grid[$fila][$col-1]="";
                 $javascript="alert('El C&oacute;digo Presupuestario esta repetida');";
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
