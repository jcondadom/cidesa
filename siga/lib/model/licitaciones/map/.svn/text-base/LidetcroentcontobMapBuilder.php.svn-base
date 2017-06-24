<?php



class LidetcroentcontobMapBuilder {

	
	const CLASS_NAME = 'lib.model.licitaciones.map.LidetcroentcontobMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('lidetcroentcontob');
		$tMap->setPhpName('Lidetcroentcontob');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('lidetcroentcontob_SEQ');

		$tMap->addForeignKey('NUMCONT', 'Numcont', 'string', CreoleTypes::VARCHAR, 'licontrat', 'NUMCONT', false, 20);

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

		$tMap->addColumn('NUMVAL', 'Numval', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addForeignKey('LICROENT_ID', 'LicroentId', 'string', CreoleTypes::VARCHAR, 'licroent', 'ID', false, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 