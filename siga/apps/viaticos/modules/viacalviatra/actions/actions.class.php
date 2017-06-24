<?php

/**
 * viacalviatra actions.
 *
 * @package    siga
 * @subpackage viacalviatra
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */
class viacalviatraActions extends autoviacalviatraActions {

  /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->listing();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/viacalviatra/filters');

    $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
    $filsoldir=H::getConfApp2('filsoldir', 'viaticos', 'viasolviatra');

     // 15    // pager
    $this->pager = new sfPropelPager('Viacalviatra', 15);
    $c = new Criteria();
     if ($filsoldir=='S'){
      $esgerente=H::getX_vacio('LOGUSE','Usuarios','Esgeren',$loguse);
      if ($esgerente=='N')
        $this->sql='viasolviatra.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\') and viasolviatra.logusu=\''.$loguse.'\'';
      else
        $this->sql='viasolviatra.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
      $c->add(ViasolviatraPeer::NUMSOL,$this->sql,Criteria::CUSTOM); 
      $c->addJoin(ViacalviatraPeer::REFSOL,ViasolviatraPeer::NUMSOL); 
    }
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

    // Para incluir funcionalidades al executeEdit()
    public function editing() {
        $this->configGrid($this->viacalviatra->getId());
        $this->configGrid2($this->viacalviatra->getRefsol());

        $c = new Criteria();
        $op = ViadefgenPeer::doSelectOne($c);
        if ($op) {
            if ($this->viacalviatra->getTipcom()=='')
              $this->viacalviatra->setTipcom($op->getTipcom());
        }

    }

    /**
     * Función principal para el manejo de las acciones create y edit
     * del formulario.
     *
     */
    public function executeEdit() {
        $this->params = array();
        $this->viacalviatra = $this->getViacalviatraOrCreate();
        $this->grabo = $this->getRequestParameter('grabo');

        $this->editing();

        if ($this->getRequest()->getMethod() == sfRequest::POST) {
            $this->updateViacalviatraFromRequest();

            if ($this->saveViacalviatra($this->viacalviatra) == -1) { {
                    $this->setFlash('notice', 'Your modifications have been saved');

                    $id = $this->viacalviatra->getId();
                    $this->SalvarBitacora($id, 'Guardo');
                }

                if ($this->getRequestParameter('save_and_add')) {
                    return $this->redirect('viacalviatra/create');
                } else if ($this->getRequestParameter('save_and_list')) {
                    return $this->redirect('viacalviatra/list');
                } else {
                    return $this->redirect('viacalviatra/edit?id=' . $this->viacalviatra->getId() . '&grabo=S');
                }
            } else {
                $this->labels = $this->getLabels();
            }
        } else {
            $this->labels = $this->getLabels();
        }
    }

