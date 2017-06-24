<?php



class ForestpercatMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ForestpercatMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('forestpercat');
		$tMap->setPhpName('Forestpercat');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('forestpercat_SEQ');

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('PERPRE', 'Perpre', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('CANPER', 'Canper', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 