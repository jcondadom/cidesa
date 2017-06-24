<?php



class LimodcontMapBuilder {

	
	const CLASS_NAME = 'lib.model.licitaciones.map.LimodcontMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('limodcont');
		$tMap->setPhpName('Limodcont');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('limodcont_SEQ');

		$tMap->addColumn('NUMMOD', 'Nummod', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addForeignKey('TIPMOD', 'Tipmod', 'string', CreoleTypes::VARCHAR, 'litipmod', 'CODTIPMOD', false, 8);

		$tMap->addForeignKey('NUMCONT', 'Numcont', 'string', CreoleTypes::VARCHAR, 'licontrat', 'NUMCONT', false, 20);

		$tMap->addColumn('DETMOD', 'Detmod', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addForeignKey('CODTIPMOD', 'Codtipmod', 'int', CreoleTypes::INTEGER, 'litipmod', 'CODTIPMOD', false, null);

		$tMap->addForeignKey('CODEMPADM', 'Codempadm', 'string', CreoleTypes::VARCHAR, 'lidatstedet', 'CODEMP', false, 16);

		$tMap->addColumn('CODUNIADM', 'Coduniadm', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addForeignKey('CODEMPEJE', 'Codempeje', 'string', CreoleTypes::VARCHAR, 'lidatstedet', 'CODEMP', false, 16);

		$tMap->addColumn('CODUNISTE', 'Coduniste', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DIAS', 'Dias', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('FECVEN', 'Fecven', 'int', CreoleTypes::DATE, false, null);

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

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 