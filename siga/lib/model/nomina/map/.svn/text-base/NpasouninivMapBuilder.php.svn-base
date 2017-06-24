<?php



class NpasouninivMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpasouninivMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npasouniniv');
		$tMap->setPhpName('Npasouniniv');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npasouniniv_SEQ');

		$tMap->addColumn('CODNIV', 'Codniv', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('CODUNIADS', 'Coduniads', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 