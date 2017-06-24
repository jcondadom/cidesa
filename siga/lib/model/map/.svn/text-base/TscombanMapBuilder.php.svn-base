<?php



class TscombanMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TscombanMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('tscomban');
		$tMap->setPhpName('Tscomban');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('tscomban_SEQ');

		$tMap->addColumn('CODCOM', 'Codcom', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESCOM', 'Descom', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('MONCOM', 'Moncom', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODCTA', 'Codcta', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 