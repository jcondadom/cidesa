<?php

/**
 * tesdeftipmov actions.
 *
 * @package    Roraima
 * @subpackage tesdeftipmov
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class tesdeftipmovActions extends autotesdeftipmovActions
{
  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->tstipmov = $this->getTstipmovOrCreate();
    $this->setVars();
    if ($this->mancorrel=='S'){
          if (!$this->tstipmov->getId()) {

           $t= new Criteria();
           $t->setLimit(1);
           $t->addDescendingOrderByColumn(TstipmovPeer::CODTIP);
           $reg= TstipmovPeer::doSelectOne($t);
           if ($reg)
           {
               $this->tstipmov->setCodtip(str_pad(($reg->getCodtip()+1),4,'0',STR_PAD_LEFT));
           }else $this->tstipmov->setCodtip('0001');
         }
    }


    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateTstipmovFromRequest();

      $this->saveTstipmov($this->tstipmov);

      $this->tstipmov->setId(Herramientas::getX_vacio('codtip','tstipmov','id',$this->tstipmov->getCodtip()));

      $this->setFlash('notice', 'Your modifications have been saved');

      $this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('tesdeftipmov/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('tesdeftipmov/list');
      }
      else
      {
        return $this->redirect('tesdeftipmov/edit?id='.$this->tstipmov->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
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
	 $javascript=""; $dato="";
	  if ($this->getRequestParameter('ajax')=='1')
	    {
			$a= new Criteria();
			$a->add(ContabbPeer::CODCTA,$this->getRequestParameter('codigo'));
			$reg= ContabbPeer::doSelectOne($a);
			if ($reg)
			{
				if ($reg->getCargab()=='S')
				{
					$dato=$reg->getDescta();
				}else{
                   $javascript="alert('Cuenta Contable no es Cargable'); $('tstipmov_codcon').value=''; $('tstipmov_codcon').focus();";
				}
			}else{
				$javascript="alert('Cuenta Contable no existe'); $('tstipmov_codcon').value=''; $('tstipmov_codcon').focus();";
			}

            $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
	    }else if ($this->getRequestParameter('ajax')=='2')
      {
        $a= new Criteria();
        $a->add(CotiptraPeer::CODTIPTRA,$this->getRequestParameter('codigo'));
        $reg= CotiptraPeer::doSelectOne($a);
        if ($reg)
        {
          $dato=$reg->getDestiptra();        
        }else{
          $javascript="alert_('El Tipo de Transacci&oacute;n no existe'); $('tstipmov_codtiptra').value=''; $('tstipmov_codtiptra').focus();";
        }
       $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
      }

  	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	    return sfView::HEADER_ONLY;
	}

  	public function setVars()
	{
	  $this->mascaracontabilidad = Herramientas::ObtenerFormato('Contaba','Forcta');
	  $this->loncta=strlen($this->mascaracontabilidad);
            $this->mancorrel="";
            $varemp = $this->getUser()->getAttribute('configemp');
            if ($varemp)
            if(array_key_exists('aplicacion',$varemp))
             if(array_key_exists('tesoreria',$varemp['aplicacion']))
               if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
                 if(array_key_exists('tesdeftipmov',$varemp['aplicacion']['tesoreria']['modulos'])){
                   if(array_key_exists('mancorrel',$varemp['aplicacion']['tesoreria']['modulos']['tesdeftipmov']))
                   {
                    $this->mancorrel=$varemp['aplicacion']['tesoreria']['modulos']['tesdeftipmov']['mancorrel'];
                   }
                 }
	}

	 protected function updateTstipmovFromRequest()
  {
    $tstipmov = $this->getRequestParameter('tstipmov');
    $this->setVars();

    if (isset($tstipmov['codtip']))
    {
      $this->tstipmov->setCodtip($tstipmov['codtip']);
    }
    if (isset($tstipmov['destip']))
    {
      $this->tstipmov->setDestip($tstipmov['destip']);
    }
    if (isset($tstipmov['debcre']))
    {
      $this->tstipmov->setDebcre($tstipmov['debcre']);
    }
    if (isset($tstipmov['desdebcre']))
    {
      $this->tstipmov->setDesdebcre($tstipmov['desdebcre']);
    }
    $this->tstipmov->setEscheque(isset($tstipmov['escheque']) ? $tstipmov['escheque'] : 0);
    if (isset($tstipmov['codcon']))
    {
      $this->tstipmov->setCodcon($tstipmov['codcon']);
    }
    $this->tstipmov->setPagnom(isset($tstipmov['pagnom']) ? $tstipmov['pagnom'] : 0);
    if (isset($tstipmov['codtiptra']))
    {
      $this->tstipmov->setCodtiptra($tstipmov['codtiptra']);
    }
    if (isset($tstipmov['estran']))
    {
      $this->tstipmov->setEstran($tstipmov['estran']);
    }
    if (isset($tstipmov['carban']))
    {
      $this->tstipmov->setCarban($tstipmov['carban']);
    }
    if (isset($tstipmov['esrein']))
    {
      $this->tstipmov->setEsrein($tstipmov['esrein']);
    }
  }

  protected function saveTstipmov($tstipmov)
  {
   if (!$tstipmov->getId()){  $tstipmov->save();}
   else {
   	if ($tstipmov->getTiedatrel()=='S')
   	{
      $c= new Criteria();
      $c->add(TstipmovPeer::CODTIP,$tstipmov->getCodtip());
      $reg= TstipmovPeer::doSelectOne($c);
      if ($reg)
      {
      	$reg->setCodcon($tstipmov->getCodcon());
        $reg->setPagnom($tstipmov->getPagnom());
        $reg->setCodtiptra($tstipmov->getCodtiptra());
        $reg->setEstran($tstipmov->getEstran());
        $reg->setCarban($tstipmov->getCarban());
        $reg->setEsrein($tstipmov->getEsrein());
      	$reg->save();
      }
   	}else $tstipmov->save();
   }

  }

    public function executeDelete()
  {
    $this->tstipmov = TstipmovPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->tstipmov);

    try
    {
       $tiene = H::getX_vacio('Tipmov','Tsmovlib','Tipmov',$this->tstipmov->getCodtip());
       $tiene2 = H::getX_vacio('Tipmov','Tsmovban','Tipmov',$this->tstipmov->getCodtip());
      if ($tiene=='' && $tiene2=='') {
        $this->deleteTstipmov($this->tstipmov);
        $this->Bitacora('Elimino');
      }else{
        $this->getRequest()->setError('delete', 'No se pudo borrar la registro seleccionado. Asegúrese de que no tiene ningún tipo de registros asociados.');
        return $this->forward('tesdeftipmov', 'list');
      }
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'No se pudo borrar la registro seleccionado. Asegúrese de que no tiene ningún tipo de registros asociados.');
      return $this->forward('tesdeftipmov', 'list');
    }

    return $this->redirect('tesdeftipmov/list');
  }

}
