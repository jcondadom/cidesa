<?php



class MancatmatMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.MancatmatMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mancatmat');
		$tMap->setPhpName('Mancatmat');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('mancatmat_SEQ');

		$tMap->addColumn('NUMSOL', 'Numsol', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECSOL', 'Fecsol', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('UNISOL', 'Unisol', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('JUSSOL', 'Jussol', 'string', CreoleTypes::VARCHAR, false, 2000);

		$tMap->addColumn('NOMITE', 'Nomite', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('DESITE', 'Desite', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('UNIMED', 'Unimed', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('PESO', 'Peso', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('VOLUME', 'Volume', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('OBSSOL', 'Obssol', 'string', CreoleTypes::VARCHAR, false, 5000);

		$tMap->addColumn('LOGUSE', 'Loguse', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 