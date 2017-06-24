<?php



class BnprosemMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BnprosemMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bnprosem');
		$tMap->setPhpName('Bnprosem');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bnprosem_SEQ');

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESPRO', 'Despro', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 