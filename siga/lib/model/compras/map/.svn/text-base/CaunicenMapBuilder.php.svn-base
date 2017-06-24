<?php



class CaunicenMapBuilder {

	
	const CLASS_NAME = 'lib.model.compras.map.CaunicenMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('caunicen');
		$tMap->setPhpName('Caunicen');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('caunicen_SEQ');

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODCEN', 'Codcen', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 