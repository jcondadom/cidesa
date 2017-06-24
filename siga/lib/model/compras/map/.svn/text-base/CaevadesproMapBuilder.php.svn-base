<?php



class CaevadesproMapBuilder {

	
	const CLASS_NAME = 'lib.model.compras.map.CaevadesproMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('caevadespro');
		$tMap->setPhpName('Caevadespro');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('caevadespro_SEQ');

		$tMap->addColumn('CODEVA', 'Codeva', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECEVA', 'Feceva', 'int', CreoleTypes::DATE, true, null);

		$tMap->addForeignKey('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, 'caprovee', 'CODPRO', true, 15);

		$tMap->addColumn('CLAPRO', 'Clapro', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('CODNIV', 'Codniv', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('LOGUSE', 'Loguse', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 