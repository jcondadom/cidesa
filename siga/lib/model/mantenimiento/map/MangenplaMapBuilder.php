<?php



class MangenplaMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.MangenplaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mangenpla');
		$tMap->setPhpName('Mangenpla');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('mangenpla_SEQ');

		$tMap->addColumn('CODGRU', 'Codgru', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('FECGEN', 'Fecgen', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('IMPREP', 'Imprep', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('STAAPR', 'Staapr', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 