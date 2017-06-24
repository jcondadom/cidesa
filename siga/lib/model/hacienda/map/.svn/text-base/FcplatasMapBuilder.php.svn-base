<?php



class FcplatasMapBuilder {

	
	const CLASS_NAME = 'lib.model.hacienda.map.FcplatasMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcplatas');
		$tMap->setPhpName('Fcplatas');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcplatas_SEQ');

		$tMap->addColumn('CODPLA', 'Codpla', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODTAS', 'Codtas', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 