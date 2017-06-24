<?php



class NpregconvarMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpregconvarMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npregconvar');
		$tMap->setPhpName('Npregconvar');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npregconvar_SEQ');

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('FECNOM', 'Fecnom', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 