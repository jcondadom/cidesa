<?php



class NpptoctaMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpptoctaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npptocta');
		$tMap->setPhpName('Npptocta');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npptocta_SEQ');

		$tMap->addColumn('NUMPTA', 'Numpta', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('FECPTA', 'Fecpta', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('CODEMPA', 'Codempa', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODEMPP', 'Codempp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('TIPPTO', 'Tippto', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('LOGUSE', 'Loguse', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODCAR', 'Codcar', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('APRPTO', 'Aprpto', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('USUAPR', 'Usuapr', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECAPR', 'Fecapr', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('PTOUSA', 'Ptousa', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 