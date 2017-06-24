<?php

/**
 * congencomrev actions.
 *
 * @package    siga
 * @subpackage congencomrev
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class congencomrevActions extends autocongencomrevActions
{
  private $numerocom="";

  public function executeIndex()
  {
    return $this->forward('congencomrev', 'edit');
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
   $this->contabc->setNumcomrev($this->getRequestParameter('numerocom'));
 }

  public function configGrid($reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;

    if(!count($reg)>0)
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $reg = array();
      // Aquí va el código para generar arreglo de configuración del grid
    $this->obj = array();
    }

    // Insertar el criterio de la busqueda de registros del Grid
    // Por ejemplo:

    // $c = new Criteria();
    // $c->add(CaartaocPeer::AJUOC ,$this->caajuoc->getAjuoc());
    // $reg = CaartaocPeer::doSelect($c);

    // De esta forma se carga la configuración del grid de un archivo yml
    // y se le pasa el parámetro de los registros encontrados ($reg)
    //                                                                            /nombreformulario/
    // $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/formulario/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_caartaoc',$reg);

    // Si no se quiere cargar la configuración del grid de un .yml, sedebe hacer a pie.
    // Por ejemplo:

    /*
    // Se crea el objeto principal de la clase OpcionesGrid
    $opciones = new OpcionesGrid();
    // Se configuran las opciones globales del Grid
    $opciones->setEliminar(true);
    $opciones->setTabla('Caartalm');
    $opciones->setAnchoGrid(1150);
    $opciones->setTitulo('Existencia por Almacenes');
    $opciones->setHTMLTotalFilas(' ');
    // Se generan las columnas
    $col1 = new Columna('Cod. Almacen');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codalm');
    $col1->setCatalogo('cadefalm','sf_admin_edit_form','2');
    $col1->setAjax(2,2);

    $col2 = new Columna('Descripción');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('codalm');
    $col2->setHTML('type="text" size="25" disabled=true');

    // Se guardan las columnas en el objetos de opciones
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);

    // Se genera el arreglo de opciones necesario para generar el grid
    $this->obj = $opciones->getConfig($per);
     */


  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
     $dato=""; $js="";
    switch ($ajax){
      case '1':
        $e= new Criteria();
        $e->add(ContabcPeer::NUMCOM,$codigo);
        $e->add(ContabcPeer::STACOM,'N',Criteria::NOT_EQUAL);
        $result= ContabcPeer::doSelectOne($e);
        if ($result){
            $q= new Criteria();
            $q->add(ContabcPeer::REFTRA,$codigo);
            $q->add(ContabcPeer::STACOM,'N',Criteria::NOT_EQUAL);
            $result2= ContabcPeer::doSelectOne($q);
            if (!$result2){
              if ($result->getTipcom()=='CON')
                $dato= $result->getDescom();
              else $js="alert('El Comprobante pertenece a otro M&oacute;dulo no puede hacerle Reverso.'); $('contabc_numcom').value=''; $('contabc_descom').value=''; $('contabc_numcom').focus();";
            }             
            else  $js="alert('El Comprobante ya tiene Reverso.'); $('contabc_numcom').value=''; $('contabc_descom').value=''; $('contabc_numcom').focus();";
        }
        else
          $js="alert('El Comprobante no existe o esta anulado'); $('contabc_numcom').value=''; $('contabc_descom').value=''; $('contabc_numcom').focus();";

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

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
  public function validateEdit()
  {
    $this->coderr =-1;
    if($this->getRequest()->getMethod() == sfRequest::POST){
       $this->contabc = $this->getContabcOrCreate();
       $this->updateContabcFromRequest();
       
      $e= new Criteria();
      $e->add(ContabcPeer::NUMCOM,$this->getRequestParameter('contabc[numcom]'));
      $e->add(ContabcPeer::STACOM,'N',Criteria::NOT_EQUAL);
      $result= ContabcPeer::doSelectOne($e);
      if ($result){
         $dateFormat = new sfDateFormat('es_VE');
         $fecha = $dateFormat->format($this->getRequestParameter('contabc[feccom]'), 'i', $dateFormat->getInputPattern('d'));
         if ($fecha<$result->getFeccom()){
            $this->coderr=633;
            return false;
         }

      }


     if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('contabc[feccom]'))==true)
    {
      $this->coderr=529;
      return false;
    }

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;



  }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    //$this->configGrid();

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
    $c= new Criteria();
    $c->add(ContabcPeer::NUMCOM,$clasemodelo->getNumcom());
    $resul= ContabcPeer::doSelectOne($c);
    if ($resul)
    {
      $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
      if ($confcorcom=='N')
        $numcom= 'RE'.substr($resul->getNumcom(),2,6);
      else 
        $numcom= Comprobante::Buscar_Correlativo($clasemodelo->getFeccom());

      $this->numerocom=$numcom;

      $contabc= new Contabc();
      $contabc->setNumcom($numcom);
      $contabc->setFeccom($clasemodelo->getFeccom());
      $contabc->setDescom($clasemodelo->getDescom()); 
      $contabc->setStacom('D');
      $contabc->setTipcom(null);
      $contabc->setReftra($clasemodelo->getNumcom());
      $contabc->setMoncom($resul->getMoncom());
      $contabc->save();

      $a= new Criteria();
      $a->add(Contabc1Peer::NUMCOM,$clasemodelo->getNumcom());
      $a->addAscendingOrderByColumn(Contabc1Peer::DEBCRE);
      $resul2= Contabc1Peer::doSelect($a);
      if ($resul2)
      {
        foreach ($resul2 as $datos)
        {
          $numcom1= $numcom;
          $contabc1= new Contabc1();
          $contabc1->setNumcom($numcom1);
          $contabc1->setFeccom($clasemodelo->getFeccom());
          $contabc1->setCodcta($datos->getCodcta());
          $contabc1->setNumasi($datos->getNumasi());
          $contabc1->setRefasi($clasemodelo->getNumcom());
          $contabc1->setDesasi($datos->getDesasi());
          if ($datos->getDebcre()=='D')
          {  $contabc1->setDebcre('C');}
          else { $contabc1->setDebcre('D');}
          $contabc1->setMonasi($datos->getMonasi());
          $contabc1->save();
        }
      }
    }
    
    return -1;
  }

  public function executeEdit()
  {
    $this->params=array();
    $this->contabc = $this->getContabcOrCreate();

    $this->editing();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateContabcFromRequest();

      if($this->saveContabc($this->contabc) ==-1){
        {$this->setFlash('notice', 'Your modifications have been saved');

         $id= $this->contabc->getId();
         $this->SalvarBitacora($id ,'Guardo');}

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('congencomrev/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('congencomrev/list');
        }
        else
        {
            return $this->redirect('congencomrev/edit?numerocom='.$this->numerocom);
        }

      }else{
        $this->labels = $this->getLabels();
      }

    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
