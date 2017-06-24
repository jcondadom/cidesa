<?php

/**
 * facotringreg actions.
 *
 * @package    siga
 * @subpackage facotringreg
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class facotringregActions extends autofacotringregActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
	$this->setVars();
	$this->configGridDeuda();

  }


	public function setVars() {
		$this->fcotring->setFunrec($this->fcotring->getFunrec()=='' ? $this->getUser()->getAttribute('loguse') : $this->fcotring->getFunrec());
                $this->fcotring->datosRepresentante();
                $this->params[1] = Herramientas::getX('codemp','fcdefins','unipic','001');
		$this->params[2] = Herramientas::getX('codemp','fcdefins','valunitri','001');
	

	}


 public function configGridDeuda($reg = array())
  {
    $per = array();
    $i=0;
   if (!(count($reg)>0)){
    $c = new Criteria();
    $c->add(FcdeclarPeer::NUMDEC,$this->fcotring->getNrocon());
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

               }


      }
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facotringreg/'.sfConfig::get('sf_app_module_config_dir_name').'/griddeuda');
    $this->griddeuda = $this->columnas[0]->getConfig($per);
    $this->fcotring->setGriddeuda($this->griddeuda);

  }


  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $javascript = "";
    $ajax   = $this->getRequestParameter('ajax','');
    $cajtexmos   = $this->getRequestParameter('cajtexmos','');
    $this->ajax=$ajax;

    switch ($ajax){
      case '1':
              $nomcon="";
	      $dircon="";
              $c= new Criteria();
	      $c->add(FcconrepPeer::RIFCON,trim($codigo));
	      $fcconrep2 = FcconrepPeer::doSelectOne($c);

	      if (count($fcconrep2)>0)
	      {
  	    
	          $nomcon=$fcconrep2->getNomcon();
	          $dircon=$fcconrep2->getDircon();
	          if ($fcconrep2->getNaccon()=='V')
	          {
	          	$javascript = $javascript . "$('fcotring_nacconcon_V').checked=true; ";
	          }
	          else
	          {
	          	$javascript = $javascript . "$('fcotring_nacconcon_E').checked=true; ";
	          }
	          if ($fcconrep2->getTipcon()=='N')
	          {
	          	$javascript = $javascript . "$('fcotring_tipconcon_N').checked=true; ";
	          }
	          else
	          {
	          	$javascript = $javascript . "$('fcotring_tipconcon_J').checked=true; ";
	          }
	      }
	      else
	      {

	       $javascript = $javascript ."activarCont()";
	      }
                $output = '[["fcotring_nomcon","'.$nomcon.'",""],["fcotring_dircon","'.$dircon.'",""],["javascript","' . $javascript . '",""]]';


        break;
         case '2':
	      $nomcon="";
   	      $dircon="";
	      $c= new Criteria();
	      $c->add(FcconrepPeer::RIFCON,trim($codigo));
	      $fcconrep2 = FcconrepPeer::doSelectOne($c);
	      if (count($fcconrep2)>0)
	      {
	          $nomcon=$fcconrep2->getNomcon();
	          $dircon=$fcconrep2->getDircon();
	          if ($fcconrep2->getNaccon()=='V')
	          {
	          	$javascript = $javascript . "$('fcotring_nacconrep_V').checked=true; ";
	          }
	          else
	          {
	          	$javascript = $javascript . "$('fcotring_nacconrep_E').checked=true; ";
	          }
	          if ($fcconrep2->getTipcon()=='N')
	          {
				$javascript = $javascript . "$('fcotring_tipconrep_N').checked=true; ";
	          }
	          else
	          {
	          	$javascript = $javascript . "$('fcotring_tipconrep_J').checked=true; ";
	          }
	      }
	      else
	      {
  	            $javascript = $javascript ."activarRep()";
	      }
          $output = '[["fcotring_nomconrep","'.$nomcon.'",""],["fcotring_dirconrep","'.$dircon.'",""],["javascript","' . $javascript . '",""]]';



        break;
           case '3':
              $c= new Criteria();
	      $c->add(FcfueprePeer::CODFUE,trim($codigo));
              $fcfuepre = FcfueprePeer::doSelectOne($c);
              $estatus="";
              if($fcfuepre){
                  if($fcfuepre->getSimpre()=='P'){
                        $this->vsimpre='Facturación Previa';
                      }else{
                       $this->vsimpre='Facturación Simultanea';
                      }
                  }
                $output = '[["","",""],["","",""],["","",""]]';
            
              break;
            case '4':
                $estatus = $this->getRequestParameter('estatus','');
                $fecreg = $this->getRequestParameter('fecreg','');
                $codfue = $this->getRequestParameter('codfue','');
                $porcion="";$fportion="";$fname="";$diaven="";$tipoven="";
                $fechaini="";
                $fechafin="";
                $griddeuda= array();
                $mod="facotringreg";
                if($fecreg !=""){
                    if($estatus =='Facturación Simultanea'){
                        
                          if(Hacienda::CalculoDeclaracion($codfue, $porcion,$fportion,$fname,$diaven,$tipoven)){
                                 if ($fname == "PAGO UNICO") {
                                   $fechaini = H::toDateUS($fecreg);
                                   $fechafin = H::toDateUS($fecreg);
                                 }else{
                                   $fechaini = H::FormatoFecha(substr($fecreg, 6, 4)."-01-01");
                                   $fechafin = H::FormatoFecha(substr($fecreg, 6, 4)."-12-31");
        
                                   }
                                 Hacienda::DistribuirVencimiento($codigo, '','',$fecreg, $fechaini,$fechafin,$porcion, $fportion, $griddeuda,$diaven,$tipoven,$mod);
                                 $javascript = $javascript ."$$('.h2')[4].show();$('divDatos de Referencias').show();";

                          }

                    }

                }else{
                      $javascript = $javascript ."$('fcotring_fecreg').focus()";
                }
                 $this->params=array();
                 $this->fcotring = $this->getFcotringOrCreate();
                 $this->labels = $this->getLabels();
                 $this->configGridDeuda($griddeuda);
                $output = '[["fcotring_totmondec","' . $codigo . '",""],["javascript","' . $javascript . '",""]]';

            break;
          case '5':
                 $rifcon = $this->getRequestParameter('rifcon','');
                 $valor = $this->getRequestParameter('valor','');
                 $nombre="";
                 $direccion="";
                  switch($valor){
                      case 'IC':
                            $c = new Criteria();
                            $c->add(FcsollicPeer :: STALIC, 'V');
                            $c->add(FcsollicPeer::NUMLIC,null, Criteria :: ISNOTNULL);
                            $c->add(FcsollicPeer::NUMLIC,$codigo);
                            $c->add(FcsollicPeer::RIFCON, $rifcon);
                            $c->addJoin(FcsollicPeer::RIFCON,FcconrepPeer::RIFCON);
                            $c->addAscendingOrderByColumn(FcsollicPeer::NOMNEG);
                            $fcsollic = FcsollicPeer::doSelectOne($c);
                            if($fcsollic){
                                $nombre=$fcsollic->getNomcon();
                                $direccion =$fcsollic->getDirpri();
                            }else{
                                  $javascript = $javascript . "alert('No Pertenece al Contribuyente'); $('fcotring_numref').value=''; $('fcotring_numref').focus();";
                            }

                            break;
                      case 'V':
                            $c = new Criteria();
                            $c->add(FcregvehPeer::RIFCON, $rifcon);
                             $c->add(FcregvehPeer::PLAVEH, $codigo);
                            $c->addAscendingOrderByColumn(FcregvehPeer::NOMCON);
                            $c->addJoin(FcregvehPeer::RIFCON,FcconrepPeer::RIFCON);
                            $fcregveh = FcregvehPeer::doSelectOne($c);
                              if($fcregveh){
                                 $nombre=$fcregveh->getNomcon();
                                 $direccion=$fcregveh->getDirCon();
                              }else{
                                $javascript = $javascript . "alert('No Pertenece al Contribuyente'); $('fcotring_numref').value=''; $('fcotring_numref').focus();";

                            }
                            break;

                      case 'I':
                            $c = new Criteria();
                            $c->add(FcreginmPeer::RIFCON, $rifcon);
                            $c->add(FcreginmPeer::CODCATINM, $codigo);
                            $c->addJoin(FcreginmPeer::RIFCON,FcconrepPeer::RIFCON);
                            $c->addAscendingOrderByColumn(FcconrepPeer::NOMCON);
                            $fcreginm = FcreginmPeer::doSelectOne($c);
                            if($fcreginm){
                                 $nombre=$fcreginm->getNomcon();
                                 $direccion=$fcreginm->getDirinm();
                            }else{
                                 $javascript = $javascript . "alert('No Pertenece al Contribuyente'); $('fcotring_numref').value=''; $('fcotring_numref').focus();";

                            }
                            break;

                  }
                   $output = '[["fcotring_nombrecont","' . $nombre . '",""],["fcotring_dircont","' . $direccion . '",""],["javascript","' . $javascript . '",""]]';

                break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }
     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    if( ($ajax)!=4 && ($ajax)!=3){
    return sfView::HEADER_ONLY;}

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
               if ($this->getRequestParameter('fcotring[id]')==""){
                         if (Hacienda::verificarNroControlDec($this->getRequestParameter('fcotring[nrocon]'))){
                             $this->coderr=746;
                             return false;
                         }
                          if (Hacienda::verificarNroControlPago($this->getRequestParameter('fcotring[nrocon]'))){
                             $this->coderr=745;
                             return false;
                         }
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
     $this->configGridDeuda();
     $griddeuda = Herramientas::CargarDatosGridv2($this,$this->griddeuda);
  }

  public function saving($clasemodelo)
  {
    $griddeuda = Herramientas::CargarDatosGridv2($this,$this->griddeuda);
    return Hacienda::salvarFacdecotr($clasemodelo,$griddeuda);
  }

  public function deleting($clasemodelo)
  {
     if (Hacienda::VerificarPagoDeclaracion($this->fcotring->getNrocon()))
    {
        return Hacienda::eliminarFacotringdec($clasemodelo);
     }else {
        return 737;

    }
  }
 

}