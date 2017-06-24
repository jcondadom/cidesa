<?php



class NpasonomcptgruMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpasonomcptgruMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npasonomcptgru');
		$tMap->setPhpName('Npasonomcptgru');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npasonomcptgru_SEQ');

		$tMap->addColumn('CODGRUCPT', 'Codgrucpt', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 