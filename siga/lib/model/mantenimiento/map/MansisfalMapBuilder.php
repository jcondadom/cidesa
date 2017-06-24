<?php



class MansisfalMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.MansisfalMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mansisfal');
		$tMap->setPhpName('Mansisfal');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('mansisfal_SEQ');

		$tMap->addColumn('CODSFA', 'Codsfa', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESSFA', 'Dessfa', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addColumn('CODSIS', 'Codsis', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 