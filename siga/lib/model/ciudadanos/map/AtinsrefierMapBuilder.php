<?php



class AtinsrefierMapBuilder {

	
	const CLASS_NAME = 'lib.model.ciudadanos.map.AtinsrefierMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('atinsrefier');
		$tMap->setPhpName('Atinsrefier');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('atinsrefier_SEQ');

		$tMap->addColumn('DESINSREF', 'Desinsref', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('PERCON', 'Percon', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TELEFONO', 'Telefono', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('CORREO', 'Correo', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('CARGO', 'Cargo', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 