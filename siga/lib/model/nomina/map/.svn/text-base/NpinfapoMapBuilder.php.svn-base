<?php



class NpinfapoMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpinfapoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npinfapo');
		$tMap->setPhpName('Npinfapo');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npinfapo_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('TIPBEN', 'Tipben', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('ANNO', 'Anno', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('MONPAG', 'Monpag', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('SOPCON', 'Sopcon', 'string', CreoleTypes::VARCHAR, false, 2000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 
