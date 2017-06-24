<?php



class HcciereeMapBuilder {

	
	const CLASS_NAME = 'lib.model.hcm.map.HcciereeMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('hccieree');
		$tMap->setPhpName('Hccieree');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('hccieree_SEQ');

		$tMap->addColumn('CODCIE', 'Codcie', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('NOMEMP', 'Nomemp', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CEDEMP', 'Cedemp', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('NOMNOM', 'Nomnom', 'string', CreoleTypes::VARCHAR, false, 300);

		$tMap->addColumn('NOMCAR', 'Nomcar', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('CODTTRAB', 'Codttrab', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('MONCIE', 'Moncie', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FECCIE', 'Feccie', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 