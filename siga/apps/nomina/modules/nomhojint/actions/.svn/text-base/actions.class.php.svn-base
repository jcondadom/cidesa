<?php

/**
 * nomhojint actions.
 *
 * @package    Roraima
 * @subpackage nomhojint
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 43005 2011-03-14 15:57:07Z cramirez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomhojintActions extends autonomhojintActions {

  protected $coderr = -1;

 /* public function executeIndex()
  {
    $modulo=sfContext::getInstance()->getUser()->getAttribute('menu','','autenticacion');
    if ($modulo=='seguridad')
      return $this->forward('nomhojint', 'edit');
    else
      return $this->forward('nomhojint', 'list');
  }*/

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/nphojint/filters');


     // 15    // pager
    $this->pager = new sfPropelPager('Nphojint', 15);
    $c = new Criteria();
    $modulo=sfContext::getInstance()->getUser()->getAttribute('menu','','autenticacion');
    $loguse= $this->getUser()->getAttribute('loguse');
    $cedemp=H::getX_vacio('LOGUSE','Usuarios','Cedemp',$loguse);
    //if ($modulo=='seguridad'){
      //$c->add(NphojintPeer::CEDEMP,$cedemp);
    //}
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
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
      $this->nphojint = $this->getNphojintOrCreate();
      $this->configGrid2();
      $this->configGrid3();
      $this->configGrid4();
      $this->configGrid5();
      $grid2 = Herramientas::CargarDatosGrid($this, $this->obj2);
      $grid3 = Herramientas::CargarDatosGrid($this, $this->obj3);
      $grid4 = Herramientas::CargarDatosGrid($this, $this->obj4);
      $grid5 = Herramientas::CargarDatosGrid($this, $this->obj5);

      $nphojint = $this->getRequestParameter('nphojint');
      $nomemp = '';
      $valifecing = H::getConfApp('valifecing', 'nomina', 'nomhojint');
      if ($nphojint['fecing'] != "") {
        if ($valifecing != 'S') {
          $auxfec = split("/", $nphojint['fecing']);
          $fecha = $auxfec[2] . '-' . $auxfec[1] . '-' . $auxfec[0];
          if (strtotime($fecha) > strtotime(date("Y-m-d"))) {
            $this->coderr = 'N0002';
            return false;
          }
        }
      } else {
        $this->coderr = 'N0001';
        return false;
      }
      $modulo=sfContext::getInstance()->getUser()->getAttribute('menu','','autenticacion');
      if ($modulo=='nomina'){
        if ($this->getRequestParameter('nphojint[staemp]')==''){
          $this->coderr=4422;
          return false;
        }

        if ($this->getRequestParameter('nphojint[codtippag]')==''){
          $this->coderr=4423;
          return false;

        }

      }
      $novalced = H::getConfApp('novalced', 'nomina', 'nomhojint');

      if ($novalced!='S' && $this->getRequestParameter('id')==''){
        $p= new Criteria();
        $p->add(NphojintPeer::CEDEMP,$nphojint['cedemp']);
        $registrado= NphojintPeer::doSelectOne($p);
        if ($registrado)
        {
           $this->coderr = 'N0004';
           return false;
        }
      }

      $valubifis=H::getConfApp2('valubifis', 'nomina', 'nomhojint');
      if ($valubifis=='S'){
        if ($this->getRequestParameter('nphojint[ubifis]')==''){
          $this->coderr=4421;
          return false;

        }
      }

      if (isset($nphojint['prinom']) && isset($nphojint['prinom'])) {
        $segnom = '';
        $segape = '';
        $nombres = '';
        $apellidos = '';
        if (isset($nphojint['segnom'])) {
          $segnom = $nphojint['segnom'];
        }
        if (isset($nphojint['segape'])) {
          $segape = $nphojint['segape'];
        }
        $nombres = implode(' ', array(trim($nphojint['prinom']), trim($segnom)));
        $apellidos = implode(' ', array(trim($nphojint['priape']), trim($segape)));
        $nomemp = (implode(', ', array($apellidos, $nombres)));
      }
      if ($nomemp == '' or $nomemp == ',') {
        $this->coderr = 473;
        return false;
      }

      if ($nphojint['codtippag'] == "01") {
        if ($nphojint['codban'] == "" or $nphojint['numcue'] == "" or $nphojint['tipcue'] == "") {
          $this->coderr = 449;
          return false;
        }
      }
      if ($nphojint['seghcm'] == "S") {
        if (($nphojint['porseghcm'] == "" || $nphojint['porseghcm'] == 0)) {
          $this->coderr = 493;
          return false;
        } elseif ($nphojint['porseghcm'] < 0 || $nphojint['porseghcm'] > 100) {
          $this->coderr = 494;
          return false;
        }
      }
      if (($nphojint['fecinicon'] != "" && $nphojint['fecfincon'] == "") || ($nphojint['fecinicon'] == "" && $nphojint['fecfincon'] != "")) {
        $this->coderr = 4411;
        return false;
      }


      if (count($grid3[0]) > 0) {
        $i = 0;
        $x = $grid3[0];
        while ($i < count($x)) {
          if ($x[$i]->getNomemp() == "" || $x[$i]->getDescar() == "") {
            $this->coderr = 554;
            return false;
            break;
          }
          $i++;
        }
      }

      if (count($grid4[0]) > 0) {
        $l = 0;
        $y = $grid4[0];
        while ($l < count($y)) {
          //if ($y[$l]->getCodprofes()=="" || $y[$l]->getInstit()=="" || $y[$l]->getDurcur()=="")
          if ($y[$l]->getCodprofes() == "") {
            $this->coderr = 475;
            return false;
            break;
          }
          $l++;
        }
      }
      $inffamnomdes = H::getConfApp('inffamnomdes', 'nomhojint', 'nomina');
      if (count($grid5[0]) > 0) {
        $l = 0;
        $y = $grid5[0];
        while ($l < count($y)) {
          if ($inffamnomdes == 'S') {
            if ($y[$l]->getPrinom() == "" || $y[$l]->getPriape() == "" || $y[$l]->getSexfam() == "" || $y[$l]->getFecnac() == "" || $y[$l]->getParfam() == "") {
              $this->coderr = 2400;
              return false;
              break;
            }
          } else {
            if ($y[$l]->getNomfam() == "" || $y[$l]->getSexfam() == "" || $y[$l]->getFecnac() == "" || $y[$l]->getParfam() == "") {
              $this->coderr = 2400;
              return false;
              break;
            }
          }
          $l++;
        }
      }


      if ($this->coderr != -1) {
        return false;
      } else
        return true;
    }else
      return true;
  }

  public function executeCombo() {
    if ($this->getRequestParameter('par') == '1') {
      $this->municipios = $this->Cargarmunicipio($this->getRequestParameter('estado'));
      $this->tipo = 'E';
    } elseif ($this->getRequestParameter('par') == '2') {
      $this->parroquias = $this->Cargarparroquia($this->getRequestParameter('estado'), $this->getRequestParameter('municipio'));
      $this->tipo = 'M';
    }

    if ($this->getRequestParameter('par') == '4') {
      $this->municipios2 = $this->Cargarmunicipio($this->getRequestParameter('estado2'));
      $this->tipo = 'E2';
    } elseif ($this->getRequestParameter('par') == '5') {
      $this->parroquias2 = $this->Cargarparroquia($this->getRequestParameter('estado2'), $this->getRequestParameter('municipio2'));
      $this->tipo = 'M2';
    }

    if ($this->getRequestParameter('par') == '7') {
      $this->municipios3 = $this->Cargarmunicipio($this->getRequestParameter('estado3'));
      $this->tipo = 'E3';
    } elseif ($this->getRequestParameter('par') == '8') {
      $this->parroquias3 = $this->Cargarparroquia($this->getRequestParameter('estado3'), $this->getRequestParameter('municipio3'));
      $this->tipo = 'M3';
    }
  }

  public function CargarEstado() {
    $tablas = array('nppais'); //areglo de los joins de las tablas
    $filtros_tablas = array(''); //arreglo donde mando los filtros de las clases
    $filtros_variales = array(''); //arreglo donde mando los parametros de la funcion
    $campos_retornados = array('codpai', 'nompai'); // arreglos donde me traigo el nombre y el codigo
    return $pais = Herramientas::Cargarcombo($tablas, $filtros_tablas, $filtros_variales, $campos_retornados);
  }

  public function CargarMunicipio($codpais) {
    $tablas = array('npestado'); //areglo de los joins de las tablas
    $filtros_tablas = array('codpai'); //arreglo donde mando los filtros de las clases
    $filtros_variales = array($codpais); //arreglo donde mando los parametros de la funcion
    $campos_retornados = array('codedo', 'nomedo'); // arreglos donde me traigo el nombre y el codigo
    return $estado = Herramientas::Cargarcombo($tablas, $filtros_tablas, $filtros_variales, $campos_retornados);
  }

  public function CargarParroquia($codpais, $codestado) {
    //echo $codpais." - ".$codestado;
    $tablas = array('npciudad'); //areglo de los joins de las tablas
    $filtros_tablas = array('codpai', 'codedo'); //arreglo donde mando los filtros de las clases
    $filtros_variales = array($codpais, $codestado); //arreglo donde mando los parametros de la funcion
    $campos_retornados = array('codciu', 'nomciu'); // arreglos donde me traigo el nombre y el codigo
    return $municipio = Herramientas::Cargarcombo($tablas, $filtros_tablas, $filtros_variales, $campos_retornados);
  }

  public function CargarBancos() {
    $c = new Criteria();
    $lista_ban = NpbancosPeer::doSelect($c);

    $bancos = array();

    foreach ($lista_ban as $obj_ban) {
      $bancos += array($obj_ban->getCodban() => $obj_ban->getNomban());
    }
    return $bancos;
  }

  public function CargarTipEmp() {
    $c = new Criteria();
    $lista_tipemp = NptipempPeer::doSelect($c);

    $tipemp = array();

    foreach ($lista_tipemp as $obj_tipemp) {
      $tipemp += array($obj_tipemp->getCodtipemp() => $obj_tipemp->getDestipemp());
    }
    return $tipemp;
  }

  public function CargarEstatus() {
    $c = new Criteria();
    $lista_estemp = NpestempPeer::doSelect($c);

    $estemp = array();

    foreach ($lista_estemp as $obj_estemp) {
      $estemp += array($obj_estemp->getCodestemp() => $obj_estemp->getDesestemp());
    }
    return $estemp;
  }

  public function CargarGrupoL() {
    $c = new Criteria();
    $lista_grup = NpgrulabPeer::doSelect($c);

    $grupol = array();

    foreach ($lista_grup as $obj_grup) {
      $grupol += array($obj_grup->getCodgrulab() => $obj_grup->getDesgrulab());
    }
    return $grupol;
  }

  public function CargarSituacion() {
    $c = new Criteria();
    $lista_situa = NpsitempPeer::doSelect($c);

    $sitemp = array();

    foreach ($lista_situa as $obj_sitemp) {
      $sitemp += array($obj_sitemp->getCodsitemp() => $obj_sitemp->getDessitemp());
    }
    return $sitemp;
  }

  public function cargarParentesco() {
    $c = new Criteria();
    $lista_parent = NptipparPeer::doSelect($c);
    
    $codreser=H::getConfApp2('codreser', 'nomina', 'nomhojint');
    $parentesco = array();

    foreach ($lista_parent as $obj_parent) {
      if ($codreser=='S')
      {
         if ($obj_parent->getTippar()!='000' && $obj_parent->getTippar()!='001')
           $parentesco += array($obj_parent->getTippar() => $obj_parent->getDespar());
      }else 
        $parentesco += array($obj_parent->getTippar() => $obj_parent->getDespar());
    }
    return $parentesco;
  }

  public function cargarGuarderia() {
    $c = new Criteria();
    $lista_guarde = NpguardePeer::doSelect($c);
    $guarderia = array();

    foreach ($lista_guarde as $obj_guarde) {
      $guarderia += array($obj_guarde->getId() => $obj_guarde->getNomgua());
    }
    return $guarderia;
  }

  public function CargarNivel() {
    $c = new Criteria();
    $lista_niv = NpniveduPeer::doSelect($c);

    $nivl = array();

    foreach ($lista_niv as $obj_niv) {
      $nivl += array($obj_niv->getCodniv() => $obj_niv->getDesniv());
    }
    return $nivl;
  }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit() {
    $this->nphojint = $this->getNphojintOrCreate();
    $this->setVars();
    $this->listaestadocivil = Constantes::ListaEstadoCivil();
    $this->funciones_combos();
    $this->funciones_combos2();
    $this->listaestatus = $this->cargarSituacion();
    $this->listanivelestudio = $this->cargarNivel();
    $this->listaformapago = Constantes::ListaFormaPago();
    $this->bancos = $this->CargarBancos();
    $this->listatipocuenta = Constantes::ListaTipoCuenta();
    $this->listtipemp = $this->CargarTipEmp();
    $this->configGrid();
    $this->configGrid2();
    $this->configGrid3();
    $this->configGrid4();
    $this->configGrid5();
    $this->configGrid6();
    $this->configGrid7();
    $this->configGrid8();
    $this->listatalla = Constantes::ListaTalla();
    $this->listagruposanguineo = Constantes::ListaGrupoSanguineo();
    $this->funciones_combos3();
    $this->grupol = $this->CargarGrupoL();
    $this->listaformatraslado = Constantes::ListaFormaTraslado();
    $this->listatipovivienda = Constantes::ListaTipoVivienda();
    $this->listaformatenencia = Constantes::ListaFormaTenencia();
    $this->listaservicios = Constantes::ListaServicios();
    $this->listasituacion = $this->cargarEstatus();
    $valdefecto=H::getConfApp2('valdefecto', 'nomina', 'nomhojint');
    if ($valdefecto=='S' && !$this->nphojint->getId()){
      $datnpdefgen= NpdefgenPeer::doSelectOne(new Criteria());
      if ($this->nphojint->getEdociv()=='')
        $this->nphojint->setEdociv('S');
      if ($this->nphojint->getCodtippag()=='')
        $this->nphojint->setCodtippag('02');
      if ($this->nphojint->getStaemp()=='')
        $this->nphojint->setStaemp($datnpdefgen->getCodestemp());
      if ($this->nphojint->getSituac()=='')
        $this->nphojint->setSituac($datnpdefgen->getCodsitemp());
    }

    if ($this->getRequest()->getMethod() == sfRequest::POST) {
      $this->updateNphojintFromRequest();

      $this->saveNphojint($this->nphojint);

      $this->nphojint->setId(Herramientas::getX_vacio('codemp', 'nphojint', 'id', $this->nphojint->getCodemp()));

      $this->setFlash('notice', 'Your modifications have been saved');
      $this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add')) {
        return $this->redirect('nomhojint/create');
      } else if ($this->getRequestParameter('save_and_list')) {
        return $this->redirect('nomhojint/list');
      } else {
        return $this->redirect('nomhojint/edit?id=' . $this->nphojint->getId());
      }
    } else {
      $this->labels = $this->getLabels();
    }
  }

  /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function handleErrorEdit() {
    $this->preExecute();
    $this->nphojint = $this->getNphojintOrCreate();
    $this->updateNphojintFromRequest();
    $grid5 = Herramientas::CargarDatosGrid($this, $this->obj);
    $grid2 = Herramientas::CargarDatosGrid($this, $this->obj2);
    $grid3 = Herramientas::CargarDatosGrid($this, $this->obj3);
    $grid4 = Herramientas::CargarDatosGrid($this, $this->obj4);
    $grid = Herramientas::CargarDatosGrid($this, $this->obj5);
    $grid6 = Herramientas::CargarDatosGrid($this, $this->obj6);
    $grid7 = Herramientas::CargarDatosGrid($this, $this->obj7);
    $grid8 = Herramientas::CargarDatosGridv2($this, $this->obj8);

    $this->setVars();

    $this->labels = $this->getLabels();
    if ($this->getRequest()->getMethod() == sfRequest::POST) {
      if ($this->coderr != -1) {
        $err = Herramientas::obtenerMensajeError($this->coderr);
        $this->getRequest()->setError('', $err);
      }
    }
    return sfView::SUCCESS;
  }

  /**
   * Función para manejar el salvado del formulario.
   * cabe destacar que en las versiones nuevas del formulario (cidesaPropel)
   * llama internamente a la función $this->saving
   * Esta función saving siempre debe retornar un valor >=-1.
   * En esta funcción se debe realizar el proceso de guardado de informacion
   * del negocio en la base de datos. Este proceso debe ser realizado llamado
   * a funciones de las clases del negocio que se encuentran en lib/bussines
   * todos los procesos de guardado deben estar en la clases del negocio (lib/bussines/"modulo")
   *
   */
  protected function saveNphojint($nphojint) {
    if ($nphojint->getId()) {
      $grid = Herramientas::CargarDatosGrid($this, $this->obj5);
      $grid2 = Herramientas::CargarDatosGrid($this, $this->obj4);
      $grid3 = Herramientas::CargarDatosGrid($this, $this->obj2);
      $grid4 = Herramientas::CargarDatosGrid($this, $this->obj3);
      $grid5 = Herramientas::CargarDatosGrid($this, $this->obj);
      $grid6 = Herramientas::CargarDatosGrid($this, $this->obj6);
      $grid7 = Herramientas::CargarDatosGrid($this, $this->obj7);
      $grid8 = Herramientas::CargarDatosGridv2($this, $this->obj8);

      /* try
        { */
      Nomina::actualizarNomhojint($nphojint, $grid, $grid2, $grid3, $grid4, $grid5, $this->getRequestParameter('arreglo'), $this->getRequestParameter('fecha'), $grid6,$grid7,$grid8);

      /* }
        catch (Exception $ex)
        {
        $coderr = 0;
        $err = Herramientas::obtenerMensajeError($coderr);
        $this->getRequest()->setError('',$err);
        return $coderr;
        } */
    } else {
      $grid = Herramientas::CargarDatosGrid($this, $this->obj5);
      $grid2 = Herramientas::CargarDatosGrid($this, $this->obj4);
      $grid3 = Herramientas::CargarDatosGrid($this, $this->obj2);
      $grid4 = Herramientas::CargarDatosGrid($this, $this->obj3);
      $grid5 = Herramientas::CargarDatosGrid($this, $this->obj);
      $grid6 = Herramientas::CargarDatosGrid($this, $this->obj6);
      $grid7 = Herramientas::CargarDatosGrid($this, $this->obj7);
      $grid8 = Herramientas::CargarDatosGridv2($this, $this->obj8);

      /* try
        { */
      Nomina::salvarNomhojint($nphojint, $grid, $grid2, $grid3, $grid4, $grid5, $this->getRequestParameter('arreglo'), $grid6,$grid7,$grid8);

      /* }
        catch (Exception $ex)
        {
        $coderr = 0;
        $err = Herramientas::obtenerMensajeError($coderr);
        $this->getRequest()->setError('',$err);
        return $coderr;
        } */
    }
  }

  /**
   * Actualiza la informacion que viene de la vista
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateNphojintFromRequest() {
    $nphojint = $this->getRequestParameter('nphojint');
    $this->setVars();
    $this->listaestadocivil = Constantes::ListaEstadoCivil();
    $this->funciones_combos();
    $this->funciones_combos2();
    $this->listaestatus = $this->cargarSituacion();
    $this->listanivelestudio = $this->cargarNivel();
    $this->listaformapago = Constantes::ListaFormaPago();
    $this->bancos = $this->CargarBancos();
    $this->listatipocuenta = Constantes::ListaTipoCuenta();
    $this->listtipemp = $this->CargarTipEmp();
    $this->configGrid();
    $this->configGrid2();
    $this->configGrid3();
    $this->configGrid4();
    $this->configGrid5();
    $this->configGrid6();
    $this->configGrid7();
    $this->configGrid8();
    $this->listatalla = Constantes::ListaTalla();
    $this->listagruposanguineo = Constantes::ListaGrupoSanguineo();
    $this->funciones_combos3();
    $this->grupol = $this->CargarGrupoL();
    $this->listaformatraslado = Constantes::ListaFormaTraslado();
    $this->listatipovivienda = Constantes::ListaTipoVivienda();
    $this->listaformatenencia = Constantes::ListaFormaTenencia();
    $this->listaservicios = Constantes::ListaServicios();
    $this->listasituacion = $this->cargarEstatus();


    if (isset($nphojint['codemp'])) {
      $this->nphojint->setCodemp($nphojint['codemp']);
    }
    if (isset($nphojint['prinom']) && isset($nphojint['priape'])) {
      $segnom = '';
      $segape = '';
      $nombres = '';
      $apellidos = '';
      if (isset($nphojint['segnom'])) {
        $segnom = $nphojint['segnom'];
      }
      if (isset($nphojint['segape'])) {
        $segape = $nphojint['segape'];
      }
      $nombres = implode(' ', array(trim($nphojint['prinom']), trim($segnom)));
      $apellidos = implode(' ', array(trim($nphojint['priape']), trim($segape)));
      $this->nphojint->setNomemp(implode(', ', array($apellidos, $nombres)));
    }
    if (isset($nphojint['cedemp'])) {
      $this->nphojint->setCedemp($nphojint['cedemp']);
    }
    if (isset($nphojint['rifemp'])) {
      $this->nphojint->setRifemp($nphojint['rifemp']);
    }
    if (isset($nphojint['edociv'])) {
      $this->nphojint->setEdociv($nphojint['edociv']);
    }
    if (isset($nphojint['numcon'])) {
      $this->nphojint->setNumcon($nphojint['numcon']);
    }
    if (isset($nphojint['numpuncue'])) {
      $this->nphojint->setNumpuncue($nphojint['numpuncue']);
    }
    if (isset($nphojint['nacemp'])) {
      $this->nphojint->setNacemp($nphojint['nacemp']);
    }
    if (isset($nphojint['sexemp'])) {
      $this->nphojint->setSexemp($nphojint['sexemp']);
    }
    if (isset($nphojint['codniv'])) {
      $this->nphojint->setCodniv($nphojint['codniv']);
    }
    $currentFile = sfConfig::get('sf_upload_dir') . "/fotos/" . $this->nphojint->getFotemp();
    if (!$this->getRequest()->hasErrors() && isset($nphojint['fotemp_remove'])) {
      $this->nphojint->setFotemp('');
      if (is_file($currentFile)) {
        unlink($currentFile);
      }
    }

    if (!$this->getRequest()->hasErrors() && $this->getRequest()->getFileSize('nphojint[fotemp]')) {
      $fileName = md5($this->getRequest()->getFileName('nphojint[fotemp]') . time() . rand(0, 99999));
      $ext = $this->getRequest()->getFileExtension('nphojint[fotemp]');
      if (is_file($currentFile)) {
        unlink($currentFile);
      }
      $this->getRequest()->moveFile('nphojint[fotemp]', sfConfig::get('sf_upload_dir') . "/fotos/" . $fileName . $ext);

      $this->nphojint->setFotemp($fileName . $ext);
    }
    if (isset($nphojint['lugnac'])) {
      $this->nphojint->setLugnac($nphojint['lugnac']);
    }
    if (isset($nphojint['fecnac'])) {
      if ($nphojint['fecnac']) {
        try {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
          if (!is_array($nphojint['fecnac'])) {
            $value = $dateFormat->format($nphojint['fecnac'], 'i', $dateFormat->getInputPattern('d'));
          } else {
            $value_array = $nphojint['fecnac'];
            $value = $value_array['year'] . '-' . $value_array['month'] . '-' . $value_array['day'] . (isset($value_array['hour']) ? ' ' . $value_array['hour'] . ':' . $value_array['minute'] . (isset($value_array['second']) ? ':' . $value_array['second'] : '') : '');
          }
          $this->nphojint->setFecnac($value);
        } catch (sfException $e) {
          // not a date
        }
      } else {
        $this->nphojint->setFecnac(null);
      }
    }
    if (isset($nphojint['edaemp'])) {
      $this->nphojint->setEdaemp($nphojint['edaemp']);
    }
    if (isset($nphojint['obsgen'])) {
      $this->nphojint->setObsgen($nphojint['obsgen']);
    }
    if (isset($nphojint['dirhab'])) {
      $this->nphojint->setDirhab($nphojint['dirhab']);
    }
    if (isset($nphojint['codpai'])) {
      $this->nphojint->setCodpai($nphojint['codpai']);
    }
    if (isset($nphojint['codest'])) {
      $this->nphojint->setCodest($nphojint['codest']);
    }
    if (isset($nphojint['codciu'])) {
      $this->nphojint->setCodciu($nphojint['codciu']);
    }
    if (isset($nphojint['telhab'])) {
      $this->nphojint->setTelhab($nphojint['telhab']);
    }
    if (isset($nphojint['telotr'])) {
      $this->nphojint->setTelotr($nphojint['telotr']);
    }
    if (isset($nphojint['celemp'])) {
      $this->nphojint->setCelemp($nphojint['celemp']);
    }
    if (isset($nphojint['dirotr'])) {
      $this->nphojint->setDirotr($nphojint['dirotr']);
    }
    if (isset($nphojint['codpa2'])) {
      $this->nphojint->setCodpa2($nphojint['codpa2']);
    }
    if (isset($nphojint['codes2'])) {
      $this->nphojint->setCodes2($nphojint['codes2']);
    }
    if (isset($nphojint['codci2'])) {
      $this->nphojint->setCodci2($nphojint['codci2']);
    }
    if (isset($nphojint['telha2'])) {
      $this->nphojint->setTelha2($nphojint['telha2']);
    }
    if (isset($nphojint['telot2'])) {
      $this->nphojint->setTelot2($nphojint['telot2']);
    }
    if (isset($nphojint['emaemp'])) {
      $this->nphojint->setEmaemp($nphojint['emaemp']);
    }
    if (isset($nphojint['codpos'])) {
      $this->nphojint->setCodpos($nphojint['codpos']);
    }
    if (isset($nphojint['fecing'])) {
      if ($nphojint['fecing']) {
        try {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
          if (!is_array($nphojint['fecing'])) {
            $value = $dateFormat->format($nphojint['fecing'], 'i', $dateFormat->getInputPattern('d'));
          } else {
            $value_array = $nphojint['fecing'];
            $value = $value_array['year'] . '-' . $value_array['month'] . '-' . $value_array['day'] . (isset($value_array['hour']) ? ' ' . $value_array['hour'] . ':' . $value_array['minute'] . (isset($value_array['second']) ? ':' . $value_array['second'] : '') : '');
          }
          $this->nphojint->setFecing($value);
        } catch (sfException $e) {
          // not a date
        }
      } else {
        $this->nphojint->setFecing(null);
      }
    }
    if (isset($nphojint['fecret'])) {
      if ($nphojint['fecret']) {
        try {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
          if (!is_array($nphojint['fecret'])) {
            $value = $dateFormat->format($nphojint['fecret'], 'i', $dateFormat->getInputPattern('d'));
          } else {
            $value_array = $nphojint['fecret'];
            $value = $value_array['year'] . '-' . $value_array['month'] . '-' . $value_array['day'] . (isset($value_array['hour']) ? ' ' . $value_array['hour'] . ':' . $value_array['minute'] . (isset($value_array['second']) ? ':' . $value_array['second'] : '') : '');
          }
          $this->nphojint->setFecret($value);
        } catch (sfException $e) {
          // not a date
        }
      } else {
        $this->nphojint->setFecret(null);
      }
    }
    if (isset($nphojint['fecrei'])) {
      if ($nphojint['fecrei']) {
        try {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
          if (!is_array($nphojint['fecrei'])) {
            $value = $dateFormat->format($nphojint['fecrei'], 'i', $dateFormat->getInputPattern('d'));
          } else {
            $value_array = $nphojint['fecrei'];
            $value = $value_array['year'] . '-' . $value_array['month'] . '-' . $value_array['day'] . (isset($value_array['hour']) ? ' ' . $value_array['hour'] . ':' . $value_array['minute'] . (isset($value_array['second']) ? ':' . $value_array['second'] : '') : '');
          }
          $this->nphojint->setFecrei($value);
        } catch (sfException $e) {
          // not a date
        }
      } else {
        $this->nphojint->setFecrei(null);
      }
    }
    if (isset($nphojint['codmot'])) {
      $this->nphojint->setCodmot($nphojint['codmot']);
    }
    if (isset($nphojint['staemp'])) {
      $this->nphojint->setStaemp($nphojint['staemp']);
    }
    if (isset($nphojint['codtippag'])) {
      $this->nphojint->setCodtippag($nphojint['codtippag']);
    }
    if (isset($nphojint['codban'])) {
      $this->nphojint->setCodban($nphojint['codban']);
    }
    if (isset($nphojint['codbanfid'])) {
      $this->nphojint->setCodbanfid($nphojint['codbanfid']);
    }
    if (isset($nphojint['numcue'])) {
      $this->nphojint->setNumcue($nphojint['numcue']);
    }
    if (isset($nphojint['tipcue'])) {
      $this->nphojint->setTipcue($nphojint['tipcue']);
    }
    if (isset($nphojint['tipcuefid'])) {
      $this->nphojint->setTipcuefid($nphojint['tipcuefid']);
    }
    if (isset($nphojint['numcueaho'])) {
      $this->nphojint->setNumcueaho($nphojint['numcueaho']);
    }
    if (isset($nphojint['tipcueaho'])) {
      $this->nphojint->setTipcueaho($nphojint['tipcueaho']);
    }
    if (isset($nphojint['fecadmpub'])) {
      if ($nphojint['fecadmpub']) {
        try {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
          if (!is_array($nphojint['fecadmpub'])) {
            $value = $dateFormat->format($nphojint['fecadmpub'], 'i', $dateFormat->getInputPattern('d'));
          } else {
            $value_array = $nphojint['fecadmpub'];
            $value = $value_array['year'] . '-' . $value_array['month'] . '-' . $value_array['day'] . (isset($value_array['hour']) ? ' ' . $value_array['hour'] . ':' . $value_array['minute'] . (isset($value_array['second']) ? ':' . $value_array['second'] : '') : '');
          }
          $this->nphojint->setFecadmpub($value);
        } catch (sfException $e) {
          // not a date
        }
      } else {
        $this->nphojint->setFecadmpub(null);
      }
    }
    if (isset($nphojint['numsso'])) {
      $this->nphojint->setNumsso($nphojint['numsso']);
    }
    if (isset($nphojint['numpolseg'])) {
      $this->nphojint->setNumpolseg($nphojint['numpolseg']);
    }
    if (isset($nphojint['feccotsso'])) {
      if ($nphojint['feccotsso']) {
        try {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
          if (!is_array($nphojint['feccotsso'])) {
            $value = $dateFormat->format($nphojint['feccotsso'], 'i', $dateFormat->getInputPattern('d'));
          } else {
            $value_array = $nphojint['feccotsso'];
            $value = $value_array['year'] . '-' . $value_array['month'] . '-' . $value_array['day'] . (isset($value_array['hour']) ? ' ' . $value_array['hour'] . ':' . $value_array['minute'] . (isset($value_array['second']) ? ':' . $value_array['second'] : '') : '');
          }
          $this->nphojint->setFeccotsso($value);
        } catch (sfException $e) {
          // not a date
        }
      } else {
        $this->nphojint->setFeccotsso(null);
      }
    }
    if (isset($nphojint['anoadmpub'])) {
      $this->nphojint->setAnoadmpub($nphojint['anoadmpub']);
    }
    if (isset($nphojint['tiefid'])) {
      $this->nphojint->setTiefid($nphojint['tiefid']);
    }
    if (isset($nphojint['talcam'])) {
      $this->nphojint->setTalcam($nphojint['talcam']);
    }
    if (isset($nphojint['talpan'])) {
      $this->nphojint->setTalpan($nphojint['talpan']);
    }
    if (isset($nphojint['talcal'])) {
      $this->nphojint->setTalcal($nphojint['talcal']);
    }
    if (isset($nphojint['grusan'])) {
      $this->nphojint->setGrusan($nphojint['grusan']);
    }
    if (isset($nphojint['codregpai'])) {
      $this->nphojint->setCodregpai($nphojint['codregpai']);
    }
    if (isset($nphojint['codregest'])) {
      $this->nphojint->setCodregest($nphojint['codregest']);
    }
    if (isset($nphojint['codregciu'])) {
      $this->nphojint->setCodregciu($nphojint['codregciu']);
    }
    if (isset($nphojint['grulab'])) {
      $this->nphojint->setGrulab($nphojint['grulab']);
    }
    if (isset($nphojint['gruotr'])) {
      $this->nphojint->setGruotr($nphojint['gruotr']);
    }
    if (isset($nphojint['traslado'])) {
      $this->nphojint->setTraslado($nphojint['traslado']);
    }
    if (isset($nphojint['traotr'])) {
      $this->nphojint->setTraotr($nphojint['traotr']);
    }
    if (isset($nphojint['numexp'])) {
      $this->nphojint->setNumexp($nphojint['numexp']);
    }
    if (isset($nphojint['detexp'])) {
      $this->nphojint->setDetexp($nphojint['detexp']);
    }
    if (isset($nphojint['derzur'])) {
      $this->nphojint->setDerzur($nphojint['derzur']);
    }
    if (isset($nphojint['tipviv'])) {
      $this->nphojint->setTipviv($nphojint['tipviv']);
    }
    if (isset($nphojint['vivotr'])) {
      $this->nphojint->setVivotr($nphojint['vivotr']);
    }
    if (isset($nphojint['forten'])) {
      $this->nphojint->setForten($nphojint['forten']);
    }
    if (isset($nphojint['tenotr'])) {
      $this->nphojint->setTenotr($nphojint['tenotr']);
    }
    if (isset($nphojint['sercon'])) {
      $this->nphojint->setSercon($nphojint['sercon']);
    }
    if (isset($nphojint['temporal'])) {
      $this->nphojint->setTemporal($nphojint['temporal']);
    }
    if (isset($nphojint['situac'])) {
      $this->nphojint->setSituac($nphojint['situac']);
    }

    if (isset($nphojint['profes'])) {
      $this->nphojint->setProfes($nphojint['profes']);
    }
    if (isset($nphojint['seghcm'])) {
      $this->nphojint->setSeghcm($nphojint['seghcm']);
    }
    if (isset($nphojint['porseghcm'])) {
      $this->nphojint->setPorseghcm($nphojint['porseghcm']);
    }
    if (isset($nphojint['codnivedu'])) {
      $this->nphojint->setCodnivedu($nphojint['codnivedu']);
    }
    $this->nphojint->setIncapacidades($this->getRequestParameter('associated_incapacidades'));

    if (isset($nphojint['ubifis'])) {
      $this->nphojint->setUbifis($nphojint['ubifis']);
    } if (isset($nphojint['codempant'])) {
      $this->nphojint->setCodempant($nphojint['codempant']);
    }
    if (isset($nphojint['feccoracu'])) {
      if ($nphojint['feccoracu']) {
        try {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
          if (!is_array($nphojint['feccoracu'])) {
            $value = $dateFormat->format($nphojint['feccoracu'], 'i', $dateFormat->getInputPattern('d'));
          } else {
            $value_array = $nphojint['feccoracu'];
            $value = $value_array['year'] . '-' . $value_array['month'] . '-' . $value_array['day'] . (isset($value_array['hour']) ? ' ' . $value_array['hour'] . ':' . $value_array['minute'] . (isset($value_array['second']) ? ':' . $value_array['second'] : '') : '');
          }
          $this->nphojint->setFeccoracu($value);
        } catch (sfException $e) {
          // not a date
        }
      } else {
        $this->nphojint->setFeccoracu(null);
      }
    }
    if (isset($nphojint['capactacu'])) {
      $this->nphojint->setCapactacu($nphojint['capactacu']);
    }
    if (isset($nphojint['intacu'])) {
      $this->nphojint->setIntacu($nphojint['intacu']);
    }
    if (isset($nphojint['antacu'])) {
      $this->nphojint->setAntacu($nphojint['antacu']);
    }
    if (isset($nphojint['diaacu'])) {
      $this->nphojint->setDiaacu($nphojint['diaacu']);
    }
    if (isset($nphojint['diaadiacu'])) {
      $this->nphojint->setDiaadiacu($nphojint['diaadiacu']);
    }
    if (isset($nphojint['codtipemp'])) {
      $this->nphojint->setCodtipemp($nphojint['codtipemp']);
    }
    if (isset($nphojint['desniv'])) {
      $this->nphojint->setDesniv($nphojint['desniv']);
    }
    if (isset($nphojint['desniv2'])) {
      $this->nphojint->setDesniv2($nphojint['desniv2']);
    }
    if (isset($nphojint['fecinicon'])) {
      if ($nphojint['fecinicon']) {
        try {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
          if (!is_array($nphojint['fecinicon'])) {
            $value = $dateFormat->format($nphojint['fecinicon'], 'i', $dateFormat->getInputPattern('d'));
          } else {
            $value_array = $nphojint['fecinicon'];
            $value = $value_array['year'] . '-' . $value_array['month'] . '-' . $value_array['day'] . (isset($value_array['hour']) ? ' ' . $value_array['hour'] . ':' . $value_array['minute'] . (isset($value_array['second']) ? ':' . $value_array['second'] : '') : '');
          }
          $this->nphojint->setFecinicon($value);
        } catch (sfException $e) {
          // not a date
        }
      } else {
        $this->nphojint->setFecinicon(null);
      }
    }
    if (isset($nphojint['fecfincon'])) {
      if ($nphojint['fecfincon']) {
        try {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
          if (!is_array($nphojint['fecfincon'])) {
            $value = $dateFormat->format($nphojint['fecfincon'], 'i', $dateFormat->getInputPattern('d'));
          } else {
            $value_array = $nphojint['fecfincon'];
            $value = $value_array['year'] . '-' . $value_array['month'] . '-' . $value_array['day'] . (isset($value_array['hour']) ? ' ' . $value_array['hour'] . ':' . $value_array['minute'] . (isset($value_array['second']) ? ':' . $value_array['second'] : '') : '');
          }
          $this->nphojint->setFecfincon($value);
        } catch (sfException $e) {
          // not a date
        }
      } else {
        $this->nphojint->setFecfincon(null);
      }
    }
    if (isset($nphojint['obsembret'])) {
      $this->nphojint->setObsembret($nphojint['obsembret']);
    }
    if (isset($nphojint['fecmat'])) {
      if ($nphojint['fecmat']) {
        try {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
          if (!is_array($nphojint['fecmat'])) {
            $value = $dateFormat->format($nphojint['fecmat'], 'i', $dateFormat->getInputPattern('d'));
          } else {
            $value_array = $nphojint['fecmat'];
            $value = $value_array['year'] . '-' . $value_array['month'] . '-' . $value_array['day'] . (isset($value_array['hour']) ? ' ' . $value_array['hour'] . ':' . $value_array['minute'] . (isset($value_array['second']) ? ':' . $value_array['second'] : '') : '');
          }
          $this->nphojint->setFecmat($value);
        } catch (sfException $e) {
          // not a date
        }
      } else {
        $this->nphojint->setFecmat(null);
      }
    }
    if (isset($nphojint['fecingsso'])) {
      if ($nphojint['fecingsso']) {
        try {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
          if (!is_array($nphojint['fecingsso'])) {
            $value = $dateFormat->format($nphojint['fecingsso'], 'i', $dateFormat->getInputPattern('d'));
          } else {
            $value_array = $nphojint['fecingsso'];
            $value = $value_array['year'] . '-' . $value_array['month'] . '-' . $value_array['day'] . (isset($value_array['hour']) ? ' ' . $value_array['hour'] . ':' . $value_array['minute'] . (isset($value_array['second']) ? ':' . $value_array['second'] : '') : '');
          }
          $this->nphojint->setFecingsso($value);
        } catch (sfException $e) {
          // not a date
        }
      } else {
        $this->nphojint->setFecingsso(null);
      }
    }

    $this->nphojint->setPosveh(isset($nphojint['posveh']) ? $nphojint['posveh'] : 0);
    if (isset($nphojint['marveh']))
    {
      $this->nphojint->setMarveh($nphojint['marveh']);
    }
    if (isset($nphojint['modveh']))
    {
      $this->nphojint->setModveh($nphojint['modveh']);
    }
    if (isset($nphojint['colveh']))
    {
      $this->nphojint->setColveh($nphojint['colveh']);
    }
    if (isset($nphojint['anoveh']))
    {
      $this->nphojint->setAnoveh($nphojint['anoveh']);
    }
    if (isset($nphojint['plaveh']))
    {
      $this->nphojint->setPlaveh($nphojint['plaveh']);
    }
    if (isset($nphojint['emaopc']))
    {
      $this->nphojint->setEmaopc($nphojint['emaopc']);
    }
    $this->nphojint->setPrivehmot(isset($nphojint['privehmot']) ? $nphojint['privehmot'] : 0);
    $this->nphojint->setSoshog(isset($nphojint['soshog']) ? $nphojint['soshog'] : 0);
    $this->nphojint->setCapbie(isset($nphojint['capbie']) ? $nphojint['capbie'] : 0);
    if (isset($nphojint['tipmed']))
    {
      $this->nphojint->setTipmed($nphojint['tipmed']);
    }
    $this->nphojint->setEsalerg(isset($nphojint['esalerg']) ? $nphojint['esalerg'] : 0);
    if (isset($nphojint['desaler']))
    {
      $this->nphojint->setDesaler($nphojint['desaler']);
    }
    if (isset($nphojint['monindem']))
    {
      $this->nphojint->setMonindem($nphojint['monindem']);
    }
    if (isset($nphojint['tipetn']))
    {
      $this->nphojint->setTipetn($nphojint['tipetn']);
    }
    if (isset($nphojint['codpainac']))
    {
      $this->nphojint->setCodpainac($nphojint['codpainac']);
    }
    if (isset($nphojint['numpas']))
    {
      $this->nphojint->setNumpas($nphojint['numpas']);
    }
    if (isset($nphojint['codpro']))
    {
      $this->nphojint->setCodpro($nphojint['codpro']);
    }
    if (isset($nphojint['pesemp']))
    {
      $this->nphojint->setPesemp($nphojint['pesemp']);
    }
    if (isset($nphojint['estemp']))
    {
      $this->nphojint->setEstemp($nphojint['estemp']);
    }
    if (isset($nphojint['fectitular'])) {
      if ($nphojint['fectitular']) {
        try {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
          if (!is_array($nphojint['fectitular'])) {
            $value = $dateFormat->format($nphojint['fectitular'], 'i', $dateFormat->getInputPattern('d'));
          } else {
            $value_array = $nphojint['fectitular'];
            $value = $value_array['year'] . '-' . $value_array['month'] . '-' . $value_array['day'] . (isset($value_array['hour']) ? ' ' . $value_array['hour'] . ':' . $value_array['minute'] . (isset($value_array['second']) ? ':' . $value_array['second'] : '') : '');
          }
          $this->nphojint->setFectitular($value);
        } catch (sfException $e) {
          // not a date
        }
      } else {
        $this->nphojint->setFectitular(null);
      }
    }
    if (isset($nphojint['numcuefid']))
    {
      $this->nphojint->setNumcuefid($nphojint['numcuefid']);
    }
    $this->nphojint->setTiefun(isset($nphojint['tiefun']) ? $nphojint['tiefun'] : 0);
    if (isset($nphojint['numtarces']))
    {
      $this->nphojint->setNumtarces($nphojint['numtarces']);
    }
    if (isset($nphojint['pritra']))
    {
      $this->nphojint->setPritra($nphojint['pritra']);
    }
    if (isset($nphojint['cuebanmat']))
    {
      $this->nphojint->setCuebanmat($nphojint['cuebanmat']);
    }
    if (isset($nphojint['codofi']))
    {
      $this->nphojint->setCodofi($nphojint['codofi']);
    }
    if (isset($nphojint['coddep']))
    {
      $this->nphojint->setCoddep($nphojint['coddep']);
    }
    if (isset($nphojint['coddirec']))
    {
      $this->nphojint->setCoddirec($nphojint['coddirec']);
    }
    if (isset($nphojint['codubi']))
    {
      $this->nphojint->setCodubi($nphojint['codubi']);
    }
    if (isset($nphojint['coduniads']))
    {
      $this->nphojint->setCoduniads($nphojint['coduniads']);
    }
    if (isset($nphojint['codpagbon']))
    {
      $this->nphojint->setCodpagbon($nphojint['codpagbon']);
    }
    if (isset($nphojint['codbanbon']))
    {
      $this->nphojint->setCodbanbon($nphojint['codbanbon']);
    }
    if (isset($nphojint['numcuebon']))
    {
      $this->nphojint->setNumcuebon($nphojint['numcuebon']);
    }
    if (isset($nphojint['tipcuebon']))
    {
      $this->nphojint->setTipcuebon($nphojint['tipcuebon']);
    }
  }

  protected function getNphojintOrCreate($id = 'id') {
    if (!$this->getRequestParameter($id)) {
      $nphojint = new Nphojint();
    } else {
      $nphojint = NphojintPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($nphojint);
    }

    return $nphojint;
  }

  public function funciones_combos() {
    $this->estados = $this->CargarEstado();
    $this->municipios = $this->CargarMunicipio($this->nphojint->getCodpai()); //colocar lo q viene de bd
    $this->parroquias = $this->CargarParroquia($this->nphojint->getCodpai(), $this->nphojint->getCodest()); //colocar lo q viene de bd
  }

  public function funciones_combos2() {
    $this->estados2 = $this->CargarEstado();
    $this->municipios2 = $this->CargarMunicipio($this->nphojint->getCodpa2()); //colocar lo q viene de bd
    $this->parroquias2 = $this->CargarParroquia($this->nphojint->getCodpa2(), $this->nphojint->getCodes2()); //colocar lo q viene de bd
  }

  public function funciones_combos3() {
    $this->estados3 = $this->CargarEstado();
    $this->municipios3 = $this->CargarMunicipio($this->nphojint->getcodregpai()); //colocar lo q viene de bd
    $this->parroquias3 = $this->CargarParroquia($this->nphojint->getcodregpai(), $this->nphojint->getcodregest()); //colocar lo q viene de bd
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid() {
    $c = new Criteria();
    $c->add(NphiinegPeer::CODEMP, $this->nphojint->getCodemp());
    $c->addDescendingOrderByColumn(NphiinegPeer::FECING);

    $per = NphiinegPeer::doSelect($c);

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(false);
    $opciones->setTabla('Nphiineg');
    $opciones->setAnchoGrid(500);
    $opciones->setAncho(500);
    $opciones->setFilas(15);
    $opciones->setTitulo('Historial de Ingresos y Egresos');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Ingreso');
    $col1->setTipo(Columna::FECHA);
    $col1->setEsGrabable(true);
    $col1->setHTML('readonly="true"');
    $col1->setVacia(true);
    $col1->setNombreCampo('fecing');

    $col2 = new Columna('Egreso');
    $col2->setTipo(Columna::FECHA);
    $col2->setEsGrabable(true);
    $col2->setHTML('readonly="true"');
    $col2->setVacia(true);
    $col2->setNombreCampo('fecegr');

    $col3 = new Columna('Observaciones');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setNombreCampo('observ');
    $col3->setHTML('type="text" size="30" ');

    $col4 = new Columna('Monto Liquidación');
    $col4->setTipo(Columna::MONTO);
    $col4->setEsGrabable(true);
    $col4->setAlineacionObjeto(Columna::CENTRO);
    $col4->setAlineacionContenido(Columna::CENTRO);
    $col4->setNombreCampo('monliq');
    $col4->setHTML('type="text" size="10" ');

    $col5 = new Columna('Fecha Pago');
    $col5->setTipo(Columna::FECHA);
    $col5->setEsGrabable(true);
    $col5->setHTML(' ');
    $col5->setVacia(true);
    $col5->setNombreCampo('fecpag');

    $col6 = new Columna('Estatus');
    $col6->setTipo(Columna::COMBO);
    $col6->setCombo(Constantes::listaStatusEmp());
    $col6->setEsGrabable(true);
    $col6->setAlineacionObjeto(Columna::CENTRO);
    $col6->setAlineacionContenido(Columna::CENTRO);
    $col6->setNombreCampo('status');
    $col6->setHTML(' ');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);

    $this->obj = $opciones->getConfig($per);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid2() {
    $c = new Criteria();
    $c->add(NpexplabPeer::STACAR, 'D');
    $c->add(NpexplabPeer::CODEMP, $this->nphojint->getCodemp());
    $c->addDescendingOrderByColumn(NpexplabPeer::FECINI);
    $per = NpexplabPeer::doSelect($c);

    $datosexplab = H::getConfApp2('datosexplab', 'nomina', 'nomhojint');

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(true);
    $opciones->setTabla('Npexplab');
    $opciones->setAnchoGrid(1000);
    $opciones->setName('b');
    $opciones->setFilas(10);

    $infexpdet1 = H::getConfApp2('infexpdet1', 'nomina', 'nomhojint');
    if ($infexpdet1 != "")
      $opciones->setTitulo($infexpdet1);
    else
      $opciones->setTitulo('Dentro de la Institución');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Nómina');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codnom');
    $col1->setCatalogo('npnomina', 'sf_admin_edit_form', array('codnom' => 1, 'nomnom' => 2), 'Npnomina_Vacdefgen');
    $col1->setAjax('nomhojint', 5, 2);

    $col2 = new Columna('Descripción');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setEsGrabable(true);
    $col2->setNombreCampo('nomnom');
    $col2->setHTML('type="text" size="25" readonly=true');

    $col3 = new Columna('Cargo');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setNombreCampo('codcar');
    $col3->setCatalogo('npcargos', 'sf_admin_edit_form', array('codcar' => 3, 'nomcar' => 4, 'suecar' => 7, 'comcar' => 8), 'Npcargos_Nomhojint');
    $col3->setJScript('onBlur="javascript:event.keyCode=13; ajaxexplab(event,this.id);"');

    $col4 = new Columna('Descripción');
    $col4->setTipo(Columna::TEXTO);
    $col4->setAlineacionObjeto(Columna::IZQUIERDA);
    $col4->setAlineacionContenido(Columna::IZQUIERDA);
    $col4->setEsGrabable(true);
    $col4->setNombreCampo('descar');
    $col4->setHTML('type="text" size="25"');


    $col5 = new Columna('Fecha de Inicio');
    $col5->setTipo(Columna::FECHA);
    $col5->setAlineacionObjeto(Columna::CENTRO);
    $col5->setAlineacionContenido(Columna::CENTRO);
    $col5->setEsGrabable(true);
    $col5->setHTML(' ');
    $col5->setVacia(true);
    $col5->setNombreCampo('fecini');

    $col6 = clone $col5;
    $col6->setTitulo('Fecha Fin');
    $col6->setNombreCampo('fecter');

    $col7 = new Columna('Sueldo');
    $col7->setTipo(Columna::MONTO);
    $col7->setEsGrabable(true);
    $col7->setAlineacionContenido(Columna::IZQUIERDA);
    $col7->setAlineacionObjeto(Columna::IZQUIERDA);
    $col7->setNombreCampo('sueobt');
    $col7->setEsNumerico(true);
    $col7->setHTML('type="text" size="10"');
    $col7->setJScript('onBlur = "javascript:event.keyCode=13;return entermontootro(event,this.id)"');

    $col8 = clone $col7;
    $col8->setTitulo('Compensación');
    $col8->setNombreCampo('compobt');

    $params2 = array('param1' => $this->lonnivel);
    $col9 = new Columna('Ubicación Administrativa');
    $col9->setTipo(Columna::TEXTO);
    $col9->setEsGrabable(true);
    $col9->setAlineacionObjeto(Columna::CENTRO);
    $col9->setAlineacionContenido(Columna::CENTRO);
    $col9->setNombreCampo('codniv');
    $col9->setCatalogo('npestorg', 'sf_admin_edit_form', array('codniv' => 9, 'desniv' => 10), 'Npestorg_Nomhojint', $params2);
    $col9->setHTML('type="text" size="17" maxlength="' . chr(39) . $this->lonnivel . chr(39) . '"');
    $col9->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,' . chr(39) . $this->mascaranivel . chr(39) . ')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}" onBlur="javascript:event.keyCode=13; ajaxubiad(event,this.id);;"');

    $col10 = new Columna('Descripción');
    $col10->setTipo(Columna::TEXTO);
    $col10->setAlineacionObjeto(Columna::IZQUIERDA);
    $col10->setAlineacionContenido(Columna::IZQUIERDA);
    $col10->setEsGrabable(true);
    $col10->setNombreCampo('desniv');
    $col10->setHTML('type="text" size="25"');

    $col11 = new Columna('Dedicación');
    $col11->setTipo(Columna::TEXTO);
    $col11->setAlineacionObjeto(Columna::IZQUIERDA);
    $col11->setAlineacionContenido(Columna::IZQUIERDA);
    $col11->setEsGrabable(true);
    $col11->setNombreCampo('dedica');
    $col11->setHTML('type="text" size="30"');

    $col12 = new Columna('Condición');
    $col12->setTipo(Columna::TEXTO);
    $col12->setAlineacionObjeto(Columna::IZQUIERDA);
    $col12->setAlineacionContenido(Columna::IZQUIERDA);
    $col12->setEsGrabable(false);
    $col12->setNombreCampo('condic');
    $col12->setHTML('type="text" size="25"');

    $col13 = new Columna('Tipo de Cargo');
    $col13->setTipo(Columna::COMBO);
    $col13->setEsGrabable(true);
    $col13->setNombreCampo('status');
    $col13->setCombo(Constantes::listaStatusEmp());
    $col13->setHTML(' ');
    if ($datosexplab != 'S')
      $col13->setOculta(true);

    $col14 = new Columna('Status');
    $col14->setTipo(Columna::COMBO);
    $col14->setEsGrabable(true);
    $col14->setNombreCampo('estlab');
    $col14->setCombo(array('F' => 'Fijo', 'C' => 'Contratado'));
    $col14->setHTML(' ');
    if ($datosexplab != 'S')
      $col14->setOculta(true);

    $col15 = new Columna('Motivo de Egreso');
    $col15->setTipo(Columna::TEXTO);
    $col15->setAlineacionObjeto(Columna::IZQUIERDA);
    $col15->setAlineacionContenido(Columna::IZQUIERDA);
    $col15->setEsGrabable(true);
    $col15->setNombreCampo('motegr');
    $col15->setHTML('type="text" size="30" maxlength="500"');
    if ($datosexplab != 'S')
      $col15->setOculta(true);

    $col16 = new Columna('Tipo de Movimientos');
    $col16->setTipo(Columna::COMBO);
    $col16->setEsGrabable(true);
    $col16->setNombreCampo('codmotcamcar');
    $col16->setCombo(NpmotcamcarPeer::getMotivos());
    $col16->setHTML(' ');
    if ($datosexplab != 'S')
      $col16->setOculta(true);

    $col17 = new Columna('Documento avala el Movimiento');
    $col17->setTipo(Columna::TEXTO);
    $col17->setAlineacionObjeto(Columna::IZQUIERDA);
    $col17->setAlineacionContenido(Columna::IZQUIERDA);
    $col17->setEsGrabable(true);
    $col17->setNombreCampo('refdoc');
    $col17->setHTML('type="text" size="30" maxlength="2000"');
    if ($datosexplab != 'S')
      $col17->setOculta(true);

    $col18 = new Columna('Observaciones');
    $col18->setTipo(Columna::TEXTO);
    $col18->setAlineacionObjeto(Columna::IZQUIERDA);
    $col18->setAlineacionContenido(Columna::IZQUIERDA);
    $col18->setEsGrabable(true);
    $col18->setNombreCampo('observ');
    $col18->setHTML('type="text" size="30" maxlength="2000"');
    if ($datosexplab != 'S')
      $col18->setOculta(true);

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
    $opciones->addColumna($col7);
    $opciones->addColumna($col8);
    $opciones->addColumna($col9);
    $opciones->addColumna($col10);
    $opciones->addColumna($col11);
    $opciones->addColumna($col12);
    $opciones->addColumna($col13);
    $opciones->addColumna($col14);
    $opciones->addColumna($col15);
    $opciones->addColumna($col16);
    $opciones->addColumna($col17);
    $opciones->addColumna($col18);


    $this->obj2 = $opciones->getConfig($per);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid3() {
    $c = new Criteria();
    $c->add(NpexplabPeer::STACAR, 'F');
    $c->add(NpexplabPeer::CODEMP, $this->nphojint->getCodemp());
    $c->addDescendingOrderByColumn(NpexplabPeer::FECINI);
    $per = NpexplabPeer::doSelect($c);

    $datosexplab = H::getConfApp2('datosexplab', 'nomina', 'nomhojint');

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(true);
    $opciones->setTabla('Npexplab');
    $opciones->setAnchoGrid(1000);
    $opciones->setAncho(1200);
    $opciones->setName('c');
    $opciones->setTitulo('Fuera de la Institución');
    $opciones->setHTMLTotalFilas(' ');
    $opciones->setFilas(10);

    $infexpfet1 = H::getConfApp2('infexpfet1', 'nomina', 'nomhojint');

    if ($infexpfet1 != "")
      $col1 = new Columna($infexpfet1);
    else
      $col1 = new Columna('Institución');
    $col1->setTipo(Columna::TEXTAREA);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::IZQUIERDA);
    $col1->setAlineacionContenido(Columna::IZQUIERDA);
    $col1->setNombreCampo('nomemp');
    $col1->setHTML('type="text" size="25x2"');

    $infexpfet2 = H::getConfApp2('infexpfet2', 'nomina', 'nomhojint');

    if ($infexpfet2 != "")
      $col2 = new Columna($infexpfet2);
    else
      $col2 = new Columna('Descripción del Cargo');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setEsGrabable(true);
    $col2->setNombreCampo('descar');
    $col2->setHTML('type="text" size="30"');


    $col3 = new Columna('Fecha de Inicio');
    $col3->setTipo(Columna::FECHA);
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setEsGrabable(true);
    $col3->setHTML(' ');
    $col3->setVacia(true);
    $col3->setNombreCampo('fecini');

    $col4 = clone $col3;
    $col4->setTitulo('Fecha Fin');
    $col4->setNombreCampo('fecter');

    $oculcolinfexpf = H::getConfApp2('oculcolinfexpf', 'nomina', 'nomhojint');
    $col5 = new Columna('Sueldo Obtenido');
    $col5->setTipo(Columna::MONTO);
    $col5->setEsGrabable(true);
    $col5->setAlineacionContenido(Columna::IZQUIERDA);
    $col5->setAlineacionObjeto(Columna::IZQUIERDA);
    $col5->setNombreCampo('sueobt');
    $col5->setEsNumerico(true);
    $col5->setHTML('type="text" size="10"');
    $col5->setJScript('onBlur = "javascript:event.keyCode=13;return entermontootro(event,this.id)"');
    if ($oculcolinfexpf == 'S')
      $col5->setOculta(true);

    $col6 = new Columna('Tipo de Organismo');
    $col6->setTipo(Columna::COMBO);
    $col6->setEsGrabable(true);
    $col6->setNombreCampo('tiporg');
    $col6->setCombo(Constantes::listaTiporg());
    $col6->setHTML(' ');

    if ($datosexplab == 'S')
      $col6a = new Columna('Tipo de Cargo');
    else
      $col6a = new Columna('Estatus');
    $col6a->setTipo(Columna::COMBO);
    $col6a->setEsGrabable(true);
    $col6a->setNombreCampo('status');
    $col6a->setCombo(Constantes::listaStatusEmp());
    $col6a->setHTML(' ');

    $col7 = new Columna('Monto Prestaciones');
    $col7->setTipo(Columna::MONTO);
    $col7->setEsGrabable(true);
    $col7->setAlineacionContenido(Columna::IZQUIERDA);
    $col7->setAlineacionObjeto(Columna::IZQUIERDA);
    $col7->setNombreCampo('montopres');
    $col7->setEsNumerico(true);
    $col7->setHTML('type="text" size="10"');
    $col7->setJScript('onBlur = "javascript:event.keyCode=13;return entermontootro(event,this.id)"');

    $col8 = new Columna('Status');
    $col8->setTipo(Columna::COMBO);
    $col8->setEsGrabable(true);
    $col8->setNombreCampo('estlab');
    $col8->setCombo(array('F' => 'Fijo', 'C' => 'Contratado'));
    $col8->setHTML(' ');
    if ($datosexplab != 'S')
      $col8->setOculta(true);

    $col9 = new Columna('Motivo de Egreso');
    $col9->setTipo(Columna::TEXTO);
    $col9->setAlineacionObjeto(Columna::IZQUIERDA);
    $col9->setAlineacionContenido(Columna::IZQUIERDA);
    $col9->setEsGrabable(true);
    $col9->setNombreCampo('motegr');
    $col9->setHTML('type="text" size="30" maxlength="500"');
    if ($datosexplab != 'S')
      $col9->setOculta(true);

    $col10 = new Columna('Observaciones');
    $col10->setTipo(Columna::TEXTO);
    $col10->setAlineacionObjeto(Columna::IZQUIERDA);
    $col10->setAlineacionContenido(Columna::IZQUIERDA);
    $col10->setEsGrabable(true);
    $col10->setNombreCampo('observ');
    $col10->setHTML('type="text" size="30" maxlength="2000"');
    if ($datosexplab != 'S')
      $col10->setOculta(true);

    $col11 = new Columna('Se Pagaron Prestaciones?');
    $col11->setTipo(Columna::COMBO);
    $col11->setEsGrabable(true);
    $col11->setNombreCampo('pagpre');
    $col11->setCombo(array('S' => 'Si', 'N' => 'No'));
    $col11->setHTML(' ');
    if ($datosexplab != 'S')
      $col11->setOculta(true);

    $moseduuni = H::getConfApp2('moseduuni', 'nomina', 'nomhojint');

    $col12 = new Columna('Educación Universitaria');
    $col12->setTipo(Columna::COMBO);
    $col12->setEsGrabable(true);
    $col12->setNombreCampo('eduuni');
    $col12->setCombo(array('S' => 'Si', 'N' => 'No'));
    $col12->setHTML(' ');
    if ($moseduuni == 'S')
      $col12->setOculta(false);
    else $col12->setOculta(true);

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
    $opciones->addColumna($col6a);
    $opciones->addColumna($col7);
    $opciones->addColumna($col8);
    $opciones->addColumna($col9);
    $opciones->addColumna($col10);
    $opciones->addColumna($col11);
    $opciones->addColumna($col12);

    $this->obj3 = $opciones->getConfig($per);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid4() {
    $c = new Criteria();
    $c->add(NpinfcurPeer::CODEMP, $this->nphojint->getCodemp());
    $c->addDescendingOrderByColumn(NpinfcurPeer::FECINI);
    $per = NpinfcurPeer::doSelect($c);

    $oculcolinfcur = H::getConfApp('oculcolinfcur', 'nomhojint', 'nomina');

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(true);
    $opciones->setTabla('Npinfcur');
    $opciones->setAnchoGrid(1000);
    $opciones->setFilas(6);
    $opciones->setName('d');
    $opciones->setTitulo('');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Código de profesión');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codprofes');
    $col1->setCatalogo('Npprofesion', 'sf_admin_edit_form', array('codprofes' => 1, 'desprofes' => 2), 'Npprofesion_nonhojint');
    $col1->setHTML('type="text" size="25"');

    $col2 = new Columna('Profesión');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setNombreCampo('nomtit');
    $col2->setHTML('type="text" size="25"');

    $col3 = new Columna('Descripción');
    $col3->setTipo(Columna::TEXTO);
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setEsGrabable(true);
    $col3->setNombreCampo('descur');
    $col3->setHTML('type="text" size="25"');

    $col4 = clone $col2;
    $col4->setTitulo('Nombre del Instituto');
    $col4->setNombreCampo('instit');

    $col5 = new Columna('Duración');
    $col5->setTipo(Columna::TEXTO);
    $col5->setEsGrabable(true);
    $col5->setNombreCampo('durcur');
    $col5->setAlineacionObjeto(Columna::CENTRO);
    $col5->setAlineacionContenido(Columna::CENTRO);
    $col5->setHTML('type="text" size="10"');
    if ($oculcolinfcur == 'S')
      $col5->setOculta(true);

    $col6 = new Columna('Fecha de Inicio');
    $col6->setTipo(Columna::FECHA);
    $col6->setAlineacionObjeto(Columna::CENTRO);
    $col6->setAlineacionContenido(Columna::CENTRO);
    $col6->setEsGrabable(true);
    $col6->setHTML(' ');
    $col6->setVacia(true);
    $col6->setNombreCampo('fecini');

    $col7 = new Columna('Fecha Fin');
    $col7->setTipo(Columna::FECHA);
    $col7->setAlineacionObjeto(Columna::CENTRO);
    $col7->setAlineacionContenido(Columna::CENTRO);
    $col7->setEsGrabable(true);
    $col7->setHTML(' ');
    $col7->setVacia(true);
    $col7->setNombreCampo('fecfin');

    $col8 = clone $col5;
    $col8->setTitulo('Año Culminación');
    $col8->setNombreCampo('anocul');

    $col9 = new Columna('Activo');
    $col9->setTipo(Columna::CHECK);
    $col9->setEsGrabable(true);
    $col9->setNombreCampo('activo');
    $col9->setHTML(' ');
    $col9->setJScript('onClick= "activar_check(this.id)"');

    $col10 = new Columna('Fecha de Consignación Titulo');
    $col10->setTipo(Columna::FECHA);
    $col10->setAlineacionObjeto(Columna::CENTRO);
    $col10->setAlineacionContenido(Columna::CENTRO);
    $col10->setEsGrabable(true);
    $col10->setHTML(' ');
    $col10->setVacia(true);
    $col10->setNombreCampo('fecenttit');

    $col11 = new Columna('País de Obtención del Título');
    $col11->setTipo(Columna::COMBO);
    $col11->setEsGrabable(true);
    $col11->setNombreCampo('codpaitit');
    $col11->setCombo(Ocpais::getEstados());
    $col11->setHTML(' '); 

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
    $opciones->addColumna($col7);
    $opciones->addColumna($col8);
    $opciones->addColumna($col9);
    $opciones->addColumna($col10);
    $opciones->addColumna($col11);

    $this->obj4 = $opciones->getConfig($per);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid5() {
    $c = new Criteria();
    $c->add(NpinffamPeer::CODEMP, $this->nphojint->getCodemp());
    $c->addDescendingOrderByColumn(NpinffamPeer::FECNAC);
    $per = NpinffamPeer::doSelect($c);

    $inffamnomdes = H::getConfApp('inffamnomdes', 'nomina', 'nomhojint');
    $oculcolinffam = H::getConfApp('oculcolinffam', 'nomina', 'nomhojint');
    $comnivaca = H::getConfApp('comnivaca', 'nomina', 'nomhojint');
    $opciones = new OpcionesGrid();
    $opciones->setEliminar(true);
    $opciones->setTabla('Npinffam');
    $opciones->setAnchoGrid(1850);
    if ($oculcolinffam == 'S')
      $opciones->setAncho(1400);
    else
      $opciones->setAncho(1850);
    $opciones->setName('e');
    $opciones->setTitulo('');
    $opciones->setFilas(15);
    $opciones->setHTMLTotalFilas(' ');

    $this->maskcodemp == '' ? $this->maskcodemp = '################' : '';

    $col1 = new Columna('C.I');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('cedfam');
    $col1->setHTML(' onKeyPress =  "javascript : return dFilterv2(event,this,\'' . $this->maskcodemp . '\')" onBlur="validarFamiliar(this.id)"');

    $col2 = new Columna('Nombre del Familiar');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setEsGrabable(true);
    $col2->setNombreCampo('nomfam');
    $col2->setHTML('type="text" size="25" onkeyUp = "javascript: return this.value = this.value.toUpperCase();"');
    if ($inffamnomdes == 'S')
      $col2->setOculta(true);

    $col3 = new Columna('Primer Nombre Fam.');
    $col3->setTipo(Columna::TEXTO);
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setEsGrabable(true);
    $col3->setNombreCampo('prinom');
    $col3->setHTML('type="text" size="25" maxlength="25"    ');
    if ($inffamnomdes != 'S')
      $col3->setOculta(true);

    $col4 = new Columna('Segundo Nombre Fam.');
    $col4->setTipo(Columna::TEXTO);
    $col4->setAlineacionObjeto(Columna::IZQUIERDA);
    $col4->setAlineacionContenido(Columna::IZQUIERDA);
    $col4->setEsGrabable(true);
    $col4->setNombreCampo('segnom');
    $col4->setHTML('type="text" size="25" maxlength="25"');
    if ($inffamnomdes != 'S')
      $col4->setOculta(true);

    $col5 = new Columna('Primer Apellido Fam.');
    $col5->setTipo(Columna::TEXTO);
    $col5->setAlineacionObjeto(Columna::IZQUIERDA);
    $col5->setAlineacionContenido(Columna::IZQUIERDA);
    $col5->setEsGrabable(true);
    $col5->setNombreCampo('priape');
    $col5->setHTML('type="text" size="25" maxlength="25"');
    if ($inffamnomdes != 'S')
      $col5->setOculta(true);

    $col6 = new Columna('Segundo Apellido Fam.');
    $col6->setTipo(Columna::TEXTO);
    $col6->setAlineacionObjeto(Columna::IZQUIERDA);
    $col6->setAlineacionContenido(Columna::IZQUIERDA);
    $col6->setEsGrabable(true);
    $col6->setNombreCampo('segape');
    $col6->setHTML('type="text" size="25" maxlength="25"');
    if ($inffamnomdes != 'S')
      $col6->setOculta(true);

    $col7 = new Columna('Sexo');
    $col7->setTipo(Columna::COMBO);
    $col7->setEsGrabable(true);
    $col7->setNombreCampo('sexfam');
    $col7->setCombo(Constantes::ListaSexo());
    $col7->setHTML(' ');

    $col8 = new Columna('Fecha Nacimiento');
    $col8->setTipo(Columna::FECHA);
    $col8->setAlineacionObjeto(Columna::CENTRO);
    $col8->setAlineacionContenido(Columna::CENTRO);
    $col8->setEsGrabable(true);
    $col8->setNombreCampo('fecnac');
    $col8->setVacia(true);
    $col8->setJScript('event.keyCode=13; ajax(event,this.id);');

    $col9 = clone $col1;
    $col9->setTitulo('Edad');
    $col9->setNombreCampo('edafamact');
    $col9->setHTML('type="text" size="10" readonly="true"');

    $col10 = new Columna('Seguro HCM');
    $col10->setTipo(Columna::CHECK);
    $col10->setEsGrabable(true);
    $col10->setNombreCampo('seghcm');
    $col10->setHTML('onClick="verificarbenhcm(this.id)"');
    if ($oculcolinffam == 'S')
      $col10->setOculta(true);

    $col11 = new Columna('Fecha Ingreso HCM');
    $col11->setTipo(Columna::FECHA);
    $col11->setAlineacionObjeto(Columna::CENTRO);
    $col11->setAlineacionContenido(Columna::CENTRO);
    $col11->setEsGrabable(true);
    $col11->setHTML(' ');
    $col11->setNombreCampo('fecinghcm');
    $col11->setVacia(true);
    if ($oculcolinffam == 'S')
      $col11->setOculta(true);    

    $col12 = new Columna('Porcentaje Seguro HCM');
    $col12->setTipo(Columna::MONTO);
    $col12->setEsGrabable(true);
    $col12->setNombreCampo('porseghcm');
    $col12->setHTML('type="text" size="10" onBlur = "javascript:event.keyCode=13;return entermontootro(event,this.id)"');
    if ($oculcolinffam == 'S')
      $col12->setOculta(true);

    $col13 = new Columna('Tipo de Carga HCM');
    $col13->setTipo(Columna::COMBO);
    $col13->setEsGrabable(true);
    $col13->setNombreCampo('carben');
    $col13->setCombo(array('' => 'Seleccione...', 'B' => 'Básica', 'A' => 'Adicional', 'S' => 'Segundo Adicional'));
    $col13->setHTML(' ');
    if ($oculcolinffam == 'S')
      $col13->setOculta(true);    

    $col14 = new Columna('Seguro Funerario');
    $col14->setTipo(Columna::CHECK);
    $col14->setEsGrabable(true);
    $col14->setNombreCampo('segfun');
    //$col14->setHTML('onClick="cambiarComboParentesco(this.id)"');
    $col14->setHTML(' ');
    if ($oculcolinffam == 'S')
      $col14->setOculta(true);

    $col15 = new Columna('Parentesco');
    $col15->setTipo(Columna::COMBO);
    $col15->setEsGrabable(true);
    $col15->setNombreCampo('parfam');
    $col15->setCombo(self::cargarParentesco());
    $col15->setHTML('onChange=ajaxparentesco(this.id);');

    $col16 = new Columna('Estado Civil');
    $col16->setTipo(Columna::COMBO);
    $col16->setEsGrabable(true);
    $col16->setNombreCampo('edociv');
    $col16->setCombo(Constantes::ListaEstadoCivil());
    $col16->setHTML(' ');

    $col17 = new Columna('Ocupación');
    $col17->setTipo(Columna::COMBO);
    $col17->setEsGrabable(true);
    $col17->setNombreCampo('ocupac');
    $col17->setCombo(Constantes::ListaOcupacion());
    $col17->setHTML(' ');
    if ($oculcolinffam == 'S')
      $col17->setOculta(true);

    $col18 = new Columna('Grado de Instrucción');
    $col18->setTipo(Columna::TEXTO);
    $col18->setAlineacionObjeto(Columna::IZQUIERDA);
    $col18->setAlineacionContenido(Columna::IZQUIERDA);
    $col18->setEsGrabable(true);
    $col18->setNombreCampo('nivins');
    $col18->setHTML('type="text" size="25" onKeyPress="return validaLetra(event);"');
    if ($oculcolinffam == 'S')
      $col18->setOculta(true);

    $col19 = new Columna('Trabajo u/o Oficio/Lugar de Trabajo');
    $col19->setTipo(Columna::TEXTO);
    $col19->setAlineacionObjeto(Columna::IZQUIERDA);
    $col19->setAlineacionContenido(Columna::IZQUIERDA);
    $col19->setEsGrabable(true);
    $col19->setNombreCampo('traofi');
    $col19->setHTML('type="text" size="25"');
    if ($oculcolinffam == 'S')
      $col19->setOculta(true);

    $col20 = new Columna('Guarderia');
    $col20->setTipo(Columna::TEXTO);
    $col20->setEsGrabable(true);
    $col20->setAlineacionObjeto(Columna::CENTRO);
    $col20->setAlineacionContenido(Columna::CENTRO);
    $col20->setNombreCampo('codgua');
    $col20->setCatalogo('Npguarde', 'sf_admin_edit_form', array('codcon' => 20, 'nomgua' => 21), 'Npguarde_nphojint');
    $col20->setHTML('type="text" size="6"');
    if ($oculcolinffam == 'S')
      $col20->setOculta(true);

    $col21 = new Columna('Descripcion');
    $col21->setTipo(Columna::TEXTO);
    $col21->setEsGrabable(true);
    $col21->setNombreCampo('nomgua');
    $col21->setHTML('type="text" size="25"');
    if ($oculcolinffam == 'S')
      $col21->setOculta(true);

    $col22 = new Columna('Valor Guarderia');
    $col22->setTipo(Columna::MONTO);
    $col22->setEsGrabable(true);
    $col22->setNombreCampo('valgua');
    $col22->setHTML(' onBlur = "javascript:event.keyCode=13;return entermontootro(event,this.id)" ');
    if ($oculcolinffam == 'S')
      $col22->setOculta(true);

    $col23 = new Columna('Discapacitado - Suspendido');
    $col23->setTipo(Columna::COMBO);
    $col23->setEsGrabable(true);
    $col23->setNombreCampo('dissus');
    $col23->setCombo(array('' => 'Seleccione...', 'S' => 'SI', 'N' => 'NO'));
    $col23->setHTML(' ');
    if ($oculcolinffam == 'S')
      $col23->setOculta(true);

    $col24 = new Columna('Fecha de Registro');
    $col24->setTipo(Columna::FECHA);
    $col24->setAlineacionObjeto(Columna::CENTRO);
    $col24->setAlineacionContenido(Columna::CENTRO);
    $col24->setEsGrabable(true);
    $col24->setHTML(' ');
    $col24->setNombreCampo('fecing');
    $col24->setVacia(true);
    $col24->setOculta(true);
    if ($oculcolinffam == 'S')
      $col24->setOculta(true);

    $col25 = new Columna('Consignó Doc. Guarderia');
    $col25->setTipo(Columna::CHECK);
    $col25->setEsGrabable(true);
    $col25->setNombreCampo('docgua');
    $col25->setHTML(' ');
    if ($oculcolinffam == 'S')
      $col25->setOculta(true);

    $col26 = new Columna('Condición Física');
    $col26->setTipo(Columna::TEXTO);
    $col26->setEsGrabable(true);
    $col26->setNombreCampo('confis');
    $col26->setHTML('type="text" size="25" maxlength="500"');

    if ($comnivaca=='S'){
      $col27 = new Columna('Nivel Académico');
      $col27->setTipo(Columna::COMBO);
      $col27->setEsGrabable(true);
      $col27->setNombreCampo('nivaca');
      $col27->setCombo(self::CargarNivel());
      $col27->setHTML(' ');
    }else {
      $col27 = new Columna('Nivel Académico');
      $col27->setTipo(Columna::TEXTO);
      $col27->setEsGrabable(true);
      $col27->setNombreCampo('nivaca');
      $col27->setHTML('type="text" size="25" maxlength="500"');
    }

    $col28 = new Columna('Observaciones');
    $col28->setTipo(Columna::TEXTAREA);
    $col28->setEsGrabable(true);
    $col28->setAlineacionObjeto(Columna::IZQUIERDA);
    $col28->setAlineacionContenido(Columna::IZQUIERDA);
    $col28->setNombreCampo('observ');
    $col28->setHTML('type="text" size="25x1" maxlength="1000"  onkeyup="javascript:return ismaxlength(this)"');

    $col29 = new Columna('Cuenta Bancaria Pensión Alimenticia');
    $col29->setTipo(Columna::TEXTO);
    $col29->setEsGrabable(true);
    $col29->setNombreCampo('ctapen');
    $col29->setHTML('type="text" size="25" maxlength="20"');

    $col30 = new Columna('Concepto de Pensión Alimenticia');
    $col30->setTipo(Columna::TEXTO);
    $col30->setEsGrabable(true);
    $col30->setAlineacionObjeto(Columna::CENTRO);
    $col30->setAlineacionContenido(Columna::CENTRO);
    $col30->setNombreCampo('cptpen');
    $col30->setCatalogo('Npdefcpt', 'sf_admin_edit_form', array('codcon' => 28, 'nomcon' => 29), 'Npdefcpt_nomhojint');
    $col30->setHTML('type="text" size="6" maxlength="3"');

    $col31 = new Columna('Nombre del Concepto');
    $col31->setTipo(Columna::TEXTO);
    $col31->setEsGrabable(false);
    $col31->setNombreCampo('nomcpt');
    $col31->setHTML('type="text" size="25" maxlength="100"');

    $col32 = new Columna('Constancia de Inscripción Estudiantil');
    $col32->setTipo(Columna::COMBO);
    $col32->setEsGrabable(true);
    $col32->setNombreCampo('coninsest');
    $col32->setCombo(array('' => 'Seleccione...', 'S' => 'SI', 'N' => 'NO'));
    $col32->setHTML(' '); 

    $col33 = new Columna('Fecha Entrega Constancia de Inscripción Estudiantil');
    $col33->setTipo(Columna::FECHA);
    $col33->setAlineacionObjeto(Columna::CENTRO);
    $col33->setAlineacionContenido(Columna::CENTRO);
    $col33->setEsGrabable(true);
    $col33->setHTML(' ');
    $col33->setNombreCampo('fecentcie');
    $col33->setVacia(true);

    $col34 = new Columna('Beca Escolar');
    $col34->setTipo(Columna::COMBO);
    $col34->setEsGrabable(true);
    $col34->setNombreCampo('becesc');
    $col34->setCombo(array('' => 'Seleccione...', 'S' => 'SI', 'N' => 'NO'));
    $col34->setHTML(' ');       

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
    $opciones->addColumna($col7);
    $opciones->addColumna($col8);
    $opciones->addColumna($col9);
    $opciones->addColumna($col10);
    $opciones->addColumna($col11);
    $opciones->addColumna($col12);
    $opciones->addColumna($col13);
    $opciones->addColumna($col14);
    $opciones->addColumna($col15);
    $opciones->addColumna($col16);
    $opciones->addColumna($col17);
    $opciones->addColumna($col18);
    $opciones->addColumna($col19);
    $opciones->addColumna($col20);
    $opciones->addColumna($col21);
    $opciones->addColumna($col22);
    $opciones->addColumna($col23);
    $opciones->addColumna($col24);
    $opciones->addColumna($col25);
    $opciones->addColumna($col26);
    $opciones->addColumna($col27);
    $opciones->addColumna($col28);
    $opciones->addColumna($col29);
    $opciones->addColumna($col30);
    $opciones->addColumna($col31);
    $opciones->addColumna($col32);
    $opciones->addColumna($col33);
    $opciones->addColumna($col34);    

    $this->obj5 = $opciones->getConfig($per);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid6() {
    $c = new Criteria();
    $c->add(NpinfdocPeer::CODEMP, $this->nphojint->getCodemp());
    $per = NpinfdocPeer::doSelect($c);

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(true);
    $opciones->setTabla('Npinfdoc');
    $opciones->setAnchoGrid(900);
    $opciones->setAncho(600);
    $opciones->setFilas(20);
    $opciones->setName('g');
    $opciones->setTitulo('');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Código de Documento');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('coddoc');
    $col1->setCatalogo('Npdocemp', 'sf_admin_edit_form', array('coddoc' => 1, 'desdoc' => 2), 'Npdocemp_nonhojint');
    $col1->setHTML('type="text" size="10" maxlength=4');
    $col1->setAjax('nomhojint', 7, 2);

    $col2 = new Columna('Descripción');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setNombreCampo('desdoc');
    $col2->setHTML('type="text" size="60" readonly=true');

    $col3 = new Columna('Fecha Consignación');
    $col3->setTipo(Columna::FECHA);
    $col3->setEsGrabable(true);
    $col3->setHTML(' ');
    $col3->setVacia(true);
    $col3->setNombreCampo('feccon');

    $col4 = new Columna('Observaciones');
    $col4->setTipo(Columna::TEXTAREA);
    $col4->setEsGrabable(true);
    $col4->setAlineacionObjeto(Columna::IZQUIERDA);
    $col4->setAlineacionContenido(Columna::IZQUIERDA);
    $col4->setNombreCampo('observ');
    $col4->setHTML('type="text" size="25x1" maxlength="2000"  onkeyup="javascript:return ismaxlength(this)"');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);

    $this->obj6 = $opciones->getConfig($per);
  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax() {
    $cajtexmos = $this->getRequestParameter('cajtexmos');
    $cajtexcom = $this->getRequestParameter('cajtexcom');
    $javascript = ""; $sw=true; $dato="";
    if ($this->getRequestParameter('ajax') == '1') {
      $edad = Nomina::obtenerEdad($this->getRequestParameter('codigo'));
      $output = '[["' . $cajtexmos . '","' . $edad . '",""]]';
    } else if ($this->getRequestParameter('ajax') == '2') {
      $r = new Criteria();
      $r->add(NpcargosPeer::CODCAR, $this->getRequestParameter('codigo'));
      $datos = NpcargosPeer::doSelectOne($r);
      if ($datos) {
        $dato = $datos->getNomcar();
        $dato2 = number_format($datos->getSuecar(), 2, ',', '.');
        $dato3 = $datos->getComcar();
      } else {
        $dato = "";
        $dato2 = "0,00";
        $dato3 = "0,00";
        $javascript = "alert('El cargo no existe'); $('$cajtexcom').value=''; ";
      }
      $output = '[["' . $cajtexmos . '","' . $dato . '",""],["' . $this->getRequestParameter('suecar') . '","' . $dato2 . '",""],["' . $this->getRequestParameter('comcar') . '","' . $dato3 . '",""],["javascript","' . $javascript . '",""]]';
    } else if ($this->getRequestParameter('ajax') == '3') {
      $annopub = Nomina::obtenerEdad($this->getRequestParameter('codigo'));
      $output = '[["' . $cajtexmos . '","' . $annopub . '",""]]';
    } else if ($this->getRequestParameter('ajax') == '4') {
      $mandepsta=H::getConfApp2('mandepsta', 'nomina', 'nomdefespnivorg');
      $r = new Criteria();
      $r->add(NpestorgPeer::CODNIV, $this->getRequestParameter('codigo'));
      $datos = NpestorgPeer::doSelectOne($r);
      if ($datos) {
        if ($mandepsta=='S')
        {
           if ($datos->getStaact()=='S'){
             $dato = $datos->getDesniv();
             $dato2=$datos->getCoddep().'-'.$datos->getDesdep();
             $javascript="$('nphojint_depen').value='$dato2'";
           }else {
              $dato = "";
              $javascript = "alert('El Nivel Organizacional no esta Activo'); $('$cajtexcom').value=''; ";
           }
        }else {
           $dato = $datos->getDesniv();
        }
      } else {
        $dato = "";
        $javascript = "alert('El Nivel Organizacional no existe'); $('$cajtexcom').value=''; ";
      }
      $output = '[["' . $cajtexmos . '","' . $dato . '",""],["javascript","' . $javascript . '",""]]';
    } else if ($this->getRequestParameter('ajax') == '5') {
      $r = new Criteria();
      $r->add(NpnominaPeer::CODNOM, $this->getRequestParameter('codigo'));
      $datos = NpnominaPeer::doSelectOne($r);
      if ($datos) {
        $dato = $datos->getNomnom();
      } else {
        $dato = "";
        $javascript = "alert_('El C&oacute;digo no existe'); $('$cajtexcom').value=''; ";
      }
      $output = '[["' . $cajtexmos . '","' . $dato . '",""],["javascript","' . $javascript . '",""]]';
    } else if ($this->getRequestParameter('ajax') == '6') {
      $r = new Criteria();
      $r->add(NpdefubiPeer::CODUBI, $this->getRequestParameter('codigo'));
      $datos = NpdefubiPeer::doSelectOne($r);
      if ($datos) {
        $dato = $datos->getDesubi();
      } else {
        $dato = "";
        $javascript = "alert('La Ubicaci&oacute;n F&iacute;sica no existe'); $('$cajtexcom').value=''; ";
      }
      $output = '[["' . $cajtexmos . '","' . $dato . '",""],["javascript","' . $javascript . '",""]]';
    } else if ($this->getRequestParameter('ajax') == '7') {
      $r = new Criteria();
      $r->add(NpdocempPeer::CODDOC, $this->getRequestParameter('codigo'));
      $datos = NpdocempPeer::doSelectOne($r);
      if ($datos) {
        $dato = $datos->getDesdoc();
      } else {
        $dato = "";
        $javascript = "alert_('El C&oacute;digo del Documento no existe'); $('$cajtexcom').value=''; ";
      }
      $output = '[["' . $cajtexmos . '","' . $dato . '",""],["javascript","' . $javascript . '",""]]';
    } else if ($this->getRequestParameter('ajax') == '8') {
      $r = new Criteria();
      $r->add(NphojintPeer::CODEMP, $this->getRequestParameter('codigo'));
      $datos = NphojintPeer::doSelectOne($r);
      if ($datos) {
        $javascript = "alert_('El Empleado ya se encuentra registrado'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
      }
      $output = '[["javascript","' . $javascript . '",""]]';
    } else if ($this->getRequestParameter('ajax') == '9') {
      $r = new Criteria();
      $r->add(NpmotegrPeer::CODMOT, $this->getRequestParameter('codigo'));
      $datos = NpmotegrPeer::doSelectOne($r);
      if ($datos) {
        $dato = $datos->getDesmot();
        $javascript = "colocardatosgriding();";
      } else {
        $dato = "";
        $javascript = "alert_('El Motivo de Egreso no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
      }

      $output = '[["' . $cajtexmos . '","' . $dato . '",""],["javascript","' . $javascript . '",""]]';
    }else if ($this->getRequestParameter('ajax') == '10') {
      $r = new Criteria();
      $r->add(CatipproPeer::CODPRO, $this->getRequestParameter('codigo'));
      $datos = CatipproPeer::doSelectOne($r);
      if ($datos) {
        $dato = $datos->getDespro();
      } else {
        $dato = "";
        $javascript = "alert_('El Proyecto no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
      }

      $output = '[["' . $cajtexmos . '","' . $dato . '",""],["javascript","' . $javascript . '",""]]';
    }else if ($this->getRequestParameter('ajax') == '11') {
      $r = new Criteria();
      $r->add(NpinffamPeer::CEDFAM, $this->getRequestParameter('codemp'));
      $r->add(NpinffamPeer::SEGHCM, 'S');
      $datos = NpinffamPeer::doSelectOne($r);
      if ($datos) {       
        $javascript = "alert_('El Empleado ya esta registrado como un Beneficiario HCM'); $('nphojint_seghcm_S').checked=false; $('nphojint_seghcm_N').checked=true;";
      }else {
          $r1 = new Criteria();
          $r1->add(NphojintPeer::CODEMP, $this->getRequestParameter('codemp'),Criteria::NOT_EQUAL);
          $r1->add(NphojintPeer::CEDEMP, $this->getRequestParameter('cedemp'));
          $r1->add(NphojintPeer::SEGHCM, 'S');
          $datos1 = NphojintPeer::doSelectOne($r1);
          if ($datos1) {       
            $javascript = "alert_('El Empleado ya esta registrado con Seguro HCM'); $('nphojint_seghcm_S').checked=false; $('nphojint_seghcm_N').checked=true;";
          }
      }
      $output = '[["javascript","' . $javascript . '",""]]';
    }else if ($this->getRequestParameter('ajax') == '12') {
      $id=$this->getRequestParameter('idseghcm');
      $r = new Criteria();
      $r->add(NpinffamPeer::CODEMP, $this->getRequestParameter('codemp'),Criteria::NOT_EQUAL);
      $r->add(NpinffamPeer::CEDFAM, $this->getRequestParameter('cedfam'));
      $r->add(NpinffamPeer::SEGHCM, 'S');
      $datos = NpinffamPeer::doSelectOne($r);
      if ($datos) {       
        $javascript = "alert_('El Beneficiario ya esta registrado como un Beneficiario HCM de Otro Empleado'); $('$id').checked=false;";
      }
      $output = '[["javascript","' . $javascript . '",""]]';
    } else if ($this->getRequestParameter('ajax') == '13') {
      $id=$this->getRequestParameter('id');
      $r = new Criteria();
      $r->add(NpinffamPeer::CODEMP, $this->getRequestParameter('codemp'),Criteria::NOT_EQUAL);
      $r->add(NpinffamPeer::CEDFAM, $this->getRequestParameter('codigo'));
      $datos = NpinffamPeer::doSelectOne($r);
      if ($datos) {       
        $javascript = "alert_('El Beneficiario ya esta registrado como un Beneficiario de Otro Empleado'); $('$id').value='';";
      }/*else {
          $r1 = new Criteria();
          $r1->add(NphojintPeer::CODEMP, $this->getRequestParameter('codemp'),Criteria::NOT_EQUAL);
          $r1->add(NphojintPeer::CEDEMP, $this->getRequestParameter('codigo'));
          $datos1 = NphojintPeer::doSelectOne($r1);
          if ($datos1) {       
            $javascript = "alert_('El Beneficiario ya esta registrado como un Empleado'); $('$id').value='';";
          }
      }*/
      $output = '[["javascript","' . $javascript . '",""]]';
    } else if ($this->getRequestParameter('ajax') == '14') {
      $id=$this->getRequestParameter('id');
      $r = new Criteria();
      $r->add(NptipparPeer::TIPPAR, $this->getRequestParameter('codigo'));
      $datos = NptipparPeer::doSelectOne($r);
      if ($datos) { 
        if ($datos->getUnico())      
          $javascript = "validarParentesco('$id');";
      }
      $output = '[["javascript","' . $javascript . '",""]]';
    }else if ($this->getRequestParameter('ajax') == '15') {
      $r1 = new Criteria();
      $r1->add(NphojintPeer::CODEMP, $this->getRequestParameter('codemp'),Criteria::NOT_EQUAL);
      $r1->add(NphojintPeer::CEDEMP, $this->getRequestParameter('cedemp'));
      $r1->add(NphojintPeer::TIEFUN, true);
      $datos1 = NphojintPeer::doSelectOne($r1);
      if ($datos1) {       
        $javascript = "alert_('El Empleado ya esta registrado con Seguro Funerario'); $('nphojint_tiefun').checked=false;";
      }
      
      $output = '[["javascript","' . $javascript . '",""]]';
    }else if ($this->getRequestParameter('ajax') == '16') {
      $sw=false;
      $this->parentescos = array ();
      $seghcm=$this->getRequestParameter('seghcm');
      $segfun=$this->getRequestParameter('segfun');

      $c = new Criteria();
      if ($seghcm=='true' && $segfun=='true') {
        $sql="nptippar.hcmfunamb='A'";
        $c->add(NptipparPeer::HCMFUNAMB,$sql,Criteria::CUSTOM);
      }
      else if ($seghcm=='true') {
        $sql="(nptippar.hcmfunamb='H' or nptippar.hcmfunamb='A')";
        $c->add(NptipparPeer::HCMFUNAMB,$sql,Criteria::CUSTOM);
      }
      else if ($segfun=='true') {
        $sql="(nptippar.hcmfunamb='F' or nptippar.hcmfunamb='A')";
        $c->add(NptipparPeer::HCMFUNAMB,$sql,Criteria::CUSTOM);
      }    
      $lista_parent = NptipparPeer::doSelect($c);
    
      $codreser=H::getConfApp2('codreser', 'nomina', 'nomhojint');


      foreach ($lista_parent as $obj_parent) {
        if ($codreser=='S')
        {
           if ($obj_parent->getTippar()!='000' && $obj_parent->getTippar()!='001')
              $this->parentescos += array($obj_parent->getTippar() => $obj_parent->getDespar());
        }else 
           $this->parentescos += array($obj_parent->getTippar() => $obj_parent->getDespar());
      }

      $output = '[["javascript","' . $javascript . '",""]]';
    }else if ($this->getRequestParameter('ajax') == '17') {
      $r = new Criteria();
      $r->add(NpdefofiPeer::CODOFI, $this->getRequestParameter('codigo'));
      $reg = NpdefofiPeer::doSelectOne($r);
      if ($reg) { 
         $dato=$reg->getDesofi();
      }else {
        $javascript = "alert('La Oficina no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
      }
      $output = '[["' . $cajtexmos . '","' . $dato . '",""],["javascript","' . $javascript . '",""]]';
    }else if ($this->getRequestParameter('ajax') == '18') {    
      $codigo=$this->getRequestParameter('codigo');

      $q= new Criteria();
      $q->add(CadefdirecPeer::CODDIREC,$codigo);
      $reg= CadefdirecPeer::doSelectOne($q);
      if ($reg)
      {
         $dato=$reg->getDesdirec();         
      }else {
          $dato="";
          $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
          if ($cambiareti=='S')
            $js="alert_('La Estado no existe o no esta asociada al usuario'); $('$cajtexcom').value='';  $('$cajtexmos').value=''; $('$cajtexcom').focus();";
          else
           $js="alert_('La Direcci&oacute;n no existe o no esta asociada al usuario'); $('$cajtexcom').value='';  $('$cajtexmos').value=''; $('$cajtexcom').focus();";
      }
      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
    }else if ($this->getRequestParameter('ajax') == '19') {
        $codigo=$this->getRequestParameter('codigo');
        $t= new Criteria();
        $t->add(BnubibiePeer::CODUBI,$codigo);
        $reg= BnubibiePeer::doSelectOne($t);
        if ($reg)        
           $dato=$reg->getDesubi();
        else        
          $js="alert('La Ubicaci&oacute;n F&iacute;sica no esta registrada'); $('$cajtexcom').value='';  $('$cajtexmos').value=''; $('$cajtexcom').focus();";

        $output = '[["javascript","'.$js.'",""],["'.$cajtexmos.'","'.$dato.'",""],["","",""]]';
    }else if ($this->getRequestParameter('ajax') == '20') {
        $codigo=$this->getRequestParameter('codigo');
        $nivel=$this->getRequestParameter('nivel');
        $cambiareti = H::getConfApp('cambiareti', 'nomina', 'nomdefespnivorg');
        if ($nivel!='') {
          $t= new Criteria();
          $t->add(NpuniadsPeer::CODUNIADS,$codigo);
          $reg= NpuniadsPeer::doSelectOne($t);
          if ($reg) {       
             $q= new Criteria();
             $q->add(NpasouninivPeer::CODNIV,$nivel);
             $q->add(NpasouninivPeer::CODUNIADS,$codigo);
             $regq= NpasouninivPeer::doSelectOne($q);
             if ($regq)
               $dato=$reg->getDesuniads();
             else {
                if ($cambiareti!='')
                 $js="alert('La Unidad de Adscripci&oacute;n no esta asociada la $cambiareti'); $('$cajtexcom').value='';  $('$cajtexmos').value=''; $('$cajtexcom').focus();";
                else
                 $js="alert('La Unidad de Adscripci&oacute;n no esta asociada la Unidad Administrativa'); $('$cajtexcom').value='';  $('$cajtexmos').value=''; $('$cajtexcom').focus();";
              }
          }else        
            $js="alert('La Unidad de Adscripci&oacute;n no esta registrada'); $('$cajtexcom').value='';  $('$cajtexmos').value=''; $('$cajtexcom').focus();";
        }else {
          if ($cambiareti!='')
            $js="alert('Debe seleccionar Primero la $cambiareti'); $('$cajtexcom').value='';  $('$cajtexmos').value=''; $('$cajtexcom').focus();";
          else
            $js="alert('Debe seleccionar Primero la Unidad Administrativa'); $('$cajtexcom').value='';  $('$cajtexmos').value=''; $('$cajtexcom').focus();";
        }

        $output = '[["javascript","'.$js.'",""],["'.$cajtexmos.'","'.$dato.'",""],["","",""]]';
    }


    $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
    if ($sw) return sfView::HEADER_ONLY;
  }

  public function setVars() {
    $this->mascaranivel = Herramientas::ObtenerFormato('Npdefgen', 'Fororg');
    $this->lonnivel = strlen($this->mascaranivel);
    $this->mascaraemp = Herramientas::ObtenerFormato('Npdefgen', 'Foremp');
    $this->mascaraubi = Herramientas::ObtenerFormato('Opdefemp', 'Forubi');
    $this->lonnivel2 = strlen($this->mascaraubi);
    $this->lonemp = strlen($this->mascaraemp);
    $this->c = null;
    $maskcodemp = H::getConfApp('maskcodemp', 'nomina', 'nomhojint');
    $this->maskcodemp = $maskcodemp;
    $mayus = H::getConfApp('mayus', 'nomina', 'nomhojint');
    $maskrif = H::getConfApp('maskrif', 'nomina', 'nomhojint');
    $masktel = H::getConfApp('masktel', 'nomina', 'nomhojint');
    $this->getUser()->setAttribute('mayus', $mayus, 'nomhojint');
    $this->getUser()->setAttribute('maskrif', $maskrif, 'nomhojint');
    $this->getUser()->setAttribute('masktel', $masktel, 'nomhojint');
    $this->getUser()->setAttribute('maskcodemp', $maskcodemp, 'nomhojint');
  }

  protected function getLabels() {
    $cambiareti = H::getConfApp('cambiareti', 'nomina', 'nomdefespnivorg');
    $cameti=H::getConfApp2('cameti', 'compras', 'almdefdirec');

    $labels = parent::getLabels();

    $labels['nphojint{codniv}'] = (($cambiareti != '') ? $cambiareti . ':' : 'Ubicación Administrativa:') . ':';
    if ($cameti=='S')
      $labels['nphojint{coddirec}']='Estado: ';

    return $labels;

  }


  public function executeVeredad(){
    
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid7() {
    $c = new Criteria();
    $c->add(NpinfherPeer::CODEMP, $this->nphojint->getCodemp());
    $c->addDescendingOrderByColumn(NpinfherPeer::FECNAC);
    $per = NpinfherPeer::doSelect($c);

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(true);
    $opciones->setTabla('Npinfher');
    $opciones->setAnchoGrid(850);
    $opciones->setAncho(850);
    $opciones->setName('h');
    $opciones->setTitulo('');
    $opciones->setFilas(10);
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('C.I');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('cedher');

    $col2 = new Columna('Nombre del Heredero');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setEsGrabable(true);
    $col2->setNombreCampo('nomher');
    $col2->setHTML('type="text" size="25" onkeyUp = "javascript: return this.value = this.value.toUpperCase();"');

    $col3 = new Columna('Sexo');
    $col3->setTipo(Columna::COMBO);
    $col3->setEsGrabable(true);
    $col3->setNombreCampo('sexher');
    $col3->setCombo(Constantes::ListaSexo());
    $col3->setHTML(' ');

    $col4 = new Columna('Fecha Nacimiento');
    $col4->setTipo(Columna::FECHA);
    $col4->setAlineacionObjeto(Columna::CENTRO);
    $col4->setAlineacionContenido(Columna::CENTRO);
    $col4->setEsGrabable(true);
    $col4->setNombreCampo('fecnac');
    $col4->setVacia(true);

    $col5 = new Columna('Parentesco');
    $col5->setTipo(Columna::COMBO);
    $col5->setEsGrabable(true);
    $col5->setNombreCampo('parher');
    $col5->setCombo(self::cargarParentesco());
    $col5->setHTML(' ');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);

    $this->obj7 = $opciones->getConfig($per);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid8() {
    $c = new Criteria();
    $c->add(NpasonucempPeer::CODEMP, $this->nphojint->getCodemp());
    $c->addDescendingOrderByColumn(NpasonucempPeer::CODNIV);
    $per = NpasonucempPeer::doSelect($c);

    $mascara = Herramientas::ObtenerFormato('Npdefgen', 'Fororg');
    $lonniv = strlen($mascara);

    $obj= array('codniv' => 1, 'desniv' => 2);
    $params= array('param1' => $lonniv, 'val2');

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/nomhojint/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_nucleos');

    $this->columnas[1][0]->setHTML('type="text" size="17" maxlength="'.chr(39).$lonniv.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
    $this->columnas[1][0]->setCatalogo('npestorg','sf_admin_edit_form',$obj,'Npestorg_Nomhojint',$params);

    $this->obj8 =$this->columnas[0]->getConfig($per);
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
          if ($grid[$fila][$col-1]!="")
          {
           if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
           {
               $lonniv = strlen(H::ObtenerFormato('Npdefgen', 'Fororg'));
               if (strlen($grid[$fila][$col-1])==$lonniv)
               {    
                  $c = new Criteria();                            
                  $c->add(NpestorgPeer::CODNIV,$grid[$fila][$col-1]);                            
                  $alm = NpestorgPeer::doSelectOne($c);
                   if ($alm)
                   {
                      $grid[$fila][1]=$alm->getDesniv();                       
                   }else {
                      $grid[$fila][$col-1]="";
                      $grid[$fila][1]="";
                      $javascript="alert_('La Ubicaci&oacute;n no esta asociada a este almac&eacute;n');";
                   }
               }else {
                  $grid[$fila][$col-1]="";
                  $grid[$fila][1]="";
                  $javascript="alert_('La Ubicaci&oacute;n no es de &uacute;ltimo nivel');";
               }
           }else {
              $grid[$fila][$col-1]="";
              $grid[$fila][1]="";
              $javascript="alert_('La Ubicaci&oacute;n esta repetida');";
           }
          $jsonextra = ',["javascript","' . $javascript . '",""]';
          }                        
          break;    
      default:
          break;
    }


    $output = Herramientas::grid_to_json($grid,$name,$jsonextra);
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::HEADER_ONLY;
  }

        protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['codemp_is_empty']))
    {
      $criterion = $c->getNewCriterion(NphojintPeer::CODEMP, '');
      $criterion->addOr($c->getNewCriterion(NphojintPeer::CODEMP, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codemp']) && $this->filters['codemp'] !== '')
    {
      $c->add(NphojintPeer::CODEMP, '%'.strtr($this->filters['codemp'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['nomemp_is_empty']))
    {
      $criterion = $c->getNewCriterion(NphojintPeer::NOMEMP, '');
      $criterion->addOr($c->getNewCriterion(NphojintPeer::NOMEMP, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nomemp']) && $this->filters['nomemp'] !== '')
    {
      $c->add(NphojintPeer::NOMEMP, '%'.strtr($this->filters['nomemp'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['cedemp_is_empty']))
    {
      $criterion = $c->getNewCriterion(NphojintPeer::CEDEMP, '');
      $criterion->addOr($c->getNewCriterion(NphojintPeer::CEDEMP, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['cedemp']) && $this->filters['cedemp'] !== '')
    {
      $c->add(NphojintPeer::CEDEMP, '%'.strtr($this->filters['cedemp'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['codniv_is_empty']))
    {
      $criterion = $c->getNewCriterion(NphojintPeer::CODNIV, '');
      $criterion->addOr($c->getNewCriterion(NphojintPeer::CODNIV, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codniv']) && $this->filters['codniv'] !== '')
    {
      $c->add(NphojintPeer::CODNIV, '%'.strtr($this->filters['codniv'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['desniv_is_empty']))
    {
      $criterion = $c->getNewCriterion(NphojintPeer::DESNIV, '');
      $criterion->addOr($c->getNewCriterion(NphojintPeer::DESNIV, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['desniv']) && $this->filters['desniv'] !== '')
    {
      $c->add(NpestorgPeer::DESNIV, strtr("%".$this->filters['desniv']."%", '*', '%'), Criteria::LIKE);
      $c->addJoin(NphojintPeer::CODNIV, NpestorgPeer::CODNIV);
      $c->setIgnoreCase(true);
    }   
    if (isset($this->filters['codtipemp_is_empty']))
    {
      $criterion = $c->getNewCriterion(NphojintPeer::CODTIPEMP, '');
      $criterion->addOr($c->getNewCriterion(NphojintPeer::CODTIPEMP, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codtipemp']) && $this->filters['codtipemp'] !== '')
    {
      $c->add(NphojintPeer::CODTIPEMP, '%'.strtr($this->filters['codtipemp'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['staemp_is_empty']))
    {
      $criterion = $c->getNewCriterion(NphojintPeer::STAEMP, '');
      $criterion->addOr($c->getNewCriterion(NphojintPeer::STAEMP, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['staemp']) && $this->filters['staemp'] !== '')
    {
      $c->add(NphojintPeer::STAEMP, '%'.strtr($this->filters['staemp'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
  }

}
