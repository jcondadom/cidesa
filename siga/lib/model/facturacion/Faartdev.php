<?php

/**
 * Subclass for representing a row from the 'faartdev'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Faartdev.php 50195 2012-11-26 21:33:27Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Faartdev extends BaseFaartdev
{
  protected $codalm="";
  protected $candev2=0;

  public function getDesart()
  {
   return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
  }

  public function afterHydrate(){
  	$this->candev2=$this->candev;
  }

}
