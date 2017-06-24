<?php

/**
 * nomdefturnos actions.
 *
 * @package    siga
 * @subpackage nomdefturnos
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nomdefturnosActions extends autonomdefturnosActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
      $this->configGrid($this->npturnos->getCodtur());

  }

    /**
    * Esta función permite definir la configuración del grid de datos
    * que contiene el formulario. Esta función debe ser llamada
    * en las acciones, create, edit y handleError para recargar en todo momento
    * los datos del grid.
    *
    */
    public function configGrid($codtur = '') {
        $c = new Criteria();
        $c->add(NpdetturPeer::CODTUR, $codtur);
        $detw = NpdetturPeer :: doSelect($c);
       

        $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/nomdefturnos/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_detalle');
        
        $this->obj = $this->columnas[0]->getConfig($detw);

        $this->npturnos->setObj($this->obj);
    }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtextmos = $this->getRequestParameter('cajtexmos','');
    $cajtextcom = $this->getRequestParameter('cajtexcom','');
    $dato=""; $js="";
    switch ($ajax){
      case '1':
          $p= new Criteria();
          $p->add(NpjorturPeer::CODJOR,$codigo);
          $reg= NpjorturPeer::doSelectOne($p);
          if ($reg)
          {
              $dato=$reg->getDesjor();
          }else {
              $js="alert('La Jornada no existe...'); $('$cajtextcom').value=''; $('$cajtextcom').focus();";
          }
        $output = '[["'.$cajtextmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
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
        
      $this->npturnos = $this->getNpturnosOrCreate();
      $this->updateNpturnosFromRequest();
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
    Nomina::salvarTurnos($clasemodelo,$grid);
    return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    $datos=H::getX_vacio('CODTUR','Npgrutur', 'Codtur', $clasemodelo->getCodtur());
    if ($datos!='')
        return 6;
    else {
        H::EliminarRegistro('Npdettur', 'Codtur', $clasemodelo->getCodtur());
        $clasemodelo->delete();
      return -1;
    }
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
    $codtur= $this->getRequestParameter('npturnos_codtur','');
    $fila = $this->getRequestParameter('fila','');
    $col = $this->getRequestParameter('columna', '');
    $javascript="";  $jsonextra=""; $com='';

    switch ($col) {
          case '1':
              if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
              {
                 $w= new Criteria();
                 $w->add(NpjorturPeer::CODJOR,$grid[$fila][$col-1]);
                 $reg= NpjorturPeer::doSelectOne($w);
                 if ($reg)
                 {
                       $grid[$fila][1]=$reg->getDesjor();                       
                 }else {
                     $grid[$fila][$col-1]="";
                  $grid[$fila][1]="";
                 $javascript="alert('La Jornada no existe');";
                 }                     
              }else {
                  $grid[$fila][$col-1]="";
                  $grid[$fila][1]="";
                 $javascript="alert('La Jornada esta Repetida');";
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
