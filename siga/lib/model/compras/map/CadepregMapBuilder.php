<?php



class CadepregMapBuilder {

	
	const CLASS_NAME = 'lib.model.compras.map.CadepregMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cadepreg');
		$tMap->setPhpName('Cadepreg');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cadepreg_SEQ');

		$tMap->addColumn('CODPRG', 'Codprg', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESPRG', 'Desprg', 'string', CreoleTypes::VARCHAR, true, 2000);

		$tMap->addColumn('TIPPRG', 'Tipprg', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('PREPRO', 'Prepro', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('PREINS', 'Preins', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('PREPYS', 'Prepys', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 