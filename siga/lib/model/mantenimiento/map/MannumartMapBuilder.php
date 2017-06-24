<?php



class MannumartMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.MannumartMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mannumart');
		$tMap->setPhpName('Mannumart');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('mannumart_SEQ');

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESART', 'Desart', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 