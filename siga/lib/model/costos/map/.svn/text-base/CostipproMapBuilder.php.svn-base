<?php



class CostipproMapBuilder {

	
	const CLASS_NAME = 'lib.model.costos.map.CostipproMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('costippro');
		$tMap->setPhpName('Costippro');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('costippro_SEQ');

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('DESPRO', 'Despro', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 