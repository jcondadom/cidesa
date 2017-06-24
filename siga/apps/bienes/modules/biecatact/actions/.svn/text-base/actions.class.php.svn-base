<?php

/**
 * biecatact actions.
 *
 * @package    Roraima
 * @subpackage biecatact
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class biecatactActions extends autobiecatactActions
{

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->setVars();
    parent::executeEdit();
  }

  public function setVars()
  {
    $this->foract = Herramientas::ObtenerFormato('Bndefins','foract');
    $this->lonact=strlen($this->foract);
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
         $codigo=$this->getRequestParameter('codigo');
         $cajtexcom=$this->getRequestParameter('cajtexcom');
	 if ($this->getRequestParameter('ajax')=='1')
	 {
	 	$dato=BndefactPeer::getDesact(trim($this->getRequestParameter('codigo')));
	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	 	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	 	return sfView::HEADER_ONLY;
	 }
       else if ($this->getRequestParameter('ajax')=='2')
       {
           $valor=Bienes::validarCodactivo($codigo);

           if ($valor==101){
               $javascript="alert('El Codigo no puede estar en Blanco ó longitud del código invalida'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
           }else if ($valor==100)
           {
               $javascript="alert('Nivel Anterior No Existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
           }else {
               $javascript="";
           }
           $output = '[["javascript","'.$javascript.'",""]]';
           $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
           return sfView::HEADER_ONLY;
       }
  }

	public function executeAutocomplete()
	{
		if ($this->getRequestParameter('ajax')=='1')
	    {
		 	$this->tags="";
	    }
	}

  public function executeDelete()
  {
    $this->bndefact = BndefactPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->bndefact);

    try
    {
      if (!H::buscarCodigoHijo('Codact', 'bndefact', $this->bndefact->getCodact())){
        $tiene = H::getX_vacio('Codact','Bnregmue','Codact',$this->bndefact->getCodact());
        $tiene2=  H::getX_vacio('Codact','Bnreginm','Codact',$this->bndefact->getCodact());
        if ($tiene=='' && $tiene2=='') {
          $this->deleteBndefact($this->bndefact);
          $this->Bitacora('Elimino');
        }else {
          $this->getRequest()->setError('delete', 'No se pudo borrar la registro seleccionado. Asegúrese de que no tiene ningún tipo de registros asociados.');
          return $this->forward('biecatact', 'list');
        }
      }else {
        $this->getRequest()->setError('delete', 'No se pudo borrar la registro seleccionado. El Activo es un código Padre.');
        return $this->forward('biecatact', 'list');
      }
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'No se pudo borrar la registro seleccionado. Asegúrese de que no tiene ningún tipo de registros asociados.');
      return $this->forward('biecatact', 'list');
    }

    return $this->redirect('biecatact/list');
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
    $this->bndefact = $this->getBndefactOrCreate();
    $this->updateBndefactFromRequest();
    $this->setVars();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

}
