<?php



class FadefgruMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FadefgruMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fadefgru');
		$tMap->setPhpName('Fadefgru');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fadefgru_SEQ');

		$tMap->addColumn('CODGRU', 'Codgru', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESGRU', 'Desgru', 'string', CreoleTypes::VARCHAR, true, 200);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 