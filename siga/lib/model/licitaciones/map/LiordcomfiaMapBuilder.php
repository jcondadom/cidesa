<?php



class LiordcomfiaMapBuilder {

	
	const CLASS_NAME = 'lib.model.licitaciones.map.LiordcomfiaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('liordcomfia');
		$tMap->setPhpName('Liordcomfia');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('liordcomfia_SEQ');

		$tMap->addColumn('NUMORD', 'Numord', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CODCOMRES', 'Codcomres', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 