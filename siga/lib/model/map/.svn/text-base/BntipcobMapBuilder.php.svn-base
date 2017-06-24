<?php



class BntipcobMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BntipcobMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bntipcob');
		$tMap->setPhpName('Bntipcob');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bntipcob_SEQ');

		$tMap->addColumn('CODCOB', 'Codcob', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESCOB', 'Descob', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 