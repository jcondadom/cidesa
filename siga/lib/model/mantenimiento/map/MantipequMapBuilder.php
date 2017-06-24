<?php



class MantipequMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.MantipequMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mantipequ');
		$tMap->setPhpName('Mantipequ');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('mantipequ_SEQ');

		$tMap->addColumn('CODTEQ', 'Codteq', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESTEQ', 'Desteq', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 