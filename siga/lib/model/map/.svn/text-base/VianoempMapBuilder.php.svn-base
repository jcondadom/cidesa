<?php



class VianoempMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.VianoempMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('vianoemp');
		$tMap->setPhpName('Vianoemp');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('vianoemp_SEQ');

		$tMap->addColumn('RIFNEMP', 'Rifnemp', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('NOMNEMP', 'Nomnemp', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('DIRNEMP', 'Dirnemp', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TELNEMP', 'Telnemp', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('EMANEMP', 'Emanemp', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CODBAN', 'Codban', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('NUMCUEB', 'Numcueb', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CODNIV', 'Codniv', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODNIVNEMP', 'Codnivnemp', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 