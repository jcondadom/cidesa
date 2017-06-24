<?php



class FacombanMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FacombanMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('facomban');
		$tMap->setPhpName('Facomban');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('facomban_SEQ');

		$tMap->addForeignKey('CODBAN_ID', 'CodbanId', 'int', CreoleTypes::INTEGER, 'fabancos', 'ID', true, null);

		$tMap->addForeignKey('TIPPAG_ID', 'TippagId', 'int', CreoleTypes::INTEGER, 'fatippag', 'ID', true, null);

		$tMap->addColumn('COMISION', 'Comision', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 