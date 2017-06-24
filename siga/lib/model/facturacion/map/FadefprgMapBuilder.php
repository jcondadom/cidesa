<?php



class FadefprgMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FadefprgMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fadefprg');
		$tMap->setPhpName('Fadefprg');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fadefprg_SEQ');

		$tMap->addColumn('CODPRG', 'Codprg', 'string', CreoleTypes::VARCHAR, true, 6);

		$tMap->addColumn('DESPRG', 'Desprg', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addColumn('ESPAE', 'Espae', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 