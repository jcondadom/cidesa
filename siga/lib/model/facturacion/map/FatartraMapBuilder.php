<?php



class FatartraMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FatartraMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fatartra');
		$tMap->setPhpName('Fatartra');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fatartra_SEQ');

		$tMap->addColumn('REFTAR', 'Reftar', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECTAR', 'Fectar', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('REFORD', 'Reford', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('DESTAR', 'Destar', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('ARERES', 'Areres', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('DIACUL', 'Diacul', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('REAPOR', 'Reapor', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('APRORDTRA', 'Aprordtra', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('USUAPRORD', 'Usuaprord', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECAPRORD', 'Fecaprord', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('OBSAPRORD', 'Obsaprord', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 