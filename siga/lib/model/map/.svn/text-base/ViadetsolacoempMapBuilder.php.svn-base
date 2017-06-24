<?php



class ViadetsolacoempMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ViadetsolacoempMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('viadetsolacoemp');
		$tMap->setPhpName('Viadetsolacoemp');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('viadetsolacoemp_SEQ');

		$tMap->addColumn('NUMSOL', 'Numsol', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('CODEMPACO', 'Codempaco', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODNIVACO', 'Codnivaco', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('REFCOM', 'Refcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 