<?php



class FapropatMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FapropatMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fapropat');
		$tMap->setPhpName('Fapropat');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fapropat_SEQ');

		$tMap->addColumn('CODPROPAT', 'Codpropat', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESPROPAT', 'Despropat', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 