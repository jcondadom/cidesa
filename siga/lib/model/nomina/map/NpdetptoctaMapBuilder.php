<?php



class NpdetptoctaMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpdetptoctaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npdetptocta');
		$tMap->setPhpName('Npdetptocta');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npdetptocta_SEQ');

		$tMap->addColumn('NUMPTA', 'Numpta', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('MONCON', 'Moncon', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 