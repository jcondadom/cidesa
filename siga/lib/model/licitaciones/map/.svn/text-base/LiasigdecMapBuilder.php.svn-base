<?php



class LiasigdecMapBuilder {

	
	const CLASS_NAME = 'lib.model.licitaciones.map.LiasigdecMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('liasigdec');
		$tMap->setPhpName('Liasigdec');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('liasigdec_SEQ');

		$tMap->addForeignKey('LISICACT_ID', 'LisicactId', 'int', CreoleTypes::INTEGER, 'lisicact', 'ID', false, null);

		$tMap->addColumn('FECDECLA', 'Fecdecla', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DETDECMOD', 'Detdecmod', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('ANAPOR', 'Anapor', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('ANAPORCAR', 'Anaporcar', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NUMDOC', 'Numdoc', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('TABLA', 'Tabla', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('NUMDEC', 'Numdec', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('TIPCONPUB', 'Tipconpub', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 