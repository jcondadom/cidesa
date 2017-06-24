<?php



class CosforproMapBuilder {

	
	const CLASS_NAME = 'lib.model.costos.map.CosforproMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cosforpro');
		$tMap->setPhpName('Cosforpro');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cosforpro_SEQ');

		$tMap->addColumn('CODFORPRO', 'Codforpro', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('DESFORPRO', 'Desforpro', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 