<?php



class NpinfrecMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpinfrecMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npinfrec');
		$tMap->setPhpName('Npinfrec');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npinfrec_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('ENTREC', 'Entrec', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('NOMREC', 'Nomrec', 'string', CreoleTypes::VARCHAR, false, 2000);

		$tMap->addColumn('FECREC', 'Fecrec', 'string', CreoleTypes::VARCHAR, false, 200);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 