<?php



class CasalalmMapBuilder {

	
	const CLASS_NAME = 'lib.model.compras.map.CasalalmMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('casalalm');
		$tMap->setPhpName('Casalalm');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('casalalm_SEQ');

		$tMap->addColumn('CODSAL', 'Codsal', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECSAL', 'Fecsal', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('DESSAL', 'Dessal', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('MONSAL', 'Monsal', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STASAL', 'Stasal', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODALM', 'Codalm', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CODUBI', 'Codubi', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addForeignKey('TIPMOV', 'Tipmov', 'string', CreoleTypes::VARCHAR, 'catipsal', 'CODTIPSAL', true, 3);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('CODCEN', 'Codcen', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('REQART', 'Reqart', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('NUMCOM', 'Numcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addForeignKey('CODALMUSU', 'Codalmusu', 'string', CreoleTypes::VARCHAR, 'cadefalm', 'CODALM', false, 6);

		$tMap->addColumn('CODDIREC', 'Coddirec', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('CREATED_BY_USER', 'CreatedByUser', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('UPDATED_BY_USER', 'UpdatedByUser', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 