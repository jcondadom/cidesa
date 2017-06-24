<?php

/**
 * confincom actions.
 *
 * @package    Roraima
 * @subpackage confincom
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 37178 2010-03-18 20:32:40Z cramirez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class confincomActions extends autoconfincomActions
{

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
  	$err = Contabilidad::verificarCierre();
	if ($err!=-1) {
		$err = Herramientas::obtenerMensajeError($err);
       	$this->getRequest()->setError('',$err);
	}
    $this->configGrid();
    $this->setVars();
    if (!$this->contabc->getId())
    {
        $this->getUser()->getAttributeHolder()->remove('grabocomp','confincom');

        $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr');
        if ($filsoldir=='S'){
           $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
           $t= new Criteria();
           $t->add(SegdirusuPeer::LOGUSE,$loguse);
           $t->setLimit(1);
           $t->addAscendingOrderByColumn(SegdirusuPeer::CODDIREC);
           $regt= SegdirusuPeer::doSelectOne($t); 
           if ($regt){
            if ($this->contabc->getCoddirec()=='')
              $this->contabc->setCoddirec($regt->getCoddirec());
           }          
        }      
    }
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
  	if ($this->contabc->getId()!='')
  	{
  	  $c = new Criteria();
      $c->add(Contabc1Peer::NUMCOM,$this->contabc->getNumcom());
      $c->add(Contabc1Peer::FECCOM,$this->contabc->getFeccom());
      $c->addDescendingOrderByColumn(Contabc1Peer::DEBCRE);
      $c->addAscendingOrderByColumn(Contabc1Peer::NUMCOM);
      $c->addAscendingOrderByColumn(Contabc1Peer::DEBCRE);
      $c->addAscendingOrderByColumn(Contabc1Peer::NUMASI);
      $reg = Contabc1Peer::doSelect($c);
  	} 
      $mascara = Herramientas::ObtenerFormato('Contaba','Forcta');
      $loncta=strlen($mascara);

     $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/confincom/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_contabc1');
     $this->columnas[1][0]->setHTML('type="text" size="32" maxlength="'.chr(39).$loncta.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;} perderfocus(event,this.id,3);" onBlur="toAjax(\'2\',getUrlModulo()+\'ajax\',this.value,\'\',\'&idcaja=\'+this.id);"');
     $eti=H::getConfApp2('etiqueta', 'contabilidad', 'confincom');
     if ($eti!="")
         $this->columnas[1][1]->setTitulo($eti);
     
     $mancencos=H::getConfApp2('mancencos', 'contabilidad', 'confincom');
     if ($mancencos=='S')
     {
         $this->columnas[1][6]->setOculta(false);
         $this->columnas[1][7]->setOculta(false);
         $this->columnas[1][8]->setOculta(false);
     }
     $this->obj =$this->columnas[0]->getConfig($reg);

    $this->params =array('grid'=>$this->obj);
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
    $ajax = $this->getRequestParameter('ajax','');
    $cajtextmos = $this->getRequestParameter('cajtxtmos','');
    $javascript=""; $dato="";

    switch ($ajax){
      case '1':      	  
      	$numcom=$codigo;
      	$feccom = $this->getRequestParameter('feccom','');
      	$status = $this->getRequestParameter('status','');
      	$dateFormat = new sfDateFormat('es_VE');
    	$fecha = $dateFormat->format($feccom, 'i', $dateFormat->getInputPattern('d'));
    	$mesj = $status=='A' ? 'ACTUALIZADO' : ($status=='D' ? 'DIFERIDO' : '') ;
    	$mesj2 = $status=='A' ? 'DIFERIDO' : ($status=='D' ? 'ANULADO' : '') ;
    	$js="alert('El Estatus de Comprobante es $mesj y se cambiara su estatus a $mesj2');";

      $error=Contabilidad::validarCuentasCargables($numcom);
      if ($error==-1) {
      	$c = new Criteria();
        $c->add(Contaba1Peer::FECDES,$fecha,Criteria::LESS_EQUAL);
      	$c->add(Contaba1Peer::FECHAS,$fecha,Criteria::GREATER_EQUAL);
      	$per = Contaba1Peer::doSelectOne($c);
      	if($per)
      		if($per->getStatus()=='A')
      		{
      			$status=='A' ? $stacom='D' : $stacom='N';    			
      			$c = new Criteria();
        			$c->add(ContabcPeer::NUMCOM,$numcom);
        			$c->add(ContabcPeer::FECCOM,$fecha);
        			$objper = ContabcPeer::doSelectOne($c);
        			if($objper)
        			{
        				$objper->setStacom($stacom);
        				$objper->save();
        				
        				$js.="alert('Se ha Realizado la operación con Exito.........');";
        			}      				
        			else
        				$js.="alert('No se pudo realizar la operacion del Comprobante');";
      		}    		
      		else
      			$js.="alert('El Periodo se Encuentra Cerrado no se puede realizar la operación');";
      	
      	else
      		$js.="alert('Comprobante fuera del Periodo Fiscal');";
      }else {
        $msj=Herramientas::obtenerMensajeError($error);
        $js="alert('$msj');";
      }
      	$js.="window.location.reload();";
        $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;      
      case '2':
        $idcaja = $this->getRequestParameter('idcaja','');
        $auxid= split("_", $idcaja);

        $c = new Criteria();
        $c->add(ContabbPeer::CODCTA,$codigo);
        $per = ContabbPeer::doSelectOne($c);
        if($per)
        {
           if ($per->getCargab()=='C')
           {
             $dato=$per->getDescta();
           }else {
               $javascript="alert('La Cuenta Contable no es Cargable'); $('$idcaja').value=''; $('$idcaja').focus();";
           }
        }else {
          $javascript="alert('La Cuenta Contable no existe'); $('$idcaja').value=''; $('$idcaja').focus();";
        }

        $output = '[["'.$auxid[0].'_'.$auxid[1].'_2","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
       break;
      case '3':
        $idcaja = $this->getRequestParameter('ides','');
        $javascript="actualizarDiferencia('$idcaja');";
        $output = '[["javascript","'.$javascript.'",""]]';
       break;
      case '4':
        $iddes = $this->getRequestParameter('ides','');
        $r= new Criteria();
          $r->add(CodefcencosPeer::CODCENCOS,$codigo);
          $reg = CodefcencosPeer::doSelectOne($r);
          if ($reg)
          {
              $dato=$reg->getDescencos();
              $javascript="validarrepetido('$iddes');";
          }else {
             $javascript="alert('El Centro de Costo no existe'); $('$iddes').value=''; $('$iddes').focus();";
          }

         $output = '[["'.$cajtextmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
       break;   
    case '5':
          $cajtextmos = $this->getRequestParameter('cajtexmos','');
          $r= new Criteria();
          $r->add(CotiptraPeer::CODTIPTRA,$codigo);
          $reg = CotiptraPeer::doSelectOne($r);
          if ($reg)
          {
              $dato=$reg->getDestiptra();
          }else {
             $javascript="alert('El Tipo de Transacci&oacute;n no existe'); $('contabc_codtiptra').value=''; $('contabc_destiptra').value=''; $('contabc_codtiptra').focus();";
          }          
          $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
       break;    
    case '6':
          $cajtextmos = $this->getRequestParameter('cajtexmos','');
          $dato=""; $javascript="";
          $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
          $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr');
          $q= new Criteria();
          if ($filsoldir=='S'){
            $sql='cadefdirec.coddirec=\''.$codigo.'\' and cadefdirec.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
            $q->add(CadefdirecPeer::CODDIREC,$sql,Criteria::CUSTOM); 
          }else $q->add(CadefdirecPeer::CODDIREC,$codigo);
          $reg= CadefdirecPeer::doSelectOne($q);
          if ($reg)
          {
             $dato=$reg->getDesdirec();                    
          }else {
             $javascript="alert_('La Direcci&oacute;n no existe'); $('contabc_coddirec').value=''; $('contabc_desdirec').value=''; $('contabc_coddirec').focus();";
          }

         $output = '[["'.$cajtextmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
       break;          
      case '7':
           $js=""; $dato="";
           $cajtexmos=$this->getRequestParameter('cajtexmos');
           if  ($this->getRequestParameter('nuevo')=='')
           {
            $q= new Criteria();
            $q->add(TsdesmonPeer::CODMON,$this->getRequestParameter('codigo'));
            $q->addDescendingOrderByColumn(TsdesmonPeer::FECMON);
            $reg= TsdesmonPeer::doSelectOne($q);
            if ($reg)
            {
               $dato=number_format($reg->getValmon(),6,',','.');
            }
           }else {
              $js="$('contabc_codmon').value='".$this->getRequestParameter('variable')."'";   
              $dato=$this->getRequestParameter('valmone');
           }
            $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
       break;      
      default:
      	$js="";
        $valcomapr=H::getConfApp2('valcomapr', 'contabilidad', 'confincom');
        $valcomcencos=H::getConfApp2('valcomcencos', 'contabilidad', 'confincom');
      	$status = $this->getRequestParameter('status','');
      	$numcom = $this->getRequestParameter('contabc[numcom]','');
      	$feccom = $this->getRequestParameter('contabc[feccom]','');
        $staapr = $this->getRequestParameter('contabc[staapr]','');
      	$dateFormat = new sfDateFormat('es_VE');
    	  $fecha = $dateFormat->format($feccom, 'i', $dateFormat->getInputPattern('d'));
        $q= new Criteria();
        $q->add(ContabaPeer::CODEMP,'001');
        $resul=ContabaPeer::doSelectOne($q);
        if ($resul)    
          $etadef=$resul->getEtadef();
        else $etadef="";
        if ($etadef=='A'){
          $js="alert('No se puede Actualizar, La Etapa de Definición esta Abierta');";
        }
        elseif (Tesoreria::validaPeriodoCerrado($feccom)==true)
        {
            $js="alert('La Fecha no se encuentra de un Perido Contable Abierto.');";
        }else {
          $fecini=H::getX_vacio('CODEMP','Contaba','fecini','001');
            if (date('Y',strtotime($fecini))!=date('Y',strtotime($fecha)))
            {
                $js="alert('El Año del Comprobante no pertenece al ejercicio actual');";
            }else {
        
        if ((H::toFloat($this->getRequestParameter('contabc[totdeb]'))==H::toFloat($this->getRequestParameter('contabc[totcre]'))) && (H::toFloat($this->getRequestParameter('contabc[totdeb]'))!=0 && H::toFloat($this->getRequestParameter('contabc[totcre]'))!=0))
        {
          if ($valcomapr=='S' && $staapr=='N'){
             $js="alert('No se puede Actualizar, Comprobante no esta Aprobado');";
          }else if ($valcomcencos=='S' && H::getX_vacio('NUMCOM','Codetcencos','NUMCOM',$numcom)==''){
            $js="alert('No se puede Actualizar, Comprobante no tiene Asociado Centro de Costo');";
          }else {
            $error=Contabilidad::validarCuentasCargables($numcom);
            if ($error==-1) {
            	$c = new Criteria();
            	$c->add(Contaba1Peer::FECDES,$fecha,Criteria::LESS_EQUAL);
            	$c->add(Contaba1Peer::FECHAS,$fecha,Criteria::GREATER_EQUAL);
            	$per = Contaba1Peer::doSelectOne($c);
            	if($per)
              		if($status=='D' && $per->getStatus()=='A')
              		{
              			$c = new Criteria();
              			$c->add(ContabcPeer::NUMCOM,$numcom);
              			$c->add(ContabcPeer::FECCOM,$fecha);
              			$objper = ContabcPeer::doSelectOne($c);
              			
              			if($objper)
              			{
              				$objper->setStacom('A');
              				$objper->save();
              				$js="alert('Comprobante Actualizado.............');";
              			}      				
              			else
              				$js="alert('No se pudo Actualizar el Comprobante');";
              			
              		}elseif($status!='D')
              		    	$js="alert('No se puede Actualizar, Comprobante no Diferido');";
              		    else
              		    	$js="alert('No se puede Actualizar, Periodo Cerrado');";     		    
              	else	
                	$js="alert('Comprobante fuera del Periodo Fiscal');";
              }else {
                 $msj=Herramientas::obtenerMensajeError($error);
                 $js="alert('No se puede Actualizar, $msj');";
              }
          }
          }else {
              $js="alert('No se puede Actualizar, Comprobante Descuadrado');";
          }
            }
        }
        	
        $js.="window.location.reload();";
        $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::HEADER_ONLY;
  }

  /*/**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxfila()
  {
    $name = $this->getRequestParameter('grid','a');
    $grid = $this->getRequestParameter('grid'.$name,'');

    $fila = $this->getRequestParameter('fila','');

    $codcta = $grid[$fila][1];
    //$monimp = $grid[$fila][2];

    $c = new Criteria();
    $c->add(Contabc1Peer::CODCTA,$codcta);
    $reg = Contabc1Peer::doSelectOne($c);

    if(!$reg) {
      $grid[$fila][5] = H::FormatoMonto($grid[$fila][5]);
      // enviar mensaje
    }else {
      if($reg[0][3]=='D') {
      	$grid[$fila][5]=H::FormatoMonto('');
        //$mondis = H::Monto_disponible($codpre);
      }else {
        if($reg[0][3]=='C') {
          $grid[$fila][4]=H::FormatoMonto('');
        }
      }
    }

    $output = Herramientas::grid_to_json($grid,$name);

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::HEADER_ONLY;

  }

  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
	public function validateEdit() {
		$this->coderr =-1;

		if($this->getRequest()->getMethod() == sfRequest::POST) {
			$this->coderr = Contabilidad::verificarCierre();
			if ($this->coderr==-1) {
				
			      $this->contabc = $this->getContabcOrCreate();
			      $this->updateContabcFromRequest();
			      $this->configGrid();
			      $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
			      
			      if($this->contabc->getId()=='')
			      {
			      	  //validar q el numcom no exista en CONTABC
				      $c= new Criteria();
				      $c->add(ContabcPeer::NUMCOM,$this->getRequestParameter('contabc[numcom]'));
				      $datos = ContabcPeer::doSelectOne($c);
				      if ($datos)
				      {
				 		$this->coderr=196;
				        return false;
				      }	
			      }
			
			      if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('contabc[feccom]'))==true)
			      {
			        $this->coderr=529;
			        return false;
			      }
			
			      if ($this->getRequestParameter('contabc[totdeb]')!=$this->getRequestParameter('contabc[totcre]'))
			      {
			      	$this->coderr=519;
			      	return false;
			      }
			
			      if ($this->getRequestParameter('contabc[totdeb]')=='0,00' || $this->getRequestParameter('contabc[totcre]')=='0,00')
			      {
			      	$this->coderr=536;
			      	return false;
			      }			
			      			      
			      if (count($grid[0])==0)
			      {
			        $this->coderr=520;
			        return false;
			      }
			      else
			      {
			      	if($grid[0][0]->getCodcta()=='')
			      	{
			      		$this->coderr=550;
			      		return false;
			      	}
			        if(floatval($grid[0][0]->getMondebito())==0 && floatval($grid[0][0]->getMoncredito())==0)
			      	{
			      		$this->coderr=551;
			      		return false;
			      	}
			        if(floatval($grid[0][0]->getMondebito())>0 && floatval($grid[0][0]->getMoncredito())>0)
			      	{
			      		$this->coderr=551;
			      		return false;
			      	}
			      	if (!Tesoreria::validarComprobanteDescuadrado($grid))
			      	{
			      	  $this->coderr=519;
			      	  return false;
			      	}
			        $this->coderr=Tesoreria::validarCuentasGrid($grid,$this->getRequestParameter('contabc[feccom]'));
			      	if ($this->coderr!=-1)
              {
			      	  return false;
			      	}
			      }			
			      return true;

			}
      		if($this->coderr!=-1) {
	    		return false;
	  		} else return true;

     	} else return true;
	}

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    $this->configGrid();
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    $this->configGrid($grid[0],$grid[1]);
  }

  public function setVars() {
	$contaba = ContabaPeer::doSelectOne(new Criteria());

	$this->params[0] = $contaba->getForcta();
	$this->params[1] = strlen($contaba->getForcta());
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
  	$grid = Herramientas::CargarDatosGridv2($this,$this->obj);  	
        if ($clasemodelo->getNumcom()=='########'){
           $numcom = Comprobante::Buscar_Correlativo($clasemodelo->getFeccom());
           $clasemodelo->setNumcom($numcom);
        }
        $this->getUser()->setAttribute('grabocomp', 'S','confincom');
    return Comprobante::salvarConfincomnew($clasemodelo,$grid);
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
  	/*$this->coderr = Comprobante::validarEliminarConfincom($clasemodelo);
  	if ($this->coderr!=-1) {
  		 return Comprobante::eliminarConfincom($clasemodelo);
  	}
  	else {
  		$err = Herramientas::obtenerMensajeError($err);
         	$this->getRequest()->setError('',$err);
  	}*/
    $q= new Criteria();
    $q->add(ContabaPeer::CODEMP,'001');
    $resul=ContabaPeer::doSelectOne($q);
    if ($resul)    
      $etadef=$resul->getEtadef();
    else $etadef="";
    if ($etadef=='A'){
      return 620;
    }

    $numcom=$clasemodelo->getNumcom();
    $feccom = $clasemodelo->getFeccom();
    $status = $clasemodelo->getStacom();
    $fecha = $feccom;
    $mesj = $status=='A' ? 'ACTUALIZADO' : ($status=='D' ? 'DIFERIDO' : '') ;
    $mesj2 = $status=='A' ? 'DIFERIDO' : ($status=='D' ? 'ANULADO' : '') ;
    $c = new Criteria();
    $c->add(Contaba1Peer::FECDES,$fecha,Criteria::LESS_EQUAL);
    $c->add(Contaba1Peer::FECHAS,$fecha,Criteria::GREATER_EQUAL);
    $per = Contaba1Peer::doSelectOne($c);
    if($per) 
      if($per->getStatus()=='A')
      {
        $status=='A' ? $stacom='D' : $stacom='N'; 
        if ($stacom=='N' && $clasemodelo->getTipcom()!='CON') 
          return 644;
        else {       
          $c = new Criteria();
          $c->add(ContabcPeer::NUMCOM,$numcom);
          $c->add(ContabcPeer::FECCOM,$fecha);
          $objper = ContabcPeer::doSelectOne($c);
          if($objper)
          {
            $objper->setStacom($stacom);
            $objper->save();
            
            return -1;
          }             
          else
            return 641; //"No se pudo realizar la operacion del Comprobante";
        }
      }       
      else
        return 642; //"El Periodo se Encuentra Cerrado no se puede realizar la operación";
    
    else
      return 643; //"Comprobante fuera del Periodo Fiscal";

  }

  /*protected function deleteContabc($contabc)
  {
    try {

      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio, ej:
      // $coderr = Compras::salvarAlmaujoc($caajuoc,$grid);

      // OJO ----> Eliminar esta linea al modificar este método
      $this->coderr = $this->deleting($contabc);

      if(is_array($this->coderr)){
        foreach ($this->coderr as $ERR){
          $err = Herramientas::obtenerMensajeError($ERR);
          $this->getRequest()->setError('delete',$err);
          $this->updateError();
        }
      }elseif($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        $this->getRequest()->setError('delete',$err);
        $this->updateError();
      }

      //return -1;

    } catch (Exception $ex) {
      $this->coderr = 6;
      $err = Herramientas::obtenerMensajeError($this->coderr);
      $this->getRequest()->setError('delete',$err);
      $this->updateError();
    }

  }*/
  
