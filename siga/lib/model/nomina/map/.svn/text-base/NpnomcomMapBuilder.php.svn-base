<?php



class NpnomcomMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpnomcomMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npnomcom');
		$tMap->setPhpName('Npnomcom');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npnomcom_SEQ');

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODNOMESP', 'Codnomesp', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('FECNOM', 'Fecnom', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('REFCOM', 'Refcom', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('ESPECIAL', 'Especial', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 