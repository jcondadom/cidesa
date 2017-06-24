<?php



class ViadetsolbolaerMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ViadetsolbolaerMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('viadetsolbolaer');
		$tMap->setPhpName('Viadetsolbolaer');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('viadetsolbolaer_SEQ');

		$tMap->addColumn('NUMSOL', 'Numsol', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('CEDPERPAS', 'Cedperpas', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('APEPERPAS', 'Apeperpas', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NOMPERPAS', 'Nomperpas', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 