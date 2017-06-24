<?php



class CpmovtraperoriMapBuilder {

	
	const CLASS_NAME = 'lib.model.presupuesto.map.CpmovtraperoriMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cpmovtraperori');
		$tMap->setPhpName('Cpmovtraperori');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cpmovtraperori_SEQ');

		$tMap->addForeignKey('REFTRA', 'Reftra', 'string', CreoleTypes::VARCHAR, 'cptrasla', 'REFTRA', true, 8);

		$tMap->addForeignKey('CODORI', 'Codori', 'string', CreoleTypes::VARCHAR, 'cpdeftit', 'CODPRE', true, 50);

		$tMap->addColumn('PERPRE', 'Perpre', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('MONMOV', 'Monmov', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 