    public function configGrid($nuevo = '') {
        $per = array();
        $calsinacom = H::getConfApp2('calsinacom', 'viaticos', 'viacalviatra');
        $cankil = false;
        if ($this->tipvia == 'NACIONAL' || substr($this->viacalviatra->getNumcal(), 0, 2) == 'VN') {
            if ($this->viacalviatra->getId() == '') {
                $sql = "select '1' as ord,codrub,desrub,tipdia,'' as tipo,'' as codtiptra, '' as forcal, diadef as diadef, cancal as cancal from viadefrub where tiprub<>'2' and tipo='C' and tipviat='N'
                union all
                select '2' as ord,(select codrub from viadefrub where tiprub='2' and tipviat='N' limit 1),destiptra,'3' as tipdia,tipo,codtiptra, '' as forcal, 0 as diadef, '' as cancal from viadeftiptra
                union all
                select '3' as ord,codrub,desrub,tipdia,'','', '' as forcal, diadef as diadef, cancal as cancal from viadefrub where tipo='F' and tipviat='N'
                ";
                if (H::BuscarDatos($sql, $per)) {
                    $i = 0;
                    foreach ($per as $r) {
                        $per[$i]['codrub'] = $r['codrub'];
                        $per[$i]['desrub'] = $r['desrub'];
                        $per[$i]['cancal'] = $r['cancal'];
                        if ($r['cancal'] == 'K') {
                            $per[$i]['numdia'] = 0;
                            $cankil = true;
                        } else {
                            if ($r['tipdia'] == '1')
                                $per[$i]['numdia'] = $this->numdia;
                            elseif ($r['tipdia'] == '2')
                                $per[$i]['numdia'] = $this->numdia - 1;
                            else {
                                if ($r['tipo'] == 'I')
                                    $per[$i]['numdia'] = $this->numdia;
                                elseif ($r['tipo'] == 'A')
                                    $per[$i]['numdia'] = 2;
                                else
                                    $per[$i]['numdia'] = 2;
                            }
                            $per[$i]['numdia'] = ($per[$i]['numdia']);

                            if ($r['diadef'] > 0)
                                $per[$i]['numdia'] = $r['diadef'];
                        }


                        if ($r['ord'] == '2') {
                            $sqlord = "select * from viadeftiptra where codtiptra in (select codtiptra from viadeffortra a where codtiptra='" . $r['codtiptra'] . "' and codfortra=(select codfortra from viasolviatra where numsol='$this->numsol'))";
                            if (H::BuscarDatos($sqlord, $rs))
                                $this->nivtra = $r['codtiptra'];
                            else
                                $this->nivtra = '';
                        }

                        $monto = 0;
                        if ($r['ord'] == '2')
                          $sqlcal="select monto from viacalrub where codrub='".$r['codrub']."' and codnivtra='$this->nivtra'";
                        else
                          $sqlcal = "select monto from viacalrub where codrub='" . $r['codrub'] . "' and codnivtra='$this->nivel'";
                        if (H::BuscarDatos($sqlcal, $rs))
                            $monto = $rs[0]['monto'];

                        if ($calsinacom == 'S')
                            $numaco = 0;
                        else {
                            $p = new Criteria();
                            $p->add(ViadetsolacoempPeer::NUMSOL, $this->numsol);
                            $regis = ViadetsolacoempPeer::doSelect($p);
                            if ($regis)
                                $numaco = count($regis);
                            else
                                $numaco = 0;
                        }

                        $per[$i]['mondia'] = H::FormatoMonto($monto);
                        $per[$i]['montot'] = H::FormatoMonto((H::toFloat($per[$i]['numdia']) * $monto) + ((H::toFloat($per[$i]['numdia']) * $monto) * $numaco));
                        $per[$i]['tipo'] = $r['codtiptra'];
                        if ($r['ord'] == '3')
                            $per[$i]['calculo'] = 'F';
                        else
                            $per[$i]['calculo'] = 'C';
                        if (H::FormatoNum($per[$i]['montot']) > 0)
                            $per[$i]['check'] = 1;
                        else
                            $per[$i]['check'] = 0;
                        $per[$i]['id'] = 9;
                        $i++;
                    }
                }
            }elseif ($this->viacalviatra->getId() != '') {
                $sql = "select '1' as check, a.codrub,case when trim(a.tipo)='' then b.desrub else (select destiptra from viadeftiptra where codtiptra=a.tipo limit 1) end as desrub, numdia, mondia, montot, a.tipo, b.tipo as calculo, b.diadef as diadef, b.cancal as cancal
                        from viadetcalviatra a, viadefrub b
                        where a.codrub=b.codrub and tipviat='N' and numcal='" . $this->viacalviatra->getNumcal() . "'
                        union all
                        select * from (
                        select null as check, a.codrub, a.desrub, 0,0,0,'',tipo, diadef as diadef, cancal as cancal
                        from viadefrub a
                        where a.codrub not in (select codrub from viadetcalviatra where numcal='" . $this->viacalviatra->getNumcal() . "') and tiprub<>'2' and tipviat='N'
                        union all
                        select null as check, (select codrub from viadefrub where tiprub='2' and tipviat='N' limit 1), a.destiptra, 0,0,0,a.codtiptra,'C',0,''
                        from viadeftiptra a
                        where a.codtiptra not in (select tipo from viadetcalviatra where numcal='" . $this->viacalviatra->getNumcal() . "')
                        ) a
                        order by codrub";
                //print '<pre>'; print $sql; exit;
                if (H::BuscarDatos($sql, $per)) {
                    $i = 0;
                    foreach ($per as $r) {
                        $per[$i]['check'] = $r['check'];
                        $per[$i]['codrub'] = $r['codrub'];
                        $per[$i]['desrub'] = $r['desrub'];
                        $per[$i]['numdia'] = ($r['numdia']);
                        $per[$i]['mondia'] = H::FormatoMonto($r['mondia']);
                        $per[$i]['montot'] = H::FormatoMonto($r['montot']);
                        $per[$i]['tipo'] = $r['tipo'];
                        $per[$i]['calculo'] = $r['calculo'];
                        $per[$i]['id'] = 9;
                        if ($r['montot'] == 0) {
                            $sqltipdia = "select tipdia, diadef from viadefrub where codrub='" . $r['codrub'] . "'";
                            if (H::BuscarDatos($sqltipdia, $rs)) {
                                if ($rs[0]['tipdia'] == '1')
                                    $per[$i]['numdia'] = $this->viacalviatra->getNumdia();
                                elseif ($rs[0]['tipdia'] == '2')
                                    $per[$i]['numdia'] = $this->viacalviatra->getNumdia() - 1;
                                else {
                                    if ($r['tipo'] != '') {
                                        $sqltipo = "select tipo from viadeftiptra where codtiptra='" . $r['tipo'] . "'";
                                        if (H::BuscarDatos($sqltipo, $rs)) {
                                            if ($rs[0]['tipo'] == 'I')
                                                $per[$i]['numdia'] = $this->viacalviatra->getNumdia();
                                            elseif ($rs[0]['tipo'] == 'A')
                                                $per[$i]['numdia'] = 2;
                                            else
                                                $per[$i]['numdia'] = 0;
                                        }
                                        else
                                            $per[$i]['numdia'] = 0;
                                    }
                                    else
                                        $per[$i]['numdia'] = 0;
                                }
                                $per[$i]['numdia'] = ($per[$i]['numdia']);
                                if ($rs[0]['diadef'] > 0)
                                    $per[$i]['numdia'] = $rs[0]['diadef'];
                            }
                            if ($r['tipo'] != '') {
                                $sqlord = "select * from viadeftiptra where codtiptra in (select codtiptra from viadeffortra a where codtiptra='" . $r['tipo'] . "' and codfortra=(select codfortra from viasolviatra where numsol='" . $this->viacalviatra->getRefsol() . "'))";
                                if (H::BuscarDatos($sqlord, $rs))
                                    $this->nivtra = $r['tipo'];
                                else
                                    $this->nivtra = '';
                            }else {
                                if ($this->viacalviatra->getCodnivaco() > $this->viacalviatra->getCodniv())
                                    $this->nivtra = $this->viacalviatra->getCodnivaco();
                                else
                                    $this->nivtra = $this->viacalviatra->getCodniv();
                            }

                            $monto = 0;
                            //$sqlcal="select monto from viacalrub where codrub='".$r['codrub']."' and codnivtra='$this->nivtra'";
                            $sqlcal = "select monto from viacalrub where codrub='" . $r['codrub'] . "' and codnivtra='$this->nivel'";
                            if (H::BuscarDatos($sqlcal, $rs))
                                $monto = $rs[0]['monto'];

                            if ($calsinacom == 'S')
                                $numaco = 0;
                            else {
                                $p = new Criteria();
                                $p->add(ViadetsolacoempPeer::NUMSOL, $this->numsol);
                                $regis = ViadetsolacoempPeer::doSelect($p);
                                if ($regis)
                                    $numaco = count($regis);
                                else
                                    $numaco = 0;
                            }

                            $per[$i]['mondia'] = H::FormatoMonto($monto);
                            $per[$i]['montot'] = H::FormatoMonto(H::toFloat($per[$i]['numdia']) * $monto + (H::toFloat($per[$i]['numdia']) * $monto * $numaco));
                        }
                        $i++;
                    }
                }
            }
        }else { //Internacional
            $valdol = 0;
            $cambio = 1;
            $codciu="";
            if ($calsinacom == 'S')
                $numaco = 0;
            else {
                $p = new Criteria();
                $p->add(ViadetsolacoempPeer::NUMSOL, $this->numsol);
                $regis = ViadetsolacoempPeer::doSelect($p);
                if ($regis)
                    $numaco = count($regis);
                else
                    $numaco = 0;
            }

            if (!$this->codpai) {
                $codciu = H::getX_vacio('Numsol', 'Viasolviatra', 'Codciu', $this->viacalviatra->getRefsol());
                $this->codpai = H::getX_vacio('Codciu', 'Viaciudad', 'Codpai', $codciu);
                if ($this->codpai=='')
                   $this->codpai=H::getX_vacio('Numsol', 'Viasolviatra', 'Codpai', $this->viacalviatra->getRefsol());
            }
            if ($this->codpai) {
                $c = new Criteria();
                $c->add(ViapaisPeer::CODPAI, $this->codpai);
                $op = ViapaisPeer::doSelectOne($c);
                if ($op) {
                    $valdol = $op->getMonto();
                }
                $c = new Criteria();
                $op = ViadefgenPeer::doSelectOne($c);
                if ($op) {
                    $cambio = $op->getValdolar();
                    $rubint = $op->getRubint();
                }
            }
            if ($this->numsol != '') {
                $codciu = H::getX_vacio('Numsol', 'Viasolviatra', 'Codciu', $this->viacalviatra->getRefsol());
                if ($codciu!='') {
                $sql = "select '1' as ord,1 as check, e.codrub as codrub, e.desrub as desrub, (fechas-fecdes)+1 as numdia,f.monto*d.valdolar as mondia,
                 'I1' as tipo,'C' as calculo, '' as forcal, 0 as monpor
                 from viasolviatra a, viaciudad b , viapais c, viadefgen d, viadefrub e, viacalrub f
                 where
                 numsol='" . $this->numsol . "' and
                 e.tipviat='I' and 
                 a.codniv=f.codnivtra and 
                 a.codciu=b.codciu and
                 e.codrub=f.codrub and
                 b.codpai=f.codpai and
                 c.codpai=f.codpai and
                 b.codpai=c.codpai
                 union all
                select '1' as ord, 1 as check,e.codpri as codrub, f.despri as desrub, (fechas-fecdes)+1 as numdia,
                (case when f.monfij>0 then f.monfij else (case when f.sumres='R' then (case when f.forcal='D' then ((g.monto*d.valdolar) -((g.monto*d.valdolar)*e.monpor/100)) else 0 end) else (case when f.forcal='D' then ((g.monto*d.valdolar)*e.monpor/100) else 0 end) end) end) as mondia, '' as tipo,'C' as calculo, f.forcal as forcal, e.monpor as monpor
                 from viasolviatra a, viaciudad b , viapais c, viadefgen d, vianivpri e, viadefpri f, viacalrub g
                 where
                 a.numsol='" . $this->numsol . "' and
                 e.codniv='" . $this->nivel . "' and
                 g.codrub='" . $rubint . "' and
                 b.codpai=g.codpai and
                 a.codciu=b.codciu and
                 b.codpai=c.codpai and
                 a.codniv=e.codniv and
                 g.codnivtra=e.codniv and
                 e.codpri=f.codpri
                 union all
                 select '2' as ord,1 as check,(select codrub from viadefrub where tiprub='2' and tipviat='I' limit 1),destiptra,
                 2, (select monto from viacalrub where codrub=(select codrub from viadefrub where tiprub='2' and tipviat='I' limit 1) and codnivtra=codtiptra),
                 codtiptra,'C', '' as forcal, 0 as monpor from viadeftiptra where tipo='A'
                 union all
                 select '3' as ord,null as check,codrub,desrub,0,0,'',tipo, '' as forcal, 0 as monpor from viadefrub where tipo='F' and tipviat='I'";
                
             }else {
                $sql="select '1' as ord,1 as check, e.codrub as codrub, e.desrub as desrub, (fechas-fecdes)+1 as numdia,f.monto*d.valdolar as mondia,
                 'I1' as tipo,'C' as calculo, '' as forcal, 0 as monpor
                 from viasolviatra a, viapais c, viadefgen d, viadefrub e, viacalrub f
                 where
                 numsol='" . $this->numsol . "' and
                 e.tipviat='I' and 
                 a.codniv=f.codnivtra and 
                 e.codrub=f.codrub and
                 c.codpai=f.codpai and
                 a.codpai=c.codpai
                 union all
                select '1' as ord, 1 as check,e.codpri as codrub, f.despri as desrub, (fechas-fecdes)+1 as numdia,
                (case when f.monfij>0 then f.monfij else (case when f.sumres='R' then (case when f.forcal='D' then ((g.monto*d.valdolar) -((g.monto*d.valdolar)*e.monpor/100)) else 0 end) else (case when f.forcal='D' then ((g.monto*d.valdolar)*e.monpor/100) else 0 end) end) end) as mondia, '' as tipo,'C' as calculo, f.forcal as forcal, e.monpor as monpor
                 from viasolviatra a, viapais c, viadefgen d, vianivpri e, viadefpri f, viacalrub g
                 where
                 a.numsol='" . $this->numsol . "' and
                 e.codniv='" . $this->nivel . "' and
                 g.codrub='" . $rubint . "' and
                 c.codpai=g.codpai and
                 a.codpai=c.codpai and
                 a.codniv=e.codniv and
                 g.codnivtra=e.codniv and
                 e.codpri=f.codpri
                 union all
                 select '2' as ord,1 as check,(select codrub from viadefrub where tiprub='2' and tipviat='I' limit 1),destiptra,
                 2, (select monto from viacalrub where codrub=(select codrub from viadefrub where tiprub='2' and tipviat='I' limit 1) and codnivtra=codtiptra),
                 codtiptra,'C', '' as forcal, 0 as monpor from viadeftiptra where tipo='A'
                 union all
                 select '3' as ord,null as check,codrub,desrub,0,0,'',tipo, '' as forcal, 0 as monpor from viadefrub where tipo='F' and tipviat='I'";
             }
             //print '<pre>'; print $sql; exit;
                if (H::BuscarDatos($sql, $arrrs)) {
                    Viaticos::CargarRubrosInternacionales($numaco,$cambio,$arrrs,$per);
                   /* $i = 0;
                    $acum = 0;
                    $posi = 0;
                    $hubo = false;
                    foreach ($arrrs as $rs) {
                        $per[$i]['check'] = $rs['check'];
                        $per[$i]['codrub'] = $rs['codrub'];
                        $per[$i]['desrub'] = $rs['desrub'];
                        $per[$i]['numdia'] = ($rs['numdia']);
                        $per[$i]['mondia'] = H::FormatoMonto($rs['mondia']);
                        $per[$i]['montot'] = H::FormatoMonto(($rs['numdia'] * $rs['mondia']) + ($rs['numdia'] * $rs['mondia'] * $numaco));
                        $per[$i]['tipo'] = $rs['tipo'];
                        $per[$i]['calculo'] = $rs['calculo'];
                        $per[$i]['mondiadol'] = H::FormatoMonto(($rs['mondia'] / $cambio));
                        #$per[$i]['cambio']=H::FormatoMonto($cambio);
                        $per[$i]['montotdol'] = H::FormatoMonto((($rs['mondia'] / $cambio) * $rs['numdia']) + (($rs['mondia'] / $cambio) * $rs['numdia'] * $numaco));
                        $per[$i]['forcal'] = $rs['forcal'];
                        $per[$i]['id'] = 9;
                        if ($rs['forcal'] == 'T') {
                            $posi = $i;
                            $hubo = true;
                        }
                        $acum+=$rs['mondia'];
                        $i++;
                    }
                    if ($hubo) {
                        $per[$posi]['mondia'] = H::FormatoMonto($acum);
                        $per[$posi]['montot'] = H::FormatoMonto(($per[$posi]['numdia'] * $acum) + ($per[$posi]['numdia'] * $acum * $numaco));
                        $per[$posi]['mondiadol'] = H::FormatoMonto(($acum / $cambio));
                        $per[$posi]['montotdol'] = H::FormatoMonto((($acum / $cambio) * $per[$posi]['numdia']) + (($acum / $cambio) * $per[$posi]['numdia'] * $numaco));
                    }*/
                }
            } else {
                $c = new Criteria();
                $op = ViadefgenPeer::doSelectOne($c);
                if ($op) {
                    $cambio = $op->getValdolar();
                    $rubint = $op->getRubint();
                }

                $p = new Criteria();
                $p->add(ViadetcalviatraPeer::NUMCAL, $this->viacalviatra->getNumcal());
                $regis = ViadetcalviatraPeer::doSelect($p);
                if ($regis) {
                    $i = 0;
                    foreach ($regis as $objr) {
                        $per[$i]['check'] = '1';
                        $per[$i]['codrub'] = $objr->getCodrub();
                        if ($objr->getTipo() == 'I1')
                            $desrub = H::getX_vacio('CODRUB', 'viadefrub', 'Desrub', $objr->getCodrub());
                        else{
                            $desrub = H::getX_vacio('CODPRI', 'viadefpri', 'Despri', $objr->getCodrub());
                            if ($desrub=='')
                              $desrub = H::getX_vacio('CODRUB', 'viadefrub', 'Desrub', $objr->getCodrub());
                        }
                        $per[$i]['desrub'] = $desrub;
                        $per[$i]['numdia'] = $objr->getNumdia();
                        $per[$i]['mondia'] = H::FormatoMonto($objr->getMondia());
                        $per[$i]['montot'] = H::FormatoMonto($objr->getMontot());
                        $per[$i]['tipo'] = $objr->getTipo();
                        $per[$i]['calculo'] = 'C';
                        $per[$i]['mondiadol'] = H::FormatoMonto($objr->getMondia() / $cambio);
                        $per[$i]['montotdol'] = H::FormatoMonto(($objr->getMondia() / $cambio) * $objr->getNumdia());
                        $forcal = H::getX_vacio('CODPRI', 'viadefpri', 'Forcal', $objr->getCodrub());
                        $per[$i]['forcal'] = $forcal;
                        $per[$i]['id'] = 9;

                        $i++;
                    }
                }
            }
        }



        $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir') . '/viacalviatra/' . sfConfig::get('sf_app_module_config_dir_name') . '/grid');
        $deshabnumdias = H::getConfApp2('deshabnumdias', 'viaticos', 'viacalviatra');
        $habmondia = H::getConfApp2('habmondia', 'viaticos', 'viacalviatra');
        if ($deshabnumdias == 'S')
            $this->obj[1][3]->setHtml('size=10 readonly=true');
        else
            $this->obj[1][3]->setHtml('size=10 onBlur="ValidarMontoGridv2(this.id); calculamontofinal(this.id,3);"'); //onkeyPress="return validaEntero(event)"
        if ($habmondia=='S')
          $this->obj[1][4]->setHtml('size=10 onBlur="ValidarMontoGridv2(this.id);calculamontofinal(this.id,4);"');
        else
          $this->obj[1][4]->setHtml('size=10 readonly=true onBlur="ValidarMontoGridv2(this.id);calculamontofinal(this.id,4);"');
        
        $this->obj[1][0]->setHtml('size=5 onclick="Calculartotal();"');
        if ($this->tipvia == 'NACIONAL' || substr($this->viacalviatra->getNumcal(), 0, 2) == 'VN') {
            $this->obj[1][8]->setOculta(true);
            $this->obj[1][9]->setOculta(true);
            if ($cankil) {
                $this->obj[1][3]->setTitulo('Cantidad de Días/Kilómetros a Pagar');
            }
        }

        $this->obj = $this->obj[0]->getConfig($per);
        $this->viacalviatra->setGrid($this->obj);
    }

