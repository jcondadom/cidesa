<?php



class NpfalperMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpfalperMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npfalper');
		$tMap->setPhpName('Npfalper');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npfalper_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODMOT', 'Codmot', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('NRODIA', 'Nrodia', 'double', CreoleTypes::NUMERIC, false, 4);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('FECDES', 'Fecdes', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('FECHAS', 'Fechas', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('NROHORAS', 'Nrohoras', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('NUMCTR', 'Numctr', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('HORDES', 'Hordes', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('HORHAS', 'Horhas', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('TIPSAL', 'Tipsal', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('TIPPER', 'Tipper', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NOMSUP', 'Nomsup', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('MONSUP', 'Monsup', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MEDEXP', 'Medexp', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('ESPMED', 'Espmed', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('FECINC', 'Fecinc', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CENATE', 'Cenate', 'string', CreoleTypes::VARCHAR, false, 200);

		$tMap->addColumn('TIPDOC', 'Tipdoc', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIAREP', 'Diarep', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 