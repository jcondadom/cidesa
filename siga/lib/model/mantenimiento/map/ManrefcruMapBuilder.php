<?php



class ManrefcruMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.ManrefcruMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('manrefcru');
		$tMap->setPhpName('Manrefcru');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('manrefcru_SEQ');

		$tMap->addColumn('NUMSOL', 'Numsol', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('STCCOD', 'Stccod', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('REFERE', 'Refere', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 