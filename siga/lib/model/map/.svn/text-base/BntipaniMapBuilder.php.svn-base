<?php



class BntipaniMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BntipaniMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bntipani');
		$tMap->setPhpName('Bntipani');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bntipani_SEQ');

		$tMap->addColumn('CODANI', 'Codani', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESANI', 'Desani', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 