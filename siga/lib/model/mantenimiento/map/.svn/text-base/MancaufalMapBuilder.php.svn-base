<?php



class MancaufalMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.MancaufalMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mancaufal');
		$tMap->setPhpName('Mancaufal');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('mancaufal_SEQ');

		$tMap->addColumn('CODCFA', 'Codcfa', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESCFA', 'Descfa', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('CODDFA', 'Coddfa', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 