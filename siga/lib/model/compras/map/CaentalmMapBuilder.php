<?php



class CaentalmMapBuilder {

	
	const CLASS_NAME = 'lib.model.compras.map.CaentalmMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('caentalm');
		$tMap->setPhpName('Caentalm');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('caentalm_SEQ');

		$tMap->addColumn('RCPART', 'Rcpart', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECRCP', 'Fecrcp', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('DESRCP', 'Desrcp', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('MONRCP', 'Monrcp', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STARCP', 'Starcp', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODALM', 'Codalm', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CODUBI', 'Codubi', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addForeignKey('TIPMOV', 'Tipmov', 'string', CreoleTypes::VARCHAR, 'catipent', 'CODTIPENT', true, 3);

		$tMap->addColumn('CODCEN', 'Codcen', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('DPHART', 'Dphart', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('NUMCOM', 'Numcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addForeignKey('CODALMUSU', 'Codalmusu', 'string', CreoleTypes::VARCHAR, 'cadefalm', 'CODALM', false, 6);

		$tMap->addColumn('CODSADA', 'Codsada', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('NROENTDES', 'Nroentdes', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('NROCARVEH', 'Nrocarveh', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('NROCONTRO', 'Nrocontro', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CODDIREC', 'Coddirec', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DESANU', 'Desanu', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('USUANU', 'Usuanu', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('NROCON', 'Nrocon', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('CREATED_BY_USER', 'CreatedByUser', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('UPDATED_BY_USER', 'UpdatedByUser', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 