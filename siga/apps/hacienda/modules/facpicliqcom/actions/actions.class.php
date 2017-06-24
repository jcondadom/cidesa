<?php

/**
 * facpicliqcom actions.
 *
 * @package    siga
 * @subpackage facpicliqcom
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class facpicliqcomActions extends autofacpicliqcomActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->setVars();
    if ($this->fcdeclar->getId()){
        $this->fcdeclar->setPrimeravez('N');
        }
    $this->configGriddisdeu();
    $this->configGridactcom($this->fcdeclar->getNumref(),$this->fcdeclar->getAnodec(),$this->fcdeclar->getModo());

  }
    public function executeCreate()
  {
    $c= new Criteria();
    $c->add(FcdefinsPeer::CODEMP,'001');
    $defins=FcdefinsPeer::doSelectOne($c);
    if ($defins)
    {
        if ($defins->getCodpic()=="") {
          $this->getRequest()->setError('valida', 'La Fuente de Ingreso de Patente Industria y Comercio no ha sido asociada.');
          return $this->forward('facpicliqcom', 'list');
        }
    }else {
        $this->getRequest()->setError('valida', 'Debe Registrar las Definiciones de la Institución.');
        return $this->forward('facpicliqcom', 'list');
    }

    return $this->forward('facpicliqcom', 'edit');
  }
  public function setVars()
  {
	$this->params='';
  	$this->params[0] = Herramientas::getX_vacio('codemp','fcdefins','codpic','001');
  	$this->params[1] = Herramientas::getX_vacio('codemp','fcdefins','codajupic','001');
  	$this->params[2] = Herramientas::getX_vacio('codemp','fcdefins','unipic','001');
  	$this->params[3] = Herramientas::getX_vacio('codemp','fcdefins','valunitri','001');

  	$c= new Criteria();
  	$c->add(FcfueprePeer::CODFUE, $this->params[1]);
  	$fcfuepre = FcfueprePeer::doselectone($c);

  	if ($fcfuepre){
  		$this->params[4] = $fcfuepre->getTipven();  //Tipven
  		$this->params[5] = $fcfuepre->getDiaven();  //DiasVencAju
  	}else{
  		$this->params[4] = "I";  //Tipven
  		$this->params[5] = 0;  //DiasVencAju

  	}

        $c= new Criteria();
  	$c->add(FcfueprePeer::CODFUE, $this->params[0]);
  	$fcfuepre2 = FcfueprePeer::doselectone($c);

  	if ($fcfuepre2){
  		$this->params[6] = $fcfuepre2->getDiaven();  //DiasVenc
  		$this->params[7] = $fcfuepre2->getTipven();  //Tipven

                if ($fcfuepre2->getFrecob()=='999')
                {
                    $this->params[8] = 1;  //Fporcion
                    $this->params[9] = 'PAGO UNICO';  //FName
                    $this->params[10] = 1;  //Frecuencia
                    $this->params[11] = $fcfuepre2->getInieje();  //EFechaInicio
                    $this->params[12] = $fcfuepre2->getFineje();  //EFechaFin
                }else {
                    $this->params[8] = '';  //Fporcion
                    $this->params[9] = '';  //FName
                    $this->params[10] = $fcfuepre2->getFrecob();  //Frecuencia
                    $this->params[11] = $fcfuepre2->getInieje();  //EFechaInicio
                    $this->params[12] = $fcfuepre2->getFineje();  //EFechaFin

                    $auxporciones=Constantes::Porciones();
                    if ($this->params[10]==(int)substr($auxporciones[$this->params[10]], 0,strlen($this->params[10])))
                    {
                        $this->params[8]=$this->params[10];
                        $this->params[9]=substr($auxporciones[$this->params[10]],strlen($this->params[10])+1,strlen($auxporciones[$this->params[10]]));
                    }
                    $this->params[13]=$auxporciones;
                }
  	}else{
  		$this->params[6] = 0;  //DiasVenc
  		$this->params[7] = "I";  //Tipven

  	}

  }

  public function configGridactcom($numref='',$anodec='',$modo='',$arreglo=array())
  {
        if (count($arreglo)>0)
        {
            $y=0;
            while ($y<count($arreglo))
            {
                $fcactpic= new Fcactpic();
                $fcactpic->setCodact($arreglo[$y]["codact"]);
                $fcactpic->setDesact($arreglo[$y]["desact"]);
                $fcactpic->setMonact($arreglo[$y]["monact"]);
                $fcactpic->setMonbru($arreglo[$y]["monbru"]);
                $fcactpic->setMonexo($arreglo[$y]["monexo"]);
                $fcactpic->setMonreb($arreglo[$y]["monreb"]);
                $fcactpic->setImppag($arreglo[$y]["imppag"]);
                $fcactpic->setTipoc($arreglo[$y]["tipoc"]);
                $reg[]=$fcactpic;

                $y++;
            }
        }else {
            $c= new Criteria();
            $c->add(FcactpicPeer::NUMDOC,$numref);
            $c->add(FcactpicPeer::ANODEC,$anodec);
            $c->add(FcactpicPeer::MODO,$modo);
            $reg=FcactpicPeer::doSelect($c);
        }
	$this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/facpicliqcom/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_fcactacom_edit');
        $this->columnas[0]->setEliminar(true,'Recalcular()');
        $this->columnas[1][0]->setCatalogo('fcactcom','sf_admin_edit_form', array('codact'=>'1','desact'=>'2'), 'Facpicsollic_Fcactcomplementaria', array('param1' => "'+$('fcdeclar_anodec').value+'"));
	$this->obj = $this->columnas[0]->getConfig($reg);

	$this->fcdeclar->setGridactcom($this->obj);
  }

  public function configGriddisdeu($arreglo=array())
  {
    $reg=array();
    if (count($arreglo)>0)
    {
       $i=1;
       while ($i<=count($arreglo))
       {
           $fcdeclar2= new Fcdeclar();
           $fcdeclar2->setNumero($arreglo[$i]["numero"]);
           $fcdeclar2->setFecven($arreglo[$i]["fecven"]);
           $fcdeclar2->setNombre($arreglo[$i]["nombre"]);
           $fcdeclar2->setTipo($arreglo[$i]["tipo"]);
           $fcdeclar2->setMondec($arreglo[$i]["mondec"]);
           $fcdeclar2->setEdodecstatus($arreglo[$i]["edodecstatus"]);
           $fcdeclar2->setFueing($arreglo[$i]["fueing"]);
           $reg[]=$fcdeclar2;

           $i++;
       }
    }else {
        $sql="select * from fcdeclar where (fueing='".$this->params[0]."' or fueing='".$this->params[1]."' or fueing in (select codfuegen from fcfuentesmul where codfue='".$this->params[0]."'))
                and numdec='".$this->fcdeclar->getNumdec()."'
                union all
                select a.* from fcdeclar a, fcrepfis b where a.numdec='".$this->fcdeclar->getNumdec()."' and a.anodec='".$this->fcdeclar->getAnodec()."' and a.modo='".$this->fcdeclar->getModo()."'
                and b.numlic=a.numref and a.otro=b.numrep
                order by fecven, numero";
        if (Herramientas::BuscarDatos($sql,$result3))
        {
            $i=0;
            while ($i<count($result3))
            {
               $fcdeclar2= new Fcdeclar();
               $fcdeclar2->setNumero($result3[$i]["numero"]);
               $fcdeclar2->setFecven($result3[$i]["fecven"]);
               $fcdeclar2->setNombre($result3[$i]["nombre"]);
               $fcdeclar2->setTipo($result3[$i]["tipo"]);
               $fcdeclar2->setMondec($result3[$i]["mondec"]);
               if ($result3[$i]["edodec"]=='P')
                   $fcdeclar2->setEdodecstatus('PAGADA');
               else {
                   if (H::DateDiff("D", $result3[$i]["fecven"], date('Y-m-d'))<=0)
                      $fcdeclar2->setEdodecstatus('VIGENTE');
                   else
                      $fcdeclar2->setEdodecstatus('VENCIDA');
               }
               $fcdeclar2->setFueing($result3[$i]["fueing"]);
               $reg[]=$fcdeclar2;

                $i++;
            }
        }
    }

    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/facpicliqcom/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_disdeu_edit');

    $this->obj2 = $this->columnas[0]->getConfig($reg);
    $this->fcdeclar->setGriddisdeu($this->obj2);
  }
  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $javascript='';
    $sw=false;
    $this->ajax= $ajax;

    switch ($ajax){
      case '1':
          $dato1="";$dato2="";
          $DecCerrada = false;
          $grid= array();
          $fecha = $this->getRequestParameter('fecdec','');
          $numerodec = $this->getRequestParameter('numdec','');
          $nuevo = $this->getRequestParameter('nuevo','');
          $dateFormat = new sfDateFormat('es_VE');
          $fecdec = $dateFormat->format($fecha, 'i', $dateFormat->getInputPattern('d'));
          $rifcon=''; $nomcon=''; $dircon=''; $capsoc=''; $nomnegocio='';
          $rifrep=''; $nomconrep=''; $dirconrep=''; $anodeclar=''; $station='';
          $numlic=''; $fundec=''; $primeravez2='S';$stacion='';
          $c=new Criteria();
          $c->add(FcsollicPeer::STALIC, 'V');
          $c->add(FcsollicPeer::NUMLIC, $codigo);
          $fcsollic = FcsollicPeer::doSelectOne($c);
          if ($fcsollic)
          {
            $anodec='';
              $f= new  Criteria();
              $f->add(FcrepfisPeer::NUMLIC,$codigo);
              $dat= FcrepfisPeer::doSelect($f);
              if ($dat)
              {
                  $javascript="alert('Esta Licencia tiene '".count($dat)."' Reparos Fiscales');";
              }
               if (H::dateDiff('d',$fcsollic->getFecven(),$fecdec) > 0)
              {
                $javascript= H::iif($javascript, $javascript.',', '') ."$('estado').show()";
                $DecCerrada = true;
              }
                if ($fcsollic->getCodtiplic()=="000004"){
                     $javascript= H::iif($javascript, $javascript.',', '') . "alert('Licencia es de Tipo, ECONOMIA SOCIAL')";
            }else{
                 switch ($fcsollic->getStalic())
                {
                    case ('V' || 'E'):
                          if ((H::dateDiff('d',$fcsollic->getFecven(),$fecdec) < 0) or $DecCerrada){
                                 $destiplic = Herramientas::getX_vacio('codtiplic','fctiplic','destiplic',$fcsollic->getCodtiplic());
                            $rifcon=$fcsollic->getRifcon();
                            $nomcon=$fcsollic->getNomcon();
                            $dircon=$fcsollic->getDircon();
                            $javascript =  H::iif($javascript, $javascript.',', '') . H::iif($fcsollic->getNacconcon()=='V', "$('fcdeclar_naccon_V').checked = true", "$('fcdeclar_naccon_E').checked = true");  //Venezolano Extranjero
                            $javascript = $javascript.', '. H::iif($fcsollic->getTipconcon()=='N', "$('fcdeclar_tipcon_N').checked = true", "$('fcdeclar_tipcon_J').checked = true");  //Nacional Juridico

                            $capsoc=$fcsollic->getCapsoc();
                            $nomnegocio=$fcsollic->getNomneg();
                            $numlic=$fcsollic->getNumlic();
                            $fundec=sfContext::getInstance()->getUser()->getAttribute('usuario');

                            $rifrep=$fcsollic->getRifrep();
                            $nomconrep=$fcsollic->getNomconrep();
                            $dirconrep=$fcsollic->getDirconrep();
                            $javascript = $javascript.', '. H::iif($fcsollic->getNacconrep()=='V', "$('fcdeclar_nacconsol_V').checked = true", "$('fcdeclar_nacconsol_E').checked = true");  //Venezolano Extranjero
                            $javascript = $javascript.', '. H::iif($fcsollic->getTipconrep()=='N', "$('fcdeclar_tipconsol_N').checked = true", "$('fcdeclar_tipconsol_J').checked = true");  //Nacional Juridico

                            $stacion=$fcsollic->getEstser();
                              if ($nuevo=='')
                            {
                                   $sql = "Select AnoDec as Fecano, Modo as modo from FCDeclar where Numref='".$codigo."' and (modo='D' or modo='E') ORDER BY AnoDec DESC,FecDec Desc,modo";
                                if (Herramientas::BuscarDatos($sql,$result))
                                {
                                     if ($result[0]["fecano"]!="")
                                    {
                                        $primeravez=false;
                                        $primeravez2='N';
                                        $modo=$result[0]["modo"];
                                        if ($modo=='D')
                                        {
                                            $anodeclar= (float)$result[0]["fecano"]+1;
                                            $javascript = $javascript.', '."$('fcdeclar_modo_D').checked = true; $('fcdeclar_anodec').readOnly=true;";  //Tipo de Declaración
                                            $modo='E';
                                        }else {
                                            $anodeclar= $result[0]["fecano"];
                                            $javascript = $javascript.', '."$('fcdeclar_modo_E').checked = true; $('fcdeclar_anodec').readOnly=true;";  //Tipo de Declaración
                                            $modo='E';
                                        }
                                           $lafuente=H::getX_vacio('CODEMP','Fcdefins','Codpic','001');
                                          $r= new Criteria();
                                          $r->add(FcfueprePeer::CODFUE,$lafuente);
                                          $reg= FcfueprePeer::doSelectOne($r);
                                          if ($reg)
                                          {
                                                if ($reg->getFecest()!="")
                                                  {
                                                      $dato1="01/01/".$anodeclar;
                                                      $dato2="31/12/".$anodeclar;
                                                  }else {
                                                      $dato1="01/01/".$anodeclar;
                                                      $dato2="31/12/".$anodeclar;
                                                  }
                                          }else{
                                               $dato1="01/01/".$anodeclar;
                                               $dato2="31/12/".$anodeclar;
                                          }

                                    }else {
                                        $primeravez=true;
                                        $primeravez2='S';
                                        $anodeclar="";
                                        $modo='D';
                                        $javascript = $javascript.', '."$('fcdeclar_modo_D').checked = true";  //Tipo de Declaración
                                    }
                                }else {
                                    $primeravez=true;
                                    $primeravez2='S';
                                    $modo='D';
                                    $anodeclar="";
                                    $javascript = $javascript.', '."$('fcdeclar_modo_E').checked = true";  //Tipo de Declaración
                                }
                            }
                               $this->fcdeclar = $this->getFcdeclarOrCreate();
                                $this->updateFcdeclarFromRequest();
                                $this->setVars();
                                $this->labels = $this->getLabels();

                                 Hacienda::cargarActComplementarias($primeravez,$nuevo,$codigo,$anodeclar,$modo,$numerodec,$stacion,$grid);
                                 $this->configGridactcom('', '', '', $grid);
                                 if ($dato2!=""){
                                  $javascript=$javascript.', '."$('fcdeclar_feccie').focus();";}

                              if ((H::dateDiff('d',$fcsollic->getFecven(),$fecdec) > 0) ){
                                            $javascript= H::iif($javascript, $javascript.',', '') . "alert('Licencia esta Vencida. Debe Renovar la licencia Luego de Realizar la declaracion')";
                             }
                          }else {
                            $javascript= H::iif($javascript, $javascript.',', '') . "alert('Licencia esta Vencida. Debe Renovar la licencia Luego de Realizar la declaracion')";
                            $fcsollic->setStalic('E');
                            $fcsollic->save();
                        }
                        break;
                    case 'C':
                        $javascript="alert('La Licencia fue Cancelada'); $('fcdeclar_numref').value=''; $('fcdeclar_numref').focus();";
                        $this->fcdeclar = $this->getFcdeclarOrCreate();
                        $this->updateFcdeclarFromRequest();
                        $this->setVars();
                        $this->labels = $this->getLabels();
                        $this->configGridactcom();
                        break;
                    case 'S':
                        $javascript="alert('La Licencia fue Suspendida'); $('fcdeclar_numref').value=''; $('fcdeclar_numref').focus();";
                        $this->fcdeclar = $this->getFcdeclarOrCreate();
                        $this->updateFcdeclarFromRequest();
                        $this->setVars();
                        $this->labels = $this->getLabels();
                        $this->configGridactcom();
                        break;
                }
            }

          }else{
              $javascript="alert('La Licencia no existe'); $('fcdeclar_numref').value=''; $('fcdeclar_numref').focus();";
              $this->fcdeclar = $this->getFcdeclarOrCreate();
              $this->updateFcdeclarFromRequest();
              $this->setVars();
              $this->labels = $this->getLabels();
              $this->configGridactcom();
          }

          $output = '[["fcdeclar_fecini","'.$dato1.'",""],["fcdeclar_feccie","'.$dato2.'",""],["'.$cajtexmos.'","'.$nomnegocio.'",""],["fcdeclar_destiplic","'.$destiplic.'",""], ["fcdeclar_numlic","'.$numlic.'",""],["fcdeclar_rifcon","'.$rifcon.'",""], ["fcdeclar_nomcon","'.$nomcon.'",""], ["fcdeclar_dircon","'.$dircon.'",""],["fcdeclar_capitalsoc","'.$capsoc.'",""],["fcdeclar_anodec","'.$anodeclar.'",""], ["fcdeclar_rifrep","'.$rifrep.'",""], ["fcdeclar_nomconsol","'.$nomconrep.'",""], ["fcdeclar_dirconsol","'.$dirconrep.'",""],["fcdeclar_estacion","'.$stacion.'",""],["fcdeclar_fundec","'.$fundec.'",""],["fcdeclar_primeravez","'.$primeravez2.'",""], ["javascript","'.$javascript.'",""]]' ;
        break;
        case '2':
            $sw=true;
            if (strlen($codigo)!=4)
          {  $dato1=""; $dato2="";
               $javascript="alert_(El Año es Inv&aacute;lido); $('fcdeclar_anodec').value=''; $('fcdeclar_anodec').focus();";
          }else {
              $lafuente=H::getX_vacio('CODEMP','Fcdefins','Codpic','001');
              $dato1=''; $dato2='';
              $r= new Criteria();
              $r->add(FcfueprePeer::CODFUE,$lafuente);
              $reg= FcfueprePeer::doSelectOne($r);
              if ($reg)
              {
                  if ($reg->getFecest()!="")
                  {
                      $dato1="01/01/".$codigo;
                      $dato2="31/12/".$codigo;
                  }else {
                      $dato1="01/01/".$codigo;
                      $dato2="31/12/".$codigo;
                  }
              }else {
                  $dato1="01/01/".$codigo;
                  $dato2="31/12/".$codigo;
              }
          }
          if ($dato2!="")
              $javascript="$('fcdeclar_feccie').focus();";
          $output = '[["fcdeclar_fecini","'.$dato1.'",""],["fcdeclar_feccie","'.$dato2.'",""],["javascript","'.$javascript.'",""]]';
          break;
       case '4':
            $numref = $this->getRequestParameter('numref','');
            $anodec = $this->getRequestParameter('anodec','');
            $numdec = $this->getRequestParameter('numdec','');
            $id = $this->getRequestParameter('id','');
            $modo = $this->getRequestParameter('modo','');
            $this->ajaxs='1';
            $arreglo=array();
            $stacion = H::getX_vacio('NUMLIC','Fcsollic','Estser',$numref);
            $this->fcdeclar = $this->getFcdeclarOrCreate();
            $this->updateFcdeclarFromRequest();
            $this->setVars();
            $this->labels = $this->getLabels();
            Hacienda::cargarActComplementarias(false,$id,$numref,$anodec,$modo,$numdec,$stacion,$arreglo);
            $this->configGridactcom('', '', '', $arreglo);
            $output = '[["javascript","'.$javascript.'",""]]';
           break;
      default:
          $this->fcdeclar = $this->getFcdeclarOrCreate();
          $this->updateFcdeclarFromRequest();
          $this->setVars();
          $this->labels = $this->getLabels();
          $this->ajax='3';
          $arredet=array();
          $this->configGridactcom();
          $gridActCom = Herramientas::CargarDatosGridv2($this,$this->obj);

          $fecini=$this->getRequestParameter('fcdeclar[fecini]');
          $feccie=$this->getRequestParameter('fcdeclar[feccie]');
          $dateFormat = new sfDateFormat('es_VE');
           $fec1 = $dateFormat->format($fecini, 'i', $dateFormat->getInputPattern('d'));
          $dateFormat = new sfDateFormat('es_VE');
           $fec2 = $dateFormat->format($feccie, 'i', $dateFormat->getInputPattern('d'));
           $nuevo=$this->getRequestParameter('id');
           $modo=$this->getRequestParameter('fcdeclar[modo]');
           $numref=$this->getRequestParameter('fcdeclar[numref]');
           $anodec=$this->getRequestParameter('fcdeclar[anodec]');
           $numerodec=$this->getRequestParameter('fcdeclar[numdec]');
           $com='';
           if ($this->getRequestParameter('fcdeclar[primeravez]')=='S')
             $primeravez=true;
           else
               $primeravez=false;
           $steser=H::getX_vacio('NUMLIC','Fcsollic','Estser',$numref);
           if ($steser=='N'){
             $stacion=false;
           }else{
             $stacion=true;}
          if ($fec1<=$fec2)
          {
              $this->params[11]=$fec1;
              $this->params[12]=$fec2;
              Hacienda::cargarActComplementarias($primeravez,$nuevo,$numref,$anodec,$modo,$numerodec,$stacion,$arreglo);
              $this->configGridactcom('', '', '', $arreglo);
              $javascript=$javascript." new Ajax.Updater('divgriddisdeu',getUrlModulo()+'ajaxgrid', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:Form.serialize(document.getElementById('sf_admin_edit_form'))});";
              }else {
              $this->configGridactcom('', '', '', $arredet);
              $javascript="alert('La Fecha de Inicio no puede ser mayor a la fecha de Vencimiento'); $('fecdeclar_fecini').value=''; $('fecdeclar_feccie').value=''; $('fecdeclar_fecini').focus();";
          }

           $output = '[["javascript","'.$javascript.'",""],["","",""],["","",""]'.$com.']';
           break;
    }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    if ($sw) return sfView::HEADER_ONLY;
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
        $this->fcdeclar = $this->getFcdeclarOrCreate();
        $this->updateFcdeclarFromRequest();
       $this->configGridactcom();
       $gridacteco = Herramientas::CargarDatosGridv2($this,$this->obj);

       $resp = Hacienda::validarFacpicliq($this->facpicliq,$gridacteco);

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
    $this->setVars();
    $this->configGridactcom();
    $this->configGriddisdeu();

    $gridActCom = Herramientas::CargarDatosGridv2($this,$this->obj);
    $gridDisDeu = Herramientas::CargarDatosGridv2($this,$this->obj2);

  }

  public function saving($clasemodelo)
  {
   $error=-1;
    $gridActCom = Herramientas::CargarDatosGridv2($this,$this->obj);
    $gridDisDeu = Herramientas::CargarDatosGridv2($this,$this->obj2);
    $this->setVars();
    if (Hacienda::declaracionUnica($clasemodelo->getNumref(), $clasemodelo->getModo(), substr($clasemodelo->getFecdec(),6,4), $this->params[0], $this->params[1]))
    {
       $error= Hacienda::salvarFacpicliqComp($clasemodelo, $gridActCom, $gridDisDeu);
    }
    return  $error;
  }

  public function deleting($clasemodelo)
  {
        $c= new Criteria();
        $c->add(FcdecpagPeer::NUMDEC, $clasemodelo->getNumdec());
        $reg= FcdecpagPeer::doSelectOne($c);
        if ($reg)
        {
            return 747;
        }else {

          $c= new Criteria();
          $c->add(FcactpicPeer::NUMDOC,$clasemodelo->getNumdec());
          $c->add(FcactpicPeer::ANODEC,$clasemodelo->getAnodec());
          $c->add(FcactpicPeer::MODO,$clasemodelo->getModo());
          FcactpicPeer::doDelete($c);

          Herramientas::EliminarRegistro('Fcdeclar','Numdec',$clasemodelo->getNumdec());
        }

        return -1;
  }
  public function executeAjaxgrid() {
        $name = $this->getRequestParameter('grid', 'a');
        $grida = $this->getRequestParameter('grid'.$name,'');
        $nuevo= $this->getRequestParameter('id','');
        $fila = $this->getRequestParameter('fila','');
        $col = $this->getRequestParameter('columna', '');
        $numerodec=$this->getRequestParameter('fcdeclar[numdec]');
        $fecdec=$this->getRequestParameter('fcdeclar[fecdec]');
        $modo=$this->getRequestParameter('fcdeclar[modo]');
        $fecini=$this->getRequestParameter('fcdeclar[fecini]');
        $feccie=$this->getRequestParameter('fcdeclar[feccie]');
        $nuevo=$this->getRequestParameter('fcdeclar[nuevo]');
        $anodec=$this->getRequestParameter('fcdeclar[anodec]');
        $stacion=$this->getRequestParameter('fcdeclar[estacion]');
        $dateFormat = new sfDateFormat('es_VE');
        $fec3 = $dateFormat->format($fecdec, 'i', $dateFormat->getInputPattern('d'));
        $grid=array();$sw=false;
        $javascript='';
        $jsonextra='';
        $montcom=0;$com="";
      if ($this->getRequestParameter('fcdeclar[primeravez]')=='S'){
         $primeravez=true;
         }else{
           $primeravez=false;
           }
          $this->fcdeclar = $this->getFcdeclarOrCreate();
          $this->updateFcdeclarFromRequest();
          $this->setVars();
          $this->labels = $this->getLabels();
            switch ($name) {
                  //Grid Actividad
                  case 'a':
                        switch ($col) {
                            case '1':
                              if (!Hacienda::Repetido($grida,$grida[$fila][$col-1],$fila,$col-1))
                                 {
                                if($grida[$fila][0]!=''){

                                  $grida[$fila][7]='C';
                                Hacienda::recalcularActComp($primeravez, $nuevo, $anodec, $grida,$stacion);
                                $javascript." calcularTotales();";
                                 if ($modo=='E'){
                                Hacienda::calculoDecActComp($primeravez,$numerodec,$this->params,$fec3,$grida,$modo,$grid,$montcom);
                                $this->configGriddisdeu($grid);
                               }else{
                                   $fuenteaju=$this->params[1];
                                    if($fuenteaju!=''){
                                    Hacienda::calcularAjusteActCompl($fecini,$feccie,$this->params,$grida,$grid,$anodec);
                                   $this->configGriddisdeu($grid);

                                   }else{
                                       $javascript="alert('El Ajuste no puede ser creado. Falta la asociación de la Fuente de Ingreso del Ajuste en Definiciones de la Institución');";
                                       $this->configGriddisdeu();
                                   }
                               }}else{
                                    $this->configGriddisdeu();
                                       }
                              }else {
                                  $grid[$fila][$col-1]="";
                                  $grid[$fila][1]="";
                                  $this->configGriddisdeu();
                                 $javascript="alert('La Actividad Comercial esta Repetida');";
                              }
                                 $com=',["fcdeclar_montoimp","' . $montcom . '",""]';
                                break;
                            case '3'||'6':
                                    if($grida[$fila][0]!=''){
                                        Hacienda::recalcularActComp($primeravez, $nuevo, $anodec, $grida,$stacion);
                                        $javascript." calcularTotales();";
                                         if ($modo=='E'){
                                        Hacienda::calculoDecActComp($primeravez,$numerodec,$this->params,$fec3,$grida,$modo,$grid,$montcom);
                                        $this->configGriddisdeu($grid);
                                       }else{
                                           $fuenteaju=$this->params[1];
                                            if($fuenteaju!=''){
                                            Hacienda::calcularAjusteActCompl($fecini,$feccie,$this->params,$grida,$grid);
                                           $this->configGriddisdeu($grid);

                                           }else{
                                               $javascript="alert('El Ajuste no puede ser creado. Falta la asociación de la Fuente de Ingreso del Ajuste en Definiciones de la Institución');";
                                               $this->configGriddisdeu();
                                           }
                                       }}else{
                                            $this->configGriddisdeu();
                                       }
                                    break;
                             default:

                                   if ($modo=='E'){
                                       Hacienda::calculoDecActComp($primeravez,$numerodec,$this->params,$fec3,$grida,$modo,$grid,$montcom);
                                       $this->configGriddisdeu($grid);
                                   }else{
                                       $fuenteaju=$this->params[1];
                                        if($fuenteaju!=''){
                                        Hacienda::calcularAjusteActCompl($fecini,$feccie,$this->params,$grida,$grid);
                                       $this->configGriddisdeu($grid);

                                       }else{
                                           $javascript="alert('El Ajuste no puede ser creado. Falta la asociación de la Fuente de Ingreso del Ajuste en Definiciones de la Institución');";
                                           $this->configGriddisdeu();
                                       }
                                   }
                                     $com=',["fcdeclar_montoimp","' . $montcom . '",""]';
                             break;

                            }
                     break;
            }

           $jsonextra = '[["javascript","'.$javascript.'",""],["","",""],["","",""]'.$com.']';
        $output = Herramientas :: grid_to_json($grida, $name,$jsonextra);
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
         if($sw){
            return sfView::HEADER_ONLY;
         }

}
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->listing();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/fcdeclar/filters');


     // 15    // pager
    $this->pager = new sfPropelPager('Fcdeclar', 15);
    $c = new Criteria();
    $c->clearSelectColumns();
    $c->clearGroupByColumns();
    $c->Setdistinct();
    $c->addSelectColumn(FcdeclarPeer::NUMDEC);
    $c->addSelectColumn("'1937-01-01' AS FECVEN");
    $c->addSelectColumn('0 AS FUEING');
    $c->addSelectColumn(FcdeclarPeer::FECDEC);
    $c->addSelectColumn('0 AS RIFCON');
    $c->addSelectColumn('0 AS TIPO');
    $c->addSelectColumn(FcdeclarPeer::NUMREF);
    $c->addSelectColumn('0 AS NOMBRE');
    $c->addSelectColumn('0 AS MONDEC');
    $c->addSelectColumn('0 AS EDODEC');
    $c->addSelectColumn('0 AS MORA');
    $c->addSelectColumn('0 AS PRONTOPG');
    $c->addSelectColumn('0 AS AUTLIQ');
    $c->addSelectColumn('0 AS FENDEC');
    $c->addSelectColumn('0 AS CODREC');
    $c->addSelectColumn('0 AS MODO');
    $c->addSelectColumn('0 AS NUMERO');
    $c->addSelectColumn('0 AS CONPAG ');
    $c->addSelectColumn('0 AS MONABO');
    $c->addSelectColumn('0 AS NUMABO');
    $c->addSelectColumn('0 AS NOMCON');
    $c->addSelectColumn('0 AS OTRO');
    $c->addSelectColumn('0 AS MIGINC');
    $c->addSelectColumn('0 AS ANODEC');
    $c->addSelectColumn("'1937-01-01' AS FECULTPAG");
    $c->addSelectColumn("'1937-01-01' AS FECINI");
    $c->addSelectColumn("'1937-01-01' AS FECCIE");
    $c->addSelectColumn("'1937-01-01' AS EXIPAGUNI");
    $c->addSelectColumn('0 AS ID');

    $c->addJoin(FcdeclarPeer::NUMREF,FcsollicPeer::NUMLIC);
    $c->add(FcdeclarPeer::NUMDEC,'C%',Criteria::LIKE);
    $sql="FUEING IN(select CODPIC from FCDefIns)";
    $criterion=$c->getNewCriterion(FcdeclarPeer::FUEING,$sql,Criteria::CUSTOM);
    $sql2="FUEING IN(select codajupic from FCDefIns)";
    $criterion->addOr($c->getNewCriterion(FcdeclarPeer::FUEING,$sql2,Criteria::CUSTOM));
    $sql3="FUEING IN(select CODFUEGEN from fcfuentesmul)";
    $criterion->addOr($c->getNewCriterion(FcdeclarPeer::FUEING,$sql3,Criteria::CUSTOM));
    $c->addGroupByColumn(FcdeclarPeer::NUMDEC);
    $c->addGroupByColumn(FcdeclarPeer::FECDEC);
    $c->addGroupByColumn(FcdeclarPeer::NUMREF);
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

 protected function getFcdeclarOrCreate($id = 'id', $numdecl = 'numdecl')
  {
    if (!$this->getRequestParameter($numdecl))
    {
      $fcdeclar = new Fcdeclar();
    }
    else
    {
      $id=Herramientas::getX_vacio('NUMDEC', 'Fcdeclar', 'id', $this->getRequestParameter($numdecl));

      $fcdeclar = FcdeclarPeer::retrieveByPk($id);

      $this->forward404Unless($fcdeclar);
    }

    return $fcdeclar;
  }
public function executeDelete()
  {
    //$this->fcdeclar = FcdeclarPeer::retrieveByPk($this->getRequestParameter('id'));
    $t= new Criteria();
    $t->add(FcdeclarPeer::NUMDEC,$this->getRequestParameter('numdecl'));
    $this->fcdeclar= FcdeclarPeer::doSelectOne($t);

    $id= $this->fcdeclar->getId();

    $this->forward404Unless($this->fcdeclar);

    try
    {
      $this->deleteFcdeclar($this->fcdeclar);
      $this->SalvarBitacora($id ,'Elimino');
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'No se pudo borrar la registro seleccionado. Asegúrese de que no tiene ningún tipo de registros asociados.');
      return $this->forward('facpicliqcom', 'list');
    }


    return $this->forward('facpicliqcom', 'list');
  }
}
