<?php



class CadefdirecMapBuilder {

	
	const CLASS_NAME = 'lib.model.compras.map.CadefdirecMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cadefdirec');
		$tMap->setPhpName('Cadefdirec');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cadefdirec_SEQ');

		$tMap->addColumn('CODDIREC', 'Coddirec', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('DESDIREC', 'Desdirec', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('ESCENTRAL', 'Escentral', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('CORPTA', 'Corpta', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PREPTA', 'Prepta', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 