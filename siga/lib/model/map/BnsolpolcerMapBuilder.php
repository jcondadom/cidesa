<?php



class BnsolpolcerMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BnsolpolcerMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bnsolpolcer');
		$tMap->setPhpName('Bnsolpolcer');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bnsolpolcer_SEQ');

		$tMap->addColumn('NUMSOL', 'Numsol', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('TIPSOL', 'Tipsol', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('FECSOL', 'Fecsol', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('DESSOL', 'Dessol', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECVEN', 'Fecven', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NUMREF', 'Numref', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CODCOM', 'Codcom', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('CODUBI', 'Codubi', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('CODCOB', 'Codcob', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 