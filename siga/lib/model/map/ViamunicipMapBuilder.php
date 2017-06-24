<?php



class ViamunicipMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ViamunicipMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('viamunicip');
		$tMap->setPhpName('Viamunicip');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('viamunicip_SEQ');

		$tMap->addColumn('CODMUN', 'Codmun', 'string', CreoleTypes::VARCHAR, true, 6);

		$tMap->addColumn('NOMMUN', 'Nommun', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addForeignKey('VIAESTADO_CODEST', 'ViaestadoCodest', 'string', CreoleTypes::VARCHAR, 'viaestado', 'CODEST', true, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 