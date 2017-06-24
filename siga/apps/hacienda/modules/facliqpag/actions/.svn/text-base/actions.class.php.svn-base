<?php

/**
 * facliqpag actions.
 *
 * @package    siga
 * @subpackage facliqpag
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */
class facliqpagActions extends autofacliqpagActions {

  private $msjpag = '';

  // Para incluir funcionalidades al executeEdit()
  public function editing() {
    $this->configGrid();
  }

  public function configGrid($fechaini='', $fechafin='') {
    $acum = 0;
    $datos = array();
    if ($fechaini != '' && $fechafin != '') {
      $sql = "fecpag >= To_Date('" . $fechaini . "','DD/MM/YYYY') and fecpag <= To_Date('" . $fechafin . "','DD/MM/YYYY') ";
      $c = new Criteria();
      $c->add(FcpagosPeer::FECPAG, $sql, Criteria::CUSTOM);
      $c->add(FcpagosPeer::EDOPAG, 'V', Criteria::LIKE);
      $c->addAscendingOrderByColumn(FcpagosPeer::NUMPAG);
      $per = FcpagosPeer :: doSelect($c);
      foreach ($per as $reg) {
        $d = new Criteria();
        $d->add(FcdetpagPeer::NUMPAG, $reg->getNumpag());
        $fcdetpag = FcdetpagPeer::doSelect($d);
        if ($fcdetpag) {
          $acum = 0;
          foreach ($fcdetpag as $v) {
            $fc = new Criteria();
            $fc->add(FctippagPeer::TIPPAG, $v->getTippag());
            $lista = FctippagPeer::doSelectOne($fc);
            //if (strtoupper($lista->getDespag()) == 'EFECTIVO') {
              $acum = $acum + H::toFloat($v->getMonpag());
            //}
          }
        }
        $fcdetliq = new Fcdetliq();
        $fcdetliq->setNumpag($reg->getNumpag());
        $fcdetliq->setFecpag($reg->getFecpag());
        $fcdetliq->setRifcon($reg->getRifcon());
        $fcdetliq->setNomcon($reg->getNomcon());
        $fcdetliq->setDespag($reg->getDespag());
        $fcdetliq->setMonpag(H::FormatoMonto($acum));
        $datos[] = $fcdetliq;
      }
    } else {
      $c = new Criteria();
      $c->add(FcdetliqPeer::NUMLIQ, $this->fcliqpag->getNumliq());
      $c->addAscendingOrderByColumn(FcdetliqPeer::NUMPAG);
      $datos = FcdetliqPeer :: doSelect($c);
      for ($i = 1; $i <= count($datos); $i++) {
        $datos[$i - 1]->setCheck('1');
      }
    }

    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/facliqpag/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid');

    $this->columnas[1][0]->setHTML('onClick="Totalizar()"');
    if ($this->fcliqpag->getId()) {
      $this->columnas[1][0]->setHTML('readonly="true"');
    }
    $this->grid = $this->columnas[0]->getConfig($datos);

    $this->fcliqpag->setGrid($this->grid);
  }

