<?php



class BntiplugMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BntiplugMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bntiplug');
		$tMap->setPhpName('Bntiplug');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bntiplug_SEQ');

		$tMap->addColumn('CODTLU', 'Codtlu', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESTLU', 'Destlu', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 