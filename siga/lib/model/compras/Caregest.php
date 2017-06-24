<?php

/**
 * Subclase para representar una fila de la tabla 'caregest'.
 *
 * Tabla que contiene la informaciÃ³n de las estados por regiones
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Caregest extends BaseCaregest
{
    public function getNomedo()
    {
        return Herramientas::getX('codedo','Ocestado','nomedo',self::getCodedo());
    }
}
