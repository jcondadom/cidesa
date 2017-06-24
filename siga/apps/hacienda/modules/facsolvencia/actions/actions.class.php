<?php

/**
 * facsolvencia actions.
 *
 * @package    siga
 * @subpackage facsolvencia
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */
class facsolvenciaActions extends autofacsolvenciaActions {

  // Para incluir funcionalidades al executeEdit()
  public function editing() {
    $this->setVars();
    $this->configGrid($this->fcsolvencia->getCodsol(),$this->fcsolvencia->getRifcon());
    $this->configGridrs($this->fcsolvencia->getCodsol(),$this->fcsolvencia->getRifcon());
  }

  public function setVars() {

    $this->fcsolvencia->setFunrec($this->fcsolvencia->getFunrec() == '' ? $this->getUser()->getAttribute('loguse') : $this->fcsolvencia->getFunrec());
  }

//Grid General
  public function configGrid($codigo='', $rifcon ="") {

    $c = new Criteria();
    $c->add(Fcsoldet2Peer::CODSOL, $codigo);
    $reg = Fcsoldet2Peer::doSelect($c);
    if (!($reg)) {
      if ($rifcon != '') {
        $c = new Criteria();
        $c->add(FcdeclarPeer::RIFCON, $rifcon);
        $c->addJoin(FcdeclarPeer::FUEING, FcfueprePeer::CODFUE);
        $c->addAscendingOrderByColumn(FcfueprePeer::CODFUE);
        $c->addAscendingOrderByColumn(FcdeclarPeer::NUMREF);
        $c->addAscendingOrderByColumn(FcdeclarPeer::FECVEN);
        $reg2 = FcdeclarPeer::doSelect($c);
        if (count($reg2) > 0) {
          foreach ($reg2 as $obj) {

            $fcsoldet2 = new Fcsoldet2();
            $fcsoldet2->setCodsol($codigo);
            $fcsoldet2->setCodfue($obj->getFueing());
            $fcsoldet2->setNomfue($obj->getNomfue());
            $fcsoldet2->setObjeto($obj->getNomabr() . '' . $obj->getNumref());
            $fcsoldet2->setFecven($obj->getFecven());
            $fcsoldet2->setEdodec($obj->getEdodec());
            if ($obj->getEdodec()=='P')
                    $fcsoldet2->setEdodecstatus('PAGADA');
            else if ($obj->getFecven()< date("Y-m-d"))
                    $fcsoldet2->setEdodecstatus('VENCIDA');
            else $fcsoldet2->setEdodecstatus('VIGENTE');
            $fcsoldet2->setConpag($obj->getConpag());
            $fcsoldet2->setFecultpag($obj->getFecultpag());
            $reg[] = $fcsoldet2;
          }
        }
      }
    }



    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir') . '/facsolvencia/' . sfConfig::get('sf_app_module_config_dir_name') . '/grid');

    $this->grid = $this->columnas[0]->getConfig($reg);
    $this->fcsolvencia->setGrid($this->grid);
  }

  //Grid Resumen
  public function configGridrs($codigo='', $rifcon ="") {
    $c = new Criteria();
    $c->add(FcsoldetPeer::CODSOL, $codigo);
    $reg = FcsoldetPeer::doSelect($c);
    if (!($reg)) {
      if ($rifcon != '') {
        $c = new Criteria();
        $c->add(FcdeclarPeer::RIFCON, $rifcon);
        $c->addJoin(FcdeclarPeer::FUEING, FcfueprePeer::CODFUE);
        $c->addAscendingOrderByColumn(FcfueprePeer::CODFUE);
        $c->addAscendingOrderByColumn(FcdeclarPeer::NUMREF);
        $c->addAscendingOrderByColumn(FcdeclarPeer::FECVEN);
        $reg2 = FcdeclarPeer::doSelect($c);
        if (count($reg2) > 0) {
          foreach ($reg2 as $obj) {

            $fcsoldet = new Fcsoldet();
            $fcsoldet->setCodsol($codigo);
            $fcsoldet->setCodfue($obj->getFueing());
            $fcsoldet->setNomfue($obj->getNomfue());
            $fcsoldet->setObjeto($obj->getNomabr() . '' . $obj->getNumref());
            $fcsoldet->setFecven(Hacienda::FecvSolvencia($obj->getEdodec(), $obj->getFecven()));
            $fcsoldet->setEdodec(Hacienda::EdodecSolvencia($obj->getEdodec(), $obj->getFecven()));
            if ($obj->getFecultpag()) {
              $fcsoldet->setFecultpag(Hacienda::FecuSolvencia($obj->getEdodec(), $obj->getFecultpag(), $obj->getFecven()));
            }
            $reg[] = $fcsoldet;
          }
        }
      }
    }

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir') . '/facsolvencia/' . sfConfig::get('sf_app_module_config_dir_name') . '/gridrs');

    $this->gridrs = $this->columnas[0]->getConfig($reg);
    $this->fcsolvencia->setGridrs($this->gridrs);
  }

