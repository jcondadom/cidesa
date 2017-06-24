<?php



class MandeffalMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.MandeffalMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mandeffal');
		$tMap->setPhpName('Mandeffal');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('mandeffal_SEQ');

		$tMap->addColumn('CODDFA', 'Coddfa', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESDFA', 'Desdfa', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('CODSFA', 'Codsfa', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 