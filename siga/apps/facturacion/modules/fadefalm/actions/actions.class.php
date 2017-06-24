<?php

/**
 * fadefalm actions.
 *
 * @package    Roraima
 * @subpackage fadefalm
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class fadefalmActions extends autofadefalmActions
{

    /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
	{
	  parent::executeEdit();

	  $this->mascaraubicacion = Herramientas::ObtenerFormato('Bndefins','forubi');
	  $this->lonmascara=Herramientas::ObtenerFormato('Bndefins','lonubi');
	}

  	public function updateCaregartFromRequest()
	{
	  parent::updateCadefubiFromRequest();


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
	  	$this->mascaraubicacion = Herramientas::ObtenerFormato('Bndefins','forubi');
	  	$this->lonmascara=Herramientas::ObtenerFormato('Bndefins','lonubi');
	    if($this->getRequest()->getMethod() == sfRequest::POST)
	    {

	   $this->cadefalm= $this->getCadefalmOrCreate();
       $objj = $this->getRequestParameter('cadefalm');
       $valor="";
       if ($objj['codalm']!="") $valor = str_pad($objj['codalm'], 6, '0', STR_PAD_LEFT);
       $campo='codalm';

       $resp=Herramientas::ValidarCodigo($valor,$this->cadefalm,$campo);
	      // al final $resp es analizada en base al código que retorna
      // Todas las funciones de validación y procesos del negocio
      // deben retornar códigos >= -1. Estos código serám buscados en
      // el archivo errors.yml en la función handleErrorEdit()

      if($resp!=-1){
        $this->coderror = $resp;
        return false;
      } else return true;
    }else return true;
  }


    /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax(){

      $cajtexmos=$this->getRequestParameter('cajtexmos','');
      $cajtexcom=$this->getRequestParameter('cajtexcom','');
	  if ($this->getRequestParameter('ajax')=='1')
	    {
	    	$dato=BnubibiePeer::getDesubicacion($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	    }
            else  if ($this->getRequestParameter('ajax')=='2')
	    {
	    	$dato=FadefzonPeer::getCodzon($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	    }
	  $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	  return sfView::HEADER_ONLY;

    }

  /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  public function executeDelete()
  {
    $this->cadefalm = CadefalmPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->cadefalm);
    $id=$this->getRequestParameter('id');

   //verificar si no tiene articulos registrados para ese almacen
    if (Almacen::Hay_articulos_almacen($this->cadefalm->getCodalm())) //no se puede eliminar, tiene hijos
     {
     	$this->setFlash('notice','El almacen no puede ser eliminado ya que tiene datos asociados');
        return $this->redirect('fadefalm/edit?id='.$id);
     }
     else
     {
	    try
	    {
	      Herramientas::EliminarRegistro('Caalmubi','Codalm',$this->cadefalm->getCodalm());
	      $this->deleteCadefalm($this->cadefalm);
	      $this->Bitacora('Elimino');
	    }
	    catch (PropelException $e)
	    {
	      $this->getRequest()->setError('delete', 'Could not delete the selected Cadefalm. Make sure it does not have any associated items.');
	      return $this->forward('fadefalm', 'list');
	    }

	    return $this->redirect('fadefalm/list');
     }//else
  }

    /**
   * Función que debe ser reescrita en la clase que hereda para
   * implementar el proceso de guardado adecuado para cada formulario.
   *
   */
  protected function saving($cadefalm)
  {
      if($cadefalm->getId()=='')
      {
       $modulo=sfContext::getInstance()->getUser()->getAttribute('menu','','autenticacion');
       if ($modulo=='facturacion')
         $cadefalm->setTipreg('F'); // para identificar si el almacen se registro por facturacion
}
      
    $cadefalm->save();
    return -1;

  }
  
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

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/cadefalm/filters');


     // 15    // pager
    $this->pager = new sfPropelPager('Cadefalm', 15);
    $c = new Criteria();
    $almseparados=H::getConfAppGen('almseparados');
    if ($almseparados=='S') {
        $c->add(CadefalmPeer::TIPREG,'F');
    }
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

}
