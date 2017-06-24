<?php



class ViarensolviaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ViarensolviaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('viarensolvia');
		$tMap->setPhpName('Viarensolvia');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('viarensolvia_SEQ');

		$tMap->addColumn('NUMREN', 'Numren', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('FECREN', 'Fecren', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NUMSOL', 'Numsol', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('LUGVIS', 'Lugvis', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('ACTREA', 'Actrea', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('RESOBT', 'Resobt', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('BENINS', 'Benins', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('CONREC', 'Conrec', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 