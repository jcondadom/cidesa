<?php



class OpctabenMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OpctabenMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('opctaben');
		$tMap->setPhpName('Opctaben');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('opctaben_SEQ');

		$tMap->addColumn('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('CODCTA', 'Codcta', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 