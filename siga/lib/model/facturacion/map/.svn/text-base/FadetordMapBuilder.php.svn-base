<?php



class FadetordMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FadetordMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fadetord');
		$tMap->setPhpName('Fadetord');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fadetord_SEQ');

		$tMap->addColumn('REFORD', 'Reford', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('DESART', 'Desart', 'string', CreoleTypes::VARCHAR, false, 2000);

		$tMap->addColumn('TIEDUR', 'Tiedur', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('EJEPOR', 'Ejepor', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('NUITEM', 'Nuitem', 'string', CreoleTypes::VARCHAR, false, 5);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 