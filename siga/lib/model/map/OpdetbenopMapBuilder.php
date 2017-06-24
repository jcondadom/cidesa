<?php



class OpdetbenopMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OpdetbenopMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('opdetbenop');
		$tMap->setPhpName('Opdetbenop');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('opdetbenop_SEQ');

		$tMap->addColumn('NUMORD', 'Numord', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('MONBEN', 'Monben', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 