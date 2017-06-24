<?php



class FacrovisMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FacrovisMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('facrovis');
		$tMap->setPhpName('Facrovis');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('facrovis_SEQ');

		$tMap->addColumn('FECVIS', 'Fecvis', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('RIFVEN', 'Rifven', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('RIFPRO', 'Rifpro', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('RESVIS', 'Resvis', 'string', CreoleTypes::VARCHAR, false, 2000);

		$tMap->addColumn('ESTVIS', 'Estvis', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('OBSVIS', 'Obsvis', 'string', CreoleTypes::VARCHAR, false, 2000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 