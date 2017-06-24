<?php

/**
 * almconpag actions.
 *
 * @package    Roraima
 * @subpackage almconpag
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class almconpagActions extends autoalmconpagActions
{
   private $coderror = -1;
   
   
	/**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateCaconpagFromRequest()
	{
		$caconpag = $this->getRequestParameter('caconpag');
	
		if (isset($caconpag['codconpag']))
		{
      if($caconpag['codconpag']=='####'){
        $c = new Criteria();
        $c->addDescendingOrderByColumn(CaconpagPeer::CODCONPAG);
        $max = CaconpagPeer::doSelectOne($c);
        if($max){
          $max_codconpag = intval($max->getCodconpag());
          $codconpag = str_pad($max_codconpag + 1, 4, '0', STR_PAD_LEFT);
        }else{
          $codconpag = '0001';
        }
      }else{
        $codconpag = str_pad($caconpag['codconpag'], 4, '0', STR_PAD_LEFT);
      }
		  $this->caconpag->setCodconpag($codconpag);
	  }
    if (isset($caconpag['desconpag']))
    {
      $this->caconpag->setDesconpag($caconpag['desconpag']);
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
    $resp=-1; 

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->caconpag = $this->getCaconpagOrCreate();    
      $caconpag = $this->getRequestParameter('caconpag');
      $valor = $caconpag['codconpag'];
      $campo='codconpag';

      $resp=Herramientas::ValidarCodigo($valor,$this->caconpag,$campo);

      if($resp!=-1)
      {
        $this->coderror = $resp; 
        return false;
      } else return true;
   }else return true;
  }
	
  /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function handleErrorEdit()
  {
    $this->labels = $this->getLabels();
        
     $this->caconpag = $this->getCaconpagOrCreate();
     $this->updateCaconpagFromRequest();    
          
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror!=-1)
      {
        $err = Herramientas::obtenerMensajeError($this->coderror);	    
        $this->getRequest()->setError('',$err);	
      }
    }
    return sfView::SUCCESS;
  }
	
  public function executeDelete()
  {
    $this->caconpag = CaconpagPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->caconpag);

    try
    {
      $tiene = H::getX_vacio('Conpag','Cacotiza','Conpag',$this->caconpag->getCodconpag());
      $tiene2 = H::getX_vacio('Conpag','Caordcom','Conpag',$this->caconpag->getCodconpag());
      if ($tiene=='' && $tiene2=='') {
        $this->deleteCaconpag($this->caconpag);
        $this->Bitacora('Elimino');
      }else {
        $this->getRequest()->setError('delete', 'No se pudo borrar la registro seleccionado. Asegúrese de que no tiene ningún tipo de registros asociados.');
        return $this->forward('almconpag', 'list');
      }
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'No se pudo borrar la registro seleccionado. Asegúrese de que no tiene ningún tipo de registros asociados.');
      return $this->forward('almconpag', 'list');
    }

    return $this->redirect('almconpag/list');
  }
}
