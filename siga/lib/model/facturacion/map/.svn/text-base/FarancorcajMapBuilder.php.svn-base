<?php



class FarancorcajMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FarancorcajMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('farancorcaj');
		$tMap->setPhpName('Farancorcaj');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('farancorcaj_SEQ');

		$tMap->addColumn('CODCAJ', 'Codcaj', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('CORDES', 'Cordes', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('CORHAS', 'Corhas', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('CORACT', 'Coract', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('ACTIVO', 'Activo', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 