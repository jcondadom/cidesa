<?php



class CpmovtraperdesMapBuilder {

	
	const CLASS_NAME = 'lib.model.presupuesto.map.CpmovtraperdesMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cpmovtraperdes');
		$tMap->setPhpName('Cpmovtraperdes');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cpmovtraperdes_SEQ');

		$tMap->addForeignKey('REFTRA', 'Reftra', 'string', CreoleTypes::VARCHAR, 'cptrasla', 'REFTRA', true, 8);

		$tMap->addForeignKey('CODDES', 'Coddes', 'string', CreoleTypes::VARCHAR, 'cpdeftit', 'CODPRE', true, 50);

		$tMap->addColumn('PERPRE', 'Perpre', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('MONMOV', 'Monmov', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 