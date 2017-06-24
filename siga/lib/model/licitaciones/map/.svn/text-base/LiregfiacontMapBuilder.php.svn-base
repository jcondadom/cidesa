<?php



class LiregfiacontMapBuilder {

	
	const CLASS_NAME = 'lib.model.licitaciones.map.LiregfiacontMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('liregfiacont');
		$tMap->setPhpName('Liregfiacont');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('liregfiacont_SEQ');

		$tMap->addForeignKey('NUMCONT', 'Numcont', 'string', CreoleTypes::VARCHAR, 'licontrat', 'NUMCONT', false, 20);

		$tMap->addForeignKey('CODCOMRES', 'Codcomres', 'string', CreoleTypes::VARCHAR, 'liccomres', 'CODCOMRES', false, 4);

		$tMap->addColumn('PORCEN', 'Porcen', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('EMPRESA', 'Empresa', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('FECEMI', 'Fecemi', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECVEN', 'Fecven', 'int', CreoleTypes::DATE, false, null);

		$tMap->addForeignKey('LIREGOFEFIA_ID', 'LiregofefiaId', 'int', CreoleTypes::INTEGER, 'liregofefia', 'ID', false, null);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('ESTATUS', 'Estatus', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 