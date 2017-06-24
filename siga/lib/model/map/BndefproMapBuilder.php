<?php



class BndefproMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BndefproMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bndefpro');
		$tMap->setPhpName('Bndefpro');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bndefpro_SEQ');

		$tMap->addColumn('CODPROC', 'Codproc', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESPROC', 'Desproc', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 