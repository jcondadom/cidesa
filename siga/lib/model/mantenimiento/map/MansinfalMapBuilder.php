<?php



class MansinfalMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.MansinfalMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mansinfal');
		$tMap->setPhpName('Mansinfal');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('mansinfal_SEQ');

		$tMap->addColumn('CODSFA', 'Codsfa', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESSFA', 'Dessfa', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('CODSIS', 'Codsis', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 