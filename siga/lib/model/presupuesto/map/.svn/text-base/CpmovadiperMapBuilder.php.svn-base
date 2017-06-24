<?php



class CpmovadiperMapBuilder {

	
	const CLASS_NAME = 'lib.model.presupuesto.map.CpmovadiperMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cpmovadiper');
		$tMap->setPhpName('Cpmovadiper');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cpmovadiper_SEQ');

		$tMap->addForeignKey('REFADI', 'Refadi', 'string', CreoleTypes::VARCHAR, 'cpadidis', 'REFADI', true, 8);

		$tMap->addForeignKey('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, 'cpdeftit', 'CODPRE', true, 50);

		$tMap->addColumn('PERPRE', 'Perpre', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('MONMOV', 'Monmov', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 