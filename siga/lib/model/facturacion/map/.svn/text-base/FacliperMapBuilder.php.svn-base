<?php



class FacliperMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FacliperMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('facliper');
		$tMap->setPhpName('Facliper');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('facliper_SEQ');

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('NOMPER', 'Nomper', 'string', CreoleTypes::VARCHAR, true, 200);

		$tMap->addColumn('DIRPER', 'Dirper', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('TELPER', 'Telper', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 