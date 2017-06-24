<?php



class LiregforpagaddcontMapBuilder {

	
	const CLASS_NAME = 'lib.model.licitaciones.map.LiregforpagaddcontMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('liregforpagaddcont');
		$tMap->setPhpName('Liregforpagaddcont');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('liregforpagaddcont_SEQ');

		$tMap->addForeignKey('NUMADD', 'Numadd', 'string', CreoleTypes::VARCHAR, 'liaddendum', 'NUMADD', false, 8);

		$tMap->addColumn('DESANT', 'Desant', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('PORANT', 'Porant', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONTOT', 'Montot', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONREC', 'Monrec', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('SUBTOT', 'Subtot', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PORAMOANT', 'Poramoant', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('NETPAG', 'Netpag', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FECANT', 'Fecant', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CONDIC', 'Condic', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('TIPCONPUB', 'Tipconpub', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NUMORD', 'Numord', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('NUMCHE', 'Numche', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('FECCOM', 'Feccom', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECCAU', 'Feccau', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECPAG', 'Fecpag', 'int', CreoleTypes::DATE, false, null);

		$tMap->addForeignKey('LIREGFORPAGCONT_ID', 'LiregforpagcontId', 'int', CreoleTypes::INTEGER, 'liregforpagcont', 'ID', false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 