<?php

/**
 * Subclase para representar una fila de la tabla 'viaasoempaut'.
 *
 * Tabla que contiene información referente los Empleados que autorizan viaticos
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Viaasoempaut extends BaseViaasoempaut
{
	public function getNomemp()
    {
      return H::getX_vacio('Codemp','Nphojint','Nomemp',$this->codemp);
    }

    public function getNomempaut()
    {
      return H::getX_vacio('Codemp','Nphojint','Nomemp',$this->codempaut);        
    }
}
