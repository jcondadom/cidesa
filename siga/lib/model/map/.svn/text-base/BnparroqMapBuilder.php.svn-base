<?php



class BnparroqMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BnparroqMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bnparroq');
		$tMap->setPhpName('Bnparroq');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bnparroq_SEQ');

		$tMap->addColumn('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, true, 6);

		$tMap->addColumn('NOMPAR', 'Nompar', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addForeignKey('BNMUNICIP_CODMUN', 'BnmunicipCodmun', 'string', CreoleTypes::VARCHAR, 'bnmunicip', 'CODMUN', true, 6);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 