<?php

/**
 * confintipcuecon actions.
 *
 * @package    siga
 * @subpackage confintipcuecon
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class confintipcueconActions extends autoconfintipcueconActions
{

  public function executeIndex() {
      $c= new Criteria();
      $c->add(ContabaPeer::CODEMP,'001');
      $dato=ContabaPeer::doSelectOne($c);
      if ($dato) {
          $id=$dato->getId();
          return $this->redirect('confintipcuecon/edit?id='.$id);
      }
      else {
          return $this->redirect('confintipcuecon/edit');
      }
  }

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

  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');
    $js="";
    switch ($ajax){
      case '1':       
        $c= new Criteria();
        $c->add(ContabbPeer::CODCTA,$codigo);
        $reg= ContabbPeer::doSelectOne($c);
        if ($reg){
          if ($reg->getCargab()!='C')
            $js="alert('La Cuenta Contable no es Cargable'); $('$cajtexcom').value=''; ";
        }else $js="alert('La Cuenta Contable no existe'); $('$cajtexcom').value=''; ";
        $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
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

    //$grid = Herramientas::CargarDatosGridv2($this,$this->obj);
  }

  public function saving($clasemodelo)
  {
    return parent::saving($clasemodelo);
  }


}
