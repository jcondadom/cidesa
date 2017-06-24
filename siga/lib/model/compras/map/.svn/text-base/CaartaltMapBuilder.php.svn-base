<?php



class CaartaltMapBuilder {

	
	const CLASS_NAME = 'lib.model.compras.map.CaartaltMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('caartalt');
		$tMap->setPhpName('Caartalt');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('caartalt_SEQ');

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODALT', 'Codalt', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('ACTCOD', 'Actcod', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 