/**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();
    
    $this->listing();
    
    $this->getUser()->getAttributeHolder()->remove('grabocomp','confincom');

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/contabc/filters');

    $loguse= $this->getUser()->getAttribute('loguse');
    $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr'); 

     // 15    // pager
    $this->pager = new sfPropelPager('Contabc', 15);
    $c = new Criteria();
    if ($filsoldir=='S'){
      $this->sql='contabc.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
      $c->add(ContabcPeer::CODDIREC,$this->sql,Criteria::CUSTOM); 
    }
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
}

 /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxdelete()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtextmos = $this->getRequestParameter('cajtxtmos','');
    $javascript=""; $dato="";

    switch ($ajax){
      case '1':         
        $numcom=$codigo;
        $feccom = $this->getRequestParameter('feccom','');
        $status = $this->getRequestParameter('status','');
        $dateFormat = new sfDateFormat('es_VE');
        $fecha = $dateFormat->format($feccom, 'i', $dateFormat->getInputPattern('d'));
        $mesj = $status=='A' ? 'ACTUALIZADO' : ($status=='D' ? 'DIFERIDO' : '') ;
        $mesj2 = $status=='A' ? 'DIFERIDO' : ($status=='D' ? 'ANULADO' : '') ;
        $js="alert('El Estatus de Comprobante es $mesj y se cambiara su estatus a $mesj2');";

        $c = new Criteria();
        $c->add(Contaba1Peer::FECDES,$fecha,Criteria::LESS_EQUAL);
        $c->add(Contaba1Peer::FECHAS,$fecha,Criteria::GREATER_EQUAL);
        $per = Contaba1Peer::doSelectOne($c);
        if($per)
          if($per->getStatus()=='A')
          {
            $status=='A' ? $stacom='D' : $stacom='N';         
            $c = new Criteria();
              $c->add(ContabcPeer::NUMCOM,$numcom);
              $c->add(ContabcPeer::FECCOM,$fecha);
              $objper = ContabcPeer::doSelectOne($c);
              if($objper)
              {
                $objper->setStacom($stacom);
                $objper->save();
                
                $js.="alert('Se ha Realizado la operación con Exito.........');";
              }             
              else
                $js.="alert('No se pudo realizar la operacion del Comprobante');";
          }       
          else
            $js.="alert('El Periodo se Encuentra Cerrado no se puede realizar la operación');";
        
        else
          $js.="alert('Comprobante fuera del Periodo Fiscal');";
          $js.="window.location.reload();";
          $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
          break;      
    }
     

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::SUCCESS;
  }

public function getLabels()
  {
    $labels = parent::getLabels();
 
    $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
    if ($cambiareti=='S')
      $labels['contabc{coddirec}'] = 'Estado';
    return $labels;
  }   

}
