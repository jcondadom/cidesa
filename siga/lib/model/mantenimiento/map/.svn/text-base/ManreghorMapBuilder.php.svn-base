<?php



class ManreghorMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.ManreghorMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('manreghor');
		$tMap->setPhpName('Manreghor');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('manreghor_SEQ');

		$tMap->addColumn('NUMEQU', 'Numequ', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('TIPING', 'Tiping', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('VALHOR', 'Valhor', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODUME', 'Codume', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('VALACU', 'Valacu', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 