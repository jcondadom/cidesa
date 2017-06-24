<?php



class ManavaordMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.ManavaordMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('manavaord');
		$tMap->setPhpName('Manavaord');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('manavaord_SEQ');

		$tMap->addColumn('NUMORD', 'Numord', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECAVA', 'Fecava', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('OBSAVA', 'Obsava', 'string', CreoleTypes::VARCHAR, true, 2000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 