<?php



class BndefusoMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BndefusoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bndefuso');
		$tMap->setPhpName('Bndefuso');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bndefuso_SEQ');

		$tMap->addColumn('CODUSO', 'Coduso', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESUSO', 'Desuso', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 