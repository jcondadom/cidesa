<?php



class NpinstructoresMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpinstructoresMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npinstructores');
		$tMap->setPhpName('Npinstructores');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npinstructores_SEQ');

		$tMap->addColumn('CEDPRO', 'Cedpro', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('NOMPRO', 'Nompro', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TIPPRO', 'Tippro', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 