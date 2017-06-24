<?php



class CareqartMapBuilder {

	
	const CLASS_NAME = 'lib.model.compras.map.CareqartMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('careqart');
		$tMap->setPhpName('Careqart');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('careqart_SEQ');

		$tMap->addColumn('REQART', 'Reqart', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECREQ', 'Fecreq', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('DESREQ', 'Desreq', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('MONREQ', 'Monreq', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STAREQ', 'Stareq', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('UNISOL', 'Unisol', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODCATREQ', 'Codcatreq', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('APRREQ', 'Aprreq', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NUMMEMO', 'Nummemo', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('JUSTIF', 'Justif', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CODCEN', 'Codcen', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODALM', 'Codalm', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CODUBI', 'Codubi', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('STADESP', 'Stadesp', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('MOTIVO', 'Motivo', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('USUAPR', 'Usuapr', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECAPR', 'Fecapr', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODDIREC', 'Coddirec', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('OBSREQ', 'Obsreq', 'string', CreoleTypes::VARCHAR, false, 2000);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DESANU', 'Desanu', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('USUANU', 'Usuanu', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 