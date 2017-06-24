<?php



class TsdefmonMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TsdefmonMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('tsdefmon');
		$tMap->setPhpName('Tsdefmon');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('tsdefmon_SEQ');

		$tMap->addColumn('CODMON', 'Codmon', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('NOMMON', 'Nommon', 'string', CreoleTypes::VARCHAR, true, 40);

		$tMap->addColumn('AUMDIS', 'Aumdis', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 