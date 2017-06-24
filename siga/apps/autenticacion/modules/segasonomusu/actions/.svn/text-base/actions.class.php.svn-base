<?php

/**
 * segasonomusu actions.
 *
 * @package    siga
 * @subpackage segasonomusu
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class segasonomusuActions extends autosegasonomusuActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
     $this->configGrid($this->usuarios->getLoguse());
  }

    public function configGrid($loguse="")
  {
    $nominas=array();
    $esqact=sfContext::getInstance()->getUser()->getAttribute('schema');

      $sql='select \'1\' as check,a.codnom as codnom, b.nomnom as nomnom from "SIMA_USER".segusunom a left outer join "'.$esqact.'".npnomina b on a.codnom=b.codnom
            where a.loguse=\''.$loguse.'\'
            union 
            select \'0\' as check,codnom as codnom, nomnom as nomnom from "'.$esqact.'".npnomina where codnom not in (select codnom from "SIMA_USER".segusunom where loguse=\''.$loguse.'\')
            order by 2';
     Herramientas::BuscarDatos($sql,$result);
     if (count($result)>0)
     {
         $i=0;
         while ($i<count($result))
         {
             $segusunom= new Segusunom();
             $segusunom->setCheck($result[$i]["check"]);
             $segusunom->setCodnom($result[$i]["codnom"]);
             $nominas[]=$segusunom;             
             $i++;
         }
     }
      
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/segasonomusu/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_nominas');

    $this->obj =$this->columnas[0]->getConfig($nominas);

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
    Autenticacion::salvarAsoNomUsu($clasemodelo, $grid);
    return -1;
  }
}
