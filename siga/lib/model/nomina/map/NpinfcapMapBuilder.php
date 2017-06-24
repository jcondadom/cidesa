<?php



class NpinfcapMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpinfcapMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npinfcap');
		$tMap->setPhpName('Npinfcap');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npinfcap_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('ENTDID', 'Entdid', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('NOMACT', 'Nomact', 'string', CreoleTypes::VARCHAR, false, 2000);

		$tMap->addColumn('FECACT', 'Fecact', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('NROHOR', 'Nrohor', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('NIVCUR', 'Nivcur', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 
