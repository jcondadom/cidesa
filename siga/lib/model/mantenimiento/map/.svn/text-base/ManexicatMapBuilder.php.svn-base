<?php



class ManexicatMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.ManexicatMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('manexicat');
		$tMap->setPhpName('Manexicat');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('manexicat_SEQ');

		$tMap->addColumn('NUMSOL', 'Numsol', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('STCCLA', 'Stccla', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('CODALM', 'Codalm', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('EXIMIN', 'Eximin', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('EXIMAX', 'Eximax', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PTOREO', 'Ptoreo', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 