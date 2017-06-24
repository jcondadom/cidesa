<?php



class RhplacurMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RhplacurMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('rhplacur');
		$tMap->setPhpName('Rhplacur');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('rhplacur_SEQ');

		$tMap->addColumn('CODPLACUR', 'Codplacur', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESPLACUR', 'Desplacur', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('CODCUR', 'Codcur', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 