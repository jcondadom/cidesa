<?php



class NpinfretMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpinfretMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npinfret');
		$tMap->setPhpName('Npinfret');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npinfret_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('TIPRET', 'Tipret', 'string', CreoleTypes::VARCHAR, false, 200);

		$tMap->addColumn('FECRET', 'Fecret', 'string', CreoleTypes::VARCHAR, false, 200);

		$tMap->addColumn('MONRET', 'Monret', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('OBSRET', 'Obsret', 'string', CreoleTypes::VARCHAR, false, 2000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 