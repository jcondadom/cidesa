<?php

/**
 * Subclass for representing a row from the 'liemppar'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Liemppar.php 44640 2011-06-03 13:03:21Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Liemppar extends BaseLiemppar
{
    protected $grid=array();
    protected $precal=false;

    public function getDescrip()
    {
        return H::GetX('Numexp','Liplieesp','Descrip',$this->numexp);
    }

    public function getNumplie()
    {
        return H::GetX('Numexp','Liplieesp','Numplie',$this->numexp);
    }

    public function getNompro()
    {
        return H::GetX_vacio('Codpro','Caprovee','Nompro',self::getCodpro());
    }
}
