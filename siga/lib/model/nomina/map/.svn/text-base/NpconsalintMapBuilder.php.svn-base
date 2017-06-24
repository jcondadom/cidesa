<?php



class NpconsalintMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpconsalintMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npconsalint');
		$tMap->setPhpName('Npconsalint');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npconsalint_SEQ');

		$tMap->addForeignKey('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, 'npnomina', 'CODNOM', false, 3);

		$tMap->addForeignKey('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, 'npdefcpt', 'CODCON', false, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 