<?php



class FarecmanartMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FarecmanartMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('farecmanart');
		$tMap->setPhpName('Farecmanart');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('farecmanart_SEQ');

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODMAN', 'Codman', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('UNIMAN', 'Uniman', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CANMAN', 'Canman', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 