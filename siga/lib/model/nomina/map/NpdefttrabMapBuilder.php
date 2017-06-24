<?php



class NpdefttrabMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpdefttrabMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npdefttrab');
		$tMap->setPhpName('Npdefttrab');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npdefttrab_SEQ');

		$tMap->addColumn('CODTTRAB', 'Codttrab', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESTTRAB', 'Desttrab', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 