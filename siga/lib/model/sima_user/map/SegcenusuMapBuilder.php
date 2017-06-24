<?php



class SegcenusuMapBuilder {

	
	const CLASS_NAME = 'lib.model.sima_user.map.SegcenusuMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('segcenusu');
		$tMap->setPhpName('Segcenusu');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('segcenusu_SEQ');

		$tMap->addColumn('LOGUSE', 'Loguse', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('CODCEN', 'Codcen', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 