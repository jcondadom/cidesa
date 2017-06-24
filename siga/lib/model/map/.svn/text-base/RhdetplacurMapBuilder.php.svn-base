<?php



class RhdetplacurMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RhdetplacurMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('rhdetplacur');
		$tMap->setPhpName('Rhdetplacur');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('rhdetplacur_SEQ');

		$tMap->addColumn('CODPLACUR', 'Codplacur', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODCAR', 'Codcar', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('TIPPER', 'Tipper', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODGRU', 'Codgru', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 