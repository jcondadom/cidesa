<?php

/**
 * Subclase para representar una fila de la tabla 'npgrutur'.
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
class Npgrutur extends BaseNpgrutur
{
    protected $obj=array();

    public function getDestur()
    {
        return Herramientas::getX('codtur','Npturnos','Destur',self::getCodtur());
    }

    public function getNomnom()
    {
        return Herramientas::getX('codnom','Npnomina','Nomnom',self::getCodnom());
    }
}
