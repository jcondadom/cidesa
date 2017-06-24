<?php



class FadefclaMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FadefclaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fadefcla');
		$tMap->setPhpName('Fadefcla');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fadefcla_SEQ');

		$tMap->addColumn('CODCLA', 'Codcla', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESCLA', 'Descla', 'string', CreoleTypes::VARCHAR, true, 2000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 