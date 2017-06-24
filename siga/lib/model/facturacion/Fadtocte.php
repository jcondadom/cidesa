<?php

/**
 * Subclass for representing a row from the 'fadtocte'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fadtocte.php 47350 2012-02-16 14:29:19Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fadtocte extends BaseFadtocte
{
	public $obj = array();

    public function getDesdesc()
    {
  	    return Herramientas::getX('CODDESC','Fadescto','Desdesc',self::getCoddesc());
    }

    public function getMondesc()
    {
  	    return number_format(Herramientas::getX('CODDESC','Fadescto','Mondesc',self::getCoddesc()),2,',','.');
    }

}
