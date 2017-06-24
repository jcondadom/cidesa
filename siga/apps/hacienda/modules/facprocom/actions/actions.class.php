<?php

/**
 * facprocom actions.
 *
 * @package    siga
 * @subpackage facprocom
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class facprocomActions extends autofacprocomActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
  		$this->setVars();
		$this->configGrid();
  }

  public function setVars()
  {
    $this->params[0] = Herramientas::getX('codemp','fcdefins','forveh','001');
    $this->fcprolic->setFunrec($this->fcprolic->getFunrec()=='' ? $this->getUser()->getAttribute('loguse') : $this->fcprolic->getFunrec());
  }

	/**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($tipo="",$reg = array (), $regelim = array ()) {

      $fcprolicdet="";
      $per= array();
      if ($this->fcprolic->getId()){
		$c = new Criteria();
		$c->add(FcprolicdetPeer :: NROCON, $this->fcprolic->getNrocon());
		$c->add(FcprolicdetPeer :: RIFCON, $this->fcprolic->getRifcon());
		$c->add(FcprolicdetPeer :: TIPPRO, $this->fcprolic->getTippro());
		$per = FcprolicdetPeer :: doSelect($c);
  	}else{

		$c = new Criteria();
		$c->add(FctipprodetPeer :: TIPPRO, $tipo);
		$c->add(FctipprodetPeer :: TIPO, 'V');
		$reg = FctipprodetPeer :: doSelect($c);
                if($reg){
                   
                      foreach ($reg as $obj)
                    {
                      $fcprolicdet=new Fcprolicdet();
                      $fcprolicdet->setCampo($obj->getTipvar());
                      $fcprolicdet->setValor($obj->getValor());
                      $per[]=$fcprolicdet;
                    }
                }


  	}

        $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facprocom/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
        $this->grid = $this->columnas[0]->getConfig($per);
        $this->fcprolic->setGrid($this->grid);
	}


  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $javascript = "";
    $ajax   = $this->getRequestParameter('ajax','');
    $cajtexmos   = $this->getRequestParameter('cajtexmos','');
    switch ($ajax){

      case '1':
	    $nomcon="";
	    $dircon="";
	    $correlativo="";

              $fecha = date("d/m/Y");
	      $c= new Criteria();
	      $c->add(FcconrepPeer::RIFCON,trim($codigo));
	      $fcconrep2 = FcconrepPeer::doSelectOne($c);

	      if (count($fcconrep2)>0)
	      {
  	      	  $javascript = $javascript . "if ($('autorizacion'))  $('autorizacion').show();";
	          $nomcon=$fcconrep2->getNomcon();
	          $dircon=$fcconrep2->getDircon();
	          if ($fcconrep2->getNaccon()=='V')
	          {
	          	$javascript = $javascript . "$('fcprolic_nacconcon_V').checked=true; ";
	          }
	          else
	          {
	          	$javascript = $javascript . "$('fcprolic_nacconcon_E').checked=true; ";
	          }
	          if ($fcconrep2->getTipcon()=='N')
	          {
	          	$javascript = $javascript . "$('fcprolic_tipconcon_N').checked=true; ";
	          }
	          else
	          {
	          	$javascript = $javascript . "$('fcprolic_tipconcon_J').checked=true; ";
	          }
	      }
	      else
	      {

	       $javascript = $javascript ."activarCont()";
	      }

          $output = '[["fcprolic_nomcon","'.$nomcon.'",""],["fcprolic_dircon","'.$dircon.'",""],["javascript","' . $javascript . '",""]]';

		    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		    return sfView::HEADER_ONLY;

        break;
      case '2':
	    $nomcon="";
	    $dircon="";
	    $correlativo="";

          $fecha = date("d/m/Y");
	      $c= new Criteria();
	      $c->add(FcconrepPeer::RIFCON,trim($codigo));
	      $fcconrep2 = FcconrepPeer::doSelectOne($c);
	      if (count($fcconrep2)>0)
	      {
  	      	  ///$javascript = $javascript . "if ($('autorizacion'))  $('autorizacion').show();";
	          $nomcon=$fcconrep2->getNomcon();
	          $dircon=$fcconrep2->getDircon();
	          if ($fcconrep2->getNaccon()=='V')
	          {
	          	$javascript = $javascript . "$('fcprolic_nacconrep_V').checked=true; ";
	          }
	          else
	          {
	          	$javascript = $javascript . "$('fcprolic_nacconrep_E').checked=true; ";
	          }
	          if ($fcconrep2->getTipcon()=='N')
	          {
				$javascript = $javascript . "$('fcprolic_tipconrep_N').checked=true; ";
	          }
	          else
	          {
	          	$javascript = $javascript . "$('fcprolic_tipconrep_J').checked=true; ";
	          }
	      }
	      else
	      {
  	            $javascript = $javascript ."activarRep()";
	      }
          $output = '[["fcprolic_nomconrep","'.$nomcon.'",""],["fcprolic_dirconrep","'.$dircon.'",""],["javascript","' . $javascript . '",""]]';


		    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		    return sfView::HEADER_ONLY;
        break;

	case '3':
                        $c= new Criteria();
                        $c->add(FctipproPeer::TIPPRO,trim($codigo));
                        $fctippro = FctipproPeer::doSelectOne($c);
                        if($fctippro){
                           
                                $desuso = Herramientas :: getX_vacio('tippro', 'fctippro', 'destip', $codigo);
                                 switch ($fctippro->getParpro()){
                                     case '0':
                                         $javascript = $javascript ."$('label41').innerHTML = 'Unidades';";
                                         break;
                                     case '1':
                                          $javascript = $javascript ."$('label41').innerHTML = 'Medidas en M2';";
                                         break;
                                     case '2':
                                          $javascript = $javascript ."$('label41').innerHTML = 'Cantidades ';";
                                         break;
                                      default:
                                         $output = '[["","",""],["","",""],["","",""]]';
                                       break;

                                 }
                                }else{
                                    $javascript = $javascript ."alert('El código de Tipo de Propaganda Comercial No Existe');";
                                }
                        $this->params=array();
                        $this->fcprolic = $this->getFcprolicOrCreate();
                        $this->labels = $this->getLabels();
                        $this->configGrid($codigo);                   

			$output = '[["'.$cajtexmos.'","'.$desuso.'",""],["javascript","' . $javascript . '",""],["","",""],["","",""]]';

    		$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
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
                     if ($this->getRequestParameter('fcprolic[id]')!=""){
                         if ($this->getRequestParameter('fcprolic[refmod]')==""){
                              $this->coderr=741;
                             return false;
                         }
                          if ($this->getRequestParameter('fcprolic[funrecmod]')==""){
                                  $this->coderr=742;
                                 return false;
                            }
                          if ($this->getRequestParameter('fcprolic[fecmod]')==""){
                                  $this->coderr=743;
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
    $this->setVars();
    $this->configGrid();
     $grid = Herramientas::CargarDatosGridv2($this,$this->Grid);

  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
    return Hacienda::salvarFacprocom($clasemodelo, $grid,$this->getUser()->getAttribute('loguse'));
  }

  public function deleting($clasemodelo)
  {
        $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
	return Hacienda::EliminarFacprocom($clasemodelo, $grid);
  }

   protected function updateFcprolicFromRequest()
  {
    $fcprolic = $this->getRequestParameter('fcprolic');

    if (isset($fcprolic['nrocon']))
    {
      $this->fcprolic->setNrocon($fcprolic['nrocon']);
    }
    if (isset($fcprolic['fecreg']))
    {
      if ($fcprolic['fecreg'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcprolic['fecreg']))
          {
            $value = $dateFormat->format($fcprolic['fecreg'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcprolic['fecreg'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcprolic->setFecreg($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcprolic->setFecreg(null);
      }
    }
    if (isset($fcprolic['mensaje']))
    {
      $this->fcprolic->setMensaje($fcprolic['mensaje']);
    }
    if (isset($fcprolic['rifcon']))
    {
      $this->fcprolic->setRifcon($fcprolic['rifcon']);
    }
    if (isset($fcprolic['dircon']))
    {
      $this->fcprolic->setDircon($fcprolic['dircon']);
    }
    if (isset($fcprolic['nacconcon']))
    {
      $this->fcprolic->setNacconcon($fcprolic['nacconcon']);
    }
    if (isset($fcprolic['tipconcon']))
    {
      $this->fcprolic->setTipconcon($fcprolic['tipconcon']);
    }
    if (isset($fcprolic['rifrep']))
    {
      $this->fcprolic->setRifrep($fcprolic['rifrep']);
    }
    if (isset($fcprolic['dirconrep']))
    {
      $this->fcprolic->setDirconrep($fcprolic['dirconrep']);
    }
    if (isset($fcprolic['nacconrep']))
    {
      $this->fcprolic->setNacconrep($fcprolic['nacconrep']);
    }
    if (isset($fcprolic['tipconrep']))
    {
      $this->fcprolic->setTipconrep($fcprolic['tipconrep']);
    }
    if (isset($fcprolic['tippro']))
    {
      $this->fcprolic->setTippro($fcprolic['tippro']);
    }
    if (isset($fcprolic['destip']))
    {
      $this->fcprolic->setDestip($fcprolic['destip']);
    }
    if (isset($fcprolic['grid']))
    {
      $this->fcprolic->setGrid($fcprolic['grid']);
    }
    if (isset($fcprolic['despro']))
    {
      $this->fcprolic->setDespro($fcprolic['despro']);
    }
    if (isset($fcprolic['dirpro']))
    {
      $this->fcprolic->setDirpro($fcprolic['dirpro']);
    }
    if (isset($fcprolic['texpub']))
    {
      $this->fcprolic->setTexpub($fcprolic['texpub']);
    }
    if (isset($fcprolic['protip']))
    {
      $this->fcprolic->setProtip($fcprolic['protip']);
    }
    if (isset($fcprolic['funrec']))
    {
      $this->fcprolic->setFunrec($fcprolic['funrec']);
    }
    if (isset($fcprolic['fecrec']))
    {
      if ($fcprolic['fecrec'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcprolic['fecrec']))
          {
            $value = $dateFormat->format($fcprolic['fecrec'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcprolic['fecrec'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcprolic->setFecrec($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcprolic->setFecrec(null);
      }
    }
    if (isset($fcprolic['refmod']))
    {
      $this->fcprolic->setRefmod($fcprolic['refmod']);
    }
    if (isset($fcprolic['fecmod']))
    {
      $this->fcprolic->setFecmod($fcprolic['fecmod']);
    }
    if (isset($fcprolic['funrecmod']))
    {
      $this->fcprolic->setFunrecmod($fcprolic['funrecmod']);
    }

    if (isset($fcprolic['nrocon']))
    {
      $this->fcprolic->setNrocon($fcprolic['nrocon']);
    }
    if (isset($fcprolic['fecreg']))
    {
      if ($fcprolic['fecreg'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcprolic['fecreg']))
          {
            $value = $dateFormat->format($fcprolic['fecreg'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcprolic['fecreg'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcprolic->setFecreg($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcprolic->setFecreg(null);
      }
    }
    if (isset($fcprolic['rifcon']))
    {
      $this->fcprolic->setRifcon($fcprolic['rifcon']);
    }
    if (isset($fcprolic['tippro']))
    {
      $this->fcprolic->setTippro($fcprolic['tippro']);
    }
    if (isset($fcprolic['despro']))
    {
      $this->fcprolic->setDespro($fcprolic['despro']);
    }
    if (isset($fcprolic['dirpro']))
    {
      $this->fcprolic->setDirpro($fcprolic['dirpro']);
    }
    if (isset($fcprolic['monpro']))
    {
      $this->fcprolic->setMonpro($fcprolic['monpro']);
    }
    if (isset($fcprolic['monimp']))
    {
      $this->fcprolic->setMonimp($fcprolic['monimp']);
    }
    if (isset($fcprolic['funrec']))
    {
      $this->fcprolic->setFunrec($fcprolic['funrec']);
    }
    if (isset($fcprolic['fecrec']))
    {
      if ($fcprolic['fecrec'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcprolic['fecrec']))
          {
            $value = $dateFormat->format($fcprolic['fecrec'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcprolic['fecrec'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcprolic->setFecrec($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcprolic->setFecrec(null);
      }
    }
    if (isset($fcprolic['rifrep']))
    {
      $this->fcprolic->setRifrep($fcprolic['rifrep']);
    }
    if (isset($fcprolic['stapro']))
    {
      $this->fcprolic->setStapro($fcprolic['stapro']);
    }
    if (isset($fcprolic['stadec']))
    {
      $this->fcprolic->setStadec($fcprolic['stadec']);
    }
    if (isset($fcprolic['nomcon']))
    {
      $this->fcprolic->setNomcon($fcprolic['nomcon']);
    }
    if (isset($fcprolic['dircon']))
    {
      $this->fcprolic->setDircon($fcprolic['dircon']);
    }
    if (isset($fcprolic['semdia']))
    {
      $this->fcprolic->setSemdia($fcprolic['semdia']);
    }
    if (isset($fcprolic['texpub']))
    {
      $this->fcprolic->setTexpub($fcprolic['texpub']);
    }
    if (isset($fcprolic['protip']))
    {
      $this->fcprolic->setProtip($fcprolic['protip']);
    }

    if (isset($fcprolic['nrocon']))
    {
      $this->fcprolic->setNrocon($fcprolic['nrocon']);
    }
    if (isset($fcprolic['fecreg']))
    {
      if ($fcprolic['fecreg'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcprolic['fecreg']))
          {
            $value = $dateFormat->format($fcprolic['fecreg'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcprolic['fecreg'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcprolic->setFecreg($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcprolic->setFecreg(null);
      }
    }
    if (isset($fcprolic['rifcon']))
    {
      $this->fcprolic->setRifcon($fcprolic['rifcon']);
    }
    if (isset($fcprolic['tippro']))
    {
      $this->fcprolic->setTippro($fcprolic['tippro']);
    }
    if (isset($fcprolic['despro']))
    {
      $this->fcprolic->setDespro($fcprolic['despro']);
    }
    if (isset($fcprolic['dirpro']))
    {
      $this->fcprolic->setDirpro($fcprolic['dirpro']);
    }
    if (isset($fcprolic['monpro']))
    {
      $this->fcprolic->setMonpro($fcprolic['monpro']);
    }
    if (isset($fcprolic['monimp']))
    {
      $this->fcprolic->setMonimp($fcprolic['monimp']);
    }
    if (isset($fcprolic['funrec']))
    {
      $this->fcprolic->setFunrec($fcprolic['funrec']);
    }
    if (isset($fcprolic['fecrec']))
    {
      if ($fcprolic['fecrec'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcprolic['fecrec']))
          {
            $value = $dateFormat->format($fcprolic['fecrec'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcprolic['fecrec'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcprolic->setFecrec($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcprolic->setFecrec(null);
      }
    }
    if (isset($fcprolic['rifrep']))
    {
      $this->fcprolic->setRifrep($fcprolic['rifrep']);
    }
    if (isset($fcprolic['stapro']))
    {
      $this->fcprolic->setStapro($fcprolic['stapro']);
    }
    if (isset($fcprolic['stadec']))
    {
      $this->fcprolic->setStadec($fcprolic['stadec']);
    }
    if (isset($fcprolic['nomcon']))
    {
      $this->fcprolic->setNomcon($fcprolic['nomcon']);
    }
    if (isset($fcprolic['dircon']))
    {
      $this->fcprolic->setDircon($fcprolic['dircon']);
    }
    if (isset($fcprolic['semdia']))
    {
      $this->fcprolic->setSemdia($fcprolic['semdia']);
    }
    if (isset($fcprolic['texpub']))
    {
      $this->fcprolic->setTexpub($fcprolic['texpub']);
    }
    if (isset($fcprolic['protip']))
    {
      $this->fcprolic->setProtip($fcprolic['protip']);
    }
    if (isset($fcprolic['nomconrep']))
    {
      $this->fcprolic->setNomconrep($fcprolic['nomconrep']);
    }

  }

}
