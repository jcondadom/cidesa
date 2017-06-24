<?php



class CadefdiviMapBuilder {

	
	const CLASS_NAME = 'lib.model.compras.map.CadefdiviMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cadefdivi');
		$tMap->setPhpName('Cadefdivi');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cadefdivi_SEQ');

		$tMap->addColumn('CODDIVI', 'Coddivi', 'string', CreoleTypes::VARCHAR, true, 6);

		$tMap->addColumn('DESDIVI', 'Desdivi', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addColumn('CODDIREC', 'Coddirec', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 