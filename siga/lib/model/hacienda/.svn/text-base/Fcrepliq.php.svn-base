<?php

/**
 * Subclass for representing a row from the 'fcrepliq'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fcrepliq.php 32426 2009-09-02 03:49:02Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class Fcrepliq extends BaseFcrepliq
{
     protected $desact='';
     protected $unidad='';
     protected $minimo='';

      public function getDesact(){
         return H::getX_vacio('codact', 'FcActCom', 'desact', self::getCodact());

      }
}
