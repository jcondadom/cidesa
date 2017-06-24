<?php



class NpgruconMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpgruconMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npgrucon');
		$tMap->setPhpName('Npgrucon');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npgrucon_SEQ');

		$tMap->addColumn('CODGRUCPT', 'Codgrucpt', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DESGRUCPT', 'Desgrucpt', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 