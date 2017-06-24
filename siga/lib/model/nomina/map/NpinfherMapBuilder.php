<?php



class NpinfherMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpinfherMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npinfher');
		$tMap->setPhpName('Npinfher');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npinfher_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CEDHER', 'Cedher', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('NOMHER', 'Nomher', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('SEXHER', 'Sexher', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECNAC', 'Fecnac', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('PARHER', 'Parher', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 