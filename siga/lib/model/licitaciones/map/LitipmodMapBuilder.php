<?php



class LitipmodMapBuilder {

	
	const CLASS_NAME = 'lib.model.licitaciones.map.LitipmodMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('litipmod');
		$tMap->setPhpName('Litipmod');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('litipmod_SEQ');

		$tMap->addColumn('CODTIPMOD', 'Codtipmod', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('NOMTIPMOD', 'Nomtipmod', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DETTIPMOD', 'Dettipmod', 'string', CreoleTypes::VARCHAR, false, 10000);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 