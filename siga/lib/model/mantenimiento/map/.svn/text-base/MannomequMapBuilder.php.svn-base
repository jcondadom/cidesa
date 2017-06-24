<?php



class MannomequMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.MannomequMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mannomequ');
		$tMap->setPhpName('Mannomequ');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('mannomequ_SEQ');

		$tMap->addColumn('NUMEQU', 'Numequ', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('NOMALT', 'Nomalt', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 