<?php



class FaprematartMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FaprematartMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('faprematart');
		$tMap->setPhpName('Faprematart');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('faprematart_SEQ');

		$tMap->addColumn('REFPRE', 'Refpre', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODMAT', 'Codmat', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('UNIMAT', 'Unimat', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CANMAT', 'Canmat', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('COSMAT', 'Cosmat', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TOTMAT', 'Totmat', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 