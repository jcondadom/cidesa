<?php



class CadetfirdocpreMapBuilder {

	
	const CLASS_NAME = 'lib.model.compras.map.CadetfirdocpreMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cadetfirdocpre');
		$tMap->setPhpName('Cadetfirdocpre');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cadetfirdocpre_SEQ');

		$tMap->addColumn('CODDIREC', 'Coddirec', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('TIPDOC', 'Tipdoc', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('NUMFIR', 'Numfir', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('NOMFIR', 'Nomfir', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('CARFIR', 'Carfir', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('OBSFIR', 'Obsfir', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 