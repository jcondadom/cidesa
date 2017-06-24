<?php

/**
 * fapresup actions.
 *
 * @package    Roraima
 * @subpackage fapresup
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class fapresupActions extends autofapresupActions
{
  public $coderror =-1;

  public function setVars()
  {
    $this->moneda = Herramientas::cargarMoneda();
    $this->mascaraarticulo = Herramientas::getMascaraArticulo();
    $this->lonart=strlen($this->mascaraarticulo);
	  $this->numreg=0;
  }

   /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->fapresup = $this->getFapresupOrCreate();
    if (!$this->fapresup->getId()){        
        $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr');
        if ($filsoldir=='S'){
           $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
           $t= new Criteria();
           $t->add(SegdirusuPeer::LOGUSE,$loguse);
           $t->setLimit(1);
           $t->addAscendingOrderByColumn(SegdirusuPeer::CODDIREC);
           $regt= SegdirusuPeer::doSelectOne($t); 
           if ($regt){
            if ($this->fapresup->getCoddirec()=='')
              $this->fapresup->setCoddirec($regt->getCoddirec());
           }
          
        }
    }
    $this->configGrid();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      	$this->updateFapresupFromRequest();

        $this->saveFapresup($this->fapresup);

 	    $this->fapresup->setId(Herramientas::getX_vacio('REFPRE','fapresup','id',$this->fapresup->getRefpre()));

		if ($this->coderror!=-1){
			$this->labels = $this->getLabels();
		}
		else{
	        $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

	        if ($this->getRequestParameter('save_and_add'))
	        {
	          return $this->redirect('fapresup/create');
	        }
	        else if ($this->getRequestParameter('save_and_list'))
	        {
	          return $this->redirect('fapresup/list');
	        }
	        else
	        {
	            return $this->redirect('fapresup/edit?id='.$this->fapresup->getId());
	        }
		}
    }
    else
    {
      $this->labels = $this->getLabels();
    }

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
  public function configGrid(){
  	$this->configGridDetPre($this->fapresup->getRefpre());
    $this->configGridRgoArt($this->fapresup->getRefpre());
    $this->configGridDetCon($this->fapresup->getRefpre());
    $this-> configGridClau($this->fapresup->getRefpre());
    $this-> configGridMateriales($this->fapresup->getRefpre());
    $this-> configGridEquipos($this->fapresup->getRefpre());
    $this-> configGridManoObra($this->fapresup->getRefpre());
    $this-> configGridServicios($this->fapresup->getRefpre());
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridDetPre($nropre = '')
  {
    $this->setVars();
    $arrobj=array();
    $carpresup=H::getConfApp2('carpresup', 'facturacion', 'fapresup');
    $mancontra=H::getConfApp2('mancontra', 'facturacion', 'fapresup');
    $descedit=H::getConfApp2('descedit', 'facturacion', 'fapresup');
    $apu=H::getConfApp2('anaprecio', 'facturacion', 'fapresup');
    
  	$c = new Criteria();
  	$c->add(FadetprePeer::REFPRE,$nropre);
  	$reg = FadetprePeer::doSelect($c);
    if ($reg)
    {
       if ($this->fapresup->getId()=='')
       {
          foreach ($reg as $obj) {
            $fadetpre2= new Fadetpre();
            $fadetpre2->setCodart($obj->getCodart());
            $fadetpre2->setDesart($obj->getDesart());
            $fadetpre2->setUnimed($obj->getUnimed());
            $fadetpre2->setCansol($obj->getCansol());
            $fadetpre2->setPrecio($obj->getPrecio());
            $fadetpre2->setMondesc($obj->getMondesc());
            $fadetpre2->setMonrgo($obj->getMonrgo());
            $fadetpre2->setTotart($obj->getTotart());
            $fadetpre2->setFecent($obj->getFecent());
            $fadetpre2->setCheck($obj->getCheck());
            $fadetpre2->setRecargos($obj->getRecargos());
            $fadetpre2->setContratos($obj->getContratos());
            $fadetpre2->setTipocon(H::getX_vacio('REFPRE','Fapresup','Percon',$obj->getRefpre()));
            $arrobj[]=$fadetpre2;
          }
          $reg=$arrobj;
       }
    }else $reg = array();

	  $this->fil1=count($reg);

  	$mascara=$this->mascaraarticulo;
  	$lonarti=$this->lonart;

    $this->columns = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/fapresup/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_fadetpre');
    /*if ($nropre!='' && $this->fapresup->getId()!='')
    $this->columns[0]->setEliminar(false);
    else
    $this->columns[0]->setEliminar(true);*/

    $obj= array('codart' => 1, 'desart' => 2);
    $params= array('param1' => $lonarti, 'val2');
   /* if (($nropre!='')&&($this->fapresup->getRefpre()!='########') && $this->fapresup->getId()!=''){
    	$this->columns[1][0]->setHTML('type="text" size="20" readonly=true');
    	$this->columns[1][3]->setTipo(Columna::MONTO);
    	$this->columns[1][3]->setHTML('type="text" size="20" readonly=true');
	    $this->columns[1][2]->setHTML('readonly=true');
	    $this->columns[1][3]->setHTML('readonly=true');
    	$this->columns[1][5]->setHTML('readonly=true');
    	$this->columns[1][9]->setVacia(true);
    }
    else{*/
    	$this->columns[1][0]->setHTML('type="text" size="20" maxlength="'.chr(39).$lonarti.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;} perderfocus(event,this.id,8);" onBlur="javascript:event.keyCode=13; ajaxarticulos(event,this.id);"');
    	$this->columns[1][0]->setCatalogo('caregart','sf_admin_edit_form',$obj,'Caregart_Fapedido',$params);
	    $this->columns[1][0]->setAjax('fapresup',4,9);
	    $this->columns[1][2]->setHTML('onBlur=Cantidad(this.id);');
	    $this->columns[1][3]->setHTML('onChange=Precio(this.id);');
	    //$this->columns[1][3]->setCombo(FaartpvpPeer::getPrecios());
    	$this->columns[1][5]->setHTML('onBlur=Descuento(this.id);');
    //}
  	$this->columns[1][1]->setTipo(Columna::TEXTAREA);
    if ($descedit!='S')
  	  $this->columns[1][1]->setHTML('type="text"  size="40x2" readonly=true');
    else
      $this->columns[1][1]->setHTML('type="text"  size="40x2" maxlength=2000');
    $this->columns[1][6]->setEsTotal(true,'fapresup_monpre');
    $this->columns[1][7]->setHTML('onClick="marcarrecarg(this.id)"');
    $this->columns[1][8]->setHTML('type="text" size="1" style="border:none" class="imagenalmacen" onClick=mostrargridrecargos(this.id);'); //Aplicarecargos
    if ($mancontra=='S') {
      $this->columns[1][12]->setOculta(false);
      $this->columns[1][12]->setHTML('type="text" size="1" style="border:none" class="imagenalmacen" onClick=mostrargridcontratos(this.id);'); //Distribución Contrato
    }

    $manunialt=H::getConfApp2('manunialt','compras','almregart');
    if ($manunialt=='S' && $this->fapresup->getId()=='')
    {
      $this->columns[1][15]->setTipo('c');
      $this->columns[1][15]->setCombo(CaunialartPeer::getUnidades());
      $this->columns[1][15]->setHTML('onChange=BuscarCosuni(this.id);');
    }
    if ($apu=='S'){  //Análisis de Precio de Unitario
      $this->columns[1][16]->setOculta(false);
      $this->columns[1][16]->setHTML('type="text" size="1" style="border:none" class="imagenalmacen" onClick=mostrargridapu(this.id);'); 
      
      $this->columns[1][3]->setTipo('m');
      $this->columns[1][3]->setEsnumerico(true);
      $this->columns[1][3]->setHTML('size="10" onBlur=Precio(this.id);');

    }

    $manmulmon=H::getConfApp2('manmulmon','facturacion','fapresup');
    if ($manmulmon=='S')
    {
      $this->columns[1][21]->setCombo(TsdesmonPeer::getMonedas());
      $this->columns[1][21]->setHTML('onChange=TraerValor(this.id);');
    }

  $this->obj = $this->columns[0]->getConfig($reg);

  $this->fapresup->setObj($this->obj);

  }

