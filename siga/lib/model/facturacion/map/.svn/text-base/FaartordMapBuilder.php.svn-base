<?php



class FaartordMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FaartordMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('faartord');
		$tMap->setPhpName('Faartord');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('faartord_SEQ');

		$tMap->addColumn('ORDCOM', 'Ordcom', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODUNIMED', 'Codunimed', 'string', CreoleTypes::VARCHAR, true, 6);

		$tMap->addColumn('CANORD', 'Canord', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CANREC', 'Canrec', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PREART', 'Preart', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONRGO', 'Monrgo', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PORRGO', 'Porrgo', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 