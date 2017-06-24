<?php



class CpcomproMapBuilder {

	
	const CLASS_NAME = 'lib.model.presupuesto.map.CpcomproMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cpcompro');
		$tMap->setPhpName('Cpcompro');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cpcompro_SEQ');

		$tMap->addColumn('REFCOM', 'Refcom', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addForeignKey('TIPCOM', 'Tipcom', 'string', CreoleTypes::VARCHAR, 'cpdoccom', 'TIPCOM', true, 4);

		$tMap->addColumn('FECCOM', 'Feccom', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('ANOCOM', 'Anocom', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('REFPRC', 'Refprc', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('TIPPRC', 'Tipprc', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DESCOM', 'Descom', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('DESANU', 'Desanu', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('MONCOM', 'Moncom', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('SALCAU', 'Salcau', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('SALPAG', 'Salpag', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('SALAJU', 'Salaju', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STACOM', 'Stacom', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('APRCOM', 'Aprcom', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODUBI', 'Codubi', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('MOTREC', 'Motrec', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('LOGUSE', 'Loguse', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('SERCON', 'Sercon', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('FECSER', 'Fecser', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('TESORE', 'Tesore', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('FECTES', 'Fectes', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('ADMINI', 'Admini', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('FECADM', 'Fecadm', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('CODDIREC', 'Coddirec', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('USUAPR', 'Usuapr', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECAPR', 'Fecapr', 'int', CreoleTypes::DATE, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 