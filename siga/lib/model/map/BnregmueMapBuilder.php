<?php



class BnregmueMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BnregmueMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bnregmue');
		$tMap->setPhpName('Bnregmue');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bnregmue_SEQ');

		$tMap->addColumn('CODACT', 'Codact', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('CODMUE', 'Codmue', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('DESMUE', 'Desmue', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('ORDCOM', 'Ordcom', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECCOM', 'Feccom', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECDEP', 'Fecdep', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECAJU', 'Fecaju', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECACT', 'Fecact', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECEXP', 'Fecexp', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('ORDRCP', 'Ordrcp', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FOTMUE', 'Fotmue', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('MARMUE', 'Marmue', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('MODMUE', 'Modmue', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('ANOMUE', 'Anomue', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('COLMUE', 'Colmue', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('CODUBI', 'Codubi', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('PESMUE', 'Pesmue', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CAPMUE', 'Capmue', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('TIPMUE', 'Tipmue', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('VIDUTI', 'Viduti', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('LNGMUE', 'Lngmue', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NROPIE', 'Nropie', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('SERMUE', 'Sermue', 'string', CreoleTypes::VARCHAR, false, 150);

		$tMap->addColumn('USOMUE', 'Usomue', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('ALTMUE', 'Altmue', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('LARMUE', 'Larmue', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('ANCMUE', 'Ancmue', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('CODDIS', 'Coddis', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('DETMUE', 'Detmue', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('EDOMUE', 'Edomue', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('MUNMUE', 'Munmue', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DEPMUE', 'Depmue', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DIRMUE', 'Dirmue', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('UBIMUE', 'Ubimue', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('MESDEP', 'Mesdep', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('VALINI', 'Valini', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('VALRES', 'Valres', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('VALLIB', 'Vallib', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('VALREX', 'Valrex', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('COSREP', 'Cosrep', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DEPMEN', 'Depmen', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DEPACU', 'Depacu', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STAMUE', 'Stamue', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODALT', 'Codalt', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('FECRCP', 'Fecrcp', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('VALADI', 'Valadi', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('AUMVIDUTI', 'Aumviduti', 'double', CreoleTypes::NUMERIC, false, 4);

		$tMap->addColumn('DIMVIDUTI', 'Dimviduti', 'double', CreoleTypes::NUMERIC, false, 4);

		$tMap->addColumn('STASEM', 'Stasem', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('STAINM', 'Stainm', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODRESUSO', 'Codresuso', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('CODRESPAT', 'Codrespat', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('TIPPRO', 'Tippro', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('LOGUSU', 'Logusu', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NUMORD', 'Numord', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CODUBIADM', 'Codubiadm', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('NROCON', 'Nrocon', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FECCON', 'Feccon', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECFAC', 'Fecfac', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODEST', 'Codest', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODMOD', 'Codmod', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('NUMCUE', 'Numcue', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('NUMDEP', 'Numdep', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FECDEPSEG', 'Fecdepseg', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODTIP', 'Codtip', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('MONPAG', 'Monpag', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PORPRI', 'Porpri', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONPRI', 'Monpri', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('NUMCOM', 'Numcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('DEPREC', 'Deprec', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('SEGNOM', 'Segnom', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('MONNOM', 'Monnom', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FRENOM', 'Frenom', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECREGCOM', 'Fecregcom', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODPROC', 'Codproc', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CEDEST', 'Cedest', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('PEREST', 'Perest', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('CODCOL', 'Codcol', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODPAI', 'Codpai', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODES2', 'Codes2', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODMUN', 'Codmun', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addColumn('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addColumn('CODCIU', 'Codciu', 'string', CreoleTypes::VARCHAR, false, 12);

		$tMap->addColumn('PROCED', 'Proced', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('SUDEBIP', 'Sudebip', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('ACTREC', 'Actrec', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FECASIACT', 'Fecasiact', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECDESACT', 'Fecdesact', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECTRA', 'Fectra', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODUSOBIE', 'Codusobie', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('ANOINV', 'Anoinv', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODACTDEP', 'Codactdep', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('CODMUEDEP', 'Codmuedep', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FECONT', 'Fecont', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('STAFAL', 'Stafal', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECINS', 'Fecins', 'int', CreoleTypes::DATE, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 