<?php



class VendedoresMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.VendedoresMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('vendedores');
		$tMap->setPhpName('Vendedores');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('vendedores_SEQ');

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('NOMCON', 'Nomcon', 'string', CreoleTypes::VARCHAR, false, 510);

		$tMap->addColumn('DIRCON', 'Dircon', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('TELCON', 'Telcon', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FAXCON', 'Faxcon', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, false, 40);

		$tMap->addColumn('PERCON', 'Percon', 'string', CreoleTypes::VARCHAR, false, 510);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 