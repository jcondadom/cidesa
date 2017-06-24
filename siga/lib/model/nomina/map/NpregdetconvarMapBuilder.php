<?php



class NpregdetconvarMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpregdetconvarMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npregdetconvar');
		$tMap->setPhpName('Npregdetconvar');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npregdetconvar_SEQ');

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('FECNOM', 'Fecnom', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('MONCON', 'Moncon', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CANTIDAD', 'Cantidad', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 