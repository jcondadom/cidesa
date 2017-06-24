<?php



class NpdefofiMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpdefofiMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npdefofi');
		$tMap->setPhpName('Npdefofi');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npdefofi_SEQ');

		$tMap->addColumn('CODOFI', 'Codofi', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESOFI', 'Desofi', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 