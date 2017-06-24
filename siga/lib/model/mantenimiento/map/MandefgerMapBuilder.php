<?php



class MandefgerMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.MandefgerMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mandefger');
		$tMap->setPhpName('Mandefger');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('mandefger_SEQ');

		$tMap->addColumn('CODGER', 'Codger', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESGER', 'Desger', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 