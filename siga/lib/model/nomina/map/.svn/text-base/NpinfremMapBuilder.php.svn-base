<?php



class NpinfremMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpinfremMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npinfrem');
		$tMap->setPhpName('Npinfrem');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npinfrem_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('FECREM', 'Fecrem', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('TIPREM', 'Tiprem', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addColumn('MONPAG', 'Monpag', 'double', CreoleTypes::NUMERIC, false, null);

		$tMap->addColumn('MODPAG', 'Modpag', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 