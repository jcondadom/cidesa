<?php



class CaalmpdaMapBuilder {

	
	const CLASS_NAME = 'lib.model.compras.map.CaalmpdaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('caalmpda');
		$tMap->setPhpName('Caalmpda');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('caalmpda_SEQ');

		$tMap->addColumn('REFPDA', 'Refpda', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('ID_REG', 'IdReg', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CODALM', 'Codalm', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODUBI', 'Codubi', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CANDIS', 'Candis', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 