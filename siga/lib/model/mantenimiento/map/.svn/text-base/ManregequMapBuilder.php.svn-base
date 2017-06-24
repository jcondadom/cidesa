<?php



class ManregequMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.ManregequMapBuilder';

	
	private $dbMap;

	
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap('propel');

		$tMap = $this->dbMap->addTable('manregequ');
		$tMap->setPhpName('Manregequ');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('manregequ_SEQ');

		$tMap->addColumn('NUMEQU', 'Numequ', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('NOMEQU', 'Nomequ', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addColumn('SEREQU', 'Serequ', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CODTEQ', 'Codteq', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODIDE', 'Codide', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODCLA', 'Codcla', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODTAL', 'Codtal', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODTTA', 'Codtta', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODFAB', 'Codfab', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('FECFAB', 'Fecfab', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODDIS', 'Coddis', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('CODMON', 'Codmon', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('VALMON', 'Valmon', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('COSEQU', 'Cosequ', 'double', CreoleTypes::NUMERIC, false, 20);

		$tMap->addColumn('CODTGA', 'Codtga', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('VALGAR', 'Valgar', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FECGAR', 'Fecgar', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODUME', 'Codume', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('COMBUS', 'Combus', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODEST', 'Codest', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODUBI', 'Codubi', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('CODNIV', 'Codniv', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODUNI', 'Coduni', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODCENCOS', 'Codcencos', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CARCOS', 'Carcos', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODCAR', 'Codcar', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('LOGUSE', 'Loguse', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('PESO', 'Peso', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('LONGIT', 'Longit', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('ALTURA', 'Altura', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('ANCHO', 'Ancho', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('BALDE', 'Balde', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TOLBA', 'Tolba', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('LLENAD', 'Llenad', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('LUBRIC', 'Lubric', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 