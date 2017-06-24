<?php



class LiordcomcroentMapBuilder {

	
	const CLASS_NAME = 'lib.model.licitaciones.map.LiordcomcroentMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('liordcomcroent');
		$tMap->setPhpName('Liordcomcroent');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('liordcomcroent_SEQ');

		$tMap->addColumn('NUMORD', 'Numord', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CANTID', 'Cantid', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODUNIADM', 'Coduniadm', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('FECENT', 'Fecent', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CONDIC', 'Condic', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 