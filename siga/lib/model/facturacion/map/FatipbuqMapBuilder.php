<?php



class FatipbuqMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FatipbuqMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fatipbuq');
		$tMap->setPhpName('Fatipbuq');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fatipbuq_SEQ');

		$tMap->addColumn('CODBUQ', 'Codbuq', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMBUQ', 'Nombuq', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 