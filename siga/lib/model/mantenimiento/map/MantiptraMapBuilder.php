<?php



class MantiptraMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.MantiptraMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mantiptra');
		$tMap->setPhpName('Mantiptra');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('mantiptra_SEQ');

		$tMap->addColumn('CODTTA', 'Codtta', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESTTA', 'Destta', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 