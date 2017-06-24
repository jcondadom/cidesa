<?php



class FainsteduMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FainsteduMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fainstedu');
		$tMap->setPhpName('Fainstedu');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fainstedu_SEQ');

		$tMap->addColumn('CODINST', 'Codinst', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('NOMINST', 'Nominst', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addColumn('DIRINST', 'Dirinst', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addColumn('TELINST', 'Telinst', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('FAXINST', 'Faxinst', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('EMAILINST', 'Emailinst', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('CODEDO', 'Codedo', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODCIU', 'Codciu', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODMUN', 'Codmun', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('INGESTA', 'Ingesta', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('MATINST', 'Matinst', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addForeignKey('CODDEP', 'Coddep', 'string', CreoleTypes::VARCHAR, 'fadependencia', 'CODDEP', true, 5);

		$tMap->addForeignKey('CODSUB', 'Codsub', 'string', CreoleTypes::VARCHAR, 'fasubsistema', 'CODSUB', true, 5);

		$tMap->addColumn('PERSONA', 'Persona', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 