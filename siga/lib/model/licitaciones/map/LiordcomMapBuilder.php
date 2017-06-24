<?php



class LiordcomMapBuilder {

	
	const CLASS_NAME = 'lib.model.licitaciones.map.LiordcomMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('liordcom');
		$tMap->setPhpName('Liordcom');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('liordcom_SEQ');

		$tMap->addColumn('NUMORD', 'Numord', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('RESOLU', 'Resolu', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('FECREL', 'Fecrel', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DIAS', 'Dias', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('FECVEN', 'Fecven', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NUMPTOCUECON', 'Numptocuecon', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('NUMEXP', 'Numexp', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CODEMPADM', 'Codempadm', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODUNIADM', 'Coduniadm', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODEMPEJE', 'Codempeje', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODUNISTE', 'Coduniste', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('NUMOFE', 'Numofe', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('OBJCONT', 'Objcont', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('TIPDESC', 'Tipdesc', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CONPAG', 'Conpag', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('SANCIO', 'Sancio', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('GARANT', 'Garant', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('DOCANE1', 'Docane1', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DOCANE2', 'Docane2', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DOCANE3', 'Docane3', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('PREPOR', 'Prepor', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('PREPORCAR', 'Preporcar', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addForeignKey('LISICACT_ID', 'LisicactId', 'int', CreoleTypes::INTEGER, 'lisicact', 'ID', false, null);

		$tMap->addColumn('FECDECLA', 'Fecdecla', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DETDECMOD', 'Detdecmod', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('ANAPOR', 'Anapor', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('ANAPORCAR', 'Anaporcar', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CODMEDCOM', 'Codmedcom', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODPROCOM', 'Codprocom', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('NUMPRO', 'Numpro', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CODPAI', 'Codpai', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODEST', 'Codest', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODMUN', 'Codmun', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DE4000', 'De4000', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('DE3798', 'De3798', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NUMSIG', 'Numsig', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('FECSIG', 'Fecsig', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('EXPDIE', 'Expdie', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('MONPRO', 'Monpro', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 