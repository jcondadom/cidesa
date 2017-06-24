<?php

/**
 * nomasouniniv actions.
 *
 * @package    siga
 * @subpackage nomasouniniv
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nomasouninivActions extends autonomasouninivActions
{
   public function executeIndex()
  {
    return $this->forward('nomasouniniv', 'edit');
  }  

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
     $this->configGrid();
  }

   public function configGrid($arreglo=array())
  {
     if (count($arreglo)>0)
     {
         $i=0;
         while ($i<count($arreglo))
         {
           $npasouniniv2= new Npasouniniv();
           $npasouniniv2->setCheck($arreglo[$i]["check"]);
           $npasouniniv2->setCoduniads($arreglo[$i]["coduniads"]);
           $npasouniniv2->setDesuniads($arreglo[$i]["desuniads"]);
           $det[]=$npasouniniv2;
           $i++;
         }
     }else {
         $c= new Criteria();
         $c->add(NpasouninivPeer::CODNIV,'');
         $det= NpasouninivPeer::doSelect($c);
     }
     
     $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/nomasouniniv/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');

     $this->obj =$this->columnas[0]->getConfig($det);

    $this->npasouniniv->setObj($this->obj);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $sw=true; $dato=""; $js="";

    switch ($ajax){
      case '1':        
        $sw=false;  $arreglo=array();
        $lonniv = $this->getRequestParameter('longitud','');
        $cambiareti = H::getConfApp('cambiareti', 'nomina', 'nomdefespnivorg');
        if (strlen($codigo)==$lonniv)
        {
          $c= new Criteria();
          $c->add(NpestorgPeer::CODNIV,$codigo);
          $reg= NpestorgPeer::doSelectOne($c);
          if ($reg)
          {
             $dato=$reg->getDesniv();
             Nomina::buscarUnidadesAdscripcion($codigo,$arreglo);               
          }else {
            if ($cambiareti!='')
             $js="alert_('La $cambiareti no existe'); $('npasouniniv_codniv').value=''; $('npasouniniv_desniv').value=''; $('npasouniniv_codniv').focus();"; 
            else
              $js="alert_('La La Ubicaci&oacute;n Administrativa no existe'); $('npasouniniv_codniv').value=''; $('npasouniniv_desniv').value=''; $('npasouniniv_codniv').focus();"; 
          }
        }else {
          if ($cambiareti!='')
           $js="alert_('La $cambiareti no es de &Uacute;ltimo Nivel'); $('npasouniniv_codniv').value=''; $('npasouniniv_desniv').value=''; $('npasouniniv_codniv').focus();"; 
         else
          $js="alert_('La Ubicaci&oacute;n Administrativa no es de &Uacute;ltimo Nivel'); $('npasouniniv_codniv').value=''; $('npasouniniv_desniv').value=''; $('npasouniniv_codniv').focus();"; 
        }
        $this->params=array();
        $this->npasouniniv = $this->getNpasouninivOrCreate();
        $this->updateNpasouninivFromRequest();
        $this->labels = $this->getLabels();
        $this->configGrid($arreglo);
        
        $output = '[["javascript","'.$js.'",""],["'.$cajtexmos.'","'.$dato.'",""],["","",""]]';
        break;    
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    if ($sw) return sfView::HEADER_ONLY;

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
    Nomina::salvarUniAdsUbiAdm($clasemodelo,$grid);
    return -1;
  }
}
