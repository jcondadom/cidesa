<?php

/**
 * Subclase para representar una fila de la tabla 'npjorcpt'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Npjorcpt extends BaseNpjorcpt
{
    protected $obj=array();

    public function getNomcon()
    {
        return Herramientas::getX('codcon','Npdefcpt','nomcon',self::getCodcon());
    }

    public function getDesjor()
    {
        return Herramientas::getX('codjor','Npjortur','Desjor',self::getCodjor());
    }

    public function getNomnom()
    {
        return Herramientas::getX('codnom','Npnomina','Nomnom',self::getCodnom());
    }
}
