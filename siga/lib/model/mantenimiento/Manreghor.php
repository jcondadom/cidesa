<?php

/**
 * Subclase para representar una fila de la tabla 'manreghor'.
 *
 * Contiene los Registros de Horómetros
 *
 * @package    Roraima
 * @subpackage lib.model.mantenimiento
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Manreghor extends BaseManreghor
{
	public function getNomequ()
	{
	  return H::getX_vacio('Numequ','Manregequ','Nomequ',$this->numequ);
	}

	public function getCentro()
    {        
        $codcencos = H::getX_vacio('Numequ','Manregequ','Codcencos',$this->numequ);
        if ($codcencos!=''){
           return $codcencos.' - '.H::getX_vacio('codcencos','Codefcencos','Descencos',$codcencos);
        }else return '';

    }

    public function getEstatus()
    {        
        $codest = H::getX_vacio('Numequ','Manregequ','Codest',$this->numequ);
        if ($codest!=''){
           return $codest.' - '.H::getX_vacio('codest','Manestequ','Desest',$codest);
        }else return '';

    }

    public function getTipequ()
    {        
        $codteq = H::getX_vacio('Numequ','Manregequ','Codteq',$this->numequ);
        if ($codteq!=''){
           return $codteq.' - '.H::getX_vacio('codteq','Mantipequ','Desteq',$codteq);
        }else return '';

    }

    public function getDesume()
	{
	  return H::getX_vacio('codume','Manunimed','Desume',self::getCodume());
	}
}
