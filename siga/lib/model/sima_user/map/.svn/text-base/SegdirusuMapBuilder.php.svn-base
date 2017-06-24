<?php



class SegdirusuMapBuilder {

	
	const CLASS_NAME = 'lib.model.sima_user.map.SegdirusuMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('segdirusu');
		$tMap->setPhpName('Segdirusu');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('segdirusu_SEQ');

		$tMap->addColumn('LOGUSE', 'Loguse', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('CODDIREC', 'Coddirec', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 