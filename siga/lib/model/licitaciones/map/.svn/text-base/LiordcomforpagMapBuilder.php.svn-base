<?php



class LiordcomforpagMapBuilder {

	
	const CLASS_NAME = 'lib.model.licitaciones.map.LiordcomforpagMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('liordcomforpag');
		$tMap->setPhpName('Liordcomforpag');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('liordcomforpag_SEQ');

		$tMap->addColumn('NUMORD', 'Numord', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('DESANT', 'Desant', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('PORANT', 'Porant', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONTOT', 'Montot', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONREC', 'Monrec', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('SUBTOT', 'Subtot', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PORAMOANT', 'Poramoant', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('NETPAG', 'Netpag', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FECANT', 'Fecant', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CONDIC', 'Condic', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 