<?php



class CafirdocpreMapBuilder {

	
	const CLASS_NAME = 'lib.model.compras.map.CafirdocpreMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cafirdocpre');
		$tMap->setPhpName('Cafirdocpre');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cafirdocpre_SEQ');

		$tMap->addColumn('CODDIREC', 'Coddirec', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('TIPDOC', 'Tipdoc', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 