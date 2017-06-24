<?php



class CaregestMapBuilder {

	
	const CLASS_NAME = 'lib.model.compras.map.CaregestMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('caregest');
		$tMap->setPhpName('Caregest');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('caregest_SEQ');

		$tMap->addColumn('CODREG', 'Codreg', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODEDO', 'Codedo', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 