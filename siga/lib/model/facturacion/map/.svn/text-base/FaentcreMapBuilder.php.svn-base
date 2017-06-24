<?php



class FaentcreMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FaentcreMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('faentcre');
		$tMap->setPhpName('Faentcre');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('faentcre_SEQ');

		$tMap->addColumn('CODENTCRE', 'Codentcre', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('NOMENTCRE', 'Nomentcre', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addForeignKey('CODZON', 'Codzon', 'string', CreoleTypes::VARCHAR, 'fadefzon', 'CODZON', true, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 