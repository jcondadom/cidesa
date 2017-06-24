<?php



class CotiptraMapBuilder {

	
	const CLASS_NAME = 'lib.model.contabilidad.map.CotiptraMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cotiptra');
		$tMap->setPhpName('Cotiptra');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cotiptra_SEQ');

		$tMap->addColumn('CODTIPTRA', 'Codtiptra', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESTIPTRA', 'Destiptra', 'string', CreoleTypes::VARCHAR, true, 1000);

		$tMap->addColumn('MODTIPTRA', 'Modtiptra', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 