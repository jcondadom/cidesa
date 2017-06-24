<?php



class NpcamdedMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpcamdedMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npcamded');
		$tMap->setPhpName('Npcamded');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npcamded_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODTIP', 'Codtip', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('FECCAM', 'Feccam', 'int', CreoleTypes::DATE, true, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 