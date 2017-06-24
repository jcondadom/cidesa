<?php



class LitippenMapBuilder {

	
	const CLASS_NAME = 'lib.model.licitaciones.map.LitippenMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('litippen');
		$tMap->setPhpName('Litippen');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('litippen_SEQ');

		$tMap->addColumn('CODTIPPEN', 'Codtippen', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('NOMTIPPEN', 'Nomtippen', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DETTIPPEN', 'Dettippen', 'string', CreoleTypes::VARCHAR, false, 10000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 