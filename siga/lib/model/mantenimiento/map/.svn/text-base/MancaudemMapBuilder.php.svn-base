<?php



class MancaudemMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.MancaudemMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mancaudem');
		$tMap->setPhpName('Mancaudem');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('mancaudem_SEQ');

		$tMap->addColumn('CODCAU', 'Codcau', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESCAU', 'Descau', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 