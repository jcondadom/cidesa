<?php



class MetasvendedorMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MetasvendedorMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('metasvendedor');
		$tMap->setPhpName('Metasvendedor');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('metasvendedor_SEQ');

		$tMap->addForeignKey('VENDEDORES_ID', 'VendedoresId', 'int', CreoleTypes::INTEGER, 'vendedores', 'ID', true, null);

		$tMap->addForeignKey('CATPRODUCTOS_ID', 'CatproductosId', 'int', CreoleTypes::INTEGER, 'catproductos', 'ID', true, null);

		$tMap->addColumn('CANTIDAD', 'Cantidad', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 