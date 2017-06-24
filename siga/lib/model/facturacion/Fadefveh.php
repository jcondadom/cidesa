<?php

/**
 * Subclase para representar una fila de la tabla 'fadefveh'.
 *
 * null
 *
 * @package    Roraima
 * @subpackage lib.model.facturacion
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Fadefveh extends BaseFadefveh
{
	public function __toString()
	{
		return $this->plaveh.'-'.$this->marca;
	}
    public function getNomemptra() {
        return Herramientas::getX_vacio('CODEMPTRA', 'Faemptra', 'Nomemptra', self::getCodemptra());
    }
}
