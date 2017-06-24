<?php

/**
 * Subclase para representar una fila de la tabla 'bnciudad'.
 *
 * Tabla que almacena las Ciudades
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Bnciudad extends BaseBnciudad
{
	public function getNommun()
    {
       return H::getX('CODMUN','Bnmunicip','Nommun',self::getBnmunicipCodmun());
    }
}