/**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridRgoArt($refpre = '', $codart='') {
    $c = new Criteria();   
    $c->add(FargoprePeer :: REFDOC, $refpre);
    $c->add(FargoprePeer :: CODART, $codart);            
    $rgoart = FargoprePeer :: doSelect($c);                   

    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/fapresup/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_fargopre');

    $this->columnas[1][0]->setHTML('onBlur="javascript:event.keyCode=13; ajaxrecargos(event,this.id);"');
    $this->columnas[1][3]->setHTML('onKeyPress=CalculoMontoRgo(event,this.id);');
    $this->obj2 = $this->columnas[0]->getConfig($rgoart);

    $this->fapresup->setObj2($this->obj2);
  }  

    /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridDetCon($refpre = '', $codart='', $percon='', $fecini='', $fecfin='',$discon='',$cansol=0, $tipconfil='')
  {
    if ($refpre=='' || ($this->fapresup->TienePedFac()=='N' && $tipconfil!=$percon))
    {
      $result=array();
      $arreglo=array();
      Facturacion::distribucionContrato($percon,$fecini,$fecfin,$tipconfil,$arreglo);
      //H::PrintR($arreglo); exit;
      $k=0;
      while ($k<count($arreglo))
      {
        $fadetconnew= new Fadetcon();
        $fadetconnew->setFecini($arreglo[$k]["fecini"]);
        $fadetconnew->setFecfin($arreglo[$k]["fecfin"]);
        $fadetconnew->setCancon($arreglo[$k]["cancon"]);
        $fadetconnew->setCansol($cansol);
        $result[]=$fadetconnew;
        $k++;
      }
    }else {
      $c = new Criteria();
      $c->add(FadetconPeer::REFPRE,$refpre);
      $c->add(FadetconPeer::CODART,$codart);
      $result = FadetconPeer::doSelect($c);
    }
 
    $this->columns = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/fapresup/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_con');

    $this->obj3 = $this->columns[0]->getConfig($result);

    $this->fapresup->setObj3($this->obj3);

  }

   public function configGridClau($refpre='', $codgru='')
  {
    $det=array();
    if ($codgru!='') {
    $c1 = new Criteria();
    $c1->add(FaclagruPeer :: CODGRU, $codgru);
    $det1 = FaclagruPeer :: doSelect($c1);
    if ($det1){
      foreach ($det1 as $obj1) {
        $fapregru_new= new Fapregru();
        $fapregru_new->setCodcla($obj1->getCodcla());
        $det[]=$fapregru_new;
      }
    }
  }else {
      $c = new Criteria();
      $c->add(FapregruPeer :: REFPRE, $refpre);
      $det = FapregruPeer :: doSelect($c);
  }

    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/fapresup/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_clau');

    $this->obj4 = $this->columnas[0]->getConfig($det);

    $this->fapresup->setObj4($this->obj4);
  }

  public function configGridMateriales($refpre='', $codart='', $tiedat='')
  {
    $det=array();
    if ($codart!='' && $tiedat==0){
      $c = new Criteria();
      $c->add(FarecmatartPeer::CODART, $codart);
      $recmat = FarecmatartPeer::doSelect($c);
      if ($recmat){
        foreach ($recmat as $mat) {
          $faprematart_new= new Faprematart();
          $faprematart_new->setCodart($mat->getCodart());
          $faprematart_new->setCodmat($mat->getCodmat());
          $faprematart_new->setUnimat($mat->getUnimat());
          $faprematart_new->setCanmat($mat->getCanmat());
          $faprematart_new->setCosmat(Articulos::BuscarPrecioUnidad($mat->getCodmat(),$mat->getUnimat()));
          $faprematart_new->setTotmat($faprematart_new->getCanmat()*$faprematart_new->getCosmat());
          $det[]=$faprematart_new;
        }
      }
    }else {
      $c = new Criteria();
      $c->add(FaprematartPeer::REFPRE, $refpre);
      $c->add(FaprematartPeer::CODART, $codart);
      $det = FaprematartPeer::doSelect($c);
   }

    $this->columns = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/fapresup/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_mat');

    $mascara = H::getMascaraArticulo();
    $lonarti=strlen($mascara);
    $obj= array('Codmat' => 1, 'Desmat' => 2);
    $params= array('param1' => $lonarti, 'val2');
    $this->columns[1][0]->setHTML('type="text" size="20" maxlength="'.chr(39).$lonarti.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;} perderfocus(event,this.id,4);"');
    $this->columns[1][0]->setCatalogo('Caregart','sf_admin_edit_form',$obj,'Caregart_Materiales',$params);
    $manunialt=H::getConfApp2('manunialt', 'compras', 'almregart');
    if ($manunialt=='S' && count($det)==0){
      $this->columns[1][2]->setTipo('c');
      $this->columns[1][2]->setCombo(CaunialartPeer::getUnidades());
      $this->columns[1][2]->setHTML(' ');
    }

    if ($tiedat!=0){
        $this->columns[0]->setFilas($tiedat);
    }


    $this->objmat = $this->columns[0]->getConfig($det);

    $this->fapresup->setObjmat($this->objmat);
  }

  public function configGridEquipos($refpre='', $codart='', $tiedat=0)
  {
    $det=array();
    if ($codart!='' && $tiedat==0){
      $c = new Criteria();
      $c->add(FarecequartPeer::CODART, $codart);
      $recequ = FarecequartPeer::doSelect($c);
      if ($recequ){
        foreach ($recequ as $equ) {
          $fapreequart_new= new Fapreequart();
          $fapreequart_new->setCodart($equ->getCodart());
          $fapreequart_new->setCodequ($equ->getCodequ());
          $fapreequart_new->setUniequ($equ->getUniequ());
          $fapreequart_new->setCanequ($equ->getCanequ());
          $fapreequart_new->setCosequ(Articulos::BuscarPrecioUnidad($equ->getCodequ(),$equ->getUniequ()));
          $fapreequart_new->setTotequ($fapreequart_new->getCanequ()*$fapreequart_new->getCosequ());
          $det[]=$fapreequart_new;
        }
      }
    }else {
      $c = new Criteria();
      $c->add(FapreequartPeer::REFPRE, $refpre);
      $c->add(FapreequartPeer::CODART, $codart);
      $det = FapreequartPeer::doSelect($c);
    }

    $this->columns = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/fapresup/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_equ');
    $mascara = H::getMascaraArticulo();
    $lonarti=strlen($mascara);
    $obj= array('Codequ' => 1, 'Desequ' => 2);
    $params= array('param1' => $lonarti, 'val2');
    $this->columns[1][0]->setHTML('type="text" size="20" maxlength="'.chr(39).$lonarti.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;} perderfocus(event,this.id,4);"');
    $this->columns[1][0]->setCatalogo('Caregart','sf_admin_edit_form',$obj,'Caregart_Equipos',$params);
    $manunialt=H::getConfApp2('manunialt', 'compras', 'almregart');
    if ($manunialt=='S' && count($det)==0){
      $this->columns[1][2]->setTipo('c');
      $this->columns[1][2]->setCombo(CaunialartPeer::getUnidades());
      $this->columns[1][2]->setHTML(' ');
    }

    if ($tiedat!=0){
      $this->columns[0]->setFilas($tiedat);
    }
    
    $this->objequ = $this->columns[0]->getConfig($det);

    $this->fapresup->setObjequ($this->objequ);
  }

  public function configGridManoObra($refpre='', $codart='', $tiedat=0)
  {
    $det=array();
    $faccorre=FacorrelatPeer::doSelectOne(new Criteria());
    if ($faccorre)
      $cosmanobr=$faccorre->getCosmanobr();
    else $cosmanobr=0;
    if ($codart!='' && $tiedat==0){
      $c = new Criteria();
      $c->add(FarecmanartPeer::CODART, $codart);
      $recman = FarecmanartPeer::doSelect($c);
      if ($recman){
        foreach ($recman as $man) {
          $fapremanart_new= new Fapremanart();
          $fapremanart_new->setCodart($man->getCodart());
          $fapremanart_new->setCodman($man->getCodman());
          $fapremanart_new->setUniman($man->getUniman());
          $fapremanart_new->setCanman($man->getCanman());
          $fapremanart_new->setCosman($cosmanobr);
          $fapremanart_new->setTotman($man->getCanman()*$cosmanobr);
          $det[]=$fapremanart_new;
        }
      }

    }else {
      $c = new Criteria();
      $c->add(FapremanartPeer::REFPRE, $refpre);
      $c->add(FapremanartPeer::CODART, $codart);
      $det = FapremanartPeer::doSelect($c);
    }

    $this->columns = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/fapresup/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_man');

    if ($tiedat!=0){
      $this->columns[0]->setFilas($tiedat);
    }

    $this->objman = $this->columns[0]->getConfig($det);

    $this->fapresup->setObjman($this->objman);
  }

  public function configGridServicios($refpre='', $codart='', $tiedat='')
  {
    $det=array();
    if ($codart!='' && $tiedat==0){
      $c = new Criteria();
      $c->add(FarecserartPeer::CODART, $codart);
      $recser = FarecserartPeer::doSelect($c);
      if ($recser){
        foreach ($recser as $ser) {
          $fapreserart_new= new Fapreserart();
          $fapreserart_new->setCodart($ser->getCodart());
          $fapreserart_new->setCodser($ser->getCodser());
          $fapreserart_new->setUniser($ser->getUniser());
          $fapreserart_new->setCanser($ser->getCanser());
          $fapreserart_new->setCosser(Articulos::BuscarPrecioUnidad($ser->getCodser(),$ser->getUniser()));
          $fapreserart_new->setTotser($fapreserart_new->getCanser()*$fapreserart_new->getCosser());
          $det[]=$fapreserart_new;
        }
      }
    }else {
      $c = new Criteria();
      $c->add(FapreserartPeer::REFPRE, $refpre);
      $c->add(FapreserartPeer::CODART, $codart);
      $det = FapreserartPeer::doSelect($c);
   }

    $this->columns = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/fapresup/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_ser');

    $mascara = H::getMascaraArticulo();
    $lonarti=strlen($mascara);
    $obj= array('Codser' => 1, 'Desser' => 2);
    $params= array('param1' => $lonarti, 'val2');
    $this->columns[1][0]->setHTML('type="text" size="20" maxlength="'.chr(39).$lonarti.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;} perderfocus(event,this.id,4);"');
    $this->columns[1][0]->setCatalogo('Caregart','sf_admin_edit_form',$obj,'Caregart_Servicios',$params);
    $manunialt=H::getConfApp2('manunialt', 'compras', 'almregart');
    if ($manunialt=='S' && count($det)==0){
      $this->columns[1][2]->setTipo('c');
      $this->columns[1][2]->setCombo(CaunialartPeer::getUnidades());
      $this->columns[1][2]->setHTML(' ');
    }

    if ($tiedat!=0){
        $this->columns[0]->setFilas($tiedat);
    }


    $this->objser = $this->columns[0]->getConfig($det);

    $this->fapresup->setObjser($this->objser);
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
    $javascript="";

    switch ($ajax){
      case '1':
        $codcli=""; $nompro= ""; $dirpro= ""; $telpro = ""; $javascript="";
       if ($codigo!="")
       {
         $c= new Criteria();
         $c->add(FaclientePeer::RIFPRO,$codigo);
         $reg= FaclientePeer::doSelectOne($c);
         if ($reg)
         {
             $codcli=$reg->getCodpro();
             $nompro=$reg->getNompro();
             $dirpro=$reg->getDirpro();
             $telpro=$reg->getTelpro();
         }
         else
         {
         	$javascript="alert('El Cliente no existe'); $('fapresup_codcli').value='';";
         }
       }
        $output = '[["fapresup_codcli","'.$codcli.'",""],["fapresup_nompro","'.$nompro.'",""],["fapresup_dirpro","'.$dirpro.'",""],["fapresup_telpro","'.$telpro.'",""],["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
       break;
      case '2':
	      $dateFormat = new sfDateFormat('es_VE');
	      $fec = $dateFormat->format($this->getRequestParameter('fecha'), 'i', $dateFormat->getInputPattern('d'));

	      $c = new Criteria();
	      $c->add(TsdesmonPeer::CODMON,$codigo);
	      $c->add(TsdesmonPeer::FECMON,$fec);
	      $resul= TsdesmonPeer::doSelectOne($c);
	      if ($resul)
	      {
	      	$dato=$resul->getValmon();
	      }
	      else
	      {
	      	$q= new Criteria();
            $q->add(TsdesmonPeer::CODMON,$codigo);
            $q->addDescendingOrderByColumn(TsdesmonPeer::FECMON);
            $reg= TsdesmonPeer::doSelectOne($q);
            if ($reg)
            {
               $dato=number_format($reg->getValmon(),6,',','.');
            }
	          else { $dato=0;}
	      }
		$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
       break;
      case '3':
        $c= new Criteria();
		$c->add(CaregartPeer::CODART,$codigo);
      	$reg=CaregartPeer::doSelectOne($c);
  		if ($reg)
  		{
	        $dato=$reg->getDesart();
          $tippre=$this->getRequestParameter('tippre','');
          /*if ($tippre=='C') {
             $col=$this->getRequestParameter('col','');
             $fila=$this->getRequestParameter('fil','');
             $javascript="colocarContrato('$codigo','$fila','$col');";
          }*/
	        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
  		}
  		else
  		{
  			 $javascript="alert('Articulo no existe');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';";
        	 $output = '[["javascript","'.$javascript.'",""]]';
  		}
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
       break;
      case '4':
        $c= new Criteria();
        $c->add(FarecargPeer::TIPRGO,'P');
        $this->sql = "codrgo in (select codrgo from farecart where codart = '".$codigo."')";
		$c->add(FarecargPeer::CODRGO,$this->sql,Criteria :: CUSTOM);
      	$reg=FarecargPeer::doSelect($c);
	    $porcrgo=0;
	    foreach ($reg as $sum)
	    {
	        $porcrgo += $sum->getMonrgo();
	    }
        $porcrgo=number_format($porcrgo,2,',','.');

        $output = '[["'.$cajtexmos.'","'.$porcrgo.'",""]]';

        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
       break;
      case '5':
        $this->ajaxs='5';
        $this->precios=array();
        $this->precios=FaartpvpPeer::getPrecios($codigo);
       break;
      case '6' :
        $this->ajaxs = '6';
        $this->fapresup = $this->getFapresupOrCreate();
        $refpre=$this->getRequestParameter('refpre');
        $codart=$this->getRequestParameter('codart');
        $this->configGridRgoArt($refpre, '', $codart);
        $output = '[["","",""],["","",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        break;               
      case '7' :
        $c = new Criteria();
        $c->add(FasinrgoPeer :: CODART, $this->getRequestParameter('articulo'));
        $c->add(FasinrgoPeer :: CODRGO, $this->getRequestParameter('recargo'));
        $resul = FasinrgoPeer :: doSelectOne($c);
        if ($resul) {
          $javascript = "$('fapresup_trajo').value='S'";
        } else
          $javascript = "$('fapresup_trajo').value='N'";

        $output = '[["javascript","' . $javascript . '",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        return sfView :: HEADER_ONLY;
        break;
      case '8' :
        $cajtexmos = $this->getRequestParameter('cajtexmos');
        $recfij = $this->getRequestParameter('recfij');
        $monto = $this->getRequestParameter('monto');
        $cta = $this->getRequestParameter('cta');
        $tipo = $this->getRequestParameter('tipo');
        $monto2 = $this->getRequestParameter('monto2');
        $montota = $this->getRequestParameter('montot');
        $montot1 = $this->getRequestParameter('montot1');
        $valmonto = $this->getRequestParameter('valmonto');

        $c = new Criteria();
        $c->add(FarecargPeer :: CODRGO, $codigo);
        $resul = FarecargPeer :: doSelectOne($c);
        if ($resul) {
          $dato = $resul->getNomrgo();
          $dato1 = $resul->getCodcta();
          if ($resul->getCalcul() == 'S') {
            $dato2 = "Si";
            $montot = $montota;
          } else {
            $dato2 = "No";
            $montot = $montot1;
          }

          if ($resul->getTiprgo() == 'M') {
            if ($valmonto != "") {
              $dato3 = $valmonto;
            } else {
              $dato3 = number_format($resul->getMonrgo(), 2, ',', '.');
            }
          } else {
            if ($resul->getTiprgo() == 'P') {
              $cuenta = (($montot * $resul->getMonrgo()) / 100);
              $dato3 = number_format($cuenta, 2, ',', '.');
            } else {
              $dato3 = "0,00";
            }
          }
          $dato4 = $resul->getTiprgo();
          $dato5 = $resul->getMonrgo();
          $javascript = "calcularTotalRecargos();";
        } else {
          $dato = "";
          $dato1 = "";
          $dato2 = "";
          $dato3 = "";
          $dato4 = "";
          $dato5 = "";
          $javascript = "alert('El Recargo no existe'); $('$codigo').value=''; calcularTotalRecargos();";
        }
        $output = '[["' . $cajtexmos . '","' . $dato . '",""],["' . $recfij . '","' . $dato2 . '",""],["' . $monto . '","' . $dato3 . '",""],["' . $cta . '","' . $dato1 . '",""],["' . $tipo . '","' . $dato4 . '",""],["' . $monto2 . '","' . $dato5 . '",""],["javascript","' . $javascript . '",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        return sfView :: HEADER_ONLY;
        break;   
      case '9' :
        $this->ajaxs = '';
        $this->fapresup = $this->getFapresupOrCreate();
        $refpre=$this->getRequestParameter('refpre');
        $q= new Criteria();
        $q->add(FapresupPeer::REFPRE,$refpre);
        $result= FapresupPeer::doSelectOne($q);
        if ($result)
        {
           $codcli=$result->getCodcli();
           $rifpro=$result->getRifpro();
           $nompro=$result->getNompro();
           $dirpro=$result->getDirpro();
           $telpro=$result->getTelpro();         
           if ($result->getTippre()=='C') {            
            $javascript="verificar('C')";
           }
          $output = '[["fapresup_refpre","########",""],["fapresup_fecpre","'.date('d/m/Y',strtotime($result->getFecpre())).'",""],["fapresup_tipmon","'.$result->getTipmon().'",""],["fapresup_codcli","'.$codcli.'",""],["fapresup_rifpro","'.$rifpro.'",""],["fapresup_nompro","'.$nompro.'",""],["fapresup_dirpro","'.$dirpro.'",""],["fapresup_telpro","'.$telpro.'",""],["fapresup_despre","'.$result->getDespre().'",""],["fapresup_faforsol_id","'.$result->getFaforsolId().'",""],["fapresup_tippre","'.$result->getTippre().'",""],["fapresup_percon","'.$result->getPercon().'",""],["fapresup_feciniper","'.date('d/m/Y',strtotime($result->getFeciniper())).'",""],["fapresup_faconpag_id","'.$result->getFaconpagId().'",""],["fapresup_fafordes_id","'.$result->getFafordesId().'",""],["fapresup_observ","'.$result->getObserv().'",""],["fapresup_cantras","'.$result->getCantras().'",""],["fapresup_pertra","'.$result->getPertra().'",""],["fapresup_frectra","'.$result->getFrectra().'",""],["fapresup_duracion","'.$result->getDuracion().'",""],["fapresup_obstra","'.$result->getObstra().'",""],["javascript","'.$javascript.'",""]]';
        }else {
          $refpre='';
          $output = '[["","",""],["","",""],["","",""]]';
        }
        $this->configGridDetPre($refpre);
        
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        break;    
      case '10' :
        $this->ajaxs = '10';
        $this->fapresup = $this->getFapresupOrCreate();
        $refpre=$this->getRequestParameter('refpre');
        $codart=$this->getRequestParameter('articulo');
        $percon=$this->getRequestParameter('percon');
        $fecini=$this->getRequestParameter('fecini');
        $discon=$this->getRequestParameter('discon');
        $cansol=$this->getRequestParameter('cansol');
        $tipconfil=$this->getRequestParameter('tipconfil');

        $dateFormat = new sfDateFormat('es_VE');    
        $fec1 = $dateFormat->format($fecini, 'i', $dateFormat->getInputPattern('d'));
        $fecfin=date('Y').'-12-31';

        $this->configGridDetCon($refpre,$codart,$percon,$fec1,$fecfin,$discon,$cansol,$tipconfil);
        
        $output = '[["","",""],["","",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        break;       

      case '11'                :
        $dato="";
        $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
        $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr');
        $q= new Criteria();
        if ($filsoldir=='S'){
          $sql='cadefdirec.coddirec=\''.$codigo.'\' and cadefdirec.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
          $q->add(CadefdirecPeer::CODDIREC,$sql,Criteria::CUSTOM); 
        }else $q->add(CadefdirecPeer::CODDIREC,$codigo);
        $reg= CadefdirecPeer::doSelectOne($q);
        if ($reg)
        {
           $dato=$reg->getDesdirec();                    
        }else {
           $javascript="alert_('La Direcci&oacute;n no existe'); $('fapresup_coddirec').value=''; $('fapresup_desdirec').value=''; $('fapresup_coddirec').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        return sfView :: HEADER_ONLY;
        break; 
      case '12':
        $this->ajaxs = '12';
        $this->unidades = array();
        $javascript = "";
        $idcos=$this->getRequestParameter('idcos');
        $this->unidades = CaunialartPeer :: getUnidades($this->getRequestParameter('codigo'));
        $unialt="";
        foreach ($this->unidades as $key => $value) {
          $unialt=$key;
          break;
        }
        $cosuni=Articulos::BuscarPrecioUnidad($this->getRequestParameter('codigo'),$unialt);
        $output = '[["javascript","' . $javascript . '",""],["'.$idcos.'","' .H::FormatoMonto($cosuni). '",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        break;
      case '13'                :
        $dato="";
        $q= new Criteria();
        $q->add(FaembarcaPeer::CODEMB,$codigo);
        $reg= FaembarcaPeer::doSelectOne($q);
        if ($reg)
        {
           $dato=$reg->getNomemb();  
           if ($reg->getTipemp()=='U')
             $tipo="Pública";
           else
             $tipo="Private";
           $proe=$reg->getProemb();
           $eslora=$reg->getEslora();
           $manga=$reg->getManga();
           $puntal=$reg->getPuntal();
           $calado=$reg->getCalado();
           $sigimo=$reg->getSigimo();
           $peso=H::FormatoMonto($reg->getPeso()).' TN';
           $javascript="$('fapresup_tipemb').value='$tipo'; $('fapresup_proemb').value='$proe'; $('fapresup_eslora').value='$eslora'; $('fapresup_manga').value='$manga'; $('fapresup_puntal').value='$puntal'; $('fapresup_calado').value='$calado'; $('fapresup_sigimo').value='$sigimo'; $('fapresup_peso').value='$peso';";             
        }else {
           $javascript="alert_('La Embarcaci&oacute;n no existe'); $('fapresup_codemb').value=''; $('fapresup_nomemb').value=''; $('fapresup_codemb').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        return sfView :: HEADER_ONLY;
        break;
      case '14':
        $this->ajaxs = '14';
        $this->fapresup = $this->getFapresupOrCreate();
        $dato="";
        $q= new Criteria();
        $q->add(FadefgruPeer::CODGRU,$codigo);
        $reg= FadefgruPeer::doSelectOne($q);
        if ($reg)
        {
           $dato=$reg->getDesgru();                      
        }else {
           $codigo="";
           $javascript="alert_('El Grupo no existe'); $('fapresup_codgru').value=''; $('fapresup_desgru').value=''; $('fapresup_codgru').focus();";
        }

        $this->configGridClau('',$codigo);
        
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        break; 
      case '15' :
        $this->ajaxs = '15';
        $this->fapresup = $this->getFapresupOrCreate();
        $refpre=$this->getRequestParameter('refpre');
        $codart=$this->getRequestParameter('articulo');        
        $tienemat=$this->getRequestParameter('anamat');        

        $this->configGridMateriales($refpre,$codart,$tienemat);
        
        $output = '[["","",""],["","",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        break; 
      case '16' :
        $this->ajaxs = '16';
        $this->fapresup = $this->getFapresupOrCreate();
        $refpre=$this->getRequestParameter('refpre');
        $codart=$this->getRequestParameter('articulo');        
        $tieneequ=$this->getRequestParameter('anaequ');        

        $this->configGridEquipos($refpre,$codart,$tieneequ);
        
        $output = '[["","",""],["","",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        break;  
      case '17':
        $this->ajaxs = '17';
        $this->fapresup = $this->getFapresupOrCreate();
        $refpre=$this->getRequestParameter('refpre');
        $codart=$this->getRequestParameter('articulo');        
        $tieneman=$this->getRequestParameter('anaman');        

        $this->configGridManoObra($refpre,$codart,$tieneman);
        
        $output = '[["","",""],["","",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        break;      
      case '18':
        $dato="";        
        $q= new Criteria();
        $q->add(FadefsedPeer::CODSED,$codigo);
        $reg= FadefsedPeer::doSelectOne($q);
        if ($reg)
        {
           $dato=$reg->getDessed();                    
        }else {
           $javascript="alert_('La Sede no existe'); $('fapresup_codsed').value=''; $('fapresup_dessed').value=''; $('fapresup_codsed').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        return sfView :: HEADER_ONLY;
        break; 
      case '19':
        $dato="";     
        $codpro=$this->getRequestParameter('codpro');
        $q= new Criteria();
        $q->add(FapresupPeer::REFPRE,$codigo);
        //$q->add(FapresupPeer::CODCLI,$codpro);
        $reg= FapresupPeer::doSelectOne($q);
        if (!$reg)        
           $javascript="alert_('La Cotización no existe'); $('fapresup_refpreaso').value=''; $('fapresup_refpreaso').focus();";
        
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        return sfView :: HEADER_ONLY;
        break;
      case '20':
        $dato="";        
        $codpro=$this->getRequestParameter('codpro');
        $q= new Criteria();
        $q->add(FacliperPeer::ID,$codigo);
        $q->add(FacliperPeer::CODPRO,$codpro);
        $reg= FacliperPeer::doSelectOne($q);
        if ($reg)
        {
           $dato=$reg->getNomper();   
           $dirper=$reg->getDirper();
           $telper=$reg->getTelper();
           $javascript="$('fapresup_dirper').value='$dirper'; $('fapresup_telper').value='$telper';";                 
        }else {
           $javascript="alert_('La Persona Contacto no existe o no esta asociada a ese Cliente'); $('fapresup_facliper_id').value=''; $('fapresup_nomper').value=''; $('fapresup_dirper').value=''; $('fapresup_telper').value=''; $('fapresup_facliper_id').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        return sfView :: HEADER_ONLY;
        break;   
      case '21':       
        $idcos=$this->getRequestParameter('idcos');
        $cosuni=Articulos::BuscarPrecioUnidad($this->getRequestParameter('codart'),$this->getRequestParameter('codigo'));
        $output = '[["'.$idcos.'","' . H::FormatoMonto($cosuni) . '",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        return sfView :: HEADER_ONLY;
        break;   
      case '22' :
        $this->ajaxs = '22';
        $this->fapresup = $this->getFapresupOrCreate();
        $refpre=$this->getRequestParameter('refpre');
        $codart=$this->getRequestParameter('articulo');        
        $tieneser=$this->getRequestParameter('anaser');        

        $this->configGridServicios($refpre,$codart,$tieneser);
        
        $output = '[["","",""],["","",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        break;
      case '23':
          $q= new Criteria();
          $q->add(TsdesmonPeer::CODMON,$codigo);
          $q->addDescendingOrderByColumn(TsdesmonPeer::FECMON);
          $reg= TsdesmonPeer::doSelectOne($q);
          if ($reg)
          {
             $dato=number_format($reg->getValmon(),6,',','.');
          }
        $output = '[["'.$cajtxtmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        return sfView :: HEADER_ONLY;
        break; 
      case '24':
        $dato="";        
        $q= new Criteria();
        $q->add(TsdefbanPeer::NUMCUE,$codigo);
        $reg= TsdefbanPeer::doSelectOne($q);
        if ($reg)
        {
           $dato=$reg->getNomcue();             
        }else {
           $javascript="alert_('Cuenta Bancaria no existe'); $('fapresup_numcue').value=''; $('fapresup_nomcue').value=''; $('fapresup_numcue').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        return sfView :: HEADER_ONLY;
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
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->fapresup = $this->getFapresupOrCreate();
      try{ $this->updateFapresupFromRequest();}
      catch (Exception $ex){}

      $this->configGrid();

  	  $grid=Herramientas::CargarDatosGridv2($this,$this->obj);
      $grid3=Herramientas::CargarDatosGridv2($this,$this->obj3); //Detalle Contrato
      $grid4=Herramientas::CargarDatosGridv2($this,$this->obj4); //Claúsulas
      $mantippre=H::getConfApp2('mantippre', 'facturacion', 'fapresup');

  	  $this->numreg=count($grid[0]);

       if ($this->ValidarDatosVaciosenGrid($grid,$error))
       {
          $this->coderror=$error;
          return false;
       }

       if ($mantippre=='S' && $this->fapresup->getTippre()=='C'){
          $x=$grid[0];
          $i=0;
          while ($i<count($x))
          {
            if ($x[$i]->getContratos()=="")
            {
              $this->coderror=1194;
              return false;
            }           
            $i++;
          }
       }
       $mancorsed=H::getConfApp2('mancorsed', 'facturacion', 'fapresup');
       if ($this->fapresup->getTiecot()=='S'){
         if ($this->fapresup->getRefpreaso()==""){
            $this->coderror=1199;
            return false;
         }else {
           if ($mancorsed=='S'){
              $r1=H::getX_vacio('CODSED','Fadefsed','Corsed1',$this->fapresup->getCodsed());
              $cormadre=substr($this->fapresup->getRefpreaso(),0,strlen($this->fapresup->getRefpreaso())-2);
              $encontrado=false;
              while (!$encontrado)
              {
                $numero=$cormadre.str_pad($r1, 2, '0', STR_PAD_LEFT);
                $sql="select refpre from fapresup where refpre='".$numero."'";
                if (Herramientas::BuscarDatos($sql,$result))
                {
                  $r1=$r1+1;
                }
                else
                {
                  $encontrado=true;
                }
              }

              if (strlen($numero)>8)
              {
                $this->coderror=1200;
               return false;
              }
           }
         }
       }else {
         if ($mancorsed=='S'){
          $r=H::getX_vacio('CODSED','Fadefsed','Corsed',$this->fapresup->getCodsed());
          $r1=H::getX_vacio('CODSED','Fadefsed','Corsed1',$this->fapresup->getCodsed());
          $encontrado=false;
          while (!$encontrado)
          {
            $numero=$this->fapresup->getCodsed().str_pad($r, 3, '0', STR_PAD_LEFT).str_pad($r1, 2, '0', STR_PAD_LEFT);

            $sql="select refpre from fapresup where refpre='".$numero."'";
            if (Herramientas::BuscarDatos($sql,$result))
            {
              $r=$r+1;
            }
            else
            {
              $encontrado=true;
            }
          }
          if (strlen($numero)>8)
          {
            $this->coderror=1200;
            return false;
          }
         }

       }

  	   	if ($this->fapresup->getRefpre()!="")
  	   	{
  	        $c= new Criteria();
  	        $c->add(FapresupPeer::REFPRE,$this->fapresup->getRefpre());
  	      	$reg=FapresupPeer::doSelectOne($c);

  			if ($reg)
  			{
          if ($reg->TienePedFac()=='S'){
  				$this->coderror=1113;
  	            return false;
              }
             return true; 
  			}
  			else
  			{
  	            return true;
  			}
  	   	}
	   	else
	   	  return true;

    }else return true;
  }

   public function ValidarDatosVaciosenGrid($grid,&$error)
   {
      $error=-1;
      $x=$grid[0];
      $j=0;
      $codcatvacio=false;

      if (count($x)==0)
      {
         $error=178;
         return true;
      }
      if ($codcatvacio)
        return true;
      else
        return false;
  }

  /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->fapresup = $this->getFapresupOrCreate();

    try{
	    $this->updateFapresupFromRequest();
    }

    catch(Exception $ex){}

	$this->configGrid();
  	//$grid=Herramientas::CargarDatosGridv2($this,$this->obj);
    $this->labels = $this->getLabels();
    if($this->getRequest()->getMethod() == sfRequest::POST)
      {
	    if($this->coderror!=-1)
		  {
		   $err = Herramientas::obtenerMensajeError($this->coderror);
		   $this->getRequest()->setError('',$err);
		  }
      }
    return sfView::SUCCESS;
  }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    /*$this->configGrid();

     $grid=Herramientas::CargarDatosGridv2($this,$this->obj);
     $grid3=Herramientas::CargarDatosGridv2($this,$this->obj3); //Detalle Contrato
     $grid4=Herramientas::CargarDatosGridv2($this,$this->obj4); //Claúsulas
     */

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
  public function saveFapresup($fapresup)
  {
     $grid=Herramientas::CargarDatosGridv2($this,$this->obj);
     $grid3=Herramientas::CargarDatosGridv2($this,$this->obj3); //Detalle Contrato
     $grid4=Herramientas::CargarDatosGridv2($this,$this->obj4); //Claúsulas
     $resp=Facturacion::salvarFapresup($fapresup,$grid,$grid3,$grid4);
    if($resp!=-1){
      $this->coderror = $resp;
      $err = Herramientas::obtenerMensajeError($this->coderror);
      $this->getRequest()->setError('',$err);
    }
  }

  /**
   * Función para colocar el codigo necesario para 
   * el proceso de eliminar.
   * Esta función debe retornar un valor igual a -1 si no hubo 
   * Inconvenientes al guardar, y != de -1 si existe algún error.
   * Si es diferente de -1 el valor devuelto debe ser un código de error
   * Válido que exista en el archivo config/errores.yml
   *
   */
  public function deleting($clasemodelo)
  {
    $tienfac=H::getX_vacio('CODREF','Faartfac','Codref',$clasemodelo->getRefpre());
    if ($tienfac=='') {
      H::EliminarRegistro('Fadetpre','Refpre',$clasemodelo->getRefpre());
      H::EliminarRegistro('Fadetcon','Refpre',$clasemodelo->getRefpre());
      H::EliminarRegistro('Faprematart','Refpre',$clasemodelo->getRefpre());
      H::EliminarRegistro('Fapreequart','Refpre',$clasemodelo->getRefpre());
      H::EliminarRegistro('Fapremanart','Refpre',$clasemodelo->getRefpre());
      H::EliminarRegistro('Fapreserart','Refpre',$clasemodelo->getRefpre());
      return parent::deleting($clasemodelo);
    }else return 1195;
  }

  /**
   * Función para manejar los filtros de búsqueda
   * de la lista
   *
   */
  protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['refpre_is_empty']))
    {
      $criterion = $c->getNewCriterion(FapresupPeer::REFPRE, '');
      $criterion->addOr($c->getNewCriterion(FapresupPeer::REFPRE, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['refpre']) && $this->filters['refpre'] !== '')
    {
      $c->add(FapresupPeer::REFPRE, strtr("%".$this->filters['refpre']."%", '*', '%'), Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['fecpre_is_empty']))
    {
      $criterion = $c->getNewCriterion(FapresupPeer::FECPRE, '');
      $criterion->addOr($c->getNewCriterion(FapresupPeer::FECPRE, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['fecpre']))
    {
      if (isset($this->filters['fecpre']['from']) && $this->filters['fecpre']['from'] !== '')
      {
        $criterion = $c->getNewCriterion(FapresupPeer::FECPRE, date('Y-m-d', $this->filters['fecpre']['from']), Criteria::GREATER_EQUAL);
      }
      if (isset($this->filters['fecpre']['to']) && $this->filters['fecpre']['to'] !== '')
      {
        if (isset($criterion))
        {
          $criterion->addAnd($c->getNewCriterion(FapresupPeer::FECPRE, date('Y-m-d', $this->filters['fecpre']['to']), Criteria::LESS_EQUAL));
        }
        else
        {
          $criterion = $c->getNewCriterion(FapresupPeer::FECPRE, date('Y-m-d', $this->filters['fecpre']['to']), Criteria::LESS_EQUAL);
        }
      }

      if (isset($criterion))
      {
        $c->add($criterion);
      }
    }
    if (isset($this->filters['despre_is_empty']))
    {
      $criterion = $c->getNewCriterion(FapresupPeer::DESPRE, '');
      $criterion->addOr($c->getNewCriterion(FapresupPeer::DESPRE, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['despre']) && $this->filters['despre'] !== '')
    {
      $c->add(FapresupPeer::DESPRE, strtr("%".$this->filters['despre']."%", '*', '%'), Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['rifpro_is_empty']))
    {
      $criterion = $c->getNewCriterion(FapresupPeer::RIFPRO, '');
      $criterion->addOr($c->getNewCriterion(FapresupPeer::RIFPRO, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['rifpro']) && $this->filters['rifpro'] !== '')
    {
      $c->add(FaclientePeer::RIFPRO, strtr("%".$this->filters['rifpro']."%", '*', '%'), Criteria::LIKE);
      $c->addJoin(FapresupPeer::CODCLI, FaclientePeer::CODPRO);
      $c->setIgnoreCase(true);      
    }
    if (isset($this->filters['nompro_is_empty']))
    {
      $criterion = $c->getNewCriterion(FapresupPeer::NOMPRO, '');
      $criterion->addOr($c->getNewCriterion(FapresupPeer::NOMPRO, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nompro']) && $this->filters['nompro'] !== '')
    {
      $c->add(FaclientePeer::NOMPRO, strtr("%".$this->filters['nompro']."%", '*', '%'), Criteria::LIKE);
      $c->addJoin(FapresupPeer::CODCLI, FaclientePeer::CODPRO);
      $c->setIgnoreCase(true);      
    }
  }

 /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
    public function executeAjaxgrid() {
        $name = $this->getRequestParameter('grid','a');
        $grid = $this->getRequestParameter('grid'.$name,'');
        $fila = $this->getRequestParameter('fila','');
        $col = $this->getRequestParameter('columna', '');
        $detprecom=$this->getRequestParameter('cpcompro_detprecom', '');
        $feccom = $this->getRequestParameter('cpcompro_feccom','');
        $dateFormat = new sfDateFormat('es_VE');
        $fec2 = $dateFormat->format($feccom, 'i', $dateFormat->getInputPattern('d'));
        $javascript="";  $jsonextra="";
      switch ($name) {         
        case ('b'):  // grid detalle contrato por período
          switch ($col) {
             case ('1'):   //Codigo Artículo
                if ($grid[$fila][$col-1]!="")
                {                  
                    $valor=$grid[$fila][$col-1];  
                    $javascript="BuscarCodart('$valor','$fila')";              
                  }                               
                  
                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;                    
              case ('3'):  //Cantidad
               $totart=$grid[$fila][$col]; // Cantidad Total articulo (Grid detalle articulos)
               $cantidad=$grid[$fila][$col-1]; //Cantidad por período
               $i=0;
               $acum=0;
               while ($i<count($grid))
               {
                  if ($i!=$fila)
                     $acum=$acum + H::toFloat($grid[$i][$col-1]);                  
                   $i++;
               }
               $dif=H::toFloat($totart)-$acum;
               if (H::toFloat($cantidad)>H::toFloat($dif))
               {
                  $grid[$fila][$col-1]="0,00";                        
                  $javascript="alert('La Cantidad para este per&iacute;odo sobrepasa la Cantidad Total de ese Art&iacute;culo');";
               }
                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;
             /*case ('4'):   //Fecha de Inicio
                $perart=$grid[$fila][$col+2];  
                if ($grid[$fila][$col-1]!='') {
                  if ($grid[$fila][$col+2]!=''){
                    $dateFormat = new sfDateFormat('es_VE');
                    $fecini = $dateFormat->format($grid[$fila][$col-1], 'i', $dateFormat->getInputPattern('d'));
                    if ($grid[$fila][$col+2]=='M'){
                        $sql= "Select last_day('". $fecini."') as fecha";
                        if (Herramientas::BuscarDatos($sql,$result))
                        {
                          $fecfin = $result[0]['fecha'];
                        }
                    }else if ($grid[$fila][$col+2]=='B'){
                       $sql= "Select last_day2('". $fecini."') as fecha";
                        if (Herramientas::BuscarDatos($sql,$result))
                        {
                          $fecfin = $result[0]['fecha'];
                        }
                    }else {
                       $sql= "Select last_day3('". $fecini."') as fecha";
                        if (Herramientas::BuscarDatos($sql,$result))
                        {
                          $fecfin = $result[0]['fecha'];
                        }
                    }

                    $grid[$fila][$col]=date('d/m/Y',strtotime($fecfin));
                  }else{
                    $grid[$fila][$col-1]="";                        
                    $javascript="alert('Debe seleccionar el Per&iacute;odo');";
                  }
                }                  
                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;       */            
              default:
                break;
            }
          break;
        case ('e'):  // grid Claúsulas
          switch ($col) {
             case '1': 
              if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
              {
                   $w= new Criteria();
                   $w->add(FadefclaPeer::CODCLA,$grid[$fila][$col-1]);
                   $reg= FadefclaPeer::doSelectOne($w);
                   if ($reg)
                   {                    
                      $grid[$fila][1]=$reg->getDescla();                                        
                   }else {
                      $grid[$fila][$col-1]="";
                      $grid[$fila][1]="";
                      $grid[$fila][2]="";
                      $javascript="alert_('La Condicion no esta Registrada');";
                   }   
                }else {
                    $grid[$fila][$col-1]="";
                    $grid[$fila][1]="";
                    $grid[$fila][2]="";
                   $javascript="alert_('La Condicion esta Repetida');";
                }
              $jsonextra = ',["javascript","' . $javascript . '",""]'.$com;
              break;                
              default:
                break;
            }
          break;
        case 'f':  //Grid Materiales
          switch ($col) {
            case '1': 
              if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
              {
                 $w= new Criteria();
                 $w->add(CaregartPeer::CODART,$grid[$fila][$col-1]);
                 //$w->add(CaregartPeer::TIPART,'M');
                 $reg= CaregartPeer::doSelectOne($w);
                 if ($reg)
                 {                    
                    $idart=$name."x_".$fila."_".$col;
                    $grid[$fila][1]=$reg->getDesart(); 
                    $manunialt=H::getConfApp2('manunialt', 'compras', 'almregart');
                    if ($manunialt=='S')
                       $javascript="cargarComboUnidades('$idart');";
                    else
                      $grid[$fila][2]=$reg->getUnimed(); 

                 }else {
                    $grid[$fila][$col-1]="";
                    $grid[$fila][1]="";
                    $grid[$fila][2]="";
                    $javascript="alert_('El Material no esta Registrado');";
                 }   
              }else {
                  $grid[$fila][$col-1]="";
                  $grid[$fila][1]="";
                  $grid[$fila][2]="";
                 $javascript="alert_('El Material esta Repetido');";
              }
              $jsonextra = ',["javascript","' . $javascript . '",""]'.$com;
              break;   
            case ('4'):  //Cantidad               
              $cantidad=H::toFloat($grid[$fila][$col-1]); //Cantidad 
              $costo=H::toFloat($grid[$fila][$col]); //Costo
              
              $total=$cantidad*$costo;
              $grid[$fila][$col+1]=H::FormatoMonto($total);

              $javascript="ActualizarSaldosGrid('f',ArrTotales_f); monto_total_apu();";

              $jsonextra = ',["javascript","' . $javascript . '",""]';
              break;  
            case ('5'):  //Costo
              $costo=H::toFloat($grid[$fila][$col-1]); //Costo
              $cantidad=H::toFloat($grid[$fila][$col-2]); //Cantidad

              $total=$cantidad*$costo;
              $grid[$fila][$col]=H::FormatoMonto($total);

              $javascript="ActualizarSaldosGrid('f',ArrTotales_f); monto_total_apu();";
               
              $jsonextra = ',["javascript","' . $javascript . '",""]';
              break;      
            default:
              break;
          }
        break;
      case 'g':  //Grid Equipos
        switch ($col) {
          case '1': 
            if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
            {
               $w= new Criteria();
               $w->add(CaregartPeer::CODART,$grid[$fila][$col-1]);
               //$w->add(CaregartPeer::TIPART,'E');
               $reg= CaregartPeer::doSelectOne($w);
               if ($reg)
               {                    
                  $idart=$name."x_".$fila."_".$col;
                  $grid[$fila][1]=$reg->getDesart(); 
                  $manunialt=H::getConfApp2('manunialt', 'compras', 'almregart');
                  if ($manunialt=='S')
                     $javascript="cargarComboUnidades('$idart');";
                  else
                    $grid[$fila][2]=$reg->getUnimed(); 

               }else {
                  $grid[$fila][$col-1]="";
                  $grid[$fila][1]="";
                  $grid[$fila][2]="";
                  $javascript="alert_('La Maquinaria o Equipo no esta Registrado');";
               }   
            }else {
                $grid[$fila][$col-1]="";
                $grid[$fila][1]="";
                $grid[$fila][2]="";
               $javascript="alert_('La Maquinaria o Equipo esta Repetido');";
            }
            $jsonextra = ',["javascript","' . $javascript . '",""]'.$com;
            break;  
          case ('4'):  //Cantidad               
              $cantidad=H::toFloat($grid[$fila][$col-1]); //Cantidad 
              $costo=H::toFloat($grid[$fila][$col]); //Costo
              
              $total=$cantidad*$costo;
              $grid[$fila][$col+1]=H::FormatoMonto($total);

              $javascript="ActualizarSaldosGrid('g',ArrTotales_g); monto_total_apu();";

              $jsonextra = ',["javascript","' . $javascript . '",""]';
              break;  
            case ('5'):  //Costo
              $costo=H::toFloat($grid[$fila][$col-1]); //Costo
              $cantidad=H::toFloat($grid[$fila][$col-2]); //Cantidad

              $total=$cantidad*$costo;
              $grid[$fila][$col]=H::FormatoMonto($total);

              $javascript="ActualizarSaldosGrid('g',ArrTotales_g); monto_total_apu();";
               
              $jsonextra = ',["javascript","' . $javascript . '",""]';
              break;         
          default:
            break;
        }
        break;
      case 'h': //Grid Mano de Obra
        switch ($col) {
          case '1': 
            if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
            {
              $faccorre=FacorrelatPeer::doSelectOne(new Criteria());
              if ($faccorre)
                $cosmanobr=$faccorre->getCosmanobr();
              else $cosmanobr=0;
               $w= new Criteria();
               $w->add(NpcargosPeer::CODCAR,$grid[$fila][$col-1]);
               $reg= NpcargosPeer::doSelectOne($w);
               if ($reg)
               {                    
                  $grid[$fila][1]=$reg->getNomcar();     
                  $grid[$fila][4]=H::FormatoMonto($cosmanobr);
               }else {
                  $grid[$fila][$col-1]="";
                  $grid[$fila][1]="";
                  $grid[$fila][4]="0,00";
                  $javascript="alert_('La Mano de Obra no esta Registrada');";
               }   
            }else {
                $grid[$fila][$col-1]="";
                $grid[$fila][1]="";
                $grid[$fila][4]="0,00";
                $javascript="alert_('La Mano de Obra no esta Registrada');";
            }
            $jsonextra = ',["javascript","' . $javascript . '",""]'.$com;
            break;  
          case ('4'):  //Cantidad               
              $cantidad=H::toFloat($grid[$fila][$col-1]); //Cantidad 
              $costo=H::toFloat($grid[$fila][$col]); //Costo
              
              $total=$cantidad*$costo;
              $grid[$fila][$col+1]=H::FormatoMonto($total);

              $javascript="ActualizarSaldosGrid('h',ArrTotales_h); monto_total_apu();";

              $jsonextra = ',["javascript","' . $javascript . '",""]';
              break;  
          case ('5'):  //Costo
              $costo=H::toFloat($grid[$fila][$col-1]); //Costo
              $cantidad=H::toFloat($grid[$fila][$col-2]); //Cantidad

              $total=$cantidad*$costo;
              $grid[$fila][$col]=H::FormatoMonto($total);

              $javascript="ActualizarSaldosGrid('h',ArrTotales_h); monto_total_apu();";
               
              $jsonextra = ',["javascript","' . $javascript . '",""]';
              break;          
          default:
            break;
        }
        break;
      case 'k':  //Grid Servicios Externos
          switch ($col) {
            case '1': 
              if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
              {
                 $w= new Criteria();
                 $w->add(CaregartPeer::CODART,$grid[$fila][$col-1]);
                 $w->add(CaregartPeer::TIPO,'S');
                 $reg= CaregartPeer::doSelectOne($w);
                 if ($reg)
                 {                    
                    $idart=$name."x_".$fila."_".$col;
                    $grid[$fila][1]=$reg->getDesart(); 
                    $manunialt=H::getConfApp2('manunialt', 'compras', 'almregart');
                    if ($manunialt=='S')
                       $javascript="cargarComboUnidades('$idart');";
                    else
                      $grid[$fila][2]=$reg->getUnimed(); 

                 }else {
                    $grid[$fila][$col-1]="";
                    $grid[$fila][1]="";
                    $grid[$fila][2]="";
                    $javascript="alert_('El Servicio no esta Registrado');";
                 }   
              }else {
                  $grid[$fila][$col-1]="";
                  $grid[$fila][1]="";
                  $grid[$fila][2]="";
                 $javascript="alert_('El Servicio esta Repetido');";
              }
              $jsonextra = ',["javascript","' . $javascript . '",""]'.$com;
              break;   
            case ('4'):  //Cantidad               
              $cantidad=H::toFloat($grid[$fila][$col-1]); //Cantidad 
              $costo=H::toFloat($grid[$fila][$col]); //Costo
              
              $total=$cantidad*$costo;
              $grid[$fila][$col+1]=H::FormatoMonto($total);

              $javascript="ActualizarSaldosGrid('k',ArrTotales_k); monto_total_apu();";

              $jsonextra = ',["javascript","' . $javascript . '",""]';
              break;  
            case ('5'):  //Costo
              $costo=H::toFloat($grid[$fila][$col-1]); //Costo
              $cantidad=H::toFloat($grid[$fila][$col-2]); //Cantidad

              $total=$cantidad*$costo;
              $grid[$fila][$col]=H::FormatoMonto($total);

              $javascript="ActualizarSaldosGrid('k',ArrTotales_k); monto_total_apu();";
               
              $jsonextra = ',["javascript","' . $javascript . '",""]';
              break;      
            default:
              break;
          }
        break;
        default:
          break;
        }

      $output = Herramientas::grid_to_json($grid,$name,$jsonextra);
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
    }  

  public function getLabels()
  {
    $labels = parent::getLabels();
 
    $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
    if ($cambiareti=='S')
      $labels['fapresup{coddirec}'] = 'Estado';
    return $labels;
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

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/fapresup/filters');
 
    $loguse= $this->getUser()->getAttribute('loguse');
    $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr'); 

     // 15    // pager
    $this->pager = new sfPropelPager('Fapresup', 15);
    $c = new Criteria();
    if ($filsoldir=='S'){
      $this->sql='fapresup.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
      $c->add(FapresupPeer::CODDIREC,$this->sql,Criteria::CUSTOM); 
    }
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

}
