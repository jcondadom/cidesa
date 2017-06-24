<?php



class CadefunimedMapBuilder {

	
	const CLASS_NAME = 'lib.model.compras.map.CadefunimedMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cadefunimed');
		$tMap->setPhpName('Cadefunimed');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cadefunimed_SEQ');

		$tMap->addColumn('CODUNIMED', 'Codunimed', 'string', CreoleTypes::VARCHAR, true, 6);

		$tMap->addColumn('DESUNIMED', 'Desunimed', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('ABRUNIMED', 'Abrunimed', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('TIPUNIMED', 'Tipunimed', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 