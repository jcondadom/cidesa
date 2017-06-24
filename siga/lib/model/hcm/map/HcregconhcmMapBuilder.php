<?php



class HcregconhcmMapBuilder {

	
	const CLASS_NAME = 'lib.model.hcm.map.HcregconhcmMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('hcregconhcm');
		$tMap->setPhpName('Hcregconhcm');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('hcregconhcm_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CEDFAM', 'Cedfam', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('TIPHCM', 'Tiphcm', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('RIFPRO', 'Rifpro', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('FECCON', 'Feccon', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('MONCON', 'Moncon', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('GENEOP', 'Geneop', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NROFAC', 'Nrofac', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECFAC', 'Fecfac', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('FECRECFAC', 'Fecrecfac', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('GENOP', 'Genop', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('TITPRO', 'Titpro', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('STATOP', 'Statop', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('LOGUSE', 'Loguse', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NUMORD', 'Numord', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 