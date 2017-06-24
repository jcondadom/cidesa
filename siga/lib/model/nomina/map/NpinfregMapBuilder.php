<?php



class NpinfregMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpinfregMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npinfreg');
		$tMap->setPhpName('Npinfreg');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npinfreg_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('TIPSAN', 'Tipsan', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('MOTSAN', 'Motsan', 'string', CreoleTypes::VARCHAR, false, 2000);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, 2000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 
