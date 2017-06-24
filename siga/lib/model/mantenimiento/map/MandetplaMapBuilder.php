<?php



class MandetplaMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.MandetplaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mandetpla');
		$tMap->setPhpName('Mandetpla');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('mandetpla_SEQ');

		$tMap->addColumn('CODGRU', 'Codgru', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('FECGEN', 'Fecgen', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NUMEQU', 'Numequ', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('DESTAR', 'Destar', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addColumn('FECEJE', 'Feceje', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('HOREQU', 'Horequ', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 