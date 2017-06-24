<?php



class ManinssegMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.ManinssegMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('maninsseg');
		$tMap->setPhpName('Maninsseg');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('maninsseg_SEQ');

		$tMap->addColumn('CODINS', 'Codins', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESINS', 'Desins', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 