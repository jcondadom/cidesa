<?php



class ContadettitMapBuilder {

	
	const CLASS_NAME = 'lib.model.contabilidad.map.ContadettitMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('contadettit');
		$tMap->setPhpName('Contadettit');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('contadettit_SEQ');

		$tMap->addColumn('CODTITDET', 'Codtitdet', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODTIT', 'Codtit', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESTITDET', 'Destitdet', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addColumn('ORDTITDET', 'Ordtitdet', 'double', CreoleTypes::NUMERIC, true, 2);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 