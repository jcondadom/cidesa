<?php



class NpdefdepMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpdefdepMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npdefdep');
		$tMap->setPhpName('Npdefdep');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npdefdep_SEQ');

		$tMap->addColumn('CODDEP', 'Coddep', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESDEP', 'Desdep', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('STADEP', 'Stadep', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 