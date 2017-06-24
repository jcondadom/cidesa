<?php



class NpnucemphorMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpnucemphorMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npnucemphor');
		$tMap->setPhpName('Npnucemphor');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npnucemphor_SEQ');

		$tMap->addColumn('CODNIV', 'Codniv', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('TOTHOR', 'Tothor', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 