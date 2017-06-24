<?php



class BnestconMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BnestconMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bnestcon');
		$tMap->setPhpName('Bnestcon');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bnestcon_SEQ');

		$tMap->addColumn('CODEST', 'Codest', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESEST', 'Desest', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 