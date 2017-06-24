<?php



class FaapecajMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FaapecajMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('faapecaj');
		$tMap->setPhpName('Faapecaj');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('faapecaj_SEQ');

		$tMap->addForeignKey('CODALM', 'Codalm', 'string', CreoleTypes::VARCHAR, 'cadefalm', 'CODALM', true, 20);

		$tMap->addForeignKey('CODCAJ', 'Codcaj', 'int', CreoleTypes::INTEGER, 'fadefcaj', 'ID', true, null);

		$tMap->addColumn('CODUSU', 'Codusu', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('FECHORAPE', 'Fechorape', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('STACAJ', 'Stacaj', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('MONAPE', 'Monape', 'double', CreoleTypes::NUMERIC, true, 32);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 