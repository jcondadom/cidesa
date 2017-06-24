<?php



class ViadefpriMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ViadefpriMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('viadefpri');
		$tMap->setPhpName('Viadefpri');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('viadefpri_SEQ');

		$tMap->addColumn('CODPRI', 'Codpri', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('DESPRI', 'Despri', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('FORCAL', 'Forcal', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('SUMRES', 'Sumres', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('MONFIJ', 'Monfij', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 