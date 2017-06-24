<?php



class NpdetturMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpdetturMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npdettur');
		$tMap->setPhpName('Npdettur');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npdettur_SEQ');

		$tMap->addColumn('CODTUR', 'Codtur', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('CODJOR', 'Codjor', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('DIA', 'Dia', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ORDEN', 'Orden', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 