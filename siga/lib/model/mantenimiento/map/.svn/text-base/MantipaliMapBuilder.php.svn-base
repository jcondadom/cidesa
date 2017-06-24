<?php



class MantipaliMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.MantipaliMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mantipali');
		$tMap->setPhpName('Mantipali');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('mantipali_SEQ');

		$tMap->addColumn('CODTAL', 'Codtal', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESTAL', 'Destal', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 