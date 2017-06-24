<?php



class NpfuncarptoctaMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpfuncarptoctaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npfuncarptocta');
		$tMap->setPhpName('Npfuncarptocta');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npfuncarptocta_SEQ');

		$tMap->addColumn('NUMPTA', 'Numpta', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODCAR', 'Codcar', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODNIV', 'Codniv', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('DESFUN', 'Desfun', 'string', CreoleTypes::VARCHAR, true, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 