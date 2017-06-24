<?php



class FcelideclarMapBuilder {

	
	const CLASS_NAME = 'lib.model.hacienda.map.FcelideclarMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcelideclar');
		$tMap->setPhpName('Fcelideclar');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcelideclar_SEQ');

		$tMap->addColumn('NUMDEC', 'Numdec', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('FECVEN', 'Fecven', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FUEING', 'Fueing', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('FECDEC', 'Fecdec', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('RIFCON', 'Rifcon', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('NUMREF', 'Numref', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('MONDEC', 'Mondec', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('EDODEC', 'Edodec', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FUNREC', 'Funrec', 'string', CreoleTypes::VARCHAR, false, 40);

		$tMap->addColumn('MODO', 'Modo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NUMERO', 'Numero', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('NOMCON', 'Nomcon', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('ANODEC', 'Anodec', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('MOTIVO', 'Motivo', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 