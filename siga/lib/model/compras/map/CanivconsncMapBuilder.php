<?php



class CanivconsncMapBuilder {

	
	const CLASS_NAME = 'lib.model.compras.map.CanivconsncMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('canivconsnc');
		$tMap->setPhpName('Canivconsnc');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('canivconsnc_SEQ');

		$tMap->addColumn('CODNIV', 'Codniv', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESNIV', 'Desniv', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('MONDES', 'Mondes', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONHAS', 'Monhas', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 