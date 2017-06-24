<?php



class FaestvenMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FaestvenMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('faestven');
		$tMap->setPhpName('Faestven');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('faestven_SEQ');

		$tMap->addColumn('ANOEST', 'Anoest', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('MESEST', 'Mesest', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('MONEST', 'Monest', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONFAC', 'Monfac', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 