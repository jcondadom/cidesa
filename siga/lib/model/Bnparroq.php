<?php

/**
 * Subclase para representar una fila de la tabla 'bnparroq'.
 *
 * Tabla que almacena las Parroquias
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Bnparroq extends BaseBnparroq
{
	public function getNommun()
    {
       return H::getX('CODMUN','Bnmunicip','Nommun',self::getBnmunicipCodmun());
    }
}
