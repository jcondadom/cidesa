<?php



class NpjorturMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpjorturMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npjortur');
		$tMap->setPhpName('Npjortur');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npjortur_SEQ');

		$tMap->addColumn('CODJOR', 'Codjor', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('DESJOR', 'Desjor', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addColumn('HORINI', 'Horini', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('HORFIN', 'Horfin', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('NUMHOR', 'Numhor', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('JORLAB', 'Jorlab', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 