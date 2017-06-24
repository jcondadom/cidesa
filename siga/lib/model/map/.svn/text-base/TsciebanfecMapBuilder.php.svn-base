<?php



class TsciebanfecMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TsciebanfecMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('tsciebanfec');
		$tMap->setPhpName('Tsciebanfec');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('tsciebanfec_SEQ');

		$tMap->addColumn('NUMCUE', 'Numcue', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('FECDES', 'Fecdes', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('FECHAS', 'Fechas', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 