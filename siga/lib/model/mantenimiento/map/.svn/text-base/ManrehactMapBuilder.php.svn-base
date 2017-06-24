<?php



class ManrehactMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.ManrehactMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('manrehact');
		$tMap->setPhpName('Manrehact');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('manrehact_SEQ');

		$tMap->addColumn('CODACT', 'Codact', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODCAR', 'Codcar', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CANREC', 'Canrec', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('CANHOR', 'Canhor', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 