  public function executeAjax() {

    $codigo = $this->getRequestParameter('codigo', '');
    $javascript = "";
    $ajax = $this->getRequestParameter('ajax', '');
    $cajtexmos = $this->getRequestParameter('cajtexmos', '');
    $codsol = $this->getRequestParameter('codsol', '');
    $rifcon = "";
    $nomcon = "";
    $dircon = "";
    $this->ajax = $ajax;

    switch ($ajax) {
      case '1':
        $tipo = $this->getRequestParameter('tipo');
        $this->params = array();
        $this->fcsolvencia = $this->getFcsolvenciaOrCreate();
        $this->labels = $this->getLabels();
        $this->fcsolvencia->setRifcon($codigo);
        $this->fcsolvencia->setTipo($tipo);

        break;
      case '2':

        $c = new Criteria();
        $c->add(FcconrepPeer::RIFCON, $codigo);
        $reg = FcconrepPeer::doSelectOne($c);

        $nomcon = '';
        $dircon = '';
        if (count($reg) > 0) {
          $rifcon = $reg->getRifcon();
          $nomcon = $reg->getNomcon();
          $dircon = $reg->getDircon();
          $javascript = "toAjaxUpdater('divgridrs',3,getUrlModulo()+'ajax','$rifcon','','&codigo=" . $codigo . "&codsol=" . $codsol . "');";
        } else {
          $javascript = $javascript . "alert('El Contribuyente no Existe, incluya todos sus Datos Basicos');";
        }
        $this->params = array();
        $this->fcsolvencia = $this->getFcsolvenciaOrCreate();
        $this->labels = $this->getLabels();
        $this->updateFcsolvenciaFromRequest();
        $this->configGrid($codsol, $codigo);



        $output = '[["fcsolvencia_dircon","' . $dircon . '",""],["fcsolvencia_nomcon","' . $nomcon . '",""],["javascript","' . $javascript . '",""],["fcsolvencia_rifcon","' . $codigo . '",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        //return sfView::HEADER_ONLY;
        break;
      case '3':
        $c = new Criteria();
        $c->add(FcconrepPeer::RIFCON, $codigo);
        $reg = FcconrepPeer::doSelectOne($c);
        $rifcon = $reg->getRifcon();
        $nomcon = '';
        $dircon = '';
        if (count($reg) > 0) {
          $nomcon = $reg->getNomcon();
          $dircon = $reg->getDircon();
        }

        $this->params = array();
        $this->fcsolvencia = $this->getFcsolvenciaOrCreate();
        $this->labels = $this->getLabels();
        $this->updateFcsolvenciaFromRequest();
        $this->configGridrs($codsol, $codigo);
        $output = '[["fcsolvencia_dircon","' . $dircon . '",""],["fcsolvencia_nomcon","' . $nomcon . '",""],["javascript","' . $javascript . '",""],["fcsolvencia_rifcon","' . $codigo . '",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    //// $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
//    return sfView::HEADER_ONLY;
    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.
  }

  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit() {
    $this->coderr = -1;

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if ($this->getRequest()->getMethod() == sfRequest::POST) {
      $this->fcsolvencia = $this->getFcsolvenciaOrCreate();
      $this->labels = $this->getLabels();
      $this->updateFcsolvenciaFromRequest();
      $this->configGrid('', $this->getRequestParameter('fcsolvencia[rifcon]'));
      $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
      $this->coderr = Hacienda::validarSolvencia($this->grid, $this->getRequestParameter('fcsolvencia[codtip]'),$this->fcsolvencia);

      if ($this->coderr != -1) {
        return false;
      } else
        return true;
    }else
      return true;
  }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError() {
    $this->setVars();
    $this->configGrid('', $this->getRequestParameter('fcsolvencia[rifcon]'));
    $this->configGridrs('', $this->getRequestParameter('fcsolvencia[rifcon]'));
    $grid = Herramientas::CargarDatosGridv2($this, $this->grid);
    $gridrs = Herramientas::CargarDatosGridv2($this, $this->gridrs);
  }

  public function saving($fcsolvencia) {
    $grid = Herramientas::CargarDatosGridv2($this, $this->grid);
    $gridrs = Herramientas::CargarDatosGridv2($this, $this->gridrs);
    return Hacienda::salvarFacsolvencia($fcsolvencia, $grid, $gridrs, $this->getUser()->getAttribute('loguse'));
  }

  public function deleting($fcsolvencia) {
    return Hacienda::eliminarSolvencia($fcsolvencia);
  }

}
