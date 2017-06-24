<?php



class HccaravaMapBuilder {

	
	const CLASS_NAME = 'lib.model.hcm.map.HccaravaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('hccarava');
		$tMap->setPhpName('Hccarava');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('hccarava_SEQ');

		$tMap->addColumn('NUMCAR', 'Numcar', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CEDFAM', 'Cedfam', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('RIFPRO', 'Rifpro', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('FECCAR', 'Feccar', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('CONCAR', 'Concar', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('MONCAR', 'Moncar', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('NUMPRE', 'Numpre', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECPRE', 'Fecpre', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('LOGUSE', 'Loguse', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 