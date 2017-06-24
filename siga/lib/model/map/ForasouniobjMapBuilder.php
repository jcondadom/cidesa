<?php



class ForasouniobjMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ForasouniobjMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('forasouniobj');
		$tMap->setPhpName('Forasouniobj');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('forasouniobj_SEQ');

		$tMap->addColumn('CODUNI', 'Coduni', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODOBJ', 'Codobj', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 