<?php



class BndetregpolcerMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BndetregpolcerMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bndetregpolcer');
		$tMap->setPhpName('Bndetregpolcer');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bndetregpolcer_SEQ');

		$tMap->addColumn('NUMPOL', 'Numpol', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODACT', 'Codact', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('CODMUE', 'Codmue', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('MONPRI', 'Monpri', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 