<?php



class SegconusuMapBuilder {

	
	const CLASS_NAME = 'lib.model.sima_user.map.SegconusuMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('segconusu');
		$tMap->setPhpName('Segconusu');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('segconusu_SEQ');

		$tMap->addColumn('LOGUSE', 'Loguse', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 