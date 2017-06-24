<?php



class FcdefplaMapBuilder {

	
	const CLASS_NAME = 'lib.model.hacienda.map.FcdefplaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcdefpla');
		$tMap->setPhpName('Fcdefpla');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcdefpla_SEQ');

		$tMap->addColumn('CODPLA', 'Codpla', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESPLA', 'Despla', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 