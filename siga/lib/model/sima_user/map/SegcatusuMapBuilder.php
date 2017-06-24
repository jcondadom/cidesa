<?php



class SegcatusuMapBuilder {

	
	const CLASS_NAME = 'lib.model.sima_user.map.SegcatusuMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap('sima_user');

		$tMap = $this->dbMap->addTable('segcatusu');
		$tMap->setPhpName('Segcatusu');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('segcatusu_SEQ');

		$tMap->addColumn('LOGUSE', 'Loguse', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 