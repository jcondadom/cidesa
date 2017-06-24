<?php

/**
 * licprebasob actions.
 *
 * @package    siga
 * @subpackage licprebasob
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */
class licprebasobActions extends autolicprebasobActions {

  public function listing() {
    $this->c = new Criteria();
    $sql = "(Liprebas.tipconpub='O')";
    $this->c->add(LiprebasPeer::TIPCONPUB, $sql, Criteria::CUSTOM);
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing() {
    $c = new Criteria();
    $per = TsdesmonPeer::doSelect($c);
    $arrmon = array();

    foreach ($per as $d) {
      $arrmon[$d->getCodmon()] = $d->getNommon();
    }
    $this->CargarCombos();
    $this->params = array('arrmon' => $arrmon, 'arrsec' => $this->arrsec, 'arrpar' => $this->arrpar, 'arrmun' => $this->arrmun, 'arredo' => $this->arredo, 'arrpai' => $this->arrpai);

    $this->configGrid($this->liprebas->getCodmon(), $this->liprebas->getValcam());
    $this->configGridRec();
    $this->configGridRgo();
  }

  public function CargarCombos() {
    #PAIS
    $per = OcpaisPeer::doSelect(new Criteria());
    $arr = array('' => 'Seleccione...');
    foreach ($per as $r) {
      $arr[$r->getCodpai()] = $r->getNompai();
    }
    $this->arrpai = $arr;
    $arr = array('' => 'Seleccione...');
    #ESTADO
    if ($this->liprebas->getCodpai() != '') {
      $c = new Criteria();
      $c->add(OcestadoPeer::CODPAI, $this->liprebas->getCodpai());
      $per = OcestadoPeer::doSelect($c);
      foreach ($per as $r) {
        $arr[$r->getCodedo()] = $r->getNomedo();
      }
    }
    $this->arredo = $arr;
    $arr = array('' => 'Seleccione...');
    #MUNICIPIO
    if ($this->liprebas->getCodedo() != '') {
      $c = new Criteria();
      $c->add(OcmuniciPeer::CODPAI, $this->liprebas->getCodpai());
      $c->add(OcmuniciPeer::CODEDO, $this->liprebas->getCodedo());
      $per = OcmuniciPeer::doSelect($c);
      foreach ($per as $r) {
        $arr[$r->getCodmun()] = $r->getNommun();
      }
    }
    $this->arrmun = $arr;
    $arr = array('' => 'Seleccione...');
    #PARROQUIA
    if ($this->liprebas->getCodmun() != '') {
      $c = new Criteria();
      $c->add(OcparroqPeer::CODPAI, $this->liprebas->getCodpai());
      $c->add(OcparroqPeer::CODEDO, $this->liprebas->getCodedo());
      $c->add(OcparroqPeer::CODMUN, $this->liprebas->getCodmun());
      $per = OcparroqPeer::doSelect($c);
      foreach ($per as $r) {
        $arr[$r->getCodpar()] = $r->getNompar();
      }
    }
    $this->arrpar = $arr;
    $arr = array('' => 'Seleccione...');
    #SECTOR
    if ($this->liprebas->getCodpar() != '') {
      $c = new Criteria();
      $c->add(OcsectorPeer::CODPAI, $this->liprebas->getCodpai());
      $c->add(OcsectorPeer::CODEDO, $this->liprebas->getCodedo());
      $c->add(OcsectorPeer::CODMUN, $this->liprebas->getCodmun());
      $c->add(OcsectorPeer::CODPAR, $this->liprebas->getCodpar());
      $per = OcsectorPeer::doSelect($c);
      foreach ($per as $r) {
        $arr[$r->getCodsec()] = $r->getNomsec();
      }
    }
    $this->arrsec = $arr;
  }

  public function configGrid($codigo='', $valmon='', $reg = array(), $regelim = array()) {
    $this->regelim = $regelim;

    if (!count($reg) > 0) {
      // Aquí va el código para traernos los registros que contendrá el grid
      $reg = array();
      // Aquí va el código para generar arreglo de configuración del grid
      $this->obj = array();
    }
    $c = new Criteria();
    $c->add(LiprebasdetPeer::NUMPRE, $this->liprebas->getNumpre());
    $c->addAscendingOrderByColumn(LiprebasdetPeer::ID);
    $reg = LiprebasdetPeer::doSelect($c);
    $i = 1;
    foreach ($reg as $r)
      $r->setNumpar($i++);
    if ($valmon != $this->liprebas->getValcam())
      $reg = array();
    $this->obj = Herramientas::getConfigGrid('grid');
    if ($this->liprebas->getNumpre())
      $this->obj[1][9]->setHtml(' readonly=false ');
    else
      $this->obj[1][9]->setHtml(' readonly=true ');
    if ($codigo == '' || $codigo == '001') {
      $this->obj[1][10]->setHtml(' readonly=false ');
      $this->obj[1][11]->setOculta(true);
      $this->obj[1][13]->setOculta(true);
      $this->obj[1][16]->setOculta(true);
      $this->obj[1][17]->setOculta(true);
    } else {
      $this->obj[1][10]->setHtml(' readonly=true ');
      $this->obj[1][11]->setHtml(' readonly=false ');
      $this->obj[1][11]->setOculta(false);
      $this->obj[1][13]->setOculta(false);
      $this->obj[1][16]->setOculta(false);
      $this->obj[1][17]->setOculta(false);
    }
    $valmon = H::FormatoMonto($valmon);
    $this->obj[1][17]->setHtml(' value="' . $valmon . '"  readonly=true');
    $this->obj = $this->obj[0]->getConfig($reg);
    $this->liprebas->setGrid($this->obj);
  }

  public function configGridRec($codart='', $codcat='', $subtot='', $reg = array(), $regelim = array()) {
    $this->regelim = $regelim;

    if (!count($reg) > 0) {
      // Aquí va el código para traernos los registros que contendrá el grid
      $reg = array();
      // Aquí va el código para generar arreglo de configuración del grid      
    }
    $c = new Criteria();
    $c->add(LiprergoPeer::NUMPRE, $this->liprebas->getNumpre());
    $c->add(LiprergoPeer::CODART, $codart);
    $c->addAscendingOrderByColumn(LiprergoPeer::CODRGO);
    $reg = LiprergoPeer::doSelect($c);
    $this->obj2 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir') . '/licprebasob/' . sfConfig::get('sf_app_module_config_dir_name') . '/grid_rec');

    $this->obj2[1][5]->setHtml(" value='$codart' ");
    $this->obj2[1][6]->setHtml(" value='$codcat' ");
    $this->obj2[1][8]->setHtml(" value='$subtot' ");
    $this->obj2[1][0]->setHtml(" onBlur='CalculaRgo(this.id);' ");

    $this->obj2 = $this->obj2[0]->getConfig($reg);
    $this->liprebas->setGrid_rec($this->obj2);
  }

  public function configGridRgo($reg = array(), $regelim = array()) {
    $this->regelim = $regelim;

    if (!(count($reg) > 0)) {
      // Aquí va el código para traernos los registros que contendrá el grid
      $c = new Criteria();
      $c->add(LiprergofacPeer::NUMPRE, $this->liprebas->getNumpre());
      $c->addAscendingOrderByColumn(LiprergofacPeer::CODRGO);
      $reg = LiprergofacPeer::doSelect($c);
    }
    $this->obj3 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir') . '/licprebasob/' . sfConfig::get('sf_app_module_config_dir_name') . '/gridrgo');

    $this->obj3 = $this->obj3[0]->getConfig($reg);
    $this->liprebas->setGridrgo($this->obj3);
  }

  public function executeAjaxcolumna() {
    $js = '';
    $name = $this->getRequestParameter('grid', '');
    $grid = $this->getRequestParameter('grid' . $name, '');

    $fila = $this->getRequestParameter('fila', '');
    $columna = $this->getRequestParameter('columna', '');

    $columnas = $this->getRequestParameter('columnas', '');

    if ($name == 'a') {
      if ($columna == '2') {
        $codpar = $grid[$fila]['codart'];
        $c = new Criteria();
        $c->add(OcdefparPeer::CODPAR, $codpar);
        $ocdefpar = OcdefparPeer::doSelectOne($c);
        if ($ocdefpar) {

          $parsedText = str_replace(chr(10), "", $ocdefpar->getDespar());
          $grid[$fila]['desart'] = str_replace(chr(13), "", $parsedText);
          $grid[$fila]['unimed'] = $ocdefpar->getAbruni();
          $grid[$fila]['numpar'] = $fila + 1;

          $encontrado = false;
          foreach ($grid as $index => $fila) {
            if ($codpar == $fila['codart']) {
              if ($encontrado) {
                $grid[$index]['codart'] = '';
                $grid[$index]['desart'] = '';
                $grid[$index]['unimed'] = '';
                $js = "alert('La partida esta repetida');";
                break;
              }
              else
                $encontrado=true;
            }
          }
        }else {
          $grid[$fila]['codart'] = '';
          $grid[$fila]['desart'] = '';
          $grid[$fila]['unimed'] = '';
          $js = "alert('La partida no existe');";
        }
      }
    }

    $output = Herramientas::grid_to_json($grid, $name, ',["javascript","' . $js . '",""]', $columnas);

    $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');

    return sfView::HEADER_ONLY;
  }

  public function executeAjaxfila() {
    $js = '';
    $name = $this->getRequestParameter('grid', '');
    $grid = $this->getRequestParameter('grid' . $name, '');

    $fila = $this->getRequestParameter('fila', '');
    $columna = $this->getRequestParameter('columna', '');
    $columnas = $this->getRequestParameter('columnas', '');
    $nombre_columna = $this->getRequestParameter('namecol', '');

    if ($name == 'a') {
      $grid[$fila]['numpar'] = $fila + 1;
      if ($nombre_columna == 'codart') {
        $codpar = $grid[$fila]['codart'];
        $c = new Criteria();
        $c->add(OcdefparPeer::CODPAR, $codpar);
        $ocdefpar = OcdefparPeer::doSelectOne($c);
        if ($ocdefpar) {
          $parsedText = str_replace(chr(10), "", $ocdefpar->getDespar());
          $grid[$fila]['desart'] = str_replace(chr(13), "", $parsedText);
          $grid[$fila]['unimed'] = $ocdefpar->getAbruni();
        } else {
          $grid[$fila]['codart'] = '';
          $grid[$fila]['desart'] = '';
          $grid[$fila]['unimed'] = '';
          $js = "alert('La partida no existe');";
        }
      } elseif ($nombre_columna == 'codcat') {
        $codcat = $grid[$fila]['codcat'];
        $codart = $grid[$fila]['codart'];
        $codpar = H::GetX('Codart', 'Caregart', 'Codpar', $codart);
        $nomcat = H::GetX('Codcat', 'Npcatpre', 'Nomcat', $codcat);
        $codpre = $codcat . '-' . $codpar;
        $mondis = 0;
        $sql = "select mondis from cpasiini where perpre='00' and codpre='$codpre'";
        if (H::BuscarDatos($sql, $rs)) {
          $mondis = $rs[0]['mondis'];
        }
        $grid[$fila]['codpre'] = $codpre;
        $grid[$fila]['nomcat'] = $nomcat;
        $grid[$fila]['dispo'] = H::FormatoMonto($mondis);
        #$js+="$('".$name."x_".$fila."_7').focus()";
      } elseif ($nombre_columna == 'canapr' || $nombre_columna == 'costo' || $nombre_columna == 'costoe' || $nombre_columna == 'cansol') {
        $cansol = H::FormatoNum($grid[$fila]['cansol']);
        $canapr = H::FormatoNum($grid[$fila]['canapr']);
        $costoo = H::FormatoNum($grid[$fila]['costo']);
        $costoe = H::FormatoNum(isset($grid[$fila]['costoe']) ? $grid[$fila]['costoe'] : 0);
        $monrec = H::FormatoNum(isset($grid[$fila]['monrec']) ? $grid[$fila]['monrec'] : 0);
        $subtoto = H::FormatoNum(isset($grid[$fila]['subtot']) ? $grid[$fila]['subtot'] : 0);
        $subtote = H::FormatoNum(isset($grid[$fila]['subtote']) ? $grid[$fila]['subtote'] : 0);
        $totalo = H::FormatoNum(isset($grid[$fila]['montot']) ? $grid[$fila]['montot'] : 0);
        $totale = H::FormatoNum(isset($grid[$fila]['montote']) ? $grid[$fila]['montote'] : 0);
        $valmon = H::FormatoNum(isset($grid[$fila]['valcam']) ? $grid[$fila]['valcam'] : 0);
        if ($nombre_columna == 'costo' && intval($canapr) <= 0) {
          $subtoto = $cansol * $costoo;
          $totalo = $subtoto + $monrec;
          $subtote = $cansol * $costoe;
          $totale = $subtote + $monrec;
        } elseif ($nombre_columna == 'costo' && $canapr > 0) {
          $subtoto = $canapr * $costoo;
          $totalo = $subtoto + $monrec;
          $subtote = $canapr * $costoe;
          $totale = $subtote + $monrec;
        } elseif ($nombre_columna == 'costo') {
          if ($canapr > 0) {
            $subtoto = $canapr * $costoo;
          } else {
            $subtoto = $cansol * $costoo;
          }
          $totalo = $subtoto + $monrec;
        } elseif ($nombre_columna == 'costo') {
          $costoo = $costoe * $valmon;
          if ($canapr > 0) {
            $subtote = $canapr * $costoe;
            $subtoto = $canapr * $costoo;
          } else {
            $subtote = $cansol * $costoe;
            $subtoto = $cansol * $costoo;
          }
          $monrec = 0;
          $totale = $subtote + $monrec;
          $totalo = $subtoto + $monrec;
          $grid[$fila]['costo'] = H::FormatoMonto($costoo);
        }
        $grid[$fila]['subtot'] = H::FormatoMonto($subtoto);
        $grid[$fila]['montot'] = H::FormatoMonto($subtoto);
        $grid[$fila]['cantot'] = H::FormatoMonto($totalo);
        $grid[$fila]['subtote'] = H::FormatoMonto($subtote);
        $grid[$fila]['monrec'] = H::FormatoMonto($monrec);
        $grid[$fila]['cantote'] = H::FormatoMonto($totale);
        $grid[$fila]['numpar'] = $fila + 1;
        $js = "ActualizarSaldosGrid('a',ArrTotales_a)";
      }
    } elseif ($name == 'b') {
      if ($columna == '3') {
        $codcat = $grid[$fila][1];
        $codart = $grid[$fila][0];
        $tiprgo = $grid[$fila][4];
        $monrgo = H::FormatoNum($grid[$fila][5]);
        $subtot = H::FormatoNum($grid[$fila][7]);
        $codpar = H::GetX('Codart', 'Caregart', 'Codpar', $codart);
        $codpre = $codcat . '-' . $codpar;
        if ($tiprgo == 'P') {
          $monto = ($subtot * $monrgo) / 100;
        } else {
          $monto = $subtot + $monrgo;
        }
        $grid[$fila][6] = $codpre;
        $grid[$fila][8] = H::FormatoMonto($monto);
      }
    }

    $output = Herramientas::grid_to_json($grid, $name, ',["javascript","' . $js . '",""]', $columnas);

    $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');

    return sfView::HEADER_ONLY;
  }

  public function executeAjax() {

    $codigo = $this->getRequestParameter('codigo', '');
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el código necesario
    $ajax = $this->getRequestParameter('ajax', '');
    $sw = true;
    // Se debe enviar en la petición ajax desde el cliente los datos que necesitemos
    // para generar el código de retorno, esto porque en un llamado Ajax no se devuelven
    // los datos de los objetos de la vista como pasa en un submit normal.

    switch ($ajax) {
      case '1':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
        $c = new Criteria();
        $c->add(LidatstePeer::CODEMP, $codigo);
        $per = LidatstePeer::doSelectOne($c);
        $coduniadm = '';
        $desuniadm = '';
        $nomemp = '';
        $nomcar = '';
        if ($per) {
          $nomemp = $per->getNomemp();
          $nomcar = $per->getNomcar();
          $coduniadm = $per->getCoduniadm();
          $desuniadm = $per->getDesuniadm();
        }
        $output = '[["liprebas_nomempadm","' . $nomemp . '",""],["liprebas_nomcaradm","' . $nomcar . '",""],["liprebas_coduniadm","' . $coduniadm . '",""],
                    ["liprebas_desuniadm","' . $desuniadm . '",""]]';
        break;
      case '2':
        $c = new Criteria();
        $c->add(LidatstePeer::CODEMP, $codigo);
        $per = LidatstePeer::doSelectOne($c);
        $nomemp = '';
        $nomcar = '';
        $coduniste = '';
        $desuniste = '';
        $dir = '';
        $pai = '';
        $edo = '';
        $mun = '';
        $par = '';
        $sec = '';
        if ($per) {
          $nomemp = $per->getNomemp();
          $nomcar = $per->getNomcar();
          $coduniste = $per->getCoduniste();
          $desuniste = $per->getDesuniste();
          $dir = $per->getDirste();
          $pai = H::GetX('Codpai', 'Ocpais', 'Nompai', $per->getCodpai());
          $edo = H::GetX('Codedo', 'Ocestado', 'Nomedo', $per->getCodedo());
          $mun = H::GetX('Codmun', 'Ocmunici', 'Nommun', $per->getCodmun());
          $par = H::GetX('Codpar', 'Ocparroq', 'Nompar', $per->getCodpar());
          $sec = H::GetX('Codsec', 'Ocsector', 'Nomsec', $per->getCodsec());
        }
        $output = '[["liprebas_nomempeje","' . $nomemp . '",""],["liprebas_nomcareje","' . $nomcar . '",""],["liprebas_coduniste","' . $coduniste . '",""],
                    ["liprebas_desuniste","' . $desuniste . '",""],["liprebas_dirunieje","' . $dir . '",""],["liprebas_pai","' . $pai . '",""],
                    ["liprebas_edo","' . $edo . '",""],["liprebas_mun","' . $mun . '",""],["liprebas_par","' . $par . '",""],["liprebas_sec","' . $sec . '",""]]';
        break;
      case '3':
        $c = new Criteria();
        $c->add(LidatstePeer::CODUNISTE, $codigo);
        $per = LidatstePeer::doSelectOne($c);
        $coduniste = '';
        $desuniste = '';
        $dir = '';
        $pai = '';
        $edo = '';
        $mun = '';
        $par = '';
        $sec = '';
        if ($per) {
          $coduniste = $per->getCoduniste();
          $desuniste = $per->getDesuniste();
          $dir = $per->getDirste();
          $pai = H::GetX('Codpai', 'Ocpais', 'Nompai', $per->getCodpai());
          $edo = H::GetX('Codedo', 'Ocestado', 'Nomedo', $per->getCodedo());
          $mun = H::GetX('Codmun', 'Ocmunici', 'Nommun', $per->getCodmun());
          $par = H::GetX('Codpar', 'Ocparroq', 'Nompar', $per->getCodpar());
          $sec = H::GetX('Codsec', 'Ocsector', 'Nomsec', $per->getCodsec());
        }
        $output = '[["liprebas_coduniste","' . $coduniste . '",""],["liprebas_desuniste","' . $desuniste . '",""],["liprebas_dirunieje","' . $dir . '",""],["liprebas_pai","' . $pai . '",""],
                    ["liprebas_edo","' . $edo . '",""],["liprebas_mun","' . $mun . '",""],["liprebas_par","' . $par . '",""],["liprebas_sec","' . $sec . '",""]]';
        break;
      case '4':
        $fecha = $this->getRequestParameter('fecha', '');
        $dias = $this->getRequestParameter('dias', '');
        if ($fecha && $dias) {
          $sql = "select to_char(to_date('$fecha','dd/mm/yyyy')+$dias,'dd/mm/yyyy') as fecven";
          if (H::BuscarDatos($sql, $rs))
            $fecven = $rs[0]['fecven'];
        }else
          $fecven=null;
        $output = '[["liprebas_fecven","' . $fecven . '",""],["","",""],["","",""]]';
        break;
      case '5':
        $monpre = $this->getRequestParameter('monpre', '');
        $monpreext = $this->getRequestParameter('monpreext', '');
        $monpreletras = H::obtenermontoescrito(($monpre));
        $monpreextletras = H::obtenermontoescrito(($monpreext));
        #ESTA PROCESO ESTA DE PRUEBA
        $js = "InicializaRec();";
        ################################
        $output = '[["liprebas_monpre","' . H::FormatoMonto($monpre) . '",""],["liprebas_monpreext","' . H::FormatoMonto($monpreext) . '",""],
                      ["liprebas_monpreletras","' . $monpreletras . '",""],["liprebas_monpreextletras","' . $monpreextletras . '",""],
                      ["liprebas_monsub","' . H::FormatoMonto($monpre) . '",""],["liprebas_monsube","' . H::FormatoMonto($monpreext) . '",""],
                      ["liprebas_monrgo","' . H::FormatoMonto(0) . '",""],["liprebas_monrgoe","' . H::FormatoMonto(0) . '",""],
                      ["javascript","' . $js . '",""]]';
        break;
      case '6':
        $codmon = $this->getRequestParameter('codmon', '');
        $c = new Criteria();
        $c->add(TscammonPeer::CODMON, $codmon);
        $c->add(TscammonPeer::VALMON, H::FormatoNum($codigo));
        $per = TscammonPeer::doSelectOne($c);
        $dato = '';
        if ($per) {
          $dato = $per->getFecmon();
        }
        if ($codmon != '001') {
          $js = "$('liprebas_valcam').setAttribute('style','border:none');
               $('liprebas_feccam').setAttribute('style','border:none');
               $('divmonpreext').show();
               $('divmonsube').show();
               $('divmonrgoe').show();
               $('divmonpreextletras').show();
               CalculaGrid('$codmon','$codigo');";
        } else {
          $js = "
               $('divmonpreext').hide();
               $('divmonpreextletras').hide();
               $('divmonsube').hide();
               $('divmonrgoe').hide();
               $('divvalcam').hide();
               CalculaGrid('$codmon','$codigo');";
        }

        $output = '[["liprebas_fecmon","' . $dato . '",""],["javascript","' . $js . '",""],["","",""]]';
        break;
      case '7':
        $valmon = $this->getRequestParameter('valmon', '');
        $this->liprebas = $this->getLiprebasOrCreate();
        $this->UpdateLiprebasFromRequest();
        $this->configGrid($codigo, $valmon);
        $sw = false;
        $this->ajax = $ajax;
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      case '8':
        $codart = $this->getRequestParameter('codart', '');
        $codcat = $this->getRequestParameter('codcat', '');
        $subtot = $this->getRequestParameter('subtot', '');
        $this->getUser()->getAttributeHolder()->remove('idmonrec', 'licprebasob');
        $this->getUser()->getAttributeHolder()->remove('idcadena', 'licprebasob');
        $this->getUser()->getAttributeHolder()->remove('idmontot', 'licprebasob');
        $this->getUser()->getAttributeHolder()->remove('subtot', 'licprebasob');
        $this->getUser()->setAttribute('idmonrec', $this->getRequestParameter('idmonrec', ''), 'licprebasob');
        $this->getUser()->setAttribute('idcadena', $this->getRequestParameter('idcadena', ''), 'licprebasob');
        $this->getUser()->setAttribute('idmontot', $this->getRequestParameter('idmontot', ''), 'licprebasob');
        $this->getUser()->setAttribute('subtot', $this->getRequestParameter('subtot', ''), 'licprebasob');
        $this->liprebas = $this->getLiprebasOrCreate();
        $this->UpdateLiprebasFromRequest();
        $this->configGridRec($codart, $codcat, $subtot);
        $sw = false;
        $this->ajax = $ajax;
        $js = "$('divgrid_rec').show();";
        $output = '[["javascript","' . $js . '",""],["","",""],["","",""]]';
        break;
      case '9':
        $idcodpre = $this->getRequestParameter('idcodpre', '');
        $idmonto = $this->getRequestParameter('idmonto', '');
        $codart = $this->getRequestParameter('codart', '');
        $codcat = $this->getRequestParameter('codcat', '');
        $codrgo = $this->getRequestParameter('codrgo', '');
        $tiprgo = $this->getRequestParameter('tiprgo', '');
        $monrgo = H::FormatoNum($this->getRequestParameter('monrgo', ''));
        $subtot = H::FormatoNum($this->getRequestParameter('subtot', ''));
        $codpar = H::GetX('Codart', 'Caregart', 'Codpar', $codart);
        $codpre = $codcat . '-' . $codpar;
        if ($tiprgo == 'P') {
          $monto = ($subtot * $monrgo) / 100;
        } else {
          $monto = $subtot + $monrgo;
        }
        $output = '[["' . $idcodpre . '","' . $codpre . '",""],["' . $idmonto . '","' . H::FormatoMonto($monto) . '",""]]';
        break;
      case '10':
        $monrgo = $this->getRequestParameter('monrgo', '');
        $cadena = $this->getRequestParameter('cadena', '');
        $idmonrec = $this->getUser()->getAttribute('idmonrec', '', 'licprebasob');
        $idcadena = $this->getUser()->getAttribute('idcadena', '', 'licprebasob');
        $idmontot = $this->getUser()->getAttribute('idmontot', '', 'licprebasob');
        $subtot = $this->getUser()->getAttribute('subtot', '', 'licprebasob');
        $montot = $monrgo + H::FormatoNum($subtot);
        $js = "CalcularTotal();";
        $output = '[["' . $idmonrec . '","' . H::FormatoMonto($monrgo) . '",""],["' . $idcadena . '","' . $cadena . '",""],["' . $idmontot . '","' . H::FormatoMonto($montot) . '",""],
                      ["javascript","' . $js . '",""]]';
        break;
      case '11':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
        $c = new Criteria();
        $c->add(LidatstePeer::CODUNISTE, $codigo);
        $per = LidatstePeer::doSelectOne($c);
        $coduniadm = '';
        $desuniadm = '';
        if ($per) {
          $coduniadm = $per->getCoduniadm();
          $desuniadm = $per->getDesuniadm();
        }
        $output = '[["liprebas_coduniadm","' . $coduniadm . '",""],["liprebas_desuniadm","' . $desuniadm . '",""]]';
        break;
      case '12':
        $monsub = H::FormatoNum($this->getRequestParameter('monsub', ''));
        $valcam = $this->getRequestParameter('valcam', '');
        $monrgo = $this->getRequestParameter('monrgo', '');
        $monpre = $monsub + $monrgo;
        $monpreext = 0;
        $monrgoe = 0;
        if ($valcam > 0) {
          $monpreext = ($monpre) / $valcam;
          $monrgoe = ($monrgo) / $valcam;
        }
        $monpreletras = H::obtenermontoescrito(($monpre));
        $monpreextletras = H::obtenermontoescrito(($monpreext));

        $output = '[["liprebas_monpre","' . H::FormatoMonto($monpre) . '",""],["liprebas_monpreext","' . H::FormatoMonto($monpreext) . '",""],
                      ["liprebas_monpreletras","' . $monpreletras . '",""],["liprebas_monpreextletras","' . $monpreextletras . '",""],
                      ["liprebas_monrgo","' . H::FormatoMonto($monrgo) . '",""],["liprebas_monrgoe","' . H::FormatoMonto($monrgoe) . '",""]]';
        break;
      case '13':
        #ESTADO
        $sw = false;
        $this->ajax = $ajax;
        $this->liprebas = $this->getLiprebasOrCreate();
        $this->UpdateLiprebasFromRequest();
        $c = new Criteria();
        $c->add(OcestadoPeer::CODPAI, $codigo);
        $per = OcestadoPeer::doSelect($c);
        $arr = array('' => 'Seleccione...');
        foreach ($per as $r) {
          $arr[$r->getCodedo()] = $r->getNomedo();
        }
        $this->arr = $arr;
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      case '14':
        #MUNICIPIO
        $sw = false;
        $this->ajax = $ajax;
        $codpai = $this->getRequestParameter('codpai', '');
        $this->liprebas = $this->getLiprebasOrCreate();
        $this->UpdateLiprebasFromRequest();
        $c = new Criteria();
        $c->add(OcmuniciPeer::CODPAI, $codpai);
        $c->add(OcmuniciPeer::CODEDO, $codigo);
        $per = OcmuniciPeer::doSelect($c);
        $arr = array('' => 'Seleccione...');
        foreach ($per as $r) {
          $arr[$r->getCodmun()] = $r->getNommun();
        }
        $this->arr = $arr;
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      case '15':
        #MUNICIPIO
        $sw = false;
        $this->ajax = $ajax;
        $codpai = $this->getRequestParameter('codpai', '');
        $codedo = $this->getRequestParameter('codedo', '');
        $this->liprebas = $this->getLiprebasOrCreate();
        $this->UpdateLiprebasFromRequest();
        $c = new Criteria();
        $c->add(OcparroqPeer::CODPAI, $codpai);
        $c->add(OcparroqPeer::CODEDO, $codedo);
        $c->add(OcparroqPeer::CODMUN, $codigo);
        $per = OcparroqPeer::doSelect($c);
        $arr = array('' => 'Seleccione...');
        foreach ($per as $r) {
          $arr[$r->getCodpar()] = $r->getNompar();
        }
        $this->arr = $arr;
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      case '16':
        #MUNICIPIO
        $sw = false;
        $this->ajax = $ajax;
        $codpai = $this->getRequestParameter('codpai', '');
        $codedo = $this->getRequestParameter('codedo', '');
        $codmun = $this->getRequestParameter('codmun', '');
        $this->liprebas = $this->getLiprebasOrCreate();
        $this->UpdateLiprebasFromRequest();
        $c = new Criteria();
        $c->add(OcsectorPeer::CODPAI, $codpai);
        $c->add(OcsectorPeer::CODEDO, $codedo);
        $c->add(OcsectorPeer::CODMUN, $codmun);
        $c->add(OcsectorPeer::CODPAR, $codigo);
        $per = OcsectorPeer::doSelect($c);
        $arr = array('' => 'Seleccione...');
        foreach ($per as $r) {
          $arr[$r->getCodsec()] = $r->getNomsec();
        }
        $this->arr = $arr;
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    if ($sw)
      return sfView::HEADER_ONLY;

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

      $this->liprebas = $this->getLiprebasOrCreate();
      $this->updateLiprebasFromRequest();
      $this->configGrid();
      $this->configGridRgo();
      $grid = Herramientas::CargarDatosGridv2($this, $this->obj);
      $gridrgo = Herramientas::CargarDatosGridv2($this, $this->obj3);
      //$this->coderr = H::ValidarGridRepetido($grid, 'codart');
      //if ($this->coderr != -1)
        $this->coderr = Licitacion::ValidarPrebas($this->liprebas, $grid, $gridrgo, 'O');

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
    $c = new Criteria();
    $per = TsdesmonPeer::doSelect($c);
    $arrmon = array('' => 'Seleccione...');
    foreach ($per as $d) {
      $arrmon[$d->getCodmon()] = $d->getNommon();
    }
    $this->CargarCombos();
    $this->params = array('arrmon' => $arrmon, 'arrsec' => $this->arrsec, 'arrpar' => $this->arrpar, 'arrmun' => $this->arrmun, 'arredo' => $this->arredo, 'arrpai' => $this->arrpai);
    $this->configGrid();
    $this->configGridRec();
    $this->configGridRgo();

    $grid = Herramientas::CargarDatosGridv2($this, $this->obj);
    $gridrec = Herramientas::CargarDatosGridv2($this, $this->obj2);
    $gridrgo = Herramientas::CargarDatosGridv2($this, $this->obj3);

    //$this->configGrid($grid[0],$grid[1]);
  }

  public function saving($clasemodelo) {
    $grid = Herramientas::CargarDatosGridv2($this, $this->obj);
    $gridrgo = Herramientas::CargarDatosGridv2($this, $this->obj3);
    Licitacion::SalvarPrebas($clasemodelo, $grid, $gridrgo, 'O');
    return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo) {
    Licitacion::EliminarPrebas($clasemodelo);
    return parent::deleting($clasemodelo);
  }

}
