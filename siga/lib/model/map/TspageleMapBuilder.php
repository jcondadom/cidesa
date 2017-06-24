<?php



class TspageleMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TspageleMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('tspagele');
		$tMap->setPhpName('Tspagele');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('tspagele_SEQ');

		$tMap->addColumn('REFPAG', 'Refpag', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('NUMCUE', 'Numcue', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('FECPAG', 'Fecpag', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('MONPAG', 'Monpag', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('ESTPAG', 'Estpag', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('LOGUSE', 'Loguse', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('TIPDOC', 'Tipdoc', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DESPAG', 'Despag', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('TIPTXT', 'Tiptxt', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DESANU', 'Desanu', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('FECPAGADO', 'Fecpagado', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECEFEPAG', 'Fecefepag', 'int', CreoleTypes::DATE, false, null);

		$tMap->addForeignKey('CODMON', 'Codmon', 'string', CreoleTypes::VARCHAR, 'tsdefmon', 'CODMON', true, 3);

		$tMap->addColumn('VALMON', 'Valmon', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODDIREC', 'Coddirec', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 