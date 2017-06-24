<?php



class CaunialartMapBuilder {

	
	const CLASS_NAME = 'lib.model.compras.map.CaunialartMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('caunialart');
		$tMap->setPhpName('Caunialart');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('caunialart_SEQ');

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('UNIALT', 'Unialt', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('RELART', 'Relart', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('CODUNIMED', 'Codunimed', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addColumn('COSUNI', 'Cosuni', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 