    public function executeAjax() {
        $codigo = $this->getRequestParameter('codigo', '');
        $ajax = $this->getRequestParameter('ajax', '');
        $js = '';
        $nomcat = '';
        $head = true;
        switch ($ajax) {
            case '1':
                $head = false;
                $this->ajaxs = '1';
                $tipvia = 'NACIONAL';
                $desniv = "";
                $codiniv = "";
                $manaprdirsup=H::getConfApp2('manaprdirsup', 'viaticos', 'viasolviatra');
                $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
                $filsoldir=H::getConfApp2('filsoldir', 'viaticos', 'viasolviatra');
                $c = new Criteria();
                $c->add(ViasolviatraPeer::NUMSOL, $codigo);
                $c->add(ViasolviatraPeer::STATUS, 'A');
                if ($manaprdirsup=='S')
                  $c->add(ViasolviatraPeer::STATUSDIR, 'A');
                if ($filsoldir=='S'){
                  $esgerente=H::getX_vacio('LOGUSE','Usuarios','Esgeren',$loguse);
                  if ($esgerente=='N')
                    $sql = 'viasolviatra.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\') and viasolviatra.logusu=\''.$loguse.'\'';
                  else
                    $sql = 'viasolviatra.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
                  $c->add(ViasolviatraPeer::CODDIREC, $sql, Criteria::CUSTOM);
                }               
                $per = ViasolviatraPeer::doSelectOne($c);
                if ($per) {
                    $c2 = new Criteria();
                    $c2->add(ViacalviatraPeer::REFSOL, $codigo);
                    $c2->add(ViacalviatraPeer::STATUS, 'A');                    
                    $per2 = ViacalviatraPeer::doSelectOne($c2);
                    if (!$per2) {
                        $fecsol = date('d/m/Y', strtotime($per->getFecsol()));
                        $tipvia = $per->getTipvia() == 'N' ? 'NACIONAL' : 'INTERNACIONAL';
                        $dessol = htmlspecialchars($per->getDessol());
                        if (!$per->getEsnoemp()) {
                            $cedemp = NphojintPeer::getCedemp($per->getCodemp());
                            $nomemp = NphojintPeer::getNomemp($per->getCodemp());
                        } else {
                            $cedemp = $per->getCodemp();
                            $nomemp = H::GetX('Cedrif', 'Opbenefi', 'Nomben', $per->getCodemp());
                        }
                        $c = new Criteria();
                        $c->add(ViadefnivPeer::CODNIV, $per->getCodniv());
                        $obj = ViadefnivPeer::doSelectOne($c);
                        if ($obj)
                            $desniv = $obj->getDesniv();

                        $codiniv = $per->getCodniv();
                        $cedempaco = NphojintPeer::getCedemp($per->getCodempaco());
                        $nomempaco = NphojintPeer::getNomemp($per->getCodempaco());
                        $desnivaco = '';
                        $c = new Criteria();
                        $c->add(ViadefnivPeer::CODNIV, $per->getCodnivaco());
                        $obj = ViadefnivPeer::doSelectOne($c);
                        if ($obj)
                            $desnivaco = $obj->getDesniv();
                        $c = new Criteria();
                        $c->add(ViadefprocedPeer::CODPROCED, $per->getCodproced());
                        $obj = ViadefprocedPeer::doSelectOne($c);
                        if ($obj)
                            $desproced = $obj->getDesproced();
                        $c = new Criteria();
                        $c->add(ViadeffortraPeer::CODFORTRA, $per->getCodfortra());
                        $obj = ViadeffortraPeer::doSelectOne($c);
                        if ($obj)
                            $desfortra = $obj->getDesfortra();
                        $respon = H::getConfApp2('respon', 'tesoreria', 'tesdesubi');
                        if ($respon == "S") {
                            $cedempaut = $per->getCodempaut();
                            $nomempaut = $per->getNomempe();
                        } else {
                            $cedempaut = NphojintPeer::getCedemp($per->getCodempaut());
                            $nomempaut = NphojintPeer::getNomemp($per->getCodempaut());
                        }
                        $c = new Criteria();
                        $c->add(NpcatprePeer::CODCAT, $per->getCodcat());
                        $obj = NpcatprePeer::doSelectOne($c);
                        if ($obj)
                            $nomcat = $obj->getNomcat();
                        $this->numdia = $per->getNumdia();
                        $this->numsol = $codigo;
                        if ($per->getCodnivaco() > $per->getCodniv())
                            $this->nivtra = $per->getCodnivaco();
                        else
                            $this->nivtra = $per->getCodniv();
                        $sw = true;
                        $codciu = H::getX_vacio('Numsol', 'Viasolviatra', 'Codciu', $codigo);
                        $codest = H::getX_vacio('Numsol', 'Viasolviatra', 'Codest', $codigo);
                        $codpai = H::getX_vacio('Codciu', 'Viaciudad', 'Codpai', $codciu); 
                        if ($codpai=='')
                            $codpai=H::getX_vacio('Numsol','Viasolviatra','Codpai',$codigo);
                        $this->codpai = $codpai;
                        $ciudad = $codciu . '  -  ' . H::getX_vacio('Codciu', 'Viaciudad', 'Nomciu', $codciu);
                        $estado = $codest . '  -  ' . H::getX_vacio('Codest', 'Viaestado', 'Nomest', $codest);
                        $pais = $codpai . '  -  ' . H::getX_vacio('Codpai', 'Viapais', 'Nompai', $codpai);

                        $unisol = $per->getCodubi() . ' - ' . H::getX_vacio('Codubi', 'Bnubica', 'Desubi', $per->getCodubi());
                        $unieje = $per->getCodcen() . ' - ' . H::getX_vacio('Codcen', 'Cadefcen', 'Descen', $per->getCodcen());
                    }else {
                        $js.="$('viacalviatra_refsol').value='';
                  alert('Numero de Solicitud ya fue Aprobada');";
                        $sw = false;
                        $pais = '';
                        $estado = '';
                        $ciudad = '';
                        $unisol = '';
                        $unieje = '';
                    }
                } else {
                    $js.="$('viacalviatra_refsol').value='';
                  alert('Numero de Solicitud No esta Aprobado');";
                    $sw = false;
                    $pais = '';
                    $estado = '';
                    $ciudad = '';
                    $unisol = '';
                    $unieje = '';
                }
                $this->viacalviatra = $this->getViacalviatraOrCreate();
                $this->updateViacalviatraFromRequest();
                $this->numsol = $codigo;
                $this->tipvia = $tipvia;
                $obtmaxniv = H::getConfApp2('obtmaxniv', 'viaticos', 'viacalviatra');
                if ($obtmaxniv == 'S')
                    $this->nivel = Viaticos::maximoNivel($codigo);
                else
                    $this->nivel = $codiniv;
                if ($tipvia == 'NACIONAL') {
                    $js.="$('divtotviadol').hide();";
                } else {
                    $js.="$('divtotviadol').show();";
                }
                $js.=" mostrarAcompanantes('$codigo');";
                $this->configGrid(array('1'));
                $dessol = eregi_replace("[\n|\r|\n\r]", ' ', $dessol);
                if ($sw)
                    $output = '[["javascript","' . $js . '",""],["viacalviatra_fecsol","' . $fecsol . '",""],["viacalviatra_tipvia","' . $tipvia . '",""],["viacalviatra_dessol","' . $dessol . '",""],
                       ["viacalviatra_empleado","' . $cedemp . '  -  ' . $nomemp . '",""],["viacalviatra_nivel","' . $per->getCodniv() . '  -  ' . $desniv . '",""],
                       ["viacalviatra_empleadoaco","' . $cedempaco . '  -  ' . $nomempaco . '",""],["viacalviatra_nivelaco","' . $per->getCodnivaco() . '  -  ' . $desnivaco . '",""],
                       ["viacalviatra_proced","' . $per->getCodproced() . '  -  ' . $desproced . '",""],["viacalviatra_fortra","' . $per->getCodfortra() . '  -  ' . $desfortra . '",""],
                       ["viacalviatra_fecdes","' . date('d/m/Y', strtotime($per->getFecdes())) . '",""],["viacalviatra_fechas","' . date('d/m/Y', strtotime($per->getFechas())) . '",""],["viacalviatra_numdia","' . $per->getNumdia() . '",""],
                       ["viacalviatra_empleadoaut","' . $cedempaut . '  -  ' . $nomempaut . '",""],["viacalviatra_diaconper","' . ($per->getNumdia() - 1) . '",""],["viacalviatra_diasinper","1",""],
                       ["viacalviatra_codcat","' . $per->getCodcat() . '",""],["viacalviatra_nomcat","' . $nomcat . '",""],["viacalviatra_ciudad","' . $ciudad . '",""],["viacalviatra_estado","' . $estado . '",""],["viacalviatra_pais","' . $pais . '",""],["viacalviatra_unidadsol","' . $unisol . '",""],["viacalviatra_unidadeje","' . $unieje . '",""]]';
                else
                    $output = '[["javascript","' . $js . '",""],["","",""],["","",""]]';
                break;
            case '2':
                $js = '';
                $monto = $this->getRequestParameter('monto', '');
                $codcat = $this->getRequestParameter('codcat', '');
                $monto = H::obtenermontoescrito($monto);

                $output = '[["javascript","' . $js . '",""],["viacalviatra_totviaenletras","' . $monto . '",""],["","",""]]';
                break;
            case '3':
                $dateFormat = new sfDateFormat('es_VE');
                $fecha = $dateFormat->format($this->getRequestParameter('codigo'), 'i', $dateFormat->getInputPattern('d'));

                $msj = "";
                $c = new Criteria();
                $c->add(ViacalviatraPeer::NUMCAL, $this->getRequestParameter('numcal'));
                $data = ViacalviatraPeer::doSelectOne($c);
                if ($data) {
                    if ($fecha < $data->getFeccal()) {
                        $msj = "alert('La Fecha de Anulacion no puede ser menor a la Fecha del Cálculo'); $('viacalviatra_fecanu').value=''";
                    }
                }
                $output = '[["javascript","' . $msj . '",""]]';
                break;
            case '4':
                $head = false;
                $this->ajaxs = '2';
                $numsol = $this->getRequestParameter('numsol', '');
                $this->viacalviatra = $this->getViacalviatraOrCreate();
                $this->params = array();
                $this->labels = $this->getLabels();
                $this->configGrid2($numsol);
                $output = '[["","",""],["","",""],["","",""]]';
                break;
            default:
                $output = '[["","",""],["","",""],["","",""]]';
        }

