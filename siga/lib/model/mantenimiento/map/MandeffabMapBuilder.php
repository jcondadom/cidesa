<?php



class MandeffabMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.MandeffabMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mandeffab');
		$tMap->setPhpName('Mandeffab');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('mandeffab_SEQ');

		$tMap->addColumn('CODFAB', 'Codfab', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESFAB', 'Desfab', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 