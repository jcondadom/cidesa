<?php



class FaregvendMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FaregvendMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('faregvend');
		$tMap->setPhpName('Faregvend');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('faregvend_SEQ');

		$tMap->addColumn('RIFVEN', 'Rifven', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('NOMVEN', 'Nomven', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('DIRVEN', 'Dirven', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TELVEN', 'Telven', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('EMAVEN', 'Emaven', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('PERCON', 'Percon', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 