        // Instruccion para escribir en la cabecera los datos a enviar a la vista
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');

        // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
        // mantener habilitar esta instrucción
        if ($head)
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

            $this->viacalviatra = $this->getViacalviatraOrCreate();
            $this->updateViacalviatraFromRequest();
            $this->configGrid();
            $grid = Herramientas::CargarDatosGridv2($this, $this->obj, true);

            if (!$this->viacalviatra->getId()) {
                $c = new Criteria();
                $c->add(ViacalviatraPeer::REFSOL, $this->viacalviatra->getRefsol());
                $c->add(ViacalviatraPeer::STATUS, 'N', Criteria::NOT_EQUAL);
                $resul = ViacalviatraPeer::doSelectOne($c);
                if ($resul) {
                    $this->coderr = 1622;
                    return false;
                }
            }

            $monto = 0;
            foreach ($grid[0] as $r) {
                if ($r['check'] == 1) {
                    if (strrpos(',', $r['montot']))
                        $monto+=H::FormatoNum($r['montot']);
                    else
                        $monto+=$r['montot'];
                }
            }
            if ($monto == 0) {
                $this->coderr = 'V001';
                return false;
            } else {
                $sqlano = "select to_char(fecini,'yyyy') as ano from contaba";
                H::BuscarDatos($sqlano, $rsa);
                $ano = $rsa[0]['ano'];
                $categoria = $this->viacalviatra->getCodcat();
                $mondis = 0;
                $sql = "select sum(monasi +
                coalesce(obtener_ejecucion(rtrim(codpre),'01','12','" . $ano . "','TRA'),0) +
                coalesce(obtener_ejecucion(rtrim(codpre),'01','12','" . $ano . "','ADI'),0) -
                coalesce(obtener_ejecucion(rtrim(codpre),'01','12','" . $ano . "','TRN'),0) -
                coalesce(obtener_ejecucion(rtrim(codpre),'01','12','" . $ano . "','DIS'),0) -
                coalesce(obtener_ejecucion(rtrim(codpre),'01','12','" . $ano . "','PRC'),0)) as mondis
                from cpasiini where CodPre like '" . $categoria . "%' and anopre='" . $ano . "' and perpre='00'";

