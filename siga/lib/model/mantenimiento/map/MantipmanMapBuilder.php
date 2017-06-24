<?php



class MantipmanMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.MantipmanMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mantipman');
		$tMap->setPhpName('Mantipman');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('mantipman_SEQ');

		$tMap->addColumn('CODTMA', 'Codtma', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESTMA', 'Destma', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 