<?php



class ManesttraMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.ManesttraMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('manesttra');
		$tMap->setPhpName('Manesttra');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('manesttra_SEQ');

		$tMap->addColumn('CODEST', 'Codest', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('DESEST', 'Desest', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('CODGRU', 'Codgru', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('NUMSEC', 'Numsec', 'double', CreoleTypes::NUMERIC, false, 4);

		$tMap->addColumn('CODSIS', 'Codsis', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('FECCRE', 'Feccre', 'int', CreoleTypes::DATE, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 