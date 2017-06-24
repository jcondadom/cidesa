<?php



class ForestcoscatMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ForestcoscatMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('forestcoscat');
		$tMap->setPhpName('Forestcoscat');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('forestcoscat_SEQ');

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CANUNI', 'Canuni', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CANART', 'Canart', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONART', 'Monart', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TOTPRE', 'Totpre', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODFIN', 'Codfin', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODTIP', 'Codtip', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 