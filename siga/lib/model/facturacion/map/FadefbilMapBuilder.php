<?php



class FadefbilMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FadefbilMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fadefbil');
		$tMap->setPhpName('Fadefbil');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fadefbil_SEQ');

		$tMap->addColumn('CODBIL', 'Codbil', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('DESBIL', 'Desbil', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DENBIL', 'Denbil', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 