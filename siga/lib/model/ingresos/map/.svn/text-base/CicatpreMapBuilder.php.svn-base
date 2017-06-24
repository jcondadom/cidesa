<?php



class CicatpreMapBuilder {

	
	const CLASS_NAME = 'lib.model.ingresos.map.CicatpreMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cicatpre');
		$tMap->setPhpName('Cicatpre');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cicatpre_SEQ');

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('NOMCAT', 'Nomcat', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 