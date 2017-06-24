<?php

/**
 * facvehreg actions.
 *
 * @package    siga
 * @subpackage facvehreg
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class facvehregActions extends autofacvehregActions
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
    $this->fcregveh->setFunrec($this->fcregveh->getFunrec()=='' ? $this->getUser()->getAttribute('loguse') : $this->fcregveh->getFunrec());
    $this->fcregveh->setFundes($this->fcregveh->getFundes()=='' ? $this->getUser()->getAttribute('loguse') : $this->fcregveh->getFundes());
    $this->fcregveh->setFunrectra($this->fcregveh->getFunrectra()=='' ? $this->getUser()->getAttribute('loguse') : $this->fcregveh->getFunrectra());
  }


  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($reg = array(),$regelim = array())
  {
    $c = new Criteria();
    $coduso =$this->fcregveh->getCoduso();
    $c->add(FcusovehPeer::CODUSO,$this->fcregveh->getCoduso());
    $c->addDescendingOrderByColumn(FcusovehPeer::ANOVIG);
    $per = FcusovehPeer::doSelect($c);
    foreach ($per as $obj)
    {
       $sql = "select valorut as valor from fcdefut where fecini in (select Max(fecini) as maximo from fcdefut where to_char(fecini,'YYYY')='".$obj->getAnovig()."')";
       if (Herramientas::BuscarDatos($sql, $result)) {
           $valuni=$result[0]["valor"];
       }else $valuni=0;
      
       $obj->setMonafo($valuni*$obj->getPorali());
    }

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facvehreg/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
    $this->grid = $this->columnas[0]->getConfig($per);

    $this->fcregveh->setGrid($this->grid);

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

	      if ($fcconrep2)
	      {
  	      	  $javascript = $javascript . "if ($('autorizacion'))  $('autorizacion').show();";
	          $nomcon=$fcconrep2->getNomcon();
	          $dircon=$fcconrep2->getDircon();
	          if ($fcconrep2->getNaccon()=='V')
	          {
	          	$javascript = $javascript . "$('fcregveh_nacconcon_V').checked=true; ";
	          }
	          else
	          {
	          	$javascript = $javascript . "$('fcregveh_nacconcon_E').checked=true; ";
	          }
	          if ($fcconrep2->getTipcon()=='N')
	          {
	          	$javascript = $javascript . "$('fcregveh_tipconcon_N').checked=true; ";
	          }
	          else
	          {
	          	$javascript = $javascript . "$('fcregveh_tipconcon_J').checked=true; ";
	          }
	      }
	      else
	      {
                $javascript = $javascript ."activarCont()";
	      	//$javascript = $javascript . "if ($('autorizacion'))  $('autorizacion').show();";
	      }

          $output = '[["fcregveh_licmodificada","I",""],["fcregveh_nomcon","'.$nomcon.'",""],["fcregveh_dircon","'.$dircon.'",""],["fcregveh_fechlic","'.$fecha.'",""],["javascript","' . $javascript . '",""]]';

		    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		    return sfView::HEADER_ONLY;

        break;
      case '2':
        $nomcon="";
        $dircon="";
        $correlativo="";
        $numero = $this->getRequestParameter('numero','');
        $valor=str_pad($codigo, 10, '0', STR_PAD_LEFT);
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
	          	$javascript = $javascript . "$('fcregveh_nacconrep_V').checked=true; ";
	          }
	          else
	          {
	          	$javascript = $javascript . "$('fcregveh_nacconrep_E').checked=true; ";
	          }
	          if ($fcconrep2->getTipcon()=='N')
	          {
				$javascript = $javascript . "$('fcregveh_tipconrep_N').checked=true; ";
	          }
	          else
	          {
	          	$javascript = $javascript . "$('fcregveh_tipconrep_J').checked=true; ";
	          }
	      }
	      else
	      {
  	         $javascript = $javascript ."activarRep()";
      	   // $javascript = $javascript . "if ($('autorizacion'))  $('autorizacion').show();";
	      }
          $output = '[["fcregveh_licmodificada","I",""],["fcregveh_nomconrep","'.$nomcon.'",""],["fcregveh_dirconrep","'.$dircon.'",""],["fcregveh_fechlic","'.$fecha.'",""],["javascript","' . $javascript . '",""]]';


		    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		    return sfView::HEADER_ONLY;
        break;

	case '3':

                $desuso = Herramientas :: getX_vacio('coduso', 'fcusoveh', 'desuso', $codigo);
                $this->params=array();
                $this->labels = $this->getLabels();
                $this->fcregveh = $this->getFcregvehOrCreate();
                $this->fcregveh->setCoduso($codigo);
                $this->configGrid();

                $output = '[["'.$cajtexmos.'","'.$desuso.'",""],["","",""],["","",""]]';

    		$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    	break;
         case '4' :
                  $caj = $this->getRequestParameter('cajtexmos', '');
                  $c= new Criteria();
                  $c->add(FcconrepPeer::RIFCON,trim($codigo));
                  $fcconrep2 = FcconrepPeer::doSelectOne($c);
                      $javascript='';
                      $nomcon='';

                  if (count($fcconrep2)>0)
                  {
                      $nomcon=$fcconrep2->getNomcon();
                  }
                  else
                  {

                    $javascript = $javascript . "alert('La persona no Existe, incluya todos sus Datos Basicos');";

                  }
                  
                  if($caj =='fcreginm_nomconant'){
                        $output = '[["fcreginm_nomconant","'.$nomcon.'",""],["javascript","' . $javascript . '",""]]';

                  }else{
                        $output = '[["fcreginm_nomrepant","'.$nomcon.'",""],["javascript","' . $javascript . '",""]]';
                  }
                  $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
                  return sfView::HEADER_ONLY;
                  break;
        case '5' :        
          $c = new Criteria();
          $c->setLimit(1);
          $c->addDescendingOrderByColumn(FcdesvehPeer::NUMDES);
          $reg = FcdesvehPeer::doSelectOne($c);
           if ($reg)
           {
               $numero=str_pad(($reg->getNumdes()+1),10,'0',STR_PAD_LEFT);
           }else $numero='0000000001';          

          $output = '[["fcregveh_numdes","'.$numero.'",""],["","",""],["","",""]]';
          
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;
         break;
        case '6' :        
          $c = new Criteria();
          $c->setLimit(1);
          $c->addDescendingOrderByColumn(FctravehPeer::NUMTRA);
          $reg = FctravehPeer::doSelectOne($c);
           if ($reg)
           {
               $numero=str_pad(($reg->getNumtra()+1),10,'0',STR_PAD_LEFT);
           }else $numero='0000000001';          

          $output = '[["fcregveh_numtra","'.$numero.'",""],["","",""],["","",""]]';
          
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;
         break;         
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        break;
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

   if ($this->getRequest()->getMethod() == sfRequest :: POST) {
                        if ($this->getRequestParameter('fcregveh[traspaso]')=="S"){
                            if ($this->getRequestParameter('fcregveh[numtra]')==""){
                                  $this->coderr=711;
                                 return false;
                            }
                             if ($this->getRequestParameter('fcregveh[fectra]')==""){
                                  $this->coderr=712;
                                 return false;
                            }
                              if ($this->getRequestParameter('fcregveh[funrec]')==""){
                                  $this->coderr=713;
                                 return false;
                            }


                        }
                       if ($this->getRequestParameter('fcregveh[modificar]')=="S"){
                        if ($this->getRequestParameter('fcregveh[refmod]')==""){
                                  $this->coderr=735;
                                 return false;
                            }
                        if ($this->getRequestParameter('fcregveh[fec]')==""){
                                  $this->coderr=731;
                                 return false;
                            }
                        if ($this->getRequestParameter('fcregveh[funrecmod]')==""){
                                  $this->coderr=732;
                                 return false;
                            }
                        if ($this->getRequestParameter('fcregveh[refmod]')!="" && $this->getRequestParameter('fcregveh[refmod]')!="##########"){
                                  $numtra =$this->getRequestParameter('fcregveh[refmod]');
                                  $cr= new Criteria();
                                  $cr->add(FcmodvehPeer::REFMOD, $numtra);
                                  $reg = FcmodvehPeer::doselectone($cr);
                                  if($reg){
                                    $this->coderr=734;
                                     return false;
                                    }
                                
                            }
                        }

			if ($this->coderr != -1) {
				return false;
			} else
				return true;

		} else
			return true;




  }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
        $this->configGrid();
        $grid = Herramientas::CargarDatosGridv2($this,$this->Grid);
  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
	return Hacienda::salvarFacvehreg($clasemodelo, $grid, $this->getUser()->getAttribute('loguse'));
  }

  public function deleting($clasemodelo)
  {
    if (Hacienda::VerificarDeudaVeh($this->fcregveh->getPlaveh()))
    {
        return Hacienda::eliminarFacvehreg($clasemodelo);
     }else {
        return 733;
 
    }
  }
  protected function updateFcregvehFromRequest()
  {
    $fcregveh = $this->getRequestParameter('fcregveh');

    if (isset($fcregveh['plaveh']))
    {
      $this->fcregveh->setPlaveh($fcregveh['plaveh']);
    }
    if (isset($fcregveh['fecreg']))
    {
      if ($fcregveh['fecreg'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcregveh['fecreg']))
          {
            $value = $dateFormat->format($fcregveh['fecreg'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcregveh['fecreg'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcregveh->setFecreg($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcregveh->setFecreg(null);
      }
    }
    if (isset($fcregveh['mensaje']))
    {
      $this->fcregveh->setMensaje($fcregveh['mensaje']);
    }
    if (isset($fcregveh['operaciones']))
    {
      $this->fcregveh->setOperaciones($fcregveh['operaciones']);
    }
    if (isset($fcregveh['motdes']))
    {
      $this->fcregveh->setMotdes($fcregveh['motdes']);
    }
    if (isset($fcregveh['rifcon']))
    {
      $this->fcregveh->setRifcon($fcregveh['rifcon']);
    }
    if (isset($fcregveh['dircon']))
    {
      $this->fcregveh->setDircon($fcregveh['dircon']);
    }
    if (isset($fcregveh['nacconcon']))
    {
      $this->fcregveh->setNacconcon($fcregveh['nacconcon']);
    }
    if (isset($fcregveh['tipconcon']))
    {
      $this->fcregveh->setTipconcon($fcregveh['tipconcon']);
    }
    if (isset($fcregveh['rifrep']))
    {
      $this->fcregveh->setRifrep($fcregveh['rifrep']);
    }
    if (isset($fcregveh['dirconrep']))
    {
      $this->fcregveh->setDirconrep($fcregveh['dirconrep']);
    }
    if (isset($fcregveh['nacconrep']))
    {
      $this->fcregveh->setNacconrep($fcregveh['nacconrep']);
    }
    if (isset($fcregveh['tipconrep']))
    {
      $this->fcregveh->setTipconrep($fcregveh['tipconrep']);
    }
    if (isset($fcregveh['coduso']))
    {
      $this->fcregveh->setCoduso($fcregveh['coduso']);
    }
    if (isset($fcregveh['grid']))
    {
      $this->fcregveh->setGrid($fcregveh['grid']);
    }
    if (isset($fcregveh['marveh']))
    {
      $this->fcregveh->setMarveh($fcregveh['marveh']);
    }
    if (isset($fcregveh['modveh']))
    {
      $this->fcregveh->setModveh($fcregveh['modveh']);
    }
    if (isset($fcregveh['colveh']))
    {
      $this->fcregveh->setColveh($fcregveh['colveh']);
    }
    if (isset($fcregveh['valori']))
    {
      $this->fcregveh->setValori($fcregveh['valori']);
    }
    if (isset($fcregveh['anoveh']))
    {
      $this->fcregveh->setAnoveh($fcregveh['anoveh']);
    }
    if (isset($fcregveh['edad']))
    {
      $this->fcregveh->setEdad($fcregveh['edad']);
    }
    if (isset($fcregveh['sermot']))
    {
      $this->fcregveh->setSermot($fcregveh['sermot']);
    }
    if (isset($fcregveh['sercar']))
    {
      $this->fcregveh->setSercar($fcregveh['sercar']);
    }
    if (isset($fcregveh['funrec']))
    {
      $this->fcregveh->setFunrec($fcregveh['funrec']);
    }
    if (isset($fcregveh['fecrec']))
    {
      if ($fcregveh['fecrec'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcregveh['fecrec']))
          {
            $value = $dateFormat->format($fcregveh['fecrec'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcregveh['fecrec'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcregveh->setFecrec($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcregveh->setFecrec(null);
      }
    }
    if (isset($fcregveh['plaant']))
    {
      $this->fcregveh->setPlaant($fcregveh['plaant']);
    }
    if (isset($fcregveh['dueant']))
    {
      $this->fcregveh->setDueant($fcregveh['dueant']);
    }
    if (isset($fcregveh['dirant']))
    {
      $this->fcregveh->setDirant($fcregveh['dirant']);
    }

    if (isset($fcregveh['plaveh']))
    {
      $this->fcregveh->setPlaveh($fcregveh['plaveh']);
    }
    if (isset($fcregveh['rifcon']))
    {
      $this->fcregveh->setRifcon($fcregveh['rifcon']);
    }
    if (isset($fcregveh['anoveh']))
    {
      $this->fcregveh->setAnoveh($fcregveh['anoveh']);
    }
    if (isset($fcregveh['fecreg']))
    {
      if ($fcregveh['fecreg'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcregveh['fecreg']))
          {
            $value = $dateFormat->format($fcregveh['fecreg'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcregveh['fecreg'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcregveh->setFecreg($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcregveh->setFecreg(null);
      }
    }
    if (isset($fcregveh['sermot']))
    {
      $this->fcregveh->setSermot($fcregveh['sermot']);
    }
    if (isset($fcregveh['sercar']))
    {
      $this->fcregveh->setSercar($fcregveh['sercar']);
    }
    if (isset($fcregveh['marveh']))
    {
      $this->fcregveh->setMarveh($fcregveh['marveh']);
    }
    if (isset($fcregveh['colveh']))
    {
      $this->fcregveh->setColveh($fcregveh['colveh']);
    }
    if (isset($fcregveh['coduso']))
    {
      $this->fcregveh->setCoduso($fcregveh['coduso']);
    }
    if (isset($fcregveh['impveh']))
    {
      $this->fcregveh->setImpveh($fcregveh['impveh']);
    }
    if (isset($fcregveh['salact']))
    {
      $this->fcregveh->setSalact($fcregveh['salact']);
    }
    if (isset($fcregveh['salant']))
    {
      $this->fcregveh->setSalant($fcregveh['salant']);
    }
    if (isset($fcregveh['valori']))
    {
      $this->fcregveh->setValori($fcregveh['valori']);
    }
    if (isset($fcregveh['aboveh']))
    {
      $this->fcregveh->setAboveh($fcregveh['aboveh']);
    }
    if (isset($fcregveh['morveh']))
    {
      $this->fcregveh->setMorveh($fcregveh['morveh']);
    }
    if (isset($fcregveh['desveh']))
    {
      $this->fcregveh->setDesveh($fcregveh['desveh']);
    }
    if (isset($fcregveh['estveh']))
    {
      $this->fcregveh->setEstveh($fcregveh['estveh']);
    }
    if (isset($fcregveh['funrec']))
    {
      $this->fcregveh->setFunrec($fcregveh['funrec']);
    }
    if (isset($fcregveh['obsveh']))
    {
      $this->fcregveh->setObsveh($fcregveh['obsveh']);
    }
    if (isset($fcregveh['rifrep']))
    {
      $this->fcregveh->setRifrep($fcregveh['rifrep']);
    }
    if (isset($fcregveh['modveh']))
    {
      $this->fcregveh->setModveh($fcregveh['modveh']);
    }
    if (isset($fcregveh['fecrec']))
    {
      if ($fcregveh['fecrec'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcregveh['fecrec']))
          {
            $value = $dateFormat->format($fcregveh['fecrec'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcregveh['fecrec'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcregveh->setFecrec($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcregveh->setFecrec(null);
      }
    }
    if (isset($fcregveh['dueant']))
    {
      $this->fcregveh->setDueant($fcregveh['dueant']);
    }
    if (isset($fcregveh['dirant']))
    {
      $this->fcregveh->setDirant($fcregveh['dirant']);
    }
    if (isset($fcregveh['plaant']))
    {
      $this->fcregveh->setPlaant($fcregveh['plaant']);
    }
    if (isset($fcregveh['estdec']))
    {
      $this->fcregveh->setEstdec($fcregveh['estdec']);
    }
    if (isset($fcregveh['nomcon']))
    {
      $this->fcregveh->setNomcon($fcregveh['nomcon']);
    }
    if (isset($fcregveh['dircon']))
    {
      $this->fcregveh->setDircon($fcregveh['dircon']);
    }
    if (isset($fcregveh['clacon']))
    {
      $this->fcregveh->setClacon($fcregveh['clacon']);
    }
    if (isset($fcregveh['capveh']))
    {
      $this->fcregveh->setCapveh($fcregveh['capveh']);
    }
    if (isset($fcregveh['pesveh']))
    {
      $this->fcregveh->setPesveh($fcregveh['pesveh']);
    }
    if (isset($fcregveh['tipveh']))
    {
      $this->fcregveh->setTipveh($fcregveh['tipveh']);
    }
    if (isset($fcregveh['fecact']))
    {
      if ($fcregveh['fecact'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcregveh['fecact']))
          {
            $value = $dateFormat->format($fcregveh['fecact'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcregveh['fecact'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcregveh->setFecact($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcregveh->setFecact(null);
      }
    }
    if (isset($fcregveh['marcod']))
    {
      $this->fcregveh->setMarcod($fcregveh['marcod']);
    }

    if (isset($fcregveh['traspaso']))
    {
      $this->fcregveh->setTraspaso($fcregveh['traspaso']);
    }
    if (isset($fcregveh['desincorporar']))
    {
      $this->fcregveh->setDesincorporar($fcregveh['desincorporar']);
    }
     if (isset($fcregveh['rifconant']))
    {
      $this->fcregveh->setRifconant($fcregveh['rifconant']);
    }
      if (isset($fcregveh['rifrepant']))
    {
      $this->fcregveh->setRifrepant($fcregveh['rifrepant']);
    }
     if (isset($fcregveh['fectra']))
    {
      if ($fcregveh['fectra'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcregveh['fectra']))
          {
            $value = $dateFormat->format($fcregveh['fectra'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcregveh['fectra'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcregveh->setFectra($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcregveh->setFectra(null);
      }


  }
    if (isset($fcregveh['numtra']))
    {
      $this->fcregveh->setNumtra($fcregveh['numtra']);
    }
      
  if (isset($fcregveh['modificar']))
    {
      $this->fcregveh->setModificar($fcregveh['modificar']);
    }
   if (isset($fcregveh['refmod']))
    {
      $this->fcregveh->setRefMod($fcregveh['refmod']);
    }
     if (isset($fcregveh['funrecmod']))
    {
      $this->fcregveh->setFunrecmod($fcregveh['funrecmod']);
    }
   if (isset($fcregveh['nomconrep']))
    {
      $this->fcregveh->setNomconrep($fcregveh['nomconrep']);
    }



      if (isset($fcregveh['fec']))
    {
      if ($fcregveh['fec'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcregveh['fec']))
          {
            $value = $dateFormat->format($fcregveh['fec'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcregveh['fec'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcregveh->setFec($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcregveh->setFec(null);
      }
    }
    if (isset($fcregveh['numdes']))
    {
      $this->fcregveh->setNumdes($fcregveh['numdes']);
    }
    if (isset($fcregveh['fundes']))
    {
      $this->fcregveh->setFundes($fcregveh['fundes']);
    }
    if (isset($fcregveh['motdes']))
    {
      $this->fcregveh->setMotdes($fcregveh['motdes']);
    }

  }



}