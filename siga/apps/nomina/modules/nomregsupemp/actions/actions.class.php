<?php

/**
 * nomregsupemp actions.
 *
 * @package    siga
 * @subpackage nomregsupemp
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nomregsupempActions extends autonomregsupempActions
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
    $js=""; $dato="";

    switch ($ajax){
      case '1':
        $c = new Criteria();
        $c->add(NphojintPeer::CODEMP, $codigo);
        $c->add(NphojintPeer::STAEMP, 'A');
        $c->add(NpasicarempPeer::STATUS, 'V');
        $c->addJoin(NphojintPeer::CODEMP, NpasicarempPeer::CODEMP);
        $reg= NphojintPeer::doSelectOne($c);
        if ($reg){
          $dato=$reg->getNomemp();
        }else $js="alert_('El Empleado Suplente no esta Registrado'); $('npsupemp_codemp').value=''; $('npsupemp_codemp').focus();";
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '2':
        $c = new Criteria();
        $c->add(NphojintPeer::CODEMP, $codigo);
        $reg= NphojintPeer::doSelectOne($c);
        if ($reg){
          $dato=$reg->getNomemp();
        }else $js="alert_('El Empleado a suplir no esta Registrado'); $('npsupemp_codempsup').value=''; $('npsupemp_codempsup').focus();";
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

     $this->npsupemp = $this->getNpsupempOrCreate();
     $this->updateNpsupempFromRequest();

      $t= new Criteria();
      $t->add(NpsupempPeer::CODEMPSUP,$this->npsupemp->getCodempsup()); //Validación Empleado a Suplir no este otra suplente que incluya este rango fechas
      $result= NpsupempPeer::doSelect($t);
      if ($result){
         foreach ($result as $obj)
         {
             if (!($this->npsupemp->getFecdes()<=$obj->getFecdes() && $this->npsupemp->getFechas()<=$obj->getFecdes()) || ($this->npsupemp->getFecdes()>=$obj->getFecdes() && $this->npsupemp->getFechas()<=$obj->getFechas()))
             {
                 $this->coderr='N0006';
                 return false;
             }

         }        
      }
      
      $t= new Criteria();
      $t->add(NpsupempPeer::CODEMP,$this->npsupemp->getCodemp()); //Validación Suplente no este otra suplente que incluya este rango fechas
      $result= NpsupempPeer::doSelect($t);
      if ($result){
         foreach ($result as $obj)
         {
             if (!($this->npsupemp->getFecdes()<=$obj->getFecdes() && $this->npsupemp->getFechas()<=$obj->getFecdes()) || ($this->npsupemp->getFecdes()>=$obj->getFecdes() && $this->npsupemp->getFechas()<=$obj->getFechas()))
             {
                 $this->coderr='N0005';
                 return false;
             }
         }        
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
    return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
