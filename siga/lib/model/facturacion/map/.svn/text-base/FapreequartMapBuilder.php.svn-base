<?php



class FapreequartMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FapreequartMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fapreequart');
		$tMap->setPhpName('Fapreequart');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fapreequart_SEQ');

		$tMap->addColumn('REFPRE', 'Refpre', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODEQU', 'Codequ', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('UNIEQU', 'Uniequ', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CANEQU', 'Canequ', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('COSEQU', 'Cosequ', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TOTEQU', 'Totequ', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 