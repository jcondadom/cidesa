<?php

/**
 * facprodec actions.
 *
 * @package    siga
 * @subpackage facprodec
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class facprodecActions extends autofacprodecActions
{
	//public $params=array();

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
  		$this->setVars();
		$this->configGrid( $this->fcdeclar->getNumref(),$this->fcdeclar->getRifcon());
		$this->configGridDeuda();


		}

  public function setVars()
  {
        $this->fcdeclar->setFuente(Herramientas :: getX_vacio('codemp', 'Fcdefins', 'codpro', '001')) ;
        $c= new Criteria();
        $fcdefins=FcdefInsPeer::doSelectOne($c);
        if($fcdefins){
            $this->fcdeclar->setUt($fcdefins->getValunitri());
        }


	}

  public function configGrid($numref='',$rifcon='',$tippro='',$reg = array(),$regelim = array())
   {
		$c = new Criteria();
            $c->add(FcprolicdetPeer :: NROCON,$numref);
            $c->add(FcprolicdetPeer :: RIFCON, $rifcon);
            if($tippro!=''){
            $c->add(FcprolicdetPeer :: TIPPRO, $tippro);}
		$per = FcprolicdetPeer :: doSelect($c);

	    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facprodec/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
	    $this->grid = $this->columnas[0]->getConfig($per);

		$this->fcdeclar->setGrid($this->grid);
	}


  public function configGridDeuda($reg = array(),&$total='')
   {
   	 $per = array();
           if (!(count($reg)>0)){
		$c = new Criteria();
            $c->add(FcdeclarPeer::NUMDEC,$this->fcdeclar->getNumdec());
            $c->addAscendingOrderByColumn(FcdeclarPeer :: FECVEN);
            $per = FcdeclarPeer::doSelect($c);

             }else{
               for ($i=0 ; $i < count($reg); $i++)
                      {

                            $fcdeclar= new Fcdeclar();
                            $fcdeclar->setNumero($i+1);
                            $fcdeclar->setFecven($reg[$i]['fecven']);
                            $fcdeclar->setNombre($reg[$i]['nombre']);
                            $fcdeclar->setTipo($reg[$i]['tipo']);
                            $fcdeclar->setMondec($reg[$i]['mondec']);
                            $fcdeclar->setEdodecstatus($reg[$i]['edodecstatus']);
                             $per[]=$fcdeclar;
                            $total =$total +H::toFloat($reg[$i]['mondec']);

	}

              }
	    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facprodec/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_consulta_deuda');
	    $this->griddeuda = $this->columnas[0]->getConfig($per);
            $this->fcdeclar->setGriddeuda($this->griddeuda);

	}

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $ajax   = $this->getRequestParameter('ajax','');
    $this->ajax=$ajax;
    $javascript='';
    $total=0;
    switch ($ajax){
      case '1':
				$javascript='';
				$c = new Criteria();
				$c->add(FcprolicPeer::NROCON, $codigo);
				$reg = FcprolicPeer::doSelectOne($c);
				if ($reg)
				{

					$this->fecreg = $reg->getFecreg();
					$this->rifcon = $reg->getRifcon();
					$this->nomcon = $reg->getNomcon();
					$this->dircon = $reg->getDircon();
					$this->rifrep = $reg->getRifrep();
					$this->nomconrep = $reg->getNomconrep();
					$this->dirconrep = $reg->getDirconrep();
					$this->texpub = $reg->getTexpub();
					$this->tippro = $reg->getTippro();
					$this->despro = $reg->getDespro();
					$this->dirpro = $reg->getDirpro();

                                        $cr= new Criteria();
                                        $cr->add(FctipproPeer::TIPPRO, $reg->getTippro());
                                        $fctippro = FctipproPeer::doSelectOne($cr);
                                        if($fctippro){
                                            $this->destip = $fctippro->getDestip();
                                             $unidad = $fctippro->getUnipar();
                                             $annio = $fctippro->getAnovig();

                                          switch($fctippro->getParpro()){
                                             case '0';
                                                $javascript = $javascript ."$('label41').innerHTML = 'Unidades';";
                                                break;
                                             case '1':
                                                $javascript = $javascript ."$('label41').innerHTML = 'Medidas en M2';";
                                                 break;
                                             case '2':
                                                 $javascript = $javascript ."$('label41').innerHTML = 'Cantidad de Letras';";
                                                 break;
                                              default:
                                                 $javascript = $javascript ."$('label41').innerHTML = 'Medidas en M2';";
                                                 break;
                                          }

                                        }
					$c = new Criteria();
					$c->add(FcconrepPeer::RIFCON, $reg->getRifcon());
					$fcconrep2 = FcconrepPeer::doSelectOne($c);
					if ($fcconrep2)
					{
				      if (count($fcconrep2)>0)
				      {
				          if ($fcconrep2->getNaccon()=='V')
				          {
				          	$javascript = $javascript . "$('fcdeclar_nacconrep_V').checked=true; ";
				          }
				          else
				          {
				          	$javascript = $javascript . "$('fcdeclar_nacconrep_E').checked=true; ";
				          }
				          if ($fcconrep2->getTipcon()=='N')
				          {
							$javascript = $javascript . "$('fcdeclar_tipconrep_N').checked=true; ";
				          }
				          else
				          {
				          	$javascript = $javascript . "$('fcdeclar_tipconrep_J').checked=true; ";
				          }
				      }
				      else
				      {
			  	      	$javascript = $javascript . "alert('El representante no Existe, incluya todos sus Datos Basicos');";
				      }
					}
                                    $this->params=array();
                                    $this->fcdeclar = $this->getFcdeclarOrCreate();
                                    $this->labels = $this->getLabels();
                                    $this->configGrid($codigo,$reg->getRifcon(),$reg->getTippro());

				}


				$this->fuente = Herramientas :: getX_vacio('codemp', 'Fcdefins', 'codveh', '001');
		        $this->frecob = Herramientas :: getX_vacio('codfue', 'fcfuepre', 'frecob', $this->fuente);

				$c = new Criteria();
				$c->add(FcfueprePeer::CODFUE, $this->fuente);
				$reg = FcfueprePeer::doSelectone($c);

				if ($reg->getFrecob()=='999')
				{

					  $this->frecuencia  = '1';
			          $fec=explode('-',$reg->getInieje());
			          $this->fechainicio =$fec[2]."/".$fec[1]."/".$fec[0];
			          $fec=explode('-',$reg->getFineje());
			          $this->fechafin=$fec[2]."/".$fec[1]."/".$fec[0];

				}else{

					$this->frecuencia  = $reg->getFrecob();
			          $fec=explode('-',$reg->getInieje());
			          $this->fechainicio =$fec[2]."/".$fec[1]."/".$fec[0];
			          $fec=explode('-',$reg->getFineje());
			          $this->fechafin=$fec[2]."/".$fec[1]."/".$fec[0];
				}

    	    $output = '[["fcdeclar_nomconrep","'.$this->nomconrep.'",""],["fcdeclar_dirconrep","'.$this->dirconrep.'",""],
                      ["javascript","' . $javascript . '",""],["fcdeclar_rifcon","'.$this->rifcon.'",""], ["fcdeclar_nomcon","'.$this->nomcon.'",""],
                      ["fcdeclar_dircon","'.$this->dircon.'",""], ["fcdeclar_rifrep","'.$this->rifrep.'",""], ["fcdeclar_tippro","'.$this->tippro.'",""],
                      ["fcdeclar_texpub","'.$this->texpub.'",""],["fcdeclar_dirpro","'.$this->dirpro.'",""],["fcdeclar_despro","'.$this->despro.'",""],
                      ["fcdeclar_fechainicio","'.$this->fechainicio.'",""],["fcdeclar_fechafin","'.$this->fechafin.'",""],["fcdeclar_destip","'.$this->destip.'",""]]';

        break;

        case '2':
			$tippro = $this->getRequestParameter('tippro','');
			$rifcon = $this->getRequestParameter('rifcon','');

			$this->fcdeclar = $this->getFcdeclarOrCreate();
			$this->fcdeclar->setNumref($codigo);
			$this->fcdeclar->setRifcon($rifcon);
			$this->fcdeclar->setTippro($tippro);
			$this->updateFcdeclarFromRequest();

			$this->configGrid();
        $output = '[["","",""],["","",""],["","",""]]';

        break;
        case '3' :
              $fuente = $this->getRequestParameter('fuente','');
              $fecfin= $this->getRequestParameter('fecfin','');
              $fecini= $this->getRequestParameter('fecini','');
              $fecdec=$this->getRequestParameter('fecdec','');
              $tippro = $this->getRequestParameter('tippro','');
              $rifcon = $this->getRequestParameter('rifcon','');
             // $indcalpro = H::getConfApp('indcalpro', 'hacienda', 'facprodec');
              $indcalpro='N';
              $porcion="";
              $fname="";$diaven="";$tipoven="";$valor="";
              $grid= array();
              $griddeuda= array();
              $mod='facprodec';
               $this->params=array();
               $this->fcdeclar = $this->getFcdeclarOrCreate();
               $this->labels = $this->getLabels();
               self::setVars();
              //Cálculo de la porción
               $datos = Constantes::Porciones();
                 $c=new Criteria();
                 $c->add(FcfueprePeer::CODFUE,$fuente);
                 $fcfuepre=FcfueprePeer::doSelectOne($c);
                  if($fcfuepre){
                     if($fcfuepre->getFrecob()==999){
                        $porcion=1;
                        $fname="PAGO UNICO";

                    }else{
                        $porcion=$fcfuepre->getFrecob();
                    }
                      $fportion = $datos[$porcion];
                      $diaven = $fcfuepre->getDiaven();
                      $tipoven = $fcfuepre->getTipven();
                      Hacienda::DistribuirVencimiento('', '','',$fecdec, $fecini,$fecfin,$porcion, $fportion, $griddeuda,$diaven,$tipoven,$mod);
                      if(count($griddeuda)>0){
                      Hacienda::MontoDecPropraganda($griddeuda,$tippro,$porcion,$this->fcdeclar->getUt(),$codigo,$rifcon,$indcalpro);

                      }
                    }

               $this->configGridDeuda($griddeuda,$total);
               $output = '[["javascript","' . $javascript . '",""],["fcdeclar_totmondec","'.number_format($total,2,',','.').'",""],["","",""]]';
            break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
   if($ajax!=1 && $ajax!=3){
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

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      // $this->configGrid();
      // $grid = Herramientas::CargarDatosGrid($this,$this->obj);

      // Aqui van los llamados a los métodos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

      // $resp = Compras::validarAlmajuoc($this->caajuoc,$grid);

       //$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);

      // al final $resp es analizada en base al código que retorna
      // Todas las funciones de validación y procesos del negocio
      // deben retornar códigos >= -1. Estos código serám buscados en
      // el archivo errors.yml en la función handleErrorEdit()

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
    $this->configGrid();
    $this->configGridDeuda();

    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
    $gridDeuda = Herramientas::CargarDatosGridv2($this,$this->griddeuda);

  }

  public function saving($clasemodelo)
  {
    $grid      = Herramientas::CargarDatosGridv2($this,$clasemodelo->getGrid());
    $gridDeuda = Herramientas::CargarDatosGridv2($this,$clasemodelo->getGriddeuda());
  	return Hacienda::saveFacprodec($clasemodelo,$grid,$gridDeuda);

  }

   public function deleting($clasemodelo)
  {
      if (Hacienda::VerificarDecPag($this->fcdeclar->getNumdec()))
    {
        return Hacienda::eliminarFacvehdec($clasemodelo);
     }else {
        return 737;

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
    $c->addSelectColumn("'' AS EXIPAGUNI");
    $c->addSelectColumn('0 AS ID');
    $c->addJoin(FcdeclarPeer::NUMREF,FcprolicPeer::NROCON);
    $c->addGroupByColumn(FcdeclarPeer::NUMDEC);
    $c->addGroupByColumn(FcdeclarPeer::FECDEC);
    $c->addGroupByColumn(FcdeclarPeer::NUMREF);
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }
   protected function getFcdeclarOrCreate($id = 'id', $numdecl = 'numdecl', $numrefe = 'numrefe')
  {
    if (!$this->getRequestParameter($numdecl))
    {
      $fcdeclar = new Fcdeclar();
  }
    else
    {
      $n1=$this->getRequestParameter($numdecl);
        $n2=$this->getRequestParameter($numrefe);
        
        $d= new Criteria();
        $d->add(FcdeclarPeer::NUMDEC,$n1);
        $d->add(FcdeclarPeer::NUMREF,$n2);
        $reg2= FcdeclarPeer::doSelectOne($d);
        if ($reg2)
          $id=$reg2->getId();
        else
            $id=0;
        
      //$id=Herramientas::getX_vacio('NUMDEC', 'Fcdeclar', 'id', $this->getRequestParameter($numdecl));

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
      return $this->forward('facprodec', 'list');
    }


    return $this->forward('facprodec', 'list');
  }

 protected function updateFcdeclarFromRequest()
  {
    $fcdeclar = $this->getRequestParameter('fcdeclar');

    if (isset($fcdeclar['numdec']))
    {
      $this->fcdeclar->setNumdec($fcdeclar['numdec']);
  }
    if (isset($fcdeclar['fecdec']))
    {
      if ($fcdeclar['fecdec'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcdeclar['fecdec']))
          {
            $value = $dateFormat->format($fcdeclar['fecdec'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcdeclar['fecdec'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcdeclar->setFecdec($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcdeclar->setFecdec(null);
      }
    }
    if (isset($fcdeclar['numref']))
    {
      $this->fcdeclar->setNumref($fcdeclar['numref']);
    }
    if (isset($fcdeclar['fundec']))
    {
      $this->fcdeclar->setFundec($fcdeclar['fundec']);
    }
    if (isset($fcdeclar['mensaje']))
    {
      $this->fcdeclar->setMensaje($fcdeclar['mensaje']);
    }
    if (isset($fcdeclar['rifcon']))
    {
      $this->fcdeclar->setRifcon($fcdeclar['rifcon']);
    }
    if (isset($fcdeclar['dircon']))
    {
      $this->fcdeclar->setDircon($fcdeclar['dircon']);
    }
    if (isset($fcdeclar['nacconcon']))
    {
      $this->fcdeclar->setNacconcon($fcdeclar['nacconcon']);
    }
    if (isset($fcdeclar['tipconcon']))
    {
      $this->fcdeclar->setTipconcon($fcdeclar['tipconcon']);
    }
    if (isset($fcdeclar['rifrep']))
    {
      $this->fcdeclar->setRifrep($fcdeclar['rifrep']);
    }
    if (isset($fcdeclar['dirconrep']))
    {
      $this->fcdeclar->setDirconrep($fcdeclar['dirconrep']);
    }
    if (isset($fcdeclar['nacconrep']))
    {
      $this->fcdeclar->setNacconrep($fcdeclar['nacconrep']);
    }
    if (isset($fcdeclar['tipconrep']))
    {
      $this->fcdeclar->setTipconrep($fcdeclar['tipconrep']);
    }
    if (isset($fcdeclar['tippro']))
    {
      $this->fcdeclar->setTippro($fcdeclar['tippro']);
    }
    if (isset($fcdeclar['destip']))
    {
      $this->fcdeclar->setDestip($fcdeclar['destip']);
    }
    if (isset($fcdeclar['grid']))
    {
      $this->fcdeclar->setGrid($fcdeclar['grid']);
    }
    if (isset($fcdeclar['despro']))
    {
      $this->fcdeclar->setDespro($fcdeclar['despro']);
    }
    if (isset($fcdeclar['dirpro']))
    {
      $this->fcdeclar->setDirpro($fcdeclar['dirpro']);
    }
    if (isset($fcdeclar['texpub']))
    {
      $this->fcdeclar->setTexpub($fcdeclar['texpub']);
    }
    if (isset($fcdeclar['semdia']))
    {
      $this->fcdeclar->setSemdia($fcdeclar['semdia']);
    }
    if (isset($fcdeclar['fecini']))
    {
      if ($fcdeclar['fecini'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcdeclar['fecini']))
          {
            $value = $dateFormat->format($fcdeclar['fecini'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcdeclar['fecini'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcdeclar->setFecini($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcdeclar->setFecini(null);
      }
    }

    if (isset($fcdeclar['griddeuda']))
    {
      $this->fcdeclar->setGriddeuda($fcdeclar['griddeuda']);
    }
    if (isset($fcdeclar['totmondec']))
    {
      $this->fcdeclar->setTotmondec($fcdeclar['totmondec']);
    }

    if (isset($fcdeclar['numdec']))
  {
      $this->fcdeclar->setNumdec($fcdeclar['numdec']);
    }
    if (isset($fcdeclar['fecven']))
    {
      if ($fcdeclar['fecven'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcdeclar['fecven']))
          {
            $value = $dateFormat->format($fcdeclar['fecven'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcdeclar['fecven'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcdeclar->setFecven($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcdeclar->setFecven(null);
      }
    }
    if (isset($fcdeclar['fueing']))
    {
      $this->fcdeclar->setFueing($fcdeclar['fueing']);
    }
    if (isset($fcdeclar['fecdec']))
    {
      if ($fcdeclar['fecdec'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcdeclar['fecdec']))
          {
            $value = $dateFormat->format($fcdeclar['fecdec'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcdeclar['fecdec'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcdeclar->setFecdec($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcdeclar->setFecdec(null);
      }
    }
    if (isset($fcdeclar['rifcon']))
    {
      $this->fcdeclar->setRifcon($fcdeclar['rifcon']);
    }
    if (isset($fcdeclar['tipo']))
    {
      $this->fcdeclar->setTipo($fcdeclar['tipo']);
    }
    if (isset($fcdeclar['numref']))
    {
      $this->fcdeclar->setNumref($fcdeclar['numref']);
    }
    if (isset($fcdeclar['nombre']))
    {
      $this->fcdeclar->setNombre($fcdeclar['nombre']);
    }
    if (isset($fcdeclar['mondec']))
    {
      $this->fcdeclar->setMondec($fcdeclar['mondec']);
    }
    if (isset($fcdeclar['edodec']))
    {
      $this->fcdeclar->setEdodec($fcdeclar['edodec']);
    }
    if (isset($fcdeclar['mora']))
    {
      $this->fcdeclar->setMora($fcdeclar['mora']);
    }
    if (isset($fcdeclar['prontopg']))
    {
      $this->fcdeclar->setProntopg($fcdeclar['prontopg']);
    }
    if (isset($fcdeclar['autliq']))
    {
      $this->fcdeclar->setAutliq($fcdeclar['autliq']);
    }
    if (isset($fcdeclar['fundec']))
    {
      $this->fcdeclar->setFundec($fcdeclar['fundec']);
    }
    if (isset($fcdeclar['codrec']))
    {
      $this->fcdeclar->setCodrec($fcdeclar['codrec']);
    }
    if (isset($fcdeclar['modo']))
    {
      $this->fcdeclar->setModo($fcdeclar['modo']);
    }
    if (isset($fcdeclar['numero']))
    {
      $this->fcdeclar->setNumero($fcdeclar['numero']);
    }
    if (isset($fcdeclar['conpag']))
    {
      $this->fcdeclar->setConpag($fcdeclar['conpag']);
    }
    if (isset($fcdeclar['monabo']))
    {
      $this->fcdeclar->setMonabo($fcdeclar['monabo']);
    }
    if (isset($fcdeclar['numabo']))
    {
      $this->fcdeclar->setNumabo($fcdeclar['numabo']);
    }
    if (isset($fcdeclar['nomcon']))
    {
      $this->fcdeclar->setNomcon($fcdeclar['nomcon']);
    }
    if (isset($fcdeclar['otro']))
    {
      $this->fcdeclar->setOtro($fcdeclar['otro']);
    }
    if (isset($fcdeclar['miginc']))
    {
      $this->fcdeclar->setMiginc($fcdeclar['miginc']);
    }
    if (isset($fcdeclar['anodec']))
    {
      $this->fcdeclar->setAnodec($fcdeclar['anodec']);
    }
    if (isset($fcdeclar['fecultpag']))
    {
      if ($fcdeclar['fecultpag'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcdeclar['fecultpag']))
          {
            $value = $dateFormat->format($fcdeclar['fecultpag'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcdeclar['fecultpag'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcdeclar->setFecultpag($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcdeclar->setFecultpag(null);
      }
    }

    if (isset($fcdeclar['feccie']))
    {
      if ($fcdeclar['feccie'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcdeclar['feccie']))
          {
            $value = $dateFormat->format($fcdeclar['feccie'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcdeclar['feccie'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcdeclar->setFeccie($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcdeclar->setFeccie(null);
      }
    }
  
    if (isset($fcdeclar['fuente']))
    {
      $this->fcdeclar->setFuente($fcdeclar['fuente']);
    }

  }


  }
