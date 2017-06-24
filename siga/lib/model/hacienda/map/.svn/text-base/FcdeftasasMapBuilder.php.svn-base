<?php



class FcdeftasasMapBuilder {

	
	const CLASS_NAME = 'lib.model.hacienda.map.FcdeftasasMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcdeftasas');
		$tMap->setPhpName('Fcdeftasas');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcdeftasas_SEQ');

		$tMap->addColumn('CODTAS', 'Codtas', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESTAS', 'Destas', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addColumn('BSOUT', 'Bsout', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('VALTAS', 'Valtas', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODFUE', 'Codfue', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 