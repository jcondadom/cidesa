<?php



class RadarventasMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RadarventasMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('radarventas');
		$tMap->setPhpName('Radarventas');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('radarventas_SEQ');

		$tMap->addForeignKey('RUTA_ID', 'RutaId', 'int', CreoleTypes::INTEGER, 'ruta', 'ID', true, null);

		$tMap->addForeignKey('FACLIENTE_ID', 'FaclienteId', 'int', CreoleTypes::INTEGER, 'facliente', 'ID', true, null);

		$tMap->addForeignKey('VENDEDORES_ID', 'VendedoresId', 'int', CreoleTypes::INTEGER, 'vendedores', 'ID', true, null);

		$tMap->addForeignKey('FAFACTUR_ID', 'FafacturId', 'int', CreoleTypes::INTEGER, 'fafactur', 'ID', false, null);

		$tMap->addColumn('FECHA', 'Fecha', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 