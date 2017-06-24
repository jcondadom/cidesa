<?php



class LiempparMapBuilder {

	
	const CLASS_NAME = 'lib.model.licitaciones.map.LiempparMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('liemppar');
		$tMap->setPhpName('Liemppar');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('liemppar_SEQ');

		$tMap->addColumn('NUMPLIE', 'Numplie', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('NUMEXP', 'Numexp', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('FECRET', 'Fecret', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NOMREPLEG', 'Nomrepleg', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('RIFPRO', 'Rifpro', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('OBSERVACIONES', 'Observaciones', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('TIPCONPUB', 'Tipconpub', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 