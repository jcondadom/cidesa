<?php



class CidefparMapBuilder {

	
	const CLASS_NAME = 'lib.model.ingresos.map.CidefparMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cidefpar');
		$tMap->setPhpName('Cidefpar');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cidefpar_SEQ');

		$tMap->addColumn('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addColumn('DESPAR', 'Despar', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 