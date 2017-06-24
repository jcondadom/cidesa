<?php



class OpbenefiMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OpbenefiMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('opbenefi');
		$tMap->setPhpName('Opbenefi');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('opbenefi_SEQ');

		$tMap->addColumn('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('NOMBEN', 'Nomben', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('DIRBEN', 'Dirben', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TELBEN', 'Telben', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('CODCTA', 'Codcta', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('NITBEN', 'Nitben', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addForeignKey('CODTIPBEN', 'Codtipben', 'string', CreoleTypes::VARCHAR, 'optipben', 'CODTIPBEN', true, 3);

		$tMap->addColumn('TIPPER', 'Tipper', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NACIONALIDAD', 'Nacionalidad', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('RESIDENTE', 'Residente', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CONSTITUIDA', 'Constituida', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODORD', 'Codord', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODPERCON', 'Codpercon', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODORDADI', 'Codordadi', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODPERCONADI', 'Codperconadi', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODORDCONTRA', 'Codordcontra', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODPERCONTRA', 'Codpercontra', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('TEMCEDRIF', 'Temcedrif', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('CODCTASEC', 'Codctasec', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODCTACAJCHI', 'Codctacajchi', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('NUMCUE', 'Numcue', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CODCTAANT', 'Codctaant', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODBAN', 'Codban', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('NUMCUEB', 'Numcueb', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('BANINT', 'Banint', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('NUMCUEINT', 'Numcueint', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('DIRBANINT', 'Dirbanint', 'string', CreoleTypes::VARCHAR, false, 200);

		$tMap->addColumn('CODSWIINT', 'Codswiint', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('NUMABAINT', 'Numabaint', 'string', CreoleTypes::VARCHAR, false, 40);

		$tMap->addColumn('NUMIBAINT', 'Numibaint', 'string', CreoleTypes::VARCHAR, false, 40);

		$tMap->addColumn('NUMROUINT', 'Numrouint', 'string', CreoleTypes::VARCHAR, false, 40);

		$tMap->addColumn('BANBEN', 'Banben', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('NUMCUEBEN', 'Numcueben', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('DIRBANBEN', 'Dirbanben', 'string', CreoleTypes::VARCHAR, false, 200);

		$tMap->addColumn('CODSWIBEN', 'Codswiben', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('NUMABABEN', 'Numababen', 'string', CreoleTypes::VARCHAR, false, 40);

		$tMap->addColumn('NUMIBABEN', 'Numibaben', 'string', CreoleTypes::VARCHAR, false, 40);

		$tMap->addColumn('NUMROUBEN', 'Numrouben', 'string', CreoleTypes::VARCHAR, false, 40);

		$tMap->addColumn('CODCOPANT', 'Codcopant', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CEDBEN', 'Cedben', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('CODTIPBAN', 'Codtipban', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 