<?php



class FargopedMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FargopedMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fargoped');
		$tMap->setPhpName('Fargoped');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fargoped_SEQ');

		$tMap->addColumn('REFDOC', 'Refdoc', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODRGO', 'Codrgo', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('MONRGO', 'Monrgo', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TIPDOC', 'Tipdoc', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 