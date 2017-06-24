<?php



class CpdoccauMapBuilder {

	
	const CLASS_NAME = 'lib.model.presupuesto.map.CpdoccauMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cpdoccau');
		$tMap->setPhpName('Cpdoccau');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cpdoccau_SEQ');

		$tMap->addColumn('TIPCAU', 'Tipcau', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMEXT', 'Nomext', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('NOMABR', 'Nomabr', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('REFIER', 'Refier', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('AFEPRC', 'Afeprc', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('AFECOM', 'Afecom', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('AFECAU', 'Afecau', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('AFEDIS', 'Afedis', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('CODCTA', 'Codcta', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODTIPTRA', 'Codtiptra', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('GENLIBCOM', 'Genlibcom', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 