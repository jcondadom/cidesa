<?php



class OpregfacMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OpregfacMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('opregfac');
		$tMap->setPhpName('Opregfac');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('opregfac_SEQ');

		$tMap->addForeignKey('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, 'opbenefi', 'CEDRIF', true, 15);

		$tMap->addColumn('NUMFAC', 'Numfac', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('FECFAC', 'Fecfac', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('BASIMP', 'Basimp', 'double', CreoleTypes::NUMERIC, false, 18);

		$tMap->addColumn('MONIVA', 'Moniva', 'double', CreoleTypes::NUMERIC, false, 18);

		$tMap->addColumn('FECREC', 'Fecrec', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('OBSFAC', 'Obsfac', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('RECORD', 'Record', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECRECORD', 'Fecrecord', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODUBI', 'Codubi', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 