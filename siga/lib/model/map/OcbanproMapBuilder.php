<?php



class OcbanproMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OcbanproMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ocbanpro');
		$tMap->setPhpName('Ocbanpro');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ocbanpro_SEQ');

		$tMap->addColumn('CODBANPRO', 'Codbanpro', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESBANPRO', 'Desbanpro', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 