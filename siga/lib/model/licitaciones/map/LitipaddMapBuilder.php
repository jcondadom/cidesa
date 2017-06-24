<?php



class LitipaddMapBuilder {

	
	const CLASS_NAME = 'lib.model.licitaciones.map.LitipaddMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('litipadd');
		$tMap->setPhpName('Litipadd');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('litipadd_SEQ');

		$tMap->addColumn('CODTIPADD', 'Codtipadd', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('NOMTIPADD', 'Nomtipadd', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DETTIPADD', 'Dettipadd', 'string', CreoleTypes::VARCHAR, false, 10000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 