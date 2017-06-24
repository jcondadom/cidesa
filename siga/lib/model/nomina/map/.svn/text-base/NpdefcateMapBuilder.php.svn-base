<?php



class NpdefcateMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpdefcateMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npdefcate');
		$tMap->setPhpName('Npdefcate');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npdefcate_SEQ');

		$tMap->addColumn('CODCATE', 'Codcate', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESCATE', 'Descate', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 