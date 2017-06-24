<?php

/**
 * paggenretord actions.
 *
 * @package    Roraima
 * @subpackage paggenretord
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 45949 2011-09-19 22:25:09Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class paggenretordActions extends autopaggenretordActions
{
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

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/opordpag/filters');


     // 15    // pager
    $this->pager = new sfPropelPager('Opordpag', 15);
    $c = new Criteria();
    $this->sql="opordpag.status='N' and opordpag.numche is null and opordpag.numord not in (select numord from opretord)";
    $c->add(OpordpagPeer::NUMCHE,  $this->sql, Criteria::CUSTOM);
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }    
    
  /**
   * Función para colocar el codigo necesario en  
   * el proceso de edición.
   * Aquí se pueden buscar datos adicionales que necesite la vista
   * Esta función es parte de la acción executeEdit, que maneja tanto
   * el create como el edit del formulario.
   * Generalmente aqui se debe y puede colocar los llamados a los configGrid
   * Para generar la información de configuración de los grids.
   *
   */
  public function editing()
  {
  	$this->configGrid();
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid()
  {
    $this->configGridRet();
    $this->configGridOculRet($this->opordpag->getNumord());
    $this->configGridConsulRet($this->opordpag->getNumord());
    //$this->configGridFacturas($this->opordpag->getNumord());
    $this->configGridMovimientos($this->opordpag->getNumord());
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridRet()
  {
    $reg1=array();

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/paggenretord/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_ret');
	$params = array (
		'param1' => "'+$('opordpag_codigoprovee').value+'",
		'val2'
	);
    $objs=array('codtip' => 1, 'destip' => 2);
    $this->columnas[1][0]->setCatalogo('optipret', 'sf_admin_edit_form', $objs, 'Optipret_Paggenretord', $params);
    $this->columnas[1][0]->setHTML('type="text" size=5 maxlength=3 onBlur="javascript:event.keyCode=13; ajaxretencion(event,this.id);"');
    $this->columnas[1][3]->setHTML('type="text" size=10 onKeypress="modificar(event);"');
    $this->columnas[1][3]->setEsTotal(true,'opordpag_monret');

    $this->objret =$this->columnas[0]->getConfig($reg1);

    $this->opordpag->setObjret($this->objret);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridOculRet()
  {
    $reg2=array();

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/paggenretord/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_ocul_ret');

    $this->objoculret =$this->columnas[0]->getConfig($reg2);

    $this->opordpag->setObjoculret($this->objoculret);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridConsulRet($numord='')
  {
    $SQL1 = "select (CASE when a.numret!='NOASIGNA' THEN a.numret else '' END) as numret,a.codtip,b.destip,
    round(sum(a.monret)/ ( CASE when count(d.codret) <> 0 THEN count(d.codret)	else 1 END ),2 ) as montoret,
    (CASE when d.codret=a.codtip THEN 'S'	else 'N' END) as esta,
	(CASE when c.codret=a.codtip and c.codrep='002' THEN 'S' else 'N' END) as estaislr,
	(CASE when c.codret=a.codtip and c.codrep='003' THEN 'S' else 'N' END) as esta1xmil,
	b.porret,b.basimp,b.porsus,b.factor,b.unitri,1 as id, count(d.codret) as valor
	 from  optipret b,tsretiva d RIGHT outer join (opretord a left outer join tsrepret c on c.codret = a.codtip) on d.codret=a.codtip
	 where a.numord = '".$numord."' and a.codtip = b.codtip
	group by numret,a.codtip,b.destip,b.basimp,b.porret,b.factor,b.porsus,b.unitri,c.codrep,c.codret,d.codret";

	$resp = Herramientas::BuscarDatos($SQL1,&$reg5);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/paggenretord/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_ret_cons');

    $this->opordpag->setFilasconsret(count($reg5));

    $this->objconsulret =$this->columnas[0]->getConfig($reg5);

    $this->opordpag->setObjconsulret($this->objconsulret);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridFacturas($numord='', $arreglo1=array(), $arreglo2=array())
  {
    $sql="SELECT a.fecfac as fecfac, (CASE when a.tiptra='01' THEN a.numfac
	  else '' END) as numfac,a.numctr as numctr,(CASE when a.tiptra='02' THEN a.numfac
	  else '' END) as notdeb,(CASE when a.tiptra='03' THEN a.numfac
	  else '' END) as notcrd,tiptra as tiptra,facafe as facafe,poriva as poriva,totfac as totfac,exeiva as exeiva,
	  a.basimp as basimp,a.monret as monret,a.moniva as moniva,(CASE when a.basltf!=0 THEN 1
	  else 0 END) as unocien,a.basltf as basltf,a.porltf as porltf,a.monltf as monltf,(CASE when a.basislr!=0 THEN 1
	  else 0 END) as impusob,a.basislr as basislr,a.porislr as porislr,a.monislr as monislr,a.codislr as codislr, '0' as aliadi, a.rifalt as rifalt, b.nomben as nomben, a.observacion as observacion, a.id as id
	  from opfactur a left outer join opbenefi b on a.rifalt=b.cedrif where numord='".$numord."'";

    $resp = Herramientas::BuscarDatos($sql,&$reg3);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/paggenretord/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_fac');
    $this->columnas[1][1]->setHTML('type="text" size=15 maxlength=20 onBlur="javascript:event.keyCode=13; nrofacturadeshabilitar(event,this.id);"');
    $this->columnas[1][3]->setHTML('type="text" size=15 maxlength=20 onBlur="javascript:event.keyCode=13; debitodeshabilitar(event,this.id);"');
    $this->columnas[1][4]->setHTML('type="text" size=15 maxlength=20 onBlur="javascript:event.keyCode=13; creditodeshabilitar(event,this.id);"');
    $this->columnas[1][7]->setCombo($arreglo1);
    $this->columnas[1][8]->setJScript('calculototalfactura(id);');
    $this->columnas[1][8]->setEsTotal(true,'opordpag_totfac');
    $this->columnas[1][9]->setHTML('type="text" size=10 onKeypress="javascript:event.keyCode=13; totalizarexento(e,id); "');
    $this->columnas[1][10]->setEsTotal(true,'opordpag_totbas');
    $this->columnas[1][11]->setEsTotal(true,'opordpag_totiva');
    $this->columnas[1][12]->setEsTotal(true,'opordpag_totimp');
    $this->columnas[1][13]->setHTML('onClick="unoxmil(this.id)"');
    $this->columnas[1][14]->setHTML('type="text" size=10 onKeypress="javascript:event.keyCode=13; recalunoxmil(e,id); "');
    $this->columnas[1][14]->setEsTotal(true,'opordpag_totbasmil');
    $this->columnas[1][16]->setEsTotal(true,'opordpag_totmontmil');
    $this->columnas[1][17]->setHTML('onClick="islr(this.id)"');
    $this->columnas[1][18]->setHTML('type="text" size=10 onKeypress="javascript:event.keyCode=13; recalislr(e,id); "');
    $this->columnas[1][18]->setEsTotal(true,'opordpag_totbasislr');
    $this->columnas[1][19]->setCombo($arreglo2);
    $this->columnas[1][20]->setEsTotal(true,'opordpag_totmontislr');

    $this->objfac =$this->columnas[0]->getConfig($reg3);

    $this->opordpag->setObjfac($this->objfac);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridMovimientos($numord='')
  {
    $c = new Criteria();
    $c->add(OpdetordPeer::NUMORD,$numord);
    $reg4 = OpdetordPeer::doSelect($c);

    $this->opordpag->setFilasord(count($reg4));

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/paggenretord/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_mov');
    $this->columnas[1][0]->setHTML('onClick="totalmarcadas(this.id)"');
    $this->columnas[1][2]->setEsTotal(true,'opordpag_totmoncau');
    $this->columnas[1][3]->setEsTotal(true,'opordpag_totmonret');
    $this->columnas[1][4]->setEsTotal(true,'opordpag_totmondes');

    $this->objmov =$this->columnas[0]->getConfig($reg4);

    $this->opordpag->setObjmov($this->objmov);
  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');
    $javascript=""; $dato="";

    switch ($ajax){
      case '1':
        if ($this->getRequestParameter('codprovee')=="")
        {
          $t= new Criteria();
          $t->add(OptipretPeer::CODTIP,$codigo);
          $t->addJoin(OptipretPeer::CODTIP,CaproretPeer::CODRET);
          $result= OptipretPeer::doSelectOne($t);
          if ($result)
          {
            $dato=$result->getDestip();
            $esta=OptipretPeer::getEsta($codigo);
            $dato9=OptipretPeer::getEstaislr($codigo);
            $dato10=OptipretPeer::getEsta1xmil($codigo);
            $dato3=number_format(OptipretPeer::getDato($codigo,'Basimp'),2,',','.');
            $dato4=number_format(OptipretPeer::getDato($codigo,'Porret'),2,',','.');
            $dato5=number_format(OptipretPeer::getDato($codigo,'Factor'),4,',','.');
		    $dato6=number_format(OptipretPeer::getDato($codigo,'Porsus'),2,',','.');
		    $dato7=number_format(OptipretPeer::getDato($codigo,'Unitri'),2,',','.');
          }else {
          	$esta=""; $dato9=""; $dato10=""; $dato3=""; $dato4=""; $dato5=""; $dato6=""; $dato7="";
          	$javascript="alert('No Existen Tipos de Retención Asociados a este Beneficiario'); $('$cajtexcom').value=''; $('$cajtexmos').value=''; $('opordpag_presiono').value='S';";
          }
        }else {
          $t= new Criteria();
          $t->add(OptipretPeer::CODTIP,$codigo);
          $result= OptipretPeer::doSelectOne($t);
          if ($result)
          {
            $dato=$result->getDestip();
            $esta=OptipretPeer::getEsta($codigo);
            $dato9=OptipretPeer::getEstaislr($codigo);
            $dato10=OptipretPeer::getEsta1xmil($codigo);
            $dato3=number_format(OptipretPeer::getDato($codigo,'Basimp'),2,',','.');
            $dato4=number_format(OptipretPeer::getDato($codigo,'Porret'),2,',','.');
            $dato5=number_format(OptipretPeer::getDato($codigo,'Factor'),4,',','.');
		    $dato6=number_format(OptipretPeer::getDato($codigo,'Porsus'),2,',','.');
		    $dato7=number_format(OptipretPeer::getDato($codigo,'Unitri'),2,',','.');
          }else {
          	$esta=""; $dato9=""; $dato10=""; $dato3=""; $dato4=""; $dato5=""; $dato6=""; $dato7="";
          	$javascript="alert('El Tipo de Retención no existe'); $('$cajtexcom').value=''; $('$cajtexmos').value=''; $('opordpag_presiono').value='S';";
          }
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$this->getRequestParameter('esta').'","'.$esta.'",""],["javascript","'.$javascript.'",""],["'.$this->getRequestParameter('estaislr').'","'.$dato9.'",""],["'.$this->getRequestParameter('estaunomil').'","'.$dato10.'",""],["'.$this->getRequestParameter('basimp').'","'.$dato3.'",""],["'.$this->getRequestParameter('porret').'","'.$dato4.'",""],["'.$this->getRequestParameter('factor').'","'.$dato5.'",""],["'.$this->getRequestParameter('porsus').'","'.$dato6.'",""],["'.$this->getRequestParameter('unitri').'","'.$dato7.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;
      case '2':
        $sql="Select A.CODTIP as codtip,A.DesTip as destip,A.CODCON as codcon,A.BASIMP as basimp,A.PORRET as porret,B.UniTri as unitri,A.FACTOR as factor,A.PORSUS as porsus From OPTipRet A ,OPDEFEMP B Where A.CodTip='".$codigo."' AND B.CODEMP='001'";
        if (Herramientas::BuscarDatos($sql,&$result))
        {
          $c = new Criteria();
		  $c->add(TsrepretPeer::CODREP,'003');
		  $c->add(TsrepretPeer::CODRET,$codigo);
		  $datos = TsrepretPeer::doSelect($c);
		  if ($datos)
		  { $mil='S';} else { $mil='N';}
          $dato=$result[0]['codtip']."_".$result[0]['destip']."_".$result[0]['codcon']."_".$result[0]['basimp']."_".$result[0]['porret']."_".$result[0]['unitri']."_".$result[0]['factor']."_".$result[0]['porsus']."_".$mil;
        }else $dato="";
        $output = '[["opordpag_datosret","'.$dato.'",""],["","",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
       break;
      case '3':
        $javascript="distribuyeretenciones(); sumarretenciones();";
        $output = '[["javascript","'.$javascript.'",""],["","",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
       break;
      default:
        $this->opordpag = $this->getOpordpagOrCreate();
	  	$this->updateOpordpagFromRequest();
	  	$this->params=array();
	  	$this->labels = $this->getLabels();
	    if ($this->getRequestParameter('opordpag[incmod]')=="I")
	    {
	      $this->configGridRet();
	      $gridret = Herramientas::CargarDatosGridv2($this,$this->objret,true);
	      OrdendePago::facturar($this->getRequestParameter('opordpag[numord]'),"",$gridret,$this->getRequestParameter('opordpag[referencias2]'),&$eliva,&$elislr,&$eltimbre,&$msj,&$arreglo1,&$arreglo2);
	      if ($msj=='')
	      {
	        $this->configGridFacturas($this->getRequestParameter('opordpag[numord]'),$arreglo1,$arreglo2);
	        $output = '[["opordpag_eliva","'.$eliva.'",""],["opordpag_elislr","'.$elislr.'",""],["opordpag_eltimbre","'.$eltimbre.'",""],["javascript","'.$msj.'",""]]';
	        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	      }else
	      {
	        $output = '[["javascript","'.$msj.'",""]]';
	        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	        return sfView::HEADER_ONLY;
	      }
	    }
	    else
	    {
	      $this->configGridConsulRet($this->getRequestParameter('opordpag[numord]'));
	      $gridretconsul = Herramientas::CargarDatosGridv2($this,$this->objconsulret,true);
	      OrdendePago::facturar($this->getRequestParameter('opordpag[numord]'),$this->getRequestParameter('opordpag[incmod]'),$gridretconsul,$this->getRequestParameter('opordpag[referencias2]'),&$eliva,&$elislr,&$eltimbre,&$msj,&$arreglo1,&$arreglo2);
	      if ($msj=='')
	      {
	        $this->configGridFacturas($this->getRequestParameter('opordpag[numord]'),$arreglo1,$arreglo2);
	        $output = '[["opordpag_eliva","'.$eliva.'",""],["opordpag_elislr","'.$elislr.'",""],["opordpag_eltimbre","'.$eltimbre.'",""],["javascript","'.$msj.'",""],["opordpag_vacio","1",""]]';
	        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	      }else
	      {
	        $output = '[["javascript","'.$msj.'",""]]';
	        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	        return sfView::HEADER_ONLY;
	      }
	    }
       break;
     }
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
    	$this->opordpag = $this->getOpordpagOrCreate();
	  	$this->updateOpordpagFromRequest();

      if (H::toFloat($this->getRequestParameter('opordpag[monret]'))==0)
      {
        $this->coderr=531;
      }

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;
  }

  public function updateError()
  {
    $this->configGrid();
    $gridret = Herramientas::CargarDatosGridv2($this,$this->objret,true);
    $gridretconsul = Herramientas::CargarDatosGridv2($this,$this->objconsulret,true);
    $gridoculret = Herramientas::CargarDatosGridv2($this,$this->objoculret,true);
    //$gridfac = Herramientas::CargarDatosGridv2($this,$this->objfac,true);
    $gridmov = Herramientas::CargarDatosGridv2($this,$this->objmov);
  }

  protected function saving($opordpag)
  {
    $gridoculret = Herramientas::CargarDatosGridv2($this,$this->objoculret,true);
    $gridfac = Herramientas::CargarDatosGridv2($this,$this->objfac,true);
    OrdendePago::salvarPagodeRetenciones($opordpag,$gridoculret,$gridfac,$this->getUser()->getAttribute('loguse'));
    return -1;

  }

}
