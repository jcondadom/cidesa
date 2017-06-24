<?php



class LiregconrgoMapBuilder {

	
	const CLASS_NAME = 'lib.model.licitaciones.map.LiregconrgoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('liregconrgo');
		$tMap->setPhpName('Liregconrgo');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('liregconrgo_SEQ');

		$tMap->addForeignKey('NUMCONT', 'Numcont', 'string', CreoleTypes::VARCHAR, 'licontrat', 'NUMCONT', false, 20);

		$tMap->addColumn('CODRGO', 'Codrgo', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('MONRGO', 'Monrgo', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TIPCONPUB', 'Tipconpub', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 