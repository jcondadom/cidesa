<?php



class OptipdesMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OptipdesMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('optipdes');
		$tMap->setPhpName('Optipdes');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('optipdes_SEQ');

		$tMap->addColumn('CODTDE', 'Codtde', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESTDE', 'Destde', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('CODCTA', 'Codcta', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 