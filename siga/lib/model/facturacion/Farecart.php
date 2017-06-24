<?php

/**
 * Subclass for representing a row from the 'farecart'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Farecart.php 48262 2012-05-29 18:49:22Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Farecart extends BaseFarecart
{
    protected $obj=array();


    public function getDesart()
    {
  	    return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
    }

    public function getNomrgo()
    {
  	    return Herramientas::getX('CODRGO','Farecarg','Nomrgo',self::getCodrgo());
    }

}
