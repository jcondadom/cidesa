<?php



class MancarlubMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.MancarlubMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mancarlub');
		$tMap->setPhpName('Mancarlub');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('mancarlub_SEQ');

		$tMap->addColumn('NUMEQU', 'Numequ', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODTLU', 'Codtlu', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CANCAR', 'Cancar', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 