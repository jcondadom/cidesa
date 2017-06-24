<?php



class NptabsfnMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NptabsfnMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('nptabsfn');
		$tMap->setPhpName('Nptabsfn');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('nptabsfn_SEQ');

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('PARENT', 'Parent', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('SEXO', 'Sexo', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('EDADES', 'Edades', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('EDAHAS', 'Edahas', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('MONCUO', 'Moncuo', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 