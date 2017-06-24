<?php



class MantaractMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.MantaractMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mantaract');
		$tMap->setPhpName('Mantaract');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('mantaract_SEQ');

		$tMap->addColumn('CODACT', 'Codact', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('NUMTAR', 'Numtar', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESTAR', 'Destar', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addColumn('CODINS', 'Codins', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODEST', 'Codest', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('RUTINA', 'Rutina', 'string', CreoleTypes::VARCHAR, false, 5000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 