<?php



class NpdefinsextMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpdefinsextMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npdefinsext');
		$tMap->setPhpName('Npdefinsext');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npdefinsext_SEQ');

		$tMap->addColumn('CEDINS', 'Cedins', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('NOMINS', 'Nomins', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('CARINS', 'Carins', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 