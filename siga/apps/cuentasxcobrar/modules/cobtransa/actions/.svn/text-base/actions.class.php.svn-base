<?php

/**
 * cobtransa actions.
 *
 * @package    Roraima
 * @subpackage cobtransa
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class cobtransaActions extends autocobtransaActions
{

  // Para incluir funcionalidades al executeEdit()
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
     $this->cobtransa->afterHydrate();
     if (!$this->cobtransa->getId()){  
        $this->cobtransa->setFecreg(date('Y-m-d'));
        $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr');
        if ($filsoldir=='S'){
           $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
           $t= new Criteria();
           $t->add(SegdirusuPeer::LOGUSE,$loguse);
           $t->setLimit(1);
           $t->addAscendingOrderByColumn(SegdirusuPeer::CODDIREC);
           $regt= SegdirusuPeer::doSelectOne($t); 
           if ($regt){
            if ($this->cobtransa->getCoddirec()=='')
              $this->cobtransa->setCoddirec($regt->getCoddirec());
           }
          
        }
      }
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
  	 if ($this->cobtransa->getId())
  	 {
  	  $this->configGridDet($this->cobtransa->getNumtra());
  	  $this->configGridFormaPago($this->cobtransa->getNumtra());
  	 }
     else
     {
        $dateFormat = new sfDateFormat('es_VE');
        $fec1 = $dateFormat->format($this->getRequestParameter('cobtransa[fecdes]'), 'i', $dateFormat->getInputPattern('d'));
        $dateFormat = new sfDateFormat('es_VE');
        $fec2 = $dateFormat->format($this->getRequestParameter('cobtransa[fechas]'), 'i', $dateFormat->getInputPattern('d'));
       $this->configGridDet($this->cobtransa->getNumtra(),$this->getRequestParameter('cobtransa[codcli]'),$fec1,$fec2,$this->getRequestParameter('cobtransa[codcenaco]'),$this->getRequestParameter('cobtransa[estado]'));
       $this->configGridFormaPago($this->cobtransa->getNumtra(),$this->getRequestParameter('cobtransa[codcli]'));
     }
     $this->configGridNotCre();
     $this->cobtransa->setFilasdet($this->filasdet);

     $this->cobtransa->setFilasfor($this->filasfor);
     $this->cobtransa->setFilasnot($this->filasnotcre);
     $this->configGridRecargos($this->cobtransa->getNumtra(),$this->cobtransa->getCodcli());
     $this->configGridDescuento($this->cobtransa->getNumtra(),$this->cobtransa->getCodcli());
     $this->configGridCheDep($this->cobtransa->getNumtra());
  }


   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridDet($numtra="", $codcli="", $fecdes="", $fechas="", $cenaco="", $estado='')
   {
     if ($codcli!="")
     {
         if ($cenaco!="" || $estado!='')
         {
            if ($fecdes!="" && $fechas!="") $this->sql=" cobdocume.codcli='" .$codcli."' and cobdocume.fecemi>='$fecdes' and cobdocume.fecemi<='$fechas' And (cobdocume.MonDoc + cobdocume.RecDoc - cobdocume.DscDoc - cobdocume.AboDoc) > 0";
            else $this->sql="cobdocume.codcli='" .$codcli."' And (cobdocume.MonDoc + cobdocume.RecDoc - cobdocume.DscDoc - cobdocume.AboDoc) > 0";
            $a= new Criteria();
            $a->addJoin(CobdocumePeer::REFFAC,  FafacturPeer::REFFAC);
            $a->add(CobdocumePeer::STADOC,'A');
            //$a->add(CobdocumePeer::CODCLI,$codcli);
            if($estado!=''){
              $a->addJoin(FafacturPeer::CODCENACO,CadefcenacoPeer::CODCENACO);
              $a->add(CadefcenacoPeer::CODEDO,$estado);
            }else $a->add(FafacturPeer::CODCENACO,$cenaco);
            
	          $a->add(CobdocumePeer::CODCLI,$this->sql,Criteria::CUSTOM);     
            $a->addAscendingOrderByColumn(CobdocumePeer::REFDOC);
	          $reg= CobdocumePeer::doSelect($a);
         }else {
           if ($fecdes!="" && $fechas!="")
  	           $sql=" cobdocume.codcli='" .$codcli."' and cobdocume.fatipmov_id in (select id from fatipmov where debcre='D') and cobdocume.fecemi>='$fecdes' and cobdocume.fecemi<='$fechas' And (cobdocume.MonDoc + cobdocume.RecDoc - cobdocume.DscDoc - cobdocume.AboDoc) > 0";
           else 
               $sql=" cobdocume.codcli='" .$codcli."' and cobdocume.fatipmov_id in (select id from fatipmov where debcre='D') and (cobdocume.MonDoc + cobdocume.RecDoc - cobdocume.DscDoc - cobdocume.AboDoc) > 0 ";
      	   $a= new Criteria();
      	   $a->add(CobdocumePeer::STADOC,'A');
      	   $a->add(CobdocumePeer::CODCLI,$sql,Criteria::CUSTOM);
      	   $reg= CobdocumePeer::doSelect($a);
         }
     }
     else
     {
       $a= new Criteria();
	     $a->add(CobdettraPeer::NUMTRA,$numtra);
	     $reg= CobdettraPeer::doSelect($a);
     }

      $this->filasdet=count($reg);
    $intercamfil=H::getConfApp2('intercamfil', 'cuentasxcobrar', 'cobtransa');
    if ($intercamfil=='S')
      $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/cobtransa/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_documentos2');
    else
      $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/cobtransa/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_documentos');
    if ($codcli!="")
    {
      $this->columnas[0]->setTabla('Cobdocume');
       $this->columnas[1][9]->setNombrecampo('recargos2');
       $this->columnas[1][10]->setNombrecampo('descuentos2');
    }

    if ($intercamfil=='S')
      $this->columnas[1][4]->setHTML('size=10 onKeyPress=apagar(event,this.id);');
    else
      $this->columnas[1][5]->setHTML('size=10 onKeyPress=apagar(event,this.id);');
    $this->columnas[1][7]->setHTML('size=10 readonly=true onBlur=ValidarMontoGridv2(this); mostrar1(this.id);');
    $this->columnas[1][8]->setHTML('size=10 readonly=true onBlur=ValidarMontoGridv2(this); mostrar2(this.id);');
    $this->columnas[1][18]->setHTML('onClick="colocarmontopag(this.id)"');

    $nometides=H::getConfApp2('nometides', 'cuentasxcobrar', 'cobtransa');
    if ($nometides!='')
      $this->columnas[1][8]->setTitulo($nometides);

    $obj = array (
      'nroant' => 13,
      'desant' => 15
    );
    $params = array (
      'param1' => "'+$('cobtransa_codcli').value+'",
      'val2'
    );
    $this->columnas[1][12]->setCatalogo('faantcli', 'sf_admin_edit_form', $obj, 'Faantcli_Cobtransa', $params);

    $this->objdocumentos = $this->columnas[0]->getConfig($reg);

    $this->cobtransa->setObjdocumentos($this->objdocumentos);
  }

   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridFormaPago($numtra='',$nuevo='')
   {
    $reg1=array();
    if ($nuevo!="")
    {
      $a= new Criteria();
      $reg1= FatippagPeer::doSelect($a);
    }
    else
    {
      $a= new Criteria();
      $a->add(CobdetforPeer::NUMTRA,$numtra);
      $reg1= CobdetforPeer::doSelect($a);
    }

    $this->filasfor=count($reg1);
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/cobtransa/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_formapago');
    if ($nuevo!="")
    {
      $this->columnas[0]->setTabla('Fatippag');
    }
    $this->columnas[1][1]->setHTML('size=10 onKeyPress=montopagar(event,this.id);');
    $this->columnas[1][3]->setHTML('size=25 maxlength=20 onBlur=ajaxbancos(this.id);');
    $this->columnas[1][13]->setHTML('type="text" size="1" style="border:none" class="imagenalmacen" onClick="mostrardetche(this.id);"'); 
    $this->columnas[1][13]->setOculta(false); 
    //$this->columnas[1][4]->setCombo($this->cobtransa->getBancos());
    //$this->columnas[1][4]->setHTML('disabled=true');
    $this->objformapagos = $this->columnas[0]->getConfig($reg1);

    $this->cobtransa->setObjformapagos($this->objformapagos);
  }

   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridRecargos($numtra,$codcli)
   {
   	$reg=array();

     $c = new Criteria();
     $c->add(CobrectraPeer::NUMTRA,$numtra);
     $c->add(CobrectraPeer::CODCLI,$codcli);
     $reg =  CobrectraPeer::doSelect($c);


    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/cobtransa/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_recargos');
  /*if ($this->cobtransa->getId())
  {
    $this->columnas[0]->setFilas(0);
    $this->columnas[0]->setEliminar(false);
    $this->columnas[1][0]->setTipo(Columna::TEXTO);
    $this->columnas[1][0]->setAlineacionObjeto(Columna::CENTRO);
    $this->columnas[1][0]->setAlineacionContenido(Columna::CENTRO);
    $this->columnas[1][0]->setNombreCampo('coddesrec');
    $this->columnas[1][0]->setHTML('type="text" size="40" readonly=true');
    $this->columnas[1][1]->setHTML('readonly=true;');
  }else
  {*/
    $this->columnas[1][0]->setHTML('size=10 readonly=true onBlur=colocadoc(this.id);');
    $this->columnas[1][1]->setCombo($this->cobtransa->getRecargos());
    $this->columnas[1][1]->setHTML('onChange=recargos(this.id);');
    $this->columnas[1][2]->setHTML('size=10 onKeyPress=montorecarg(event,this.id);');
  //}
    $this->objrecargos = $this->columnas[0]->getConfig($reg);
    $this->cobtransa->setObjrecargos($this->objrecargos);
  }

   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridDescuento($numtra='',$codcli='')
   {
   	$reg=array();

    $c = new Criteria();
    $c->add(CobdestraPeer::NUMTRA,$numtra);
    $c->add(CobdestraPeer::CODCLI,$codcli);
    $reg =  CobdestraPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/cobtransa/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_descuentos');

   /*if ($this->cobtransa->getId())
   {
    $this->columnas[0]->setFilas(0);
    $this->columnas[0]->setEliminar(false);
    $this->columnas[1][0]->setTipo(Columna::TEXTO);
    $this->columnas[1][0]->setAlineacionObjeto(Columna::CENTRO);
    $this->columnas[1][0]->setAlineacionContenido(Columna::CENTRO);
    $this->columnas[1][0]->setNombreCampo('coddesdto');
    $this->columnas[1][0]->setHTML('type="text" size="40" readonly=true');
    $this->columnas[1][1]->setHTML('readonly=true;');
   }else
   {*/
    $this->columnas[1][0]->setHTML('size=10 readonly=true onBlur=colocadoc(this.id);');
    $this->columnas[1][1]->setCombo($this->cobtransa->getDescuentos());
    $this->columnas[1][1]->setHTML('onChange=descuentos(this.id);');
    $this->columnas[1][2]->setHTML('size=10 onKeyPress=montodescuentos(event,this.id);');    
    //$this->columnas[1][1]->setEsTotal(true,'cobdocume_dscdoc');
   //}

    $this->objdescuentos = $this->columnas[0]->getConfig($reg);
    $this->cobtransa->setObjdescuentos($this->objdescuentos);
  }

   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridNotCre($codcli='')
  {
     $reg=array();

     $sql=" cobdocume.codcli='" .$codcli."' and cobdocume.fatipmov_id in (select id from fatipmov where debcre='C') and (cobdocume.MonDoc + cobdocume.RecDoc - cobdocume.DscDoc - cobdocume.AboDoc) > 0 order by cobdocume.RefDoc";
     $a= new Criteria();
     $a->add(CobdocumePeer::STADOC,'A');
     $a->add(CobdocumePeer::CODCLI,$sql,Criteria::CUSTOM);
     $reg= CobdocumePeer::doSelect($a);
      
     $this->filasnotcre=count($reg);

     $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/cobtransa/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_notcre');

     $this->columnas[1][4]->setHTML('size=10 onKeyPress=montoabonar(event,this.id);');

     $this->objnotcre = $this->columnas[0]->getConfig($reg);
     $this->cobtransa->setObjnotcre($this->objnotcre);
  }  

   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridCheDep($numtra='')
   {
      $a= new Criteria();
      $a->add(CobfordepchePeer::NUMTRA,$numtra);
      $regdc= CobfordepchePeer::doSelect($a);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/cobtransa/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_detche');
    
    if ($numtra!='') {
      $this->columnas[0]->setEliminar(false);
      $this->columnas[0]->setFilas(0);
    }
    $this->columnas[1][3]->setHTML('size=10 onKeyPress=validamontoche(event,this.id);');
    
    $this->objdetche = $this->columnas[0]->getConfig($regdc);

    $this->cobtransa->setObjdetche($this->objdetche);
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
    $cajtexmos=$this->getRequestParameter('cajtexmos','');
    switch ($ajax){
	   case '1':
	   $this->ajax='1';
          $cajnompro = 'cobtransa_nompro';
          $cajrifpro = 'cobtransa_rifpro';
          $cajcodcli = 'cobtransa_codcli';
          $fecdes = $this->getRequestParameter('fecdes','');
          $fechas = $this->getRequestParameter('fechas','');
          $cenaco = $this->getRequestParameter('centro','');
          $estado = $this->getRequestParameter('estado','');
          $rifpro=""; $nompro=""; $javascript=""; $fec1=""; $fec2="";
          $actdoccli=H::getConfApp2('actdoccli', 'cuentasxcobrar', 'cobtransa');
          if ($actdoccli=='S')
              Cuentasxcobrar::ActualizarDocumentoCliente($codigo);

          $c = new Criteria();
          $c->add(FaclientePeer::CODPRO,$codigo);
          $cliente = FaclientePeer::doSelectOne($c);
          if($cliente){
               $this->sql=" codcli='".$codigo."' And (MonDoc + RecDoc - DscDoc - AboDoc) > 0 order by RefDoc";
               $a= new Criteria();
               $a->add(CobdocumePeer::STADOC,'A');
               $a->add(CobdocumePeer::CODCLI,$this->sql,Criteria::CUSTOM);
               $a->setLimit(10);
               $result= CobdocumePeer::doSelect($a);
               if ($result)
               {
                    $rifpro = $cliente->getRifpro();
                    $nompro = $cliente->getNompro();
                    $javascript="cargardatosfor();";                    
                    if ($fecdes!="") {
                      $dateFormat = new sfDateFormat('es_VE');
                      $fec1 = $dateFormat->format($fecdes, 'i', $dateFormat->getInputPattern('d'));
                    }
                    if ($fechas!="") {
                      $dateFormat = new sfDateFormat('es_VE');
                      $fec2 = $dateFormat->format($fechas, 'i', $dateFormat->getInputPattern('d'));
                    }
               }
               else
               {
                    $javascript="alert('No existen documentos por pagar para el Cliente o Empleado')";
                    $codigo="";
               }

          }
          else{
          	$javascript="alert('El Cliente no esta registrado')";
            $codigo="";
          }
        $this->cobtransa = $this->getCobtransaOrCreate();
        $this->params=array();
        $this->labels=$this->getLabels();
        $this->configGridDet('',$codigo, $fec1, $fec2, $cenaco, $estado);
        $output = '[["'.$cajcodcli.'","'.$codigo.'",""],["'.$cajrifpro.'","'.$rifpro.'",""],["'.$cajnompro.'","'.$nompro.'",""],["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;
      case '2':
        $this->ajax='';
        $javascript="";
        $a= new Criteria();
        $reg1= FatippagPeer::doSelect($a);
        if (!$reg1) $javascript="alert('No existen formas de Pago definidas'); ";
        $this->cobtransa = $this->getCobtransaOrCreate();
        $this->configGridFormaPago('','a');
        $output = '[["javascript","'.$javascript.'",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;
      case '3':
        if ($codigo!="")
        {
          $documento=$this->getRequestParameter('doc');
          $codcta=$this->getRequestParameter('codcta');
          $monrec=$this->getRequestParameter('monrec');
          $monori=$this->getRequestParameter('monori');
          $monrecfil=$this->getRequestParameter('monrecfil');
          $javascript="";
          $a= new Criteria();
          $a->add(CarecargPeer::CODRGO,$codigo);
          $result= CarecargPeer::doSelectOne($a);
          if ($result)
          {
          	$cuenta=$result->getCodcta();
            if ($result->getTiprgo()=='P')
            {
              if ($result->getTipret()!='S')
                $desct=($monori-$monrecfil);
              else
                $desct=$monrecfil;

             $valmonrec=(($result->getMonrgo()*$desct)/100);
             $montorec=number_format($valmonrec,2,',','.');
             //$javascript="sumar_recargos('$documento');";
            }
            else
            {
              $valmonrec=$result->getMonrgo();
              $montorec=number_format($valmonrec,2,',','.');
              //$javascript="sumar_recargos('$documento');";
            }
          }
          else
          {
            $montorec="0,00"; $cuenta="";
          	$javascript="alert('Se Debe Incluir el Tipo de Recargo Primero');";
          }
        }

        $output = '[["'.$monrec.'","'.$montorec.'",""],["'.$codcta.'","'.$cuenta.'",""],["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
       break;
      case '4':
        if ($codigo!="")
        {
          $documento=$this->getRequestParameter('doc');
          $codcta=$this->getRequestParameter('codcon');
          $mondes=$this->getRequestParameter('mondes');
          $monori=$this->getRequestParameter('monori');
          $monrecfil=$this->getRequestParameter('monrecfil');
          $javascript="";
          $a= new Criteria();
          $a->add(FadesctoPeer::CODDESC,$codigo);
          $result= FadesctoPeer::doSelectOne($a);
          if ($result)
          {
            $cuenta=$result->getCodcta();
            if ($result->getTipdesc()=='P')
            {
               if ($result->getTipret()!='S') {
                 $desct=($monori-$monrecfil);
                 if ($result->getPorbas()>0)
                  $desct=$desct*$result->getPorbas()/100;
               }
               else
                 $desct=$monrecfil;
       	      $valmondes=(($result->getMondesc()*$desct)/100);
       	      $mondesc=number_format($valmondes,2,',','.');
       	      //$javascript="sumar_descuentos('$documento');";
            }
            else
            {
              $valmondes=$result->getMondesc();
     	      $mondesc=number_format($valmondes,2,',','.');
     	      //$javascript="sumar_descuentos('$documento');";
            }
          }
          else
          {
          	$javascript="alert('Se Debe Incluir el Tipo de Descuento Primero');";
          }
        }
        $output = '[["'.$mondes.'","'.$mondesc.'",""],["'.$codcta.'","'.$cuenta.'",""],["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
       break;
      case '5':
	        $dateFormat = new sfDateFormat('es_VE');
		    $fecha = $dateFormat->format($this->getRequestParameter('codigo'), 'i', $dateFormat->getInputPattern('d'));

		    $c= new Criteria();
		    $c->add(CobtransaPeer::NUMTRA,$this->getRequestParameter('numtra'));
		    $data=CobtransaPeer::doSelectOne($c);
		    if ($data)
		    {
		      if ($fecha<$data->getFectra())
		      {
		        $msj="alert('La Fecha de Anulacion no puede ser menor a la fecha de la Transaccion'); $('cobtransa_fecanu').value=''";
		      }
		      else
		      {
		        $msj="";
		        if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('codigo'))==true)
		        {
		          $msj="alert('La Fecha no se encuentra de un Perido Contable Abierto.'); $('cobtransa_fecanu').value=''; $('cobtransa_fecanu').focus(); ";
		        }
		        else { $msj=""; }
		      }
		    }
		    else
		    {
		      $msj="";
		    }
		    $output = '[["javascript","'.$msj.'",""]]';
		    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		    return sfView::HEADER_ONLY;
        break;
      case '6':
        $dato=TstipmovPeer::getDestip($codigo);
        $output = '[["cobtransa_destip","'.$dato.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;
      case '7':
        $js="";
         $dato1  = H::getX_vacio('Codcenaco','Cadefcenaco','descenaco',$codigo);
         if ($dato1=="")
             $js="alert('El Centro de Acopio no existe'); $('cobtransa_codcenaco').value=''; $('cobtransa_codcenaco').focus();";
        
          $output = '[["'.$cajtexmos.'","' . $dato1 . '",""],["javascript","' . $js . '",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;    
      case '8':
        $js="";
        $dato1="";
        $idcaj=$this->getRequestParameter('idcaj');
         $dato1  = H::getX_vacio('CTABAN','Faallbancos','Banco',$codigo);
         if ($dato1=="")
             $js="alert('El Banco no existe'); $('$idcaj').value=''; $('$idcaj').focus();";
        
          $output = '[["'.$cajtexmos.'","' . $dato1 . '",""],["javascript","' . $js . '",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;    
      case '9':
        $js="AplicaroNoRecargos();";
        $output = '[["javascript","' . $js . '",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;      
      case '10':            
        if ($codigo!="")
        {
          $docume=$this->getRequestParameter('docume');
          $filai=$this->getRequestParameter('fila');
          $documento=$this->getRequestParameter('doc');
          $codcta=$this->getRequestParameter('codcta');
          $monrec=$this->getRequestParameter('monrec');
          $monori=$this->getRequestParameter('monori');
          $javascript="";
          $a= new Criteria();
          $a->add(CarecargPeer::CODRGO,$codigo);
          $result= CarecargPeer::doSelectOne($a);
          if ($result)
          {
            $cuenta=$result->getCodcta();
            if ($result->getTiprgo()=='P')
            {
             $valmonrec=(($result->getMonrgo()*$monori)/100);
             $montorec=number_format($valmonrec,2,',','.');
             $javascript="TotalizarRecargos('$docume','$filai');";
            }
            else
            {
              $valmonrec=$result->getMonrgo();
              $montorec=number_format($valmonrec,2,',','.');
              $javascript="TotalizarRecargos('$docume','$filai');";
            }
          }
          else
          {
            $montorec="0,00"; $cuenta="";
            $javascript="alert('Se Debe Incluir el Tipo de Recargo Primero');";
          }
        }

        $output = '[["'.$monrec.'","'.$montorec.'",""],["'.$codcta.'","'.$cuenta.'",""],["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;    
      case '11':
        if ($codigo!="")
        {
          $docume=$this->getRequestParameter('docume');
          $filai=$this->getRequestParameter('filai');
          $documento=$this->getRequestParameter('doc');
          $codcta=$this->getRequestParameter('codcon');
          $mondes=$this->getRequestParameter('mondes');
          $monori=$this->getRequestParameter('monori');
          $monrecfil=$this->getRequestParameter('monrecfil');
          $javascript="";
          $a= new Criteria();
          $a->add(FadesctoPeer::CODDESC,$codigo);
          $result= FadesctoPeer::doSelectOne($a);
          if ($result)
          {
            $cuenta=$result->getCodcta();
            if ($result->getTipdesc()=='P')
            {
               if ($result->getTipret()!='S')
                 $desct=$monori;
               else
                 $desct=$monrecfil;
              $valmondes=(($result->getMondesc()*$desct)/100);
              $mondesc=number_format($valmondes,2,',','.');
              $javascript="TotalizarRecargos('$docume','$filai');";
            }
            else
            {
              $valmondes=$result->getMondesc();
            $mondesc=number_format($valmondes,2,',','.');
            $javascript="TotalizarRecargos('$docume','$filai');";
            }
          }
          else
          {
            $javascript="alert('Se Debe Incluir el Tipo de Descuento Primero');";
          }
        }
        $output = '[["'.$mondes.'","'.$mondesc.'",""],["'.$codcta.'","'.$cuenta.'",""],["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
       break;       
      case '12':
        $this->ajax='2';
        $javascript="";
        $codcli=$this->getRequestParameter('codcli');
        $this->cobtransa = $this->getCobtransaOrCreate();        
        $this->configGridNotCre($codcli);
        $output = '[["javascript","'.$javascript.'",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;
       break;  
      case '13':
          $dato=""; $javascript="";
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
             $javascript="alert_('La Direcci&oacute;n no existe'); $('cobtransa_coddirec').value=''; $('cobtransa_desdirec').value=''; $('cobtransa_coddirec').focus();";
          }
          $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;
       break;                              
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
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
  public function validateEdit()
  {
    $this->coderr =-1;
    if($this->getRequest()->getMethod() == sfRequest::POST){
      $this->cobtransa = $this->getCobtransaOrCreate();
      try{ $this->updateCobtransaFromRequest();}
      catch (Exception $ex){}
      $this->configGrid();
      $gridfor=Herramientas::CargarDatosGridv2($this,$this->objformapagos);
      $gridpag = Herramientas::CargarDatosGridv2($this,$this->objdocumentos);


      

      if (H::toFloat($this->cobtransa->getMonpagado())<=0)
      {
        $this->coderr=1801;
        return false;
      }

    if (!$this->cobtransa->getId()) {
      if ($this->getRequestParameter('cobtransa[fectra]')!="")
      {
        if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('cobtransa[fectra]'))==true)
        {
          $this->coderr=529;
          return false;
        }
      }

  	  $varemp = $this->getUser()->getAttribute('configemp');
    	$this->gencom = 'S';
    	if(is_array($varemp))
  	    if(array_key_exists('aplicacion',$varemp))
  		    if(array_key_exists('cuentasxcobrar',$varemp['aplicacion']))
  			    if(array_key_exists('modulos',$varemp['aplicacion']['cuentasxcobrar']))
  				    if(array_key_exists('cobtransa',$varemp['aplicacion']['cuentasxcobrar']['modulos']))
      				{
      					if(array_key_exists('gencom',$varemp['aplicacion']['cuentasxcobrar']['modulos']['cobtransa']))
       						$this->gencom = $varemp['aplicacion']['cuentasxcobrar']['modulos']['cobtransa']['gencom'];
      				}

       if ($this->gencom=="S"){
  	      if (self::validarGeneraComprobante())
  	      {
  		      $this->coderr=508;
  		      return false;
  		    }
       }
        $x=$gridfor[0];
        $i=0;
        $valblocueban=H::getConfAppGen('valblocueban');
        if (count($x)>0)
        {
        	while($i<count($x))
        	{
        		if (H::toFloat($x[$i]->getMonpag())>0 && $x[$i]->getPagret()!='S')
        		{            
        		  $o= new Criteria();
        		  $o->add(FatippagPeer::ID,$x[$i]->getIdtippag());
        		  $resul= FatippagPeer::doSelectOne($o);
        		  if ($resul)
        		  { 
        		  	if ($resul->getGenmov()=='S')
        		  	{
        		  		if ($x[$i]->getCodtip()=="")
        		  		{
        		          $this->coderr=1807;
                      return false;
        		  		}
                  if ($x[$i]->getNumide2()=="" || $x[$i]->getCodban()=="")
                  {
                      $this->coderr=1802;
                      return false;
                  }
        		  	  $c= new Criteria();
    			        $c->add(TsmovlibPeer::NUMCUE,$x[$i]->getCodban());
    			        $c->add(TsmovlibPeer::REFLIB,$x[$i]->getNumide2());
    			        $c->add(TsmovlibPeer::TIPMOV,$x[$i]->getCodtip());
    			        $data= TsmovlibPeer::doSelectOne($c);
    			        if ($data)
    			        {
    			      	   $this->coderr=1805;
                     return false;
    			        }   

                  if (Tesoreria::validaPeriodoCerradoBanco($this->getRequestParameter('cobtransa[fectra]'),$x[$i]->getCodban())==false)
                  {
                    $this->coderr=537;
                    return false;
                  } 

                  if ($valblocueban=='S'){
                    if (Tesoreria::validaBancoBloqueado($this->getRequestParameter('cobtransa[fectra]'),$x[$i]->getCodban()))
                    {
                      $this->coderr=5007;
                      return false;
                    }
                  }            
        		  	}
        		  }
        		}
        		$i++;
        	}
        }

        $y=$gridpag[0];
        $l=0;
        $acummon=0;
        if (count($y)>0)
        {
        	while($l<count($y))
        	{
        		if (H::toFloat($y[$l]->getMonpag())>0)
        		{
        		  $o= new Criteria();
        		  $o->add(CobdocumePeer::REFDOC,$y[$l]->getRefdoc());
        		  $o->add(CobdocumePeer::CODCLI,$this->cobtransa->getCodcli());
        		  $resul= CobdocumePeer::doSelectOne($o);
        		  if ($resul)
        		  {
        		  	$reffac=$resul->getReffac();
        		  	if ($reffac!='')
        		  	{
        		  		if ($this->cobtransa->getHayingreso()=='S')
        		  		{
        		  		  $q= new Criteria();
        		  		  $q->add(OpbenefiPeer::CEDRIF,$this->cobtransa->getRifpro());
        		  		  $resul2= OpbenefiPeer::doSelectOne($q);
        		  		  if (!$resul)
        		  		  {
        		  		  	$this->coderr=1803;
                      return false;
        		  		  }
        		  		}
        		  	}
        		  }
              $acummon+=H::toFloat($y[$l]->getMonpag());
        		}
        		$l++;
        	}

        }
      if (H::toFloat($acummon)<=0)//if ($this->cobtransa->getTottra()<=0)
      {
        $this->coderr=1800;
        return false;
      }
    }
      if($this->coderr!=-1){
        return false;
      } else return true;
    }else return true;
  }

  public function updateError()
  {
     $this->grabo="";
     $this->cobtransa = $this->getCobtransaOrCreate();
      try{ $this->updateCobtransaFromRequest();}
      catch (Exception $ex){}

    $this->configGrid();

    $grid1 = Herramientas::CargarDatosGridv2($this,$this->objdocumentos);
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->objformapagos);
    $grid3 = Herramientas::CargarDatosGridv2($this,$this->objrecargos);
    $grid4 = Herramientas::CargarDatosGridv2($this,$this->objdescuentos);
  }

   protected function saving($cobtransa)
  {

  	if ($cobtransa->getId())
  	{
       $cobtransa->save();
       $grid1 = Herramientas::CargarDatosGridv2($this,$this->objdocumentos);
       $grid4 = Herramientas::CargarDatosGridv2($this,$this->objdescuentos);
       if (count($grid4[0])>0){
        Cuentasxcobrar::RegistrarComprobantesDescuentos($cobtransa,$grid1,$grid4);
       }
  	}
  	else
  	{

      if ($cobtransa->getNumtra()=="" || $cobtransa->getNumtra()=="##########") {
        $valido = false;
        while(!$valido){
          $num = H::getNextvalSecuencia('cobtransa_numtra_seq');
          $numtra = str_pad((string)$num, 10, "0", STR_PAD_LEFT);

          $c = new Criteria();
          $c->add(CobtransaPeer::NUMTRA,$numtra);
          $cobtran = CobtransaPeer::doSelectOne($c);
          if(!$cobtran){
            $valido = true;
          }
        }
        $cobtransa->setNumtra($numtra);  
      }

  	  $numcom=null;
  	  $form="sf_admin/cobtransa/confincomgen";
      $grabo=$this->getUser()->getAttribute('grabo',null,$form.'0');
      $numerocomp=$this->getUser()->getAttribute('contabc[numcom]',null,$form.'0');
      if ($grabo=='S')
      {
        $i=0;
        $concom=$this->getRequestParameter('cobtransa[totalcomprobantes]');
        while ($i<$concom)
        {
         $formulario[$i]=$form.$i;
         if ($this->getUser()->getAttribute('grabo',null,$formulario[$i])=='S')
         {
          $numcom=$this->getUser()->getAttribute('contabc[numcom]',null,$formulario[$i]);
          $reftra=$this->getUser()->getAttribute('contabc[reftra]',null,$formulario[$i]);
          $feccom=$this->getUser()->getAttribute('contabc[feccom]',null,$formulario[$i]);
          $descom=$this->getUser()->getAttribute('contabc[descom]',null,$formulario[$i]);
          $debito=$this->getUser()->getAttribute('debito',null,$formulario[$i]);
          $credito=$this->getUser()->getAttribute('credito',null,$formulario[$i]);
          $grid=$this->getUser()->getAttribute('grid',null,$formulario[$i]);

          $this->getUser()->getAttributeHolder()->remove('contabc[numcom]',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('contabc[reftra]',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('contabc[feccom]',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('contabc[descom]',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('debito',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('credito',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('grid',$formulario[$i]);
          $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
          if ($confcorcom=='N')
          {
            $reftra='CC'.substr($cobtransa->getNumtra(),4,6);
            $numcom=$reftra;
          }
          $codtiptra=Herramientas::getX_vacio('ID','Fatipmov','Codtiptra',$cobtransa->getFatipmovId());
          $numcom = Comprobante::SalvarComprobante($numcom,$reftra,$feccom,$descom,$debito,$credito,$grid,$this->getUser()->getAttribute('grabar',null,$formulario[$i]),null,$codtiptra,$cobtransa->getCoddirec());
         }
         $i++;
        }
      }
      $this->getUser()->getAttributeHolder()->remove('grabo',$form.'0');

     	$grid1 = Herramientas::CargarDatosGridv2($this,$this->objdocumentos);
     	$grid2 = Herramientas::CargarDatosGridv2($this,$this->objformapagos);
	    $grid3 = Herramientas::CargarDatosGridv2($this,$this->objrecargos);
	    $grid4 = Herramientas::CargarDatosGridv2($this,$this->objdescuentos);
      $grid5 = Herramientas::CargarDatosGridv2($this,$this->objdetche);
   	  Cuentasxcobrar::salvarTransacciones($cobtransa,$grid1,$grid2,$grid3,$grid4,$numcom,$grid5);
  	}
    return -1;

  }

  protected function deleting($cobtransa)
  {
  	if (!Cuentasxcobrar::verificarHijos($cobtransa->getNumtra(),$msj))
    {
      $pagmaytra=H::getConfApp2('pagmaytra', 'cuentasxcobrar', 'cobtransa');
      $monpagado=Cuentasxcobrar::MontoTotalPagado($cobtransa);
      $difpag=H::toFloat($monpagado)-H::toFloat($cobtransa->getMontra());
      if ($pagmaytra=='S' && $difpag>0){
        if (!Cuentasxcobrar::buscarTransNotCre($cobtransa->getNumtra()))
           Herramientas::EliminarRegistro('Cobdocume','Reftra',$cobtransa->getNumtra());
         else return 6;
      }

      $q= new Criteria();
      $q->add(ContabcPeer::NUMCOM,$cobtransa->getNumcom());
      $q->add(ContabcPeer::FECCOM,$cobtransa->getFeccom());
      $dat= ContabcPeer::doSelectOne($q);
      if ($dat)
      {
      	$q1= new Criteria();
        $q1->add(Contabc1Peer::NUMCOM,$cobtransa->getNumcom());
        $q1->add(Contabc1Peer::FECCOM,$cobtransa->getFeccom());
        Contabc1Peer::doDelete($q1);
        $dat->delete();
      }

      Cuentasxcobrar::eliminarMovlibTrassacion($cobtransa->getNumtra());
  	  Herramientas::EliminarRegistro('Cobrectra','Numtra',$cobtransa->getNumtra());
  	  Herramientas::EliminarRegistro('Cobdestra','Numtra',$cobtransa->getNumtra());
  	  //Herramientas::EliminarRegistro('Cobdetfor','Numtra',$cobtransa->getNumtra());
      $u= new Criteria();
      $u->add(CobdetforPeer::NUMTRA,$cobtransa->getNumtra());
      $resulu= CobdetforPeer::doSelect($u);
      if ($resulu)
      {
        foreach ($resulu as $obju) {
          if ($pagmaytra=='S'){
             if ($obju->getNotcres()!='')
             {
                $cadenanc=split('!',$obju->getNotcres());
                $r=0;
                while ($r<(count($cadenanc)-1))
                {
                  $aux=$cadenanc[$r];
                  $aux2=split('_',$aux);
                  if ($aux2[0]!="")
                  {
                     $qt= new Criteria();
                     $qt->add(CobdocumePeer::REFDOC,$aux2[0]);
                     $regqt= CobdocumePeer::doSelectOne($qt);
                     if ($regqt){
                       $regqt->setAbodoc($regqt->getAbodoc()-H::toFloat($aux2[1]));
                       $regqt->setSaldoc($regqt->getSaldoc()+H::toFloat($aux2[1]));
                       $regqt->save();
                     }
                  }
                  $r++;
                }//while
             }//$obju->getNotcres()
          }
          if ($obju->getGendetche()=='S'){
            Herramientas::EliminarRegistro('Cobfordepche','Numtra',$cobtransa->getNumtra());
          }
          $obju->delete();
        }
      }


  	  Cuentasxcobrar::actualizaTransacion($cobtransa->getNumtra(),$cobtransa->getFectra(),$cobtransa->getCodcli());
  	  //Herramientas::EliminarRegistro('Cobdettra','Numtra',$cobtransa->getNumtra());
      $w= new Criteria();
      $w->add(CobdettraPeer::NUMTRA,$cobtransa->getNumtra());
      $resulw= CobdettraPeer::doSelect($w);
      if ($resulw)
      {
        foreach ($resulw as $objw) {
           if ($objw->getNroant()!='' && $objw->getMonamo()>0){
            $q= new Criteria();
            $q->add(FaantcliPeer::NROANT,$objw->getNroant());
            $q->add(FaantcliPeer::CODCLI,$cobtransa->getCodcli());
            $resulg= FaantcliPeer::doSelectOne($q);
            if ($resulg){
              $resulg->setResant($resulg->getResant()+$objw->getMonamo());
              $resulg->save();
            }
          }
          $objw->delete();
        }
      }
  	  $cobtransa->delete();
  	  return -1;

    }else
    {
      return 1804;
    }
  }

  public function executeAnular()
  {
   $this->referencia=$this->getRequestParameter('referencia');
   $numtra=$this->getRequestParameter('numtra');
   $fectra=$this->getRequestParameter('fectra');

   $dateFormat = new sfDateFormat('es_VE');
   $fec = $dateFormat->format($fectra, 'i', $dateFormat->getInputPattern('d'));

   $c = new Criteria();
   $c->add(CobtransaPeer::NUMTRA,$numtra);
   $c->add(CobtransaPeer::FECTRA,$fec);
   $this->cobtransa = CobtransaPeer::doSelectOne($c);
   sfView::SUCCESS;
  }

  public function executeSalvaranu()
  {
    $numtra=$this->getRequestParameter('numtra');
    $fecanu=$this->getRequestParameter('fecanu');
    $desanu=$this->getRequestParameter('desanu');
    $this->msg='';
    $this->mensaje2="";
    if (Tesoreria::validaPeriodoCerrado($fecanu)==true)
   {
     $coderror=529;
     $this->mensaje2 = Herramientas::obtenerMensajeError($coderror);
     return sfView::SUCCESS;
   }else {
    $fecha_aux=split("/",$fecanu);
    $dateFormat = new sfDateFormat('es_VE');
    $fec = $dateFormat->format($fecanu, 'i', $dateFormat->getInputPattern('d'));

    $c= new Criteria();
    $c->add(CobtransaPeer::NUMTRA,$numtra);
    $resul= CobtransaPeer::doSelectOne($c);
    if ($resul)
    {
      if ($fec>=$resul->getFectra())
      {
        if (!Cuentasxcobrar::verificarHijos($numtra,$msj))
        {
          $pagmaytra=H::getConfApp2('pagmaytra', 'cuentasxcobrar', 'cobtransa');
          $monpagado=Cuentasxcobrar::MontoTotalPagado($resul);
          $difpag=H::toFloat($monpagado)-H::toFloat($resul->getMontra());
          if ($pagmaytra=='S' && $difpag>0){
            if (!Cuentasxcobrar::buscarTransNotCre($numtra)) {
              $y= new Criteria();
              $y->add(CobdocumePeer::REFTRA,$numtra);
              $regy= CobdocumePeer::doSelectOne($y);
              if ($regy){
                $regy->setFecanu($fec);
                $regy->setDesanu($desanu);
                $regy->setStadoc('N');
                $regy->save();
              }
            }else {
               $this->msg="No se pudo anular la registro seleccionado. Asegúrese de que no tiene ningún tipo de registros asociados.";
              return sfView::SUCCESS;
            }
          }
          Cuentasxcobrar::actualizaTransacion($numtra,$resul->getFectra(),$resul->getCodcli());

          $resul->setFecanu($fec);
          $resul->setDesanu($desanu);
          $resul->setStatus('N');
          $resul->save();

          if ($pagmaytra=='S'){
            $u= new Criteria();
            $u->add(CobdetforPeer::NUMTRA,$numtra);
            $resulu= CobdetforPeer::doSelect($u);
            if ($resulu)
            {
              foreach ($resulu as $obju) {        
                   if ($obju->getNotcres()!='')
                   {
                      $cadenanc=split('!',$obju->getNotcres());
                      $r=0;
                      while ($r<(count($cadenanc)-1))
                      {
                        $aux=$cadenanc[$r];
                        $aux2=split('_',$aux);
                        if ($aux2[0]!="")
                        {
                           $qt= new Criteria();
                           $qt->add(CobdocumePeer::REFDOC,$aux2[0]);
                           $regqt= CobdocumePeer::doSelectOne($qt);
                           if ($regqt){
                             $regqt->setAbodoc($regqt->getAbodoc()-H::toFloat($aux2[1]));
                             $regqt->setSaldoc($regqt->getSaldoc()+H::toFloat($aux2[1]));
                             $regqt->save();
                           }
                        }
                        $r++;
                      }//while
                   }//$obju->getNotcres()
              }
            }
          }

         Cuentasxcobrar::anularComprobante($resul->getNumcom(),$resul->getFeccom(),$fec);
         Cuentasxcobrar::anularMovlib($numtra,$fec);
        }
        else
        {
          $this->msg=$msj;
          return sfView::SUCCESS;
        }
      }
      else
      {
        $this->msg="Transaccion no se puede Anular con una Fecha Menor a la de Emision";
        return sfView::SUCCESS;
      }
    }
   }
    return sfView::SUCCESS;
  }


     /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxcomprobante()
  {
     $this->cobtransa = $this->getCobtransaOrCreate();
     $this->updateCobtransaFromRequest();
     $info = $this->cobtransa;     
     $concom=0; $msjuno=""; $msjtres=""; $comprobante=""; $this->msjuno=""; $this->msjtres=""; $this->i=""; $this->formulario=array();
     $this->configGrid();
     $formapagos=Herramientas::CargarDatosGridv2($this,$this->objformapagos);
     $recargos=Herramientas::CargarDatosGridv2($this,$this->objrecargos);
     $descuentos=Herramientas::CargarDatosGridv2($this,$this->objdescuentos);
     $tot = count($formapagos[0]);
     if ($this->cobtransa->getCodcli()=="" || count($formapagos[0])==0 || H::toFloat($this->cobtransa->getMonpagado())==0)
     {
       $msjtres="No se puede Generar el Comprobante, Verique si introdujo los Datos del Cliente,  los Documentos y Forma de Pago, para luego generar el comprobante";
     }

     if ($msjtres=="")
     {
      $x=Cuentasxcobrar::generarComprobante($this->cobtransa,$formapagos,$recargos,$descuentos,$msjuno,$comprobante);
      $concom=$concom + 1;

      if ($msjuno=="")
      {
	      $form="sf_admin/cobtransa/confincomgen";
	      $i=0;
	      while ($i<$concom)
	      {
	       $f[$i]=$form.$i;
	       $this->getUser()->setAttribute('grabar',$comprobante[$i]->getGrabar(),$f[$i]);
	       $this->getUser()->setAttribute('reftra',$comprobante[$i]->getReftra(),$f[$i]);
	       $this->getUser()->setAttribute('numcomp',$comprobante[$i]->getNumcom(),$f[$i]);
	       $this->getUser()->setAttribute('fectra',$comprobante[$i]->getFectra(),$f[$i]);
	       $this->getUser()->setAttribute('destra',$comprobante[$i]->getDestra(),$f[$i]);
	       $this->getUser()->setAttribute('ctas', $comprobante[$i]->getCtas(),$f[$i]);
	       $this->getUser()->setAttribute('desctas', $comprobante[$i]->getDesc(),$f[$i]);
	       $this->getUser()->setAttribute('tipmov', '');
	       $this->getUser()->setAttribute('mov', $comprobante[$i]->getMov(),$f[$i]);
	       $this->getUser()->setAttribute('montos', $comprobante[$i]->getMontos(),$f[$i]);
	       $i++;
	      }
	      $this->i=$concom-1;
	      $this->formulario=$f;
	      }else
	      {
	        $this->msjuno=$msjuno;
	      }
     }
     else
     {
        $this->msjtres=$msjtres;
     }
      $output = '[["cobtransa_totalcomprobantes","'.$concom.'",""],["","",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
  }

   public function validarGeneraComprobante()
  {
    $form="sf_admin/cobtransa/confincomgen";
    $grabo=$this->getUser()->getAttribute('grabo',null,$form.'0');

    if ($grabo=='')
    { return true;}
    else { return false;}
  }

   /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->params=array();
    $this->cobtransa = $this->getCobtransaOrCreate();
    $this->grabo=$this->getRequestParameter('grabo');

    $this->editing();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCobtransaFromRequest();

      if($this->saveCobtransa($this->cobtransa) ==-1){
        {$this->setFlash('notice', 'Your modifications have been saved');

         $id= $this->cobtransa->getId();
         $this->SalvarBitacora($id ,'Guardo');}

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('cobtransa/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('cobtransa/list');
        }
        else
        {
            return $this->redirect('cobtransa/edit?id='.$this->cobtransa->getId().'&grabo=S');
        }

      }else{
        $this->labels = $this->getLabels();
      }

    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
  
/**
   * Función para manejar los filtros de búsqueda
   * de la lista
   *
   */
  protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['numtra_is_empty']))
    {
      $criterion = $c->getNewCriterion(CobtransaPeer::NUMTRA, '');
      $criterion->addOr($c->getNewCriterion(CobtransaPeer::NUMTRA, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['numtra']) && $this->filters['numtra'] !== '')
    {
      $c->add(CobtransaPeer::NUMTRA, strtr("%".$this->filters['numtra']."%", '*', '%'), Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['fectra_is_empty']))
    {
      $criterion = $c->getNewCriterion(CobtransaPeer::FECTRA, '');
      $criterion->addOr($c->getNewCriterion(CobtransaPeer::FECTRA, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['fectra']))
    {
      if (isset($this->filters['fectra']['from']) && $this->filters['fectra']['from'] !== '')
      {
        $criterion = $c->getNewCriterion(CobtransaPeer::FECTRA, date('Y-m-d', $this->filters['fectra']['from']), Criteria::GREATER_EQUAL);
      }
      if (isset($this->filters['fectra']['to']) && $this->filters['fectra']['to'] !== '')
      {
        if (isset($criterion))
        {
          $criterion->addAnd($c->getNewCriterion(CobtransaPeer::FECTRA, date('Y-m-d', $this->filters['fectra']['to']), Criteria::LESS_EQUAL));
        }
        else
        {
          $criterion = $c->getNewCriterion(CobtransaPeer::FECTRA, date('Y-m-d', $this->filters['fectra']['to']), Criteria::LESS_EQUAL);
        }
      }

      if (isset($criterion))
      {
        $c->add($criterion);
      }
    }
    if (isset($this->filters['fecreg_is_empty']))
    {
      $criterion = $c->getNewCriterion(CobtransaPeer::FECREG, '');
      $criterion->addOr($c->getNewCriterion(CobtransaPeer::FECREG, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['fecreg']))
    {
      if (isset($this->filters['fecreg']['from']) && $this->filters['fecreg']['from'] !== '')
      {
        $criterion = $c->getNewCriterion(CobtransaPeer::FECREG, date('Y-m-d', $this->filters['fecreg']['from']), Criteria::GREATER_EQUAL);
      }
      if (isset($this->filters['fecreg']['to']) && $this->filters['fecreg']['to'] !== '')
      {
        if (isset($criterion))
        {
          $criterion->addAnd($c->getNewCriterion(CobtransaPeer::FECREG, date('Y-m-d', $this->filters['fecreg']['to']), Criteria::LESS_EQUAL));
        }
        else
        {
          $criterion = $c->getNewCriterion(CobtransaPeer::FECREG, date('Y-m-d', $this->filters['fecreg']['to']), Criteria::LESS_EQUAL);
        }
      }

      if (isset($criterion))
      {
        $c->add($criterion);
      }
    }
    if (isset($this->filters['codcli_is_empty']))
    {
      $criterion = $c->getNewCriterion(CobtransaPeer::CODCLI, '');
      $criterion->addOr($c->getNewCriterion(CobtransaPeer::CODCLI, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codcli']) && $this->filters['codcli'] !== '')
    {
      $c->add(CobtransaPeer::CODCLI, strtr("%".$this->filters['codcli']."%", '*', '%'), Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['nompro_is_empty']))
    {
      $criterion = $c->getNewCriterion(CobtransaPeer::NOMPRO, '');
      $criterion->addOr($c->getNewCriterion(CobtransaPeer::NOMPRO, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nompro']) && $this->filters['nompro'] !== '')
    {
      $c->add(FaclientePeer::NOMPRO,strtr("%".$this->filters['nompro']."%", '*', '%'), Criteria::LIKE);
      $c->addJoin(CobtransaPeer::CODCLI, FaclientePeer::CODPRO);
      $c->setIgnoreCase(true);
    }
    if (isset($this->filters['codedo_is_empty']))
    {
      $criterion = $c->getNewCriterion(CobtransaPeer::CODEDO, '');
      $criterion->addOr($c->getNewCriterion(CobtransaPeer::CODEDO, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codedo']) && $this->filters['codedo'] !== '')
    {
       $c->add(FaclientePeer::CODEDO,strtr("%".$this->filters['codedo']."%", '*', '%'), Criteria::LIKE);
       $c->addJoin(CobtransaPeer::CODCLI, FaclientePeer::CODPRO);
       $c->setIgnoreCase(true);
    }
    if (isset($this->filters['nomedo_is_empty']))
    {
      $criterion = $c->getNewCriterion(CobtransaPeer::NOMEDO, '');
      $criterion->addOr($c->getNewCriterion(CobtransaPeer::NOMEDO, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nomedo']) && $this->filters['nomedo'] !== '')
    {
        $c->add(OcestadoPeer::NOMEDO, strtr("%".$this->filters['nomedo']."%", '*', '%'), Criteria::LIKE);
        $c->addJoin(CobtransaPeer::CODCLI,  FaclientePeer::CODPRO); 
        $c->addJoin(FaclientePeer::CODEDO,  OcestadoPeer::CODEDO);
        $c->setIgnoreCase(true);
    }
    if (isset($this->filters['destra_is_empty']))
    {
      $criterion = $c->getNewCriterion(CobtransaPeer::DESTRA, '');
      $criterion->addOr($c->getNewCriterion(CobtransaPeer::DESTRA, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['destra']) && $this->filters['destra'] !== '')
    {
      $c->add(CobtransaPeer::DESTRA, strtr("%".$this->filters['destra']."%", '*', '%'), Criteria::LIKE);
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
    $codcli=$this->getRequestParameter('cobtransa_codcli', '');
    $javascript="";  $jsonextra="";
      switch ($name) {
         case ('a'):   //grid a detalle 
            switch ($col) {
             case ('13'):   //Numero de Anticipo
                if ($grid[$fila][$col-1]!="")
                {
                   $q= new Criteria();
                   $q->add(FaantcliPeer::NROANT,$grid[$fila][$col-1]);
                   $q->add(FaantcliPeer::CODCLI,$codcli);
                   $resulg= FaantcliPeer::doSelectOne($q);
                   if ($resulg)
                   {
                     if ($resulg->getResant()>0){
                        $grid[$fila][13]=date('d/m/Y', strtotime($resulg->getFecant()));
                        $grid[$fila][14]=eregi_replace("[\n|\r|\n\r]","",htmlspecialchars($resulg->getDesant()));
                        $grid[$fila][15]=H::FormatoMonto($resulg->getTotant());
                        $grid[$fila][16]=$resulg->getResant();
                     }else {
                      $javascript = "alert_('El Anticipo esta Totalmente Amortizado');";
                      $grid[$fila][$col-1]="";
                     }
                   }else {
                    $javascript = "alert_('El Anticipo no esta registrado o no esta asociado a ese Cliente');";
                    $grid[$fila][$col-1]="";
                   }                   
                }                  
              $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;        
              case ('18'):  //Monto amortizar
                if ($grid[$fila][$col-1]!="")
                {
                  $monpagar=H::toFloat($grid[$fila][5]);
                  $resto=H::toFloat($grid[$fila][16]);
                  $amonto=H::toFloat($grid[$fila][$col-1]);
                  if ($amonto>$monpagar)
                  {
                    $javascript = "alert_('El Monto a Amortizar es mayor al Monto a Pagar');";
                    $grid[$fila][$col-1]="0,00";
                  }else if ($amonto>$resto)
                  {
                    $javascript = "alert_('El Monto a Amortizar es mayor al Monto restante del Anticipo $resto');";
                    $grid[$fila][$col-1]="0,00";
                  }                  
                }
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

/**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el obejto del modelo base del formulario.
   *
   */
  protected function updateCobtransaFromRequest()
  {
    $cobtransa = $this->getRequestParameter('cobtransa');

    $fields = CobtransaPeer::getFieldNames();

    if(array_search('Codalmusu', $fields))
    {
      if (isset($cobtransa['codalmusu']))
      {
        $this->cobtransa->setCodalmusu($cobtransa['codalmusu']);
      }
    }
    if (isset($cobtransa['numtra']))
    {
      $this->cobtransa->setNumtra($cobtransa['numtra']);
    }
    if (isset($cobtransa['fectra']))
    {
      if ($cobtransa['fectra'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($cobtransa['fectra']))
          {
            $value = $dateFormat->format($cobtransa['fectra'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $cobtransa['fectra'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->cobtransa->setFectra($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->cobtransa->setFectra(null);
      }
    }
    /*if (isset($cobtransa['fecdes']))
    {
      $this->cobtransa->setFecdes($cobtransa['fecdes']);
    }
    if (isset($cobtransa['fechas']))
    {
      $this->cobtransa->setFechas($cobtransa['fechas']);
    }*/
    if (isset($cobtransa['fecdes']))
    {
      if ($cobtransa['fecdes'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($cobtransa['fecdes']))
          {
            $value = $dateFormat->format($cobtransa['fecdes'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $cobtransa['fecdes'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->cobtransa->setFecdes($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->cobtransa->setFecdes(null);
      }
    }
    if (isset($cobtransa['fechas']))
    {
      if ($cobtransa['fechas'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($cobtransa['fechas']))
          {
            $value = $dateFormat->format($cobtransa['fechas'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $cobtransa['fechas'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->cobtransa->setFechas($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->cobtransa->setFechas(null);
      }
    }
    if (isset($cobtransa['estado']))
    {
      $this->cobtransa->setEstado($cobtransa['estado']);
    }
    if (isset($cobtransa['codcenaco']))
    {
      $this->cobtransa->setCodcenaco($cobtransa['codcenaco']);
    }
    if (isset($cobtransa['codcli']))
    {
      $this->cobtransa->setCodcli($cobtransa['codcli']);
    }
    if (isset($cobtransa['rifpro']))
    {
      $this->cobtransa->setRifpro($cobtransa['rifpro']);
    }
    if (isset($cobtransa['nompro']))
    {
      $this->cobtransa->setNompro($cobtransa['nompro']);
    }
    if (isset($cobtransa['fatipmov_id']))
    {
    $this->cobtransa->setFatipmovId($cobtransa['fatipmov_id'] ? $cobtransa['fatipmov_id'] : null);
    }
    if (isset($cobtransa['destra']))
    {
      $this->cobtransa->setDestra($cobtransa['destra']);
    }
    if (isset($cobtransa['tottra']))
    {
      $this->cobtransa->setTottra($cobtransa['tottra']);
    }
    if (isset($cobtransa['totret']))
    {
      $this->cobtransa->setTotret($cobtransa['totret']);
    }
    if (isset($cobtransa['totant']))
    {
      $this->cobtransa->setTotant($cobtransa['totant']);
    }
    if (isset($cobtransa['comprobante']))
    {
      $this->cobtransa->setComprobante($cobtransa['comprobante']);
    }
    if (isset($cobtransa['grid_recargos']))
    {
      $this->cobtransa->setGridRecargos($cobtransa['grid_recargos']);
    }
    if (isset($cobtransa['grid_descuentos']))
    {
      $this->cobtransa->setGridDescuentos($cobtransa['grid_descuentos']);
    }
    if (isset($cobtransa['botones']))
    {
      $this->cobtransa->setBotones($cobtransa['botones']);
    }
    if (isset($cobtransa['btnrec']))
    {
      $this->cobtransa->setBtnrec($cobtransa['btnrec']);
    }
    if (isset($cobtransa['btndes']))
    {
      $this->cobtransa->setBtndes($cobtransa['btndes']);
    }
    if (isset($cobtransa['documentos']))
    {
      $this->cobtransa->setDocumentos($cobtransa['documentos']);
    }
    if (isset($cobtransa['codtip']))
    {
      $this->cobtransa->setCodtip($cobtransa['codtip']);
    }
    if (isset($cobtransa['formasdepago']))
    {
      $this->cobtransa->setFormasdepago($cobtransa['formasdepago']);
    }

    if (isset($cobtransa['numtra']))
    {
      $this->cobtransa->setNumtra($cobtransa['numtra']);
    }
    if (isset($cobtransa['fectra']))
    {
      if ($cobtransa['fectra'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($cobtransa['fectra']))
          {
            $value = $dateFormat->format($cobtransa['fectra'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $cobtransa['fectra'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->cobtransa->setFectra($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->cobtransa->setFectra(null);
      }
    }
    if (isset($cobtransa['codcli']))
    {
      $this->cobtransa->setCodcli($cobtransa['codcli']);
    }
    if (isset($cobtransa['destra']))
    {
      $this->cobtransa->setDestra($cobtransa['destra']);
    }
    if (isset($cobtransa['montra']))
    {
      $this->cobtransa->setMontra($cobtransa['montra']);
    }
    if (isset($cobtransa['totdsc']))
    {
      $this->cobtransa->setTotdsc($cobtransa['totdsc']);
    }
    if (isset($cobtransa['totrec']))
    {
      $this->cobtransa->setTotrec($cobtransa['totrec']);
    }
    if (isset($cobtransa['tottra']))
    {
      $this->cobtransa->setTottra($cobtransa['tottra']);
    }
    if (isset($cobtransa['status']))
    {
      $this->cobtransa->setStatus($cobtransa['status']);
    }
    if (isset($cobtransa['numcom']))
    {
      $this->cobtransa->setNumcom($cobtransa['numcom']);
    }
    if (isset($cobtransa['feccom']))
    {
      if ($cobtransa['feccom'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($cobtransa['feccom']))
          {
            $value = $dateFormat->format($cobtransa['feccom'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $cobtransa['feccom'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->cobtransa->setFeccom($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->cobtransa->setFeccom(null);
      }
    }
    if (isset($cobtransa['fecanu']))
    {
      if ($cobtransa['fecanu'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($cobtransa['fecanu']))
          {
            $value = $dateFormat->format($cobtransa['fecanu'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $cobtransa['fecanu'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->cobtransa->setFecanu($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->cobtransa->setFecanu(null);
      }
    }
    if (isset($cobtransa['desanu']))
    {
      $this->cobtransa->setDesanu($cobtransa['desanu']);
    }
    if (isset($cobtransa['fatipmov_id']))
    {
    $this->cobtransa->setFatipmovId($cobtransa['fatipmov_id'] ? $cobtransa['fatipmov_id'] : null);
    }

    if (isset($cobtransa['filasdet']))
    {
      $this->cobtransa->setFilasdet($cobtransa['filasdet']);
    }
    if (isset($cobtransa['totmonpag']))
    {
      $this->cobtransa->setTotmonpag($cobtransa['totmonpag']);
    }
    if (isset($cobtransa['totmonrec']))
    {
      $this->cobtransa->setTotmonrec($cobtransa['totmonrec']);
    }
    if (isset($cobtransa['totmondes']))
    {
      $this->cobtransa->setTotmondes($cobtransa['totmondes']);
    }
    if (isset($cobtransa['totmonnet']))
    {
      $this->cobtransa->setTotmonnet($cobtransa['totmonnet']);
    }
    if (isset($cobtransa['monpagado']))
    {
      $this->cobtransa->setMonpagado($cobtransa['monpagado']);
    }
    if (isset($cobtransa['filasfor']))
    {
      $this->cobtransa->setFilasfor($cobtransa['filasfor']);
    }
    if (isset($cobtransa['hayingreso']))
    {
      $this->cobtransa->setHayingreso($cobtransa['hayingreso']);
    }
    if (isset($cobtransa['docfil']))
    {
      $this->cobtransa->setDocfil($cobtransa['docfil']);
    }
    if (isset($cobtransa['orifil']))
    {
      $this->cobtransa->setOrifil($cobtransa['orifil']);
    }
    if (isset($cobtransa['recvie']))
    {
      $this->cobtransa->setRecvie($cobtransa['recvie']);
    }
    if (isset($cobtransa['desvie']))
    {
      $this->cobtransa->setDesvie($cobtransa['desvie']);
    }
    if (isset($cobtransa['fildet']))
    {
      $this->cobtransa->setFildet($cobtransa['fildet']);
    }
    if (isset($cobtransa['numcom']))
    {
      $this->cobtransa->setNumcom($cobtransa['numcom']);
    }
    if (isset($cobtransa['filgenmov']))
    {
      $this->cobtransa->setFilgenmov($cobtransa['filgenmov']);
    }
    if (isset($cobtransa['totalcomprobantes']))
    {
      $this->cobtransa->setTotalcomprobantes($cobtransa['totalcomprobantes']);
    }
    if (isset($cobtransa['idrefer']))
    {
      $this->cobtransa->setIdrefer($cobtransa['idrefer']);
    }
    if (isset($cobtransa['coddirec']))
    {
      $this->cobtransa->setCoddirec($cobtransa['coddirec']);
    }

  }

  public function getLabels()
  {
    $labels = parent::getLabels();
 
    $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
    if ($cambiareti=='S')
      $labels['cobtransa{coddirec}'] = 'Estado';
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

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/cobtransa/filters');

    $loguse= $this->getUser()->getAttribute('loguse');
    $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr'); 

     // 15    // pager
    $this->pager = new sfPropelPager('Cobtransa', 15);
    $c = new Criteria();
    if ($filsoldir=='S'){
      $this->sql='cobtransa.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
      $c->add(CobtransaPeer::CODDIREC,$this->sql,Criteria::CUSTOM); 
    }
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }  

}
