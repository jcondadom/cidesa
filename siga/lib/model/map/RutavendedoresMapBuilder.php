<?php



class RutavendedoresMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RutavendedoresMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('rutavendedores');
		$tMap->setPhpName('Rutavendedores');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('rutavendedores_SEQ');

		$tMap->addForeignKey('RUTA_ID', 'RutaId', 'int', CreoleTypes::INTEGER, 'ruta', 'ID', true, null);

		$tMap->addForeignKey('VENDEDORES_ID', 'VendedoresId', 'int', CreoleTypes::INTEGER, 'vendedores', 'ID', true, null);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 