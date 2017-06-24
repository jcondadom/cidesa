<?php



class FaproradMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FaproradMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('faprorad');
		$tMap->setPhpName('Faprorad');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('faprorad_SEQ');

		$tMap->addColumn('CODPRORAD', 'Codprorad', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESPRORAD', 'Desprorad', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 