<?php

/**
 * segasocenusu actions.
 *
 * @package    siga
 * @subpackage segasocenusu
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class segasocenusuActions extends autosegasocenusuActions
{

// Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid($this->usuarios->getLoguse());
  }

  public function configGrid($loguse="")
  {
    $centros=array();
    $esqact=sfContext::getInstance()->getUser()->getAttribute('schema');
    $sql='select \'1\' as check,a.codcen as codcen, b.descen as descen from "SIMA_USER".segcenusu a left outer join "'.$esqact.'".cadefcen b on a.codcen=b.codcen
          where a.loguse=\''.$loguse.'\'
          union 
          select \'0\' as check,codcen as codcen, descen as descen from "'.$esqact.'".cadefcen where codcen not in (select codcen from "SIMA_USER".segcenusu where loguse=\''.$loguse.'\')
          order by 2';
    Herramientas::BuscarDatos($sql,$result);
    if (count($result)>0)
    {
       $i=0;
       while ($i<count($result))
       {
           $segcenusu= new Segcenusu();
           $segcenusu->setCheck($result[$i]["check"]);
           $segcenusu->setCodcen($result[$i]["codcen"]);
           $centros[]=$segcenusu;             
           $i++;
       }
     }
      
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/segasocenusu/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_centros');

    $this->obj =$this->columnas[0]->getConfig($centros);

    $this->usuarios->setGrid($this->obj);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');

    switch ($ajax){
      case '1':
        $output = '[["","",""],["","",""],["","",""]]';
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
    Autenticacion::salvarAsoCenUsu($clasemodelo, $grid);
    return -1;
  }

}
