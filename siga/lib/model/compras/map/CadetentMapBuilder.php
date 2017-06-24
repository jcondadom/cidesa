<?php



class CadetentMapBuilder {

	
	const CLASS_NAME = 'lib.model.compras.map.CadetentMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cadetent');
		$tMap->setPhpName('Cadetent');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cadetent_SEQ');

		$tMap->addColumn('RCPART', 'Rcpart', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CANREC', 'Canrec', 'double', CreoleTypes::NUMERIC, false, 32);

		$tMap->addColumn('MONTOT', 'Montot', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('COSART', 'Cosart', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODALM', 'Codalm', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODUBI', 'Codubi', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('FECVEN', 'Fecven', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NUMJAU', 'Numjau', 'double', CreoleTypes::NUMERIC, false, 10);

		$tMap->addColumn('TAMMET', 'Tammet', 'double', CreoleTypes::NUMERIC, false, 10);

		$tMap->addColumn('NUMLOT', 'Numlot', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('FECELA', 'Fecela', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODALT', 'Codalt', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('UNIMED', 'Unimed', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 