<?php



class CpdetptoctaMapBuilder {

	
	const CLASS_NAME = 'lib.model.presupuesto.map.CpdetptoctaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cpdetptocta');
		$tMap->setPhpName('Cpdetptocta');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cpdetptocta_SEQ');

		$tMap->addColumn('NUMPTA', 'Numpta', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addForeignKey('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, 'cpdeftit', 'CODPRE', true, 50);

		$tMap->addColumn('MONCOD', 'Moncod', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 