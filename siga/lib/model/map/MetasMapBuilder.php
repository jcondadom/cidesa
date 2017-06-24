<?php



class MetasMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MetasMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('metas');
		$tMap->setPhpName('Metas');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('metas_SEQ');

		$tMap->addForeignKey('VENDEDORES_ID', 'VendedoresId', 'int', CreoleTypes::INTEGER, 'vendedores', 'ID', true, null);

		$tMap->addForeignKey('CATPRODUCTOS_ID', 'CatproductosId', 'int', CreoleTypes::INTEGER, 'catproductos', 'ID', true, null);

		$tMap->addColumn('CANTIDAD', 'Cantidad', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('MES_ASIGNACION', 'MesAsignacion', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ANIO_ASIGNACION', 'AnioAsignacion', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 