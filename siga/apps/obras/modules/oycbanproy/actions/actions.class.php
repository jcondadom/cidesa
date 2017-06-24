<?php

/**
 * oycbanproy actions.
 *
 * @package    siga
 * @subpackage oycbanproy
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class oycbanproyActions extends autooycbanproyActions
{  
  public function editing()
  {
      $this->configGrid($this->ocbanpro->getCodbanpro());
  }

  public function configGrid($codigo="")
  {
     $c= new Criteria();
     $c->add(OcdetproPeer::CODBANPRO,$codigo);
     $reg= OcdetproPeer::doSelect($c);

     $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/oycbanproy/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_detalle');

     $this->obj = $this->columnas[0]->getConfig($reg);

     $this->ocbanpro->setObj($this->obj);

  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');
    $javascript=""; $dato="";

    switch ($ajax){
      case '1':
          $c= new Criteria();
          $c->add(OcdefparPeer::CODPAR,$codigo);
      	  $reg=OcdefparPeer::doSelectOne($c);
          if ($reg)
          {
            $dato=$reg->getDespar();
            $abr=Herramientas::getX('CODUNI','Ocunidad','Abruni',$reg->getCoduni());
            $dato1=$abr;
            $dato2=number_format($reg->getCosuni(),2,',','.');
        }
        else
        {
              $abr="";
              $dato1="";
              $dato2="";
              $javascript="alert('El Partida no existe'); $('". $cajtexcom ."').value=''; $('". $cajtexcom ."').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$this->getRequestParameter('unidad').'","'.$dato1.'",""],["'.$this->getRequestParameter('costo').'","'.$dato2.'",""],["javascript","'.$javascript.'",""]]';
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
    $this->configGrid();
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
  }

  public function saving($clasemodelo)
  {
      $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
      Obras::grabarProyectos($clasemodelo,$grid);

      return -1;
  }

  public function deleting($clasemodelo)
  {
    H::EliminarRegistro('Ocdetpro', 'Codbanpro', $clasemodelo->getCodbanpro());
    H::EliminarRegistro('Ocbanpro', 'Codbanpro', $clasemodelo->getCodbanpro());
    return -1;;
  }
}