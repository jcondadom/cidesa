<?php



class CadefgarMapBuilder {

	
	const CLASS_NAME = 'lib.model.compras.map.CadefgarMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cadefgar');
		$tMap->setPhpName('Cadefgar');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cadefgar_SEQ');

		$tMap->addColumn('CODGAR', 'Codgar', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESGAR', 'Desgar', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 