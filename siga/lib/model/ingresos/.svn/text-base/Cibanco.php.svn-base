<?php

/**
 * Subclase para representar una fila de la tabla 'cibanco'.
 *
 * Tabla donde se graban los bancos a usar en ingresos
 *
 * @package    Roraima
 * @subpackage lib.model.ingresos
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Cibanco extends BaseCibanco
{
	public function getNomcue()
    {
		return Herramientas::getX('NUMCUE','Tsdefban','Nomcue',self::getNumcue());
    }

    public function getDescta()
    {
		return Herramientas::getX('CODCTA','Contabb','Descta',self::getCodcta());
    }
}
