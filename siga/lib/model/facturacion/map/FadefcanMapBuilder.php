<?php



class FadefcanMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FadefcanMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fadefcan');
		$tMap->setPhpName('Fadefcan');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fadefcan_SEQ');

		$tMap->addColumn('CODCAN', 'Codcan', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESCAN', 'Descan', 'string', CreoleTypes::VARCHAR, true, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 