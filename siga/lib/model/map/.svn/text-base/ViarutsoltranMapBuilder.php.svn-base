<?php



class ViarutsoltranMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ViarutsoltranMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('viarutsoltran');
		$tMap->setPhpName('Viarutsoltran');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('viarutsoltran_SEQ');

		$tMap->addColumn('NUMSOL', 'Numsol', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('DIA', 'Dia', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('MES', 'Mes', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('HORA', 'Hora', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('RUTA', 'Ruta', 'string', CreoleTypes::VARCHAR, false, 200);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 