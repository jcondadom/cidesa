<?php



class CadetsolcotMapBuilder {

	
	const CLASS_NAME = 'lib.model.compras.map.CadetsolcotMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cadetsolcot');
		$tMap->setPhpName('Cadetsolcot');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cadetsolcot_SEQ');

		$tMap->addColumn('NUMSOLCOT', 'Numsolcot', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 