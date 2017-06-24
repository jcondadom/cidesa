<?php

/**
 * tesfirmascheq actions.
 *
 * @package    siga
 * @subpackage tesfirmascheq
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class tesfirmascheqActions extends autotesfirmascheqActions
{

  public function executeIndex()
  {
    return $this->forward('tesfirmascheq', 'edit');
  }

  /**
   * Función para colocar el codigo necesario en
   * el proceso de edición.
   * Aquí se pueden buscar datos adicionales que necesite la vista
   * Esta función es parte de la acción executeEdit, que maneja tanto
   * el create como el edit del formulario.
   * Generalmente aqui se debe y puede colocar los llamados a los configGrid
   * Para generar la información de configuración de los grids.
   *
   */
  public function editing()
  {
    $this->configGrid();
    $this->tscheemi->setFilasord($this->filas);
  }

   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid()
  {
    $this->configGridCheques();
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridCheques($numchedes='',$numchehas='', $fecdes='', $fechas='', $cedrifdes='', $cedrifhas='')
  {
    $detalle=array();
    $sql="";
    if (($numchedes!='' && $numchehas!='') || ($fecdes!='' && $fechas!='') || ($cedrifdes!='' && $cedrifhas!='')){
      $c = new Criteria();
      if ($numchedes!='' && $numchehas!=''){
        $sql="(tscheemi.numche>='$numchedes' and tscheemi.numche<='$numchehas')";
      }
      if ($fecdes!='' && $fechas!=''){
        if ($sql!='')
          $sql.=" and (tscheemi.fecemi>='$fecdes' and tscheemi.fecemi<='$fechas')";
        else
           $sql="(tscheemi.fecemi>='$fecdes' and tscheemi.fecemi<='$fechas')";
      }
      if ($cedrifdes!='' && $cedrifhas!=''){
        if ($sql!='')
           $sql.=" and (tscheemi.cedrif>='$cedrifdes' and tscheemi.cedrif<='$cedrifhas')";
        else
           $sql="(tscheemi.cedrif>='$cedrifdes' and tscheemi.cedrif<='$cedrifhas')";
      }
      $c->add(TscheemiPeer::STATUS,'F');
      if ($sql!='') $c->add(TscheemiPeer::NUMCHE,$sql,Criteria::CUSTOM);
      $c->addAscendingOrderByColumn(TscheemiPeer::FECEMI);
      $detalle = TscheemiPeer::doSelect($c);
    }

    $this->filas=count($detalle);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/tesfirmascheq/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_cheques');

    $this->objeto =$this->columnas[0]->getConfig($detalle);

    $this->tscheemi->setObjeto($this->objeto);
  }

  public function updateError()
  {
    $this->configGrid();
    $grid=Herramientas::CargarDatosGridv2($this,$this->objeto);
  }

   /**
   * Función que debe ser reescrita en la clase que hereda para
   * implementar el proceso de guardado adecuado para cada formulario.
   *
   */
  protected function saving($tscheemi)
  {
    $grid=Herramientas::CargarDatosGridv2($this,$this->objeto);
    Cheques::ActualizarEstatusCheques($grid);
    return -1;

  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $js=""; $dato="";

    switch ($ajax){      
      default:
          $numche1 = $this->getRequestParameter('tscheemi[numche1]','');
          $numche2 = $this->getRequestParameter('tscheemi[numche2]','');
          $fecord1 = $this->getRequestParameter('tscheemi[fecemi1]');  $fecemi1="";
          if ($fecord1!=""){
            $dateFormat = new sfDateFormat('es_VE');
            $fecemi1 = $dateFormat->format($fecord1, 'i', $dateFormat->getInputPattern('d'));
          }else $fecemi1="";
          $fecord2 = $this->getRequestParameter('tscheemi[fecemi2]'); $fecemi2="";
          if ($fecord2!=""){
              $dateFormat = new sfDateFormat('es_VE');
              $fecemi2 = $dateFormat->format($fecord2, 'i', $dateFormat->getInputPattern('d'));
          }else $fecemi2="";    
          $cedrif1 = $this->getRequestParameter('tscheemi[cedrif1]','');
          $cedrif2 = $this->getRequestParameter('tscheemi[cedrif2]','');

          $this->params=array();
          $this->tscheemi = $this->getTscheemiOrCreate();
          $this->updateTscheemiFromRequest();
          $this->labels = $this->getLabels();
          $this->configGridCheques($numche1, $numche2, $fecemi1, $fecemi2, $cedrif1, $cedrif2);
          $this->tscheemi->setFilasord($this->filas);
          $numfilas=$this->filas;
          
        $output = '[["tscheemi_filasord","'.$numfilas.'",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

  }  
}
