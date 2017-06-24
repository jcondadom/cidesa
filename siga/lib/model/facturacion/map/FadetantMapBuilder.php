<?php



class FadetantMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FadetantMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fadetant');
		$tMap->setPhpName('Fadetant');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fadetant_SEQ');

		$tMap->addForeignKey('NROANT', 'Nroant', 'string', CreoleTypes::VARCHAR, 'faantcli', 'NROANT', true, 8);

		$tMap->addColumn('NROPED', 'Nroped', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('MONANT', 'Monant', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PORANT', 'Porant', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 