<?php

/**
 * Subclase para representar una fila de la tabla 'opctaben'.
 *
 * Tabla que contiene información referente a cuentas contables de los beneficiarios
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Opctaben extends BaseOpctaben
{
	public function getDescta()
   {
     return Herramientas::getX('codcta','Contabb','descta',self::getCodcta());
   }
}
