<?php



class MantipgarMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.MantipgarMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mantipgar');
		$tMap->setPhpName('Mantipgar');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('mantipgar_SEQ');

		$tMap->addColumn('CODTGA', 'Codtga', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESTGA', 'Destga', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 