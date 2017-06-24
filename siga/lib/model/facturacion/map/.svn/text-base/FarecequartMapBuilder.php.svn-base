<?php



class FarecequartMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FarecequartMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('farecequart');
		$tMap->setPhpName('Farecequart');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('farecequart_SEQ');

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODEQU', 'Codequ', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('UNIEQU', 'Uniequ', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CANEQU', 'Canequ', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 