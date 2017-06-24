<?php



class FaartdevMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FaartdevMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('faartdev');
		$tMap->setPhpName('Faartdev');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('faartdev_SEQ');

		$tMap->addColumn('NRODEV', 'Nrodev', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('NUMLOT', 'Numlot', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CANDES', 'Candes', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CANDEV', 'Candev', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PREART', 'Preart', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TOTART', 'Totart', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('BTUCON', 'Btucon', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PREBTU', 'Prebtu', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONBTU', 'Monbtu', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODALM', 'Codalm', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODUBI', 'Codubi', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 