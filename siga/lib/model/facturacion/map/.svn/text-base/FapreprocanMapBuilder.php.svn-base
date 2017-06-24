<?php



class FapreprocanMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FapreprocanMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fapreprocan');
		$tMap->setPhpName('Fapreprocan');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fapreprocan_SEQ');

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODCAN', 'Codcan', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('FRECUEN', 'Frecuen', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('PRECIO', 'Precio', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 