<?php



class FapreserartMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FapreserartMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fapreserart');
		$tMap->setPhpName('Fapreserart');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fapreserart_SEQ');

		$tMap->addColumn('REFPRE', 'Refpre', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODSER', 'Codser', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('UNISER', 'Uniser', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CANSER', 'Canser', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('COSSER', 'Cosser', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TOTSER', 'Totser', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 