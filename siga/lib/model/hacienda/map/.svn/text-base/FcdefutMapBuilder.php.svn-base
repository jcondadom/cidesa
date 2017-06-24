<?php



class FcdefutMapBuilder {

	
	const CLASS_NAME = 'lib.model.hacienda.map.FcdefutMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcdefut');
		$tMap->setPhpName('Fcdefut');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcdefut_SEQ');

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('FECFIN', 'Fecfin', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('VALORUT', 'Valorut', 'double', CreoleTypes::NUMERIC, false, 20);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 