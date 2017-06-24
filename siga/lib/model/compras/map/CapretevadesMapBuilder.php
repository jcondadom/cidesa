<?php



class CapretevadesMapBuilder {

	
	const CLASS_NAME = 'lib.model.compras.map.CapretevadesMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('capretevades');
		$tMap->setPhpName('Capretevades');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('capretevades_SEQ');

		$tMap->addColumn('CODEVA', 'Codeva', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODPRG', 'Codprg', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('PUNPRE', 'Punpre', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 