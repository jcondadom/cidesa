<?php



class CpptoctaMapBuilder {

	
	const CLASS_NAME = 'lib.model.presupuesto.map.CpptoctaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cpptocta');
		$tMap->setPhpName('Cpptocta');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cpptocta_SEQ');

		$tMap->addColumn('NUMPTA', 'Numpta', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('FECPTA', 'Fecpta', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('CODUBIORI', 'Codubiori', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('CODUBIDES', 'Codubides', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('ASUNTO', 'Asunto', 'string', CreoleTypes::VARCHAR, false, 2000);

		$tMap->addColumn('MOTIVO', 'Motivo', 'string', CreoleTypes::VARCHAR, false, 10000);

		$tMap->addColumn('RECCON', 'Reccon', 'string', CreoleTypes::VARCHAR, false, 2000);

		$tMap->addColumn('LOGUSE', 'Loguse', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('APRPTO', 'Aprpto', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('USUAPR', 'Usuapr', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECAPR', 'Fecapr', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODDIREC', 'Coddirec', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 