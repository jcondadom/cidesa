<?php



class ManparfabcatMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.ManparfabcatMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('manparfabcat');
		$tMap->setPhpName('Manparfabcat');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('manparfabcat_SEQ');

		$tMap->addColumn('NUMSOL', 'Numsol', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('NUMPAR', 'Numpar', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('CODFAB', 'Codfab', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 