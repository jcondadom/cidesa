<?php

/**
 * facasoclagru actions.
 *
 * @package    siga
 * @subpackage facasoclagru
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class facasoclagruActions extends autofacasoclagruActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
     $this->configGrid($this->fadefgru->getCodgru());
  }

   public function configGrid($codgru='')
  {
    $c = new Criteria();
    $c->add(FaclagruPeer :: CODGRU, $codgru);
    $det = FaclagruPeer :: doSelect($c);

    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/facasoclagru/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_clau');

    $this->obj = $this->columnas[0]->getConfig($det);

    $this->fadefgru->setObj($this->obj);
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
                 $w->add(FadefclaPeer::CODCLA,$grid[$fila][$col-1]);
                 $reg= FadefclaPeer::doSelectOne($w);
                 if ($reg)
                 {                    
                    $grid[$fila][1]=$reg->getDescla();                                        
                 }else {
                    $grid[$fila][$col-1]="";
                    $grid[$fila][1]="";
                    $grid[$fila][2]="";
                    $javascript="alert_('La Condicion no esta Registrada');";
                 }   
              }else {
                  $grid[$fila][$col-1]="";
                  $grid[$fila][1]="";
                  $grid[$fila][2]="";
                 $javascript="alert_('La Condicion esta Repetida');";
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
    Facturacion::grabarClausulasGrupo($clasemodelo,$grid);
    return -1;
  }

}
