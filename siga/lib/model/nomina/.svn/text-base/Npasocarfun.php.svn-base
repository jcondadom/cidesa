<?php

/**
 * Subclase para representar una fila de la tabla 'npasocarfun'.
 *
 * Tabla para registrar el las funciones de los Cargos
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Npasocarfun extends BaseNpasocarfun
{
	protected $obj=array();
	
	public function getLongmas(){
		return strlen(H::ObtenerFormato('Npdefgen', 'Fororg'));
	}

	public function getNomcar()
    {      
        return H::getX_vacio('Codcar','Npcargos','Nomcar',self::getCodcar());
    }

    public function getDesniv()
    {      
        return H::getX_vacio('Codniv','Npestorg','Desniv',self::getCodniv());
    }
}
