<?php



class NpgruturMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpgruturMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npgrutur');
		$tMap->setPhpName('Npgrutur');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npgrutur_SEQ');

		$tMap->addColumn('CODTUR', 'Codtur', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('FECFIN', 'Fecfin', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('CODGRU', 'Codgru', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('FECLUN', 'Feclun', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('JORLUN', 'Jorlun', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('FECMAR', 'Fecmar', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('JORMAR', 'Jormar', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('FECMIE', 'Fecmie', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('JORMIE', 'Jormie', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('FECJUE', 'Fecjue', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('JORJUE', 'Jorjue', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('FECVIE', 'Fecvie', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('JORVIE', 'Jorvie', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('FECSAB', 'Fecsab', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('JORSAB', 'Jorsab', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('FECDOM', 'Fecdom', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('JORDOM', 'Jordom', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 