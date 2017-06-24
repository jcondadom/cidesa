<?php



class FaciecajMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FaciecajMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('faciecaj');
		$tMap->setPhpName('Faciecaj');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('faciecaj_SEQ');

		$tMap->addForeignKey('CODALM', 'Codalm', 'string', CreoleTypes::VARCHAR, 'cadefalm', 'CODALM', true, 20);

		$tMap->addForeignKey('CODCAJ', 'Codcaj', 'int', CreoleTypes::INTEGER, 'fadefcaj', 'ID', true, null);

		$tMap->addColumn('CODUSU', 'Codusu', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('NUMFACINI', 'Numfacini', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('NUMFACCIE', 'Numfaccie', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('NUMCTRINI', 'Numctrini', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('NUMCTRCIE', 'Numctrcie', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('MONCIE', 'Moncie', 'double', CreoleTypes::NUMERIC, true, 32);

		$tMap->addColumn('FECHORCIE', 'Fechorcie', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('CODAPE', 'Codape', 'int', CreoleTypes::INTEGER, 'faapecaj', 'ID', true, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 