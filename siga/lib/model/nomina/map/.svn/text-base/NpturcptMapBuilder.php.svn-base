<?php



class NpturcptMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpturcptMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npturcpt');
		$tMap->setPhpName('Npturcpt');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npturcpt_SEQ');

		$tMap->addColumn('CODTUR', 'Codtur', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 