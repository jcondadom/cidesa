<?php

/**
 * usuarios actions.
 *
 * @package    Roraima
 * @subpackage usuarios
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:actions.class.php 32375 2009-09-01 16:19:59Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class usuariosActions extends autousuariosActions
{
  public  $coderror=-1;

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->usuarios = $this->getUsuariosOrCreate();
    $this->mannivelapr="";
    $this->permiporgrupo="";
    $varemp = $this->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('generales',$varemp)) {
	   if(array_key_exists('mannivapr',$varemp['generales']))
	   {
	   	$this->mannivelapr=$varemp['generales']['mannivapr'];
	   }
           if(array_key_exists('permiporgrupo',$varemp['generales']))
	   {
                $this->permiporgrupo=$varemp['generales']['permiporgrupo'];
	   }
         }

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateUsuariosFromRequest();

      $this->saveUsuarios($this->usuarios);

      $this->setFlash('notice', 'Your modifications have been saved');

    $this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('usuarios/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('usuarios/list');
      }
      else
      {
        return $this->redirect('usuarios/edit?id='.$this->usuarios->getId());
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
  protected function updateUsuariosFromRequest()
  {
    $usuarios = $this->getRequestParameter('usuarios');
    $this->mannivelapr="";
    $this->permiporgrupo="";
    $varemp = $this->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('generales',$varemp)) {
	   if(array_key_exists('mannivapr',$varemp['generales']))
	   {
	   	$this->mannivelapr=$varemp['generales']['mannivapr'];
	   }
           if(array_key_exists('permiporgrupo',$varemp['generales']))
	   {
                $this->permiporgrupo=$varemp['generales']['permiporgrupo'];

	   }
        }

    if (isset($usuarios['loguse']))
    {
      $this->usuarios->setLoguse($usuarios['loguse']);
    }
    if (isset($usuarios['cedemp']))
    {
      $this->usuarios->setCedemp($usuarios['cedemp']);
    }
    if (isset($usuarios['nomuse']))
    {
      $this->usuarios->setNomuse($usuarios['nomuse']);
    }
    if (isset($usuarios['pasuse']))
    {
      $this->usuarios->setPasuse($usuarios['pasuse']);
    }
    $this->usuarios->setApluse('CI0');

    if (isset($usuarios['numemp']))
    {
      $this->usuarios->setNumemp($usuarios['numemp']);
    }
    if (isset($usuarios['diremp']))
    {
      $this->usuarios->setDiremp($usuarios['diremp']);
    }
    if (isset($usuarios['telemp']))
    {
      $this->usuarios->setTelemp($usuarios['telemp']);
    }
    if (isset($usuarios['numuni']))
    {
      $this->usuarios->setNumuni($usuarios['numuni']);
    }
    if (isset($usuarios['codcat']))
    {
      $this->usuarios->setCodcat($usuarios['codcat']);
    }
    if (isset($usuarios['confirm']))
    {
      $this->usuarios->setConfirm($usuarios['confirm']);
    }
    if (isset($usuarios['codniv']))
    {
      $this->usuarios->setCodniv($usuarios['codniv']);
    }
    if (isset($usuarios['codgru']))
    {
      $this->usuarios->setCodgru($usuarios['codgru']);
    }
    if (isset($usuarios['feccad']))
    {
      if ($usuarios['feccad'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($usuarios['feccad']))
          {
            $value = $dateFormat->format($usuarios['feccad'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $usuarios['feccad'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->usuarios->setFeccad($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->usuarios->setFeccad(null);
      }
    }
    if (isset($usuarios['esgeren']))
    {
      $this->usuarios->setEsgeren($usuarios['esgeren']);
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
  protected function saveUsuarios($usuarios)
  {
    Autenticacion::salvarUsuarios($usuarios);
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
    $javascript=""; $dato="";
	if ($this->getRequestParameter('ajax')=='1')
	{
	  $t= new Criteria();
	  $t->add(SegnivaprPeer::CODNIV,$this->getRequestParameter('codigo'));
	  $data= SegnivaprPeer::doSelectOne($t);
	  if ($data)
	  {
        $dato=$data->getDesniv();
	  }else $javascript="alert('El Nivel de Aprobación no existe'); $('$cajtexcom').value='';";
	  $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
	}
        else if ($this->getRequestParameter('ajax')=='2')
	{
	  $t= new Criteria();
	  $t->add(SeggrupoPeer::CODGRU,$this->getRequestParameter('codigo'));
	  $data= SeggrupoPeer::doSelectOne($t);
	  if ($data)
	  {
              $g= new Criteria();
              $g->add(SeggruaplPeer::CODGRU,$this->getRequestParameter('codigo'));
              $dat= SeggruaplPeer::doSelect($g);
              if ($dat) {
                  $dato=$data->getDesgru();
              }else $javascript="alert('El Grupo no tiene perfil asociado'); $('$cajtexcom').value='';";
	  }else $javascript="alert('El Grupo no existe'); $('$cajtexcom').value='';";
	  $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
	}
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }

  public function executeDelete()
  {
    $this->usuarios = UsuariosPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->usuarios);

    try
    {
      $nomusu = $this->getUser()->getAttribute('loguse', '');
      if($this->usuarios->getLoguse()!=$nomusu){
        $this->deleteUsuarios($this->usuarios);
        $this->Bitacora('Elimino');
      }else{
        $this->getRequest()->setError('delete', 'No se puede eliminar al usuario actualmente autenticado.');
        return $this->forward('usuarios', 'list');
      }
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'No se pudo borrar la registro seleccionado. Asegúrese de que no tiene ningún tipo de registros asociados.');
      return $this->forward('usuarios', 'list');
    }

    return $this->redirect('usuarios/list');
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
      $this->usuarios = $this->getUsuariosOrCreate();
      try{ $this->updateUsuariosFromRequest();}
      catch (Exception $ex){}
      
      $valcon123456=H::getConfApp2('valcon123456', 'autenticacion', 'cambiopasswd');
      if ($valcon123456=='S'){
        if ($this->getRequestParameter('usuarios[pasuse]')=='123456')
          $this->coderror = 31;       
      }

      if($this->coderror!=-1){
        return false;
      } else return true;
    }else return true;
    
    return true;
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
    $this->usuarios = $this->getUsuariosOrCreate();
    $this->updateUsuariosFromRequest();

    $this->labels = $this->getLabels();

      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
        if($this->coderror!=-1)
        {
         $err = Herramientas::obtenerMensajeError($this->coderror);
         $this->getRequest()->setError('usuarios{pause}',$err);
        }
        
      }
      return sfView::SUCCESS;
    }   

}
