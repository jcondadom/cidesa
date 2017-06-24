<?php



class ManestordMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.ManestordMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('manestord');
		$tMap->setPhpName('Manestord');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('manestord_SEQ');

		$tMap->addColumn('CODSOR', 'Codsor', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESSOR', 'Dessor', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 