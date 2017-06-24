<?php



class TsccilnmovMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TsccilnmovMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('tsccilnmov');
		$tMap->setPhpName('Tsccilnmov');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('tsccilnmov_SEQ');

		$tMap->addColumn('NUMCUE', 'Numcue', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('MESCON', 'Mescon', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('ANOCON', 'Anocon', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 