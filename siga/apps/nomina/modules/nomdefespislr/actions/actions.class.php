<?php

/**
 * nomdefespislr actions.
 *
 * @package    Roraima
 * @subpackage nomdefespislr
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomdefespislrActions extends autonomdefespislrActions
{
  public  $coderror1=-1;

    public function executeIndex()
  {
    return $this->redirect('nomdefespislr/edit');
  }

  public function configGrid()
  {
    $c = new Criteria();
    $detalle = NpislrPeer::doSelect($c);
    
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/nomdefespislr/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');

    $this->obj =$this->columnas[0]->getConfig($detalle);

    $this->npislr->setObj($this->obj);
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
      $this->npislr = $this->getNpislrOrCreate();
      $this->updateNpislrFromRequest();
      $this->configGrid();
      $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
      $i=0;
      $x=$grid[0];
      while ($i<count($x)){
        if ($x[$i]->getCodnom()!=''  && ($x[$i]->getCodconpor()=='' || $x[$i]->getCodconimp()==''))
        {
          $this->coderror1='N0007';
          return false;
        }        
        if ($x[$i]->getId()=='') {
          $c= new Criteria();
          $c->add(NpislrPeer::CODNOM,$x[$i]->getCodnom());
          $c->add(NpislrPeer::CODCONPOR,$x[$i]->getCodconpor());
          $c->add(NpislrPeer::CODCONIMP,$x[$i]->getCodconimp());
          $resul= NpislrPeer::doSelectOne($c);
          if ($resul)
          {
            $this->coderror1=407;
            return false;
          }
      }


        $i++;
      }
     /* $c= new Criteria();
      $c->add(NpislrPeer::CODNOM,$this->npislr->getCodnom());
      $c->add(NpislrPeer::CODCONPOR,$this->npislr->getCodconpor());
      $c->add(NpislrPeer::CODCONIMP,$this->npislr->getCodconimp());
      $resul= NpislrPeer::doSelectOne($c);
      if ($resul)
      {
      	$this->coderror1=407;
      	return false;
      }*/
      return true;
    }else return true;
  }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
 /* public function executeEdit()
  {
    $this->npislr = $this->getNpislrOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpislrFromRequest();

      $this->saveNpislr($this->npislr);

      $this->npislr->setId(self::obtenerId($this->npislr->getCodnom(),$this->npislr->getCodconpor(),$this->npislr->getCodconimp()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdefespislr/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdefespislr/list');
      }
      else
      {
        return $this->redirect('nomdefespislr/edit?id='.$this->npislr->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }*/

  /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->npislr = $this->getNpislrOrCreate();
    $this->updateNpislrFromRequest();

    $this->configGrid();
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

    $this->labels = $this->getLabels();

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror1!=-1)
      {
       $err = Herramientas::obtenerMensajeError($this->coderror1);
       $this->getRequest()->setError('npislr{codnom}',$err);
      }
    }

    return sfView::SUCCESS;
  }

 /* public function obtenerId($dato1,$dato2,$dato3)
  {
  	$c= new Criteria();
  	$c->add(NpislrPeer::CODNOM,$dato1);
  	$c->add(NpislrPeer::CODCONPOR,$dato2);
  	$c->add(NpislrPeer::CODCONIMP,$dato3);
  	$resul= NpislrPeer::doSelectOne($c);
  	if ($resul)
  	{
  	  return $resul->getId();
  	}
  	else
  	{
  		return '';
  	}
  }*

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
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $js=""; $dato="";

    switch ($ajax){
      case '1':
    		$dato=H::getX_vacio('CODNOM','Npnomina','Nomnom',$codigo); //NpnominaPeer::getDesnom($this->getRequestParameter('codigo'));
        if ($dato=='')
          $js="alert_('La N&oacute;mina no esta registrada'); $('$cajtexcom').value='';$('$cajtexcom').focus();";
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
		break;
      case '2':
			$dato=H::getX_vacio('CODCON','Npdefcpt','Nomcon',$codigo); //NpdefcptPeer::getDescon($this->getRequestParameter('codigo'));
      if ($dato=='')
          $js="alert('El Concepto no esta registrado'); $('$cajtexcom').value='';$('$cajtexcom').focus();";
      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
		$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		return sfView::HEADER_ONLY;
		break;
     }
  }
  public function executeEdit()
  {
    $this->npislr = $this->getNpislrOrCreate();
    $this->configGrid();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpislrFromRequest();

      $this->saveNpislr($this->npislr);

      $this->setFlash('notice', 'Your modifications have been saved');

    $this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdefespislr/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdefespislr/list');
      }
      else
      {
        return $this->redirect('nomdefespislr/edit?id='.$this->npislr->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }


  protected function saveNpislr($npislr)
  {
    //$npislr->save();
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    $x = $grid[0];
    $j = 0;
    while ($j < count($x)) {
      if ($x[$j]->getCodnom() != '' && $x[$j]->getCodconpor() != '' && $x[$j]->getCodconimp() != '') {
        $x[$j]->save();
      }
      $j++;
    }
    $z = $grid[1];
    $j = 0;
    if (!empty ($z[$j])) {
      while ($j < count($z)) {
        $z[$j]->delete();
        $j++;
      } //while ($j<count($z))
    } //if (!empty($z[$j]))

  }


 /* public function executeAutocomplete()
	{
		if ($this->getRequestParameter('ajax')=='1')
	    {
		 	$this->tags=Herramientas::autocompleteAjax('CODNOM','Npnomina','CODNOM',$this->getRequestParameter('npislr[codnom]'));
	    }
	    else if ($this->getRequestParameter('ajax')=='2')
	    {
		 	$this->tags=Herramientas::autocompleteAjax('CODCON','Npdefcpt','CODCON',$this->getRequestParameter('npislr[codconpor]'));
	    }
	    else if ($this->getRequestParameter('ajax')=='3')
	    {
		 	$this->tags=Herramientas::autocompleteAjax('CODCON','Npdefcpt','CODCON',$this->getRequestParameter('npislr[codconimp]'));
	    }

	}*/

}
