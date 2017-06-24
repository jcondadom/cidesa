<?php



class FaembarcaMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FaembarcaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('faembarca');
		$tMap->setPhpName('Faembarca');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('faembarca_SEQ');

		$tMap->addColumn('CODEMB', 'Codemb', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('NOMEMB', 'Nomemb', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addColumn('TIPEMB', 'Tipemb', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('PROEMB', 'Proemb', 'string', CreoleTypes::VARCHAR, true, 200);

		$tMap->addColumn('ESLORA', 'Eslora', 'double', CreoleTypes::NUMERIC, false, 10);

		$tMap->addColumn('MANGA', 'Manga', 'double', CreoleTypes::NUMERIC, false, 10);

		$tMap->addColumn('PUNTAL', 'Puntal', 'double', CreoleTypes::NUMERIC, false, 10);

		$tMap->addColumn('CALADO', 'Calado', 'double', CreoleTypes::NUMERIC, false, 10);

		$tMap->addColumn('SIGIMO', 'Sigimo', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('PESO', 'Peso', 'double', CreoleTypes::NUMERIC, false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 