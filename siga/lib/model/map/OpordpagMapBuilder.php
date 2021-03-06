<?php



class OpordpagMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OpordpagMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('opordpag');
		$tMap->setPhpName('Opordpag');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('opordpag_SEQ');

		$tMap->addColumn('NUMORD', 'Numord', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('TIPCAU', 'Tipcau', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('FECEMI', 'Fecemi', 'int', CreoleTypes::DATE, true, null);

		$tMap->addForeignKey('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, 'opbenefi', 'CEDRIF', true, 15);

		$tMap->addColumn('NOMBEN', 'Nomben', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('MONORD', 'Monord', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('DESORD', 'Desord', 'string', CreoleTypes::VARCHAR, true, 1000);

		$tMap->addColumn('MONDES', 'Mondes', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONRET', 'Monret', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('NUMCHE', 'Numche', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CTABAN', 'Ctaban', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CTAPAG', 'Ctapag', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('NUMCOM', 'Numcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('CODUNI', 'Coduni', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('FECENVCON', 'Fecenvcon', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECENVFIN', 'Fecenvfin', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CTAPAGFIN', 'Ctapagfin', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('OBSORD', 'Obsord', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('FECVEN', 'Fecven', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DESANU', 'Desanu', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('MONPAG', 'Monpag', 'double', CreoleTypes::NUMERIC, false, 16);

		$tMap->addColumn('APROBA', 'Aproba', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NOMBENSUS', 'Nombensus', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('FECRECFIN', 'Fecrecfin', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('ANOPRE', 'Anopre', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('FECPAG', 'Fecpag', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NUMTIQ', 'Numtiq', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('PERAUT', 'Peraut', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('CEDAUT', 'Cedaut', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('NOMPER2', 'Nomper2', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NOMPER1', 'Nomper1', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('HORCON', 'Horcon', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('FECCON', 'Feccon', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NOMCAT', 'Nomcat', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('NUMFAC', 'Numfac', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('NUMCONFAC', 'Numconfac', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('NUMCORFAC', 'Numcorfac', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FECHAFAC', 'Fechafac', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECFAC', 'Fecfac', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('TIPFIN', 'Tipfin', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('COMRET', 'Comret', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FECCOMRET', 'Feccomret', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('COMRETISLR', 'Comretislr', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FECCOMRETISLR', 'Feccomretislr', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('COMRETLTF', 'Comretltf', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FECCOMRETLTF', 'Feccomretltf', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('COMRETFIEL', 'Comretfiel', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FECCOMRETFIEL', 'Feccomretfiel', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('COMRETLAB', 'Comretlab', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FECCOMRETLAB', 'Feccomretlab', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NUMSIGECOF', 'Numsigecof', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('FECSIGECOF', 'Fecsigecof', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('EXPSIGECOF', 'Expsigecof', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('APROBADOORD', 'Aprobadoord', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODMOTANU', 'Codmotanu', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('USUANU', 'Usuanu', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('APROBADOTES', 'Aprobadotes', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECRET', 'Fecret', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('NUMCUE', 'Numcue', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('NUMCOMAPR', 'Numcomapr', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CODCONCEPTO', 'Codconcepto', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('NUMFORPRE', 'Numforpre', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('MOTRECORD', 'Motrecord', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('MOTRECTES', 'Motrectes', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('APRORDDIR', 'Aprorddir', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODCAJCHI', 'Codcajchi', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('NUMCTA', 'Numcta', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('TIPDOC', 'Tipdoc', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('LOGUSE', 'Loguse', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CODFONANT', 'Codfonant', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('AMORTIZA', 'Amortiza', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addForeignKey('CODMON', 'Codmon', 'string', CreoleTypes::VARCHAR, 'tsdefmon', 'CODMON', true, 3);

		$tMap->addColumn('VALMON', 'Valmon', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('ORDSNC', 'Ordsnc', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODSNC', 'Codsnc', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECFIN', 'Fecfin', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('MEDCOM', 'Medcom', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('MODCON', 'Modcon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('LUGEJE', 'Lugeje', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('NUMCON', 'Numcon', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('MESCON', 'Mescon', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('STAELE', 'Staele', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODTDE', 'Codtde', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODADI', 'Codadi', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('NUMORDAMO', 'Numordamo', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CODRGO', 'Codrgo', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('MONRGO', 'Monrgo', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CODDIREC', 'Coddirec', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('REFAVA', 'Refava', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FECAVA', 'Fecava', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NOMPACAVA', 'Nompacava', 'string', CreoleTypes::VARCHAR, false, 200);

		$tMap->addColumn('CEDPACAVA', 'Cedpacava', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('MOTSOLAVA', 'Motsolava', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('MONCARAVA', 'Moncarava', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('USUAPRORD', 'Usuaprord', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECAPRORD', 'Fecaprord', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('USUAPRDIR', 'Usuaprdir', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECAPRDIR', 'Fecaprdir', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('USUAPRTES', 'Usuaprtes', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECAPRTES', 'Fecaprtes', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('APRPROORD', 'Aprproord', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('USUAPRPRO', 'Usuaprpro', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECAPRPRO', 'Fecaprpro', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('OBSPROPAG', 'Obspropag', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('NUMVAL', 'Numval', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 