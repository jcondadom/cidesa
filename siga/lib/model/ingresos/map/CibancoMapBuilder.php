<?php



class CibancoMapBuilder {

	
	const CLASS_NAME = 'lib.model.ingresos.map.CibancoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cibanco');
		$tMap->setPhpName('Cibanco');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cibanco_SEQ');

		$tMap->addColumn('CODBAN', 'Codban', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('DESBAN', 'Desban', 'string', CreoleTypes::VARCHAR, true, 200);

		$tMap->addColumn('NUMCUE', 'Numcue', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('MANCOM', 'Mancom', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('PORCOM', 'Porcom', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODCTA', 'Codcta', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 