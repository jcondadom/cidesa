<?php



class CpimpcomextMapBuilder {

	
	const CLASS_NAME = 'lib.model.presupuesto.map.CpimpcomextMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cpimpcomext');
		$tMap->setPhpName('Cpimpcomext');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cpimpcomext_SEQ');

		$tMap->addForeignKey('REFCOMEXT', 'Refcomext', 'string', CreoleTypes::VARCHAR, 'cpcomext', 'REFCOMEXT', true, 8);

		$tMap->addForeignKey('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, 'cpdeftit', 'CODPRE', true, 50);

		$tMap->addColumn('MONIMP', 'Monimp', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONCAU', 'Moncau', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONPAG', 'Monpag', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONAJU', 'Monaju', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STAIMP', 'Staimp', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('REFERE', 'Refere', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 