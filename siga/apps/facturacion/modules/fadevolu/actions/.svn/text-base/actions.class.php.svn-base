<?php

/**
 * fadevolu actions.
 *
 * @package    Roraima
 * @subpackage fadevolu
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 45528 2011-08-12 19:35:10Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class fadevoluActions extends autofadevoluActions
{
  private $coderror =-1;

   /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->fadevolu = $this->getFadevoluOrCreate();
    if (!$this->fadevolu->getId()){        
        $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr');
        if ($filsoldir=='S'){
           $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
           $t= new Criteria();
           $t->add(SegdirusuPeer::LOGUSE,$loguse);
           $t->setLimit(1);
           $t->addAscendingOrderByColumn(SegdirusuPeer::CODDIREC);
           $regt= SegdirusuPeer::doSelectOne($t); 
           if ($regt){
            if ($this->fadevolu->getCoddirec()=='')
              $this->fadevolu->setCoddirec($regt->getCoddirec());
           }
          
        }
      }

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFadevoluFromRequest();

      $this->saveFadevolu($this->fadevolu);

      $this->fadevolu->setId(Herramientas::getX_vacio('NRODEV','fadevolu','id',$this->fadevolu->getNrodev()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

 	  if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('fadevolu/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('fadevolu/list');
      }
      else
      {
        return $this->redirect('fadevolu/edit?id='.$this->fadevolu->getId());
      }

    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }


  protected function getFadevoluOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $fadevolu = new Fadevolu();
      $this->configGridDetalle('', $this->getRequestParameter('fadevolu[refdes]'));
    }
    else
    {
      $fadevolu = FadevoluPeer::retrieveByPk($this->getRequestParameter($id));
	  $this->configGridDetalle($fadevolu->getNrodev(),'');
      $this->forward404Unless($fadevolu);

    }

    return $fadevolu;
  }

/*
  /**
   * Actualiza la informacion que viene de la vista
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
 /* protected function updateFadevoluFromRequest()
  {
    $fadevolu = $this->getRequestParameter('fadevolu');


    if (isset($fadevolu['nrodev']))
    {
      $this->fadevolu->setNrodev($fadevolu['nrodev']);
    }
    if (isset($fadevolu['fecdev']))
    {
      if ($fadevolu['fecdev'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fadevolu['fecdev']))
          {
            $value = $dateFormat->format($fadevolu['fecdev'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fadevolu['fecdev'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fadevolu->setFecdev($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fadevolu->setFecdev(null);
      }
    }
    if (isset($fadevolu['codalm']))
    {
      $this->fadevolu->setCodalm($fadevolu['codalm']);
    }
    if (isset($fadevolu['nomalm']))
    {
      $this->fadevolu->setNomalm($fadevolu['nomalm']);
    }
    if (isset($fadevolu['refdes']))
    {
      $this->fadevolu->setRefdes($fadevolu['refdes']);
    }
    if (isset($fadevolu['desdev']))
    {
      $this->fadevolu->setDesreq($fadevolu['desdev']);
    }


    if (isset($fadevolu['rifpro']))
    {
      $this->fadevolu->setRifpro($fadevolu['rifpro']);
    }
    if (isset($fadevolu['nompro']))
    {
      $this->fadevolu->setNompro($fadevolu['nompro']);
    }
    if (isset($fadevolu['dirpro']))
    {
      $this->fadevolu->setDirpro($fadevolu['dirpro']);
    }
    if (isset($fadevolu['telpro']))
    {
      $this->fadevolu->setTelpro($fadevolu['telpro']);
    }
    if (isset($fadevolu['fatipdev_id']))
    {
      $this->fadevolu->setFatipdevId($fadevolu['fatipdev_id']);
    }

  }
*/

  public function executeAutocomplete()
  {
    if ($this->getRequestParameter('ajax')=='1')
      {
       $this->tags=Herramientas::autocompleteAjax('REQART','Cadphart','reqart',$this->getRequestParameter('fadevolu[refdes]'));
      }
    else if ($this->getRequestParameter('ajax')=='2')
      {
       $this->tags=Herramientas::autocompleteAjax('CODALM','Cadefalm','Codalm',$this->getRequestParameter('fadevolu[codalm]'));
      }
  }

  public function executeGrid(){
  	$javascript = '';
	if ($this->getRequestParameter('codigo')!=""){
		if ($this->getRequestParameter('ajax')=='1'){
			$codpro = '';
			$rifpro = '';
			$nompro = '';
			$dirpro = '';
			$telpro = '';
      $cuantosart=0;
      $t1=""; $t2="";
          $fildesp=H::getConfApp2('fildes', 'facturacion', 'fadesp');
            $codigo=$this->getRequestParameter('codigo');
            $c = new Criteria();
      		$c->add(CadphartPeer::DPHART,$codigo);
      		$datos = CadphartPeer::doSelectOne($c);
      		if ($datos)
      		{
      			if ($datos->getStadph() == 'A'){
              //verifico que hayan articulos aun con disponibilidad para devolver
              //desi me va a regañar porque no lo hice con criteria
              $criterio = "select count(*) as cuantos from caartdph where dphart='".$datos->getDphart()."' and candph>candev";
              if (H::BuscarDatos($criterio,  $tabla)) {
                $cuantosart= $tabla[0]["cuantos"];
              }

              if ($cuantosart==0){
                  $javascript = "alert('Este Despacho no tiene articulos disponibles para devolución');";
                  $this->configGrid();
                  $output = '[["javascript","'.$javascript.'",""]]';
                  $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
              }
              else{
                    if ($fildesp=='S'){
                      if ($datos->getStadev() == 'S')
                        {
                          $javascript = "alert('No puede hacer Devoluciones sobre un Despacho Aprobado');";
                          $this->configGrid();
                          $output = '[["javascript","'.$javascript.'",""]]';
                          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
                        }else {
                          $codpro = $datos->getCodcli();
                          $coddirec=$datos->getCoddirec();
                          $desdir=H::getX('CODDIREC','cadefdirec','Desdirec',$coddirec);
                          $t2=$datos->getCodalm();
                          $t1=H::getX_vacio('CODALM','Cadefalm','Nomalm',$datos->getCodalm());
                          if ($codpro != ''){
                            $c2 = new Criteria();
                            $c2->add(FaclientePeer::CODPRO, $codpro);
                            $reg2 = FaclientePeer::doSelectOne($c2);
                            if ($reg2){
                            $rifpro = $reg2->getRifpro();
                            $nompro = $reg2->getNompro();
                            $dirpro = $reg2->getDirpro();
                            $telpro = $reg2->getTelpro();
  
                            }
  
                          }
                          $this->configGridDetalle('', $codigo);
  
                              $output = '[["fadevolu_codpro","'.$codpro.'",""],["fadevolu_rifpro","'.$rifpro.'",""],["fadevolu_nompro","'.$nompro.'",""],["fadevolu_dirpro","'.$dirpro.'",""],["fadevolu_telpro","'.$telpro.'",""],["fadevolu_nomalm","'.$t1.'",""],["fadevolu_codalm","'.$t2.'",""],["fadevolu_coddirec","'.$coddirec.'",""],["fadevolu_desdirec","'.$desdir.'",""],["javascript","'.$javascript.'",""]]';
                            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
                              //return sfView::HEADER_ONLY;
                        }
                    }else {
                      $codpro = $datos->getCodcli();
                      $t2=$datos->getCodalm(); 
                      $t1=H::getX_vacio('CODALM','Cadefalm','Nomalm',$datos->getCodalm());
                    if ($codpro != ''){
                      $c2 = new Criteria();
                      $c2->add(FaclientePeer::CODPRO, $codpro);
                      $reg2 = FaclientePeer::doSelectOne($c2);
                      if ($reg2){
                      $rifpro = $reg2->getRifpro();
                      $nompro = $reg2->getNompro();
                      $dirpro = $reg2->getDirpro();
                      $telpro = $reg2->getTelpro();
  
                      }
  
                    }
                    $this->configGridDetalle('', $codigo);
  
                        $output = '[["fadevolu_codpro","'.$codpro.'",""],["fadevolu_rifpro","'.$rifpro.'",""],["fadevolu_nompro","'.$nompro.'",""],["fadevolu_dirpro","'.$dirpro.'",""],["fadevolu_telpro","'.$telpro.'",""],["fadevolu_nomalm","'.$t1.'",""],["fadevolu_codalm","'.$t2.'",""],["javascript","'.$javascript.'",""]]';
                      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
                        //return sfView::HEADER_ONLY;
                   }
                }
      			}
      			else{
	                $javascript = "alert('No puede hacer Devoluciones sobre un Despacho Anulado');";
                  $this->configGrid();
			        $output = '[["javascript","'.$javascript.'",""]]';
			        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      			}
      		}
      		else
      		{//no existe el despacho
                $javascript = "alert('El número de despacho no existe');";
		        $output = '[["javascript","'.$javascript.'",""]]';
		        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		        $this->configGrid();

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
  public function configGrid(){
	$this->configGridDetalle($this->getRequestParameter('fadevolu[nrodev]'), $this->getRequestParameter('fadevolu[refdes]'));
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridDetalle($nrodev = '', $codigo='')
  {

	   $reg = array();

	   if ($codigo!="")
	   {
         $c= new Criteria();
         $c->add(CaartdphPeer::DPHART,$codigo);
         //solo deberia mostrar articulos que aun pueden ser devueltos
         $c->add(CaartdphPeer::CANDPH, "CANDPH>CANDEV", Criteria::CUSTOM);

         $reg= CaartdphPeer::doSelect($c);
          $i=0;
          while ($i<count($reg))
          {
            if ($reg[$i]->getCandev()>0)
              $reg[$i]->setCandev(0);
            $i++;
          }
	   }
	   else{
	   	 if ($nrodev != ''){
		     $c= new Criteria();
		     $c->add(FaartdevPeer::NRODEV,$nrodev);
		     $reg= FaartdevPeer::doSelect($c);
	   	 }
	   }

	    // Se crea el objeto principal de la clase OpcionesGrid
	    $opciones = new OpcionesGrid();
	    // Se configuran las opciones globales del Grid
        $opciones->setEliminar(false);
	    if ($codigo!=""){
		    $opciones->setTabla('Caartdph');
	    }
        else{
        	$opciones->setTabla('Faartdev');
        }
        $opciones->setAnchoGrid(1400);
        $opciones->setAncho(1400);
        $opciones->setTitulo('Detalle de la Devolución');
        $opciones->setName('a');
        $opciones->setFilas(0);
        $opciones->setHTMLTotalFilas(' ');

        // Se generan las columnas
        $col1 = new Columna('Código del Artículo');
        $col1->setTipo(Columna::TEXTO);
        $col1->setEsGrabable(true);
        $col1->setAlineacionObjeto(Columna::CENTRO);
        $col1->setAlineacionContenido(Columna::CENTRO);
        $col1->setNombreCampo('codart');
        $col1->setHTML('type="text" size="20" readonly=true');

        $col2 = new Columna('Descripción');
        $col2->setTipo(Columna::TEXTAREA);
        $col2->setAlineacionObjeto(Columna::IZQUIERDA);
        $col2->setAlineacionContenido(Columna::IZQUIERDA);
        $col2->setNombreCampo('desart');
        $col2->setHTML('type="text" size="30x1" readonly=true');

        $col7 = clone $col2;
        $col7->setTipo(Columna::TEXTO);
        $col7->setTitulo('U. Medida');
        $col7->setNombreCampo('unimed');
        $col7->setHTML('type="text" size="20" readonly=true');

        $col3 = new Columna('Cant. Desp');
        $col3->setTipo(Columna::MONTO);
        $col3->setEsGrabable(true);
        $col3->setAlineacionContenido(Columna::IZQUIERDA);
        $col3->setAlineacionObjeto(Columna::IZQUIERDA);
       // $col3->setNombreCampo('canreq');
        if ($codigo!="")
		   $col3->setNombreCampo('candph');
        else
           $col3->setNombreCampo('candes');
        $col3->setEsNumerico(true);
        $col3->setHTML('type="text" size="10" readonly=true');

        $col4 = clone $col3;
        $col4->setTitulo('Cant. a Devolver');
    		$col4->setNombreCampo('candev');
        $col4->setHTML('type="text" size="10"');
        $col4->setJScript('');
        $col4->setHTML('onBlur=Cantidad(this.id);');

        $col5 = clone $col3;
        $col5->setTitulo('Costo');
        $col5->setNombreCampo('preart');
        $col5->setHTML('type="text" size="10" readonly=true');
        $col5->setJScript('');

        $col6 = clone $col3;
        $col6->setTitulo('Total');
        if ($codigo!="")
        	$col6->setNombreCampo('montot');
        else
        	$col6->setNombreCampo('totart');
        $col6->setHTML('type="text" size="10" readonly=true');
        $col6->setJScript('');
        $col6->setEsTotal(true,'fadevolu_mondev');

        $col7 = new Columna('Código del Almacen');
        $col7->setTipo(Columna::TEXTO);
        $col7->setEsGrabable(true);
        $col7->setAlineacionObjeto(Columna::CENTRO);
        $col7->setAlineacionContenido(Columna::CENTRO);
        $col7->setNombreCampo('codalm');
        $col7->setHTML('type="text" size="10" readonly=true');
        //$col7->setOculta(true);

        $col8 = new Columna('Código Ubicación');
        $col8->setTipo(Columna::TEXTO);
        $col8->setEsGrabable(true);
        $col8->setAlineacionObjeto(Columna::CENTRO);
        $col8->setAlineacionContenido(Columna::CENTRO);
        $col8->setNombreCampo('codubi');
        $col8->setHTML('type="text" size="10" readonly=true');
        //$col8->setOculta(true);    
        
        $col9 = new Columna('Num. Lote');
        $col9->setTipo(Columna::TEXTO);
        $col9->setEsGrabable(true);
        $col9->setAlineacionObjeto(Columna::CENTRO);
        $col9->setAlineacionContenido(Columna::CENTRO);
        $col9->setNombreCampo('numlot');
        $col9->setHTML('type="text" size="10" readonly=true');
        //$col9->setOculta(true);             

        $col10 = new Columna('Cant. Devuelta');
        $col10->setTipo(Columna::MONTO);
        $col10->setEsGrabable(true);
        $col10->setAlineacionContenido(Columna::IZQUIERDA);
        $col10->setAlineacionObjeto(Columna::IZQUIERDA);
        $col10->setEsNumerico(true);
        $col10->setNombreCampo('candev2');
        $col10->setHTML('type="text" size="10"');
        if ($nrodev!="") $col10->setOculta(true);

        // Se guardan las columnas en el objetos de opciones
        $opciones->addColumna($col1);
        $opciones->addColumna($col2);
        $opciones->addColumna($col3);
        $opciones->addColumna($col4);
        $opciones->addColumna($col5);
        $opciones->addColumna($col6);
        $opciones->addColumna($col7);
        $opciones->addColumna($col8);
        $opciones->addColumna($col9);
        $opciones->addColumna($col10);
	    // Ee genera el arreglo de opciones necesario para generar el grid
        $this->obj = $opciones->getConfig($reg);

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
    switch ($ajax){
      case '1':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      case '2':
        $dato=CadefalmPeer::getDesalmacen($codigo);
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","6","c"]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      	return sfView::HEADER_ONLY;
      case '3':
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
           $javascript="alert_('La Direcci&oacute;n no existe'); $('fadevolu_coddirec').value=''; $('fadevolu_desdirec').value=''; $('fadevolu_coddirec').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;       
      case '4' :
        $dateFormat = new sfDateFormat('es_VE');
        $fecha = $dateFormat->format($this->getRequestParameter('codigo'), 'i', $dateFormat->getInputPattern('d'));

        $c = new Criteria();
        $c->add(FadevoluPeer::NRODEV, $this->getRequestParameter('nrodev'));
        $data = FadevoluPeer::doSelectOne($c);
        if ($data) {
          if ($fecha < $data->getFecdev()) {
            $msj = "alert_('La Fecha de Anulaci&oacute;n no puede ser menor a la fecha de la Devoluci&oacute;n'); $('fadevolu_fecanu').value=''";
          } else {
            $msj = "";
          }
        } else {
          $msj = "";
        }
        $output = '[["javascript","' . $msj . '",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        return sfView :: HEADER_ONLY; 
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
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
  public function validateEdit()
  {
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->fadevolu = $this->getFadevoluOrCreate();
      try{ $this->updateFadevoluFromRequest();}
      catch (Exception $ex){}

      if (Tesoreria::validarFechaPerContable($this->getRequestParameter('fadevolu[fecdev]')))
      {
        $this->coderror=521;
        return false;
      }      

	  $grid=Herramientas::CargarDatosGrid($this,$this->obj);
	  $x=$grid[0];
    if (count($x)==0)
    {
      $this->coderror=4;
      return false;
    }
      $j=0;
      $cntador=0;
      while ($j<count($x))
      {
      	if ($x[$j]->getCandev()>0){
          $cntador++;
          if ($x[$j]->getCandev()> (H::toFloat($x[$j]->getCandph())-H::toFloat($x[$j]->getCandev2())))
          {
            $this->coderror=1188;
            return false;
          }

	         $c= new Criteria();
	         $c->add(CaartalmPeer::CODALM,$this->fadevolu->getCodalm());
	         $c->add(CaartalmPeer::CODART,$x[$j]->getCodart());
	         $reg= CaartalmPeer::doSelectOne($c);
    			 if (!$reg){
    	            $this->coderror=1127;
    	            return false;
    			 }
           
      	}      	
         $j++;
      } //while ($j<count($x))

      if ($cntador==0){
        $this->coderror=3015;
        return false;
      }

   	  return true;

    }else return true;
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
    $this->fadevolu = $this->getFadevoluOrCreate();
    try{
    $this->updateFadevoluFromRequest();
    }
    catch(Exception $ex){}
	$grid2=Herramientas::CargarDatosGrid($this,$this->obj);
    $this->labels = $this->getLabels();
	//$this->configGrid();
 	if($this->coderror!=-1)
      {
       $err = Herramientas::obtenerMensajeError($this->coderror);
       $this->getRequest()->setError('',$err);
      }

    return sfView::SUCCESS;
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
  protected function saveFadevolu($fadevolu)
  {
    if ($fadevolu->getId())
    {
      $fadevolu->save();

    }
    else //nuevo
    {
  	  $grid2=Herramientas::CargarDatosGrid($this,$this->obj);      

	  Facturacion::salvarFadevolu($fadevolu,$grid2);
    }
    return -1;
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
    $error=Facturacion:: validaDispoDevolu($nrodev);
    if ($error==-1) {
      $q= new Criteria();
      $q->add(FaartdevPeer::NRODEV,$clasemodelo->getNrodev());
      $regq= FaartdevPeer::doSelect($q);
      if ($regq){
        foreach ($regq as $objq) {
          $codarti=$objq->getCodart();
           $p= new Criteria();
           $p->add(CaregartPeer::CODART,$codarti);
           $resul= CaregartPeer::doSelectOne($p);
           if ($resul)
           {
                 $tipo=$resul->getTipo();
                 if ($resul->getTipo()=='A')
                 {
                   $resul->setExitot($resul->getExitot() - $objq->getCandev());
                   $resul->setDistot($resul->getDistot() - $objq->getCandev());
                   $resul->save();
                 }
           }

           $p= new Criteria();
           $p->add(CaartalmPeer::CODALM,$objq->getCodalm());
           $p->add(CaartalmPeer::CODART,$objq->getCodart());         
           $resultp= CaartalmPeer::doSelectOne($p);
           if ($resultp)
           {
            if ($tipo=='A')
            {
              $resultp->setExiact($resultp->getExiact() - $objq->getCandev());
              $resultp->save();
            }
           }
           
           $t= new Criteria();
           $t->add(CaartalmubiPeer::CODALM,$objq->getCodalm());
           $t->add(CaartalmubiPeer::CODART,$objq->getCodart());
           $t->add(CaartalmubiPeer::CODUBI,$objq->getCodubi());
           if ($objq->getNumlot()!='')
             $t->add(CaartalmubiPeer::NUMLOT,$objq->getNumlot());
           $result= CaartalmubiPeer::doSelectOne($t);
           if ($result)
           {
            if ($tipo=='A')
            {
              $result->setExiact($result->getExiact() - $objq->getCandev());
              $result->save();
            }
           }

           $sql = "select * from caartdph where dphart ='" . $clasemodelo->getRefdes() . "' and codart = '" . $codarti. "'";
           if (Herramientas :: BuscarDatos($sql, $resul)) {
            if ($resul){
              foreach ($resul as $r){
                   $c = new Criteria();
                   $c->add(CaartdphPeer::DPHART,$r['dphart']);
                   $c->add(CaartdphPeer::CODART,$r['codart']);
                   $arti = CaartdphPeer::doSelectOne($c);
                   if ($arti){
                       $act1=$arti->getCandev() - $objq->getCandev();
                       $arti->setCandev($act1);
                       $arti->save();
                   }
              }
            }
          }

       $objq->delete();
      }      
    }
      return parent::deleting($clasemodelo);
  }else {
    return $error;
  }
  }
  
  /**
   * Función para manejar los filtros de búsqueda
   * de la lista
   *
   */
  protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['nrodev_is_empty']))
    {
      $criterion = $c->getNewCriterion(FadevoluPeer::NRODEV, '');
      $criterion->addOr($c->getNewCriterion(FadevoluPeer::NRODEV, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nrodev']) && $this->filters['nrodev'] !== '')
    {
      $c->add(FadevoluPeer::NRODEV, strtr("%".$this->filters['nrodev']."%", '*', '%'), Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['fecdev_is_empty']))
    {
      $criterion = $c->getNewCriterion(FadevoluPeer::FECDEV, '');
      $criterion->addOr($c->getNewCriterion(FadevoluPeer::FECDEV, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['fecdev']))
    {
      if (isset($this->filters['fecdev']['from']) && $this->filters['fecdev']['from'] !== '')
      {
        $criterion = $c->getNewCriterion(FadevoluPeer::FECDEV, date('Y-m-d', $this->filters['fecdev']['from']), Criteria::GREATER_EQUAL);
      }
      if (isset($this->filters['fecdev']['to']) && $this->filters['fecdev']['to'] !== '')
      {
        if (isset($criterion))
        {
          $criterion->addAnd($c->getNewCriterion(FadevoluPeer::FECDEV, date('Y-m-d', $this->filters['fecdev']['to']), Criteria::LESS_EQUAL));
        }
        else
        {
          $criterion = $c->getNewCriterion(FadevoluPeer::FECDEV, date('Y-m-d', $this->filters['fecdev']['to']), Criteria::LESS_EQUAL);
        }
      }

      if (isset($criterion))
      {
        $c->add($criterion);
      }
    }
    if (isset($this->filters['refdes_is_empty']))
    {
      $criterion = $c->getNewCriterion(FadevoluPeer::REFDES, '');
      $criterion->addOr($c->getNewCriterion(FadevoluPeer::REFDES, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['refdes']) && $this->filters['refdes'] !== '')
    {
      $c->add(FadevoluPeer::REFDES, strtr("%".$this->filters['refdes']."%", '*', '%'), Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['codpro_is_empty']))
    {
      $criterion = $c->getNewCriterion(FadevoluPeer::CODPRO, '');
      $criterion->addOr($c->getNewCriterion(FadevoluPeer::CODPRO, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codpro']) && $this->filters['codpro'] !== '')
    {
      $c->add(CadphartPeer::CODCLI, $this->filters['codpro']);
      $c->addJoin(FadevoluPeer::REFDES, CadphartPeer::DPHART);
    }
    if (isset($this->filters['nompro_is_empty']))
    {
      $criterion = $c->getNewCriterion(FadevoluPeer::NOMPRO, '');
      $criterion->addOr($c->getNewCriterion(FadevoluPeer::NOMPRO, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nompro']) && $this->filters['nompro'] !== '')
    {
      $c->add(FaclientePeer::NOMPRO, strtr("%".$this->filters['nompro']."%", '*', '%'), Criteria::LIKE);
      $c->addJoin(CadphartPeer::CODCLI, FaclientePeer::CODPRO);
      $c->addJoin(FadevoluPeer::REFDES, CadphartPeer::DPHART);
      $c->setIgnoreCase(true);
    }
    if (isset($this->filters['codedo_is_empty']))
    {
      $criterion = $c->getNewCriterion(FadevoluPeer::CODEDO, '');
      $criterion->addOr($c->getNewCriterion(FadevoluPeer::CODEDO, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codedo']) && $this->filters['codedo'] !== '')
    {
      $c->add(FaclientePeer::CODEDO, $this->filters['codedo']);
      $c->addJoin(CadphartPeer::CODCLI, FaclientePeer::CODPRO);
      $c->addJoin(FadevoluPeer::REFDES, CadphartPeer::DPHART);
    }
    if (isset($this->filters['nomedo_is_empty']))
    {
      $criterion = $c->getNewCriterion(FadevoluPeer::NOMEDO, '');
      $criterion->addOr($c->getNewCriterion(FadevoluPeer::NOMEDO, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nomedo']) && $this->filters['nomedo'] !== '')
    {
      $c->add(OcestadoPeer::NOMEDO, strtr("%".$this->filters['nomedo']."%", '*', '%'), Criteria::LIKE);
      $c->addJoin(FaclientePeer::CODEDO,  OcestadoPeer::CODEDO); 
      $c->addJoin(CadphartPeer::CODCLI,  FaclientePeer::CODPRO); 
      $c->addJoin(FadevoluPeer::REFDES, CadphartPeer::DPHART);
      $c->setIgnoreCase(true);
    }
    if (isset($this->filters['desdev_is_empty']))
    {
      $criterion = $c->getNewCriterion(FadevoluPeer::DESDEV, '');
      $criterion->addOr($c->getNewCriterion(FadevoluPeer::DESDEV, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['desdev']) && $this->filters['desdev'] !== '')
    {
      $c->add(FadevoluPeer::DESDEV, strtr("%".$this->filters['desdev']."%", '*', '%'), Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['codalm_is_empty']))
    {
      $criterion = $c->getNewCriterion(FadevoluPeer::CODALM, '');
      $criterion->addOr($c->getNewCriterion(FadevoluPeer::CODALM, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codalm']) && $this->filters['codalm'] !== '')
    {
      $c->add(FadevoluPeer::CODALM, strtr("%".$this->filters['codalm']."%", '*', '%'), Criteria::LIKE);
      $c->setIgnoreCase(true);
    }
    if (isset($this->filters['nomalm_is_empty']))
    {
      $criterion = $c->getNewCriterion(FadevoluPeer::NOMALM, '');
      $criterion->addOr($c->getNewCriterion(FadevoluPeer::NOMALM, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nomalm']) && $this->filters['nomalm'] !== '')
    {
      $c->add(CadefalmPeer::NOMALM, strtr("%".$this->filters['nomalm']."%", '*', '%'), Criteria::LIKE);
      $c->addJoin(FadevoluPeer::CODALM,CadefalmPeer::CODALM);
      $c->setIgnoreCase(true);
    }
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

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/fadevolu/filters');

    $loguse= $this->getUser()->getAttribute('loguse');
    $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr'); 

     // 15    // pager
    $this->pager = new sfPropelPager('Fadevolu', 15);
    $c = new Criteria();
    /*if ($filsoldir=='S'){
      $this->sql='fadevolu.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
      $c->add(FadevoluPeer::CODDIREC,$this->sql,Criteria::CUSTOM); 
    }*/
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }  

  public function getLabels()
  {
    $labels = parent::getLabels();
 
    $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
    if ($cambiareti=='S')
      $labels['fadevolu{coddirec}'] = 'Estado';
    return $labels;
  }  

  public function executeAnular() {
    $nrodev = $this->getRequestParameter('nrodev');
    $fecdev = $this->getRequestParameter('fecdev');

    $dateFormat = new sfDateFormat('es_VE');
    $fec = $dateFormat->format($fecdev, 'i', $dateFormat->getInputPattern('d'));

    $c = new Criteria();
    $c->add(FadevoluPeer::NRODEV, $nrodev);
    $c->add(FadevoluPeer::FECDEV, $fec);
    $this->fadevolu = FadevoluPeer::doSelectOne($c);
    sfView :: SUCCESS;
  }  

  public function executeSalvaranu() {
    $nrodev = $this->getRequestParameter('nrodev');
    $desanu = $this->getRequestParameter('desanu');
    $fecanu = $this->getRequestParameter('fecanu');
    $fecha_aux = split("/", $fecanu);
    $dateFormat = new sfDateFormat('es_VE');
    $fec = $dateFormat->format($fecanu, 'i', $dateFormat->getInputPattern('d'));
    $this->msg = "";
    $this->mensaje2="";

    $c = new Criteria();
    $c->add(FadevoluPeer::NRODEV, $nrodev);
    $resul = FadevoluPeer::doSelectOne($c);
    if ($resul) {           
      $error=Facturacion:: validaDispoDevolu($nrodev);
      if ($error==-1) {
        $resul->setFecanu($fec);
        $resul->setDesanu($desanu);
        $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
        $resul->setUsuanu($loguse);
        $resul->setStadph('N');
        $resul->save();        
        Facturacion::actualizaArtDevolu($resul);
      }else {
        $this->mensaje2 = Herramientas::obtenerMensajeError($error);
        return sfView::SUCCESS;
      }
    }    
    return sfView :: SUCCESS;
  }
}
