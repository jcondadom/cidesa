<?php



class BnpaisMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BnpaisMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bnpais');
		$tMap->setPhpName('Bnpais');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bnpais_SEQ');

		$tMap->addColumn('CODPAI', 'Codpai', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMPAI', 'Nompai', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 