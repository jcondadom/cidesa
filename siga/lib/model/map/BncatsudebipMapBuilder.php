<?php



class BncatsudebipMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BncatsudebipMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bncatsudebip');
		$tMap->setPhpName('Bncatsudebip');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bncatsudebip_SEQ');

		$tMap->addColumn('SUDEBIP', 'Sudebip', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('DESUDEBIP', 'Desudebip', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 