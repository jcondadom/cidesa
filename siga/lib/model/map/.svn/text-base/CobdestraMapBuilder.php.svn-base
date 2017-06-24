<?php



class CobdestraMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CobdestraMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cobdestra');
		$tMap->setPhpName('Cobdestra');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cobdestra_SEQ');

		$tMap->addColumn('NUMTRA', 'Numtra', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('REFDOC', 'Refdoc', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('CODCLI', 'Codcli', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('CODDES', 'Coddes', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('FECDES', 'Fecdes', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('MONDES', 'Mondes', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONRET', 'Monret', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONANT', 'Monant', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('NUMCOMRET', 'Numcomret', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECCOMRET', 'Feccomret', 'int', CreoleTypes::DATE, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 