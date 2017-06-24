<?php



class MandetreqMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.MandetreqMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mandetreq');
		$tMap->setPhpName('Mandetreq');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('mandetreq_SEQ');

		$tMap->addColumn('NUMORD', 'Numord', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('REQART', 'Reqart', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 