<?php



class LiregaddcondetMapBuilder {

	
	const CLASS_NAME = 'lib.model.licitaciones.map.LiregaddcondetMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('liregaddcondet');
		$tMap->setPhpName('Liregaddcondet');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('liregaddcondet_SEQ');

		$tMap->addForeignKey('NUMADD', 'Numadd', 'string', CreoleTypes::VARCHAR, 'liaddendum', 'NUMADD', false, 8);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('UNIMED', 'Unimed', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CANTID', 'Cantid', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PREUNI', 'Preuni', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONREC', 'Monrec', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CANTIDAUM', 'Cantidaum', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PREUNIAUM', 'Preuniaum', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONRECAUM', 'Monrecaum', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CANTIDDIS', 'Cantiddis', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PREUNIDIS', 'Preunidis', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONRECDIS', 'Monrecdis', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CANTIDADD', 'Cantidadd', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PREUNIADD', 'Preuniadd', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONRECADD', 'Monrecadd', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('SUBTOT', 'Subtot', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TIPCONPUB', 'Tipconpub', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 