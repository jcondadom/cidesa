<?php



class CapdaocMapBuilder {

	
	const CLASS_NAME = 'lib.model.compras.map.CapdaocMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('capdaoc');
		$tMap->setPhpName('Capdaoc');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('capdaoc_SEQ');

		$tMap->addColumn('REFPDA', 'Refpda', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('FECPDA', 'Fecpda', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('DESPDA', 'Despda', 'string', CreoleTypes::VARCHAR, false, 2000);

		$tMap->addColumn('MONPDA', 'Monpda', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STAPAD', 'Stapad', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 