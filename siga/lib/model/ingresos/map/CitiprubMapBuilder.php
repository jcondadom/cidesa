<?php



class CitiprubMapBuilder {

	
	const CLASS_NAME = 'lib.model.ingresos.map.CitiprubMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('citiprub');
		$tMap->setPhpName('Citiprub');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('citiprub_SEQ');

		$tMap->addColumn('CODTIPRUB', 'Codtiprub', 'string', CreoleTypes::VARCHAR, true, 6);

		$tMap->addColumn('DESTIPRUB', 'Destiprub', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 