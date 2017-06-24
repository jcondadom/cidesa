<?php



class CidepingMapBuilder {

	
	const CLASS_NAME = 'lib.model.ingresos.map.CidepingMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cideping');
		$tMap->setPhpName('Cideping');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cideping_SEQ');

		$tMap->addColumn('REFING', 'Refing', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('NUMDEP', 'Numdep', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('NUMCUE', 'Numcue', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('TIPMOV', 'Tipmov', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('FECHA', 'Fecha', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('MONDEP', 'Mondep', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 