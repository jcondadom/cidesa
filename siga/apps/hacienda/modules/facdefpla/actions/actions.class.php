<?php

/**
 * facdefpla actions.
 *
 * @package    siga
 * @subpackage facdefpla
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class facdefplaActions extends autofacdefplaActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
      $this->configGrid($this->fcdefpla->getCodpla());
  }

  public function configGrid($codpla='')
  {
     $c= new Criteria();
     $c->add(FcplatasPeer::CODPLA,$codpla);
     $reg= FcplatasPeer::doSelect($c);

     $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/facdefpla/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_tasas');

     $this->grid = $this->columnas[0]->getConfig($reg);

     $this->fcdefpla->setGrid($this->grid);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $js=''; $dato='';
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
    $javascript="";  $jsonextra="";

    switch ($col) {
          case '1':
            $varop=$grid[$fila][$col-1];
            $c= new Criteria();
            $c->add(FcdeftasasPeer::CODTAS,$grid[$fila][$col-1]);
            $reg= FcdeftasasPeer::doSelectOne($c);
            if ($reg) {
              if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
              {
                  $grid[$fila][1]=$reg->getDestas();
              }else {
                 $grid[$fila][$col-1]="";
                 $grid[$fila][1]="";
                 $javascript="alert('La Tasa esta Repetida');";
              }
            }else {
                $grid[$fila][$col-1]="";
                $grid[$fila][1]="";
                $javascript="alert('La Tasa no Existe ...');";
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
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
    Hacienda::salvarPlanillas($clasemodelo,$grid);
    return -1;
  }

  public function deleting($clasemodelo)
  {
    H::EliminarRegistro('Fcplatas', 'CODPLA', $clasemodelo->getCodpla());
    $clasemodelo->delete();
    return -1;
  }


}
