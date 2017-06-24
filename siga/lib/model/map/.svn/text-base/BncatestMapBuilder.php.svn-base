<?php



class BncatestMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BncatestMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bncatest');
		$tMap->setPhpName('Bncatest');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bncatest_SEQ');

		$tMap->addColumn('CEDEST', 'Cedest', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('NOMAPEEST', 'Nomapeest', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('DIREST', 'Direst', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('TELEST', 'Telest', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('CEDREP', 'Cedrep', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('NOMAPEREP', 'Nomaperep', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 