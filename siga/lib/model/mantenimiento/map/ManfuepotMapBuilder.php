<?php



class ManfuepotMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.ManfuepotMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('manfuepot');
		$tMap->setPhpName('Manfuepot');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('manfuepot_SEQ');

		$tMap->addColumn('CODFUE', 'Codfue', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESFUE', 'Desfue', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 