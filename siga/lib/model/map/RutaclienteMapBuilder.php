<?php



class RutaclienteMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RutaclienteMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('rutacliente');
		$tMap->setPhpName('Rutacliente');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('rutacliente_SEQ');

		$tMap->addForeignKey('RUTA_ID', 'RutaId', 'int', CreoleTypes::INTEGER, 'ruta', 'ID', true, null);

		$tMap->addForeignKey('FACLIENTE_ID', 'FaclienteId', 'int', CreoleTypes::INTEGER, 'facliente', 'ID', true, null);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 