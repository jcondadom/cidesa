<?php



class ViaasoempautMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ViaasoempautMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('viaasoempaut');
		$tMap->setPhpName('Viaasoempaut');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('viaasoempaut_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODEMPAUT', 'Codempaut', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 