<?php



class BnclabieMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BnclabieMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bnclabie');
		$tMap->setPhpName('Bnclabie');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bnclabie_SEQ');

		$tMap->addColumn('CODCLA', 'Codcla', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESCLA', 'Descla', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 