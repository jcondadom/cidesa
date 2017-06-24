<?php

/**
 * Subclase para representar una fila de la tabla 'tsdetrei'.
 *
 * Tabla que contiene información referente al detalle del reintegro en los Movimientos en Libros.
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Tsdetrei extends BaseTsdetrei
{
	public function getNompre()
  {
    return H::getX_vacio('CODPRE','Cpdeftit','Nompre',self::getCodpre());
  }  
}