  public function executeAjax() {

    $codigo = $this->getRequestParameter('codigo', '');
    $ajax = $this->getRequestParameter('ajax', '');
    $javascript = "";
    $this->ajax = $ajax;
    switch ($ajax) {
      case '1':
        $nomcue = '';
        $c = new Criteria();
        $c->add(TsdefbanPeer::NUMCUE, $codigo);
        $tsdefban = TsdefbanPeer :: doSelectOne($c);
        if (!$tsdefban) {
          $javascript = $javascript . "alert('El Número de Cuenta no existe');";
        } else {

        }
        $output = '[["javascript","' . $javascript . '",""],["fcliqpag_nomcue","' . $nomcue . '",""],["","",""]]';
        break;
      case '2':
        $fecini = $this->getRequestParameter('fecini', '');
        $this->params = array();
        $this->fcliqpag = $this->getFcliqpagOrCreate();
        $this->updateFcliqpagFromRequest();
        $this->labels = $this->getLabels();
        $this->configGrid($fecini, $codigo);
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
    if ($ajax != '2') {
      return sfView::HEADER_ONLY;
    }
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

    if ($this->getRequest()->getMethod() == sfRequest::POST) {

      $fechaini = $this->getRequestParameter('fcliqpag[fechaini]');
      $fechafin = $this->getRequestParameter('fcliqpag[fechafin]');

      $this->fcliqpag = $this->getFcliqpagOrCreate();
      $this->updateFcliqpagFromRequest();
      $this->configGrid($fechaini, $fechafin);
      $grid = Herramientas::CargarDatosGridv2($this, $this->grid);
      $j = 0;
      $cont = 0;
      $x = $grid[0];
      while ($j < count($x)) {
        if ($x[$j]->getCheck() == '1') {
          if($x[$j]->getMonpag()<=0){
            $this->coderr = 767;
            return false;
          }
          $cont++;
        }
        $j++;
      }
      if ($cont == 0) {
        $this->coderr = 754;
        return false;
      }
      //Verificación de registro del deposito de la misma cuenta
      $id = $this->getRequestParameter('fcliqpag[id]');
      $cuenta = $this->getRequestParameter('fcliqpag[ctaban]');
      $deposito = $this->getRequestParameter('fcliqpag[nrodep]');

      $c = new Criteria();
      $c->add(FcliqpagPeer::CTABAN, $cuenta);
      $c->add(FcliqpagPeer::NRODEP, $deposito);
      if ($id) {
        $c->add(FcliqpagPeer::ID, $id, Criteria::NOT_EQUAL);
      }
      $datos = FcliqpagPeer :: doSelect($c);
      if ($datos) {
        $this->coderr = 755;
        return false;
      }
      $numliq = $this->getRequestParameter('fcliqpag[numliq]');
      $c = new Criteria();
      if ($id) {
        $c->add(FcliqpagPeer::ID, $id, Criteria::NOT_EQUAL);
      }
      $c->add(FcliqpagPeer::NUMLIQ, $numliq);
      $datos = FcliqpagPeer :: doSelect($c);
      if ($datos) {
        $this->coderr = 756;
        return false;
      }


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
    $this->configGrid();
    $grid = Herramientas::CargarDatosGridv2($this, $this->grid);
  }

  public function saving($clasemodelo) {
    $grid = Herramientas::CargarDatosGridv2($this, $this->grid);
    $msjuno = -1;
    $msjdos = "";
    $error = Hacienda::salvarFacliqpag($clasemodelo, $grid, $msjuno, $msjdos);
    if ($msjuno != -1) {
      $this->msjpag = $msjdos;
      return $msjuno;
    }
    return $error;
  }

  protected function saveFcliqpag($fcliqpag) {

    // habilitar la siguiente línea si se usa grid
    //$grid=Herramientas::CargarDatosGrid($this,$this->obj);

    try {

      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio, ej:
      // $coderr = Compras::salvarAlmaujoc($caajuoc,$grid);
      // OJO ----> Eliminar esta linea al modificar este método
      $this->coderr = $this->saving($fcliqpag);


      if (is_array($this->coderr)) {
        foreach ($this->coderr as $ERR) {
          $err = Herramientas::obtenerMensajeError($ERR);
          $this->getRequest()->setError('', $err);
          $this->updateError();
        }
        return sfView::SUCCESS;
      } elseif ($this->coderr != -1) {
        $err = Herramientas::obtenerMensajeError($this->coderr);
        $this->getRequest()->setError('', $err . '  ' . $this->msjpag);
        $this->updateError();
        return sfView::SUCCESS;
      }else
        return -1;
    } catch (Exception $ex) {

      $this->coderr = 0;
      $err = Herramientas::obtenerMensajeError($this->coderr);
      $this->getRequest()->setError('', $err);
      $this->updateError();
      return sfView::SUCCESS;
    }
  }

  public function deleting($clasemodelo) {


    $c1 = new Criteria();
    $c1->add(TsmovlibPeer::NUMCUE, $clasemodelo->getCtaban());
    $c1->add(TsmovlibPeer::REFLIB, $clasemodelo->getNrodep());
    $c1->add(TsmovlibPeer::TIPMOV, $clasemodelo->getCodtip());
    $mov = TsmovlibPeer::doSelect($c1);

    if ($mov) {
      foreach ($mov as $v) {
        if ($v->getStacon() != 'C') {
          $ing = new Criteria();
          $ing->add(CiregingPeer::CTABAN, $clasemodelo->getCtaban());
          $ing->add(CiregingPeer::NUMDEP, $clasemodelo->getNrodep());
          $ing->add(CiregingPeer::NUMCOM, $v->getNumcom());
          $cingreso = CiregingPeer::doSelect($ing);
          if ($cingreso) {
            foreach ($cingreso as $i) {
              //Eliminación Detalle de Ingreso
              $c = new Criteria();
              $c->add(CiimpingPeer::REFING, $i->getRefing());
              $c->add(CiimpingPeer::FECING, $i->getFecing());
              CiimpingPeer::doDelete($c);

              //Eliminacion del Comprobante
              $c = new Criteria();
              $c->add(ContabcPeer::NUMCOM, $i->getNumcom());
              $c->add(ContabcPeer::FECCOM, $i->getFecing());
              ContabcPeer::doDelete($c);

              $c = new Criteria();
              $c->add(Contabc1Peer::NUMCOM, $i->getNumcom());
              $c->add(Contabc1Peer::FECCOM, $i->getFecing());
              Contabc1Peer::doDelete($c);
            }
            $i->delete();
          }
          $v->delete();
        } else {
          return 1506;
        }
      }
    } else {
      return 1505;
    }

    $error = Hacienda::eliminarFacliqpag($clasemodelo);
    return $error;
  }

}
