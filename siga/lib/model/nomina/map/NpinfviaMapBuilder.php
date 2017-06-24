<?php



class NpinfviaMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpinfviaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npinfvia');
		$tMap->setPhpName('Npinfvia');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npinfvia_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('FECVIA', 'Fecvia', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('MOTVIA', 'Motvia', 'string', CreoleTypes::VARCHAR, false, 2000);

		$tMap->addColumn('MONPAG', 'Monpag', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MODPAG', 'Modpag', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 
