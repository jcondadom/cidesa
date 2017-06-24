<?php

/**
 * Subclase para representar una fila de la tabla 'npsupemp'.
 *
 * Tabla que graba las suplencias realizadas a los empleados
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Npsupemp extends BaseNpsupemp
{

	public function getNomemp()
    {
        return H::getX_vacio('Codemp','Nphojint','Nomemp',self::getCodemp());
    }
    public function getNomempsup()
    {
        return H::getX_vacio('Codemp','Nphojint','Nomemp',self::getCodempsup());
    }
}
