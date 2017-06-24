<?php



class FadependenciaMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FadependenciaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fadependencia');
		$tMap->setPhpName('Fadependencia');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fadependencia_SEQ');

		$tMap->addColumn('CODDEP', 'Coddep', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addColumn('NOMDEP', 'Nomdep', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 