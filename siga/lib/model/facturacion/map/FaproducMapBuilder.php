<?php



class FaproducMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FaproducMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('faproduc');
		$tMap->setPhpName('Faproduc');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('faproduc_SEQ');

		$tMap->addColumn('RIFPROD', 'Rifprod', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('NOMPROD', 'Nomprod', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('DIRPROD', 'Dirprod', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TELPROD', 'Telprod', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('EMAPROD', 'Emaprod', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('PORCOM', 'Porcom', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 