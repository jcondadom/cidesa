<?php



class ManrhcordMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.ManrhcordMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('manrhcord');
		$tMap->setPhpName('Manrhcord');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('manrhcord_SEQ');

		$tMap->addColumn('NUMORD', 'Numord', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CEDREC', 'Cedrec', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('CANHOR', 'Canhor', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 