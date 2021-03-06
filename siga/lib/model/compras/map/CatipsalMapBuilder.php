<?php



class CatipsalMapBuilder {

	
	const CLASS_NAME = 'lib.model.compras.map.CatipsalMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('catipsal');
		$tMap->setPhpName('Catipsal');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('catipsal_SEQ');

		$tMap->addColumn('CODTIPSAL', 'Codtipsal', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESTIPSAL', 'Destipsal', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 