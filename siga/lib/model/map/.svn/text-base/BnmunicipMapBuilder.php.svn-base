<?php



class BnmunicipMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BnmunicipMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bnmunicip');
		$tMap->setPhpName('Bnmunicip');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bnmunicip_SEQ');

		$tMap->addColumn('CODMUN', 'Codmun', 'string', CreoleTypes::VARCHAR, true, 6);

		$tMap->addColumn('NOMMUN', 'Nommun', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addForeignKey('BNESTADO_CODEST', 'BnestadoCodest', 'string', CreoleTypes::VARCHAR, 'bnestado', 'CODEST', true, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 