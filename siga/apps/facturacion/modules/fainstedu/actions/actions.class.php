<?php

/**
 * fainstedu actions.
 *
 * @package    siga
 * @subpackage fainstedu
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class fainsteduActions extends autofainsteduActions
{

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
    $estado = $this->getRequestParameter('estado','');
    $ciudad = $this->getRequestParameter('ciudad','');
    $municipio = $this->getRequestParameter('municipio','');
    $dependencia = $this->getRequestParameter('dependencia','');
    $subsistema = $this->getRequestParameter('subsistema','');
    $ajax = $this->getRequestParameter('ajax','');
    $sw = true;
    $js="";

    switch ($ajax){
      case '1':
        $c=new Criteria();
        $c->add(OcestadoPeer::CODPAI,'0001');
        $c->add(OcestadoPeer::CODEDO,$codigo);
        $r = OcestadoPeer::doSelectOne($c);

        if($r){
            $output = '[["fainstedu_codedo","'.$r->getCodedo().'",""],["fainstedu_nomedo","'.$r->getNomedo().'",""],["fainstedu_codciu","",""],["fainstedu_nomciu","",""],["fainstedu_codmun","",""],["fainstedu_nommun","",""],["javascript","'.$js.'",""]]';
        }else{
            $js="alert('El Estado No se encuentra registrado')";
            $output = '[["fainstedu_codedo","",""],["fainstedu_nomedo","",""],["fainstedu_codciu","",""],["fainstedu_nomciu","",""],["fainstedu_codmun","",""],["fainstedu_nommun","",""],["javascript","'.$js.'",""]]';
        }
        $sw=false;
        break;
      case '2':
        $c=new Criteria();
        $c->add(OcciudadPeer::CODPAI,'0001');
        $c->add(OcciudadPeer::CODEDO,$estado);
        $c->add(OcciudadPeer::CODCIU,$codigo);
        $r = OcciudadPeer::doSelectOne($c);

        if($r){
            $output = '[["fainstedu_codciu","'.$r->getCodciu().'",""],["fainstedu_nomciu","'.$r->getNomciu().'",""],["fainstedu_codmun","",""],["fainstedu_nommun","",""],["javascript","'.$js.'",""]]';
        }else{
            $js="alert('La Ciudad No se encuentra registrada')";
            $output = '[["fainstedu_codciu","",""],["fainstedu_nomciu","",""],["fainstedu_codmun","",""],["fainstedu_nommun","",""],["javascript","'.$js.'",""]]';
        }
        $sw=false;
        break;
      case '3':
        $c=new Criteria();
        $c->add(OcmuniciPeer::CODPAI,'0001');
        $c->add(OcmuniciPeer::CODEDO,$estado);
        $c->add(OcmuniciPeer::CODCIU,$ciudad);
        $c->add(OcmuniciPeer::CODMUN,$codigo);
        $r = OcmuniciPeer::doSelectOne($c);

        if($r){
            $output = '[["fainstedu_codmun","'.$r->getCodmun().'",""],["fainstedu_nommun","'.$r->getNommun().'",""],["javascript","'.$js.'",""]]';
        }else{
            $js="alert('El Municipio No se encuentra registrado')";
            $output = '[["fainstedu_codmun","",""],["fainstedu_nommun","",""],["javascript","'.$js.'",""]]';
        }
        $sw=false;
        break;
      case '4':
        $c=new Criteria();
        $c->add(OcparroqPeer::CODPAI,'0001');
        $c->add(OcparroqPeer::CODEDO,$estado);
        $c->add(OcparroqPeer::CODMUN,$municipio);
        $c->add(OcparroqPeer::CODPAR,$codigo);
        $r = OcparroqPeer::doSelectOne($c);

        if($r){
            $output = '[["fainstedu_codpar","'.$r->getCodpar().'",""],["fainstedu_nompar","'.$r->getNompar().'",""],["javascript","'.$js.'",""]]';
        }else{
            $js="alert('La Parroquia No se encuentra registrada')";
            $output = '[["fainstedu_codpar","",""],["fainstedu_nompar","",""],["javascript","'.$js.'",""]]';
        }
        $sw=false;
        break;
      case '5':
        $c=new Criteria();
        $c->add(FadependenciaPeer::CODDEP,$codigo);
        $r = FadependenciaPeer::doSelectOne($c);

        if($r){
            $output = '[["fainstedu_coddep","'.$r->getCoddep().'",""],["fainstedu_nomdep","'.$r->getNomdep().'",""],["javascript","'.$js.'",""]]';
        }else{
            $js="alert('La Dependencia No se encuentra registrada')";
            $output = '[["fainstedu_coddep","",""],["fainstedu_nomdep","",""],["javascript","'.$js.'",""]]';
        }
        $sw=false;
        break;
      case '6':
        $c=new Criteria();
        $c->add(FasubsistemaPeer::CODSUB,$codigo);
        $r = FasubsistemaPeer::doSelectOne($c);

        if($r){
            $output = '[["fainstedu_codsub","'.$r->getCodsub().'",""],["fainstedu_nomsub","'.$r->getNomsub().'",""],["javascript","'.$js.'",""]]';
        }else{
            $js="alert('El Subsistema No se encuentra registrado')";
            $output = '[["fainstedu_codsub","",""],["fainstedu_nomsub","",""],["javascript","'.$js.'",""]]';
        }
        $sw=false;
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    if($sw){
        return sfView::HEADER_ONLY;
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
    $this->coderr =-1;

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      // $this->configGrid();
      // $grid = Herramientas::CargarDatosGrid($this,$this->obj);

      // Aqui van los llamados a los métodos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

      // $resp = Compras::validarAlmajuoc($this->caajuoc,$grid);

       //$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);

      // al final $resp es analizada en base al código que retorna
      // Todas las funciones de validación y procesos del negocio
      // deben retornar códigos >= -1. Estos código serám buscados en
      // el archivo errors.yml en la función handleErrorEdit()

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
    return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }
}
