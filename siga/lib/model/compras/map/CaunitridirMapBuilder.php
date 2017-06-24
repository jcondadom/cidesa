<?php



class CaunitridirMapBuilder {

	
	const CLASS_NAME = 'lib.model.compras.map.CaunitridirMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('caunitridir');
		$tMap->setPhpName('Caunitridir');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('caunitridir_SEQ');

		$tMap->addColumn('CODDIREC', 'Coddirec', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('FECVIG', 'Fecvig', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('CANUNITRI', 'Canunitri', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 