<?php



class FatippueMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FatippueMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fatippue');
		$tMap->setPhpName('Fatippue');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fatippue_SEQ');

		$tMap->addColumn('CODPUE', 'Codpue', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMPUE', 'Nompue', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 