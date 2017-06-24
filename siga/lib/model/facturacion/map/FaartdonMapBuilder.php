<?php



class FaartdonMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FaartdonMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('faartdon');
		$tMap->setPhpName('Faartdon');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('faartdon_SEQ');

		$tMap->addColumn('NRODON', 'Nrodon', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CANORD', 'Canord', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 