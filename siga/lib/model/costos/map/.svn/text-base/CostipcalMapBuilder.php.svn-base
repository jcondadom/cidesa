<?php



class CostipcalMapBuilder {

	
	const CLASS_NAME = 'lib.model.costos.map.CostipcalMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('costipcal');
		$tMap->setPhpName('Costipcal');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('costipcal_SEQ');

		$tMap->addColumn('CODCAL', 'Codcal', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('DESCAL', 'Descal', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addColumn('FORCAL', 'Forcal', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('ORDPAG', 'Ordpag', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 