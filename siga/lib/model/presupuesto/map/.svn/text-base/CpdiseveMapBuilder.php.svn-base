<?php



class CpdiseveMapBuilder {

	
	const CLASS_NAME = 'lib.model.presupuesto.map.CpdiseveMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cpdiseve');
		$tMap->setPhpName('Cpdiseve');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cpdiseve_SEQ');

		$tMap->addColumn('REFDOC', 'Refdoc', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('CODEVE', 'Codeve', 'string', CreoleTypes::VARCHAR, true, 6);

		$tMap->addColumn('MONEVE', 'Moneve', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TIPDOC', 'Tipdoc', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('TIPMOV', 'Tipmov', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 