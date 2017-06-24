<?php



class NpdefsitentMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpdefsitentMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npdefsitent');
		$tMap->setPhpName('Npdefsitent');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npdefsitent_SEQ');

		$tMap->addColumn('CODSITENT', 'Codsitent', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('DESSITENT', 'Dessitent', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('DIRENT', 'Dirent', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 