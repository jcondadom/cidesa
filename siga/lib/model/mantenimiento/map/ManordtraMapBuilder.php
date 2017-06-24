<?php



class ManordtraMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.ManordtraMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('manordtra');
		$tMap->setPhpName('Manordtra');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('manordtra_SEQ');

		$tMap->addColumn('NUMORD', 'Numord', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('NUMEQU', 'Numequ', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('REFEST', 'Refest', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECEMI', 'Fecemi', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('CODACT', 'Codact', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('PRIORI', 'Priori', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CEDEMP', 'Cedemp', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('CEDRES', 'Cedres', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('CODTMA', 'Codtma', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DESORD', 'Desord', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addColumn('TIPORD', 'Tipord', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('INCREE', 'Incree', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODSOR', 'Codsor', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODGRR', 'Codgrr', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODSIS', 'Codsis', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODSFA', 'Codsfa', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODDFA', 'Coddfa', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODCFA', 'Codcfa', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('PARFAL', 'Parfal', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('FECICI', 'Fecici', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('FECCCI', 'Feccci', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('CEDREC', 'Cedrec', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('VALHCI', 'Valhci', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DEMCIE', 'Demcie', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODCFC', 'Codcfc', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('OBSCIE', 'Obscie', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 