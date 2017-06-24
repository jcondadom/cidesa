<?php



class FaprgalmMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FaprgalmMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('faprgalm');
		$tMap->setPhpName('Faprgalm');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('faprgalm_SEQ');

		$tMap->addColumn('CODPRG', 'Codprg', 'string', CreoleTypes::VARCHAR, true, 6);

		$tMap->addColumn('CODALM', 'Codalm', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 