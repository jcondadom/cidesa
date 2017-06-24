<?php

/**
 * nomdefespprimas actions.
 *
 * @package    Roraima
 * @subpackage nomdefespprimas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomdefespprimasActions extends autonomdefespprimasActions
{

  /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
  	$this->redirect('nomdefespprimas/edit');
  }

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
    $this->npprimashijos = $this->getNpprimashijosOrCreate();
	$this->configGrid();
	$this->configGridProfes();
	$this->configGridCarcol();
	$this->configGridBecas();

  }
  
  public function cargar_tippar()
  {
  	  $c = new Criteria();
	  $obj = NptipparPeer::doSelect($c);
	  $r=array();

	  foreach($obj  as  $i)
	  {
	  	$r += array($i->getTippar()=>$i->getDespar());
	  }
	  return $r;
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codcof='')
    {
        $c = new Criteria();
        $c->add(NpprimashijosPeer::CODCOF,$codcof);
		$per = NpprimashijosPeer::doSelect($c);

		$colcar=H::getConfApp2('colcar', 'nomina', 'nomdefespprimas');

		$filas_arreglo=1;

		// Se crea el objeto principal de la clase OpcionesGrid
		$opciones = new OpcionesGrid();
		// Se configuran las opciones globales del Grid
		$opciones->setEliminar(true);
		$opciones->setFilas($filas_arreglo);
		$opciones->setTabla('Npprimashijos');
		$opciones->setName('a');
		$opciones->setAncho(800);		
		$opciones->setAnchoGrid(900);
		$opciones->setTitulo(' ');
		$opciones->setHTMLTotalFilas(' ');

		// Se generan las columnas
		$col1 = new Columna('Parentesco Familiar');
		$col1->setTipo(Columna::COMBO);
		$col1->setCombo($this->cargar_tippar());
		$col1->setEsGrabable(true);
		$col1->setAlineacionObjeto(Columna::CENTRO);
		$col1->setAlineacionContenido(Columna::CENTRO);
		$col1->setNombreCampo('parfam');
		$col1->setHTML(' ');

		$col2 = new Columna('Edad Desde');
		$col2->setTipo(Columna::TEXTO);
		$col2->setEsGrabable(true);
		$col2->setAlineacionObjeto(Columna::CENTRO);
		$col2->setAlineacionContenido(Columna::CENTRO);
		$col2->setNombreCampo('edaddes');
		$col2->setHTML('type="text" size="20" ');

		$col3 = new Columna('Edad Hasta');
		$col3->setTipo(Columna::TEXTO);
		$col3->setEsGrabable(true);
		$col3->setAlineacionObjeto(Columna::CENTRO);
		$col3->setAlineacionContenido(Columna::CENTRO);
		$col3->setNombreCampo('edadhas');
		$col3->setHTML('type="text" size="20" ');

		$col4 = new Columna('Monto');
		$col4->setTipo(Columna::MONTO);
		$col4->setEsGrabable(true);
		$col4->setAlineacionObjeto(Columna::CENTRO);
		$col4->setAlineacionContenido(Columna::CENTRO);
		$col4->setNombreCampo('monto');
		$col4->setHTML('type="text" size="20"');

		$col5 = new Columna('Estudios');
		$col5->setTipo(Columna::COMBO);
		$col5->setEsGrabable(true);
		$col5->setCombo(array('S'=>'SI','N'=>'NO'));
		$col5->setAlineacionObjeto(Columna::CENTRO);
		$col5->setAlineacionContenido(Columna::CENTRO);
		$col5->setNombreCampo('estudios');
		$col5->setHTML(' ');

	    $col6 = new Columna('Constancia Est.');
	    $col6->setTipo(Columna::CHECK);
	    $col6->setNombreCampo('consest');
	    $col6->setEsGrabable(true);
	    $col6->setHTML(' ');
            
        $col7 = new Columna('Estado Civil');
        $col7->setTipo(Columna::COMBO);
        $col7->setCombo(Constantes::ListaEstadoCivil());
        $col7->setEsGrabable(true);
        $col7->setAlineacionObjeto(Columna::CENTRO);
        $col7->setAlineacionContenido(Columna::CENTRO);
        $col7->setNombreCampo('edociv');
        $col7->setHTML(' ');

        $col8 = new Columna('Tipo de Dedicación');
        $col8->setTipo(Columna::COMBO);
        $col8->setCombo(NptipdedPeer::getDedicaciones());
        $col8->setEsGrabable(true);
        $col8->setAlineacionObjeto(Columna::CENTRO);
        $col8->setAlineacionContenido(Columna::CENTRO);
        $col8->setNombreCampo('codtip');
        $col8->setHTML(' ');
		if ($colcar=='S') {
			$col9 = new Columna('Filtro Cargo');
			$col9->setTipo(Columna::TEXTO);
			$col9->setEsGrabable(true);
			$col9->setAlineacionObjeto(Columna::CENTRO);
			$col9->setAlineacionContenido(Columna::CENTRO);
			$col9->setNombreCampo('filtrocar');
			$col9->setHTML(' ');
		}
		// Se guardan las columnas en el objetos de opciones
		$opciones->addColumna($col1);
		$opciones->addColumna($col2);
		$opciones->addColumna($col3);
		$opciones->addColumna($col4);
		$opciones->addColumna($col5);
		$opciones->addColumna($col6);
                $opciones->addColumna($col7);
                $opciones->addColumna($col8);
		if ($colcar=='S') {
			$opciones->addColumna($col9);
		}
		// Se genera el arreglo de opciones necesario para generar el grid
		$this->obj_hij = $opciones->getConfig($per);
    	$this->npprimashijos->setObj_hij($this->obj_hij);
    }
	
    public function cargar_nivedu()
    {
  	  $c = new Criteria();
	  $obj = NpniveduPeer::doSelect($c);
	  $r=array();

	  foreach($obj  as  $i)
	  {
	  	$r += array($i->getCodniv()=>$i->getDesniv());
	  }
	  return $r;
    }
	
    /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridProfes()
    {

        $c = new Criteria();
		$per = NpprimaprofesPeer::doSelect($c);
	
		$filas_arreglo=1;

		// Se crea el objeto principal de la clase OpcionesGrid
		$opciones = new OpcionesGrid();
		// Se configuran las opciones globales del Grid
		$opciones->setEliminar(true);
		$opciones->setFilas($filas_arreglo);
		$opciones->setTabla('Npprimaprofes');
		$opciones->setName('b');
		$opciones->setAncho(400);		
		$opciones->setAnchoGrid(900);
		$opciones->setTitulo(' ');
		$opciones->setHTMLTotalFilas(' ');

		// Se generan las columnas
		$col1 = new Columna('Grado de Estudio');
		$col1->setTipo(Columna::COMBO);
		$col1->setCombo($this->cargar_nivedu());
		$col1->setEsGrabable(true);
		$col1->setAlineacionObjeto(Columna::CENTRO);
		$col1->setAlineacionContenido(Columna::CENTRO);
		$col1->setNombreCampo('grado');
		$col1->setHTML(' ');

		$col2 = new Columna('Prima');
		$col2->setTipo(Columna::MONTO);
		$col2->setEsGrabable(true);
		$col2->setAlineacionObjeto(Columna::CENTRO);
		$col2->setAlineacionContenido(Columna::CENTRO);
		$col2->setNombreCampo('prima');
		$col2->setHTML('type="text" size="20"');

		// Se guardan las columnas en el objetos de opciones
		$opciones->addColumna($col1);
		$opciones->addColumna($col2);

		// Se genera el arreglo de opciones necesario para generar el grid
		$this->obj_pro = $opciones->getConfig($per);
    	$this->npprimashijos->setObj_pro($this->obj_pro);
    }	
	
      /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridCarCol()
    {

        $c = new Criteria();
		$per = NpcargoscolPeer::doSelect($c);
	
		$filas_arreglo=1;

		// Se crea el objeto principal de la clase OpcionesGrid
		$opciones = new OpcionesGrid();
		// Se configuran las opciones globales del Grid
		$opciones->setEliminar(false);
		$opciones->setFilas($filas_arreglo);
		$opciones->setTabla('Npcargoscol');
		$opciones->setName('c');
		$opciones->setAncho(400);		
		$opciones->setAnchoGrid(900);
		$opciones->setTitulo(' ');
		$opciones->setHTMLTotalFilas(' ');

		// Se generan las columnas
		$col1 = new Columna('Código del Cargo');
		$col1->setTipo(Columna::TEXTO);
		$col1->setEsGrabable(true);
		$col1->setAlineacionObjeto(Columna::CENTRO);
		$col1->setAlineacionContenido(Columna::CENTRO);
		$col1->setNombreCampo('codcarcol');
		$col1->setHTML('type="text" size="20" readonly="true" ');
	
		$col2 = new Columna('Descripción del Cargo');
		$col2->setTipo(Columna::TEXTO);
		$col2->setEsGrabable(true);
		$col2->setAlineacionObjeto(Columna::CENTRO);
		$col2->setAlineacionContenido(Columna::CENTRO);
		$col2->setNombreCampo('descarcol');
		$col2->setHTML('type="text" size="20" readonly="true" ');
		
		$col3 = new Columna('Monto Prima');
		$col3->setTipo(Columna::MONTO);
		$col3->setEsGrabable(true);
		$col3->setAlineacionObjeto(Columna::CENTRO);
		$col3->setAlineacionContenido(Columna::CENTRO);
		$col3->setNombreCampo('prima');
		$col3->setHTML('type="text" size="20"');

		// Se guardan las columnas en el objetos de opciones
		$opciones->addColumna($col1);
		$opciones->addColumna($col2);
		$opciones->addColumna($col3);

		// Se genera el arreglo de opciones necesario para generar el grid
		$this->obj_car = $opciones->getConfig($per);
    	$this->npprimashijos->setObj_car($this->obj_car);
    }	

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
    public function configGridBecas($codbec='')
    {
        $c = new Criteria();
        $c->add(NpbecnivinsPeer::CODBEC,$codbec);
		$per = NpbecnivinsPeer::doSelect($c);
	
		$filas_arreglo=1;

		// Se crea el objeto principal de la clase OpcionesGrid
		$opciones = new OpcionesGrid();
		// Se configuran las opciones globales del Grid
		$opciones->setEliminar(true);
		$opciones->setFilas($filas_arreglo);
		$opciones->setTabla('Npbecnivins');
		$opciones->setName('f');
		$opciones->setAncho(400);		
		$opciones->setAnchoGrid(900);
		$opciones->setTitulo(' ');
		$opciones->setHTMLTotalFilas(' ');

		// Se generan las columnas
		$col1 = new Columna('Nivel de Instrucción');
		$col1->setTipo(Columna::COMBO);
		$col1->setCombo($this->cargar_nivedu());
		$col1->setEsGrabable(true);
		$col1->setAlineacionObjeto(Columna::CENTRO);
		$col1->setAlineacionContenido(Columna::CENTRO);
		$col1->setNombreCampo('codniv');
		$col1->setHTML(' ');

		$col2 = new Columna('Cant. Unidades Tributarias');
		$col2->setTipo(Columna::MONTO);
		$col2->setEsGrabable(true);
		$col2->setAlineacionObjeto(Columna::CENTRO);
		$col2->setAlineacionContenido(Columna::CENTRO);
		$col2->setNombreCampo('canunitri');
		$col2->setHTML('type="text" size="20"');

		// Se guardan las columnas en el objetos de opciones
		$opciones->addColumna($col1);
		$opciones->addColumna($col2);

		// Se genera el arreglo de opciones necesario para generar el grid
		$this->obj_bec = $opciones->getConfig($per);
    	$this->npprimashijos->setObj_bec($this->obj_bec);
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
    $this->npprimashijos = $this->getNpprimashijosOrCreate();
	$this->updateNpprimashijosFromRequest();
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {    			

		$this->configGrid();	
	    $grid=Herramientas::CargarDatosGridv2($this,$this->obj_hij);//0
	    $x=$grid[0]; 
		$r=0;
		if(count($x)>0)
		while ($r<count($x))
	    {
	      if($x[$r]->getParfam()=='')
		  {
		  	$this->coderr= 466;
		  	break;
		  }	  	
	      if($x[$r]->getEdaddes()=='' && strlen(trim($x[$r]->getEdaddes()))==0)
		  {
		  	$this->coderr= 466;
		  	break;
		  }
		  if($x[$r]->getEdadhas()=='')
		  {
		  	$this->coderr= 466;
		  	break;
		  }
		  if($x[$r]->getMonto()==0)
		  {
		  	$this->coderr= 466;
		  	break;
		  }
		  if($x[$r]->getEstudios()=='')
		  {
		  	$this->coderr= 466;
		  	break;
		  }
		  $r++;
		}

      $this->configGridProfes();	
	    $grid_pro=Herramientas::CargarDatosGridv2($this,$this->obj_pro);//0
	    $x=$grid_pro[0]; 
		$r=0;
		if(count($x)>0)
		while ($r<count($x))
	    {
	      if($x[$r]->getGrado()=='')
		  {
		  	$this->coderr= 467;
		  	break;
		  }	  	
	      if($x[$r]->getPrima()==0)
		  {
		  	$this->coderr= 467;
		  	break;
		  }
		  $r++;
		}

	  $this->configGridCarcol();	
	    $grid_car=Herramientas::CargarDatosGridv2($this,$this->obj_car);//0
	    $x=$grid_car[0]; 
		$r=0;
		if(count($x)>0)
		while ($r<count($x))
	    {
	      if($x[$r]->getCodcarcol()=='')
		  {
		  	$this->coderr= 468;
		  	break;
		  }	  	
	      if($x[$r]->getDescarcol()=='')
		  {
		  	$this->coderr= 468;
		  	break;
		  }
		  if($x[$r]->getPrima()==0)
		  {
		  	$this->coderr= 468;
		  	break;
		  }
		  $r++;
		}

		$this->configGridBecas();	
	    $grid_bec=Herramientas::CargarDatosGridv2($this,$this->obj_bec);//0
	    $x=$grid_bec[0]; 
		$r=0;
		if(count($x)>0)
		while ($r<count($x))
	    {
	      if($x[$r]->getCodniv()=='')
		  {
		  	$this->coderr= 2408;
		  	break;
		  }	  	
	      if($x[$r]->getCanunitri()==0)
		  {
		  	$this->coderr= 2408;
		  	break;
		  }
		  $r++;
		}

    }else return true;
//print $this->coderr; exit;
   if ($this->coderr== -1)
     return true;
     else
     return false;



  }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
  	$this->npprimashijos = $this->getNpprimashijosOrCreate();
    $this->updateNpprimashijosFromRequest();
	
  	$this->configGrid();	
	$this->configGridProfes();
	$this->configGridCarcol();
	$this->configGridBecas();	
	
    $grid_hij = Herramientas::CargarDatosGridv2($this,$this->obj_hij);
	$grid_pro = Herramientas::CargarDatosGridv2($this,$this->obj_pro);
	$grid_car = Herramientas::CargarDatosGridv2($this,$this->obj_car);
	$grid_bec=Herramientas::CargarDatosGridv2($this,$this->obj_bec);//0

  }

  /**
   * Función para colocar el codigo necesario para 
   * el proceso de guardar.
   * Esta función debe retornar un valor igual a -1 si no hubo 
   * Inconvenientes al guardar, y != de -1 si existe algún error.
   * Si es diferente de -1 el valor devuelto debe ser un código de error
   * Válido que exista en el archivo config/errores.yml
   *
   */
  public function saving($clasemodelo)
  {
	$grid_hij = Herramientas::CargarDatosGridv2($this,$this->obj_hij);
	$grid_pro = Herramientas::CargarDatosGridv2($this,$this->obj_pro);
	$grid_car = Herramientas::CargarDatosGridv2($this,$this->obj_car);
	$grid_bec=Herramientas::CargarDatosGridv2($this,$this->obj_bec);//0
    $coderr = Nomina::Grabar_grid_nomdefespprimas($clasemodelo,$grid_hij,$grid_pro,$grid_car,$grid_bec);
	 
	return $coderr;
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
    return parent::deleting($clasemodelo);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $javascript = "";  $dato="";

    switch ($ajax){
      case '1':
         $this->ajaxs=$ajax;
         $u= new Criteria();
         $u->add(NpprimashijosPeer::CODCOF,$codigo);
         $reg= NpprimashijosPeer::doSelectOne($u);
         if (!$reg)
         	$codigo='';

         $this->params=array();
         $this->npprimashijos = $this->getNpprimashijosOrCreate();
         $this->updateNpprimashijosFromRequest();
         $this->labels = $this->getLabels();
         $this->configGrid($codigo);
         $output = '[["","",""],["","",""],["","",""]]';
         $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;
      case '2':
         $this->ajaxs=$ajax;
         $u= new Criteria();
         $u->add(NpbecnivinsPeer::CODBEC,$codigo);
         $reg= NpbecnivinsPeer::doSelectOne($u);
         if (!$reg)
         	$codigo='';

         $this->params=array();
         $this->npprimashijos = $this->getNpprimashijosOrCreate();
         $this->updateNpprimashijosFromRequest();
         $this->labels = $this->getLabels();
         $this->configGridBecas($codigo);
         $output = '[["","",""],["","",""],["","",""]]';
         $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        break;
    }


  }


}
