<?php

/**
 * almtraalmv2 actions.
 *
 * @package    siga
 * @subpackage almtraalmv2
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class almtraalmv2Actions extends autoalmtraalmv2Actions
{

   private $coderror=-1;


  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->catraalm = $this->getCatraalmOrCreate();
	$this->setVars();
	$this->configGrid();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCatraalmFromRequest();
      if ($this->saveCatraalm($this->catraalm)==-1)
      {
		  $this->catraalm->setId(Herramientas::getX_vacio('codtra','Catraalm','id',$this->catraalm->getCodtra()));

	      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

	      if ($this->getRequestParameter('save_and_add'))
	      {
	        return $this->redirect('almtraalmv2/create');
	      }
	      else if ($this->getRequestParameter('save_and_list'))
	      {
	        return $this->redirect('almtraalmv2/list');
	      }
	      else
	      {
	        return $this->redirect('almtraalmv2/edit?id='.$this->catraalm->getId());
	      }
      }
      else
      {           $grid=Herramientas::CargarDatosGrid($this,$this->obj);
	          $this->labels = $this->getLabels();
	          $err = Herramientas::obtenerMensajeError($this->coderror);
         	  $this->getRequest()->setError('',$err);
	          return sfView::SUCCESS;
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
    public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/catraalm/filters');


     // 15    // pager
    $this->pager = new sfPropelPager('Catraalm', 15);
    $c = new Criteria();
    $c->add(CatraalmPeer::STATRA ,'',Criteria::NOT_EQUAL);
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
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
    $this->catraalm = $this->getCatraalmOrCreate();
    $this->updateCatraalmFromRequest();
    $this->setVars();
	$this->configGrid();
	$grid=Herramientas::CargarDatosGrid($this,$this->obj);
  	$grid_arreglo=Herramientas::CargarDatosGrid($this,$this->obj,true);
    $this->labels = $this->getLabels();

	if($this->getRequest()->getMethod() == sfRequest::POST)
      {
	        if($this->coderror!=-1)
	        {
	          $err = Herramientas::obtenerMensajeError($this->coderror);
         	  $this->getRequest()->setError('',$err.$this->coderror_art);
	        }
      }
    return sfView::SUCCESS;
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
  	/**************************************************************************
  	 **         Grid de la Orden de Compra Formulario Amlordcom                      **
  	 **       Jaime Suárez Graba en Clase Articulos.class.php                 **
  	 **************************************************************************/


  	$c = new Criteria();
  	$c->add(CadettraPeer::CODTRA,$this->catraalm->getCodtra());
  	$per = CadettraPeer::doSelect($c);
        
  	$mascaraarticulo=$this->mascaraarticulo;
  	$lonart=strlen($this->mascaraarticulo);
  	$formatocategoria=$this->formatocategoria;
  	$params= array('param1' => $lonart);

  	// Se crea el objeto principal de la clase OpcionesGrid
  	$opciones = new OpcionesGrid();
  	// Se configuran las opciones globales del Grid
  	if (!$this->catraalm->getId())
  	    $opciones->setEliminar(true);
  	else
  	    $opciones->setEliminar(false);
  	
  	$opciones->setTabla('Cadettra');
  	$opciones->setName('a');
  	$opciones->setAnchoGrid(1050);
  	$opciones->setAncho(1050);
        if ($this->catraalm->getId()) { $opciones->setFilas(0); }
        else { $opciones->setFilas(250); }
  	$opciones->setTitulo('Artículos');
  	$opciones->setHTMLTotalFilas(' ');

        $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
  	// Se generan las columnas
  	$col1 = new Columna('Código  Artículo');
  	$col1->setTipo(Columna::TEXTO);
  	$col1->setEsGrabable(true);
  	$col1->setAlineacionObjeto(Columna::CENTRO);
  	$col1->setAlineacionContenido(Columna::CENTRO);
  	$col1->setNombreCampo('Codart');
        $signo="-";
        $signomas="+";
  	if (!$this->catraalm->getId())
  		$col1->setHTML('type="text" size="15"  maxlength="'.chr(39).$lonart.chr(39).'"');
  	else
  	   $col1->setHTML('type="text" size="15"  readonly=true');
	if (!$this->catraalm->getId()) $col1->setCatalogo('caregart','sf_admin_edit_form', array('codart' => 1, 'desart' => 2, 'unimed' => 3),'Caregart_Almtraalm',$params);
  	if ($manartlot=='S') {
           if (!$this->catraalm->getId()) $col1->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraarticulo.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}" onBlur="toAjaxUpdater(obtenerColumna(this.id,12,'.chr(39).$signomas.chr(39).'),3,getUrlModuloAjax(),this.value+'.chr(39).'!'.chr(39).'+$F("catraalm_codubiori")+'.chr(39).'!'.chr(39).'+$F("catraalm_almori")+'.chr(39).'!'.chr(39).'+obtenerColumna(this.id,1,'.chr(39).$signomas.chr(39).')+'.chr(39).'!'.chr(39).'+obtenerColumna(this.id,4,'.chr(39).$signomas.chr(39).')+'.chr(39).'!'.chr(39).'+$F("catraalm_codubides")+'.chr(39).'!'.chr(39).'+$F("catraalm_almdes"),devuelveParVacios(),devuelveParVacios()); toAjaxUpdater(obtenerColumna(this.id,13,'.chr(39).$signomas.chr(39).'),3,getUrlModuloAjax(),this.value+'.chr(39).'!'.chr(39).'+$F("catraalm_codubides")+'.chr(39).'!'.chr(39).'+$F("catraalm_almdes")+'.chr(39).'!'.chr(39).'+obtenerColumna(this.id,1,'.chr(39).$signomas.chr(39).')+'.chr(39).'!'.chr(39).'+obtenerColumna(this.id,5,'.chr(39).$signomas.chr(39).'),devuelveParVacios(),devuelveParVacios());"');
        }
        else {
           if (!$this->catraalm->getId()) $col1->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraarticulo.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}" onBlur="javascript:event.keyCode=13; ajaxdetalle(event,this.id);"');
        }

  	$col2 = new Columna('Descripción');
  	$col2->setTipo(Columna::TEXTAREA);
  	$col2->setAlineacionObjeto(Columna::IZQUIERDA);
  	$col2->setAlineacionContenido(Columna::IZQUIERDA);
  	$col2->setNombreCampo('Desart');
  	$col2->setEsGrabable(true);
        $col2->setHTML('type="text" size="30x1" readonly=true');

  	$col3 = new Columna('Unidad');
  	$col3->setTipo(Columna::TEXTO);
  	$col3->setEsGrabable(true);
  	$col3->setAlineacionObjeto(Columna::DERECHA);
  	$col3->setAlineacionContenido(Columna::DERECHA);
  	$col3->setNombreCampo('Unimed');
  	$col3->setHTML('type="text" size="10" readonly=true');

  	$col4 = new Columna('Disponible');
  	$col4->setTipo(Columna::MONTO);
  	$col4->setEsGrabable(true);
  	$col4->setAlineacionContenido(Columna::DERECHA);
  	$col4->setAlineacionObjeto(Columna::DERECHA);
  	$col4->setNombreCampo('Exitot');
  	$col4->setEsNumerico(true);
  	$col4->setHTML('type="text" size="15" readonly=true');
  	$col4->setJScript('onKeypress="entermonto(event,this.id)"');
  	if ($this->catraalm->getId()) $col4->setOculta(true);

  	$col5 = new Columna('Cantidad Despacho');
  	$col5->setTipo(Columna::MONTO);
  	$col5->setEsGrabable(true);
  	$col5->setAlineacionContenido(Columna::DERECHA);
  	$col5->setAlineacionObjeto(Columna::DERECHA);
  	$col5->setNombreCampo('Canart');
  	$col5->setEsNumerico(true);
  	if (!$this->catraalm->getId())
  	    $col5->setHTML('type="text" size="15"');
  	 else
  	    $col5->setHTML('type="text" size="15" readonly=true');
    if (!$this->catraalm->getId()) $col5->setJScript('onBlur="javascript:event.keyCode=13; validarcantidad(event,this.id)"');

        $col6 = new Columna('Cantidad Recibida');
  	$col6->setTipo(Columna::MONTO);
  	$col6->setEsGrabable(true);
  	$col6->setAlineacionContenido(Columna::DERECHA);
  	$col6->setAlineacionObjeto(Columna::DERECHA);
  	$col6->setNombreCampo('canrec');
  	$col6->setEsNumerico(true);
  	if (!$this->catraalm->getId() || $this->catraalm->getStatra()=='T'){
  	    $col6->setHTML('type="text" size="15"');
        }else{
  	    $col6->setHTML('type="text" size="15" readonly=true');}
       if (!$this->catraalm->getId()|| $this->catraalm->getStatra()=='T') $col6->setJScript('onBlur="javascript:event.keyCode=13; calculardiferencia(event,this.id)"');
        $col7 = new Columna('Cantidad Devuelta');
  	$col7->setTipo(Columna::MONTO);
  	$col7->setEsGrabable(true);
  	$col7->setAlineacionContenido(Columna::DERECHA);
  	$col7->setAlineacionObjeto(Columna::DERECHA);
  	$col7->setNombreCampo('candev');
  	$col7->setEsNumerico(true);
  	if (!$this->catraalm->getId() || $this->catraalm->getStatra()=='T'){
  	    $col7->setHTML('type="text" size="15"');
        }else{
  	    $col7->setHTML('type="text" size="15" readonly=true');}

        $col8 = new Columna('Diferencia');
  	$col8->setTipo(Columna::MONTO);
  	$col8->setEsGrabable(true);
  	$col8->setAlineacionContenido(Columna::DERECHA);
  	$col8->setAlineacionObjeto(Columna::DERECHA);
  	$col8->setNombreCampo('candif');
  	$col8->setEsNumerico(true);

  	$col8->setHTML('type="text" size="15" readonly=true');


        $col9 = new Columna('Código Motivo Faltante');
  	$col9->setTipo(Columna::TEXTO);
  	$col9->setEsGrabable(true);
  	$col9->setAlineacionObjeto(Columna::CENTRO);
  	$col9->setAlineacionContenido(Columna::CENTRO);
  	$col9->setNombreCampo('codfal');
  	if (!$this->catraalm->getId() || $this->catraalm->getStatra()=='T')
  		$col9->setHTML('type="text" size="10"  maxlength="'.chr(39).$lonart.chr(39).'"');
  	else
  	   $col9->setHTML('type="text" size="10"  readonly=true');

	if (!$this->catraalm->getId() || $this->catraalm->getStatra()=='T') $col9->setCatalogo('Camotfal','sf_admin_edit_form', array('codfal' => 9, 'desfal' => 10),'Camotfal_Almordrec');

        $col10 = new Columna('Motivo Faltante');
  	$col10->setTipo(Columna::TEXTO);
  	$col10->setEsGrabable(true);
  	$col10->setAlineacionObjeto(Columna::CENTRO);
  	$col10->setAlineacionContenido(Columna::CENTRO);
  	$col10->setNombreCampo('desfal');
  	$col10->setHTML('type="text" size="20"  readonly=true');
          $col11 = new Columna('Fecha Estimada de Entrega');
  	$col11->setTipo(Columna::FECHA);
  	$col11->setEsGrabable(true);
  	$col11->setAlineacionObjeto(Columna::DERECHA);
  	$col11->setAlineacionContenido(Columna::DERECHA);
  	$col11->setNombreCampo('fecest');
  	if (!$this->catraalm->getId() || $this->catraalm->getStatra()=='T'){
  	    $col11->setHTML('type="text" size="15"');
        }else{
  	    $col11->setHTML('type="text" size="15" readonly=true');}

        $col12 = new Columna('Observaciones');
  	$col12->setTipo(Columna::TEXTO);
  	$col12->setEsGrabable(true);
  	$col12->setAlineacionObjeto(Columna::DERECHA);
  	$col12->setAlineacionContenido(Columna::DERECHA);
  	$col12->setNombreCampo('obstra');
  	if (!$this->catraalm->getId() || $this->catraalm->getStatra()=='T'){
  	    $col12->setHTML('type="text" size="20"');
        }else{
  	    $col12->setHTML('type="text" size="20" readonly=true');}

         if ($this->catraalm->getId())
        {
           $col13= new Columna('Número de Lote Origen');
           $col13->setTipo(Columna::TEXTO);
           $col13->setEsGrabable(true);
           $col13->setAlineacionObjeto(Columna::CENTRO);
           $col13->setAlineacionContenido(Columna::CENTRO);
           $col13->setNombreCampo('numlotori');
           $col13->setHTML('type="text" size="15" readonly=true');
          if ($manartlot!='S') $col13->setOculta(true);


           $col14= new Columna('Número de Lote Destino');
           $col14->setTipo(Columna::TEXTO);
           $col14->setEsGrabable(true);
           $col14->setAlineacionObjeto(Columna::CENTRO);
           $col14->setAlineacionContenido(Columna::CENTRO);
           $col14->setNombreCampo('numlotdes');
           $col14->setHTML('type="text" size="15" readonly=true');
           if ($manartlot!='S') $col14->setOculta(true);
         }
         else
          {
                $col13= new Columna('Nro. de Lote Origen');
                $col13->setTipo(Columna::COMBOCLASE);
                $col13->setEsGrabable(true);
                $col13->setNombreCampo('numlotori');
                $col13->setCombosclase('Numlotxart');
                $col13->setHTML('onChange="toAjax(5,getUrlModuloAjax(),this.value+'.chr(39).'!'.chr(39).'+$(obtenerColumna(this.id,12,'.chr(39).$signo.chr(39).')).value+'.chr(39).'!'.chr(39).'+$F("catraalm_codubiori")+'.chr(39).'!'.chr(39).'+$F("catraalm_almori")+'.chr(39).'!'.chr(39).'+obtenerColumna(this.id,1,'.chr(39).$signomas.chr(39).'),devuelveParVacios(),devuelveParVacios());"');
                if ($manartlot!='S') $col13->setOculta(true);

                $col14= new Columna('Nro. de Lote Destino');
                $col14->setTipo(Columna::COMBOCLASE);
                $col14->setEsGrabable(true);
                $col14->setNombreCampo('numlotdes');
                $col14->setCombosclase('Numlotxart');
                $col14->setHTML(' ');
                if ($manartlot!='S') $col14->setOculta(true);
          }

           $col15= new Columna('codalm');
	   $col15->setTipo(Columna::TEXTO);
	   $col15->setEsGrabable(true);
	   $col15->setNombreCampo('codalm');
	   $col15->setOculta(true);


           $col16= new Columna('codubi');
	   $col16->setTipo(Columna::TEXTO);
	   $col16->setEsGrabable(true);
	   $col16->setNombreCampo('codubi');
	   $col16->setOculta(true);

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
        $opciones->addColumna($col11);
        $opciones->addColumna($col12);
        $opciones->addColumna($col13);
  	$opciones->addColumna($col14);
        $opciones->addColumna($col15);
        $opciones->addColumna($col16);

  	// Ee genera el arreglo de opciones necesario para generar el grid
  	$this->obj = $opciones->getConfig($per);

  }
  public function setVars()
  {
    $this->mascaraarticulo = Herramientas::getMascaraArticulo();
    $this->formatocategoria = Herramientas::getObtener_FormatoCategoria();
    $this->mascaraubi= Herramientas::ObtenerFormato('Cadefart','Forubi');
    $this->lonubi=strlen($this->mascaraubi);
    $c= new Criteria();
    $c->add(UsuariosPeer::LOGUSE,$this->getUser()->getAttribute('loguse'));
    $data=UsuariosPeer::doSelectOne($c);
    if($data){
    $this->catraalm->setCedemp($data->getCedemp());}

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
  protected function saveCatraalm($catraalm)
  {
  	$grid=Herramientas::CargarDatosGrid($this,$this->obj);
  	$grid_arreglo=Herramientas::CargarDatosGrid($this,$this->obj,true);
  	$grid_detallado=$grid_arreglo[0];
        $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
          $x    = $grid[0];
          $j    = 0;
          $encontro = false;
          while ($j<count($x))
          {
             if ($x[$j]->getCanart()>0)
             {
                $encontro=true;
                if ($manartlot=='S')
                {
                    if ($x[$j]->getNumlotori()=="")
                     {
                             $this->coderror=577;
                             return $this->coderror;
                     }
                }

              $c= new Criteria();
              $c->add(CaartalmubiPeer::CODALM,$catraalm->getAlmori());
              $c->add(CaartalmubiPeer::CODUBI,$catraalm->getCodubiori());
              $c->add(CaartalmubiPeer::CODART,$x[$j]->getCodart());
              if ($manartlot=='S') $c->add(CaartalmubiPeer::NUMLOT,$x[$j]->getNumlotori());
              $caartalm_up = CaartalmubiPeer::doSelectOne($c);
              if ($caartalm_up)
              {
                if ((($caartalm_up->getExiact())-($x[$j]->getCanart()))<0)
                {
                    $this->coderror=125;
                    return $this->coderror;
                }
              }
             }
             $j++;
          }
       if (!$encontro)
       {
            $this->coderror=576;
            return $this->coderror;
       }

       if (Articulos::salvarGrabar_TransferenciaArt($catraalm,$grid,$grid_detallado,$error_obtenido,$codigo_articulo))
        {
                   $this->coderror_art=$codigo_articulo;
                   $this->coderror=$error_obtenido;
                   return $error_obtenido;
        }//	if (Articulos::salvarGrabar_Transferencia($catraalm,$grid,$grid_detallado,&$error_obtenido,&$codigo_articulo))
        else
        {
            $this->coderror_art=$codigo_articulo;
                $this->coderror=$error_obtenido;
                return $error_obtenido;
        }
  }

  /**
   * Actualiza la informacion que viene de la vista
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateCatraalmFromRequest()
  {
  	$catraalm = $this->getRequestParameter('catraalm');
	$this->setVars();
	$this->configGrid();

  	if (isset($catraalm['codtra']))
  	{
  		$this->catraalm->setCodtra($catraalm['codtra']);
  	}
  	if (isset($catraalm['fectra']))
  	{
  		if ($catraalm['fectra'])
  		{
  			try
  			{
  				$dateFormat = new sfDateFormat($this->getUser()->getCulture());
  				if (!is_array($catraalm['fectra']))
  				{
  					$value = $dateFormat->format($catraalm['fectra'], 'i', $dateFormat->getInputPattern('d'));
  				}
  				else
  				{
  					$value_array = $catraalm['fectra'];
  					$value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
  				}
  				$this->catraalm->setFectra($value);
  			}
  			catch (sfException $e)
  			{
  				// not a date
  			}
  		}
  		else
  		{
  			$this->catraalm->setFectra(null);
  		}
  	}
  	if (isset($catraalm['destra']))
  	{
  		$this->catraalm->setDestra($catraalm['destra']);
  	}
  	if (isset($catraalm['almori']))
  	{
  		$this->catraalm->setAlmori($catraalm['almori']);
  	}
  	if (isset($catraalm['almdes']))
  	{
  		$this->catraalm->setAlmdes($catraalm['almdes']);
  	}
  	if (isset($catraalm['codubiori']))
  	{
  		$this->catraalm->setCodubiori($catraalm['codubiori']);
  	}
  	if (isset($catraalm['codubides']))
  	{
  		$this->catraalm->setCodubides($catraalm['codubides']);
  	}
    if (isset($catraalm['codemptra']))
    {
    $this->catraalm->setCodemptra($catraalm['codemptra'] ? $catraalm['codemptra'] : null);
    }
    if (isset($catraalm['fadefveh_id']))
    {
    $this->catraalm->setFadefvehId($catraalm['fadefveh_id'] ? $catraalm['fadefveh_id'] : null);
    }
    if (isset($catraalm['fadefcho_id']))
    {
    $this->catraalm->setFadefchoId($catraalm['fadefcho_id'] ? $catraalm['fadefcho_id'] : null);
    }
    if (isset($catraalm['fecsal']))
    {
      if ($catraalm['fecsal'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($catraalm['fecsal']))
          {
            $value = $dateFormat->format($catraalm['fecsal'], 'I', $dateFormat->getInputPattern('g'));
          }
          else
          {
            $value_array = $catraalm['fecsal'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->catraalm->setFecsal($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->catraalm->setFecsal(null);
      }
    }
    if (isset($catraalm['feclle']))
    {
      if ($catraalm['feclle'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($catraalm['feclle']))
          {
            $value = $dateFormat->format($catraalm['feclle'], 'I', $dateFormat->getInputPattern('g'));
          }
          else
          {
            $value_array = $catraalm['feclle'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->catraalm->setFeclle($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->catraalm->setFeclle(null);
      }
    }    
  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {
  	$cajtexmos=$this->getRequestParameter('cajtexmos');
  	$cajtexcom=$this->getRequestParameter('cajtexcom');
        $this->ajax= $this->getRequestParameter('ajax');
        $this->vestatus='';


	  if ($this->getRequestParameter('ajax')=='1')
	  {
	  	$dato=CadefalmPeer::getDesalmacen($this->getRequestParameter('codigo'));
	  	$output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","6","c"]]';
            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
            return sfView::HEADER_ONLY;
	  }
	  else if ($this->getRequestParameter('ajax')=='2')
	    {
	  	  $codalm=$this->getRequestParameter('codalm');
	  	  $codubi=$this->getRequestParameter('codigo');
	  	  $origen=$this->getRequestParameter('origen');
	      if (trim($codalm)!="")
	      {
	  		 if (Compras::verificarexistenciaubialm($codalm,$codubi))
              {
                  $dato=CadefubiPeer::getDesubicacion($codubi);
                  $javascript="";

              }
               else
              {
              	 if ($origen=="O")//ubicacion origen
                   $javascript="alert('La ubicacion : ".$codubi.", no existe para el Almacén Origen seleccionado...');$('catraalm_codubiori').value='';$('catraalm_nomubiori').value='';$('catraalm_codubiori').focus();";
                else
                   $javascript="alert('La ubicacion : ".$codubi.", no existe para el Almacén Destino seleccionado...');$('catraalm_codubides').value='';$('catraalm_nomubides').value='';$('catraalm_codubides').focus();";
                $dato="";
              }
            $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
	      }
	      else
	      {
	      	 if ($origen=="O")//ubicacion origen
	      		$javascript="alert('Primero debe seleccionar un Almacén Origen...');$('catraalm_codubiori').value='';$('catraalm_nomubiori').value='';$('catraalm_codubiori').focus();";
	         else
	         	$javascript="alert('Primero debe seleccionar un Almacén Destino...');$('catraalm_codubides').value='';$('catraalm_nomubides').value='';$('catraalm_codubides').focus();";
  			$output = '[["javascript","'.$javascript.'",""]]';
	      }
            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
            return sfView::HEADER_ONLY;
	    }
		else  if ($this->getRequestParameter('ajax')=='3')
	    {
	      	$manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
                if ($manartlot=='S')
                {
                    $datos=split('!',$this->getRequestParameter('codigo'));
                    $codart=$datos[0];
                    $codubi=$datos[1];
                    $codalm=$datos[2];
                    $cajtexmos=$datos[3];
                    $cajmod=$datos[4];
                    $aux2 = split('_',$cajmod);
                    $colum=$aux2[2];
                    $aux = split('_',$cajtexmos);
                    $name=$aux[0];
                    $fil=$aux[1];
                    $cajtexcom=$name."_".$fil."_1";
                    $cajunidad=$name."_".$fil."_3";
                    $cajdispon=$name."_".$fil."_4";
                    $cajcantra=$name."_".$fil."_5";
                    $cajcanrec=$name."_".$fil."_6";
                    $cajcandev=$name."_".$fil."_7";
                    $cajcandif=$name."_".$fil."_8";
                    $cajcodalm=$name."_".$fil."_14";
                    $cajcodubi=$name."_".$fil."_15";
                    $numlot="";
                    $output = '[["","",""]]';
                    if ($codart!="")
                    {
                        $c= new Criteria();
                        $c->add(CaregartPeer::CODART,$codart);
                        $reg=CaregartPeer::doSelectOne($c);
                        if ($codalm!="" and $codubi!="")
                        {
                            if ($reg)
                            {
                                /*$exiact=0;
                                if (Almacen::ExistenciayObtenerDisponibilidadAlmArt($codart,$codalm,$codubi,&$exiact,&$numlot))
                                {
                                    $desart=htmlspecialchars($reg->getDesart());
                                    $unimed=$reg->getUnimed();
                                    $disponibilidad=$exiact;
                                    $output = '[["'.$cajtexmos.'","'.$desart.'",""],["'.$cajunidad.'","'.$unimed.'",""],["'.$cajdispon.'","'.$disponibilidad.'",""],["'.$cajcodalm.'","'.$codalm.'",""],["'.$cajcodubi.'","'.$codubi.'",""]]';
                                }//if (Despachos::verificaexisydisp($x[$j]->getCodart(),$cadphart['codalm'],$cadphart['codubi'],$x[$j]->getCandes(),&$msg)
                                else
                                {
                                    $mensaje="El Artículo ".$codart." no esta definido en el Almacen ".$codalm." para la Ubicacion ".$codubi;
                                    $javascript="alert('".$mensaje."');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';$('". $cajunidad ."').value='';$('". $cajdispon ."').value='0.00';$('". $cajcantra ."').value='0.00'";
                                    $output = '[["javascript","'.$javascript.'",""]]';
                                }*/
                                 $c = new Criteria();
                                 $c->add(CaartalmubiPeer::CODART,$codart);
                                 $c->add(CaartalmubiPeer::CODALM,$codalm);
                                 $c->add(CaartalmubiPeer::CODUBI,$codubi);
                                 $c->add(CaartalmubiPeer::EXIACT,0,  Criteria::GREATER_THAN);
                                 $alm = CaartalmubiPeer::doSelectOne($c);
                                 if ($alm)
                                 {
                                       $numlot=$alm->getNumlot();
                                 }
                                 if ($numlot!="" && $colum==5)
                                 {
                                    $exiact=0;
                                    if (Almacen::ExistenciayObtenerDisponibilidadAlmArt($codart,$codalm,$codubi,$exiact,$numlot))
                                    {
                                        $desart=htmlspecialchars($reg->getDesart());
                                        $unimed=$reg->getUnimed();
                                        $disponibilidad=$exiact;
                                        $output = '[["'.$cajtexmos.'","'.$desart.'",""],["'.$cajunidad.'","'.$unimed.'",""],["'.$cajdispon.'","'.$disponibilidad.'",""],["'.$cajcodalm.'","'.$codalm.'",""],["'.$cajcodubi.'","'.$codubi.'",""]]';
                                    }//if (Despachos::verificaexisydisp($x[$j]->getCodart(),$cadphart['codalm'],$cadphart['codubi'],$x[$j]->getCandes(),&$msg)
                                    else
                                    {
                                        $mensaje="El Artículo ".$codart." no esta definido en el Almacen ".$codalm." para la Ubicacion ".$codubi;
                                        $javascript="alert('".$mensaje."');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';$('". $cajunidad ."').value='';$('". $cajdispon ."').value='0.00';$('". $cajcantra ."').value='0.00';$('". $cajcanrec ."').value='0.00';$('". $cajcandev ."').value='0.00';$('". $cajcandif ."').value='0.00'";
                                        $output = '[["javascript","'.$javascript.'",""]]';
                                    }
                                 }
                            }
                            else
                            {
                                 $javascript="alert('Articulo no existe');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';$('". $cajunidad ."').value='';$('". $cajdispon ."').value='0.00';$('". $cajcantra ."').value='0.00'";
                                 $output = '[["javascript","'.$javascript.'",""]]';
                            }
                        }//if ($this->getRequestParameter('almori')!="")
                        else
                        {
                          $javascript="alert('Debe seleccionar el Almacén y la Ubicación Origen antes de incluir los artículos a despachar...');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';$('".$cajunidad ."').value='';$('".$cajdispon ."').value='0.00';$('". $cajcantra ."').value='0.00';$('". $cajcanrec ."').value='0.00';$('". $cajcandev ."').value='0.00';$('". $cajcandif ."').value='0.00'";
                          $output = '[["javascript","'.$javascript.'",""]]';
                        }
                    }//if ($codart!="")
                  $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
                  $this->numlot=$numlot;
                  $this->lotes=$this->ObtenerNumlotxart($codart,$codalm,$codubi);
                }else {

                $c= new Criteria();
                $c->add(CaregartPeer::CODART,$this->getRequestParameter('codigo'));
	      	$reg=CaregartPeer::doSelectOne($c);
	      	if ($this->getRequestParameter('almori')!="" and $this->getRequestParameter('ubiori')!="")
	      	{
		  		if ($reg)
		  		{
		  			$exiact=0;
		  		    if (Almacen::ExistenciayObtenerDisponibilidadAlmArt($this->getRequestParameter('codigo'),$this->getRequestParameter('almori'),$this->getRequestParameter('ubiori'),$exiact))
		  		    {
				        $desart=htmlspecialchars($reg->getDesart());
				        $unimed=$reg->getUnimed();
		                $disponibilidad=$exiact;
				        $output = '[["'.$cajtexmos.'","'.$desart.'",""],["'.$this->getRequestParameter('unidad').'","'.$unimed.'",""],["'.$this->getRequestParameter('dispon').'","'.$disponibilidad.'",""]]';
				    }//if (Despachos::verificaexisydisp($x[$j]->getCodart(),$cadphart['codalm'],$cadphart['codubi'],$x[$j]->getCandes(),&$msg)
				    else
				    {
				    	$mensaje="El Artículo ".$this->getRequestParameter('codigo')." no esta definido en el Almacen ".$this->getRequestParameter('almori')." para la Ubicacion ".$this->getRequestParameter('ubiori');
				    	$javascript="alert('".$mensaje."');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';$('". $this->getRequestParameter('unidad') ."').value='';$('". $this->getRequestParameter('dispon') ."').value='0.00';$('". $this->getRequestParameter('cantransf') ."').value='0.00'";
		        	 	$output = '[["javascript","'.$javascript.'",""]]';
				    }
		  		}
		  		else
		  		{
		  			 $javascript="alert('Articulo no existe');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';$('". $this->getRequestParameter('unidad') ."').value='';$('". $this->getRequestParameter('dispon') ."').value='0.00';$('". $this->getRequestParameter('cantransf') ."').value='0.00'";
		        	 $output = '[["javascript","'.$javascript.'",""]]';
		  		}
	      	}//if ($this->getRequestParameter('almori')!="")
      		else
	  		{
	  		  $javascript="alert('Debe seleccionar el Almacén y la Ubicación Origen antes de incluir los artículos a despachar...');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';$('". $this->getRequestParameter('unidad') ."').value='';$('". $this->getRequestParameter('dispon') ."').value='0.00';$('". $this->getRequestParameter('cantransf') ."').value='0.00'";
	          $output = '[["javascript","'.$javascript.'",""]]';
	  		}
                    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
                    return sfView::HEADER_ONLY;
                }
	    }//else  if ($this->getRequestParameter('ajax')=='3')
            else  if ($this->getRequestParameter('ajax')=='4')
	    {
                    $datos=split('!',$this->getRequestParameter('codigo'));
                    $codart=$datos[0];
                    $codubi=$datos[1];
                    $codalm=$datos[2];
                    $cajtexmos=$datos[3];
                    $aux = split('_',$cajtexmos);
                    $name=$aux[0];
                    $fil=$aux[1];
                    $cajtexcom=$name."_".$fil."_1";
                    $cajunidad=$name."_".$fil."_3";
                    $cajdispon=$name."_".$fil."_4";
                    $cajcantra=$name."_".$fil."_5";
                    $cajcanrec=$name."_".$fil."_6";
                    $cajcandev=$name."_".$fil."_7";
                    $cajcandif=$name."_".$fil."_8";
                    $cajcodalm=$name."_".$fil."_14";
                    $cajcodubi=$name."_".$fil."_15";
                    $numlot="";
                    $output = '[["","",""]]';
                    if ($codart!="")
                    {
                        $c= new Criteria();
                        $c->add(CaregartPeer::CODART,$codart);
                        $reg=CaregartPeer::doSelectOne($c);
                        if ($codalm!="" and $codubi!="")
                        {
                            if ($reg)
                            {
                                /*$exiact=0;
                                if (Almacen::ExistenciayObtenerDisponibilidadAlmArt($codart,$codalm,$codubi,&$exiact,&$numlot))
                                {
                                    $desart=htmlspecialchars($reg->getDesart());
                                    $unimed=$reg->getUnimed();
                                    $disponibilidad=$exiact;
                                    $output = '[["'.$cajtexmos.'","'.$desart.'",""],["'.$cajunidad.'","'.$unimed.'",""],["'.$cajdispon.'","'.$disponibilidad.'",""],["'.$cajcodalm.'","'.$codalm.'",""],["'.$cajcodubi.'","'.$codubi.'",""]]';
                                }//if (Despachos::verificaexisydisp($x[$j]->getCodart(),$cadphart['codalm'],$cadphart['codubi'],$x[$j]->getCandes(),&$msg)
                                else
                                {
                                    $mensaje="El Artículo ".$codart." no esta definido en el Almacen ".$codalm." para la Ubicacion ".$codubi;
                                    $javascript="alert('".$mensaje."');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';$('". $cajunidad ."').value='';$('". $cajdispon ."').value='0.00';$('". $cajcantra ."').value='0.00'";
                                    $output = '[["javascript","'.$javascript.'",""]]';
                                }*/
                                $c = new Criteria();
                                 $c->add(CaartalmubiPeer::CODART,$codart);
                                 $c->add(CaartalmubiPeer::CODALM,$codalm);
                                 $c->add(CaartalmubiPeer::CODUBI,$codubi);
                                 $c->add(CaartalmubiPeer::EXIACT,0,  Criteria::GREATER_THAN);
                                 $alm = CaartalmubiPeer::doSelectOne($c);
                                 if ($alm)
                                 {
                                       $numlot=$alm->getNumlot();
                                 }
                            }
                            else
                            {
                                 $javascript="alert('Articulo no existe');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';$('". $cajunidad ."').value='';$('". $cajdispon ."').value='0.00';$('". $cajcantra ."').value='0.00';$('". $cajcanrec ."').value='0.00';$('". $cajcandev ."').value='0.00';$('". $cajcandif ."').value='0.00'";
                                 $output = '[["javascript","'.$javascript.'",""]]';
                            }
                        }//if ($this->getRequestParameter('almori')!="")
                        else
                        {
                          $javascript="alert('Debe seleccionar el Almacén y la Ubicación Origen antes de incluir los artículos a despachar...');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';$('".$cajunidad ."').value='';$('".$cajdispon ."').value='0.00';$('". $cajcantra ."').value='0.00';$('". $cajcanrec ."').value='0.00';$('". $cajcandev ."').value='0.00';$('". $cajcandif ."').value='0.00'";
                          $output = '[["javascript","'.$javascript.'",""]]';
                        }
                    }//if ($codart!="")
                  $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
                  $this->numlot=$numlot;
                  $this->lotes=$this->ObtenerNumlotxart($codart,$codalm,$codubi);
                }
                else  if ($this->getRequestParameter('ajax')=='5')
	    {
                    $datos=explode('!',$this->getRequestParameter('codigo'));
                    $numlot=$datos[0];
                    $codart=$datos[1];
                    $codubi=$datos[2];
                    $codalm=$datos[3];
                    $cajtexmos=$datos[4];
                    $aux = explode('_',$cajtexmos);
                    $name=$aux[0];
                    $fil=$aux[1];
                    $cajtexcom=$name."_".$fil."_1";
                    $cajunidad=$name."_".$fil."_3";
                    $cajdispon=$name."_".$fil."_4";
                    $cajcantra=$name."_".$fil."_5";
                    $cajcanrec=$name."_".$fil."_6";
                    $cajcandev=$name."_".$fil."_7";
                    $cajcandif=$name."_".$fil."_8";
                    $cajcodalm=$name."_".$fil."_14";
                    $cajcodubi=$name."_".$fil."_15";

                    $output = '[["","",""]]';
                    if ($codart!="")
                    {
                        $c= new Criteria();
                        $c->add(CaregartPeer::CODART,$codart);
                        $reg=CaregartPeer::doSelectOne($c);
                        if ($codalm!="" and $codubi!="")
                        {
                            if ($reg)
                            {
                                $exiact=0;
                                if (Almacen::ExistenciayObtenerDisponibilidadAlmArt($codart,$codalm,$codubi,$exiact,$numlot))
                                {
                                    $disponibilidad=$exiact;
                                    $output = '[["'.$cajdispon.'","'.$disponibilidad.'",""]]';
                                }//if (Despachos::verificaexisydisp($x[$j]->getCodart(),$cadphart['codalm'],$cadphart['codubi'],$x[$j]->getCandes(),&$msg)
                                else
                                {
                                    $mensaje="El Artículo ".$codart." no esta definido en el Almacen ".$codalm." para la Ubicacion ".$codubi;
                                    $javascript="alert('".$mensaje."');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';$('". $cajunidad ."').value='';$('". $cajdispon ."').value='0.00';$('". $cajcantra ."').value='0.00';$('". $cajcanrec ."').value='0.00';$('". $cajcandev ."').value='0.00';$('". $cajcandif ."').value='0.00'";
                                    $output = '[["javascript","'.$javascript.'",""]]';
                                }
                            }
                            else
                            {
                                 $javascript="alert('Articulo no existe');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';$('". $cajunidad ."').value='';$('". $cajdispon ."').value='0.00';$('". $cajcantra ."').value='0.00';$('". $cajcanrec ."').value='0.00';$('". $cajcandev ."').value='0.00';$('". $cajcandif ."').value='0.00'";
                                 $output = '[["javascript","'.$javascript.'",""]]';
                            }
                        }//if ($this->getRequestParameter('almori')!="")
                        else
                        {
                          $javascript="alert('Debe seleccionar el Almacén y la Ubicación Origen antes de incluir los artículos a despachar...');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';$('".$cajunidad ."').value='';$('".$cajdispon ."').value='0.00';$('". $cajcantra ."').value='0.00';$('". $cajcanrec ."').value='0.00';$('". $cajcandev ."').value='0.00';$('". $cajcandif ."').value='0.00'";
                          $output = '[["javascript","'.$javascript.'",""]]';
                        }
                    }//if ($codart!="")
                  $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
                  return sfView::HEADER_ONLY;
                }else   if ($this->getRequestParameter('ajax')=='6'){
                    $cedemp=$this->getRequestParameter('cedemp');
                    $statra=$this->getRequestParameter('statra');
                    $codalm=$this->getRequestParameter('codalm');
                    $javascript='';
                    $c= new Criteria();
                      $c->add(CausualmPeer::CEDEMP,$cedemp);
                      $c->add(CausualmPeer::CODALM,$codalm);
                      $causualm= CausualmPeer::doSelectOne($c);
                      if($causualm && $statra=='T'){
                         $javascript=$javascript."$('botonrec').show();"; //Activa el boton de Recepción
                      }
                    $output = '[["javascript","'.$javascript.'",""]]';
                    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
                    return sfView::HEADER_ONLY;
                }else   if ($this->getRequestParameter('ajax')=='7'){
                    $codtra=$this->getRequestParameter('codtra');
                    $codalm=$this->getRequestParameter('codalm');
                    $estatus=$this->getRequestParameter('estatus');
                    $javascript='';
      
                    if($estatus=='D'){
                      $this->vestatus= 'Recibido con Diferencia';
                     }else  if($estatus=='R'){
                       $this->vestatus= 'Recibido Conforme';
                     }

                    $javascript="$('catraalm_estatus').value='$estatus';";
                    $javascript=$javascript." new Ajax.Request(getUrlModulo()+'ajaxgrid', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:Form.serialize(document.getElementById('sf_admin_edit_form'))});";
                   //   $javascript=$javascript." new Ajax.Updater('divgrid',getUrlModulo()+'Ajaxgrid', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:Form.serialize(document.getElementById('sf_admin_edit_form'))});";
                    $output = '[["javascript","'.$javascript.'",""]]';
                    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');


                }else   if ($this->getRequestParameter('ajax')=='8'){
                   $dateFormat = new sfDateFormat('es_VE');
                  $fecha = $dateFormat->format($this->getRequestParameter('codigo'), 'i', $dateFormat->getInputPattern('d'));

                  $c = new Criteria();
                  $c->add(CatraalmPeer::CODTRA, $this->getRequestParameter('codtra'));
                  $data = CatraalmPeer::doSelectOne($c);
                  if ($data) {
                    if ($fecha < $data->getFectra()) {
                      $msj = "alert_('La Fecha de Anulaci&oacute;n no puede ser menor a la fecha del Traspaso'); $('catraalm_fecanu').value=''";
                    } else {
                      $msj = "";
                    }
                  } else {
                    $msj = "";
                  }
                  $output = '[["javascript","' . $msj . '",""]]';
                   $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
                    return sfView::HEADER_ONLY;
                }


	}

       public function ObtenerNumlotxart($codart="",$codalm="",$codubi="")
      {
        $c = new Criteria();
        $c->add(CaartalmubiPeer::CODALM,$codalm);
        $c->add(CaartalmubiPeer::CODUBI,$codubi);
        $c->add(CaartalmubiPeer::CODART,$codart);
        $c->add(CaartalmubiPeer::EXIACT,0,Criteria::GREATER_THAN);
        $c->addAscendingOrderByColumn(CaartalmubiPeer::FECVEN);

        $datos = CaartalmubiPeer::doSelect($c);

        $lotes = array();

        foreach($datos as $obj_datos)
        {
         if ($obj_datos->getFecven()!="")
         {
            $fecven=date("d/m/Y",strtotime($obj_datos->getFecven()));
            $lotes += array($obj_datos->getNumlot() => $obj_datos->getNumlot()." - ".$fecven);
         }
          else
            $lotes += array($obj_datos->getNumlot() => $obj_datos->getNumlot());

        }
        return $lotes;
      }

   public function executeAutocomplete()
	{
		if ($this->getRequestParameter('ajax')=='1')
	    {
		 	$this->tags=Herramientas::autocompleteAjax('CODALM','Cadefalm','Codalm',trim($this->getRequestParameter('catraalm[almori]')));
	    }

	}


  protected function deleteCatraalm($catraalm)
  {
     Articulos::eliminar_TransferenciaNuev($catraalm,$error);
     $this->coderror=$error;
     if ($error!=-1)
       return false;
     else
       return true;
  }

   /**
   * Función principal para procesar la eliminación de registros
   * en el formulario.
   *
   */
  public function executeDelete()
  {
    $this->catraalm = CatraalmPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->catraalm);

    try
    {
      if (!$this->deleteCatraalm($this->catraalm))
      {
      	$err = Herramientas::obtenerMensajeError($this->coderror);
        $this->setFlash('notice',$err);
        //$this->getRequest()->setError('',$err);
		return $this->redirect('almtraalmv2/edit?id='.$this->getRequestParameter('id'));
      }
      else
      {
      	 $this->Bitacora('Elimino');
      	 return $this->redirect('almtraalmv2/list');
      }
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Catraalm. Make sure it does not have any associated items.');
      return $this->forward('almtraalmv2', 'list');
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
		    $this->catraalm = $this->getCatraalmOrCreate();
   			$this->updateCatraalmFromRequest();
			$catraalm = $this->getRequestParameter('catraalm');
                     $this->configGrid();
                     $grid=Herramientas::CargarDatosGrid($this,$this->obj,true);
                      $x=$grid[0];
                      $i=0;

                      while ($i<count($x))
                        {
                         if ($this->catraalm->getId())
                         {
                          if ($this->catraalm->getStatra()=='T') 
                          {
                              if(( $x[$i]['canart']!= $x[$i]['canrec']) && ($x[$i]['codfal']=='')){
                                  $mierr = Herramientas::obtenerMensajeError('597');
                                  $this->getRequest()->setError('',$mierr);
                                  return false;
                              }
                          }
                         }
                        $i++;
                        }

                      if (Tesoreria::validarFechaPerContable($this->getRequestParameter('catraalm[fectra]')))
                      {
                        $mierr = Herramientas::obtenerMensajeError('521');
                        $this->getRequest()->setError('',$mierr);
                        return false;
                      }
		 	if ($catraalm['almori']!="" and $catraalm['codubiori']!="")
		 	{
			    if (Compras::verificarexistenciaubialm($catraalm['almori'],$catraalm['codubiori']))
			    {
	                 if ($catraalm['almdes']!="" and $catraalm['codubides']!="")
				 	 {
					    if (Compras::verificarexistenciaubialm($catraalm['almdes'],$catraalm['codubides']))
					    {
			                   return true;
					    }//if (Compras::verificarexistenciaubialm($cadphart['almdes'],$cadphart['codubides']))
					 	else
					 	{
					 		$mierr = Herramientas::obtenerMensajeError('168');
		                    $this->getRequest()->setError('catraalm{codubides}',$mierr);
					 		return false;
					 	}
				 	 }//if $catraalm['almori']!="" and $catraalm['codubiori']!="")
			    }//if (Compras::verificarexistenciaubialm($catraalm['almori'],$catraalm['codubiori']))
			 	else
			 	{
			 		$mierr = Herramientas::obtenerMensajeError('168');
                    $this->getRequest()->setError('catraalm{codubiori}',$mierr);
			 		return false;
			 	}

		 	 }//if $catraalm['almori']!="" and $catraalm['codubiori']!=""
		 	else return true;
      }// if($this->getRequest()->getMethod() == sfRequest::POST)
    else return true;
  }
  public function executeAjaxgrid() {
                $this->catraalm = $this->getCatraalmOrCreate();
                $this->updateCatraalmFromRequest();
                $grid=Herramientas::CargarDatosGrid($this,$this->obj,true);
                $conret=$grid[0];
                $nuevo= $this->getRequestParameter('id','');
                $codtra=$this->getRequestParameter('catraalm[codtra]');
                $codalm=$this->getRequestParameter('catraalm[almdes]');
                $estatus=$this->getRequestParameter('catraalm[estatus]');
                $feclle=$this->getRequestParameter('catraalm[feclle]');
                $javascript='';

                    if (Articulos::Actualizar_Recepciones($codtra,$codalm,$estatus,$conret, $this->catraalm->getFeclle())){
                  
                     $javascript=$javascript ." alert('Recepción Realizada satisfactoriamente..'); $('botonrec').hide(); desmarcarTodos();";
                     }else{
                         $javascript=" alert('Existen problemas al momento de realizar la Recepción..');";
                     }
                $jsonextra = ',["javascript","' . $javascript . '",""]';
                $output = Herramientas :: grid_to_json($grid, $name,$jsonextra);
		$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
                return sfView::HEADER_ONLY;
                }
                
protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['codtra_is_empty']))
    {
      $criterion = $c->getNewCriterion(CatraalmPeer::CODTRA, '');
      $criterion->addOr($c->getNewCriterion(CatraalmPeer::CODTRA, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codtra']) && $this->filters['codtra'] !== '')
    {
      $c->add(CatraalmPeer::CODTRA, '%'.strtr($this->filters['codtra'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['destra_is_empty']))
    {
      $criterion = $c->getNewCriterion(CatraalmPeer::DESTRA, '');
      $criterion->addOr($c->getNewCriterion(CatraalmPeer::DESTRA, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['destra']) && $this->filters['destra'] !== '')
    {
      $c->add(CatraalmPeer::DESTRA, '%'.strtr($this->filters['destra'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['fectra_is_empty']))
    {
      $criterion = $c->getNewCriterion(CatraalmPeer::FECTRA, '');
      $criterion->addOr($c->getNewCriterion(CatraalmPeer::FECTRA, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['fectra']))
    {
      if (isset($this->filters['fectra']['from']) && $this->filters['fectra']['from'] !== '')
      {
        $criterion = $c->getNewCriterion(CatraalmPeer::FECTRA, date('Y-m-d', $this->filters['fectra']['from']), Criteria::GREATER_EQUAL);
      }
      if (isset($this->filters['fectra']['to']) && $this->filters['fectra']['to'] !== '')
      {
        if (isset($criterion))
        {
          $criterion->addAnd($c->getNewCriterion(CatraalmPeer::FECTRA, date('Y-m-d', $this->filters['fectra']['to']), Criteria::LESS_EQUAL));
        }
        else
        {
          $criterion = $c->getNewCriterion(CatraalmPeer::FECTRA, date('Y-m-d', $this->filters['fectra']['to']), Criteria::LESS_EQUAL);
        }
      }

      if (isset($criterion))
      {
        $c->add($criterion);
      }
    }
    if (isset($this->filters['almori_is_empty']))
    {
      $criterion = $c->getNewCriterion(CatraalmPeer::ALMORI, '');
      $criterion->addOr($c->getNewCriterion(CatraalmPeer::ALMORI, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['almori']) && $this->filters['almori'] !== '')
    {
      $c->add(CatraalmPeer::ALMORI, '%'.strtr($this->filters['almori'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['nomalo_is_empty']))
    {
      $criterion = $c->getNewCriterion(CatraalmPeer::NOMALO, '');
      $criterion->addOr($c->getNewCriterion(CatraalmPeer::NOMALO, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nomalo']) && $this->filters['nomalo'] !== '')
    {
      $c->add(CadefalmPeer::NOMALM, strtr("%".$this->filters['nomalo']."%", '*', '%'), Criteria::LIKE);
      $c->addJoin(CatraalmPeer::ALMORI,CadefalmPeer::CODALM);
      $c->setIgnoreCase(true);
    }
    if (isset($this->filters['almdes_is_empty']))
    {
      $criterion = $c->getNewCriterion(CatraalmPeer::ALMDES, '');
      $criterion->addOr($c->getNewCriterion(CatraalmPeer::ALMDES, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['almdes']) && $this->filters['almdes'] !== '')
    {
      $c->add(CatraalmPeer::ALMDES, '%'.strtr($this->filters['almdes'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['nomald_is_empty']))
    {
      $criterion = $c->getNewCriterion(CatraalmPeer::NOMALD, '');
      $criterion->addOr($c->getNewCriterion(CatraalmPeer::NOMALD, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nomald']) && $this->filters['nomald'] !== '')
    {
      $c->add(CadefalmPeer::NOMALM, strtr("%".$this->filters['nomald']."%", '*', '%'), Criteria::LIKE);
      $c->addJoin(CatraalmPeer::ALMDES,CadefalmPeer::CODALM);
      $c->setIgnoreCase(true);
    }
    if (isset($this->filters['codedo_is_empty']))
    {
      $criterion = $c->getNewCriterion(CatraalmPeer::CODEDO, '');
      $criterion->addOr($c->getNewCriterion(CatraalmPeer::CODEDO, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codedo']) && $this->filters['codedo'] !== '')
    {
      $c->add(CadefalmPeer::CODEDO, $this->filters['codedo']);
      $c->addJoin(CatraalmPeer::ALMORI,CadefalmPeer::CODALM);
    }
    if (isset($this->filters['nomedo_is_empty']))
    {
      $criterion = $c->getNewCriterion(CatraalmPeer::NOMEDO, '');
      $criterion->addOr($c->getNewCriterion(CatraalmPeer::NOMEDO, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nomedo']) && $this->filters['nomedo'] !== '')
    {
        $c->add(OcestadoPeer::NOMEDO, strtr("%".$this->filters['nomedo']."%", '*', '%'), Criteria::LIKE);
        $c->addJoin(CadefalmPeer::CODEDO,  OcestadoPeer::CODEDO); 
        $c->addJoin(CatraalmPeer::ALMORI,CadefalmPeer::CODALM);
        $c->setIgnoreCase(true);
    }
    if (isset($this->filters['codedd_is_empty']))
    {
      $criterion = $c->getNewCriterion(CatraalmPeer::CODEDD, '');
      $criterion->addOr($c->getNewCriterion(CatraalmPeer::CODEDD, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codedd']) && $this->filters['codedd'] !== '')
    {
      $c->add(CadefalmPeer::CODEDO, $this->filters['codedd']);
      $c->addJoin(CatraalmPeer::ALMDES,CadefalmPeer::CODALM);
    }
    if (isset($this->filters['nomedd_is_empty']))
    {
      $criterion = $c->getNewCriterion(CatraalmPeer::NOMEDD, '');
      $criterion->addOr($c->getNewCriterion(CatraalmPeer::NOMEDD, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nomedd']) && $this->filters['nomedd'] !== '')
    {
        $c->add(OcestadoPeer::NOMEDO, strtr("%".$this->filters['nomedd']."%", '*', '%'), Criteria::LIKE);
        $c->addJoin(CadefalmPeer::CODEDO,  OcestadoPeer::CODEDO); 
        $c->addJoin(CatraalmPeer::ALMDES,CadefalmPeer::CODALM);
        $c->setIgnoreCase(true);
    }
    if (isset($this->filters['statra_is_empty']))
    {
      $criterion = $c->getNewCriterion(CatraalmPeer::STATRA, '');
      $criterion->addOr($c->getNewCriterion(CatraalmPeer::STATRA, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['statra']) && $this->filters['statra'] !== '')
    {
      $c->add(CatraalmPeer::STATRA, '%'.strtr($this->filters['statra'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
  }   

    public function executeAnular() {
    $codtra = $this->getRequestParameter('codtra');
    $fectra = $this->getRequestParameter('fectra');

    $dateFormat = new sfDateFormat('es_VE');
    $fec = $dateFormat->format($fectra, 'i', $dateFormat->getInputPattern('d'));

    $c = new Criteria();
    $c->add(CatraalmPeer::CODTRA, $codtra);
    $c->add(CatraalmPeer::FECTRA, $fec);
    $this->catraalm = CatraalmPeer::doSelectOne($c);
    sfView :: SUCCESS;
  }  

  public function executeSalvaranu() {
    $codtra = $this->getRequestParameter('codtra');
    $desanu = $this->getRequestParameter('desanu');
    $fecanu = $this->getRequestParameter('fecanu');
    $fecha_aux = split("/", $fecanu);
    $dateFormat = new sfDateFormat('es_VE');
    $fec = $dateFormat->format($fecanu, 'i', $dateFormat->getInputPattern('d'));
    $this->msg = "";
    $this->mensaje2="";

    $c = new Criteria();
    $c->add(CatraalmPeer::CODTRA, $codtra);
    $resul = CatraalmPeer::doSelectOne($c);
    if ($resul) {           
      Articulos::ActualizarArtTraspaso($resul,$error);
      if ($error==-1) {
        $resul->setFecanu($fec);
        $resul->setDesanu($desanu);
        $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
        $resul->setUsuanu($loguse);
        $resul->setStatra('N');
        $resul->save();      
      }else {
        $this->mensaje2 = Herramientas::obtenerMensajeError($error);
        return sfView::SUCCESS;
      } 
  }   
      
    return sfView :: SUCCESS;
  }             

}
