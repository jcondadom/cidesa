<?php



class NpgruempMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpgruempMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npgruemp');
		$tMap->setPhpName('Npgruemp');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npgruemp_SEQ');

		$tMap->addColumn('CODGRU', 'Codgru', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODCAR', 'Codcar', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 