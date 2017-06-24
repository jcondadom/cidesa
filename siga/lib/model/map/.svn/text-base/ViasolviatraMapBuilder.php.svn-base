<?php



class ViasolviatraMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ViasolviatraMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('viasolviatra');
		$tMap->setPhpName('Viasolviatra');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('viasolviatra_SEQ');

		$tMap->addColumn('NUMSOL', 'Numsol', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('FECSOL', 'Fecsol', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('TIPVIA', 'Tipvia', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODEVE', 'Codeve', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODNIV', 'Codniv', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CODEMPACO', 'Codempaco', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODNIVACO', 'Codnivaco', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('DESSOL', 'Dessol', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('CODCIU', 'Codciu', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODNIVAPR', 'Codnivapr', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CODPROCED', 'Codproced', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECDES', 'Fecdes', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECHAS', 'Fechas', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NUMDIA', 'Numdia', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('CODFORTRA', 'Codfortra', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CODEMPAUT', 'Codempaut', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODCEN', 'Codcen', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODUBI', 'Codubi', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('NOMEMPE', 'Nomempe', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('TIPBOL', 'Tipbol', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('MONBOL', 'Monbol', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DESANU', 'Desanu', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CODDIREC', 'Coddirec', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('ESNOEMP', 'Esnoemp', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('NUMPAS', 'Numpas', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('NUMVIS', 'Numvis', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('NUMCEL', 'Numcel', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('NUMEXT', 'Numext', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('APEPERCON', 'Apepercon', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NOMPERCON', 'Nompercon', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('PARPERCON', 'Parpercon', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('NUMHABPERCON', 'Numhabpercon', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('NUMCELPERCON', 'Numcelpercon', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('REQBOLAER', 'Reqbolaer', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('REQHOSPE', 'Reqhospe', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('REQTRATER', 'Reqtrater', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('HORSAL', 'Horsal', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('HORLLE', 'Horlle', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('RUTBOLAER', 'Rutbolaer', 'string', CreoleTypes::VARCHAR, false, 200);

		$tMap->addColumn('MOTVIABOL', 'Motviabol', 'string', CreoleTypes::VARCHAR, false, 500);

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

		$tMap->addColumn('CODEMPUSU', 'Codempusu', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CELEMP', 'Celemp', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('TIPPAS', 'Tippas', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECSAL', 'Fecsal', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('HORSALB', 'Horsalb', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('HORREG', 'Horreg', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('ITINERARIO', 'Itinerario', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('CODNIVORG', 'Codnivorg', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODMUN', 'Codmun', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addColumn('STATUSDIR', 'Statusdir', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('LUGSAL', 'Lugsal', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CODPAI', 'Codpai', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('STAREN', 'Staren', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('HOSPED', 'Hosped', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('OBSHOS', 'Obshos', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('USUAPR', 'Usuapr', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECAPR', 'Fecapr', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('LOGUSU', 'Logusu', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 