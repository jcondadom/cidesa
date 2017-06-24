<?php



class ManclaequMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.ManclaequMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('manclaequ');
		$tMap->setPhpName('Manclaequ');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('manclaequ_SEQ');

		$tMap->addColumn('CODCLA', 'Codcla', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESCLA', 'Descla', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 