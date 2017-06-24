<?php



class OpordempMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OpordempMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('opordemp');
		$tMap->setPhpName('Opordemp');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('opordemp_SEQ');

		$tMap->addColumn('NUMORD', 'Numord', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('MONTOT', 'Montot', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 