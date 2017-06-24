<?php



class ViasoltraterreMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ViasoltraterreMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('viasoltraterre');
		$tMap->setPhpName('Viasoltraterre');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('viasoltraterre_SEQ');

		$tMap->addColumn('NUMSOL', 'Numsol', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('FECSOL', 'Fecsol', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODDIREC', 'Coddirec', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODEVE', 'Codeve', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addColumn('CODNIV', 'Codniv', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('ESNOEMP', 'Esnoemp', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('CODEMPUSU', 'Codempusu', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('TIPSERV', 'Tipserv', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CANVEHI', 'Canvehi', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('TIPVEHI', 'Tipvehi', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CANDIAS', 'Candias', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CANPASAJ', 'Canpasaj', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('EQUIPAJ', 'Equipaj', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('INSTRUM', 'Instrum', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('BULTOS', 'Bultos', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('CONESPER', 'Conesper', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('ADISPOSI', 'Adisposi', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('TELEMP', 'Telemp', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('NOMPERCON', 'Nompercon', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('APEPERCON', 'Apepercon', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NUMCELPERCON', 'Numcelpercon', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('NUMSOLVI', 'Numsolvi', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('ORDESP', 'Ordesp', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('STAAPR', 'Staapr', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('USUAPR', 'Usuapr', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECAPR', 'Fecapr', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('LOGUSU', 'Logusu', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 