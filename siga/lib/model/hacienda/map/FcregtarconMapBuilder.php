<?php



class FcregtarconMapBuilder {

	
	const CLASS_NAME = 'lib.model.hacienda.map.FcregtarconMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcregtarcon');
		$tMap->setPhpName('Fcregtarcon');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcregtarcon_SEQ');

		$tMap->addColumn('CODCARINM', 'Codcarinm', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODUSOINM', 'Codusoinm', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('ESCDES', 'Escdes', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('ESCHAS', 'Eschas', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('ALICUOTA', 'Alicuota', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 