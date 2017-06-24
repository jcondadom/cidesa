<?php



class CidetliqMapBuilder {

	
	const CLASS_NAME = 'lib.model.ingresos.map.CidetliqMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cidetliq');
		$tMap->setPhpName('Cidetliq');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cidetliq_SEQ');

		$tMap->addColumn('REFLIQ', 'Refliq', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('REFING', 'Refing', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 