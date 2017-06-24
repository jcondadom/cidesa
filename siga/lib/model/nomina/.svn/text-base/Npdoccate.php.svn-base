<?php

/**
 * Subclase para representar una fila de la tabla 'npdoccate'.
 *
 * Asociación de Catédras a Docente
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Npdoccate extends BaseNpdoccate
{
   protected $obj=array();

	public function getNomemp()
    {
        return Herramientas::getX_vacio('codemp','Nphojint','nomemp',self::getCodemp());
    }

    public function getDescate()
    {
        return Herramientas::getX_vacio('codcate','Npdefcate','descate',self::getCodcate());
    }
}
