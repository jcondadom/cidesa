<?php



class NpinfadmMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpinfadmMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npinfadm');
		$tMap->setPhpName('Npinfadm');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npinfadm_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('FECACT', 'Fecact', 'string', CreoleTypes::VARCHAR, false, 200);

		$tMap->addColumn('DESACT', 'Desact', 'string', CreoleTypes::VARCHAR, false, 2000);

		$tMap->addColumn('OBSACT', 'Obsact', 'string', CreoleTypes::VARCHAR, false, 2000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 