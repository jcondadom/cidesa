<?php



class MandetesttraMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.MandetesttraMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mandetesttra');
		$tMap->setPhpName('Mandetesttra');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('mandetesttra_SEQ');

		$tMap->addColumn('CODEST', 'Codest', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CANINS', 'Canins', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CANREQ', 'Canreq', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 