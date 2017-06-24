<?php



class CaentpdaMapBuilder {

	
	const CLASS_NAME = 'lib.model.compras.map.CaentpdaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('caentpda');
		$tMap->setPhpName('Caentpda');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('caentpda_SEQ');

		$tMap->addColumn('ORDCOM', 'Ordcom', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('DESART', 'Desart', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('CANART', 'Canart', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('FECENT', 'Fecent', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('TIPTRA', 'Tiptra', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('DIRORI', 'Dirori', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 