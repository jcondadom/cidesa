<?php



class FadetbilcieMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FadetbilcieMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fadetbilcie');
		$tMap->setPhpName('Fadetbilcie');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fadetbilcie_SEQ');

		$tMap->addForeignKey('CODCIE', 'Codcie', 'int', CreoleTypes::INTEGER, 'faciecaj', 'ID', true, null);

		$tMap->addColumn('CODBIL', 'Codbil', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CANBIL', 'Canbil', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 