<?php



class NpinfevaMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpinfevaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npinfeva');
		$tMap->setPhpName('Npinfeva');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npinfeva_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('FECEVA', 'Feceva', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('RESEVA', 'Reseva', 'string', CreoleTypes::VARCHAR, true, 2000);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, 2000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 
