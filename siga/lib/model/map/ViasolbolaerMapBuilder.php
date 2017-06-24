<?php



class ViasolbolaerMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ViasolbolaerMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('viasolbolaer');
		$tMap->setPhpName('Viasolbolaer');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('viasolbolaer_SEQ');

		$tMap->addColumn('NUMSOL', 'Numsol', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('FECSOL', 'Fecsol', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODDIREC', 'Coddirec', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODEVE', 'Codeve', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addColumn('CODNIV', 'Codniv', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('FECSAL', 'Fecsal', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('HORSAL', 'Horsal', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('HORREG', 'Horreg', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('RUTBOLAER', 'Rutbolaer', 'string', CreoleTypes::VARCHAR, false, 200);

		$tMap->addColumn('MOTVIABOL', 'Motviabol', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('TIPPAS', 'Tippas', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NUMSOLVI', 'Numsolvi', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('STAAPR', 'Staapr', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('IDAVUE', 'Idavue', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('USUAPR', 'Usuapr', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECAPR', 'Fecapr', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('LOGUSU', 'Logusu', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 