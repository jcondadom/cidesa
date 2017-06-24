<?php



class FaartdtocteMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FaartdtocteMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('faartdtocte');
		$tMap->setPhpName('Faartdtocte');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('faartdtocte_SEQ');

		$tMap->addForeignKey('FATIPCTE_ID', 'FatipcteId', 'int', CreoleTypes::INTEGER, 'fatipcte', 'ID', false, null);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODDESC', 'Coddesc', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 