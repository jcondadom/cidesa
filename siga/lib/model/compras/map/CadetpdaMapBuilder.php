<?php



class CadetpdaMapBuilder {

	
	const CLASS_NAME = 'lib.model.compras.map.CadetpdaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cadetpda');
		$tMap->setPhpName('Cadetpda');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cadetpda_SEQ');

		$tMap->addColumn('REFPDA', 'Refpda', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('ORDCOM', 'Ordcom', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('DESART', 'Desart', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('CANART', 'Canart', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('FECENT', 'Fecent', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('TIPTRA', 'Tiptra', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('DIRORI', 'Dirori', 'string', CreoleTypes::VARCHAR, true, 1000);

		$tMap->addColumn('CODEDO', 'Codedo', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addForeignKey('CATIPALM_ID', 'CatipalmId', 'int', CreoleTypes::INTEGER, 'catipalm', 'ID', true, null);

		$tMap->addColumn('TMART', 'Tmart', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addForeignKey('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, 'caprovee', 'CODPRO', true, 15);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('MES', 'Mes', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 