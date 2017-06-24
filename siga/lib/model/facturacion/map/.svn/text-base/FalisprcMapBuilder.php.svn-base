<?php



class FalisprcMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FalisprcMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('falisprc');
		$tMap->setPhpName('Falisprc');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('falisprc_SEQ');

		$tMap->addForeignKey('CODPRG', 'Codprg', 'string', CreoleTypes::VARCHAR, 'fadefprg', 'CODPRG', true, 6);

		$tMap->addForeignKey('CODTIPCLI', 'Codtipcli', 'string', CreoleTypes::VARCHAR, 'fatipcte', 'ID', true, 4);

		$tMap->addForeignKey('CONPAG_ID', 'ConpagId', 'int', CreoleTypes::INTEGER, 'faconpag', 'ID', true, null);

		$tMap->addForeignKey('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, 'caregart', 'CODART', true, 20);

		$tMap->addColumn('PRECIO', 'Precio', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('FECVIG', 'Fecvig', 'int', CreoleTypes::DATE, true, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 