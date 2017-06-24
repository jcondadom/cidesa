<?php



class FasubsistemaMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FasubsistemaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fasubsistema');
		$tMap->setPhpName('Fasubsistema');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fasubsistema_SEQ');

		$tMap->addColumn('CODSUB', 'Codsub', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addColumn('NOMSUB', 'Nomsub', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 