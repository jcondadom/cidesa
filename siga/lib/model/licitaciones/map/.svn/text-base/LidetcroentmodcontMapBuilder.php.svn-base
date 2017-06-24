<?php



class LidetcroentmodcontMapBuilder {

	
	const CLASS_NAME = 'lib.model.licitaciones.map.LidetcroentmodcontMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('lidetcroentmodcont');
		$tMap->setPhpName('Lidetcroentmodcont');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('lidetcroentmodcont_SEQ');

		$tMap->addForeignKey('NUMMOD', 'Nummod', 'string', CreoleTypes::VARCHAR, 'limodcont', 'NUMMOD', false, 8);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CANTID', 'Cantid', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addForeignKey('CODUNIADM', 'Coduniadm', 'string', CreoleTypes::VARCHAR, 'liuniadm', 'CODUNIADM', false, 4);

		$tMap->addColumn('FECENTCONT', 'Fecentcont', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECENT', 'Fecent', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CONDIC', 'Condic', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('CANTIDREC', 'Cantidrec', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FECREC', 'Fecrec', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('OBSERVACION', 'Observacion', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('TIPCONPUB', 'Tipconpub', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addForeignKey('LIDETCROENTCONTOB_ID', 'LidetcroentcontobId', 'string', CreoleTypes::VARCHAR, 'lidetcroentcontob', 'ID', false, 4);

		$tMap->addColumn('NUMVAL', 'Numval', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 