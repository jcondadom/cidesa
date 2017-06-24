<?php



class FacarordMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FacarordMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('facarord');
		$tMap->setPhpName('Facarord');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('facarord_SEQ');

		$tMap->addColumn('NUMCAR', 'Numcar', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('FECCAR', 'Feccar', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('FECVEN', 'Fecven', 'int', CreoleTypes::DATE, true, null);

		$tMap->addForeignKey('CODENTCRE', 'Codentcre', 'string', CreoleTypes::VARCHAR, 'faentcre', 'CODENTCRE', true, 3);

		$tMap->addForeignKey('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, 'facliente', 'CODPRO', true, 15);

		$tMap->addForeignKey('RAMART', 'Ramart', 'string', CreoleTypes::VARCHAR, 'caramart', 'RAMART', false, 6);

		$tMap->addColumn('DESCAR', 'Descar', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addForeignKey('CODBAN', 'Codban', 'string', CreoleTypes::VARCHAR, 'facliente', 'CODPRO', true, 10);

		$tMap->addColumn('MONCAR', 'Moncar', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STACAR', 'Stacar', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addForeignKey('CODALMUSU', 'Codalmusu', 'string', CreoleTypes::VARCHAR, 'cadefalm', 'CODALM', false, 6);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('CREATED_BY_USER', 'CreatedByUser', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('UPDATED_BY_USER', 'UpdatedByUser', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 