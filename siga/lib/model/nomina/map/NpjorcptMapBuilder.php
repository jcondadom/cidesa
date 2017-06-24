<?php



class NpjorcptMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpjorcptMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npjorcpt');
		$tMap->setPhpName('Npjorcpt');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npjorcpt_SEQ');

		$tMap->addColumn('CODJOR', 'Codjor', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 