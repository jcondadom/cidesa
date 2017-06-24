<?php



class OpvenfacmenMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OpvenfacmenMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('opvenfacmen');
		$tMap->setPhpName('Opvenfacmen');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('opvenfacmen_SEQ');

		$tMap->addColumn('MES', 'Mes', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('MONGRA', 'Mongra', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('MOSGRA', 'Mosgra', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('TOTMES', 'Totmes', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 