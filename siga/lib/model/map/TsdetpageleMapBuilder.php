<?php



class TsdetpageleMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TsdetpageleMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('tsdetpagele');
		$tMap->setPhpName('Tsdetpagele');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('tsdetpagele_SEQ');

		$tMap->addColumn('REFPAG', 'Refpag', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('NUMORD', 'Numord', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECVAL', 'Fecval', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('ESTORD', 'Estord', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NUMCOM', 'Numcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('REFMOVLIB', 'Refmovlib', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('REFPAGPRE', 'Refpagpre', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('MONORD', 'Monord', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 