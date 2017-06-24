<?php

/**
 * almdefart actions.
 *
 * @package    Roraima
 * @subpackage almdefart
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class almdefartActions extends autoalmdefartActions
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
    { $resp=-1;
      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
        $this->cadefart = $this->getCadefartOrCreate();
        $this->updateCadefartFromRequest();
         $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
        /*Articulos::validarAlmdefart($this->cadefart,&$msj1,&$msj2);*/
        
        if (($this->getRequestParameter('cadefart[forpro]')!="" && $this->getRequestParameter('cadefart[despro]')=="") || ($this->getRequestParameter('cadefart[forpro]')=="" && $this->getRequestParameter('cadefart[despro]')!=""))
        {
           $this->coderror1=2403;    
        }else {
            $rupt=explode('-', $this->getRequestParameter('cadefart[forpro]'));
            $rupt2=explode('-', $this->getRequestParameter('cadefart[despro]'));
            if (strlen($this->getRequestParameter('cadefart[forpro]'))==strlen($this->getRequestParameter('cadefart[despro]')))
            {
                if (count($rupt)!=count($rupt2))
                {
                  $this->coderror1=2404;    
                }
            }else {
                $this->coderror1=2405;  
            }
        }
        
        $this->coderror2=-1;
        if ($this->coderror1<>-1 || $this->coderror2<>-1){
          return false;
        }else return true;
      }else return true;
      return true;
    }

  public function executeIndex()
  {
  	$c= new	Criteria();
  	$c->add(CadefartPeer::CODEMP,'001');
  	$data=CadefartPeer::doSelectOne($c);
    if ($data)
    { $id=$data->getId();
    return $this->redirect('almdefart/edit?id='.$id);
    }
    else { return $this->redirect('almdefart/edit');}
  }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->cadefart = $this->getCadefartOrCreate();
    $this->setVars();
    $this->configGrid($this->cadefart->getCodemp());

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCadefartFromRequest();

      $this->saveCadefart($this->cadefart);

      $this->cadefart->setId(Herramientas::getX_vacio('codemp','cadefart','id',$this->cadefart->getCodemp()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('almdefart/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('almdefart/list');
      }
      else
      {
        return $this->redirect('almdefart/edit?id='.$this->cadefart->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
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
  $this->cadefart = $this->getCadefartOrCreate();
  $this->updateCadefartFromRequest();
  $this->labels = $this->getLabels();

  if($this->getRequest()->getMethod() == sfRequest::POST)
  {
   if($this->coderror1!=-1)
     {
       $err = Herramientas::obtenerMensajeError($this->coderror1);
     $this->getRequest()->setError('',$err);
     }

     if($this->coderror2!=-1)
     {
       $erro = Herramientas::obtenerMensajeError($this->coderror2);
    // $this->getRequest()->setError('cadefart{corser}',$erro);
     }
  }
    return sfView::SUCCESS;
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
  protected function saveCadefart($cadefart)
  {
     $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
     Articulos::salvarAlmdefart($cadefart,$this->getRequestParameter('cadefart[corcom]'),$this->getRequestParameter('cadefart[correc2]'),$this->getRequestParameter('cadefart[correq2]'),$this->getRequestParameter('cadefart[cordes2]'),$this->getRequestParameter('cadefart[corser]'),$this->getRequestParameter('cadefart[corsol]'),$this->getRequestParameter('cadefart[corcot2]'),$this->getRequestParameter('cadefart[corent]'),$this->getRequestParameter('cadefart[corsal]'),$grid);
  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateCadefartFromRequest()
  {
    $cadefart = $this->getRequestParameter('cadefart');
    $this->setVars();
    $this->configGrid($cadefart['codemp']);

    if (isset($cadefart['codemp']))
    {
      $this->cadefart->setCodemp($cadefart['codemp']);
    }
    if (isset($cadefart['nomemp']))
    {
      $this->cadefart->setNomemp($cadefart['nomemp']);
    }
    if (isset($cadefart['diremp']))
    {
      $this->cadefart->setDiremp($cadefart['diremp']);
    }
    if (isset($cadefart['tlfemp']))
    {
      $this->cadefart->setTlfemp($cadefart['tlfemp']);
    }
    if (isset($cadefart['lonart']))
    {
      $this->cadefart->setLonart($cadefart['lonart']);
    }
    if (isset($cadefart['rupart']))
    {
      $this->cadefart->setRupart($cadefart['rupart']);
    }
    if (isset($cadefart['forart']))
    {
      $this->cadefart->setForart($cadefart['forart']);
    }
    if (isset($cadefart['desart']))
    {
      $this->cadefart->setDesart($cadefart['desart']);
    }
    if (isset($cadefart['forubi']))
    {
      $this->cadefart->setForubi($cadefart['forubi']);
    }
    if (isset($cadefart['desubi']))
    {
      $this->cadefart->setDesubi($cadefart['desubi']);
    }
  /*  if (isset($cadefart['generaop']))
    {
      $this->cadefart->setGeneraop($cadefart['generaop']);
    }
    if (isset($cadefart['generacom']))
    {
      $this->cadefart->setGeneracom($cadefart['generacom']);
    }*/
    if (isset($cadefart['asiparrec']))
    {
      $this->cadefart->setAsiparrec($cadefart['asiparrec']);
    }
    if (isset($cadefart['prcasopre']))
    {
      $this->cadefart->setPrcasopre($cadefart['prcasopre']);
    }
    if (isset($cadefart['prcreqapr']))
    {
      $this->cadefart->setPrcreqapr($cadefart['prcreqapr']);
    }
    if (isset($cadefart['comasopre']))
    {
      $this->cadefart->setComasopre($cadefart['comasopre']);
    }
    if (isset($cadefart['comreqapr']))
    {
      $this->cadefart->setComreqapr($cadefart['comreqapr']);
    }
     if (isset($cadefart['almcorre']))
    {
      $this->cadefart->setAlmcorre($cadefart['almcorre']);
    }
    if (isset($cadefart['forsnc']))
    {
      $this->cadefart->setForsnc($cadefart['forsnc']);
    }
    if (isset($cadefart['dessnc']))
    {
      $this->cadefart->setDessnc($cadefart['dessnc']);
    }
    if (isset($cadefart['reqreqapr']))
    {
      $this->cadefart->setReqreqapr($cadefart['reqreqapr']);
    }
    if (isset($cadefart['solreqapr']))
    {
      $this->cadefart->setSolreqapr($cadefart['solreqapr']);
    }
    if (isset($cadefart['gencorart']))
    {
      $this->cadefart->setGencorart($cadefart['gencorart']);
    }
    if (isset($cadefart['tipdocpre']))
    {
      $this->cadefart->setTipdocpre($cadefart['tipdocpre']);
    }
    if (isset($cadefart['cornac']))
    {
      $this->cadefart->setCornac($cadefart['cornac']);
    }
    if (isset($cadefart['corext']))
    {
      $this->cadefart->setCorext($cadefart['corext']);
    }
    if (isset($cadefart['tipodoc']))
    {
      $this->cadefart->setTipodoc($cadefart['tipodoc']);
    }
    if (isset($cadefart['codconpag']))
    {
      $this->cadefart->setCodconpag($cadefart['codconpag']);
    }
    if (isset($cadefart['codforent']))
    {
      $this->cadefart->setCodforent($cadefart['codforent']);
    }
    if (isset($cadefart['forpro']))
    {
      $this->cadefart->setForpro($cadefart['forpro']);
    }
    if (isset($cadefart['despro']))
    {
      $this->cadefart->setDespro($cadefart['despro']);
    }
    if (isset($cadefart['tipfin']))
    {
      $this->cadefart->setTipfin($cadefart['tipfin']);
    }
    if (isset($cadefart['reppreimpsc']))
    {
      $this->cadefart->setReppreimpsc($cadefart['reppreimpsc']);
    }
    if (isset($cadefart['reppreimpoc']))
    {
      $this->cadefart->setReppreimpoc($cadefart['reppreimpoc']);
    }
    if (isset($cadefart['percon']))
    {
      $this->cadefart->setPercon($cadefart['percon']);
    }
    if (isset($cadefart['faxcon']))
    {
      $this->cadefart->setFaxcon($cadefart['faxcon']);
    }
    if (isset($cadefart['emacon']))
    {
      $this->cadefart->setEmacon($cadefart['emacon']);
    }
    if (isset($cadefart['tipdoccon']))
    {
      $this->cadefart->setTipdoccon($cadefart['tipdoccon']);
    }
    if (isset($cadefart['codubi']))
    {
      $this->cadefart->setCodubi($cadefart['codubi']);
    }
    if (isset($cadefart['reccoo']))
    {
      $this->cadefart->setReccoo($cadefart['reccoo']);
    }
  }

  protected function getCadefartOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $cadefart = new Cadefart();
    }
    else
    {
      $cadefart = CadefartPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($cadefart);
    }

    return $cadefart;
  }

  public function setVars()
  {
    $c = new Criteria();
    $datos=CaregartPeer::doselect($c);
    if ($datos)
    { $this->esta='1';}
    else { $this->esta='0';}

    $c = new Criteria();
    $dato=CadefubiPeer::doselect($c);
    if ($dato)
    { $this->esta1='1';}
    else { $this->esta1='0';}

    $c = new Criteria();
    $data=CacatsncPeer::doselect($c);
    if ($data)
    { $this->esta2='1';}
    else { $this->esta2='0';}
    
    $c = new Criteria();
    $c->setLimit(1);
    $datos=CaproveePeer::doselect($c);
    if ($datos)
    { $this->esta3='1';}
    else { $this->esta3='0';}

   $this->manprocor="";
    $varemp = $this->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('compras',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['compras']))
	     if(array_key_exists('almregpro',$varemp['aplicacion']['compras']['modulos']))
	       if(array_key_exists('manprocor',$varemp['aplicacion']['compras']['modulos']['almregpro']))
	       {
	       	$this->manprocor=$varemp['aplicacion']['compras']['modulos']['almregpro']['manprocor'];
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
   if ($this->getRequestParameter('ajax')=='1')
   {
   	$output = '[["","",""]';
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $codigo=$this->getRequestParameter('codigo');
    if ($codigo!="")
    {
	    $c= new Criteria();
	    $c->add(CpdocprcPeer::TIPPRC,$codigo);
	    $result=CpdocprcPeer::doSelectOne($c);
	    if ($result)
	    {
	      $dato=$result->getNomext();
	      $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	    }
	    else
	    {
	      $javascript="alert('El código no existe...');$('cadefart_tipdocpre').value=''";
	      $dato="";
	      $output = '[["javascript","'.$javascript.'",""],["'.$cajtexmos.'","'.$dato.'",""]]';
	    }
    }

     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;
   }else    if ($this->getRequestParameter('ajax')=='2')
   {
   	$output = '[["","",""]';
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $codigo=$this->getRequestParameter('codigo');
    if ($codigo!="")
    {
	    $c= new Criteria();
	    $c->add(CpdoccomPeer::TIPCOM,$codigo);
	    $result=CpdoccomPeer::doSelectOne($c);
	    if ($result)
	    {
	      $dato=$result->getNomext();
	      $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
   }
	    else
	    {
	      $javascript="alert('El Tipo de Compromiso no existe'); $('cadefart_tipodoc').value=''; $('cadefart_tipodoc').focus();";
	      $dato="";
	      $output = '[["javascript","'.$javascript.'",""],["'.$cajtexmos.'","'.$dato.'",""]]';
  }
}

     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;
   }
   else    if ($this->getRequestParameter('ajax')=='3')
   {
    $output = '[["","",""]';
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $codigo=$this->getRequestParameter('codigo');
    if ($codigo!="")
    {
	    $c= new Criteria();
	    $c->add(CaconpagPeer::CODCONPAG,$codigo);
	    $result=CaconpagPeer::doSelectOne($c);
	    if ($result)
	    {
	      $dato=$result->getDesconpag();
	      $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	    }
	    else
	    {
	      $javascript="alert('La CondiciÃ³n de Pago no existe'); $('cadefart_codconpag').value=''; $('cadefart_codconpag').focus();";
	      $dato="";
	      $output = '[["javascript","'.$javascript.'",""],["'.$cajtexmos.'","'.$dato.'",""]]';
	    }
    }

     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;
   }
   else    if ($this->getRequestParameter('ajax')=='4')
   {
    $output = '[["","",""]';
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $codigo=$this->getRequestParameter('codigo');
    if ($codigo!="")
    {
	    $c= new Criteria();
	    $c->add(CaforentPeer::CODFORENT,$codigo);
	    $result=CaforentPeer::doSelectOne($c);
	    if ($result)
	    {
	      $dato=$result->getDesforent();
	      $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	    }
	    else
	    {
	      $javascript="alert('La Forma de Entrega no existe'); $('cadefart_codforent').value=''; $('cadefart_codforent').focus();";
	      $dato="";
	      $output = '[["javascript","'.$javascript.'",""],["'.$cajtexmos.'","'.$dato.'",""]]';
	    }
    }

     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;
   } else  if ($this->getRequestParameter('ajax')=='5')
      {
        $dato=FortipfinPeer::getDesfin($this->getRequestParameter('codigo'));
          $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
      }else if ($this->getRequestParameter('ajax')=='6')
   {
    $output = '[["","",""]';
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $codigo=$this->getRequestParameter('codigo');
    if ($codigo!="")
    {
      $c= new Criteria();
      $c->add(CpdoccomPeer::TIPCOM,$codigo);
      $result=CpdoccomPeer::doSelectOne($c);
      if ($result)
      {
        $dato=$result->getNomext();
        $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
      }
      else
      {
        $javascript="alert('El Documento no existe...');$('cadefart_tipdoccon').value=''";
        $dato="";
        $output = '[["javascript","'.$javascript.'",""],["'.$cajtexmos.'","'.$dato.'",""]]';
      }
    }

     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;
   }else if ($this->getRequestParameter('ajax')=='7')
   {
    $output = '[["","",""]';
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $codigo=$this->getRequestParameter('codigo');
    if ($codigo!="")
    {
      $c= new Criteria();
      $c->add(CadefubiPeer::CODUBI,$codigo);
      $result=CadefubiPeer::doSelectOne($c);
      if ($result)
      {
        $dato=$result->getNomubi();
        $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
      }
      else
      {
        $javascript="alert('La Ubicación no existe...');$('cadefart_codubi').value=''; $('cadefart_codubi').focus();";
        $dato="";
        $output = '[["javascript","'.$javascript.'",""],["'.$cajtexmos.'","'.$dato.'",""]]';
      }
    }

     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;
   }

  }
    public function executeAutocomplete()
    {
     if ($this->getRequestParameter('ajax')=='5')
      {
        $this->tags=Herramientas::autocompleteAjax('CODFIN','Fortipfin','codfin',$this->getRequestParameter('cadefart[tipfin]'));
      }
    }

    /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codemp)
  {
    $c = new Criteria();
    $c->add(CaartnosadaPeer::CODEMP,$codemp);
    $per = CaartnosadaPeer::doSelect($c);

     $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/almdefart/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_ubi');

     $mascaraubi=Herramientas::ObtenerFormato('Cadefart','Forubi');
     $longubi=strlen($mascaraubi);
     $this->columnas[1][0]->setHTML('type="text" size="20" maxlength="'.chr(39).$longubi.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraubi.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;} perderfocus(event,this.id,2);"');
     $this->columnas[1][0]->setCatalogo('Cadefubi','sf_admin_edit_form',array('codubi' => 1, 'nomubi' => 2),'Cadefubi_Almregart','');

     $this->obj = $this->columnas[0]->getConfig($per);

     $this->cadefart->setObj($this->obj);
  }

 /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
    public function executeAjaxgrid() {
        $name = $this->getRequestParameter('grid','a');
        $grid = $this->getRequestParameter('grid'.$name,'');
        $fila = $this->getRequestParameter('fila','');
        $col = $this->getRequestParameter('columna', '');
        $detprecom=$this->getRequestParameter('cpcompro_detprecom', '');
        $feccom = $this->getRequestParameter('cpcompro_feccom','');
        $dateFormat = new sfDateFormat('es_VE');
        $fec2 = $dateFormat->format($feccom, 'i', $dateFormat->getInputPattern('d'));
        $javascript="";  $jsonextra="";
      switch ($name) {         
        case 'a':  //Grid Ubicaciones NO SADA
          switch ($col) {
            case '1':  //Código de Ubicación
             $longitud=strlen(H::ObtenerFormato('Cadefart','Forubi'));
              if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
              {
                if ($longitud==strlen($grid[$fila][$col-1])) {
                   $w= new Criteria();
                   $w->add(CadefubiPeer::CODUBI,$grid[$fila][$col-1]);
                   $reg= CadefubiPeer::doSelectOne($w);
                   if ($reg)
                   {                    
                      $grid[$fila][$col]=$reg->getNomubi(); 
                   }else {
                      $grid[$fila][$col-1]="";
                      $grid[$fila][$col]="";
                      $javascript="alert_('La Ubicaci&oacute;n no esta Registrada');";
                   }   
                }else {
                      $grid[$fila][$col-1]="";
                      $grid[$fila][$col]="";
                     $javascript="alert_('La Ubicaci&oacute;n no es de &Uacute;ltimo Nivel');";
                }
              }else {
                   $grid[$fila][$col-1]="";
                  $grid[$fila][$col]="";
                 $javascript="alert_('La Ubicaci&oacute;n esta Repetida');";
              }
              $jsonextra = ',["javascript","' . $javascript . '",""]'.$com;
              break;   
            default:
              break;
          }
        break;
        default:
          break;
        }

      $output = Herramientas::grid_to_json($grid,$name,$jsonextra);
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
    }  
}
