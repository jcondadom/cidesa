<?php



class NpdetsolayuecoMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpdetsolayuecoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npdetsolayueco');
		$tMap->setPhpName('Npdetsolayueco');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npdetsolayueco_SEQ');

		$tMap->addColumn('NUMSOLAYU', 'Numsolayu', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODEMPAYU', 'Codempayu', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 