<?php



class CostipcosMapBuilder {

	
	const CLASS_NAME = 'lib.model.costos.map.CostipcosMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('costipcos');
		$tMap->setPhpName('Costipcos');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('costipcos_SEQ');

		$tMap->addColumn('CODCOS', 'Codcos', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('DESCOS', 'Descos', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 