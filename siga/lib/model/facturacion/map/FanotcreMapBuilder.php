<?php



class FanotcreMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FanotcreMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fanotcre');
		$tMap->setPhpName('Fanotcre');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fanotcre_SEQ');

		$tMap->addColumn('REFFAC', 'Reffac', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CORREL', 'Correl', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('FECNOT', 'Fecnot', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('MONTO', 'Monto', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DESNOT', 'Desnot', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('STANOT', 'Stanot', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 