<?php



class FatippagMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FatippagMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fatippag');
		$tMap->setPhpName('Fatippag');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fatippag_SEQ');

		$tMap->addColumn('DESTIPPAG', 'Destippag', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('TIPCAN', 'Tipcan', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('GENMOV', 'Genmov', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('GENING', 'Gening', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('GENNOTCRE', 'Gennotcre', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('GENDETCHE', 'Gendetche', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('PAGRET', 'Pagret', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 