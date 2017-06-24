<?php



class NpbecnivinsMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpbecnivinsMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npbecnivins');
		$tMap->setPhpName('Npbecnivins');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npbecnivins_SEQ');

		$tMap->addColumn('CODBEC', 'Codbec', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODNIV', 'Codniv', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CANUNITRI', 'Canunitri', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 