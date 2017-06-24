<?php



class PapiroMapBuilder {

	
	const CLASS_NAME = 'lib.model.papiro.map.PapiroMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('papiro');
		$tMap->setPhpName('Papiro');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('papiro_SEQ');

		$tMap->addColumn('CODDOC', 'Coddoc', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('DOCUMENTO', 'Documento', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('DOWNLOAD', 'Download', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('VIEW', 'View', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 