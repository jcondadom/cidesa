<?php

/**
 * facpicliq actions.
 *
 * @package    Roraima
 * @subpackage facpicliq
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 52085 2013-06-03 16:44:29Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class facpicliqActions extends autofacpicliqActions
{
  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
  	$this->setVars();
    if ($this->fcdeclar->getId())
        $this->fcdeclar->setPrimeravez('N');
    $this->configGridactcom($this->fcdeclar->getNumref(),$this->fcdeclar->getAnodec(),$this->fcdeclar->getModo());
   $this->configGriddisdeu();
  }

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
    $c->addSelectColumn('0 AS EXIPAGUNI');
    $c->addSelectColumn('0 AS ID');
    $c->addJoin(FcdeclarPeer::NUMREF,FcsollicPeer::NUMLIC);
    $c->add(FcdeclarPeer::NUMDEC,'C%',Criteria::NOT_LIKE);
    $c->addGroupByColumn(FcdeclarPeer::NUMDEC);
    $c->addGroupByColumn(FcdeclarPeer::FECDEC);
    $c->addGroupByColumn(FcdeclarPeer::NUMREF);
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
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
          return $this->forward('facpicliq', 'list');
        }
    }else {
        $this->getRequest()->setError('valida', 'Debe Registrar las Definiciones de la Institución.');
        return $this->forward('facpicliq', 'list');
    }

    return $this->forward('facpicliq', 'edit');
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
	$this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/facpicliq/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_fcactacom_edit');
        $this->columnas[0]->setEliminar(true,'Recalcular()');

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
           $fcdeclar2->setNumero($i);
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

	$this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/facpicliq/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_disdeu_edit');

    $this->obj2 = $this->columnas[0]->getConfig($reg);
    $this->fcdeclar->setGriddisdeu($this->obj2);
  }


  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $javascript=''; $sw=false;$destiplic=''; $com="";

    switch ($ajax){
      case '1':
        $DecCerrada = false;
        $fecha = $this->getRequestParameter('fecdec','');
        $numerodec = $this->getRequestParameter('numdec','');
        $nuevo = $this->getRequestParameter('nuevo','');
        $dateFormat = new sfDateFormat('es_VE');
        $fecdec = $dateFormat->format($fecha, 'i', $dateFormat->getInputPattern('d'));
        $rifcon=''; $nomcon=''; $dircon=''; $capsoc=''; $nomnegocio='';
        $rifrep=''; $nomconrep=''; $dirconrep=''; $anodeclar=''; $station='';
        $numlic=''; $fundec=''; $primeravez2='S';$stacion='';
        $this->ajaxs='1';

      $c=new Criteria();
      $c->add(FcsollicPeer::STALIC, 'V');
      $c->add(FcsollicPeer::NUMLIC, $codigo);
      $fcsollic = FcsollicPeer::doSelectOne($c);
      if ($fcsollic)
      {
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
                                $sql = "Select AnoDec as Fecano, Modo as modo from FCDeclar where Numref='".$codigo."' and (modo='D' or modo='E') ORDER BY AnoDec DESC,modo desc";
                                if (Herramientas::BuscarDatos($sql,$result))
                                {
                                    if ($result[0]["fecano"]!="")
                                    {
                                        $primeravez=false;
                                        $primeravez2='N';
                                        $modo=$result[0]["modo"];
                                        if ($modo=='D' || $modo=='A')
                                        {
                                            $anodeclar= (float)$result[0]["fecano"];
                                            $javascript = $javascript.', '."$('fcdeclar_modo_D').checked = true; $('fcdeclar_anodec').readOnly=true;";  //Tipo de Declaración
                                            $modo='D';
                                        }else {
                                            $anodeclar= $result[0]["fecano"]+1;
                                            $javascript = $javascript.', '."$('fcdeclar_modo_E').checked = true; $('fcdeclar_anodec').readOnly=true;";  //Tipo de Declaración
                                            $modo='E';
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
                            Hacienda::cargarActividadesComerciales($primeravez,$codigo,$anodeclar,$numerodec,$modo,$stacion,$nuevo,$arreglo,$totexe,$fecdec);
                            $this->configGridactcom('', '', '', $arreglo);


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
            }else {
                $javascript="alert('La Licencia no existe'); $('fcdeclar_numref').value=''; $('fcdeclar_numref').focus();";
                $this->fcdeclar = $this->getFcdeclarOrCreate();
                $this->updateFcdeclarFromRequest();
                $this->setVars();
                $this->labels = $this->getLabels();
                $this->configGridactcom();
            }
            $sw=true;
            $output = '[["'.$cajtexmos.'","'.$nomnegocio.'",""],["fcdeclar_destiplic","'.$destiplic.'",""], ["fcdeclar_numlic","'.$numlic.'",""],["fcdeclar_rifcon","'.$rifcon.'",""], ["fcdeclar_nomcon","'.$nomcon.'",""], ["fcdeclar_dircon","'.$dircon.'",""],["fcdeclar_capitalsoc","'.$capsoc.'",""],["fcdeclar_anodec","'.$anodeclar.'",""], ["fcdeclar_rifrep","'.$rifrep.'",""], ["fcdeclar_nomconsol","'.$nomconrep.'",""], ["fcdeclar_dirconsol","'.$dirconrep.'",""],["fcdeclar_estacion","'.$stacion.'",""],["fcdeclar_fundec","'.$fundec.'",""],["fcdeclar_primeravez","'.$primeravez2.'",""], ["javascript","'.$javascript.'",""]]' ;
        break;
      case '2':
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
      case '3':
          $fecha = $this->getRequestParameter('fecha','');
          $javascript="";
          $dato2=""; $dato1="";
          if ($codigo=='E')
          {
               if ($fecha=="")
               {
                   $dato1="01/01/".substr($fecha,6,4);
                   $dato2="31/12/".substr($fecha,6,4);
               }
          }else {
              if ($fecha!="")
               {
                   $dato1="01/01/".substr($fecha,6,4);
                   $dato2="31/12/".substr($fecha,6,4);
               }
               $javascript="$('fcdeclar_anodec').readOnly=false;";
          }
          if ($dato2!="")
              $javascript.="$('fcdeclar_feccie').focus();";
          $output = '[["fcdeclar_fecini","'.$dato1.'",""],["fcdeclar_feccie","'.$dato2.'",""],["javascript","'.$javascript.'",""]]';
          break;
      case '4':
            $numref = $this->getRequestParameter('numref','');            
            //$anodec = $this->getRequestParameter('anodec','');
            $anodec = substr($this->getRequestParameter('fechadec',''),6,4);
            $numdec = $this->getRequestParameter('numdec','');
            $modo = $this->getRequestParameter('modo','');
            $this->ajaxs='1';
            $stacion = H::getX_vacio('NUMLIC','Fcsollic','Estser',$numref);
            $dateFormat = new sfDateFormat('es_VE');
            $fecdeclara = $dateFormat->format($this->getRequestParameter('fechadec',''), 'i', $dateFormat->getInputPattern('d'));
            $this->fcdeclar = $this->getFcdeclarOrCreate();
            $this->updateFcdeclarFromRequest();
            $this->setVars();
            $this->labels = $this->getLabels();
            $numsol=H::getX_vacio('NUMLIC','Fcsollic','Numsol',$numref);
            Hacienda::cargarActividadesComerciales(false,$numsol,$anodec,$numdec,$modo,$stacion,'S',$arreglo,$totexe,$fecdeclara);
            $this->configGridactcom('', '', '', $arreglo);
            $sw=true;
            $output = '[["javascript","'.$javascript.'",""]]';
            break;
       case '5':
               $this->fcdeclar = $this->getFcdeclarOrCreate();
               $this->updateFcdeclarFromRequest();
               $this->setVars();
               $this->labels = $this->getLabels();
               $this->ajaxs='5';
               $sw=true;

                $d0=$this->getRequestParameter('d0','');
                $d1=$this->getRequestParameter('d1','');
                $d2=$this->getRequestParameter('d2','');
                $d3=$this->getRequestParameter('d3','');
                $d4=$this->getRequestParameter('d4','');
                $d5=$this->getRequestParameter('d5','');
                $d6=$this->getRequestParameter('d6','');
                $deuda= array();
               $deuda[1]["numero"]=$d0;
               $deuda[1]["fecven"]=$d1;
               $deuda[1]["nombre"]=$d2;
               $deuda[1]["tipo"]=$d3;
               $deuda[1]["mondec"]=$d4;
               $deuda[1]["edodecstatus"]=$d5;
               $deuda[1]["fueing"]=$d6;
               $deuda[1]["id"]="9";
               $this->configGriddisdeu($deuda);
               $output = '[["","",""],[["","",""],[["","",""]]';
           break;
      default:
          $this->fcdeclar = $this->getFcdeclarOrCreate();
          $this->updateFcdeclarFromRequest();
          $this->setVars();
          $this->labels = $this->getLabels();
          $this->ajaxs='1';
          $arredet=array();
          $this->configGridactcom();
          $gridActCom = Herramientas::CargarDatosGridv2($this,$this->obj);

          $fecini=$this->getRequestParameter('fcdeclar[fecini]');
          $feccie=$this->getRequestParameter('fcdeclar[feccie]');
          if ($fecini!='' && $feccie!='') {
          $dateFormat = new sfDateFormat('es_VE');
           $fec1 = $dateFormat->format($fecini, 'i', $dateFormat->getInputPattern('d'));
          $dateFormat = new sfDateFormat('es_VE');
           $fec2 = $dateFormat->format($feccie, 'i', $dateFormat->getInputPattern('d'));
           $nuevo=$this->getRequestParameter('id');
           $modo=$this->getRequestParameter('fcdeclar[modo]');
           $numref=$this->getRequestParameter('fcdeclar[numref]');
           $anodec=$this->getRequestParameter('fcdeclar[anodec]');
           $fechadec=$this->getRequestParameter('fcdeclar[fecdec]');
           $dateFormat = new sfDateFormat('es_VE');
           $fechadeclara = $dateFormat->format($fechadec, 'i', $dateFormat->getInputPattern('d'));
           $numerodec=$this->getRequestParameter('fcdeclar[numdec]');
           $com='';
           if ($this->getRequestParameter('fcdeclar[primeravez]')=='S')
             $primeravez=true;
           else
               $primeravez=false;
           $steser=H::getX_vacio('NUMLIC','Fcsollic','Estser',$numref);
           if ($steser=='N')
             $stacion=false;
           else
             $stacion=true;
          if ($fec1<=$fec2)
          {
              $this->params[11]=$fec1;
              $this->params[12]=$fec2;
              $numsol=H::getX_vacio('NUMLIC','Fcsollic','Numsol',$numref);
              Hacienda::cargarActividadesComerciales($primeravez,$numsol,$anodec,$numerodec,$modo,$stacion,$nuevo,$arreglo,$totexe,$fechadeclara);

              if ($modo=='E'){ // || $nuevo==''){ /// Funcion CalcularDeclaracion Distribución de la Deuda o Funcion Calcular Multas  Distribucion Deudas
                $javascript=$javascript." new Ajax.Updater('divgriddisdeu',getUrlModulo()+'grid', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:Form.serialize(document.getElementById('sf_admin_edit_form'))});";
              }else  {
              //CalcularAjustes  Actividades Comerciales
                $fuenteaju=$this->params[1];
                $fecha_aux=split("/",$fecini);
                $fecha_aux2=split("/",$feccie);
                if ($fuenteaju!="" && checkdate(intval($fecha_aux[1]),intval($fecha_aux[0]),intval($fecha_aux[2])) && checkdate(intval($fecha_aux2[1]),intval($fecha_aux2[0]),intval($fecha_aux2[2])))
	    {
                    $feciniaux=$fec1;
                    $feccieaux=$fec2;
                    $declaraciontotal=0;
                    $impuestototal=0;
                    $montoajuste=0;
                    $y=0;
                    while ($y<count($arreglo))
                    {
                        $declaraciontotal=H::toFloat($arreglo[$y]["monact"]);
                        $c= new Criteria();
                        $c->add(FcactpicPeer::CODACT,$arreglo[$y]["codact"]);
                        $c->add(FcactpicPeer::ANODEC,$anodec);
                        $c->add(FcactpicPeer::NUMDOC,$numref);
                        $c->add(FcactpicPeer::MODO,'E');
                        $result= FcactpicPeer::doSelectOne($c);
                        if ($result)
                        {
                          if (($declaraciontotal-$result->getMonact())!=0)
                          {
                              $calculo1=$declaraciontotal*$result->getMonexo()/$result->getMonact();
                              $arreglo[$y]["monexo"]=number_format($calculo1,2,',','.');
                              $calculo2=$declaraciontotal*$result->getMonreb()/$result->getMonact();
                              $arreglo[$y]["monreb"]=number_format($calculo2,2,',','.');

                              $decante=  Hacienda::calcularDeclaracionAnterior(H::toFloat($result->getMonact()),$arreglo[$y]["codact"],$numref,$anodec);
                              $impuestototal= $decante-$result->getMonexo()-$result->getMonreb();
                              $montoajuste= $montoajuste + ((H::toFloat($arreglo[$y]["monbru"])-H::toFloat($arreglo[$y]["monexo"])-H::toFloat($arreglo[$y]["monreb"]))-$impuestototal);
				}
			}
                        $y++;
	    }
                    ///Ajuste Grid de Deudas
                    $d0=""; $d1=""; $d2=""; $d3=""; $d4=""; $d5=""; $d6="";
                    if  ($this->params[4]=='I')
                      $d1=date('d/m/Y', strtotime(Herramientas::dateAdd('d',$this->params[5],$feciniaux,'+')));
                    else
                      $d1=date('d/m/Y', strtotime(Herramientas::dateAdd('d',$this->params[5],$feccieaux,'+')));
                    $d2="Ajuste a Declaración del Año ".$anodec;
                    $d3="AJU";
                    $d4=number_format($montoajuste,2,',','.');
                    //if ($montoajuste!=0) 
                    $d5="VENCIDA";
                    //else $d5="PAGADA";
                    $d6=$fuenteaju;
                    $d0="01";
                     $javascript=$javascript." new Ajax.Updater('divgriddisdeu', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=5&d0=".$d0."&d1=".$d1."&d2=".$d2."&d3=".$d3."&d4=".$d4."&d5=".$d5."&d6=".$d6."'});";
                    //$javascript.=" calcularTotales();";
                   // $com=',["bx_0_1","' . $d0 . '",""],["bx_0_2","' . $d1 . '",""],["bx_0_3","' . $d2 . '",""],["bx_0_4","' . $d3 . '",""],["bx_0_5","' . $d4 . '",""],["bx_0_6","' . $d5 . '",""],["bx_0_7","' . $d6 . '",""]';
                }
            }
            $this->configGridactcom('', '', '', $arreglo);
          }else {
              $this->configGridactcom('', '', '', $arredet);
              $javascript="alert('La Fecha de Inicio no puede ser mayor a la fecha de Vencimiento'); $('fecdeclar_fecini').value=''; $('fecdeclar_feccie').value=''; $('fecdeclar_fecini').focus();";
          }
        }else {
          $this->configGridactcom();
        }
            $sw=true;
        $output = '[["javascript","'.$javascript.'",""],["","",""],["","",""]'.$com.']';

    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    if (!$sw) return sfView::HEADER_ONLY;

	    }

    /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxgrid()
  {
    $name = $this->getRequestParameter('grid','a');
    $grid = $this->getRequestParameter('grid'.$name,'');
    $anodec= $this->getRequestParameter('fcdeclar_anodec','');
    $fecini= $this->getRequestParameter('fcdeclar_fecini','');
    $feccie= $this->getRequestParameter('fcdeclar_feccie','');
    $fechadec= $this->getRequestParameter('fcdeclar_fecdec','');
    $anodedec=substr($fechadec, 6,4);
    $modo= $this->getRequestParameter('fcdeclar_modo_D','');
    if ($modo!='false')
        $modo='D';
    else
        $modo='E';
    $numref= $this->getRequestParameter('fcdeclar_numref','');
    $primeravez= $this->getRequestParameter('fcdeclar_primeravez','');
    $nuevo= $this->getRequestParameter('id','');
    $fila = $this->getRequestParameter('fila','');
    $col = $this->getRequestParameter('columna', '');
    $javascript="";  $jsonextra=""; $com='';
    $this->setVars();
    $steser=H::getX_vacio('NUMLIC','Fcsollic','Estser',$numref);
    if ($steser=='N')
     $stacion=false;
    else
     $stacion=true;

    switch ($col) {
          case '1':
          case '3':
          case '6':
            ///Función Recalcular
          if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col))
          {
            $j=0;
            while ($j<count($grid))
            {
              if ($primeravez=='N')
              {
                  if ($nuevo=='')
                      $anodeclar=(integer)$anodec;//NO ME SIRVE ASI
                  else
                      $anodeclar=(integer)$anodec;
              }else $anodeclar=(integer)$anodec;

             /* $sql3="select a.codact as codact, a.desact as desact, (a.mintri*b.valunitri) as mintri, a.afoact as alicuota, (CASE when a.minofac='F' then 'Factor'
                    else 'Minimo' end) as minfac, (CASE when a.exoner='S' then 'SI' else 'NO' end) as exonerable
                    from fcactcom a, fcdefins b where
                    a.codact='".$grid[$j][0]."' and a.anoact='".$anodeclar."'";*/
                     $dateFormat = new sfDateFormat('es_VE');
                $fecha1 = $dateFormat->format($fechadec, 'i', $dateFormat->getInputPattern('d'));

              if ($modo == 'E') {
                $sql3 = "select a.codact as codact, a.desact as desact, (a.mintri*b.valorut) as mintri, a.afoact as alicuota, (CASE when a.minofac='F' then 'Factor'
                            else 'Minimo' end) as minfac, (CASE when a.exoner='S' then 'SI' else 'NO' end) as exonerable, (CASE when a.bascan='S' then 'SI' else 'NO' end) as cantidad
                            from fcactcom a, fcdefut b where
                            a.codact='" . $grid[$j][0] . "' and a.anoact='" . $anodedec . "' and b.fecini<='" . $fecha1 . "' and b.fecfin>='" . $fecha1 . "'";
               }else {
                  $sql3="select a.codact as codact, a.desact as desact, (a.mintri*b.valorut) as mintri, a.afoact as alicuota,
                          (CASE when a.minofac='F' then 'Factor' else 'Minimo' end) as minfac,
                          (CASE when a.exoner='S' then 'SI' else 'NO' end) as exonerable, (CASE when a.bascan='S' then 'SI' else 'NO' end) as cantidad
                          from fcactcom a, fcdefut b, fcactpic c, fcdeclar d
                          where a.codact='" . $grid[$j][0] . "' and c.numdoc='" . $numref . "' and c.anodec='".$anodeclar."' and c.modo='E' and b.fecini<=d.fecdec and b.fecfin>=d.fecdec
                          and a.codact=c.codact and a.anoact=c.anodec and c.numdoc=d.numref and c.anodec=d.anodec and c.modo=d.modo
                          group by a.codact, a.desact, a.afoact, a.bascan,a.mintri,b.valorut, minfac, exonerable";
                }
              if (Herramientas::BuscarDatos($sql3,$result3))
              {
                 $unidad=H::getX_vacio('CODEMP','Fcdefins','unipic','001');
                     if ($unidad=='B')
                     {
                         $monacomparar=$result3[0]["mintri"];
                     }else {
                         $monacomparar=$result3[0]["mintri"];
                     }
                     $pordec=1;
                     if ($stacion)
                         $factser=1;
                     else
                         $factser=1;
                      if ($result3[0]["minfac"]=='Factor')
                      {
                          $calculo=H::toFloat($grid[$j][2])*$pordec*$factser*$result3[0]["alicuota"];
                          $grid[$j][3]= number_format($calculo,2,',','.');
                      }else {
                          $calculo=H::toFloat($grid[$j][2])*$pordec*$factser*$result3[0]["alicuota"]/100;
                          $grid[$j][3]= number_format($calculo,2,',','.');
                      }
                      /*if ($result3[0]["minfac"]=='Factor')
                      {
                          $calculo=H::toFloat($grid[$j][2])*$pordec*$result3[0]["alicuota"]/100;
                          $grid[$j][3]= number_format($calculo,2,',','.');
                      }else {
                          $calculo=H::toFloat($grid[$j][2])*$result3[0]["alicuota"]/100;
                          $grid[$j][3]= number_format($calculo,2,',','.');
                      }*/
                      if (H::toFloat($grid[$j][3]) <= $monacomparar) {
                          if ($result3[0]["cantidad"]=='SI')
                            $monacomparar=$monacomparar*H::toFloat($grid[$j][2]);
                        $grid[$j][3] = number_format($monacomparar, 2, ',', '.');
                      }
                      if ($result3[0]["exonerable"]=='SI')
                          $grid[$j][6]="0,00";
                      else {
                          $grid[$j][4]=$grid[$j][4];
                          $grid[$j][5]=$grid[$j][5];
                          $valor=H::toFloat($grid[$j][3])-H::toFloat($grid[$j][4])-H::toFloat($grid[$j][5]);
                          $grid[$j][6]=number_format($valor,2,',','.');
                      }
             }
              $j++;
            }
            if ($modo=='E' && $nuevo=='') /// Funcion CalcularDeclaracion Distribución de la Deuda
                $javascript=$javascript." new Ajax.Updater('divgriddisdeu',getUrlModulo()+'grid', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:Form.serialize(document.getElementById('sf_admin_edit_form'))});";
            else  {
              //CalcularAjustes  Actividades Comerciales
                $fuenteaju=$this->params[1];
                $dateFormat = new sfDateFormat('es_VE');
                $fec1 = $dateFormat->format($fecini, 'i', $dateFormat->getInputPattern('d'));
                $dateFormat = new sfDateFormat('es_VE');
                $fec2 = $dateFormat->format($feccie, 'i', $dateFormat->getInputPattern('d'));
                $fecha_aux=split("/",$fecini);
                $fecha_aux2=split("/",$feccie);
                if ($fuenteaju!="" && checkdate(intval($fecha_aux[1]),intval($fecha_aux[0]),intval($fecha_aux[2])) && checkdate(intval($fecha_aux2[1]),intval($fecha_aux2[0]),intval($fecha_aux2[2])))
                {
                    $feciniaux=$fec1;
                    $feccieaux=$fec2;
                    $declaraciontotal=0;
                    $impuestototal=0;
                    $montoajuste=0;
                    $y=0;
                    while ($y<count($grid))
                    {
                        $declaraciontotal=H::toFloat($grid[$y][2]);
                        $c= new Criteria();
                        $c->add(FcactpicPeer::CODACT,$grid[$y][0]);
                        $c->add(FcactpicPeer::ANODEC,$anodec);
                        $c->add(FcactpicPeer::NUMDOC,$numref);
                        $c->add(FcactpicPeer::MODO,'E');
                        $result= FcactpicPeer::doSelectOne($c);
                        if ($result)
                        {
                          if (($declaraciontotal-$result->getMonact())!=0)
                          {
                              $calculo1=$declaraciontotal*$result->getMonexo()/$result->getMonact();
                              $grid[$y][4]=number_format($calculo1,2,',','.');
                              $calculo2=$declaraciontotal*$result->getMonreb()/$result->getMonact();
                              $grid[$y][5]=number_format($calculo2,2,',','.');

                              $decante=  Hacienda::calcularDeclaracionAnterior(H::toFloat($result->getMonact()),$grid[$y][0],$numref,$anodec);
                              $impuestototal= $decante-$result->getMonexo()-$result->getMonreb();
                              $montoajuste= $montoajuste + ((H::toFloat($grid[$y][3])-H::toFloat($grid[$y][4])-H::toFloat($grid[$y][5]))-$impuestototal);
                          }
                        }
                        $y++;
                    }
                    ///Ajuste Grid de Deudas
                    $d0=""; $d1=""; $d2=""; $d3=""; $d4=""; $d5=""; $d6="";
                    if  ($this->params[4]=='I')
                      $d1=date('d/m/Y', strtotime(Herramientas::dateAdd('d',$this->params[5],$feciniaux,'+')));
                    else
                      $d1=date('d/m/Y', strtotime(Herramientas::dateAdd('d',$this->params[5],$feccieaux,'+')));
                    $d2="Ajuste a Declaración del Año ".$anodec;
                    $d3="AJU";
                    $d4=number_format($montoajuste,2,',','.');
                    //if ($montoajuste!=0) 
                    $d5="VENCIDA";
//                    else $d5="PAGADA";
                    $d6=$fuenteaju;
                    $d0="01";
                    //$javascript.=" calcularTotales();";
                    $com=',["bx_0_1","' . $d0 . '",""],["bx_0_2","' . $d1 . '",""],["bx_0_3","' . $d2 . '",""],["bx_0_4","' . $d3 . '",""],["bx_0_5","' . $d4 . '",""],["bx_0_6","' . $d5 . '",""],["bx_0_7","' . $d6 . '",""]';
                }

            }
          }else {
              $grid[$fila][$col-1]="";
              $grid[$fila][1]="";
             $javascript="alert('La Actividad Comercial esta Repetida');";
          }
          $javascript.=" calcularTotales();";
            $jsonextra = $com.',["javascript","' . $javascript . '",""]';
        break;
      default:
            break;
    }

    $output = Herramientas::grid_to_json($grid,$name,$jsonextra);
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::HEADER_ONLY;
  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeGrid()
  {
      $this->fcdeclar = $this->getFcdeclarOrCreate();
      $this->updateFcdeclarFromRequest();
      $this->setVars();
      $this->labels = $this->getLabels();
      $this->configGriddisdeu();
      $gridDisDeu = Herramientas::CargarDatosGridv2($this,$this->obj2);
      $javascript="";
      $js="";
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
       $fecdec=$this->getRequestParameter('fcdeclar[fecdec]');
       $dateFormat = new sfDateFormat('es_VE');
         $fec3 = $dateFormat->format($fecdec, 'i', $dateFormat->getInputPattern('d'));
       $com='';
       $montoimp=$this->getRequestParameter('fcdeclar[montoimp]');
       $montoexo=$this->getRequestParameter('fcdeclar[montoexo]');
       $montoreb=$this->getRequestParameter('fcdeclar[montoreb]');
       $montodcl=$this->getRequestParameter('fcdeclar[montodcl]');
       if ($this->getRequestParameter('fcdeclar[primeravez]')=='S')
         $primeravez=true;
       else
           $primeravez=false;
       $steser=H::getX_vacio('NUMLIC','Fcsollic','Estser',$numref);
       if ($steser=='N')
         $stacion=false;
       else
         $stacion=true;
        $grid=array();
       if ($modo=='E')
  {
          if ($nuevo!='')
	{
              $this->params[11]=date('Y-m').'-01';
              $sql="select coalesce(sum(a.monpag),0) as monpag from fcdecpag a, fcdefins b, fcpagos d
                where a.numdec='".$numerodec."' and a.numpag=d.numpag and d.edopag<>'A' and
                (a.fueing=b.codpic or a.fueing=b.codajupic)";
              if (Herramientas::BuscarDatos($sql,$result))
		{
                  $pagant=$result[0]["monpag"];
              }else $pagant=0;
          }else $pagant=0;
          $anocalculo=0;
          $decsinaju=0;
          $fechadia=date('Y-m-d');
          $fechault=false;
          $feccha1=date('d/m/Y',  strtotime($this->params[11]));
          $feccha2=date('d/m/Y',  strtotime($this->params[12]));
          //$numpor=Hacienda::CalPorcion($this->params[8], $feccha1, $feccha2); 
          $numpor=Hacienda::CalPorcion($this->params[8], $fec1, $fec2); //Solicitud AlcCarora
          $this->params[11]=$fec1;
          $this->params[12]=$fec2;
          if ($numpor==1)
             $filas=$numpor+1;
          else
             $filas=$numpor;
          if (date('d',strtotime($this->params[11]))==1)  $fechault=true;

          Hacienda::distribucionVencimientoActComerciales(($filas-1),$fec3,$this->params[8],$this->params,$grid);

          $j=1;
          $acum=0;
          while ($j<=($filas-1))
          {
             $porali=(H::toFloat($montoimp)+H::toFloat($montoexo)-H::toFloat($montoreb)) -$pagant;
             if ($numpor-1!=0) {
               $porali= $porali/($numpor-1);
		}
             $grid[$j]["mondec"]=number_format($porali,2,',','.');
             $grid[$j]["numero"]=str_pad($j,2,'0',STR_PAD_LEFT);
             $acum=$acum + H::toFloat($grid[$j]["mondec"]);
              $j++;
	}
        $montotot=(H::toFloat($montoimp)+H::toFloat($montoexo)-H::toFloat($montoreb)) -$pagant;
        $resta=H::toFloat($montotot)-$acum;
        if ($resta!=0) {
           $valor=H::toFloat($grid[$j-1]["mondec"]) + $resta;
           $grid[$j-1]["mondec"]=number_format($valor,2,',','.');
        }
        
          //$javascript=$javascript." calcularTotales();";
  }
       if ($nuevo=='')  //Calcular Multas
  {
          if ($modo=='E') {
              $sql2="select a.codmul as codmul, a.nommul as nommul, a.tipo as tipo, a.modo as modo, a.monpro as monpro, b.codfuegen as codfuegen
                    from fcmultas a, fcfuentesmul b
                    where a.tipo='A' and a.tipdec='E' and b.codfue='".$this->params[0]."' and a.codmul=b.codmul";
    }else {
              $sql2="select a.codmul as codmul, a.nommul as nommul, a.tipo as tipo, a.modo as modo, a.monpro as monpro, b.codfuegen as codfuegen
                    from fcmultas a, fcfuentesmul b
                    where a.tipo='A' and a.tipdec='D' and b.codfue='".$this->params[1]."' and a.codmul=b.codmul";
              if (Herramientas::BuscarDatos($sql2,$result2))
              {
                $z=0;
                while ($z<count($result2))
                {
                    if ($result2[$z]["modo"]=='I')
                    {
                       $t= new Criteria();
                       $t->add(FcsollicPeer::NUMLIC,$numref);
                       $reg= FcsollicPeer::doSelectOne($t);
                       if ($reg)
                          $fechacompara=$reg->getFecini();
                       else
                           $fechacompara=$fec1;
                    }else if ($result2[$z]["modo"]=='E') {
                        $t= new Criteria();
                       $t->add(FcfueprePeer::CODFUE,$this->params[0]);
                       $reg= FcfueprePeer::doSelectOne($t);
                       if ($reg)
                          $fechacompara=$reg->getFecest();
                       else
                           $fechacompara=$fec1;
                    }else if ($result2[$z]["modo"]=='D') {
                        $t= new Criteria();
                       $t->add(FcfueprePeer::CODFUE,$this->params[0]);
                       $reg= FcfueprePeer::doSelectOne($t);
                       if ($reg)
                          $fechacompara=$reg->getFeccie();
                       else
                           $fechacompara=$fec1;
      }else {
                        $fechacompra=$fec1;
        }
                    $declaraciontotal=H::toFloat($montodcl);
                    if ($anodec!="")
                    {
                        $fechaantigua=$anodec.substr($fechacompara,4,6);
                        while (H::bisiesto(substr($fechaantigua,0,4)))
                        {
                          $fechaantigua=substr($fechaantigua,0,6).str_pad(((int)substr($fechaantigua,7,2)-1),2,'0',STR_PAD_LEFT);
      }
                        $fechacompara=$fechaantigua;
    }
                    $dias=$fec3-$fechacompara;
                    $p= new Criteria();
                    $p->add(FcrangosmulPeer::CODMUL,$result2[$z]["codmul"]);
                    $p->add(FcrangosmulPeer::DIASDESDE,$dias,Criteria::LESS_EQUAL);
                    $p->add(FcrangosmulPeer::DIASHASTA,$dias,Criteria::GREATER_EQUAL);
                    $resu= FcrangosmulPeer::doSelectOne($p);
                    if ($resu)
                        $montoporc=$resu->getValor();
                    else
                        $montoporc=0;
                    if ($result2[$z]["monpro"]=='M')
                    {
                        if ($montoporc!=0)
                            $monto=$montoporc;
                        else
                            $monto=0;
                    }else  {
                       $monto=($declaraciontotal*$montoporc)/100;
                    }
                    if ($monto!=0)
                    {
                       $y=count($grid)+1;
                       $grid[$y]["numero"]=str_pad($y,2,'0',STR_PAD_LEFT);
                       $grid[$y]["fecven"]=date('d/m/Y',strtotime($fechacompara));
                       $grid[$y]["nombre"]=$result2[$z]["nommul"]." Año ".$anodec;
                       $grid[$y]["tipo"]="MUL";
                       $grid[$y]["mondec"]=number_format($monto,2,',','.');;
                       $grid[$y]["edodecstatus"]="VIGENTE";
                       $grid[$y]["fueing"]=$result2[$z]["codfuegen"];
                       $grid[$y]["id"]="9";
                       $js=" calcularTotalesSinRedondeo();";
                    }
                    $z++;
                }
                if ($js!="")
                    $javascript= $javascript.$js;
              }
          }
       }
       $this->configGriddisdeu($grid);

    $output = '[["javascript","'.$javascript.'",""],["","",""],["","",""]'.$com.']';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
  }

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
    $gridActCom = Herramientas::CargarDatosGridv2($this,$this->obj);
    $gridDisDeu = Herramientas::CargarDatosGridv2($this,$this->obj2);
    $this->setVars();
    if (Hacienda::declaracionUnica($clasemodelo->getNumref(), $clasemodelo->getModo(), substr($clasemodelo->getFecdec(),6,4), $this->params[0], $this->params[1]))
    {
       return Hacienda::salvarFacpicliq($clasemodelo, $gridActCom, $gridDisDeu);
    }
    return  -1;
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
      if ($clasemodelo->getModo()=='E') {
        $c= new Criteria();
        $c->add(FcactpicPeer::NUMDOC,$clasemodelo->getNumref());
        $c->add(FcactpicPeer::ANODEC,$clasemodelo->getAnodec());
        $c->add(FcactpicPeer::MODO,$clasemodelo->getModo());
        $registro= FcactpicPeer::doSelect($c);
        if ($registro)
        {
            foreach ($registro as $obj)
            {
                $obj->setModo(null);
                $obj->setAnodec(null);                  
                $obj->save();
            }
        }
    }else {
      $c= new Criteria();
      $c->add(FcactpicPeer::NUMDOC,$clasemodelo->getNumref());
      $c->add(FcactpicPeer::ANODEC,$clasemodelo->getAnodec());
      $c->add(FcactpicPeer::MODO,$clasemodelo->getModo());
      FcactpicPeer::doDelete($c);
    }

      Herramientas::EliminarRegistro('Fcdeclar','Numdec',$clasemodelo->getNumdec());
  }

    return -1;
  }

    /**
   * Retorna el registro del modelo del formulario
   * Identifica si es un registro nuevo o actual, y lo retorna
   *
   */
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
    if ($this->fcdeclar)
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
      return $this->forward('facpicliq', 'list');
    }


    return $this->forward('facpicliq', 'list');
  }

}
