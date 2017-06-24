<?php



class RutavendedorMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RutavendedorMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('rutavendedor');
		$tMap->setPhpName('Rutavendedor');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('rutavendedor_SEQ');

		$tMap->addForeignKey('ATESTADOS_ID', 'AtestadosId', 'int', CreoleTypes::INTEGER, 'atestados', 'ID', true, null);

		$tMap->addForeignKey('ATMUNICIPIOS_ID', 'AtmunicipiosId', 'int', CreoleTypes::INTEGER, 'atmunicipios', 'ID', true, null);

		$tMap->addForeignKey('ATPARROQUIAS_ID', 'AtparroquiasId', 'int', CreoleTypes::INTEGER, 'atparroquias', 'ID', true, null);

		$tMap->addForeignKey('FACLIENTE_ID', 'FaclienteId', 'int', CreoleTypes::INTEGER, 'facliente', 'ID', true, null);

		$tMap->addForeignKey('VENDEDORES_ID', 'VendedoresId', 'int', CreoleTypes::INTEGER, 'vendedores', 'ID', true, null);

		$tMap->addColumn('FECHA_VISITA', 'FechaVisita', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('FECHA_DESPACHO', 'FechaDespacho', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 