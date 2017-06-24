<?php



class BnusobieMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BnusobieMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bnusobie');
		$tMap->setPhpName('Bnusobie');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bnusobie_SEQ');

		$tMap->addColumn('CODUSOBIE', 'Codusobie', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESUSOBIE', 'Desusobie', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 