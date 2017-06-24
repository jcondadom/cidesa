<?php



class ManrehordMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.ManrehordMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('manrehord');
		$tMap->setPhpName('Manrehord');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('manrehord_SEQ');

		$tMap->addColumn('NUMORD', 'Numord', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODCAR', 'Codcar', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CANREC', 'Canrec', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('CANHOR', 'Canhor', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 