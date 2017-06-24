<?php



class HcliqreeMapBuilder {

	
	const CLASS_NAME = 'lib.model.hcm.map.HcliqreeMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('hcliqree');
		$tMap->setPhpName('Hcliqree');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('hcliqree_SEQ');

		$tMap->addColumn('CODLIQ', 'Codliq', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CEDFAM', 'Cedfam', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('TIPLIQ', 'Tipliq', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECLIQ', 'Fecliq', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('MONSOL', 'Monsol', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONLIQ', 'Monliq', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('OBSLIQ', 'Obsliq', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECAPR', 'Fecapr', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('USRAPR', 'Usrapr', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('STACIE', 'Stacie', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('STACPR', 'Stacpr', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECAPRCP', 'Fecaprcp', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('USRAPRCP', 'Usraprcp', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CODCIE', 'Codcie', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('LOGUSE', 'Loguse', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 