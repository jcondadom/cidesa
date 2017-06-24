<?php

/**
 * Subclase para representar una fila de la tabla 'manregequ'.
 *
 * Contiene los Registros de los Equipos
 *
 * @package    Roraima
 * @subpackage lib.model.mantenimiento
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Manregequ extends BaseManregequ
{
	protected $objnom=array();
	protected $objcom=array();
	protected $longitud="";
	
	public function getLongitud()
	{
		$mascara = H::ObtenerFormato('Npdefgen', 'Fororg');
         $lonniv = strlen($mascara);
		return $lonniv;
	}

	public function getDesteq()
	{
	  return H::getX_vacio('codteq','Mantipequ','Desteq',self::getCodteq());
	}

	public function getDeside()
	{
	  return H::getX_vacio('codide','Manidegru','Deside',self::getCodide());
	}

	public function getDescla()
	{
	  return H::getX_vacio('codcla','Manclaequ','Descla',self::getCodcla());
	}

	public function getDestal()
	{
	  return H::getX_vacio('codtal','Mantipali','Destal',self::getCodtal());
	}

	public function getDestta()
	{
	  return H::getX_vacio('codtta','Mantiptra','Destta',self::getCodtta());
	}

	public function getDesfab()
	{
	  return H::getX_vacio('codfab','mandeffab','Desfab',self::getCodfab());
	}

	public function getDesdis()
	{
	  return H::getX_vacio('coddis','Bndisbie','Desdis',self::getCoddis());
	}

	public function getDestga()
	{
	  return H::getX_vacio('codtga','Mantipgar','Destga',self::getCodtga());
	}

	public function getDesume()
	{
	  return H::getX_vacio('codume','Manunimed','Desume',self::getCodume());
	}

	public function getDesest()
	{
	  return H::getX_vacio('codest','Manestequ','Desest',self::getCodest());
	}

	public function getDesubi()
	{
	  return H::getX_vacio('codubi','Bnubibie','Desubi',self::getCodubi());
	}

	public function getDesniv()
	{
	  return H::getX_vacio('codniv','Npestorg','Desniv',self::getCodniv());
	}

    public function getDesuni()
	{
	  return H::getX_vacio('coduni','Manunipro','Desuni',self::getCoduni());
	}

	public function getDescencos()
	{
	  return H::getX_vacio('codcencos','Codefcencos','Descencos',self::getCodcencos());
	}

	public function getNomcar()
	{
	  return H::getX_vacio('codcar','Npcargos','Nomcar',self::getCodcar());
	}

}
