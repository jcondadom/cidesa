<?php



class NpgruposMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpgruposMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npgrupos');
		$tMap->setPhpName('Npgrupos');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npgrupos_SEQ');

		$tMap->addColumn('CODGRU', 'Codgru', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('DESGRU', 'Desgru', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 