<?php



class MantarproMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.MantarproMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mantarpro');
		$tMap->setPhpName('Mantarpro');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('mantarpro_SEQ');

		$tMap->addColumn('CODTAR', 'Codtar', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('DESTAR', 'Destar', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addColumn('NUMEQU', 'Numequ', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('CODACT', 'Codact', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODGRU', 'Codgru', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('GENREQ', 'Genreq', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('TARACT', 'Taract', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODCAR', 'Codcar', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODTMA', 'Codtma', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('TIPFRE', 'Tipfre', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('INTERV', 'Interv', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FECUPM', 'Fecupm', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('HORUPM', 'Horupm', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('REPPPM', 'Repppm', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECPPM', 'Fecppm', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('HORPPM', 'Horppm', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 