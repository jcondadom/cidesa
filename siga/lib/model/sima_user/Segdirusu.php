<?php

/**
 * Subclase para representar una fila de la tabla 'segdirusu'.
 *
 * Asociación de Direcciones a Usuario
 *
 * @package    Roraima
 * @subpackage lib.model.sima_user
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Segdirusu extends BaseSegdirusu
{
	protected $check="";

	public function getDesdirec()
    {
        return Herramientas::getX('coddirec','Cadefdirec','desdirec',self::getCoddirec());
    }
}
