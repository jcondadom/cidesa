<?php



class CaartaocMapBuilder {

	
	const CLASS_NAME = 'lib.model.compras.map.CaartaocMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('caartaoc');
		$tMap->setPhpName('Caartaoc');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('caartaoc_SEQ');

		$tMap->addColumn('AJUOC', 'Ajuoc', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('CANORD', 'Canord', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CANAJU', 'Canaju', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONTOT', 'Montot', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONRGO', 'Monrgo', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONAJU', 'Monaju', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONREC', 'Monrec', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DESART', 'Desart', 'string', CreoleTypes::VARCHAR, false, 2000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 