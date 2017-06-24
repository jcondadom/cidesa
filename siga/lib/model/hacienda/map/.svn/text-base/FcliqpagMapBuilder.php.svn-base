<?php



class FcliqpagMapBuilder {

	
	const CLASS_NAME = 'lib.model.hacienda.map.FcliqpagMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcliqpag');
		$tMap->setPhpName('Fcliqpag');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcliqpag_SEQ');

		$tMap->addColumn('NUMLIQ', 'Numliq', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('FECLIQ', 'Fecliq', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('CTABAN', 'Ctaban', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('NRODEP', 'Nrodep', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addForeignKey('CODTIP', 'Codtip', 'string', CreoleTypes::VARCHAR, 'tstipmov', 'CODTIP', true, 4);

		$tMap->addColumn('DESLIQ', 'Desliq', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('MONLIQ', 'Monliq', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 