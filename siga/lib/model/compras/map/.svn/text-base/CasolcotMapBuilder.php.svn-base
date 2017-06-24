<?php



class CasolcotMapBuilder {

	
	const CLASS_NAME = 'lib.model.compras.map.CasolcotMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('casolcot');
		$tMap->setPhpName('Casolcot');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('casolcot_SEQ');

		$tMap->addColumn('NUMSOLCOT', 'Numsolcot', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECSOLCOT', 'Fecsolcot', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('REQART', 'Reqart', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('DESSOLCOT', 'Dessolcot', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 