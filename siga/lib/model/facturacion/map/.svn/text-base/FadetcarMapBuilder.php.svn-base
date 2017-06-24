<?php



class FadetcarMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FadetcarMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fadetcar');
		$tMap->setPhpName('Fadetcar');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fadetcar_SEQ');

		$tMap->addColumn('NUMCAR', 'Numcar', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addForeignKey('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, 'caregart', 'CODART', true, 20);

		$tMap->addColumn('MONTO', 'Monto', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 