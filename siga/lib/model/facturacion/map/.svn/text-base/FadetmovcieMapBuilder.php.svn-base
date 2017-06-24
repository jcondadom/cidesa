<?php



class FadetmovcieMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FadetmovcieMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fadetmovcie');
		$tMap->setPhpName('Fadetmovcie');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fadetmovcie_SEQ');

		$tMap->addForeignKey('CODCIE', 'Codcie', 'int', CreoleTypes::INTEGER, 'faciecaj', 'ID', true, null);

		$tMap->addColumn('REFFAC', 'Reffac', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('NUMERO', 'Numero', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('MONPAG', 'Monpag', 'double', CreoleTypes::NUMERIC, true, 32);

		$tMap->addColumn('TIPPAG_ID', 'TippagId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CODBAN_ID', 'CodbanId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('COMISION', 'Comision', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 