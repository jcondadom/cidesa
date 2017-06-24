<?php



class VianivpriMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.VianivpriMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('vianivpri');
		$tMap->setPhpName('Vianivpri');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('vianivpri_SEQ');

		$tMap->addColumn('CODPRI', 'Codpri', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CODNIV', 'Codniv', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('MONPOR', 'Monpor', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 