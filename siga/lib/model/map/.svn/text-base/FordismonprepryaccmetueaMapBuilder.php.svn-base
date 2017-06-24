<?php



class FordismonprepryaccmetueaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FordismonprepryaccmetueaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fordismonprepryaccmetuea');
		$tMap->setPhpName('Fordismonprepryaccmetuea');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fordismonprepryaccmetuea_SEQ');

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODACCESP', 'Codaccesp', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODMET', 'Codmet', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addColumn('CODACT', 'Codact', 'string', CreoleTypes::VARCHAR, false, 5);

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('PERPRE', 'Perpre', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('MONPER', 'Monper', 'double', CreoleTypes::NUMERIC, false, 20);

		$tMap->addColumn('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 