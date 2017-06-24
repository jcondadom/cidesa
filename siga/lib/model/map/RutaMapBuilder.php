<?php



class RutaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RutaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ruta');
		$tMap->setPhpName('Ruta');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ruta_SEQ');

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addForeignKey('ATESTADOS_ID', 'AtestadosId', 'int', CreoleTypes::INTEGER, 'atestados', 'ID', true, null);

		$tMap->addForeignKey('ATMUNICIPIOS_ID', 'AtmunicipiosId', 'int', CreoleTypes::INTEGER, 'atmunicipios', 'ID', true, null);

		$tMap->addForeignKey('ATPARROQUIAS_ID', 'AtparroquiasId', 'int', CreoleTypes::INTEGER, 'atparroquias', 'ID', true, null);

		$tMap->addColumn('ZONA_LIMI_DESDE', 'ZonaLimiDesde', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('ZONA_LIMI_HASTA', 'ZonaLimiHasta', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('DIA_VISITA', 'DiaVisita', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DIA_DESPACHO', 'DiaDespacho', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 