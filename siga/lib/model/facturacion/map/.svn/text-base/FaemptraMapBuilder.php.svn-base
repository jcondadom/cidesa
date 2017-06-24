<?php



class FaemptraMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FaemptraMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('faemptra');
		$tMap->setPhpName('Faemptra');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('faemptra_SEQ');

		$tMap->addColumn('CODEMPTRA', 'Codemptra', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('RIFEMPTRA', 'Rifemptra', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('NOMEMPTRA', 'Nomemptra', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addColumn('DIREMPTRA', 'Diremptra', 'string', CreoleTypes::VARCHAR, true, 1000);

		$tMap->addForeignKey('CODZON', 'Codzon', 'string', CreoleTypes::VARCHAR, 'fadefzon', 'CODZON', true, 3);

		$tMap->addColumn('TLFEMPTRA', 'Tlfemptra', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('NOMPERRES', 'Nomperres', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 