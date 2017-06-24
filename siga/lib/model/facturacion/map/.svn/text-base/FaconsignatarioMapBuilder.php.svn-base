<?php



class FaconsignatarioMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FaconsignatarioMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('faconsignatario');
		$tMap->setPhpName('Faconsignatario');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('faconsignatario_SEQ');

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('NOMCON', 'Nomcon', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('DIRCON', 'Dircon', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('TELCON', 'Telcon', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('FAXCON', 'Faxcon', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('PERCON', 'Percon', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 