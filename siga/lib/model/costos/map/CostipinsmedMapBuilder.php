<?php



class CostipinsmedMapBuilder {

	
	const CLASS_NAME = 'lib.model.costos.map.CostipinsmedMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('costipinsmed');
		$tMap->setPhpName('Costipinsmed');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('costipinsmed_SEQ');

		$tMap->addColumn('CODINSMED', 'Codinsmed', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('DESINSMED', 'Desinsmed', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 