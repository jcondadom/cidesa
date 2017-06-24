<?php



class BnpolmueMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BnpolmueMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bnpolmue');
		$tMap->setPhpName('Bnpolmue');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bnpolmue_SEQ');

		$tMap->addColumn('CODACT', 'Codact', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('CODMUE', 'Codmue', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('NUMCUE', 'Numcue', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('NUMDEP', 'Numdep', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FECDEPSEG', 'Fecdepseg', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODTIP', 'Codtip', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('MONPAG', 'Monpag', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PORPRI', 'Porpri', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONPRI', 'Monpri', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('NUMCOM', 'Numcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('DEPREC', 'Deprec', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('SEGNOM', 'Segnom', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('MONNOM', 'Monnom', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FRENOM', 'Frenom', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 