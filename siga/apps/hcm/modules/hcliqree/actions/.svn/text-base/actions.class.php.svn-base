<?php

/**
 * hcliqree actions.
 *
 * @package    siga
 * @subpackage hcliqree
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */
class hcliqreeActions extends autohcliqreeActions {

    // Para incluir funcionalidades al executeEdit()
    public function editing() {
        
    }

    public function configGrid($codemp = '') {
        $c = new Criteria();
        //$c->add(NpinffamPeer::CODEMP,$codemp);
        $sql = "npinffam.codemp='" . $codemp . "' and npinffam.seghcm='S' and (npinffam.status<>'I' or npinffam.status='' or npinffam.status is null)";
        //$c->add(NpinffamPeer::STATUS,'I',Criteria::NOT_EQUAL);
        $c->add(NpinffamPeer::STATUS, $sql, Criteria::CUSTOM);
        $reg = NpinffamPeer::doSelect($c);

        $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/hcliqree/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_fam');

        $this->obj = $this->columnas[0]->getConfig($reg);

        $this->hcliqree->setObj($this->obj);
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
                $c->add(NphojintPeer::SEGHCM, 'S');
                $res = NphojintPeer::doSelectOne($c);

                if ($res) {
                    $c = new Criteria();
                    $c->add(NpasicarempPeer::CODEMP, $res->getCodemp());
                    $m = NpasicarempPeer::doSelectOne($c);
                    if ($m) {
                        $this->hcliqree = $this->getHcliqreeOrCreate();
                        $this->configGrid($res->getCodemp());
                        $output = '[["hcliqree_codemp","' . $m->getCodemp() . '",""],["hcliqree_nomemp","' . $m->getNomemp() . '",""],["hcliqree_nomnom","' . $m->getNomnom() . '",""],["hcliqree_codttrab","' . $res->getCodtipemp() . '",""],["hcliqree_cedfam","",""],["hcliqree_nomfam","",""],["hcliqree_parfam","",""],["javascript","' . $js . '",""]]';
                    } else {
                        $this->hcliqree = $this->getHcliqreeOrCreate();
                        $this->configGrid();
                        $js = "alert('El Empleado no tiene Cargo asociado')";
                        $output = '[["hcliqree_codemp","",""],["hcliqree_cedemp","",""],["hcliqree_nomemp","",""],["hcliqree_nomnom","",""],["hcliqree_codttrab","",""],["hcliqree_cedfam","",""],["hcliqree_nomfam","",""],["hcliqree_parfam","",""],["javascript","' . $js . '",""]]';
                    }
                } else {
                    $this->hcliqree = $this->getHcliqreeOrCreate();
                    $this->configGrid();
                    $js = "alert('El Empleado no se encuentra registrado ó no esta afiliado al HCM')";
                    $output = '[["hcliqree_codemp","",""],["hcliqree_cedemp","",""],["hcliqree_nomemp","",""],["hcliqree_nomnom","",""],["hcliqree_codttrab","",""],["hcliqree_cedfam","",""],["hcliqree_nomfam","",""],["hcliqree_parfam","",""],["javascript","' . $js . '",""]]';
                }
                $sw = false;
                break;
            case '2':
                $misben = $this->getRequestParameter('misben');
                $cedemp = $this->getRequestParameter('cedemp');
                if ($misben == 'true') {
                    if ($codigo != $cedemp) {
                        $js = "alert('El Beneficiario no es el mismo Titular')";
                        $output = '[["hcliqree_cedfam","",""],["hcliqree_nomfam","",""],["hcliqree_parfam","",""],["javascript","' . $js . '",""]]';
                    } else {
                        $output = '[["javascript","' . $js . '",""]]';
                    }
                } else {
                    /* $c=new Criteria();
                      $c->add(NphojintPeer::CEDEMP,$codigo);
                      $c->add(NphojintPeer::SEGHCM,'S');
                      $m=NphojintPeer::doSelectOne($c); */

                    $c = new Criteria();
                    $c->add(NpinffamPeer::CODEMP, $this->getRequestParameter('codemp'));
                    $c->add(NpinffamPeer::CEDFAM, $codigo);
                    $c->add(NpinffamPeer::SEGHCM, 'S');
                    $n = NpinffamPeer::doSelectOne($c);
                    /* if($m){
                      $output = '[["hcliqree_cedfam","'.$m->getCedemp().'",""],["hcliqree_nomfam","'.$m->getNomemp().'",""],["hcliqree_parfam","TITULAR",""],["javascript","'.$js.'",""]]';
                      }else */ if ($n) {
                        $c = new Criteria();
                        $c->add(NptipparPeer::TIPPAR, $n->getParfam());
                        $x = NptipparPeer::doSelectOne($c);
                        $output = '[["hcliqree_cedfam","' . $n->getCedfam() . '",""],["hcliqree_nomfam","' . $n->getNomfam() . '",""],["hcliqree_parfam","' . $x->getDespar() . '",""],["javascript","' . $js . '",""]]';
                    } else {
                        $js = "alert('El Beneficiario no se encuentra registrado o no es un Beneficiario HCM')";
                        $output = '[["hcliqree_cedfam","",""],["hcliqree_nomfam","",""],["hcliqree_parfam","",""],["javascript","' . $js . '",""]]';
                    }
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

            $this->hcliqree = $this->getHcliqreeOrCreate();
            $this->updateHcliqreeFromRequest();
            $monto=H::toFloat($this->hcliqree->getMonliq());

            $c = new Criteria();
            $c->add(HcdefgenPeer::FECVIG, $this->hcliqree->getFecliq(), Criteria::GREATER_EQUAL);
            $x = HcdefgenPeer::doSelectOne($c);
            if ($x) {
                $c = new Criteria();
                $c->add(NpasiconempPeer::CODEMP, $this->hcliqree->getCodemp());
                $z = NpasiconempPeer::doSelect($c);

                $con = false;
                if ($this->hcliqree->getTipliq() == "O") {
                    foreach ($z as $arr) {
                        if ($x->getCodreeo() == $arr->getCodcon())
                            $con = true;
                    }
                    if($con){
                        $b = new Criteria();
                        if ($this->hcliqree->getId() != "")
                            $b->add(HcliqreePeer::ID, $this->hcliqree->getId(), Criteria::NOT_EQUAL);
                        $b->add(HcliqreePeer::CODEMP, $this->hcliqree->getCodemp());
                        $b->add(HcliqreePeer::CEDFAM, $this->hcliqree->getCedfam());
                        $b->add(HcliqreePeer::TIPLIQ, $this->hcliqree->getTipliq());
                        $b->add(HcliqreePeer::STATUS, 'N', Criteria::NOT_EQUAL);
                        $b->add(HcliqreePeer::STACPR, 'N', Criteria::NOT_EQUAL);
                        $y = HcliqreePeer::doSelect($b);
                        foreach($y as $arr){
                            $monto+=$arr->getMonliq();
                        }
                    }
                }else {
                    foreach ($z as $arr) {
                        if ($x->getCodreem() == $arr->getCodcon())
                            $con = true;
                    }
                }

                if (!$con)
                    $this->coderr = 2005;
                elseif ($this->hcliqree->getTipliq() == "O" && $monto > $x->getOdocob())
                    $this->coderr = 2004;
        }else {
            $this->coderr = 2007;
        }

            if ($this->coderr != -1)
                return false;
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
        Hcm::grabarLiqRee($clasemodelo);
        return -1;
    }

    public function deleting($clasemodelo) {
        return parent::deleting($clasemodelo);
    }

}
