<?php



class ViasolviabolMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ViasolviabolMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('viasolviabol');
		$tMap->setPhpName('Viasolviabol');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('viasolviabol_SEQ');

		$tMap->addColumn('NUMSOL', 'Numsol', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('APEPERCON', 'Apepercon', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NOMPERCON', 'Nompercon', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CEDPERCON', 'Cedpercon', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 