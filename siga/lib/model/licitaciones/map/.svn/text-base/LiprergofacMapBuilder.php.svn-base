<?php



class LiprergofacMapBuilder {

	
	const CLASS_NAME = 'lib.model.licitaciones.map.LiprergofacMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('liprergofac');
		$tMap->setPhpName('Liprergofac');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('liprergofac_SEQ');

		$tMap->addColumn('NUMPRE', 'Numpre', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CODRGO', 'Codrgo', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('MONRGO', 'Monrgo', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TIPCONPUB', 'Tipconpub', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 