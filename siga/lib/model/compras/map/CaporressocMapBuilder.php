<?php



class CaporressocMapBuilder {

	
	const CLASS_NAME = 'lib.model.compras.map.CaporressocMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('caporressoc');
		$tMap->setPhpName('Caporressoc');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('caporressoc_SEQ');

		$tMap->addColumn('MONDES', 'Mondes', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONHAS', 'Monhas', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PORRES', 'Porres', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 