<?php



class CaranrotMapBuilder {

	
	const CLASS_NAME = 'lib.model.compras.map.CaranrotMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('caranrot');
		$tMap->setPhpName('Caranrot');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('caranrot_SEQ');

		$tMap->addColumn('TIPROT', 'Tiprot', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('DESDE', 'Desde', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('HASTA', 'Hasta', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 