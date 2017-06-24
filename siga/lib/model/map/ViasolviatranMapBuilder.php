<?php



class ViasolviatranMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ViasolviatranMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('viasolviatran');
		$tMap->setPhpName('Viasolviatran');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('viasolviatran_SEQ');

		$tMap->addColumn('NUMSOL', 'Numsol', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('FECHA', 'Fecha', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('HORA', 'Hora', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('RUTA', 'Ruta', 'string', CreoleTypes::VARCHAR, false, 200);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 