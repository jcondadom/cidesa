<?php



class ContabcMapBuilder {

	
	const CLASS_NAME = 'lib.model.contabilidad.map.ContabcMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('contabc');
		$tMap->setPhpName('Contabc');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('contabc_SEQ');

		$tMap->addColumn('NUMCOM', 'Numcom', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECCOM', 'Feccom', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('DESCOM', 'Descom', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('MONCOM', 'Moncom', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STACOM', 'Stacom', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('TIPCOM', 'Tipcom', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('REFTRA', 'Reftra', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('LOGUSE', 'Loguse', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('USUANU', 'Usuanu', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CODTIPTRA', 'Codtiptra', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('STAAPR', 'Staapr', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECAPR', 'Fecapr', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('USUAPR', 'Usuapr', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CODDIREC', 'Coddirec', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODMON', 'Codmon', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('VALMON', 'Valmon', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 