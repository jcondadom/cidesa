<?php



class NpdetnucemphorMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpdetnucemphorMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npdetnucemphor');
		$tMap->setPhpName('Npdetnucemphor');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npdetnucemphor_SEQ');

		$tMap->addColumn('CODNIV', 'Codniv', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CANHOR', 'Canhor', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 