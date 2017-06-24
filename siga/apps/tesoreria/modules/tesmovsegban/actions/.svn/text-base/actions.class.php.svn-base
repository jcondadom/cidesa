<?php

/**
 * tesmovsegban actions.
 *
 * @package    Roraima
 * @subpackage tesmovsegban
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class tesmovsegbanActions extends autotesmovsegbanActions
{
  public  $coderror1=-1;
  public  $coderror2=-1;

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/tsmovban/filters');

    $loguse= $this->getUser()->getAttribute('loguse');
    $filbandir = H::getConfApp2('filbandir', 'tesoreria', 'tesdefcueban');
    $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr'); 
     // 15    // pager
    $this->pager = new sfPropelPager('Tsmovban', 15);
    $c = new Criteria();
    if ($filbandir=='S'){
      $this->sql='tsdefban.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
      $c->add(TsmovbanPeer::NUMCUE,$this->sql,Criteria::CUSTOM);
      $c->addJoin(TsmovbanPeer::NUMCUE,TsdefbanPeer::NUMCUE); 
    }else if ($filsoldir=='S'){
      $this->sql='tsmovban.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
      $c->add(TsmovbanPeer::CODDIREC,$this->sql,Criteria::CUSTOM); 
    }
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
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
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->tsmovban = $this->getTsmovbanOrCreate();
      try{ $this->updateTsmovbanFromRequest();}catch(Exception $ex){}
      //if ($this->tsmovban->getId()=="")
      //{
      	if (Tesoreria::validaPeriodoCerradoBanco($this->getRequestParameter('tsmovban[fecban]'),$this->getRequestParameter('tsmovban[numcue]'))==false)
      	{
          $this->coderror1=537;
          return false;
      	}
      //}

      	$filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr'); 
	    $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
	    if ($filsoldir=='S'){
	      if ($this->getRequestParameter('tsmovban[coddirec]')==''){
	         if ($cambiareti=='S') $this->coderror2=3014; else $this->coderror2=3013;
	         return false;
	      }
	    }
      return true;
    }else return true;
  }


	/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
	{
		$this->tsmovban = $this->getTsmovbanOrCreate();
		if (!$this->tsmovban->getId()){
			$filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr');
		      if ($filsoldir=='S'){
		         $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
		         $t= new Criteria();
		         $t->add(SegdirusuPeer::LOGUSE,$loguse);
		         $t->setLimit(1);
		         $t->addAscendingOrderByColumn(SegdirusuPeer::CODDIREC);
		         $regt= SegdirusuPeer::doSelectOne($t); 
		         if ($regt){
		          if ($this->tsmovban->getCoddirec()=='')
		            $this->tsmovban->setCoddirec($regt->getCoddirec());
		         }        
		      }
		}

		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$this->updateTsmovbanFromRequest();

			$this->saveTsmovban($this->tsmovban);

			if (Herramientas::getX_vacio('numcue','Tsmovban','status',$this->tsmovban->getNumcue())=='A')
			{
				$this->setFlash('notice', 'Tus modificaciones han sido guardadas y el movimiento esta Anulado');
			}
			else
			{
				$this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');
			}

			if ($this->getRequestParameter('save_and_add'))
			{
				return $this->redirect('tesmovsegban/create');
			}
			else if ($this->getRequestParameter('save_and_list'))
			{
				return $this->redirect('tesmovsegban/list');
			}
			else
      {
        return $this->redirect('tesmovsegban/edit?id='.$this->tsmovban->getId());
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
  protected function saveTsmovban($tsmovban,$id = 'id')
	{
		if (!$this->getRequestParameter($id))
		{
		  $moneda=$tsmovban->getCodmon();
	      $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
	      if ($moneda2!=$moneda)
	          $valor=$tsmovban->getValmon();
	      else
	          $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);
	      
	       $tsmovban->setMonmov($tsmovban->getMonmov()*$valor);
	       $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
           $tsmovban->setLoguse($loguse);
		   $tsmovban->save();
		}
		else
		{
			$tsmovban->setStacon1('N');
			$moneda=$tsmovban->getCodmon();
		    $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
		    if ($moneda2!=$moneda)
		       $valor=$tsmovban->getValmon();
		    else
		       $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);
	      
	        $tsmovban->setMonmov($tsmovban->getMonmov()*$valor);
            $tsmovban->save();
			$debcre=Herramientas::getX('codtip','tstipmov','debcre',$this->tsmovban->getTipmov());
			$this->Actualiza_Bancos('A',$debcre);
		}
	}
	function  Actualiza_Bancos($accion,$debcre)
	{
		$debito=Herramientas::getX('numcue','Tsdefban','Debban',$this->tsmovban->getNumcue());
		$credito=Herramientas::getX('numcue','Tsdefban','Creban',$this->tsmovban->getNumcue());
		$montostrdeb=0;
		$montostrcre=0;
		if ($debcre=='D')
		{
			if ($accion == "A")
			{
				$montostrdeb = $debito + $this->tsmovban->getMonmov();
			}
			elseif ($accion == "E")
			{
				$montostrdeb = $debito - $this->tsmovban->getMonmov();
			}
		}
		elseif ($debcre=='C')
		{
			if ($accion == "A")
			{
				$montostrcre = $credito + $this->tsmovban->getMonmov();
			}
			elseif ($accion == "E")
			{
				$montostrcre = $credito - $this->tsmovban->getMonmov();
			}
		}
		$c = new Criteria();
		$c->add(TsdefbanPeer::NUMCUE, $this->tsmovban->getNumcue());
		$obj = TsdefbanPeer::doSelectone($c);
		if ($obj)
		{
			$obj->setDebban($montostrdeb);
			$obj->setCreban($montostrcre);
			$obj->save();
		}
	}

	public function executeAnular()
	{
		$obj1=$this->getRequestParameter('obj1');
                $obj2=$this->getRequestParameter('refban');
                $obj3=$this->getRequestParameter('fecban');
                $obj4=$this->getRequestParameter('tipmov');

                $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                $fec = $dateFormat->format($obj3, 'i', $dateFormat->getInputPattern('d'));

		$c = new Criteria();
		$c->add(TsmovbanPeer::NUMCUE,$obj1);
                $c->add(TsmovbanPeer::REFBAN,$obj2);
                $c->add(TsmovbanPeer::FECBAN,$fec);
                $c->add(TsmovbanPeer::TIPMOV,$obj4);
		$this->tsmovban = TsmovbanPeer::doSelectOne($c);
		sfView::SUCCESS;

	}

	public function executeSalvaranu()
	{
            $this->msgpercer="";
            $mes = substr($this->getRequestParameter('fecban'),5,2);
            $ano = substr($this->getRequestParameter('fecban'),0,4);
            if (Tesoreria::el_Banco_Esta_Cerrado($this->getRequestParameter('numcue'),$mes,$ano))
            {
              $this->msgpercer="El Movimiento no puede ser Eliminado ya que el periodo se encuentra cerrado.";
            }
            else
            {
		$c = new Criteria();
		$c->add(TsmovbanPeer::NUMCUE,$this->getRequestParameter('numcue'));
                $c->add(TsmovbanPeer::REFBAN,$this->getRequestParameter('refban'));
                $c->add(TsmovbanPeer::FECBAN,$this->getRequestParameter('fecban'));
		$tsmovban = TsmovbanPeer::doSelectOne($c);
		if ($tsmovban)
		{
                    if ($tsmovban->getStacon()!='C') {
			if ($tsmovban->getStatus()=='C')
			{
				$tsmovban->setStatus('A');
				$tsmovban->save();
			}
		}
                    else {
                       $this->msgpercer="El Movimiento está Conciliado.";
	}
		}
            }
         return sfView::SUCCESS;
	}



	/**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateTsmovbanFromRequest()
	{
		$tsmovban = $this->getRequestParameter('tsmovban');

		if (isset($tsmovban['numcue']))
		{
			$this->tsmovban->setNumcue($tsmovban['numcue']);
		}
		if (isset($tsmovban['nombanco']))
		{
			$this->tsmovban->setNombanco($tsmovban['nombanco']);
		}
		if (isset($tsmovban['codcta']))
        {
           $this->tsmovban->setCodcta($tsmovban['codcta']);
        }
		if (isset($tsmovban['refban']))
		{
			$this->tsmovban->setRefban($tsmovban['refban']);
		}
		if (isset($tsmovban['tipmov']))
		{
			$this->tsmovban->setTipmov($tsmovban['tipmov']);
		}
		if (isset($tsmovban['nommovim']))
		{
			$this->tsmovban->setNommovim($tsmovban['nommovim']);
		}
		if (isset($tsmovban['fecban']))
		{
			if ($tsmovban['fecban'])
			{
				try
				{
					$dateFormat = new sfDateFormat($this->getUser()->getCulture());
					if (!is_array($tsmovban['fecban']))
					{
						$value = $dateFormat->format($tsmovban['fecban'], 'i', $dateFormat->getInputPattern('d'));
					}
					else
					{
						$value_array = $tsmovban['fecban'];
						$value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
					}
					$this->tsmovban->setFecban($value);
				}
				catch (sfException $e)
				{
					// not a date
				}
			}
			else
			{
				$this->tsmovban->setFecban(null);
			}
		}
		if (isset($tsmovban['desban']))
		{
			$this->tsmovban->setDesban($tsmovban['desban']);
		}
		if (isset($tsmovban['monmov']))
		{
			$this->tsmovban->setMonmov($tsmovban['monmov']);
		}
		if (isset($tsmovban['codmon']))
	    {
	      $this->tsmovban->setCodmon($tsmovban['codmon']);
	    }
	    if (isset($tsmovban['valmon']))
	    {
	      $this->tsmovban->setValmon($tsmovban['valmon']);
	    }
		$this->tsmovban->setStatus('C');
		$this->tsmovban->setStacon('N');
		if (isset($tsmovban['coddirec']))
	    {
	      $this->tsmovban->setCoddirec($tsmovban['coddirec']);
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
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
	 $cajtexcom=$this->getRequestParameter('cajtexcom');
	 if ($this->getRequestParameter('ajax')=='1')
	 {
        $filbandir = H::getConfApp2('filbandir', 'tesoreria', 'tesdefcueban');        
        $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
        $codigo=$this->getRequestParameter('codigo'); $dato=$js="";
        $p= new Criteria();
        if ($filbandir=='S'){
            $sql='tsdefban.numcue=\''.$codigo.'\' and tsdefban.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
            $p->add(TsdefbanPeer::NUMCUE, $sql, Criteria :: CUSTOM);
        }else $p->add(TsdefbanPeer::NUMCUE,$codigo);
        $resul= TsdefbanPeer::doSelectOne($p);
        if ($resul){
          $dato=$resul->getNomcue();
        }else $js="alert('El Cuenta Bancaria no existe'); $('tsmovban_numcue').value=''; $('tsmovban_nomcue').value=''; $('tsmovban_numcue').focus();";
	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
	 }
	 else  if ($this->getRequestParameter('ajax')=='2')
	 {
	 	$dato=TstipmovPeer::getDestip($this->getRequestParameter('codigo'));
	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	 }elseif ($this->getRequestParameter('ajax')=='3'){
      $dato="";
      $js="";
      if ($this->getRequestParameter('nuevo')=='')
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
          $js="$('tsmovban_codmon').value='".$this->getRequestParameter('moneref')."'";   
          $dato=$this->getRequestParameter('valmone');
      }
      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
    }elseif ($this->getRequestParameter('ajax')=='4'){
       $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
        $filsoldir2=H::getConfApp2('filsoldir', 'compras', 'almsolegr'); 
        $codigo=$this->getRequestParameter('codigo'); $js="";

      $q= new Criteria();
      if ($filsoldir2=='S'){
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
		if ($this->getRequestParameter('ajax')=='1')
		{
			$this->tags=Herramientas::autocompleteAjax('numcue','tsdefban','numcue',$this->getRequestParameter('tsmovban[numcue]'));
		}
		if ($this->getRequestParameter('ajax')=='2')
		{
			$this->tags=Herramientas::autocompleteAjax('CodTip','TsTipMov','CodTip',$this->getRequestParameter('tsmovban[tipmov]'));
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
    $this->tsmovban = $this->getTsmovbanOrCreate();
    try{ $this->updateTsmovbanFromRequest();}catch(Exception $ex){}


    $this->labels = $this->getLabels();


    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror1!=-1)
      {
       $err = Herramientas::obtenerMensajeError($this->coderror1);
       $this->getRequest()->setError('tsmovban{fecban}',$err);
      }
      elseif($this->coderror2!=-1)
      {
       $err = Herramientas::obtenerMensajeError($this->coderror2);
       $this->getRequest()->setError('',$err);
      }
    }

    return sfView::SUCCESS;
  }

  public function executeDelete()
  {
    $this->tsmovban = TsmovbanPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->tsmovban);

    try
    {
      $mes = substr($this->tsmovban->getFecban(),5,2);
      $ano = substr($this->tsmovban->getFecban(),0,4);
      if (Tesoreria::el_Banco_Esta_Cerrado($this->tsmovban->getNumcue(),$mes,$ano))
      {
        $this->getRequest()->setError('delete', 'El Movimiento no puede ser Eliminado ya que el periodo se encuentra cerrado.');
        return $this->forward('tesmovsegban', 'list');
      }else {
          if ($this->tsmovban->getStacon()!='C')
          {
             $this->deleteTsmovban($this->tsmovban);
             $this->Bitacora('Elimino');
          }else {
             $this->getRequest()->setError('delete', 'El Movimiento está Conciliado.');
        return $this->forward('tesmovsegban', 'list');
}
      }
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'No se pudo borrar la registro seleccionado. Asegúrese de que no tiene ningún tipo de registros asociados.');
      return $this->forward('tesmovsegban', 'list');
    }

    return $this->redirect('tesmovsegban/list');
  }

  public function getLabels()
  {
    $labels = parent::getLabels();
   
    $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
    if ($cambiareti=='S')
      $labels['tsmovban{coddirec}'] = 'Estado';
    return $labels;
  }
}
