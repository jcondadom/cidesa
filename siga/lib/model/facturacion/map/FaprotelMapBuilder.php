<?php



class FaprotelMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FaprotelMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('faprotel');
		$tMap->setPhpName('Faprotel');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('faprotel_SEQ');

		$tMap->addColumn('CODPROTEL', 'Codprotel', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('DESPROTEL', 'Desprotel', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 