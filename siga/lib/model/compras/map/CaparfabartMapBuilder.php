<?php



class CaparfabartMapBuilder {

	
	const CLASS_NAME = 'lib.model.compras.map.CaparfabartMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('caparfabart');
		$tMap->setPhpName('Caparfabart');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('caparfabart_SEQ');

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('NUMPAR', 'Numpar', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('CODFAB', 'Codfab', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 