<?php



class LiordcomdetMapBuilder {

	
	const CLASS_NAME = 'lib.model.licitaciones.map.LiordcomdetMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('liordcomdet');
		$tMap->setPhpName('Liordcomdet');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('liordcomdet_SEQ');

		$tMap->addColumn('NUMORD', 'Numord', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('UNIMED', 'Unimed', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CANTID', 'Cantid', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PREUNI', 'Preuni', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONREC', 'Monrec', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('SUBTOT', 'Subtot', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 