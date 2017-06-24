<?php



class CuentaxcobrarClientesMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CuentaxcobrarClientesMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cuentaxcobrar_clientes');
		$tMap->setPhpName('CuentaxcobrarClientes');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cuentaxcobrar_clientes_SEQ');

		$tMap->addColumn('CODCLIENTE', 'Codcliente', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('CLIENTE', 'Cliente', 'string', CreoleTypes::VARCHAR, true, 1500);

		$tMap->addColumn('CUENTAXCOBRAR', 'Cuentaxcobrar', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 