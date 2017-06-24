<?php



class FaclagruMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FaclagruMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('faclagru');
		$tMap->setPhpName('Faclagru');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('faclagru_SEQ');

		$tMap->addColumn('CODGRU', 'Codgru', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODCLA', 'Codcla', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 