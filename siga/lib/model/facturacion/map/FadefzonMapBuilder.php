<?php



class FadefzonMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FadefzonMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fadefzon');
		$tMap->setPhpName('Fadefzon');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fadefzon_SEQ');

		$tMap->addColumn('CODZON', 'Codzon', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESZON', 'Deszon', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 