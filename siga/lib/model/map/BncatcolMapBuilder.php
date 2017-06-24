<?php



class BncatcolMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BncatcolMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bncatcol');
		$tMap->setPhpName('Bncatcol');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bncatcol_SEQ');

		$tMap->addColumn('CODCOL', 'Codcol', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESCOL', 'Descol', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 