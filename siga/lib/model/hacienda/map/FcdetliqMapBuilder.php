<?php



class FcdetliqMapBuilder {

	
	const CLASS_NAME = 'lib.model.hacienda.map.FcdetliqMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcdetliq');
		$tMap->setPhpName('Fcdetliq');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcdetliq_SEQ');

		$tMap->addForeignKey('NUMLIQ', 'Numliq', 'string', CreoleTypes::VARCHAR, 'fcliqpag', 'NUMLIQ', true, 20);

		$tMap->addForeignKey('NUMPAG', 'Numpag', 'string', CreoleTypes::VARCHAR, 'fcpagos', 'NUMPAG', true, 10);

		$tMap->addColumn('FECPAG', 'Fecpag', 'int', CreoleTypes::DATE, true, null);

		$tMap->addForeignKey('RIFCON', 'Rifcon', 'string', CreoleTypes::VARCHAR, 'fcconrep', 'RIFCON', true, 20);

		$tMap->addColumn('NOMCON', 'Nomcon', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addColumn('DESPAG', 'Despag', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('MONPAG', 'Monpag', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 