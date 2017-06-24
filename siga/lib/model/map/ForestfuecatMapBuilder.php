<?php



class ForestfuecatMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ForestfuecatMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('forestfuecat');
		$tMap->setPhpName('Forestfuecat');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('forestfuecat_SEQ');

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODPARING', 'Codparing', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('MONFIN', 'Monfin', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 