<?php



class CatiptransMapBuilder {

	
	const CLASS_NAME = 'lib.model.compras.map.CatiptransMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('catiptrans');
		$tMap->setPhpName('Catiptrans');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('catiptrans_SEQ');

		$tMap->addColumn('CODTRANS', 'Codtrans', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESTRANS', 'Destrans', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 