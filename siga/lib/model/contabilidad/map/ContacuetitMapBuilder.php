<?php



class ContacuetitMapBuilder {

	
	const CLASS_NAME = 'lib.model.contabilidad.map.ContacuetitMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('contacuetit');
		$tMap->setPhpName('Contacuetit');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('contacuetit_SEQ');

		$tMap->addColumn('CODTITDET', 'Codtitdet', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODCTA', 'Codcta', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('DESCTA', 'Descta', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 