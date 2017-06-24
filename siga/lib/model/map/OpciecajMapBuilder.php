<?php



class OpciecajMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OpciecajMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('opciecaj');
		$tMap->setPhpName('Opciecaj');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('opciecaj_SEQ');

		$tMap->addColumn('NUMREF', 'Numref', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECCIE', 'Feccie', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('DESCON', 'Descon', 'string', CreoleTypes::VARCHAR, true, 1000);

		$tMap->addColumn('CODUBI', 'Codubi', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('CODFIN', 'Codfin', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODCAJCHI', 'Codcajchi', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('LOGUSE', 'Loguse', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('MONCIE', 'Moncie', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('REFCOM', 'Refcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('REFPAG', 'Refpag', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('NUMCOM', 'Numcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 