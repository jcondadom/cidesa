<?php



class ManprogruMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.ManprogruMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('manprogru');
		$tMap->setPhpName('Manprogru');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('manprogru_SEQ');

		$tMap->addColumn('CODGRU', 'Codgru', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CANDIA', 'Candia', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('FECULT', 'Fecult', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECPRX', 'Fecprx', 'int', CreoleTypes::DATE, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 