<?php



class CausualmMapBuilder {

	
	const CLASS_NAME = 'lib.model.compras.map.CausualmMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('causualm');
		$tMap->setPhpName('Causualm');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('causualm_SEQ');

		$tMap->addColumn('CEDEMP', 'Cedemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addForeignKey('CODALM', 'Codalm', 'string', CreoleTypes::VARCHAR, 'cadefalm', 'CODALM', true, 20);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 