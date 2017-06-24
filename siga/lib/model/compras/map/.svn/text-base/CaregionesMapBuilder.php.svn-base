<?php



class CaregionesMapBuilder {

	
	const CLASS_NAME = 'lib.model.compras.map.CaregionesMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('caregiones');
		$tMap->setPhpName('Caregiones');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('caregiones_SEQ');

		$tMap->addColumn('CODREG', 'Codreg', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMREG', 'Nomreg', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 