<?php



class CiliqingMapBuilder {

	
	const CLASS_NAME = 'lib.model.ingresos.map.CiliqingMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ciliqing');
		$tMap->setPhpName('Ciliqing');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ciliqing_SEQ');

		$tMap->addColumn('REFLIQ', 'Refliq', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECLIQ', 'Fecliq', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('DESLIQ', 'Desliq', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 