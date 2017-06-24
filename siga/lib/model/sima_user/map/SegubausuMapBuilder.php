<?php



class SegubausuMapBuilder {

	
	const CLASS_NAME = 'lib.model.sima_user.map.SegubausuMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('segubausu');
		$tMap->setPhpName('Segubausu');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('segubausu_SEQ');

		$tMap->addColumn('LOGUSE', 'Loguse', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('CODUBI', 'Codubi', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 