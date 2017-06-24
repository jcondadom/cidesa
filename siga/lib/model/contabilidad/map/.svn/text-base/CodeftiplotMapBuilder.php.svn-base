<?php



class CodeftiplotMapBuilder {

	
	const CLASS_NAME = 'lib.model.contabilidad.map.CodeftiplotMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('codeftiplot');
		$tMap->setPhpName('Codeftiplot');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('codeftiplot_SEQ');

		$tMap->addColumn('CODLOT', 'Codlot', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESLOT', 'Deslot', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('NUMLOT', 'Numlot', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('TIPCOM', 'Tipcom', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 