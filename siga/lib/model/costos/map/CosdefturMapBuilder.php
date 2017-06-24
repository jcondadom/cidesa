<?php



class CosdefturMapBuilder {

	
	const CLASS_NAME = 'lib.model.costos.map.CosdefturMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cosdeftur');
		$tMap->setPhpName('Cosdeftur');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cosdeftur_SEQ');

		$tMap->addColumn('CODTUR', 'Codtur', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('DESTUR', 'Destur', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('INITUR', 'Initur', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('FINTUR', 'Fintur', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('CAPPRO', 'Cappro', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 