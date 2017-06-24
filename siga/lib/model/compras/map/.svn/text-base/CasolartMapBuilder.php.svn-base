<?php



class CasolartMapBuilder {

	
	const CLASS_NAME = 'lib.model.compras.map.CasolartMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('casolart');
		$tMap->setPhpName('Casolart');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('casolart_SEQ');

		$tMap->addColumn('REQART', 'Reqart', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECREQ', 'Fecreq', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('DESREQ', 'Desreq', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('MONREQ', 'Monreq', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STAREQ', 'Stareq', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('MOTREQ', 'Motreq', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('BENREQ', 'Benreq', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('MONDES', 'Mondes', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('OBSREQ', 'Obsreq', 'string', CreoleTypes::VARCHAR, false, 5000);

		$tMap->addColumn('UNIRES', 'Unires', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addForeignKey('TIPMON', 'Tipmon', 'string', CreoleTypes::VARCHAR, 'tsdefmon', 'CODMON', true, 3);

		$tMap->addColumn('VALMON', 'Valmon', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('REQCOM', 'Reqcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('TIPFIN', 'Tipfin', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('TIPREQ', 'Tipreq', 'string', CreoleTypes::CHAR, false, 1);

		$tMap->addColumn('APRREQ', 'Aprreq', 'string', CreoleTypes::CHAR, false, 1);

		$tMap->addColumn('USUAPR', 'Usuapr', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECAPR', 'Fecapr', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODCEN', 'Codcen', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('NUMPROC', 'Numproc', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('CODEVE', 'Codeve', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addColumn('CODDIREC', 'Coddirec', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODDIVI', 'Coddivi', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addColumn('LOGUSE', 'Loguse', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECANA', 'Fecana', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODUBI', 'Codubi', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('NOMBEN', 'Nomben', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('FECSAL', 'Fecsal', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('HORSAL', 'Horsal', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('HORREG', 'Horreg', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('CODREG', 'Codreg', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('PREBAS', 'Prebas', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('LUGENT', 'Lugent', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('APRGESADM', 'Aprgesadm', 'string', CreoleTypes::CHAR, false, 1);

		$tMap->addColumn('USUAPRGAD', 'Usuaprgad', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECAPRGAD', 'Fecaprgad', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('APRDIRADQ', 'Aprdiradq', 'string', CreoleTypes::CHAR, false, 1);

		$tMap->addColumn('USUAPRDAD', 'Usuaprdad', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECAPRDAD', 'Fecaprdad', 'int', CreoleTypes::DATE, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 