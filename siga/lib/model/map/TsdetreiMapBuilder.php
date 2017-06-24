<?php



class TsdetreiMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TsdetreiMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('tsdetrei');
		$tMap->setPhpName('Tsdetrei');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('tsdetrei_SEQ');

		$tMap->addColumn('NUMCUE', 'Numcue', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('REFLIB', 'Reflib', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('TIPMOV', 'Tipmov', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('REFREI', 'Refrei', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('MONTO', 'Monto', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('REFERE', 'Refere', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 