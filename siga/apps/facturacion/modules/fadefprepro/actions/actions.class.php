<?php

/**
 * fadefprepro actions.
 *
 * @package    siga
 * @subpackage fadefprepro
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class fadefpreproActions extends autofadefpreproActions
{
  public function executeIndex()
  {
    return $this->forward('fadefprepro', 'edit');
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid();
  }

  public function configGrid($codart='', $codcan='')
  {
    $c = new Criteria();
    $c->add(FapreprocanPeer::CODART,$codart);
    $c->add(FapreprocanPeer::CODCAN,$codcan);
    $reg = FapreprocanPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/fadefprepro/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
    $this->columnas[1][0]->setCombo(array('L/V' => 'L/V','L/S' => 'L/S', 'L/D' => 'L/D'));

    $this->obj =$this->columnas[0]->getConfig($reg);

    $this->fapreprocan->setObj($this->obj);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $js=""; $dato=""; $sw=true;

    switch ($ajax){
      case '1':
         $sw=false;
         $longitud=strlen(H::getMascaraArticulo());
         $canal = $this->getRequestParameter('canal','');
         $u= new Criteria();
         $u->add(CaregartPeer::CODART,$codigo);
         $result= CaregartPeer::doSelectOne($u);
         if ($result)
         {
             if (strlen($codigo)==$longitud) {
                 $dato=$result->getDesart();
             }else {
              $codigo='';
               $js="alert_('El Art&iacute;culo no es de &Uacute;ltimo Nivel'); $('fapreprocan_codart').value=''; $('$cajtexcom').value=''; $('fapreprocan_codart').focus();";
             }
         }else  { 
            $codigo='';
            $js="alert_('El Art&iacute;culo no Existe'); $('fapreprocan_codart').value=''; $('$cajtexcom').value=''; $('fapreprocan_codart').focus();";
          }
         $this->fapreprocan = $this->getFapreprocanOrCreate();
         $this->updateFapreprocanFromRequest();
         $this->params=array();
         $this->labels = $this->getLabels();
         $this->configGrid($codigo,$canal);
        $output = '[["javascript","'.$js.'",""],["'.$cajtexmos.'","'.$dato.'",""],["","",""]]';
        break;      
      case '2':
        $sw=false;
         $arti = $this->getRequestParameter('art');
         if ($arti=='') {
          $codigo='';
          $js="alert_('Debe seleccionar el Art&iacute;culo'); $('fapreprocan_codart').focus();";
        }else {
           $u= new Criteria();
           $u->add(FadefcanPeer::CODCAN,$codigo);
           $result= FadefcanPeer::doSelectOne($u);
           if ($result)
           {
            $dato=$result->getDescan();
           }else {
            $codigo='';
            $arti='';
            $js="alert_('El Canal no est&aacute; Registrado'); $('fapreprocan_codcan').value=''; $('$cajtexcom').value=''; $('fapreprocan_codcan').focus();";
           }
        } 

         $this->fapreprocan = $this->getFapreprocanOrCreate();
         $this->updateFapreprocanFromRequest();
         $this->params=array();
         $this->labels = $this->getLabels();
         $this->configGrid($arti,$codigo);
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
    Facturacion::salvarPreProCanFre($clasemodelo,$grid);
    return -1;
  }
}
