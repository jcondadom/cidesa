<?php



class FadetconMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FadetconMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fadetcon');
		$tMap->setPhpName('Fadetcon');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fadetcon_SEQ');

		$tMap->addColumn('REFPRE', 'Refpre', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CANCON', 'Cancon', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PERCON', 'Percon', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECFIN', 'Fecfin', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('STACON', 'Stacon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 