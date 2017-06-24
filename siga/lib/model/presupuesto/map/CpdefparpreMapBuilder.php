<?php



class CpdefparpreMapBuilder {

	
	const CLASS_NAME = 'lib.model.presupuesto.map.CpdefparpreMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cpdefparpre');
		$tMap->setPhpName('Cpdefparpre');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cpdefparpre_SEQ');

		$tMap->addColumn('CODPARPRE', 'Codparpre', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('NOMPARPRE', 'Nomparpre', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addColumn('STAGEN', 'Stagen', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 