<?php



class SeggrupoMapBuilder {

	
	const CLASS_NAME = 'lib.model.sima_user.map.SeggrupoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('seggrupo');
		$tMap->setPhpName('Seggrupo');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('seggrupo_SEQ');

		$tMap->addColumn('CODGRU', 'Codgru', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESGRU', 'Desgru', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 