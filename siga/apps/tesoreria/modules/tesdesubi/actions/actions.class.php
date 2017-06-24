<?php

/**
 * tesdesubi actions.
 *
 * @package    Roraima
 * @subpackage tesdesubi
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 41092 2010-10-20 18:45:29Z cramirez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class tesdesubiActions extends autotesdesubiActions
{
  private static $coderror=-1;

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->bnubica = $this->getBnubicaOrCreate();
    $this->setVars();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateBnubicaFromRequest();

      $this->saveBnubica($this->bnubica);

      $this->bnubica->setId(Herramientas::getX_vacio('codubi','bnubica','id',$this->bnubica->getCodubi()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('tesdesubi/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('tesdesubi/list');
      }
      else
      {
        return $this->redirect('tesdesubi/edit?id='.$this->bnubica->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  /**
   * Actualiza la informacion que viene de la vista
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateBnubicaFromRequest()
  {
    $bnubica = $this->getRequestParameter('bnubica');
    $this->setVars();

    if (isset($bnubica['codubi']))
    {
      $this->bnubica->setCodubi($bnubica['codubi']);
    }
    if (isset($bnubica['desubi']))
    {
      $this->bnubica->setDesubi($bnubica['desubi']);
    }
    if (isset($bnubica['cedemp']))
    {
      $this->bnubica->setCedemp($bnubica['cedemp']);
    }
    if (isset($bnubica['nomemp']))
    {
      $this->bnubica->setNomemp($bnubica['nomemp']);
    }
    if (isset($bnubica['nomcar']))
    {
      $this->bnubica->setNomcar($bnubica['nomcar']);
    }
    if (isset($bnubica['nomjef']))
    {
      $this->bnubica->setNomjef($bnubica['nomjef']);
    }
    if (isset($bnubica['corpta']))
    {
      $this->bnubica->setCorpta($bnubica['corpta']);
    }
    if (isset($bnubica['prepta']))
    {
      $this->bnubica->setPrepta($bnubica['prepta']);
    }
    if (isset($bnubica['carjefuni']))
    {
      $this->bnubica->setCarjefuni($bnubica['carjefuni']);
    }
   

      $this->bnubica->setStacod('A');

  }

  public function setVars()
  {
   $this->mascaraubi = Herramientas::ObtenerFormato('Opdefemp','Forubi');
   $this->lonubi=strlen($this->mascaraubi);
   $respon = H::getConfApp('respon', 'tesoreria', 'tesdesubi');
   $this->getUser()->setAttribute('respon',$respon,'tesdesubi');
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
        $this->bnubica = $this->getBnubicaOrCreate();
        $this->updateBnubicaFromRequest();

       $codubi=$this->bnubica->getCodubi();
       $formato=Herramientas::ObtenerFormato('Opdefemp','Forubi');
       $posrup1=Herramientas::instr($formato,'-',0,1);
       $posrup1=$posrup1-1;
       if (strlen(trim($codubi))<$posrup1)
       {
         self::$coderror=101;
       }else {
         Herramientas::FormarCodigoPadre($codubi,$nivelcodigo,$ultimo,$formato);
         $c= new Criteria();
         $c->add(BnubicaPeer::CODUBI,$ultimo);
         $regbn = BnubicaPeer::doSelectOne($c);
         if (!$regbn)
         {
          if ($nivelcodigo == 0)
            self::$coderror=100;
         }
      }
        if (self::$coderror<>-1){
          return false;
        }else return true;

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
      $this->preExecute();
      $this->bnubica = $this->getBnubicaOrCreate();

      try{
      $this->updateBnubicaFromRequest();
      }
      catch(Exception $ex){}
      $this->labels = $this->getLabels();

      if($this->getRequest()->getMethod() == sfRequest::POST)
      {

       if (self::$coderror!=-1)
        {
          $err = Herramientas::obtenerMensajeError(self::$coderror);
          $this->getRequest()->setError('',$err);
        }
       }
      return sfView::SUCCESS;
  }

    public function executeDelete()
  {
    $this->bnubica = BnubicaPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->bnubica);

    try
    {
      if (H::buscarCodigoHijo('codubi', 'Bnubica', $this->bnubica->getCodubi())){
          $this->getRequest()->setError('delete', 'No se pudo borrar la registro seleccionado. Asegúrese de que no tiene ningún tipo de registros asociados.');
          return $this->forward('tesdesubi', 'list');
      }else {
        $c= new Criteria();
        $c->add(OpordpagPeer::CODUNI,$this->bnubica->getCodubi());
        $reg= OpordpagPeer::doSelectOne($c);
        if (!$reg){
          $this->deleteBnubica($this->bnubica);
          $this->Bitacora('Elimino');
        }else {
        	$this->getRequest()->setError('delete', 'No se pudo borrar la registro seleccionado. Asegúrese de que no tiene ningún tipo de registros asociados.');
          return $this->forward('tesdesubi', 'list');
        }
      }          
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'No se pudo borrar la registro seleccionado. Asegúrese de que no tiene ningún tipo de registros asociados.');
      return $this->forward('tesdesubi', 'list');
    }

    return $this->redirect('tesdesubi/list');
  }

    public function getLabels()
  {
    $labels = parent::getLabels();
    $cametijef=H::getConfApp2('cametijef', 'tesoreria', 'tesdesubi');
    if ($cametijef=='S'){
      $labels['bnubica{nomjef}'] = 'Jefe de Unidad';
      $labels['bnubica{carjefuni}'] = 'Cargo Jefe de Unidad';
    }
    return $labels;
  }

}


