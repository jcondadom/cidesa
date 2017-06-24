<?php



class MangrutreMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.MangrutreMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mangrutre');
		$tMap->setPhpName('Mangrutre');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('mangrutre_SEQ');

		$tMap->addColumn('CODGRR', 'Codgrr', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESGRR', 'Desgrr', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 