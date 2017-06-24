<?php

/**
 * almdetoc actions.
 *
 * @package    siga
 * @subpackage almdetoc
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class almdetocActions extends autoalmdetocActions
{

  public function executeIndex()
  {
    return $this->forward('almdetoc', 'edit');
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
     $ordcom=$this->getUser()->getAttribute('ordcom',null,$this->getRequestParameter('formulario'));
     $this->configGrid($ordcom);

  }

  public function configGrid($ordcom='')
  {
   $c = new Criteria();
   $c->add(CaartordPeer::ORDCOM,$ordcom);
   $reg = CaartordPeer::doSelect($c);

   $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/almdetoc/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_caartord');

   $this->obj =$this->columnas[0]->getConfig($reg);

   $this->caordcom->setObj($this->obj);
  }

}
