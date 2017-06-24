<?php



class CpevepreMapBuilder {

	
	const CLASS_NAME = 'lib.model.presupuesto.map.CpevepreMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cpevepre');
		$tMap->setPhpName('Cpevepre');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cpevepre_SEQ');

		$tMap->addColumn('CODEVE', 'Codeve', 'string', CreoleTypes::VARCHAR, true, 6);

		$tMap->addColumn('DESEVE', 'Deseve', 'string', CreoleTypes::VARCHAR, true, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 