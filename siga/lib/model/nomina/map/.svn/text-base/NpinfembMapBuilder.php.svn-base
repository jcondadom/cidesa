<?php



class NpinfembMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpinfembMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npinfemb');
		$tMap->setPhpName('Npinfemb');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npinfemb_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('FECEMB', 'Fecemb', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('TRIBEM', 'Tribem', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('MOTEMB', 'Motemb', 'string', CreoleTypes::VARCHAR, false, 2000);

		$tMap->addColumn('BENEMB', 'Benemb', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('MONEMB', 'Monemb', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, 2000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 
