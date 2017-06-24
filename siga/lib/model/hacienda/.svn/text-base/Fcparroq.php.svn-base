<?php

/**
 * Subclass for representing a row from the 'fcparroq'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fcparroq.php 32426 2009-09-02 03:49:02Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class Fcparroq extends BaseFcparroq
{
    public function getNompai()
    {
        return Herramientas::getX_vacio('codpai','Fcpais','nompai',self::getCodpai());
    }

    public function getNomedo()
    {
        return Herramientas::getXx_vacio('Fcestado', array('CODPAI','CODEDO'), array(self::getCodpai(),self::getCodedo()), 'Nomedo');
    }
     public function getNommun()
    {
        return Herramientas::getXx_vacio('Fcmunici', array('CODPAI','CODEDO','CODMUN'), array(self::getCodpai(),self::getCodedo(),self::getCodmun()), 'Nommun');
    }
}
