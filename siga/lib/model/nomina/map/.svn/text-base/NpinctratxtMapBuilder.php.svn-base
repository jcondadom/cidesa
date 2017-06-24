<?php



class NpinctratxtMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpinctratxtMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npinctratxt');
		$tMap->setPhpName('Npinctratxt');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npinctratxt_SEQ');

		$tMap->addColumn('FECINC', 'Fecinc', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('STATUS', 'Status', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('TIPREG', 'Tipreg', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('NACEMP', 'Nacemp', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CEDEMP', 'Cedemp', 'string', CreoleTypes::VARCHAR, false, 9);

		$tMap->addColumn('PRIAPE', 'Priape', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('SEGAPE', 'Segape', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('PRINOM', 'Prinom', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('SEGNOM', 'Segnom', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('FECNAC', 'Fecnac', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('MONING', 'Moning', 'string', CreoleTypes::VARCHAR, false, 12);

		$tMap->addColumn('FECING', 'Fecing', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('ACTECO', 'Acteco', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CARGO', 'Cargo', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('SEXO', 'Sexo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ESTCIV', 'Estciv', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('URBANI', 'Urbani', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('AVENID', 'Avenid', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('CONJUN', 'Conjun', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('NUMERO', 'Numero', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('CIUDAD', 'Ciudad', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('ESTADO', 'Estado', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('PAIS', 'Pais', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('TELEFONO', 'Telefono', 'string', CreoleTypes::VARCHAR, false, 11);

		$tMap->addColumn('FAX', 'Fax', 'string', CreoleTypes::VARCHAR, false, 11);

		$tMap->addColumn('CELULAR', 'Celular', 'string', CreoleTypes::VARCHAR, false, 11);

		$tMap->addColumn('INTERNET', 'Internet', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('ZONPOS', 'Zonpos', 'string', CreoleTypes::VARCHAR, false, 5);

		$tMap->addColumn('ACCION', 'Accion', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('TIPEMP', 'Tipemp', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CODARE', 'Codare', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('TELTRAB', 'Teltrab', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('TIPCUEN', 'Tipcuen', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CODOFI', 'Codofi', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('NUMCUE', 'Numcue', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FILLER', 'Filler', 'string', CreoleTypes::VARCHAR, false, 43);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 