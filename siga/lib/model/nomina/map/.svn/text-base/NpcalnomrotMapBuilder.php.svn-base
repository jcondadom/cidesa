<?php



class NpcalnomrotMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpcalnomrotMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npcalnomrot');
		$tMap->setPhpName('Npcalnomrot');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npcalnomrot_SEQ');

		$tMap->addColumn('CODTUR', 'Codtur', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODGRU', 'Codgru', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('FECJOR', 'Fecjor', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODJOR', 'Codjor', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('NUMDIA', 'Numdia', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('DIASEM', 'Diasem', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 