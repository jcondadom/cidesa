<?php



class NpcoshnivMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpcoshnivMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npcoshniv');
		$tMap->setPhpName('Npcoshniv');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npcoshniv_SEQ');

		$tMap->addColumn('CODNIVC', 'Codnivc', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('FECVIG', 'Fecvig', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('COSTO', 'Costo', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 