<?php



class FamedsegtarMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FamedsegtarMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('famedsegtar');
		$tMap->setPhpName('Famedsegtar');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('famedsegtar_SEQ');

		$tMap->addColumn('REFTAR', 'Reftar', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('NUITEM', 'Nuitem', 'string', CreoleTypes::VARCHAR, false, 5);

		$tMap->addColumn('DESMED', 'Desmed', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('OBSMED', 'Obsmed', 'string', CreoleTypes::VARCHAR, false, 2000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 