<?php

/**
 * viaasinivpri actions.
 *
 * @package    siga
 * @subpackage viaasinivpri
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class viaasinivpriActions extends autoviaasinivpriActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
      $this->configGrid($this->viadefpri->getCodpri());
  }

  public function configGrid($prima="")
  {
        $c = new Criteria();
        $c->add(VianivpriPeer :: CODPRI, $prima);
        $det = VianivpriPeer :: doSelect($c);

        $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/viaasinivpri/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid');

        $this->obj = $this->columnas[0]->getConfig($det);

        $this->viadefpri->setObj($this->obj);   
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

    $this->viadefpri = $this->getViadefpriOrCreate();
    $this->configGrid();
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    if (count($grid)==0)
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
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    Viaticos::salvarPrimaNiveles($clasemodelo,$grid);
    return -1;
  }
  
   /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
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
            $c->add(ViadefnivPeer::CODNIV,$grid[$fila][$col-1]);
            $reg= ViadefnivPeer::doSelectOne($c);
            if ($reg) {
              if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
              {
                  $grid[$fila][1]=$reg->getDesniv();
              }else {
                 $grid[$fila][$col-1]="";
                 $grid[$fila][1]="";
                 $javascript="alert('El Nivel esta Repetido');";
              }
            }else {
                $grid[$fila][$col-1]="";
                $grid[$fila][1]="";
                $javascript="alert('El Nivel no Existe ...');";
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
