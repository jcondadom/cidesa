<?php



class FarecmatartMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FarecmatartMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('farecmatart');
		$tMap->setPhpName('Farecmatart');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('farecmatart_SEQ');

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODMAT', 'Codmat', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('UNIMAT', 'Unimat', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CANMAT', 'Canmat', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 