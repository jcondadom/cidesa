<?php



class HcexaconMapBuilder {

	
	const CLASS_NAME = 'lib.model.hcm.map.HcexaconMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('hcexacon');
		$tMap->setPhpName('Hcexacon');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('hcexacon_SEQ');

		$tMap->addColumn('NOMCONTRA', 'Nomcontra', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('REFEXACON', 'Refexacon', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('TIPEXACON', 'Tipexacon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECEXACON', 'Fecexacon', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CEDFAM', 'Cedfam', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODMEDLAB', 'Codmedlab', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('TRAEXACON', 'Traexacon', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('NOTEXACON', 'Notexacon', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('DUREXACON', 'Durexacon', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('LOGUSE', 'Loguse', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 