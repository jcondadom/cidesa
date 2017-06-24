<?php



class MantiplubMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.MantiplubMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mantiplub');
		$tMap->setPhpName('Mantiplub');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('mantiplub_SEQ');

		$tMap->addColumn('CODTLU', 'Codtlu', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESTLU', 'Destlu', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('LUBRIC', 'Lubric', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODUME', 'Codume', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 