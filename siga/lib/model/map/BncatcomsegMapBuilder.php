<?php



class BncatcomsegMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BncatcomsegMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bncatcomseg');
		$tMap->setPhpName('Bncatcomseg');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bncatcomseg_SEQ');

		$tMap->addColumn('CODCOM', 'Codcom', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('NOMCOM', 'Nomcom', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('NOMPRO', 'Nompro', 'string', CreoleTypes::VARCHAR, true, 150);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 