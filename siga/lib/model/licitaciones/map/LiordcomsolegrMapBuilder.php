<?php



class LiordcomsolegrMapBuilder {

	
	const CLASS_NAME = 'lib.model.licitaciones.map.LiordcomsolegrMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('liordcomsolegr');
		$tMap->setPhpName('Liordcomsolegr');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('liordcomsolegr_SEQ');

		$tMap->addColumn('NUMORD', 'Numord', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('NUMCOMINT', 'Numcomint', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('NUMSOL', 'Numsol', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, false, 55);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 