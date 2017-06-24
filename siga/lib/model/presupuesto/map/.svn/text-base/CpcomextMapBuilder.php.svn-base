<?php



class CpcomextMapBuilder {

	
	const CLASS_NAME = 'lib.model.presupuesto.map.CpcomextMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cpcomext');
		$tMap->setPhpName('Cpcomext');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cpcomext_SEQ');

		$tMap->addColumn('REFCOMEXT', 'Refcomext', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addForeignKey('TIPCOM', 'Tipcom', 'string', CreoleTypes::VARCHAR, 'cpdoccom', 'TIPCOM', true, 4);

		$tMap->addColumn('FECCOM', 'Feccom', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('ANOCOM', 'Anocom', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('REFCOM', 'Refcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('DESCOM', 'Descom', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('DESANU', 'Desanu', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('MONCOM', 'Moncom', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STACOM', 'Stacom', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false, null);

		$tMap->addForeignKey('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, 'opbenefi', 'CEDRIF', false, 15);

		$tMap->addColumn('LOGUSE', 'Loguse', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('CODMON', 'Codmon', 'string', CreoleTypes::VARCHAR, 'tsdefmon', 'CODMON', true, 3);

		$tMap->addColumn('VALMON', 'Valmon', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 