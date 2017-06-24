<?php



class FadefchoMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FadefchoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fadefcho');
		$tMap->setPhpName('Fadefcho');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fadefcho_SEQ');

		$tMap->addColumn('CEDCHO', 'Cedcho', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('NOMCHO', 'Nomcho', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addForeignKey('CODEMPTRA', 'Codemptra', 'string', CreoleTypes::VARCHAR, 'faemptra', 'CODEMPTRA', true, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 