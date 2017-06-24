<?php



class CatproductosMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CatproductosMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('catproductos');
		$tMap->setPhpName('Catproductos');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('catproductos_SEQ');

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('DESART', 'Desart', 'string', CreoleTypes::VARCHAR, false, 1500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 