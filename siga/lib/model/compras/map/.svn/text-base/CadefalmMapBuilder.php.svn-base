<?php



class CadefalmMapBuilder {

	
	const CLASS_NAME = 'lib.model.compras.map.CadefalmMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cadefalm');
		$tMap->setPhpName('Cadefalm');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cadefalm_SEQ');

		$tMap->addColumn('CODALM', 'Codalm', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('NOMALM', 'Nomalm', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('CODZON', 'Codzon', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addForeignKey('CODTIP', 'Codtip', 'int', CreoleTypes::INTEGER, 'catipalm', 'ID', false, null);

		$tMap->addForeignKey('CATIPALM_ID', 'CatipalmId', 'int', CreoleTypes::INTEGER, 'catipalm', 'ID', false, null);

		$tMap->addColumn('DIRALM', 'Diralm', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('CODALT', 'Codalt', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CODEDO', 'Codedo', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('ESPTOVEN', 'Esptoven', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('CODTIPPV', 'Codtippv', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODCTA', 'Codcta', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('TIPREG', 'Tipreg', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('UNICOR', 'Unicor', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CORFAC', 'Corfac', 'double', CreoleTypes::NUMERIC, false, 16);

		$tMap->addColumn('CORNUMCTR', 'Cornumctr', 'double', CreoleTypes::NUMERIC, false, 16);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CODALMSAP', 'Codalmsap', 'string', CreoleTypes::VARCHAR, false, 50);

	} 
} 