<?php



class CpsolmovtraperoriMapBuilder {

	
	const CLASS_NAME = 'lib.model.presupuesto.map.CpsolmovtraperoriMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cpsolmovtraperori');
		$tMap->setPhpName('Cpsolmovtraperori');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cpsolmovtraperori_SEQ');

		$tMap->addForeignKey('REFTRA', 'Reftra', 'string', CreoleTypes::VARCHAR, 'cpsoltrasla', 'REFTRA', true, 8);

		$tMap->addColumn('CODORI', 'Codori', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('PERPRE', 'Perpre', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('MONMOV', 'Monmov', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 