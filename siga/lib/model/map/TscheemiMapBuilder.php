<?php



class TscheemiMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TscheemiMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('tscheemi');
		$tMap->setPhpName('Tscheemi');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('tscheemi_SEQ');

		$tMap->addColumn('NUMCHE', 'Numche', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('NUMCUE', 'Numcue', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('FECEMI', 'Fecemi', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('MONCHE', 'Monche', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODEMI', 'Codemi', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECENT', 'Fecent', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODENT', 'Codent', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('OBSENT', 'Obsent', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CEDREC', 'Cedrec', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('NOMREC', 'Nomrec', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('TIPDOC', 'Tipdoc', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('FECING', 'Fecing', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('TEMPORAL', 'Temporal', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TEMPORAL2', 'Temporal2', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('NOMBENSUS', 'Nombensus', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('ANOPRE', 'Anopre', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('NUMTIQ', 'Numtiq', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CEDAUT', 'Cedaut', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('PERAUT', 'Peraut', 'string', CreoleTypes::VARCHAR, false, 40);

		$tMap->addColumn('NUMCOMEGR', 'Numcomegr', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('MOTDEV', 'Motdev', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('FECDEV', 'Fecdev', 'int', CreoleTypes::DATE, false, null);

		$tMap->addForeignKey('CODMON', 'Codmon', 'string', CreoleTypes::VARCHAR, 'tsdefmon', 'CODMON', true, 3);

		$tMap->addColumn('VALMON', 'Valmon', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODCONCEPTO', 'Codconcepto', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('LOGUSE', 'Loguse', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CONFORMADO', 'Conformado', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NOMFUNCON', 'Nomfuncon', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('AGENBAN', 'Agenban', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('FECCONFOR', 'Fecconfor', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('HORCONFOR', 'Horconfor', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FOTPER', 'Fotper', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('FOTCED', 'Fotced', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('FOTCHE', 'Fotche', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('COMENTCON', 'Comentcon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODDIREC', 'Coddirec', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('CHEIMP', 'Cheimp', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECIMP', 'Fecimp', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECENTCON', 'Fecentcon', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CODSEG', 'Codseg', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CEDRIFSUS', 'Cedrifsus', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 