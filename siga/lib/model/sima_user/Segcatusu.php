<?php

/**
 * Subclase para representar una fila de la tabla 'segcatusu'.
 *
 * Asociación de Categorias a Usuario
 *
 * @package    Roraima
 * @subpackage lib.model.sima_user
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Segcatusu extends BaseSegcatusu
{
	protected $check="";

	public function getNomcat()
    {
        return Herramientas::getX('codcat','Npcatpre','nomcat',self::getCodcat());
    }
}
