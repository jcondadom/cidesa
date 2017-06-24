<?php



class BnmodtraMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BnmodtraMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bnmodtra');
		$tMap->setPhpName('Bnmodtra');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bnmodtra_SEQ');

		$tMap->addColumn('CODMOD', 'Codmod', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESMOD', 'Desmod', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 