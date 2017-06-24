<?php



class NpuniadsMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpuniadsMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npuniads');
		$tMap->setPhpName('Npuniads');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npuniads_SEQ');

		$tMap->addColumn('CODUNIADS', 'Coduniads', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('DESUNIADS', 'Desuniads', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 