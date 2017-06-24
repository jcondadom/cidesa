<?php

/**
 * facapudec actions.
 *
 * @package    siga
 * @subpackage facapudec
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class facapudecActions extends autofacapudecActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
 	  $this->setVars();
	  $this->configGrid($this->fcdeclar->getNumref(),$this->fcdeclar->getRifcon(),$this->fcdeclar->getTipapu());
	  $this->configGridDeuda(array(),$total);
          $this->fcdeclar->setTotmondec($total);

  }

  public function setVars()
  {
    $this->params=array();
    $this->params[0] = Herramientas::getX('codemp','fcdefins','forveh','001');
    $this->fcdeclar->setFuente(Herramientas :: getX_vacio('codemp', 'Fcdefins', 'codapu', '001')) ;
    $c= new Criteria();
    $fcdefins=FcdefInsPeer::doSelectOne($c);
        if($fcdefins){
            $this->fcdeclar->setUt($fcdefins->getValunitri());
        }
    $this->fcdeclar->setFundec($this->fcdeclar->getFundec()=='' ? $this->getUser()->getAttribute('loguse') : $this->fcdeclar->getFundec());
  }

    public function configGrid($numref='', $rifcon='',$tipapu='') {
		$c = new Criteria();

		$c->add(FcapulicdetPeer :: NROCON,$numref);
		$c->add(FcapulicdetPeer :: RIFCON, $rifcon);
		$c->add(FcapulicdetPeer :: TIPAPU, $tipapu);
		$per = FcapulicdetPeer :: doSelect($c);
                $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facapudec/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
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
                            $fcdeclar->setNumero(str_pad(trim($i+1), 2, '0', STR_PAD_LEFT));
                            $fcdeclar->setFecven($reg[$i]['fecven']);
                            $fcdeclar->setNombre($reg[$i]['nombre']);
                            $fcdeclar->setTipo($reg[$i]['tipo']);
                            $fcdeclar->setMondec($reg[$i]['mondec']);
                            $fcdeclar->setEdodecstatus($reg[$i]['edodecstatus']);
                            $per[]=$fcdeclar;
                            $total =$total + H::toFloat($reg[$i]['mondec']);
                       }

              }
	    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facapudec/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_consulta_deuda');
	    $this->griddeuda = $this->columnas[0]->getConfig($per);
            $this->fcdeclar->setGriddeuda($this->griddeuda);

	}

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $ajax   = $this->getRequestParameter('ajax','');
    $this->ajax=$ajax;
    $javascript='';
    switch ($ajax){
      case '1':
				$javascript='';
				$c = new Criteria();
				$c->add(FcapulicPeer::NROCON, $codigo);
				$reg = FcapulicPeer::doSelectOne($c);
				if ($reg)
				{     $this->exoapu  = $reg->getExoapu();
                                      $this->texexo  = $reg->getTexexo();

                                      if($this->exoapu =='1'){

                                            $javascript = $javascript."alert('El Espectáculo Público está EXONERADO, debido a: '+'$this->texexo'); $('fcdeclar_numref').value=''; $('fcdeclar_numref').focus(); ";
                                            $this->texexo='';
                                            $this->params=array();
                                            $this->fcdeclar = $this->getFcdeclarOrCreate();
                                            $this->labels = $this->getLabels();
                                            $this->configGrid();
                                        }else {
                                            $this->fecreg = $reg->getFecreg();
                                            $this->rifcon = $reg->getRifcon();
                                            $this->nomcon = $reg->getNomcon();
                                            $this->dircon = $reg->getDircon();
                                            $this->rifrep = $reg->getRifrep();
                                            $this->nomconrep = $reg->getNomconrep();
                                            $this->dirconrep = $reg->getDirconrep();
                                            $this->tipapu  = $reg->getTipapu();
                                            $this->desapu  = $reg->getDesapu();
                                            $this->dirapu  = $reg->getDirapu();
                                            $this->fecapu  = date('d/m/Y', strtotime($reg->getFecapu()));
                                            $this->nroent  = $reg->getNroent();
                                            $this->monent  = $reg->getMonent();
                                            $this->semdia= $reg->getSemdia();
                                            $this->serapui= $reg->getSerapui();
                                            $this->serapuf= $reg->getSerapuf();
                                            $this->serapuf= $reg->getSerapuf();
                                            $this->horapu = $reg->getHoraapu();
                                            $this->numref  = $codigo;
                                            $this->destip = Herramientas :: getX_vacio('tipapu', 'fctipapu', 'destip', $this->tipapu);


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
                                        $this->configGrid($codigo,$reg->getRifcon(),$reg->getTipapu());
                                        }


				}else{
                                    $javascript = $javascript."alert('Apuesta Lícita no Existe');";
                                    $this->params=array();
                                    $this->fcdeclar = $this->getFcdeclarOrCreate();
                                    $this->labels = $this->getLabels();
                                    $this->configGrid();
                                }
    	    $output = '[["fcdeclar_fecreg","'.$this->fecreg.'",""],["fcdeclar_destip","'.$this->destip.'",""],["fcdeclar_rifcon","'.$this->rifcon.'",""],
                       ["javascript","' . $javascript . '",""],["fcdeclar_nomcon","'.$this->nomcon.'",""], ["fcdeclar_dircon","'.$this->dircon.'",""],
                       ["fcdeclar_rifrep","'.$this->rifrep.'",""],["fcdeclar_nomconrep","'.$this->nomconrep.'",""],["fcdeclar_dirconrep","'.$this->dirconrep.'",""],
                       ["fcdeclar_tipapu","'.$this->tipapu.'",""],["fcdeclar_desapu","'.$this->desapu.'",""],["fcdeclar_dirapu","'.$this->dirapu.'",""],
                       ["fcdeclar_dirpro","'.$this->dirpro.'",""],["fcdeclar_nroent","'.$this->nroent.'",""],["fcdeclar_monent","'.$this->monent.'",""],
                       ["fcdeclar_exoapu","'.$this->exoapu.'",""],["fcdeclar_texexo","'.$this->texexo.'",""],["fcdeclar_fechainicio","'.$this->fechainicio.'",""],
                       ["fcdeclar_fechafin","'.$this->fechafin.'",""],["fcdeclar_fecapu","'.$this->fecapu.'",""],["fcdeclar_serapui","'.$this->serapui.'",""],
                       ["fcdeclar_serapuf","'.$this->serapuf.'",""],["fcdeclar_horapu","'.$this->horapu.'",""]]';


        break;
             case  '2':

              $fuente = $this->getRequestParameter('fuente','');
              $fecfin= $this->getRequestParameter('fecfin','');
              $fecini= $this->getRequestParameter('fecini','');
              $fecdec=$this->getRequestParameter('fecdec','');
              $rifcon = $this->getRequestParameter('rifcon','');
              $fname= $this->getRequestParameter('desapu','');
              $tipapu= $this->getRequestParameter('tipapu','');
              $porcion=""; $total=0;
              $diaven="";$tipoven="";$valor="";
              $grid= array();
              $griddeuda= array();
              $mod='facapudec';
              $this->params=array();
              $this->fcdeclar = $this->getFcdeclarOrCreate();
              $this->labels = $this->getLabels();
               self::setVars();
               if($codigo != ''){
               //Cálculo de la porción
               $datos = Constantes::Porciones();
                 $c=new Criteria();
                 $c->add(FcfueprePeer::CODFUE,$fuente);
                 $fcfuepre=FcfueprePeer::doSelectOne($c);
                  if($fcfuepre){
                     if($fcfuepre->getFrecob()==999){
                        $porcion=1;
                    }else{
                        $porcion=$fcfuepre->getFrecob();
                    }
                      $fportion = $datos[$porcion];
                      $diaven = $fcfuepre->getDiaven();
                      $tipoven = $fcfuepre->getTipven();
                      Hacienda::DistribuirVencimiento('', '','',$fecdec, $fecini,$fecfin,$porcion, $fportion, $griddeuda,$diaven,$tipoven,$mod,'','',$fname);
                      if(count($griddeuda)>0){
                      Hacienda::MontoDecApuestaLic($griddeuda,$tipapu,$porcion,$this->fcdeclar->getUt(),$codigo,$rifcon);

                      }
                    }
                $this->configGridDeuda($griddeuda,$total);

                }else{
                     $javascript = $javascript . "alert('Debe introducir el Número de Control');";
                    $this->configGridDeuda();
                }
                $output = '[["javascript","' . $javascript . '",""],["fcdeclar_totmondec","'.number_format($total,2,',','.').'",""],["fcdeclar_fecfin","'.$fecfin.'",""],["","",""],["","",""]]';
           break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
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
	 try{ $this->updateFcdeclarFromRequest();}
	 catch (Exception $ex){}
	$this->configGridDeuda();

         $griddeuda = Herramientas::CargarDatosGridv2($this,$this->griddeuda);
         $vencimiento = $griddeuda[0];
         if(!$vencimiento){
              $this->coderr=736;
              return false;
         }

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
    $griddeuda = Herramientas::CargarDatosGridv2($this,$this->griddeuda);

  }

  public function saving($clasemodelo)
  {
	  try{
            $this->configGrid();
            $this->configGridDeuda();
	    $grid      = Herramientas::CargarDatosGridv2($this,$this->grid);
	    $gridDeuda = Herramientas::CargarDatosGridv2($this,$this->griddeuda);
	  	return Hacienda::saveFacapudec($clasemodelo,$grid,$gridDeuda);

	  } catch (Exception $ex){
	    exit($ex);
	    return 0;
	  }

  }


  public function deleting($clasemodelo)
  {
       if (Hacienda::VerificarDecPag($this->fcdeclar->getNumdec()))
    {
       return Hacienda::EliminarFacapudec($clasemodelo);
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
    $c->addSelectColumn('0 AS ID');
    $c->addJoin(FcdeclarPeer::NUMREF,  FcapulicPeer::NROCON);
    $c->add(FcdeclarPeer::NUMDEC,'A%',Criteria::LIKE);
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
      return $this->forward('facapudec', 'list');
    }


    return $this->forward('facapudec', 'list');
  }

}
