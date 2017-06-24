<?php



class HcgasfunMapBuilder {

	
	const CLASS_NAME = 'lib.model.hcm.map.HcgasfunMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('hcgasfun');
		$tMap->setPhpName('Hcgasfun');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('hcgasfun_SEQ');

		$tMap->addColumn('CODGAS', 'Codgas', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CEDFAM', 'Cedfam', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('FECGAS', 'Fecgas', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('MONGAS', 'Mongas', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('OBSGAS', 'Obsgas', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('NROFAC', 'Nrofac', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECFAC', 'Fecfac', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('FECRECFAC', 'Fecrecfac', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('GENOP', 'Genop', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('TITPRO', 'Titpro', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('RIFPRO', 'Rifpro', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('LOGUSE', 'Loguse', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 