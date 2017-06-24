<?php



class DetradarventasMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.DetradarventasMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('detradarventas');
		$tMap->setPhpName('Detradarventas');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('detradarventas_SEQ');

		$tMap->addForeignKey('RADARVENTAS_ID', 'RadarventasId', 'int', CreoleTypes::INTEGER, 'radarventas', 'ID', true, null);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CANTOT', 'Cantot', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 