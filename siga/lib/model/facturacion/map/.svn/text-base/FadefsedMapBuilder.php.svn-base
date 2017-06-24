<?php



class FadefsedMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FadefsedMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fadefsed');
		$tMap->setPhpName('Fadefsed');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fadefsed_SEQ');

		$tMap->addColumn('CODSED', 'Codsed', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESSED', 'Dessed', 'string', CreoleTypes::VARCHAR, true, 200);

		$tMap->addColumn('CORSED', 'Corsed', 'double', CreoleTypes::NUMERIC, false, 8);

		$tMap->addColumn('CORSED1', 'Corsed1', 'double', CreoleTypes::NUMERIC, false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 