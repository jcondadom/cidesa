<?php



class FadefvehMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FadefvehMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fadefveh');
		$tMap->setPhpName('Fadefveh');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fadefveh_SEQ');

		$tMap->addColumn('PLAVEH', 'Plaveh', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('MARCA', 'Marca', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addColumn('COLOR', 'Color', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addForeignKey('CODEMPTRA', 'Codemptra', 'string', CreoleTypes::VARCHAR, 'faemptra', 'CODEMPTRA', true, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 