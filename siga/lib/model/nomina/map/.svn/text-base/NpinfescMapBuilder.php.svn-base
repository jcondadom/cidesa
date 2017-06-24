<?php



class NpinfescMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpinfescMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npinfesc');
		$tMap->setPhpName('Npinfesc');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npinfesc_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODCAR', 'Codcar', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('FECMOV', 'Fecmov', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('GRADO', 'Grado', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('PASO', 'Paso', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('RANGO', 'Rango', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 