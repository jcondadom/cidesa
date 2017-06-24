<?php



class BnregpolcerMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BnregpolcerMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bnregpolcer');
		$tMap->setPhpName('Bnregpolcer');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bnregpolcer_SEQ');

		$tMap->addColumn('NUMPOL', 'Numpol', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('FECPOL', 'Fecpol', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('NUMREC', 'Numrec', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECVEN', 'Fecven', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NUMSOLPAG', 'Numsolpag', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('NUMSOL', 'Numsol', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 