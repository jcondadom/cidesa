<?php

/**
 * hcregconhcm actions.
 *
 * @package    siga
 * @subpackage hcregconhcm
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */
class hcregconhcmActions extends autohcregconhcmActions {

    // Para incluir funcionalidades al executeEdit()
    public function editing() {
        $datos = HcdefgenPeer::doSelectOne(new Criteria());
        if ($datos)
            $this->hcregconhcm->setCodramhcm($datos->getCodramhcm());
    }

    public function configGrid($codemp = '') {
        $c = new Criteria();
        /* $c->add(NpinffamPeer::CODEMP,$codemp);
          $c->add(NpinffamPeer::STATUS,'I',Criteria::NOT_EQUAL); */
        $sql = "npinffam.codemp='" . $codemp . "' and npinffam.seghcm='S' and (npinffam.status<>'I' or npinffam.status='' or npinffam.status is null)";
        $c->add(NpinffamPeer::STATUS, $sql, Criteria::CUSTOM);
        $reg = NpinffamPeer::doSelect($c);

        $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/hcregconhcm/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_fam');

        $this->obj = $this->columnas[0]->getConfig($reg);

        $this->hcregconhcm->setObj($this->obj);
    }

    public function executeAjax() {

        $codigo = $this->getRequestParameter('codigo', '');
        $ajax = $this->getRequestParameter('ajax', '');
        $sw = true;
        $js = "";

        switch ($ajax) {
            case '1':
                $c = new Criteria();
                $c->add(NphojintPeer::CEDEMP, $codigo);
                $c->add(NphojintPeer::CODEMP, $this->getRequestParameter('codemp'));
                $c->add(NphojintPeer::STAEMP, 'A');
                $c->add(NphojintPeer::SEGHCM, 'S');
                $res = NphojintPeer::doSelectOne($c);
                if ($res) {
                    $c = new Criteria();
                    $c->add(NpasicarempPeer::CODEMP, $res->getCodemp());
                    $m = NpasicarempPeer::doSelectOne($c);
                    if ($m) {
                        $this->hcregconhcm = $this->getHcregconhcmOrCreate();
                        $this->configGrid($res->getCodemp());
                        $output = '[["hcregconhcm_codemp","' . $m->getCodemp() . '",""],["hcregconhcm_nomemp","' . $m->getNomemp() . '",""],["hcregconhcm_nomemp","' . $m->getNomemp() . '",""],["hcregconhcm_nomnom","' . $m->getNomnom() . '",""],["hcregconhcm_codttrab","' . $res->getCodtipemp() . '",""],["hcregconhcm_cedfam","",""],["hcregconhcm_nomfam","",""],["hcregconhcm_parfam","",""],["javascript","' . $js . '",""]]';
                    } else {
                        $this->hcregconhcm = $this->getHcregconhcmOrCreate();
                        $this->configGrid();
                        $js = "alert('El Empleado No Tiene Cargo Asignado')";
                        $output = '[["hcregconhcm_codemp","",""],["hcregconhcm_cedemp","",""],["hcregconhcm_nomemp","",""],["hcregconhcm_nomnom","",""],["hcregconhcm_codttrab","",""],["hcregconhcm_cedfam","",""],["hcregconhcm_nomfam","",""],["hcregconhcm_parfam","",""],["javascript","' . $js . '",""]]';
                    }
                } else {
                    $this->hcregconhcm = $this->getHcregconhcmOrCreate();
                    $this->configGrid();
                    $js = "alert('El Empleado No Esta Registrado ó No Esta Afiliado al HCM')";
                    $output = '[["hcregconhcm_codemp","",""],["hcregconhcm_cedemp","",""],["hcregconhcm_nomemp","",""],["hcregconhcm_nomnom","",""],["hcregconhcm_codttrab","",""],["hcregconhcm_cedfam","",""],["hcregconhcm_nomfam","",""],["hcregconhcm_parfam","",""],["javascript","' . $js . '",""]]';
                }
                break;
            case '2':
                $misben = $this->getRequestParameter('misben');
                $cedemp = $this->getRequestParameter('cedemp');
                $tiphcm = $this->getRequestParameter('tiphcm');
                if ($misben == 'true') {
                    if ($codigo != $cedemp) {
                        $js = "alert('El Beneficiario no es el mismo Titular'); $('hcregconhcm_check').checked=false;";
                        $output = '[["hcregconhcm_cedfam","",""],["hcregconhcm_nomfam","",""],["hcregconhcm_parfam","",""],["javascript","' . $js . '",""]]';
                    } else {
                        if ($tiphcm == 'M') {
                            $sexemp = H::getX_vacio('CEDEMP', 'Nphojint', 'Sexemp', $cedemp);
                            if ($sexemp != 'F') {
                                $js = "alert('El Beneficiario no es Femenino, Por favor, haga los ajustes necesarios'); $('hcregconhcm_cedfam').value=''; $('hcregconhcm_nomfam').value=''; $('hcregconhcm_parfam').value=''; $('hcregconhcm_cedfam').focus(); $('hcregconhcm_misben').checked=false;";
                                $output = '[["hcregconhcm_cedfam","",""],["hcregconhcm_nomfam","",""],["hcregconhcm_parfam","",""],["javascript","' . $js . '",""]]';
                            }
                        }
                        $output = '[["javascript","' . $js . '",""]]';
                    }
                } else {
                    /* $c=new Criteria();
                      $c->add(NphojintPeer::CEDEMP,$codigo);
                      $m=NphojintPeer::doSelectOne($c); */

                    $c = new Criteria();
                    $c->add(NpinffamPeer::CODEMP, $this->getRequestParameter('codemp'));
                    $c->add(NpinffamPeer::CEDFAM, $codigo);
                    $c->add(NpinffamPeer::SEGHCM, 'S');
                    $n = NpinffamPeer::doSelectOne($c);
                    /* if($m){
                      $output = '[["hcregconhcm_cedfam","'.$m->getCedemp().'",""],["hcregconhcm_nomfam","'.$m->getNomemp().'",""],["hcregconhcm_parfam","TITULAR",""],["javascript","'.$js.'",""]]';
                      }else */ if ($n) {
                        if ($tiphcm == 'M') {
                            $parfam = substr(H::getX_vacio('TIPPAR', 'NPTIPPAR', 'DESPAR', $n->getParfam()), 0, 4);
                            if ($n->getSexfam() != 'F') {
                                $js = "alert('El Beneficiario no es Femenino, Por favor, haga los ajustes necesarios'); $('hcregconhcm_cedfam').value=''; $('hcregconhcm_nomfam').value=''; $('hcregconhcm_parfam').value=''; $('hcregconhcm_cedfam').focus();";
                                $output = '[["hcregconhcm_cedfam","",""],["hcregconhcm_nomfam","",""],["hcregconhcm_parfam","",""],["javascript","' . $js . '",""]]';
                            } else if ($parfam != 'CONY') {
                                $js = "alert('El Beneficiario no es el Conyugue, Por favor, haga los ajustes necesarios'); $('hcregconhcm_cedfam').value=''; $('hcregconhcm_nomfam').value=''; $('hcregconhcm_parfam').value=''; $('hcregconhcm_cedfam').focus();";
                                $output = '[["hcregconhcm_cedfam","",""],["hcregconhcm_nomfam","",""],["hcregconhcm_parfam","",""],["javascript","' . $js . '",""]]';
                            } else {
                                $c = new Criteria();
                                $c->add(NptipparPeer::TIPPAR, $n->getParfam());
                                $x = NptipparPeer::doSelectOne($c);
                                $output = '[["hcregconhcm_cedfam","' . $n->getCedfam() . '",""],["hcregconhcm_nomfam","' . $n->getNomfam() . '",""],["hcregconhcm_parfam","' . $x->getDespar() . '",""],["javascript","' . $js . '",""]]';
                            }
                        } else {
                            $c = new Criteria();
                            $c->add(NptipparPeer::TIPPAR, $n->getParfam());
                            $x = NptipparPeer::doSelectOne($c);
                            $output = '[["hcregconhcm_cedfam","' . $n->getCedfam() . '",""],["hcregconhcm_nomfam","' . $n->getNomfam() . '",""],["hcregconhcm_parfam","' . $x->getDespar() . '",""],["javascript","' . $js . '",""]]';
                        }
                    } else {
                        $js = "alert('El Beneficiario no se encuentra registrado')";
                        $output = '[["hcregconhcm_cedfam","",""],["hcregconhcm_nomfam","",""],["hcregconhcm_parfam","",""],["javascript","' . $js . '",""]]';
                    }
                }
                $sw = false;
                break;
            case '3':
                $ramo = $this->getRequestParameter('codramhcm');
                $c = new Criteria();
                $c->add(CaproveePeer::RIFPRO, $codigo);
                $c->add(CaproveePeer::CODRAM, $ramo);
                $m = CaproveePeer::doSelectOne($c);
                if ($m) {
                    $output = '[["hcregconhcm_nompro","' . $m->getNompro() . '",""],["hcregconhcm_dirpro","' . $m->getDirpro() . '",""],["hcregconhcm_telpro","' . $m->getTelpro() . '",""],["javascript","' . $js . '",""]]';
                } else {
                    $js = "alert('La Clinica no se encuentra registrada o no esta asociada al ramo definido en Definiciones Generales')";
                    $output = '[["hcregconhcm_rifpro","",""],["hcregconhcm_nompro","",""],["hcregconhcm_dirpro","",""],["hcregconhcm_telpro","",""],["javascript","' . $js . '",""]]';
                }
                $sw = false;
                break;
            case '4':
                $cedemp = $this->getRequestParameter('cedemp');
                $cedfam = $this->getRequestParameter('cedfam');
                if ($codigo == 'M') {
                    $n = new Criteria();
                    $n->add(NphojintPeer::CEDEMP, $cedemp);
                    $regn = NphojintPeer::doSelectOne($n);
                    if ($regn) {
                        $n2 = new Criteria();
                        $n2->add(NpinffamPeer::CODEMP, $regn->getCodemp());
                        $n2->add(NpinffamPeer::CEDFAM, $cedfam);
                        $regn2 = NpinffamPeer::doSelectOne($n2);
                        if ($regn2) {
                            $parfam = substr(H::getX_vacio('TIPPAR', 'NPTIPPAR', 'DESPAR', $regn2->getParfam()), 0, 4);
                            if ($regn2->getSexfam() != 'F')
                                $js = "alert('El Beneficiario no es Femenino, Por favor, haga los ajustes necesarios'); $('hcregconhcm_cedfam').value=''; $('hcregconhcm_nomfam').value=''; $('hcregconhcm_parfam').value=''; $('hcregconhcm_cedfam').focus();";
                            else if ($parfam != 'CONY')
                                $js = "alert('El Beneficiario no es el Conyugue, Por favor, haga los ajustes necesarios'); $('hcregconhcm_cedfam').value=''; $('hcregconhcm_nomfam').value=''; $('hcregconhcm_parfam').value=''; $('hcregconhcm_cedfam').focus();";
                        }else {
                            if ($regn->getSexemp() != 'F')
                                $js = "alert('El Beneficiario no es Femenino, Por favor, haga los ajustes necesarios'); $('hcregconhcm_cedfam').value=''; $('hcregconhcm_nomfam').value=''; $('hcregconhcm_parfam').value=''; $('hcregconhcm_cedfam').focus(); $('hcregconhcm_misben').checked=false;";
                        }
                    }
                }
                $output = '[["javascript","' . $js . '",""]]';
                $sw = false;
                break;
            case '5':
                $cedemp = $this->getRequestParameter('cedemp');
                $cedfam = $this->getRequestParameter('cedfam');
                $tiphcm = $this->getRequestParameter('tiphcm');
                if ($codigo == true && $tiphcm == 'M') {
                    $n = new Criteria();
                    $n->add(NphojintPeer::CEDEMP, $cedemp);
                    $regn = NphojintPeer::doSelectOne($n);
                    if ($regn) {
                        if ($regn->getSexemp() != 'F')
                            $js = "alert('El Beneficiario no es Femenino, Por favor, haga los ajustes necesarios'); $('hcregconhcm_cedfam').value=''; $('hcregconhcm_nomfam').value=''; $('hcregconhcm_parfam').value=''; $('hcregconhcm_cedfam').focus(); $('hcregconhcm_misben').checked=false;";
                    }
                }
                $output = '[["javascript","' . $js . '",""]]';
                $sw = false;
                break;
            default:
                $output = '[["","",""],["","",""],["","",""]]';
        }

        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');

        if (!$sw) {
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

            $this->hcregconhcm = $this->getHcregconhcmOrCreate();
            $this->updateHcregconhcmFromRequest();

            $c = new Criteria();
            $c->add(HcdefgenPeer::FECVIG, $this->hcregconhcm->getFeccon(), Criteria::GREATER_EQUAL);
            $x = HcdefgenPeer::doSelectOne($c);
            if ($x) {

            $b = new Criteria();
            if ($this->hcregconhcm->getId() != "")
                $b->add(HcregconhcmPeer::ID, $this->hcregconhcm->getId(), Criteria::NOT_EQUAL);
            $b->add(HcregconhcmPeer::CODEMP, $this->hcregconhcm->getCodemp());
            $b->add(HcregconhcmPeer::CEDFAM, $this->hcregconhcm->getCedfam());
            $b->add(HcregconhcmPeer::TIPHCM, $this->hcregconhcm->getTiphcm());
            $r = HcregconhcmPeer::doSelect($b);

            $monacu = $this->hcregconhcm->getMoncon();
            foreach ($r as $arr) {
                $monacu+=$arr->getMoncon();
            }

            if ($this->hcregconhcm->getTiphcm() == 'H' && $monacu > $x->getHcmcob())
                $this->coderr = 2000;
            elseif ($this->hcregconhcm->getTiphcm() == 'M' && $monacu > $x->getMatcob())
                $this->coderr = 2001;
           }else $this->coderr = 2009;

            if ($this->coderr != -1) {
                return false;
            }
            else
                return true;
        }
        else
            return true;
    }

    /**
     * Función para actualziar el grid en el post si ocurre un error
     * Se pueden colocar aqui los grids adicionales
     *
     */
    public function updateError() {
        //$this->configGrid();
        //$grid = Herramientas::CargarDatosGrid($this,$this->obj);
        //$this->configGrid($grid[0],$grid[1]);
    }

    public function saving($clasemodelo) {
        if (!$clasemodelo->getId()) {
            $loguse = sfContext::getInstance()->getUser()->getAttribute('loguse');
            $clasemodelo->setLoguse($loguse);
        }

        return parent::saving($clasemodelo);
    }

    public function deleting($clasemodelo) {
        if ($clasemodelo->getStatop()!='S' && $clasemodelo->getNumord()=='')
        return parent::deleting($clasemodelo);
        else
            return 2006;
    }

}
