<?php



class NpsolayuecoMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpsolayuecoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npsolayueco');
		$tMap->setPhpName('Npsolayueco');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npsolayueco_SEQ');

		$tMap->addColumn('NUMSOLAYU', 'Numsolayu', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECSOLAYU', 'Fecsolayu', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('DESSOLAYU', 'Dessolayu', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('TIPCOM', 'Tipcom', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('ESNOEMP', 'Esnoemp', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODEMPAYU', 'Codempayu', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('NUMPUNCUE', 'Numpuncue', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CODTIPAYU', 'Codtipayu', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('CODEVE', 'Codeve', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addColumn('CODNIV', 'Codniv', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('MONAYU', 'Monayu', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('REFCOM', 'Refcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 