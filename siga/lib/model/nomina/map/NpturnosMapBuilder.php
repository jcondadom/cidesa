<?php



class NpturnosMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpturnosMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npturnos');
		$tMap->setPhpName('Npturnos');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npturnos_SEQ');

		$tMap->addColumn('CODTUR', 'Codtur', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('DESTUR', 'Destur', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 