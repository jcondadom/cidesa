<?php



class CadettraMapBuilder {

	
	const CLASS_NAME = 'lib.model.compras.map.CadettraMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cadettra');
		$tMap->setPhpName('Cadettra');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cadettra_SEQ');

		$tMap->addColumn('CODTRA', 'Codtra', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CANART', 'Canart', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CANREC', 'Canrec', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CANDEV', 'Candev', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CANDIF', 'Candif', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addForeignKey('CODFAL', 'Codfal', 'string', CreoleTypes::VARCHAR, 'camotfal', 'CODFAL', false, 3);

		$tMap->addColumn('FECEST', 'Fecest', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('OBSTRA', 'Obstra', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('NUMLOTORI', 'Numlotori', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('NUMLOTDES', 'Numlotdes', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('ALMORI', 'Almori', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addColumn('CODUBIORI', 'Codubiori', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('ALMDES', 'Almdes', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addColumn('CODUBIDES', 'Codubides', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 