<?php



class NpinctraMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpinctraMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npinctra');
		$tMap->setPhpName('Npinctra');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npinctra_SEQ');

		$tMap->addColumn('TIPREG', 'Tipreg', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, false, 13);

		$tMap->addColumn('RIFEMP', 'Rifemp', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('NOMEMP', 'Nomemp', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('URBANI', 'Urbani', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('AVENID', 'Avenid', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('CONJUN', 'Conjun', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('NUMERO', 'Numero', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('CIUDAD', 'Ciudad', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('ESTADO', 'Estado', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('PAIS', 'Pais', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('TELEFONO', 'Telefono', 'string', CreoleTypes::VARCHAR, false, 11);

		$tMap->addColumn('FAX', 'Fax', 'string', CreoleTypes::VARCHAR, false, 11);

		$tMap->addColumn('INTERNET', 'Internet', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('FRENOMOBR', 'Frenomobr', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FACINGOBR', 'Facingobr', 'string', CreoleTypes::VARCHAR, false, 5);

		$tMap->addColumn('FRENOMEMP', 'Frenomemp', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FACINGEMP', 'Facingemp', 'string', CreoleTypes::VARCHAR, false, 5);

		$tMap->addColumn('FRENOMEJE', 'Frenomeje', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FACINGEJE', 'Facingeje', 'string', CreoleTypes::VARCHAR, false, 5);

		$tMap->addColumn('FRENOMCON', 'Frenomcon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FACINGCON', 'Facingcon', 'string', CreoleTypes::VARCHAR, false, 5);

		$tMap->addColumn('TIPCUEN', 'Tipcuen', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('NUMCUE', 'Numcue', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('ZONPOS', 'Zonpos', 'string', CreoleTypes::VARCHAR, false, 5);

		$tMap->addColumn('FILLER', 'Filler', 'string', CreoleTypes::VARCHAR, false, 130);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 