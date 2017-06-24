<?php



class NptipayuMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NptipayuMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('nptipayu');
		$tMap->setPhpName('Nptipayu');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('nptipayu_SEQ');

		$tMap->addColumn('CODTIPAYU', 'Codtipayu', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESTIPAYU', 'Destipayu', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 