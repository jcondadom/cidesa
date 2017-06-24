<?php



class CobfordepcheMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CobfordepcheMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cobfordepche');
		$tMap->setPhpName('Cobfordepche');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cobfordepche_SEQ');

		$tMap->addColumn('NUMTRA', 'Numtra', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('NUMCHE', 'Numche', 'string', CreoleTypes::VARCHAR, false, 24);

		$tMap->addForeignKey('FABANCOS_ID', 'FabancosId', 'int', CreoleTypes::INTEGER, 'fabancos', 'ID', true, null);

		$tMap->addColumn('MONCHE', 'Monche', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addForeignKey('COBDETFOR_ID', 'CobdetforId', 'int', CreoleTypes::INTEGER, 'cobdetfor', 'ID', true, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 