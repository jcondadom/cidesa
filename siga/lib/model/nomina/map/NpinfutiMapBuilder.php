<?php



class NpinfutiMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpinfutiMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npinfuti');
		$tMap->setPhpName('Npinfuti');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npinfuti_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('ANNO', 'Anno', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NROHIJ', 'Nrohij', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('MONPAG', 'Monpag', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('SOPCON', 'Sopcon', 'string', CreoleTypes::VARCHAR, false, 2000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 
