<?php



class ManactestMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.ManactestMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('manactest');
		$tMap->setPhpName('Manactest');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('manactest_SEQ');

		$tMap->addColumn('CODACT', 'Codact', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('DESACT', 'Desact', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addColumn('CEDEMP', 'Cedemp', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('CODGRU', 'Codgru', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('PRIORI', 'Priori', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CEDRES', 'Cedres', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('CODTMA', 'Codtma', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('TIPORD', 'Tipord', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECCRE', 'Feccre', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODGRR', 'Codgrr', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 