                if (H::BuscarDatos($sql, $rs))
                    $mondis = $rs[0]['mondis'];

                if ($monto > $mondis) {
                    $this->coderr = 'V002';
                    return false;
                }
            }




            // Aqui van los llamados a los métodos de las clases del
            // negocio para validar los datos.
            // Los resultados de cada llamado deben ser analizados por ejemplo:
            // $resp = Compras::validarAlmajuoc($this->caajuoc,$grid);
            //$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);
            // al final $resp es analizada en base al código que retorna
            // Todas las funciones de validación y procesos del negocio
            // deben retornar códigos >= -1. Estos código serám buscados en
            // el archivo errors.yml en la función handleErrorEdit()

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
        $this->grabo = "";
        $this->configGrid();

        $grid = Herramientas::CargarDatosGridv2($this, $this->obj, true);

        //$this->configGrid($grid[0],$grid[1]);
    }

    public function saving($clasemodelo) {
        if ($clasemodelo->getNumcal() == '##########') {
            $c = new Criteria();
            $per = ViadefgenPeer::doSelectOne($c);
            if (!$per)
                $per = new Viadefgen();
            if ($clasemodelo->getTipviatic() == 'N') {
                $numcal = 'VN' . str_pad($per->getSeccalvianac(), 8, '0', STR_PAD_LEFT);
                $clasemodelo->setNumcal($numcal);
                $sql = "update viadefgen set numcalvianac='" . ($per->getNumcalvianac() + 1) . "'";
                H::insertarRegistros($sql);
            } else {
                $numcal = 'VI' . str_pad($per->getSeccalviaint(), 8, '0', STR_PAD_LEFT);
                $clasemodelo->setNumcal($numcal);
                $sql = "update viadefgen set numcalviaint='" . ($per->getNumcalviaint() + 1) . "'";
                H::insertarRegistros($sql);
            }
        }

        $c = new Criteria();
        $c->add(ViadetcalviatraPeer::NUMCAL, $clasemodelo->getNumcal());
        $per = ViadetcalviatraPeer::doSelect($c);
        if ($per)
            foreach ($per as $r)
                $r->delete();

        $grid = Herramientas::CargarDatosGridv2($this, $this->obj, true);
        foreach ($grid[0] as $reg) {
            if ($reg['check'] == '1' && H::FormatoNum($reg['montot']) != 0) {
                $viadetcal = new Viadetcalviatra();
                $viadetcal->setNumcal($clasemodelo->getNumcal());
                $viadetcal->setFeccal($clasemodelo->getFeccal());
                $viadetcal->setCodrub($reg['codrub']);
                $viadetcal->setNumdia($reg['numdia']);
                $viadetcal->setMondia($reg['mondia']);
                $viadetcal->setMontot($reg['montot']);
                $viadetcal->setTipo($reg['tipo']);
                $viadetcal->save();
            }
        }
        $clasemodelo->setStatus('P');
        $manver = H::getConfApp2('manver', 'viaticos', 'viacalviatra');
        if ($manver == 'S')
            $clasemodelo->setVerificado('N');
        else
            $clasemodelo->setVerificado('S');
        if (!$clasemodelo->getId())
          $clasemodelo->setLogusu(sfContext::getInstance()->getUser()->getAttribute('loguse'));      
        return parent::saving($clasemodelo);
    }

    public function deleting($clasemodelo) {
        if ($clasemodelo->getStatus() == 'P') {
            $c = new Criteria();
            $c->add(ViadetcalviatraPeer::NUMCAL, $clasemodelo->getNumcal());
            $per = ViadetcalviatraPeer::doSelect($c);
            if ($per)
                foreach ($per as $r)
                    $r->delete();

            return parent::deleting($clasemodelo);
        }else {
            $gencomxacom=H::getConfApp2('gencomxacom', 'viaticos', 'viaaprcalviatra');
            if ($gencomxacom=='S'){
              $refcom=explode("_", $clasemodelo->getRefcomvar());
              for ($i=0; $i <count($refcom)-1 ; $i++) { 
                  $tiecau = H::getX_vacio('REFERE', 'Cpimpcau', 'STAIMP', $refcom[$i]);
                  if (!($tiecau == '' || $tiecau != 'N'))
                    return 'V010';
              }
              for ($i=0; $i <count($refcom)-1 ; $i++) { 
                H::EliminarRegistro('Cpimpcom', 'Refcom', $refcom[$i]);
                H::EliminarRegistro('Cpcompro', 'Refcom', $refcom[$i]);
                $cq = new Criteria();
                $cq->add(CpmovfuefinPeer::REFMOV,$refcom[$i]);
                $cq->add(CpmovfuefinPeer::TIPMOV,'COMPROMISO');
                $cpmovfuefins = CpmovfuefinPeer::doSelect($cq);
                if ($cpmovfuefins) {
                    foreach ($cpmovfuefins as $cpmovfuefin) {
                        $cpmovfuefin->delete();
                    }
                }
              }

              $c = new Criteria();
              $c->add(ViadetcalviatraPeer::NUMCAL, $clasemodelo->getNumcal());
              $per = ViadetcalviatraPeer::doSelect($c);
              if ($per)
                foreach ($per as $r)
                    $r->delete();

              return parent::deleting($clasemodelo);
            }else {
                $tiecau = H::getX_vacio('REFERE', 'Cpimpcau', 'STAIMP', $clasemodelo->getRefcom());
                if ($tiecau == '' || $tiecau != 'N') {
                    H::EliminarRegistro('Cpimpcom', 'Refcom', $clasemodelo->getRefcom());
                    H::EliminarRegistro('Cpcompro', 'Refcom', $clasemodelo->getRefcom());
                    $cq = new Criteria();
                    $cq->add(CpmovfuefinPeer::REFMOV,$clasemodelo->getRefcom());
                    $cq->add(CpmovfuefinPeer::TIPMOV,'COMPROMISO');
                    $cpmovfuefins = CpmovfuefinPeer::doSelect($cq);
                    if ($cpmovfuefins) {
                        foreach ($cpmovfuefins as $cpmovfuefin) {
                            $cpmovfuefin->delete();
                        }
                    }

                    $c = new Criteria();
                    $c->add(ViadetcalviatraPeer::NUMCAL, $clasemodelo->getNumcal());
                    $per = ViadetcalviatraPeer::doSelect($c);
                    if ($per)
                        foreach ($per as $r)
                            $r->delete();

                    return parent::deleting($clasemodelo);
                }
                else return 'V010';
          }
        }
    }

    public function executeAnular() {
        $numcal = $this->getRequestParameter('numcalculo');
        $feccal = $this->getRequestParameter('feccalculo');

        $dateFormat = new sfDateFormat('es_VE');
        $fec = $dateFormat->format($feccal, 'i', $dateFormat->getInputPattern('d'));

        $c = new Criteria();
        $c->add(ViacalviatraPeer::NUMCAL, $numcal);
        $c->add(ViacalviatraPeer::FECCAL, $fec);
        $this->viacalviatra = ViacalviatraPeer::doSelectOne($c);
        sfView::SUCCESS;
    }

    public function executeSalvaranu() {
        $numcal = $this->getRequestParameter('numcal');
        $fecanu = $this->getRequestParameter('fecanu');
        $motanu = $this->getRequestParameter('motanu');
        $this->msg = '';
        $this->mensaje2 = "";

        $fecha_aux = split("/", $fecanu);
        $dateFormat = new sfDateFormat('es_VE');
        $fec = $dateFormat->format($fecanu, 'i', $dateFormat->getInputPattern('d'));

        $c = new Criteria();
        $c->add(ViacalviatraPeer::NUMCAL, $numcal);
        $resul = ViacalviatraPeer::doSelectOne($c);
        if ($resul) {
            if ($fec >= $resul->getFeccal()) {
              if ($resul->getRefcom()!='') {
                $rb = new Criteria();
                $rb->add(CpimpcauPeer::REFERE, $resul->getRefcom());
                $rb->add(CpimpcauPeer::STAIMP, 'N', Criteria::NOT_EQUAL);
                $regb = CpimpcauPeer::doSelectOne($rb);
                if (!$regb) {
                    $resul->setFecanu($fec);
                    $resul->setDesanu($motanu);
                    $resul->setStatus('N');
                    $resul->save();

                    $r = new Criteria();
                    $r->add(CpcomproPeer::REFCOM, $resul->getRefcom());
                    $reg = CpcomproPeer::doSelectOne($r);
                    if ($reg) {
                        $reg->setDesanu($motanu);
                        $reg->setFecanu($fec);
                        $reg->setStacom('N');
                        $reg->save();
                    }

                    $ra = new Criteria();
                    $ra->add(CpimpcomPeer::REFCOM, $resul->getRefcom());
                    $rega = CpimpcomPeer::doSelect($ra);
                    if ($rega) {
                        foreach ($rega as $regobj) {
                            $regobj->setStaimp('N');
                            $regobj->save();
                        }
                    }
                    $cq = new Criteria();
                    $cq->add(CpmovfuefinPeer::REFMOV,$resul->getRefcom());
                    $cq->add(CpmovfuefinPeer::TIPMOV,'COMPROMISO');
                    $cpmovfuefins = CpmovfuefinPeer::doSelect($cq);
                    if ($cpmovfuefins) {
                        foreach ($cpmovfuefins as $cpmovfuefin) {
                            $cpmovfuefin->setStamov('N');
                            $cpmovfuefin->save();
                        }
                    }
                } else {
                    $this->msg = "El Cálculo de Viáticos no se puede Anular porque refiere a un Causado";
                    return sfView::SUCCESS;
                }
              }else {
                    $resul->setFecanu($fec);
                    $resul->setDesanu($motanu);
                    $resul->setStatus('N');
                    $resul->save();
              }
            } else {
                $this->msg = "El Cálculo de Viáticos no se puede Anular con una Fecha Menor a la Fecha de Emisión";
                return sfView::SUCCESS;
            }
        }

        return sfView::SUCCESS;
    }

    public function configGrid2($numsol = '') {
        $c = new Criteria();
        $c->add(ViadetsolacoempPeer :: NUMSOL, $numsol);
        $result2 = ViadetsolacoempPeer :: doSelect($c);

        $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/viacalviatra/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_acompanante');

        $this->obj2 = $this->columnas[0]->getConfig($result2);

        $this->viacalviatra->setGrid2($this->obj2);
    }

public function getLabels()
  {
    $labels = parent::getLabels();
    $cambiareti=H::getConfApp2('cameti', 'viaticos', 'viacalviatra');
    if ($cambiareti=='S'){
      $labels['viacalviatra{numcal}'] = 'Nro. Solicitud';
      $labels['viacalviatra{feccal}'] = 'Fecha de Solicitud';
      $labels['viacalviatra{refsol}'] = 'Orden de Comisión';
      $labels['viacalviatra{fecsol}'] = 'Fecha Orden de Comisión';
    }

    return $labels;
  }       

}
