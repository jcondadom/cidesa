<?php



class LisolegrdetMapBuilder {

	
	const CLASS_NAME = 'lib.model.licitaciones.map.LisolegrdetMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('lisolegrdet');
		$tMap->setPhpName('Lisolegrdet');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('lisolegrdet_SEQ');

		$tMap->addColumn('NUMSOL', 'Numsol', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, false, 55);

		$tMap->addColumn('UNIMED', 'Unimed', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CANSOL', 'Cansol', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('COSTO', 'Costo', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('SUBTOT', 'Subtot', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONREC', 'Monrec', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONTOT', 'Montot', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODMON', 'Codmon', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('VALCAM', 'Valcam', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODFIN', 'Codfin', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('TIPCONPUB', 'Tipconpub', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 