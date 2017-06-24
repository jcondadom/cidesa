<?php

/**
 * mantarpro actions.
 *
 * @package    siga
 * @subpackage mantarpro
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class mantarproActions extends automantarproActions
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
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $dato=$js="";
    switch ($ajax){
      case '1':
        $q= new Criteria();
        $q->add(MantarproPeer::CODTAR,$codigo);
        $reg= MantarproPeer::doSelectOne($q);
        if ($reg)
        {
           $destar=$reg->getDestar();
           $priori=$reg->getPriori();
           
           $codact=$reg->getCodact();
           $desact=$reg->getDesact();

           $codgru=$reg->getCodgru();
           $desgru=$reg->getDesgru();

           $codcar=$reg->getCodcar();
           $nomcar=$reg->getNomcar();

           $tipo=$reg->getTipfre();
           $intervalo=H::FormatoMonto($reg->getInterv());

           $codtma=$reg->getCodtma();
           $destma=$reg->getDestma();

           $js="$('mantarpro_codtar').value='';";
           if ($reg->getGenreq()=='S')
            $js.=" $(mantarpro_genreq_S).checked=true;";
           else
            $js.=" $(mantarpro_genreq_N).checked=true;";

           if ($reg->getTaract()=='S')
            $js.=" $(mantarpro_taract_S).checked=true;";
           else
            $js.=" $(mantarpro_taract_N).checked=true;";

           $output = '[["mantarpro_destar","'.$destar.'",""],["mantarpro_codact","'.$codact.'",""],["mantarpro_desact","'.$desact.'",""],
           ["mantarpro_codgru","'.$codgru.'",""],["mantarpro_desgru","'.$desgru.'",""],
           ["mantarpro_codcar","'.$codcar.'",""],["mantarpro_nomcar","'.$nomcar.'",""],
           ["mantarpro_tipfre","'.$tipo.'",""],["mantarpro_interv","'.$intervalo.'",""],
           ["mantarpro_codtma","'.$codtma.'",""],["mantarpro_destma","'.$destma.'",""],
           ["javascript","'.$js.'",""]]';
        }else
          $output = '[["","",""]]';   
        break;
      case '2':  //Código del Grupo
        $codact=$this->getRequestParameter('codact','');//Código Estándar de Trabajo
        $q= new Criteria();
        $q->add(MangrutraPeer::CODGRU,$codigo);
        $reg= MangrutraPeer::doSelectOne($q);
        if ($reg){
           $p= new Criteria();
           $p->add(ManactestPeer::CODACT,$codact);
           $p->add(ManactestPeer::CODGRU,$codigo);
           $regp= ManactestPeer::doSelectOne($p);
           if ($regp){
             $y= new Criteria();
             $y->add(ManprogruPeer::CODGRU,$codigo);
             $regy=ManprogruPeer::doSelectOne($y);
             if ($regy)
               $dato=$reg->getDesgru();  
             else $js="alert('El Grupo de Trabajo no tiene una Programacion Definida'); $('mantarpro_codgru').value=''; $('mantarpro_desgru').value='';$('mantarpro_codgru').focus();";
           }else $js="alert('El Grupo no esta asociado a ese Est&aacute;ndar de Trabajo'); $('mantarpro_codgru').value=''; $('mantarpro_desgru').value='';$('mantarpro_codgru').focus();";
        }else $js="alert('El Grupo de Trabajo no esta registrado'); $('mantarpro_codgru').value=''; $('mantarpro_desgru').value='';$('mantarpro_codgru').focus();";
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
