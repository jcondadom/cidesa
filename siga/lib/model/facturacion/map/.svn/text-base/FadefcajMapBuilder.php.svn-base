<?php



class FadefcajMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FadefcajMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fadefcaj');
		$tMap->setPhpName('Fadefcaj');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fadefcaj_SEQ');

		$tMap->addColumn('DESCAJ', 'Descaj', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('CORCAJ', 'Corcaj', 'double', CreoleTypes::NUMERIC, false, 8);

		$tMap->addColumn('CORFAC', 'Corfac', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('CORNUMCTR', 'Cornumctr', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('CODALM', 'Codalm', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CONPAG', 'Conpag', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('IMPFISNAME', 'Impfisname', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('IMPFISHOST', 'Impfishost', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 