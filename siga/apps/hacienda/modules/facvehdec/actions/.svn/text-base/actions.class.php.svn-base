<?php

/**
 * facvehdec actions.
 *
 * @package    siga
 * @subpackage facvehdec
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class facvehdecActions extends autofacvehdecActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
  		$this->setVars();
		$this->configGrid($this->fcdeclar->getCoduso());
                $this->configGridDeuda();
		$this->configGridmulta($this->fcdeclar->getRifcon(),$this->fcdeclar->getNumref());
                if (!$this->fcdeclar->getId()) {
                    $loguse = sfContext::getInstance()->getUser()->getAttribute('loguse');
                        $this->fcdeclar->setFundec(H::getX_vacio('LOGUSE', 'Usuarios', 'Nomuse', $loguse));
                }
  }


  public function setVars()
  {
     $fing="";
     

     $sql="SELECT codveh FROM fcdefins  WHERE codemp ='001'";
      if (Herramientas::BuscarDatos($sql,$result))
                {
                 $fing = $result[0]['codveh'];
                }
     $c= new Criteria();
     $fcdefins=FcdefinsPeer::doSelectOne($c);
     if($fcdefins){
            $this->fcdeclar->setUt($fcdefins->getValunitri());
      }
     $this->fcdeclar->setFuente($fing) ;
     $this->fcdeclar->setFrecob (Herramientas::getX_vacio('codfue', 'fcfuepre', 'frecob', $this->fuente));

     }


  public function configGrid($coduso="",$reg = array(),$regelim = array())
   {
            $c = new Criteria();
            $c->add(FcusovehPeer :: CODUSO,$coduso);
            $c->addDescendingOrderByColumn(FcusovehPeer::ANOVIG);
            $per = FcusovehPeer :: doSelect($c);
            foreach ($per as $obj)
            {
               $sql = "select valorut as valor from fcdefut where fecini in (select Max(fecini) as maximo from fcdefut where to_char(fecini,'YYYY')='".$obj->getAnovig()."')";
               if (Herramientas::BuscarDatos($sql, $result)) {
                   $valuni=$result[0]["valor"];
               }else $valuni=0;

               $obj->setMonafo($valuni*$obj->getPorali());
            }
	    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facvehdec/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
	    $this->grid = $this->columnas[0]->getConfig($per);
            $this->fcdeclar->setGrid($this->grid);


        }


  public function configGridDeuda($reg = array())
  {
    $per = array();
   if (!(count($reg)>0)){
    $c = new Criteria();
    $c->add(FcdeclarPeer::NUMDEC,$this->fcdeclar->getNumdec());
    $c->addAscendingOrderByColumn(FcdeclarPeer :: FECVEN);
    $per = FcdeclarPeer::doSelect($c);
    for ($i = 1; $i <= count($per); $i++) {
        $per[$i-1]->setNumero($i);
       }
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

               }

      }
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facvehdec/'.sfConfig::get('sf_app_module_config_dir_name').'/griddeuda');
    $this->griddeuda = $this->columnas[0]->getConfig($per);
    $this->fcdeclar->setGriddeuda($this->griddeuda);

  }

  public function configGridmulta($rif="",$codigo="",$reg = array(),$regelim = array())
  {
      $cm= new Criteria();
      $cm->add(FcdeclarPeer::RIFCON, $rif);
      $cm->add(FcdeclarPeer::NUMREF, $this->fcdeclar->getNumRef());
      $cm->add(FcdeclarPeer::FUEING,array('20', '10', '52'),Criteria::IN);
      $cm->add(FcdeclarPeer::EDODEC, array('P', 'X'),Criteria:: NOT_IN);
      $cm->add(FcdeclarPeer::NOMBRE, '%VEHICULO%',Criteria::LIKE);
      $cm->add(FcdeclarPeer::NOMBRE, '%'.$codigo.'%',Criteria::LIKE);
      $reg = FcdeclarPeer::doSelect($cm);
      $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facvehdec/'.sfConfig::get('sf_app_module_config_dir_name').'/gridmulta');
      $this->gridmulta = $this->columnas[0]->getConfig($reg);
      $this->fcdeclar->setGridmulta($this->gridmulta);


  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $javascript = "";$coduso="";
    $this->ajax=$ajax;

    switch ($ajax){
      case '1':
              if ($this->getRequestParameter('idrifcom','')=='fcdeclar_rifcon')
                 $codigo=$this->getRequestParameter('numref','');
                      
		 $c=new Criteria();
		 $c->add(FcregvehPeer::PLAVEH, $codigo);
		 $fcregveh = FcregvehPeer::doSelectOne($c);

		      if ($fcregveh)
		      {
                                    if ($fcregveh->getEstveh()=='A') $this->mensaje = "REGISTRADO";
                                    else  $this->mensaje = "DESINCORPORADO";

				    $this->coduso = $fcregveh->getCoduso();
                                    $coduso =$fcregveh->getCoduso();
				    $this->desuso = Herramientas::getX_vacio('coduso','fcusoveh','desuso',$this->coduso);
				    $this->marveh = $fcregveh->getMarveh();
				    $this->modveh = $fcregveh->getModveh();
				    $this->colveh = $fcregveh->getColveh();
				    $this->valori = H::FormatoMonto($fcregveh->getValori());
				    $this->anoveh = $fcregveh->getAnoveh();
				    $this->sermot = $fcregveh->getSermot();
				    $this->sercar = $fcregveh->getSercar();
                                    $this->edad =  date("Y") -(int)substr($fcregveh->getAnoveh(), 0, 4);

                                 //Datos del contribuyente
                                  $cr= new Criteria();
                                  $cr->add(FcconrepPeer::RIFCON, $fcregveh->getRifcon());
                                  $fcconrep = FcconrepPeer::doSelectOne($cr);
                                  if($fcconrep){
                                      $this->rifcon =  $fcconrep->getRifcon();
                                      $this->nacconcon =  $fcconrep->getNaccon();
                                      $this->tipconcon =  $fcconrep->getTipcon();
                                      $this->dircon =     $fcconrep->getDircon();
                                      $this->nomcon =     $fcconrep->getNomcon();

                                  }
                                  $re= new Criteria();
                                  $re->add(FcconrepPeer::RIFCON, $fcregveh->getRifrep());
                                  $fcconrepr = FcconrepPeer::doSelectOne($re);
                                  if($fcconrepr){
                                      $this->nacconrep =  $fcconrepr->getNaccon();
                                      $this->tipconrep =  $fcconrepr->getTipcon();
                                      $this->nomconrep =  $fcconrepr->getNomcon();
                                      $this->dirconrep =  $fcconrepr->getDircon();
                                      $this->rifrepcon =  $fcconrepr->getRifrep();
                                  }
                               
                                  $javascript= $javascript."toAjaxUpdater('gridmulta',2,getUrlModulo()+'ajax','$this->rifcon','','&codigo=".$fcregveh->getRifcon()."&nombre=".$codigo."');";
                                
    	
                      }else{
                           $javascript = $javascript."alert('Vehiculo no Existe');";
                      }
                          $this->params=array();
                          $this->fcdeclar = $this->getFcdeclarOrCreate();
                          $this->labels = $this->getLabels();
                           $this->configGrid($coduso);
	
        $output = '[["fcdeclar_mensaje","'.$this->mensaje.'",""],["fcdeclar_coduso","'.$this->coduso.'",""],["fcdeclar_marveh","'.$this->marveh.'",""],["fcdeclar_modveh","'.$this->modveh.'",""],["fcdeclar_colveh","'.$this->colveh.'",""],["fcdeclar_valori","'.$this->valori.'",""],["fcdeclar_anoveh","'.$this->anoveh.'",""],["fcdeclar_sermot","'.$this->sermot.'",""],["fcdeclar_sercar","'.$this->sercar.'",""],["fcdeclar_fechainicio","'.$this->fechainicio.'",""],["fcdeclar_fechafin","'.$this->fechafin.'",""],["fcdeclar_desuso","'.$this->desuso.'",""],
                       ["javascript","' . $javascript . '",""],["fcdeclar_rifcon","'.$this->rifcon.'",""],["fcdeclar_rifrepcon","'.$this->rifrepcon.'",""],["fcdeclar_nacconcon","'.$this->nacconcon.'",""],["fcdeclar_tipconcon","'.$this->tipconcon.'",""],
                       ["fcdeclar_nacconrep","'.$this->nacconrep.'",""],["fcdeclar_tipconrep","'.$this->tipconrep.'",""],["fcdeclar_nomcon","'.$this->nomcon.'",""],["fcdeclar_nomconrep","'.$this->nomconrep.'",""],
                       ["fcdeclar_dirconrep","'.$this->dirconrep.'",""],["fcdeclar_dircon","'.$this->dircon.'",""],["fcdeclar_edad","'.$this->edad.'",""]]';
        break;

        case '2':
              $nombre= $this->getRequestParameter('nombre','');
              $cm= new Criteria();
              $cm->add(FcdeclarPeer::RIFCON, $codigo);
              $cm->add(FcdeclarPeer::FUEING,array('20', '10', '52'),Criteria::IN);
              $cm->add(FcdeclarPeer::EDODEC, array('P', 'X'),Criteria:: NOT_IN);
              $cm->add(FcdeclarPeer::NOMBRE, '%VEHICULO%',Criteria::LIKE);
              $cm->add(FcdeclarPeer::NOMBRE, '%'.$nombre.'%',Criteria::LIKE);
              $reg = FcdeclarPeer::doSelect($cm);
             if($reg){
                   $javascript = " alert('El Contribuyente tiene Multas Por Transito'); $$('.h2')[4].show(); $('divgridmulta').show();$('fcdeclar_numref').focus();";
                   $this->params=array();
                   $this->fcdeclar = $this->getFcdeclarOrCreate();
                   $this->labels = $this->getLabels();
                   $this->configGridmulta($codigo,$nombre);

                   }else {
                        $this->params=array();
                   $this->fcdeclar = $this->getFcdeclarOrCreate();
                   $this->labels = $this->getLabels();
                   $this->configGridmulta();
                   }
            
              $output = '[["javascript","' . $javascript . '",""],["","",""],["","",""]]';
        break;
        case '3':
              $fuente = $this->getRequestParameter('fuente','');
              $fecfin= $this->getRequestParameter('fecfin','');
              $fecini= $this->getRequestParameter('fecini','');
              $fecdec=$this->getRequestParameter('fecdec','');
              $anoveh=$this->getRequestParameter('anoveh','');
              $coduso=$this->getRequestParameter('coduso','');
              $valori=$this->getRequestParameter('valori','');
              $indunidadt = H::getConfApp('indunidadt', 'hacienda', 'facvehdec');
              $porcion="";
              $fname="";$diaven="";$tipoven="";$valor="";
              $grid= array();
              $griddeuda= array();
              $mod='facvehdec';
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

                      if( Hacienda::VerificarFechaV($porcion,$fecini,$fecfin)){
                           $javascript = $javascript ."alert('Fecha de Cierre debe ser mayor o igual a un(a) '".$fportion." 'de la Fecha de Inicio');";
                      }else{
                        if(Hacienda::VerificarExDeclaracion($codigo,$fecini,$fecfin)){
                           $javascript = $javascript ."alert('Ya Existe una Declaracion para ese Periodo');";
                        }else{
                            $fea=date('Y', strtotime(H::toDateUS($fecini)));
                            $feb=date('Y', strtotime(H::toDateUS($fecfin)));
                            $c = new Criteria();
                            $c->add(FcusovehPeer :: CODUSO,$coduso);
                            //$c->add(FcusovehPeer :: ANOVIG,date('Y', strtotime(H::toDateUS($fecini))),Criteria::GREATER_EQUAL);
                            //$c->add(FcusovehPeer :: ANOVIG,date('Y', strtotime(H::toDateUS($fecfin))),Criteria::LESS_EQUAL);
                            $this->sql="fcusoveh.anovig<='$feb' and fcusoveh.anovig>='$fea'";
                            $c->add(FcusovehPeer :: ANOVIG,$this->sql,Criteria::CUSTOM);
                            $c->addAscendingOrderByColumn(FcusovehPeer::ANOVIG);
                            $per = FcusovehPeer :: doSelect($c);
                            if(count($per)>0){
                                Hacienda::DistribuirVencimiento($valori, $per,$anoveh,$fecdec, $fecini,$fecfin,$porcion, $fportion, $griddeuda,$diaven,$tipoven,$mod, $this->fcdeclar->getUt(),$indunidadt,$fname,$fuente);


                            }
                        }
                      }

                    }

               $this->configGridDeuda($griddeuda);
               $output = '[["javascript","' . $javascript . '",""],["","",""],["","",""]]';
            
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
   if($ajax!=1 && $ajax!=2 && $ajax!=3){
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
         $this->fcdeclar = $this->getFcdeclarOrCreate();
	 try{ $this->updateFcdeclarFromRequest();}
	 catch (Exception $ex){}
	$this->configGriddeuda();

         $griddeuda = Herramientas::CargarDatosGridv2($this,$this->griddeuda);
         $vencimiento = $griddeuda[0];
         if(!($vencimiento)){
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
    $this->configGridmulta();
    $grid = Herramientas::CargarDatosGridv2($this,$this->Grid);
    $griddeuda = Herramientas::CargarDatosGridv2($this,$this->Griddeuda);
    $gridmulta = Herramientas::CargarDatosGridv2($this,$this->Gridmulta);

  }


 public function saving($clasemodelo)
  {
   $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
   $griddeuda = Herramientas::CargarDatosGridv2($this,$this->griddeuda);
    return Hacienda::salvarFacdecveh($clasemodelo,$griddeuda);
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
    $c->addSelectColumn('0 AS EXIPAGUNI');
    $c->addSelectColumn('0 AS ID');
    $c->addJoin(FcdeclarPeer::NUMREF, FcregvehPeer::PLAVEH);
    $c->add(FcregvehPeer::PLAVEH ,'',Criteria::NOT_EQUAL);
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

  
    public function executeEdit()
  {
    $this->params=array();
    $this->fcdeclar = $this->getFcdeclarOrCreate();
    $id_buscado="";
    $this->editing();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFcdeclarFromRequest();

      if($this->saveFcdeclar($this->fcdeclar) ==-1){
        {$this->setFlash('notice', 'Your modifications have been saved');
         $t= new Criteria();
         $t->add(FcdeclarPeer::NUMDEC,$this->fcdeclar->getNumdec());
         $t->add(FcdeclarPeer::NUMREF,$this->fcdeclar->getNumref());
         $t->add(FcdeclarPeer::FECDEC,$this->fcdeclar->getFecdec());
         $reg= FcdeclarPeer::doSelectOne($t);
         if($reg){
           $id_buscado=$reg->getId();
           
           }
         $id= $this->fcdeclar->getId();
         $this->SalvarBitacora($id ,'Guardo');}

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('facvehdec/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('facvehdec/list');
        }
        else
        {
               return $this->redirect('facvehdec/edit?id='.$id_buscado.'&numdec='.$this->fcdeclar->getNumdec().'&numref='.$this->fcdeclar->getNumref().'&fueing='.$this->fcdeclar->getFueing().'&numero='.$this->fcdeclar->getNumero().'&fecven='.$this->fcdeclar->getFecven().'&edodec='.$this->fcdeclar->getEdodec());
          
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
  public function executeDelete()
  {
    //$this->fcdeclar = FcdeclarPeer::retrieveByPk($this->getRequestParameter('id'));

    $t= new Criteria();
    $t->add(FcdeclarPeer::NUMDEC,$this->getRequestParameter('numdecl'));
    $t->add(FcdeclarPeer::NUMREF,$this->getRequestParameter('numrefe'));
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
      return $this->forward('facvehdec', 'list');
    }


    return $this->forward('facvehdec', 'list');
  }

}
