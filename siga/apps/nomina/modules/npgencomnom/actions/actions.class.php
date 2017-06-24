<?php

/**
 * npgencomnom actions.
 *
 * @package    siga
 * @subpackage npgencomnom
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class npgencomnomActions extends autonpgencomnomActions
{
  protected $codpresu = "";
  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {


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
    $dato=""; $js="";
    switch ($ajax){
      case '1':
        $y= new Criteria();
        $y->add(NpnominaPeer::CODNOM, $codigo);
        $reg= NpnominaPeer::doSelectOne($y);
        if ($reg)
        {
          $dato=$reg->getNomnom();
        }else $js="alert('La N&oacute;mina no existe'); $('npnomcom_codnom').value=''; $('npnomcom_nomnom').value=''; $('npnomcom_codnom').focus();";

        $output = '[["npnomcom_nomnom","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '2':
        $codnom = $this->getRequestParameter('codnom','');
        $y= new Criteria();
        $y->add(NpnomesptiposPeer::CODNOMESP, $codigo);
        $reg= NpnomesptiposPeer::doSelectOne($y);
        if ($reg)
        {
           $y1= new Criteria();
           $y1->add(NpnomespnomtipPeer::CODNOMESP, $codigo);
           $y1->add(NpnomespnomtipPeer::CODNOM, $codnom);
           $reg1= NpnomespnomtipPeer::doSelectOne($y1);
           if ($reg1)
           {
               $dato=$reg->getDesnomesp();
           }else $js="alert('La N&oacute;mina Especial no esta asociada a la'N&oacute;mina Ordinaria '); $('npnomcom_codnomesp').value=''; $('npnomcom_desnomesp').value=''; $('npnomcom_codnomesp').focus();";
        }else $js="alert('La N&oacute;mina Especial no existe'); $('npnomcom_codnomesp').value=''; $('npnomcom_desnomesp').value=''; $('npnomcom_codnomesp').focus();";

        $output = '[["npnomcom_desnomesp","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
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

     $this->npnomcom = $this->getNpnomcomOrCreate();
     $this->updateNpnomcomFromRequest();
      
      $t= new Criteria();
      $t->add(NpnomcomPeer::CODNOM,$this->npnomcom->getCodnom());
      $t->add(NpnomcomPeer::FECNOM,$this->npnomcom->getFecnom());
      if ($this->npnomcom->getEspecial()=='S'){
        $t->add(NpnomcomPeer::CODNOMESP,$this->npnomcom->getCodnomesp());
        $t->add(NpnomcomPeer::ESPECIAL,'S');
      }else $t->add(NpnomcomPeer::ESPECIAL,'N');
      $result= NpnomcomPeer::doSelectOne($t);
      if ($result)
        $this->coderr=4008;

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
    $error=CalculoNomina::generarCompromisoNomina($clasemodelo,$codpre);
    $this->codpresu=$codpre;
    return $error;
  }

  public function deleting($clasemodelo)
  {
    if ($clasemodelo->getEspecial()=='N') {
     $c= new Criteria();
     $c->add(NpcienomPeer::CODNOM,$clasemodelo->getCodnom());
     $c->add(NpcienomPeer::FECNOM,$clasemodelo->getFecnom());
     $c->add(NpcienomPeer::ESPECIAL,'N');
     $resul= NpcienomPeer::doSelect($c);
    }else {
     $c= new Criteria();
     $c->add(NpcienomPeer::CODNOM,$clasemodelo->getCodnom());
     $c->add(NpcienomPeer::CODNOMESP,$clasemodelo->getCodnomesp());
     $c->add(NpcienomPeer::FECNOM,$clasemodelo->getFecnom());
     $c->add(NpcienomPeer::ESPECIAL,'S');
     $resul= NpcienomPeer::doSelect($c);
    }
    if ($resul)
      return 4007;
    else {
      H::EliminarRegistro('Cpimpcom','REFCOM',$clasemodelo->getRefcom());
      H::EliminarRegistro('Cpcompro','REFCOM',$clasemodelo->getRefcom());
      return parent::deleting($clasemodelo);
    }
  }

  /**
   * Función para manejar de el salvado de registros del formulario.
   * cabe destacar que llama internamente a la función $this->saving
   * que es reescrita en la clase que hereda con el proceso que el usuario
   * necesite implementar.
   * Esta función saving siempre debe retornar un valor >=-1.
   *
   */
  protected function saveNpnomcom($npnomcom)
  {
    //try {
      $this->coderr = $this->saving($npnomcom);

      if(is_array($this->coderr)){
        foreach ($this->coderr as $ERR){
          $err = Herramientas::obtenerMensajeError($ERR);
          $this->getRequest()->setError('',$err.' '.$this->codpresu);
          $this->updateError();}
          return sfView::SUCCESS;
      }elseif($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        $this->getRequest()->setError('',$err.' '.$this->codpresu);
        $this->updateError();
        return sfView::SUCCESS;
      }else
      return -1;

    /*} catch (Exception $ex) {

      $this->coderr = 0;
      $err = Herramientas::obtenerMensajeError($this->coderr);
      $this->getRequest()->setError('',$err.' '.$this->codpresu);
      $this->updateError();
    return sfView::SUCCESS;
    }*/


  }
}
