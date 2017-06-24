<?php



class FaordcomMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FaordcomMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('faordcom');
		$tMap->setPhpName('Faordcom');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('faordcom_SEQ');

		$tMap->addColumn('ORDCOM', 'Ordcom', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECORD', 'Fecord', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('DESORD', 'Desord', 'string', CreoleTypes::VARCHAR, true, 1000);

		$tMap->addColumn('MONORD', 'Monord', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('NOMPRO', 'Nompro', 'string', CreoleTypes::VARCHAR, true, 200);

		$tMap->addColumn('DIRPRO', 'Dirpro', 'string', CreoleTypes::VARCHAR, true, 1000);

		$tMap->addColumn('CODALMSAP', 'Codalmsap', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 