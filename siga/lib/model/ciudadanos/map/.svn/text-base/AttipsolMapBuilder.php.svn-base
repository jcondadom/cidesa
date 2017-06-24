<?php



class AttipsolMapBuilder {

	
	const CLASS_NAME = 'lib.model.ciudadanos.map.AttipsolMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('attipsol');
		$tMap->setPhpName('Attipsol');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('attipsol_SEQ');

		$tMap->addColumn('CODTIPSOL', 'Codtipsol', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('DESTIPSOL', 'Destipsol', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 