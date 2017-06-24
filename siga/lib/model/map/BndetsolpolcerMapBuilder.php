<?php



class BndetsolpolcerMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BndetsolpolcerMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bndetsolpolcer');
		$tMap->setPhpName('Bndetsolpolcer');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bndetsolpolcer_SEQ');

		$tMap->addColumn('NUMSOL', 'Numsol', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODACT', 'Codact', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('CODMUE', 'Codmue', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('MONPRI', 'Monpri', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('NUMDEP', 'Numdep', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('MONDEP', 'Mondep', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 