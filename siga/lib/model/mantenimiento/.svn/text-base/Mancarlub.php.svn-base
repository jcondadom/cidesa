<?php

/**
 * Subclase para representar una fila de la tabla 'mancarlub'.
 *
 * Contiene los Registros de la Carga de Lubricantes o Combustible
 *
 * @package    Roraima
 * @subpackage lib.model.mantenimiento
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Mancarlub extends BaseMancarlub
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

    public function getDestlu()
	{
	  return H::getX_vacio('codtlu','Mantiplub','Destlu',self::getCodtlu());
	}

	public function getLubric(){
		$lubric=H::getX_vacio('codtlu','Mantiplub','Lubric',self::getCodtlu());
		if ($lubric=='C')
	      return 'Combustible';
	    else if ($lubric=='L')
	      return 'Lubricante';
	    else if ($lubric=='G')
	      return 'Grasa';
	    else if ($lubric=='R')
	      return 'Refrigerante';
	    else return '';
	}

    public function getUnidad(){
        $unidad=H::getX_vacio('codtlu','Mantiplub','Codume',self::getCodtlu());
        return $unidad.' -'.H::getX_vacio('codume','Manunimed','Desume',$unidad);
    }
}
