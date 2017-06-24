<?php



class CpsolmovadiperMapBuilder {

	
	const CLASS_NAME = 'lib.model.presupuesto.map.CpsolmovadiperMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cpsolmovadiper');
		$tMap->setPhpName('Cpsolmovadiper');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cpsolmovadiper_SEQ');

		$tMap->addForeignKey('REFADI', 'Refadi', 'string', CreoleTypes::VARCHAR, 'cpsoladidis', 'REFADI', true, 8);

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('PERPRE', 'Perpre', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('MONMOV', 'Monmov', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 