<?php



class MansisopeMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.MansisopeMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mansisope');
		$tMap->setPhpName('Mansisope');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('mansisope_SEQ');

		$tMap->addColumn('CODSIS', 'Codsis', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESSIS', 'Dessis', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 