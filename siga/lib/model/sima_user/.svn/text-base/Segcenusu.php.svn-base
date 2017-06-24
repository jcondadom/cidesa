<?php

/**
 * Subclase para representar una fila de la tabla 'segcenusu'.
 *
 * Asociación de Centro de Costo a Usuario
 *
 * @package    Roraima
 * @subpackage lib.model.sima_user
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Segcenusu extends BaseSegcenusu
{
	protected $check="";

	public function getDescen()
    {
        return Herramientas::getX('codcen','Cadefcen','descen',self::getCodcen());
    }
}
