<?php

/**
 * pagemiret actions.
 *
 * @package    Roraima
 * @subpackage pagemiret
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class pagemiretActions extends autopagemiretActions
{
	public  $coderror1=-1;
	public  $coderror2=-1;

	
  
  
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
      $this->opordpag = $this->getOpordpagOrCreate();
      try{ $this->updateOpordpagFromRequest();}catch(Exception $ex){}
      if ($this->opordpag->getId()=="")
      {
      	if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('opordpag[fecemi]'))==true)
      	{
          $this->coderror1=529;
          return false;
      	}

        $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr'); 
        $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
        if ($filsoldir=='S'){
          if ($this->getRequestParameter('opordpag[coddirec]')==''){
             if ($cambiareti=='S') $this->coderror2=3014; else $this->coderror2=3013;
             return false;
          }
        }

      	$grid=Herramientas::CargarDatosGrid($this, $this->obj,true);
      	$t=0;
      	$contador=0;
		$u=$grid[0];
	     while ($t<count($u))
	     {
           if ($u[$t]["check"]=="1")
           {
             $contador++;
           }
	       $t++;
	     }

	     if ($contador==0)
	     {
	     	$this->coderror2=548;
            return false;
	     }
      }
      return true;
    }else return true;
  }

  public function executeIndex()
  {
     return $this->redirect('pagemiret/edit');
  }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->opordpag = $this->getOpordpagOrCreate();
    $this->mascara = Herramientas::ObtenerFormato('Contaba','Forcta');
    $this->impordret=$this->getRequestParameter('impordret');
    $this->lonmas=strlen($this->mascara);
    $this->numero=$this->getRequestParameter('numero');
    $varemp = $this->getUser()->getAttribute('configemp');
    $this->numdesh="";
	if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('tesoreria',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
	     if(array_key_exists('pagemiret',$varemp['aplicacion']['tesoreria']['modulos'])){
	       if(array_key_exists('numorddesh',$varemp['aplicacion']['tesoreria']['modulos']['pagemiret']))
	       {
	       	$this->numdesh=$varemp['aplicacion']['tesoreria']['modulos']['pagemiret']['numorddesh'];
	       }
	     }


    if ($this->getRequestParameter('formulario')!="")
    {
     $this->getUser()->setAttribute('formulario',$this->getRequestParameter('formulario'));
     $this->formulario=$this->getRequestParameter('formulario');
     $this->tipo=$this->getUser()->getAttribute('tipo',null,$this->getUser()->getAttribute('formulario'));
     $this->nomext   = Herramientas::getX('TIPCAU','Cpdoccau','Nomext',$this->tipo);
     $this->concepto = $this->getUser()->getAttribute('concepto',null,$this->getUser()->getAttribute('formulario'));
     $this->tiporet = $this->getUser()->getAttribute('tiporet',null,$this->getUser()->getAttribute('formulario'));
    }
    else
    {
     $this->formulario='';
     $this->tipo='';
     $this->concepto='';
     $this->tiporet='';
     $this->nomext   = '';
    }

    $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr');
    if ($filsoldir=='S'){
       $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
       $t= new Criteria();
       $t->add(SegdirusuPeer::LOGUSE,$loguse);
       $t->setLimit(1);
       $t->addAscendingOrderByColumn(SegdirusuPeer::CODDIREC);
       $regt= SegdirusuPeer::doSelectOne($t); 
       if ($regt){
        if ($this->opordpag->getCoddirec()=='')
          $this->opordpag->setCoddirec($regt->getCoddirec());
       }
      
    }

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateOpordpagFromRequest();

      $this->saveOpordpag($this->opordpag);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('pagemiret/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('pagemiret/list');
      }
      else
      {
        return $this->redirect('pagemiret/edit?impordret=S&numero='.$this->opordpag->getNumord());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
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
  protected function saveOpordpag($opordpag)
  {
    $grid=Herramientas::CargarDatosGrid($this, $this->obj,true);
    OrdendePago::salvarPagemiret($opordpag, $grid);
    if ($this->getRequestParameter('formulario')!="")
    {
      $this->redirect('pagemiret/cerraropret?id='.$this->opordpag->getId());
    }
  }

  public function executeCerraropret()
  {
    sfView::SUCCESS;
  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateOpordpagFromRequest()
  {
    $opordpag = $this->getRequestParameter('opordpag');
    $this->mascara = Herramientas::ObtenerFormato('Contaba','Forcta');
    $this->lonmas=strlen($this->mascara);
    $varemp = $this->getUser()->getAttribute('configemp');
    $this->numdesh="";
	if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('tesoreria',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
	     if(array_key_exists('pagemiret',$varemp['aplicacion']['tesoreria']['modulos'])){
	       if(array_key_exists('numorddesh',$varemp['aplicacion']['tesoreria']['modulos']['pagemiret']))
	       {
	       	$this->numdesh=$varemp['aplicacion']['tesoreria']['modulos']['pagemiret']['numorddesh'];
	       }
	     }

    if ($this->getRequestParameter('formulario')!="")
    {
     $this->getUser()->setAttribute('formulario',$this->getRequestParameter('formulario'));
     $this->formulario=$this->getRequestParameter('formulario');
     $this->tipo=$this->getUser()->getAttribute('tipo',null,$this->getUser()->getAttribute('formulario'));
     $this->nomext   = Herramientas::getX('TIPCAU','Cpdoccau','Nomext',$this->tipo);
     $this->concepto = $this->getUser()->getAttribute('concepto',null,$this->getUser()->getAttribute('formulario'));
     $this->tiporet = $this->getUser()->getAttribute('tiporet',null,$this->getUser()->getAttribute('formulario'));
    }
    else
    {
     $this->formulario='';
     $this->tipo='';
     $this->concepto='';
     $this->tiporet='';
     $this->nomext   = '';
    }

    if (isset($opordpag['numord']))
    {
      $this->opordpag->setNumord($opordpag['numord']);
    }
    if (isset($opordpag['fecemi']))
    {
      if ($opordpag['fecemi'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($opordpag['fecemi']))
          {
            $value = $dateFormat->format($opordpag['fecemi'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $opordpag['fecemi'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->opordpag->setFecemi($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->opordpag->setFecemi(null);
      }
    }
    if (isset($opordpag['tipcau']))
    {
      $this->opordpag->setTipcau($opordpag['tipcau']);
    }
    if (isset($opordpag['nomext']))
    {
      $this->opordpag->setNomext($opordpag['nomext']);
    }
    if (isset($opordpag['desord']))
    {
      $this->opordpag->setDesord($opordpag['desord']);
    }
    if (isset($opordpag['cedrif']))
    {
      $this->opordpag->setCedrif($opordpag['cedrif']);
    }
    if (isset($opordpag['nomben']))
    {
      $this->opordpag->setNomben($opordpag['nomben']);
    }
    if (isset($opordpag['ctapag']))
    {
      $this->opordpag->setCtapag($opordpag['ctapag']);
    }
    if (isset($opordpag['descta']))
    {
      $this->opordpag->setDescta($opordpag['descta']);
    }
    if (isset($opordpag['tipfin']))
    {
      $this->opordpag->setTipfin($opordpag['tipfin']);
    }
    if (isset($opordpag['nomext2']))
    {
      $this->opordpag->setNomext2($opordpag['nomext2']);
    }
    if (isset($opordpag['codtip']))
    {
      $this->opordpag->setCodtip($opordpag['codtip']);
    }
    if (isset($opordpag['destip']))
    {
      $this->opordpag->setDestip($opordpag['destip']);
    }
    if (isset($opordpag['coduni']))
    {
      $this->opordpag->setCoduni($opordpag['coduni']);
    }
    if (isset($opordpag['monord']))
    {
      $this->opordpag->setMonord($opordpag['monord']);
    }
    if (isset($opordpag['status']))
    {
      $this->opordpag->setStatus($opordpag['status']);
    }
    if (isset($opordpag['aproba']))
    {
      $this->opordpag->setAproba($opordpag['aproba']);
    }
    if (isset($opordpag['fecven']))
    {
      if ($opordpag['fecven'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($opordpag['fecven']))
          {
            $value = $dateFormat->format($opordpag['fecven'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $opordpag['fecven'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->opordpag->setFecven($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->opordpag->setFecven(null);
      }
    }

    if (isset($opordpag['numsigecof']))
    {
      $this->opordpag->setNumsigecof($opordpag['numsigecof']);
    }
    if (isset($opordpag['fecsigecof']))
    {
      if ($opordpag['fecsigecof'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($opordpag['fecsigecof']))
          {
            $value = $dateFormat->format($opordpag['fecsigecof'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $opordpag['fecsigecof'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->opordpag->setFecsigecof($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->opordpag->setFecsigecof(null);
      }
    }
    if (isset($opordpag['expsigecof']))
    {
      $this->opordpag->setExpsigecof($opordpag['expsigecof']);
    }
    if (isset($opordpag['codmon']))
    {
      $this->opordpag->setCodmon($opordpag['codmon']);
    }
    if (isset($opordpag['valmon']))
    {
      $this->opordpag->setValmon($opordpag['valmon']);
    }
    if (isset($opordpag['coddirec']))
    {
      $this->opordpag->setCoddirec($opordpag['coddirec']);
    }
    if (isset($opordpag['coddirechas']))
    {
      $this->opordpag->setCoddirechas($opordpag['coddirechas']);
    }
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codigo=' ',$codigo2=' ', $fecdes='', $fechas='', $codret='', $coddirec='', $coddirechas='')
  {
    if(trim($fecdes)!=""){
    	$date = explode("/",$fecdes);
    	if(!isset($date[0])) $date[0] = 0;
    	if(!isset($date[1])) $date[1] = 0;
    	if(!isset($date[2])) $date[2] = 0;

    	$sqlfecdes = " AND A.FECEMI >= '$date[2]-$date[1]-$date[0]'";
    }else{
    	$sqlfecdes = "";
    }
    if(trim($fechas)!=""){
    	$date = explode("/",$fechas);
    	if(!isset($date[0])) $date[0] = 0;
    	if(!isset($date[1])) $date[1] = 0;
    	if(!isset($date[2])) $date[2] = 0;

    	$sqlfechas = " AND A.FECEMI <= '$date[2]-$date[1]-$date[0]' ";
    }else{
    	$sqlfechas = "";
    }

    $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr');
    $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
    $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
    $sqlcoddir="";
    if ($filsoldir=='S' && $coddirec!='' && $coddirechas!=''){
      $sqlcoddir= 'AND (A.CODDIREC>=\''.$coddirec.'\'  AND A.CODDIREC<=\''.$coddirechas.'\' and A.CODDIREC in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\'))';
    }

    $sqlche = "";
    $sqltabla = "";

    $c =  new Criteria();
    $datos = OpdefempPeer::doSelectOne($c);

    if($datos){
    	$emichepag = $datos->getEmichepag();
      $orpagretnom=$datos->getOrdret();
    	if($emichepag == "S"){
    		$sqltabla = ", TSCHEEMI E";
    		$sqlche = " AND A.NUMCHE = E.NUMCHE AND A.CTABAN = E.NUMCUE AND E.STATUS = 'E'";
    	}else {
    		$sqlche = "";
    		$sqltabla = "";
    	}
    }else{
    	$emichepag = "";
    }

    $filordfac=H::getConfApp('filordfac', 'pagemiret', 'tesoreria');
    if ($filordfac=='S' && $orpagretnom!=$codigo2)
    {
        $sqltabla = $sqltabla.", OPFACTUR D";
        $sqlche = $sqlche." AND A.NUMORD = D.NUMORD";
    }

    $traeallord=H::getConfApp('traeallord', 'pagemiret', 'tesoreria');
    if ($traeallord!='S')
      $SQL="SELECT 0 as check, A.NUMORD as numord,A.FECEMI as fecemi,B.CODPRE as codpre,round((B.MONRET/A.VALMON),2) as monret, nomben as nomben, B.CODTIP as codtip, C.DESTIP as destip, F.NOMMON as nommon, A.CODMON as codmon, A.VALMON as valmon, A.CODDIREC as coddirec, 9 as id FROM OPORDPAG A,OPRETORD B, OPTIPRET C, TSDEFMON F".$sqltabla." WHERE A.NUMORD = B.NUMORD AND B.CODTIP=C.CODTIP AND A.CODMON = F.CODMON AND B.CODTIP >= '".$codret."' AND A.STATUS<>'A' AND B.CODTIP <= '".$codigo."' AND B.NUMRET = 'NOASIGNA' ".$sqlche.$sqlfecdes.$sqlfechas.$sqlcoddir." order by a.fecemi, a.numord";
    else
      $SQL="SELECT 0 as check, A.NUMORD as numord,A.FECEMI as fecemi,B.CODPRE as codpre,ROUND((B.MONRET/A.VALMON),2) as monret, nomben as nomben, B.CODTIP as codtip, C.DESTIP as destip, F.NOMMON as nommon, A.CODMON as codmon, A.VALMON as valmon, A.CODDIREC as coddirec, 9 as id FROM OPORDPAG A,OPRETORD B, OPTIPRET C, TSDEFMON F".$sqltabla." WHERE A.NUMORD = B.NUMORD AND B.CODTIP=C.CODTIP AND A.CODMON = F.CODMON AND A.STATUS<>'A' AND B.NUMRET = 'NOASIGNA' ".$sqlche.$sqlfecdes.$sqlfechas.$sqlcoddir." order by a.fecemi, a.numord";
  
    $resp = Herramientas::BuscarDatos($SQL,$all);
    $this->numfila=count($all);

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(false);
    $opciones->setTabla('Opretord');
    $opciones->setAnchoGrid(1050);
    $opciones->setAncho(1150);
    $opciones->setTitulo('');
    $opciones->setFilas(0);
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Marque');
    $col1->setTipo(Columna::CHECK);
    $col1->setNombreCampo('check');
    $col1->setEsGrabable(true);
    $col1->setCheckbox(true);
    $col1->setHTML(' ');
    $col1->setJScript('onClick="totalmarcadas(this.id)"');

    $col2 = new Columna('Nro. Orden');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('numord');
    $col2->setHTML('type="text" size="10" readonly=true');

    $col3 = new Columna('Fecha');
  	$col3->setTipo(Columna::FECHA);
  	$col3->setEsGrabable(true);
  	$col3->setNombreCampo('fecemi');
  	$col3->setAlineacionObjeto(Columna::CENTRO);
  	$col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setHTML('type="text" size="5" readonly=true');

    $col4 = new Columna('Beneficiario');
    $col4->setTipo(Columna::TEXTO);
    $col4->setEsGrabable(true);
    $col4->setAlineacionObjeto(Columna::IZQUIERDA);
    $col4->setAlineacionContenido(Columna::IZQUIERDA);
    $col4->setNombreCampo('nomben');
    $col4->setHTML('type="text" size="25" readonly=true');

    $col5 = new Columna('Código Presupuestario');
    $col5->setTipo(Columna::TEXTO);
    $col5->setEsGrabable(true);
    $col5->setAlineacionObjeto(Columna::CENTRO);
    $col5->setAlineacionContenido(Columna::CENTRO);
    $col5->setNombreCampo('codpre');
    $col5->setHTML('type="text" size="25" readonly=true');

    $col6 = new Columna('Monto Retención');
    $col6->setTipo(Columna::MONTO);
    $col6->setEsGrabable(true);
    $col6->setAlineacionContenido(Columna::IZQUIERDA);
    $col6->setAlineacionObjeto(Columna::IZQUIERDA);
    $col6->setNombreCampo('monret');
    $col6->setEsNumerico(true);
    $col6->setHTML('type="text" size="10" readonly=true');

    $col7 = new Columna('Retención');
    $col7->setTipo(Columna::TEXTO);
    $col7->setEsGrabable(true);
    $col7->setAlineacionObjeto(Columna::IZQUIERDA);
    $col7->setAlineacionContenido(Columna::IZQUIERDA);
    $col7->setNombreCampo('codtip');
    $col7->setHTML('type="text" size="10" readonly=true');
    if ($traeallord!='S') $col7->setOculta(true);

    $col8 = new Columna('Descripción');
    $col8->setTipo(Columna::TEXTO);
    $col8->setEsGrabable(true);
    $col8->setAlineacionObjeto(Columna::IZQUIERDA);
    $col8->setAlineacionContenido(Columna::IZQUIERDA);
    $col8->setNombreCampo('destip');
    $col8->setHTML('type="text" size="20" readonly=true');
    if ($traeallord!='S') $col8->setOculta(true);
    
    $col9 = new Columna('Moneda');
    $col9->setTipo(Columna::TEXTO);
    $col9->setEsGrabable(true);
    $col9->setAlineacionObjeto(Columna::IZQUIERDA);
    $col9->setAlineacionContenido(Columna::IZQUIERDA);
    $col9->setNombreCampo('nommon');
    $col9->setHTML('type="text" size="7" readonly=true');    

    $col10 = new Columna('COD. MONEDA');
    $col10->setTipo(Columna::TEXTO);
    $col10->setEsGrabable(true);
    $col10->setAlineacionObjeto(Columna::IZQUIERDA);
    $col10->setAlineacionContenido(Columna::IZQUIERDA);
    $col10->setNombreCampo('codmon');
    $col10->setHTML('type="text" size="5" readonly=true');     
    $col10->setOculta(true);
    
    $col11 = new Columna('Valor Moneda');
    $col11->setTipo(Columna::MONTO);
    $col11->setEsGrabable(true);
    $col11->setAlineacionContenido(Columna::IZQUIERDA);
    $col11->setAlineacionObjeto(Columna::IZQUIERDA);
    $col11->setNombreCampo('valmon');
    $col11->setEsNumerico(true);
    $col11->setHTML('type="text" size="5" readonly=true');    

    $col12 = new Columna('Código Ret.');
    $col12->setTipo(Columna::TEXTO);
    $col12->setEsGrabable(true);
    $col12->setAlineacionObjeto(Columna::IZQUIERDA);
    $col12->setAlineacionContenido(Columna::IZQUIERDA);
    $col12->setNombreCampo('codtip');
    $col12->setHTML('type="text" size="5" readonly=true');     

    $col13 = new Columna('Descripción Ret.');
    $col13->setTipo(Columna::TEXTO);
    $col13->setEsGrabable(true);
    $col13->setAlineacionObjeto(Columna::IZQUIERDA);
    $col13->setAlineacionContenido(Columna::IZQUIERDA);
    $col13->setNombreCampo('destip');
    $col13->setHTML('type="text" size="20" readonly=true'); 

    $col14 = new Columna('Estado');
    $col14->setTipo(Columna::TEXTO);
    $col14->setEsGrabable(true);
    $col14->setAlineacionObjeto(Columna::IZQUIERDA);
    $col14->setAlineacionContenido(Columna::IZQUIERDA);
    $col14->setNombreCampo('coddirec');
    $col14->setHTML('type="text" size="5" readonly=true');  
    if ($cambiareti!='S') $col14->setOculta(true);  


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
   
    $this->obj = $opciones->getConfig($all);
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
    $cuenta=$this->getRequestParameter('cuenta');
    $descta=$this->getRequestParameter('descuenta');
  if ($this->getRequestParameter('ajax')=='1')
  {
    $dato=""; $js="";
    $w= new Criteria();
    $w->add(CpdoccauPeer::TIPCAU,$this->getRequestParameter('codigo'));
    $result= CpdoccauPeer::doSelectOne($w);
    if ($result)
    {
      $esta=H::getX_vacio('ORDRET','Opdefemp','Codemp',$result->getTipcau());
      if ($esta!='')
        $dato=$result->getNomext();
      else
        $js="alert('El Tipo de Causado no es el definido para Pagos de Retenciones'); $('opordpag_tipcau').value=''; $('opordpag_tipcau').focus();";
    }
    else $js="alert('El Tipo de Causado no esta Registrado'); $('opordpag_tipcau').value=''; $('opordpag_tipcau').focus();";
      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
  }
  else  if ($this->getRequestParameter('ajax')=='2')
  {
    $dato=OpbenefiPeer::getDato($this->getRequestParameter('codigo'),'Nomben');
    $dato1=OpbenefiPeer::getDato($this->getRequestParameter('codigo'),'Codcta');
    $dato2=OpbenefiPeer::getDato2($dato1,'Descta');
      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cuenta.'","'.$dato1.'",""],["'.$descta.'","'.$dato2.'",""]]';
  }
  else  if ($this->getRequestParameter('ajax')=='3')
  {
    $dato=ContabbPeer::getDescta($this->getRequestParameter('codigo'));
      $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
  }
  else  if ($this->getRequestParameter('ajax')=='4')
  {
    $dato=FortipfinPeer::getDesfin($this->getRequestParameter('codigo'));
      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","4","c"]]';
  }
  else  if ($this->getRequestParameter('ajax')=='5')
  {
    $js="";
    $q= new Criteria();
    $q->add(TsdesmonPeer::CODMON,$this->getRequestParameter('codigo'));
    $q->addDescendingOrderByColumn(TsdesmonPeer::FECMON);
    $reg= TsdesmonPeer::doSelectOne($q);
    if ($reg)
    {
       $dato=number_format($reg->getValmon(),6,',','.');
    }
    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
  }  
  else  if ($this->getRequestParameter('ajax')=='6')
  {
    $js="";
    $q= new Criteria();
    $q->add(OptipretPeer::CODTIP,$this->getRequestParameter('codigo'));
    $reg= OptipretPeer::doSelectOne($q);
    if ($reg)
    {
       $dato=$reg->getDestip();
    }else {
        $js="alert_('El Tipo de retenci&oacute;n no existe'); $('opordpag_codtip2').value=''; $('opordpag_codtip2').focus();";
    }
    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
  }
  else  if ($this->getRequestParameter('ajax')=='7')
  {
    $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
    $filsoldir=H::getConfApp2('filsoldir', 'viaticos', 'viasolviatra');
    $filsoldir2=H::getConfApp2('filsoldir', 'compras', 'almsolegr'); 
    $codigo=$this->getRequestParameter('codigo');

    $q= new Criteria();
    if ($filsoldir=='S' || $filsoldir2=='S'){
      $sql='cadefdirec.coddirec=\''.$codigo.'\' and cadefdirec.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
      $q->add(CadefdirecPeer::CODDIREC,$sql,Criteria::CUSTOM); 
    }else $q->add(CadefdirecPeer::CODDIREC,$codigo);
    $reg= CadefdirecPeer::doSelectOne($q);
    if ($reg)
    {
       $dato=$reg->getDesdirec();         
    }else {
        $dato="";
        $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
        if ($cambiareti=='S')
          $js="alert_('La Estado no existe o no esta asociada al usuario'); $('$cajtexcom').value='';  $('$cajtexmos').value=''; $('$cajtexcom').focus();";
        else
         $js="alert_('La Direcci&oacute;n no existe o no esta asociada al usuario'); $('$cajtexcom').value='';  $('$cajtexmos').value=''; $('$cajtexcom').focus();";
    }
    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
  } 

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
  return sfView::HEADER_ONLY;
  }

  public function executeAutocomplete()
  {
  if ($this->getRequestParameter('ajax')=='2')
  {
    $this->tags=Herramientas::autocompleteAjax('CEDRIF','Opbenefi','Cedrif',$this->getRequestParameter('opordpag[cedrif]'));
  }
  else  if ($this->getRequestParameter('ajax')=='4')
  {
    $this->tags=Herramientas::autocompleteAjax('CODFIN','Fortipfin','Codfin',$this->getRequestParameter('opordpag[tipfin]'));
    }
    else  if ($this->getRequestParameter('ajax')=='5')
  {
    $this->tags=Herramientas::autocompleteAjax('CODTIP','Optipret','Codtip',$this->getRequestParameter('opordpag[codtip]'));
    }
  }



  public function executeGrid()
  {
  $cajtexmos=$this->getRequestParameter('cajtexmos');
  $cajtexcom=$this->getRequestParameter('cajtexcom');
  $cuenta=$this->getRequestParameter('cuenta');
  $descta=$this->getRequestParameter('descuenta');
  if ($this->getRequestParameter('ajax')=='5')
  {
    $dato=OptipretPeer::getRetencion($this->getRequestParameter('codigo'));
    $cuenta=H::getX_vacio('CODTIP', 'Optipret', 'Codcon', $this->getRequestParameter('codigo'));
    $descuenta=H::getX_vacio('CODCTA', 'Contabb', 'Descta', $cuenta);
    $fecdes = $this->getRequestParameter('fecdes');
    $fechas = $this->getRequestParameter('fechas');
    $coddirec = $this->getRequestParameter('coddirec');
    $coddirechas = $this->getRequestParameter('coddirechas');
    $monto='0,00';

    $this->configGrid($this->getRequestParameter('codigo'),$this->getRequestParameter('codigo2'),$fecdes,$fechas,$this->getRequestParameter('tipret2'),$coddirec,$coddirechas);

    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["opordpag_ctapag","'.$cuenta.'",""],["opordpag_descta","'.$descuenta.'",""],["'.$cajtexmos.'","'.$dato.'",""],["fila","'.$this->numfila.'",""],["opordpag_monord","'.$monto.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
  }
   else  if ($this->getRequestParameter('ajax')=='2')
   {
    $dato=OpbenefiPeer::getDato($this->getRequestParameter('codigo'),'Nomben');
    $dato1=OpbenefiPeer::getDato($this->getRequestParameter('codigo'),'Codcta');
    $dato2=OpbenefiPeer::getDato2($dato1,'Descta');
    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cuenta.'","'.$dato1.'",""],["'.$descta.'","'.$dato2.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
   }
  }


 protected function getOpordpagOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $opordpag = new Opordpag();
      $opordpag->setTipcau(H::getX_vacio('CODEMP','Opdefemp','Ordret','001'));
      $this->configGrid($this->getRequestParameter('opordpag[codtip]'),$this->getRequestParameter('opordpag[tipcau]'),'','',$this->getRequestParameter('opordpag[codtip2]'),$this->getRequestParameter('opordpag[coddirec]'),$this->getRequestParameter('opordpag[coddirechas]'));
    }
    else
    {
      $opordpag = OpordpagPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($opordpag);
    }

    return $opordpag;
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
    $this->opordpag = $this->getOpordpagOrCreate();
    $this->updateOpordpagFromRequest();

    $this->mascara = Herramientas::ObtenerFormato('Contaba','Forcta');
    $this->lonmas=strlen($this->mascara);
    $this->numero="";
    $this->impord="";
    if ($this->getRequestParameter('formulario')!="")
    {
     $this->getUser()->setAttribute('formulario',$this->getRequestParameter('formulario'));
     $this->formulario=$this->getRequestParameter('formulario');
     $this->tipo=$this->getUser()->getAttribute('tipo',null,$this->getUser()->getAttribute('formulario'));
     $this->concepto = $this->getUser()->getAttribute('concepto',null,$this->getUser()->getAttribute('formulario'));
     $this->tiporet = $this->getUser()->getAttribute('tiporet',null,$this->getUser()->getAttribute('formulario'));
    }
    else
    {
     $this->formulario='';
     $this->tipo='';
     $this->concepto='';
     $this->tiporet='';
    }
    $this->labels = $this->getLabels();

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror1!=-1)
      {
       $err = Herramientas::obtenerMensajeError($this->coderror1);
       $this->getRequest()->setError('opordpag{fecemi}',$err);
      }
      if($this->coderror2!=-1)
      {
       $err = Herramientas::obtenerMensajeError($this->coderror2);
       $this->getRequest()->setError('',$err);
      }
    }

    return sfView::SUCCESS;
  }

  public function getLabels()
  {
    $labels = parent::getLabels();  
    $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
    if ($cambiareti=='S'){
      $labels['opordpag{coddirec}'] = 'Estado Desde';
      $labels['opordpag{coddirechas}'] = 'Estado Hasta';
    }
    return $labels;
  }
}
