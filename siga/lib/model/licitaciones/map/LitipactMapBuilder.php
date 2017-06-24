<?php



class LitipactMapBuilder {

	
	const CLASS_NAME = 'lib.model.licitaciones.map.LitipactMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('litipact');
		$tMap->setPhpName('Litipact');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('litipact_SEQ');

		$tMap->addColumn('CODTIPACT', 'Codtipact', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('NOMTIPACT', 'Nomtipact', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DETTIPACT', 'Dettipact', 'string', CreoleTypes::VARCHAR, false, 10000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 