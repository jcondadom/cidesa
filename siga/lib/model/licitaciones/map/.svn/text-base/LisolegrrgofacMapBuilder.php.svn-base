<?php



class LisolegrrgofacMapBuilder {

	
	const CLASS_NAME = 'lib.model.licitaciones.map.LisolegrrgofacMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('lisolegrrgofac');
		$tMap->setPhpName('Lisolegrrgofac');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('lisolegrrgofac_SEQ');

		$tMap->addColumn('NUMSOL', 'Numsol', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CODRGO', 'Codrgo', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('MONRGO', 'Monrgo', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TIPCONPUB', 'Tipconpub', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 