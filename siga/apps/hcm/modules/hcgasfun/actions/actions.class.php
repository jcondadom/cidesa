<?php

/**
 * hcgasfun actions.
 *
 * @package    siga
 * @subpackage hcgasfun
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */
class hcgasfunActions extends autohcgasfunActions {

    // Para incluir funcionalidades al executeEdit()
    public function editing() {
        $datos = HcdefgenPeer::doSelectOne(new Criteria());
        if ($datos)
            $this->hcgasfun->setCodramgasfun($datos->getCodramgasfun());
    }

    public function configGrid($codemp = '') {
        $c = new Criteria();
        /* $c->add(NpinffamPeer::CODEMP,$codemp);
          $c->add(NpinffamPeer::STATUS,'I',Criteria::NOT_EQUAL); */
        $sql = "npinffam.codemp='" . $codemp . "' and npinffam.segfun=true and (npinffam.status<>'I' or npinffam.status='' or npinffam.status is null)";
        $c->add(NpinffamPeer::STATUS, $sql, Criteria::CUSTOM);
        $reg = NpinffamPeer::doSelect($c);

        $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/hcgasfun/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_fam');

        $this->obj = $this->columnas[0]->getConfig($reg);

        $this->hcgasfun->setObj($this->obj);
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
                $c->add(NphojintPeer::STAEMP, 'A');
                $c->add(NphojintPeer::TIEFUN, true);
                $res = NphojintPeer::doSelectOne($c);

                if ($res) {
                    $c = new Criteria();
                    $c->add(NpasicarempPeer::CODEMP, $res->getCodemp());
                    $m = NpasicarempPeer::doSelectOne($c);
                    if ($m) {
                        $this->hcgasfun = $this->getHcgasfunOrCreate();
                        $this->configGrid($res->getCodemp());
                        $output = '[["hcgasfun_codemp","' . $m->getCodemp() . '",""],["hcgasfun_nomemp","' . $m->getNomemp() . '",""],["hcgasfun_nomnom","' . $m->getNomnom() . '",""],["hcgasfun_codttrab","' . $res->getCodtipemp() . '",""],["hcgasfun_cedfam","",""],["hcgasfun_nomfam","",""],["hcgasfun_parfam","",""],["javascript","' . $js . '",""]]';
                    } else {
                        $this->hcgasfun = $this->getHcgasfunOrCreate();
                        $this->configGrid();
                        $js = "alert('El Empleado no Tiene Cargo Asociado')";
                        $output = '[["hcgasfun_codemp","",""],["hcgasfun_cedemp","",""],["hcgasfun_nomemp","",""],["hcgasfun_nomnom","",""],["hcgasfun_codttrab","",""],["hcgasfun_cedfam","",""],["hcgasfun_nomfam","",""],["hcgasfun_parfam","",""],["javascript","' . $js . '",""]]';
                    }
                } else {
                    $this->hcgasfun = $this->getHcgasfunOrCreate();
                    $this->configGrid();
                    $js = "alert('El Empleado no se encuentra registrado ó no esta afiliado al HCM')";
                    $output = '[["hcgasfun_codemp","",""],["hcgasfun_cedemp","",""],["hcgasfun_nomemp","",""],["hcgasfun_nomnom","",""],["hcgasfun_codttrab","",""],["hcgasfun_cedfam","",""],["hcgasfun_nomfam","",""],["hcgasfun_parfam","",""],["javascript","' . $js . '",""]]';
                }
                $sw = false;
                break;
            case '2':
                $misben = $this->getRequestParameter('misben');
                $cedemp = $this->getRequestParameter('cedemp');
                if ($misben == 'true') {
                    if ($codigo != $cedemp) {
                        $js = "alert('El Beneficiario no es el mismo Titular')";
                        $output = '[["hcgasfun_cedfam","",""],["hcgasfun_nomfam","",""],["hcgasfun_parfam","",""],["javascript","' . $js . '",""]]';
                    } else {
                        $output = '[["javascript","' . $js . '",""]]';
                    }
                } else {
                    /* $c=new Criteria();
                      $c->add(NphojintPeer::CEDEMP,$codigo);
                      $m=NphojintPeer::doSelectOne($c); */

                    $c = new Criteria();
                    $c->add(NpinffamPeer::CODEMP, $this->getRequestParameter('codemp'));
                    $c->add(NpinffamPeer::CEDFAM, $codigo);
                    $c->add(NpinffamPeer::SEGFUN, true);
                    $n = NpinffamPeer::doSelectOne($c);
                    /* if($m){
                      $output = '[["hcgasfun_cedfam","'.$m->getCedemp().'",""],["hcgasfun_nomfam","'.$m->getNomemp().'",""],["hcgasfun_parfam","TITULAR",""],["javascript","'.$js.'",""]]';
                      }else */ if ($n) {
                        $c = new Criteria();
                        $c->add(NptipparPeer::TIPPAR, $n->getParfam());
                        $x = NptipparPeer::doSelectOne($c);
                        $output = '[["hcgasfun_cedfam","' . $n->getCedfam() . '",""],["hcgasfun_nomfam","' . $n->getNomfam() . '",""],["hcgasfun_parfam","' . $x->getDespar() . '",""],["javascript","' . $js . '",""]]';
                    } else {
                        $js = "alert('El Beneficiario no se encuentra registrado o tiene asociado Seguro Funerario')";
                        $output = '[["hcgasfun_cedfam","",""],["hcgasfun_nomfam","",""],["hcgasfun_parfam","",""],["javascript","' . $js . '",""]]';
                    }
                }
                break;
            case '3':
                $ramo = $this->getRequestParameter('codramgasfun');
                $c = new Criteria();
                $c->add(CaproveePeer::RIFPRO, $codigo);
                $c->add(CaproveePeer::CODRAM, $ramo);
                $m = CaproveePeer::doSelectOne($c);
                if ($m) {
                    $output = '[["hcgasfun_nompro","' . $m->getNompro() . '",""],["hcgasfun_dirpro","' . $m->getDirpro() . '",""],["hcgasfun_telpro","' . $m->getTelpro() . '",""],["javascript","' . $js . '",""]]';
                } else {
                    $js = "alert('La Funeraria no se encuentra registrada o no esta asociada al ramo definido en Definiciones Generales')";
                    $output = '[["hcgasfun_rifpro","",""],["hcgasfun_nompro","",""],["hcgasfun_dirpro","",""],["hcgasfun_telpro","",""],["javascript","' . $js . '",""]]';
                }
                break;
            default:
                $output = '[["","",""],["","",""],["","",""]]';
        }

        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');

        if ($sw) {
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

            $this->hcgasfun = $this->getHcgasfunOrCreate();
            $this->updateHcgasfunFromRequest();

            $r = 0;
            if ($this->hcgasfun->getId() == "") {
                $b = new Criteria();
                $b->add(HcgasfunPeer::CODEMP, $this->hcgasfun->getCodemp());
                $b->add(HcgasfunPeer::CEDFAM, $this->hcgasfun->getCedfam());
                $r = HcgasfunPeer::doSelect($b);
            }


            $c = new Criteria();
            $c->add(HcdefgenPeer::FECVIG, $this->hcgasfun->getFecgas(), Criteria::GREATER_EQUAL);
            $x = HcdefgenPeer::doSelectOne($c);
            if ($x) {
                if (count($r)>3)
                    $this->coderr = 2003;
                else if ($this->hcgasfun->getMongas() > $x->getFuncob())
                    $this->coderr = 2002;
            }else $this->coderr = 2008;

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
        Hcm::grabarGasFun($clasemodelo);
        return -1;
    }

    public function deleting($clasemodelo) {
        return parent::deleting($clasemodelo);
    }

}
