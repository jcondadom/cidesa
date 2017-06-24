<?php



class FapresupMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FapresupMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fapresup');
		$tMap->setPhpName('Fapresup');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fapresup_SEQ');

		$tMap->addColumn('REFPRE', 'Refpre', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('DESPRE', 'Despre', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('FECPRE', 'Fecpre', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('CODCLI', 'Codcli', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('MONPRE', 'Monpre', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONDESC', 'Mondesc', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONRGO', 'Monrgo', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FACONPAG_ID', 'FaconpagId', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addForeignKey('FAFORDES_ID', 'FafordesId', 'int', CreoleTypes::INTEGER, 'fafordes', 'ID', false, null);

		$tMap->addForeignKey('FAFORSOL_ID', 'FaforsolId', 'int', CreoleTypes::INTEGER, 'faforsol', 'ID', false, null);

		$tMap->addColumn('TIPMON', 'Tipmon', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('VALMON', 'Valmon', 'double', CreoleTypes::NUMERIC, false, 12);

		$tMap->addColumn('AUTPOR', 'Autpor', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('CODUBI', 'Codubi', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('CODPRG', 'Codprg', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addColumn('REAPOR', 'Reapor', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CANTRAS', 'Cantras', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('PERTRA', 'Pertra', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FRECTRA', 'Frectra', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DURACION', 'Duracion', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('OBSTRA', 'Obstra', 'string', CreoleTypes::VARCHAR, false, 200);

		$tMap->addColumn('TIPPRE', 'Tippre', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('PERCON', 'Percon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECINIPER', 'Feciniper', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODDIREC', 'Coddirec', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODEMB', 'Codemb', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('CODGRU', 'Codgru', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('STAAPR', 'Staapr', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('USUAPR', 'Usuapr', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECAPR', 'Fecapr', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODSED', 'Codsed', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('TIECOT', 'Tiecot', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('REFPREASO', 'Refpreaso', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('FACLIPER_ID', 'FacliperId', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('NUMCUE', 'Numcue', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 