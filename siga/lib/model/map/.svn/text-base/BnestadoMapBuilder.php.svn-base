<?php



class BnestadoMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BnestadoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bnestado');
		$tMap->setPhpName('Bnestado');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bnestado_SEQ');

		$tMap->addColumn('CODEST', 'Codest', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMEST', 'Nomest', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 