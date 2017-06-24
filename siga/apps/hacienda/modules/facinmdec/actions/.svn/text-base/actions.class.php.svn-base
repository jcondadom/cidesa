<?php

/**
 * facinmdec actions.
 *
 * @package    siga
 * @subpackage facinmdec
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class facinmdecActions extends autofacinmdecActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
        $this->setVars();
	$this->configGridDeuda();
         $this->configGrid($this->fcdeclar->getNumref());

  }

  public function setVars()
  {
    $fuentef = Herramientas::getX_vacio('codemp','fcdefins','codinm','001');
     $this->fcdeclar->setFuentef($fuentef);
  }
  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridDeuda($reg2 = array())
  {
    $per = array();
   if (!(count($reg2)>0)){
    $c = new Criteria();
    $c->add(FcdeclarPeer::NUMDEC,$this->fcdeclar->getNumdec());
    $c->addAscendingOrderByColumn(FcdeclarPeer :: FECVEN);
    $per = FcdeclarPeer::doSelect($c);
    for ($i = 1; $i <= count($per); $i++) {
        $per[$i-1]-> setNumero($i);
       }
     }else{
         for ($i=0 ; $i < count($reg2); $i++)
              {

                    $fcdeclar= new Fcdeclar();
                    $fcdeclar->setNumero($i+1);
                    $fcdeclar->setFecven($reg2[$i]['fecven']);
                    $fcdeclar->setNombre($reg2[$i]['nombre']);
                    $fcdeclar->setTipo($reg2[$i]['tipo']);
                    $fcdeclar->setMondec($reg2[$i]['mondec']);
                    $fcdeclar->setEdodecstatus($reg2[$i]['edodecstatus']);
                     $per[]=$fcdeclar;

               }

      }
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facinmdec/'.sfConfig::get('sf_app_module_config_dir_name').'/griddeuda');
    $this->griddeuda = $this->columnas[0]->getConfig($per);
    $this->fcdeclar->setGriddeuda($this->griddeuda);

  }

  public function configGrid($nroinm="")
  {
   
        $c = new Criteria();
        $c->addJoin(FcvalinmPeer::CODZON, FcdetinmPeer::CODZON);
        $c->addJoin(FcvalinmPeer::CODTIP, FcdetinmPeer::CODTIP);
        $c->add(FcdetinmPeer::NROINM,$nroinm);
        $c->addAscendingOrderByColumn(FcvalinmPeer:: ANOVIG);
        $gr = FcvalinmPeer::doSelect($c);
        $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facinmdec/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
        $this->grid = $this->columnas[0]->getConfig($gr);
        $this->fcdeclar->setGrid($this->grid);
  }



  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $javascript = "";
    $ajax   = $this->getRequestParameter('ajax','');
    $cajtexmos   = $this->getRequestParameter('cajtexmos','');
    $griddeuda = array();
    $this->ajax=$ajax;
   
    switch ($ajax){
      case '1':
           $numref = "";
           $codzon="";
           $nacconrep = "";
           $tipconrep =  "";
           $nomconrep =  "";
           $dirconrep =  "";
           $c= new Criteria();
           $c->add(FcreginmPeer::NROINM,trim($codigo));
           $fcreginm = FcreginmPeer::doSelectOne($c);
           $this->params=array();
           $this->fcdeclar = $this->getFcdeclarOrCreate();
           $this->labels = $this->getLabels();
           if(!$fcreginm){
               $javascript = $javascript ."alert('Inmueble no Existe');";  
               $this->configGrid();
               
               $output = '[["javascript","' . $javascript . '",""]]';
           }else{
                switch($fcreginm->getEstinm())
                {  //Caso de desincorporación
	           case 'D':
                       $javascript= $javascript."alert('Inmueble fue Desincorporado'); $('fcdeclar_numref').value=''; $('fcdeclar_numdec').value=''; $('fcdeclar_numdec').focus();";
                          $this->configGrid();
                       $output = '[["javascript","' . $javascript . '",""],["","",""],["","",""]]';
                       break;
                   case 'A':

                      $codcatinm= $fcreginm->getCodcatinm();
                      $coduso = $fcreginm->getCoduso();
                      //Datos del contribuyente
                      $cr= new Criteria();
                      $cr->add(FcconrepPeer::RIFCON, $fcreginm->getRifcon());
                      $fcconrep = FcconrepPeer::doSelectOne($cr);
                      if($fcconrep){
                          $naccon =  $fcconrep->getNaccon();
                          $tipcon =  $fcconrep->getTipcon();
                          $dircon =     $fcconrep->getDircon();
                         
                      }
                      $re= new Criteria();
                      $re->add(FcconrepPeer::RIFCON, $fcreginm->getRifrep());
                      $fcconrepr = FcconrepPeer::doSelectOne($re);
                      if($fcconrepr){
                          $nacconrep =  $fcconrepr->getNaccon();
                          $tipconrep =  $fcconrepr->getTipcon();
                          $nomconrep =  $fcconrepr->getNomcon();
                          $dirconrep =  $fcconrepr->getDircon();
                      }
                      
                      if ($naccon=='V')
                      {
                            $javascript = $javascript . "$('fcdeclar_nacconcon_V').checked=true; ";
                      }
                      else
                      {
                            $javascript = $javascript . "$('fcdeclar_nacconcon_E').checked=true; ";
                      }
                      if ($tipcon=='N')
                      {
                            $javascript = $javascript . "$('fcdeclar_tipconcon_N').checked=true; ";
                      }
                      else
                      {
                            $javascript = $javascript . "$('fcdeclar_tipconcon_J').checked=true; ";
                      }
                      if ($nacconrep=='V')
                      {
                            $javascript = $javascript . "$('fcdeclar_nacconrep_V').checked=true; ";
                      }
                      else
                      {
                            $javascript = $javascript . "$('fcdeclar_nacconrep_E').checked=true; ";
                      }
                      if ($tipconrep=='N')
                      {
                            $javascript = $javascript . "$('fcdeclar_tipconrep_N').checked=true; ";
                      }
                      else
                      {
                            $javascript = $javascript . "$('fcdeclar_tipconrep_J').checked=true; ";
                      }

                      $rifcon = $fcreginm->getRifcon();
                      $nomcon =$fcreginm->getNomcon();
                      $rifrepcon=$fcreginm->getRifrep();
                      $bscon =H::FormatoMonto($fcreginm->getBscon());
                      $codsitinm=$fcreginm->getCodsitinm();
                      $codcarinm=$fcreginm->getCodcarinm();
                      $mtrter=H::FormatoMonto($fcreginm->getMtrter());
                      $bster =H::FormatoMonto($fcreginm->getBster());
                      $mtrcon=H::FormatoMonto($fcreginm->getMtrcon());
                      $bscon =H::FormatoMonto($fcreginm->getBscon());
                      $feccal = Herramientas::FormatoFecha($fcreginm->getFeccal());
                      $fecreg = Herramientas::FormatoFecha($fcreginm->getFecreg());
                      $this->configGrid($codigo);


                       $output = '[["fcdeclar_codcatinm","'.$codcatinm.'",""],["fcdeclar_coduso","'.$coduso.'",""],["fcdeclar_rifcon","'.$rifcon.'",""],
                       ["fcdeclar_rifrepcon","'.$rifrepcon.'",""],["fcdeclar_bscon","'.$bscon.'",""],["fcdeclar_codsitinm","'.$codsitinm.'",""],["fcdeclar_codcarinm","'.$codcarinm.'",""],
                       ["fcdeclar_mtrter","'.$mtrter.'",""],["fcdeclar_bster","'.$bster.'",""],["fcdeclar_mtrcon","'.$mtrcon.'",""],["fcdeclar_bscon","'.$bscon.'",""],
                       ["fcdeclar_feccal","'.$feccal.'",""],["fcdeclar_fecreg","'.$fecreg.'",""],
                       ["fcdeclar_nomcon","'.$nomcon.'",""],["fcdeclar_nomconrep","'.$nomconrep.'",""],
                       ["fcdeclar_dirconrep","'.$dirconrep.'",""],["fcdeclar_dircon","'.$dircon.'",""],["javascript","' . $javascript . '",""]]';
    
                      break;
                   default:
                            $output = '[["","",""],["","",""],["","",""]]';
                       break;
                }
           }
            break;
       case '2':

            $fecini= $this->getRequestParameter('fecini','');
            $fecfin= $this->getRequestParameter('fecfin','');
            $bscon= $this->getRequestParameter('bscon','');
            $bster= $this->getRequestParameter('bster','');
            $exipaguni=$this->getRequestParameter('exipaguni','');
            $fecdec=$this->getRequestParameter('fecdec','');
            $codcarinm= $this->getRequestParameter('codcarinm','');
            $coduso= $this->getRequestParameter('coduso','');
            $conter="";
            $fuente = $this->getRequestParameter('fuente','');
            $porcion='';
            $obj= array();
            $nroinm="";
            $datos="";
            $fportion="";
            $frecuencia="";
            $diaven=0;
            $tipoven="";
              //Cálculo de la porción
                     $datos = Constantes::Porciones();
              switch($exipaguni){
                 case 'S':
                     $porcion= 1;
                     $frecuencia=1;
                     $fname="PAGO UNICO";          
                     break;
                 case 'N':
                   
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
                        
                          $diaven = $fcfuepre->getDiaven();
                          //$tipoven = $fcfuepre->getTipven();

                        }
                   break;
              
              }
                 if($porcion!='' && $fecfin !=''){
                           $fportion = $datos[$porcion];
                           //Verificación de la existencia de la declaración
                           $dateFormat = new sfDateFormat('es_VE');
                           $fec1 = $dateFormat->format($fecini, 'i', $dateFormat->getInputPattern('d'));
                           $fec2 = $dateFormat->format($fecfin, 'i', $dateFormat->getInputPattern('d'));
                           $cr= new Criteria();
                           $cr->add(FcdeclarPeer::NUMREF,trim($codigo));
                           $cr->add(FcdeclarPeer::FUEING,$fuente);
                           $sql2="fcdeclar.fecven>='".$fec1."' and fcdeclar.fecven<='".$fec2."'";
                           $cr->add(FcdeclarPeer::FECVEN,$sql2,Criteria::CUSTOM);
                           //$cr->add(FcdeclarPeer::FECVEN,$fec2,Criteria::LESS_EQUAL);
                           //$cr->add(FcdeclarPeer::FECVEN,$fec1,Criteria::GREATER_EQUAL);
                           
                           $fcdeclar = FcdeclarPeer::doSelectOne($cr);
                         if($fcdeclar){

                              $javascript = " alert('Ya Existe una Declaración para ese Periodo'); $('fcdeclar_numref').focus(); ";
                         }else{
                              $c= new Criteria();
                              $c->add(FccarinmPeer::CODCARINM, $codcarinm);
                              $fccarinm = FccarinmPeer::doSelectOne($c);
                              if($fccarinm){
                                  $conter =$fccarinm->getStacarinm();
                              }
                              Hacienda::DistribuirVencInm($griddeuda,$porcion,$fecini,$fecfin,$fportion,$fecdec,$conter,H::toFloat($bscon),H::toFloat($bster),$coduso,$diaven,$tipoven,$fuente);
                             
                         }

                     }
                      $this->params=array();
                      $this->fcdeclar = $this->getFcdeclarOrCreate();
                      $this->labels = $this->getLabels();
                      $this->configGridDeuda($griddeuda);
              $output = '[["javascript","' . $javascript . '",""]]';
           break;
       default:
        $output = '[["","",""],["","",""],["","",""]]';
        break;

  }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    if( ($ajax)!=1 && ($ajax)!=2)
    return sfView::HEADER_ONLY;

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

        /* if(!($vencimiento)){
              $this->coderr=736;
              return false;
         }*/


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
    $grid = Herramientas::CargarDatosGridv2($this,$this->Grid);
    $grid = Herramientas::CargarDatosGridv2($this,$this->Griddeuda);

  }

  public function saving($clasemodelo)
  {
   $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
   $griddeuda = Herramientas::CargarDatosGridv2($this,$this->griddeuda);
    return Hacienda::salvarFacdecinm($clasemodelo,$griddeuda);
  }

  public function deleting($clasemodelo)
  {

     if (Hacienda::VerificarDecPag($this->fcdeclar->getNumdec()))
    {
        return Hacienda::eliminarFacinmdec($clasemodelo);
     }else {
        return 737;

    }
  }

    protected function updateFcdeclarFromRequest()
  {
    $fcdeclar = $this->getRequestParameter('fcdeclar');

    if (isset($fcdeclar['numdec']))
    {
      $this->fcdeclar->setNumdec($fcdeclar['numdec']);
    }
    if (isset($fcdeclar['numref']))
    {
      $this->fcdeclar->setNumref($fcdeclar['numref']);
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
    if (isset($fcdeclar['fundec']))
    {
      $this->fcdeclar->setFundec($fcdeclar['fundec']);
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
    if (isset($fcdeclar['codcatinm']))
    {
      $this->fcdeclar->setCodcatinm($fcdeclar['codcatinm']);
    }
    if (isset($fcdeclar['coduso']))
    {
      $this->fcdeclar->setCoduso($fcdeclar['coduso']);
    }
    if (isset($fcdeclar['grid']))
    {
      $this->fcdeclar->setGrid($fcdeclar['grid']);
    }
    if (isset($fcdeclar['codsitinm']))
    {
      $this->fcdeclar->setCodsitinm($fcdeclar['codsitinm']);
    }
    if (isset($fcdeclar['codcarinm']))
    {
      $this->fcdeclar->setCodcarinm($fcdeclar['codcarinm']);
    }
    if (isset($fcdeclar['mtrter']))
    {
      $this->fcdeclar->setMtrter($fcdeclar['mtrter']);
    }
    if (isset($fcdeclar['bster']))
    {
      $this->fcdeclar->setBster($fcdeclar['bster']);
    }
    if (isset($fcdeclar['mtrcon']))
    {
      $this->fcdeclar->setMtrcon($fcdeclar['mtrcon']);
    }
    if (isset($fcdeclar['bscon']))
    {
      $this->fcdeclar->setBscon($fcdeclar['bscon']);
    }
    if (isset($fcdeclar['feccal']))
    {
      $this->fcdeclar->setFeccal($fcdeclar['feccal']);
    }
    if (isset($fcdeclar['fecreg']))
    {
      $this->fcdeclar->setFecreg($fcdeclar['fecreg']);
    }
    if (isset($fcdeclar['exipaguni']))
    {
      $this->fcdeclar->setExipaguni($fcdeclar['exipaguni']);
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
    if (isset($fcdeclar['fecfin']))
    {
      $this->fcdeclar->setFecfin($fcdeclar['fecfin']);
    }
    if (isset($fcdeclar['griddeuda']))
    {
      $this->fcdeclar->setGriddeuda($fcdeclar['griddeuda']);
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

    if (isset($fcdeclar['fuentef']))
    {
      $this->fcdeclar->setFuentef($fcdeclar['fuentef']);
    }
     if (isset($fcdeclar['edodecstatus']))
    {
      $this->fcdeclar->setEdodecstatus($fcdeclar['edodecstatus']);
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
    $c->addJoin(FcdeclarPeer::NUMREF, FcreginmPeer::NROINM);
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
      //$id=Herramientas::getX_vacio(array('NUMDEC','NUMREF'), 'Fcdeclar', 'id', array($this->getRequestParameter($numdecl),$this->getRequestParameter($numrefe)));

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
         if($reg)
         $id_buscado=$reg->getId();

         $id= $this->fcdeclar->getId();
         $this->SalvarBitacora($id ,'Guardo');}

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('facinmdec/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('facinmdec/list');
        }
        else
        {
            return $this->redirect('facinmdec/edit?id='.$id_buscado.'&numdec='.$this->fcdeclar->getNumdec().'&numref='.$this->fcdeclar->getNumref().'&fueing='.$this->fcdeclar->getFueing().'&numero='.$this->fcdeclar->getNumero().'&fecven='.$this->fcdeclar->getFecven().'&edodec='.$this->fcdeclar->getEdodec());
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
    $t= new Criteria();
    $t->add(FcdeclarPeer::NUMDEC,$this->getRequestParameter('numdecl'));
    $t->add(FcdeclarPeer::NUMREF,$this->getRequestParameter('numrefe'));
    $this->fcdeclar= FcdeclarPeer::doSelectOne($t);
    
    //if ($this->fcdeclar)

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
    return $this->forward('facinmdec', 'list');
    }


    return $this->forward('facinmdec', 'list');
  }



}
