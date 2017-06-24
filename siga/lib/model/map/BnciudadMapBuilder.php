<?php



class BnciudadMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BnciudadMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bnciudad');
		$tMap->setPhpName('Bnciudad');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bnciudad_SEQ');

		$tMap->addColumn('CODCIU', 'Codciu', 'string', CreoleTypes::VARCHAR, true, 12);

		$tMap->addColumn('NOMCIU', 'Nomciu', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addForeignKey('BNMUNICIP_CODMUN', 'BnmunicipCodmun', 'string', CreoleTypes::VARCHAR, 'bnmunicip', 'CODMUN', true, 6);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 