<?php



class OpdetciecajMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OpdetciecajMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('opdetciecaj');
		$tMap->setPhpName('Opdetciecaj');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('opdetciecaj_SEQ');

		$tMap->addColumn('NUMREF', 'Numref', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('MONCOM', 'Moncom', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('REFSAL', 'Refsal', 'string', CreoleTypes::VARCHAR, false, 2000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 