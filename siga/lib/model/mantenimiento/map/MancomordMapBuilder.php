<?php



class MancomordMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.MancomordMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mancomord');
		$tMap->setPhpName('Mancomord');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('mancomord_SEQ');

		$tMap->addColumn('NUMORD', 'Numord', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('NUMEQU', 'Numequ', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('CODCOM', 'Codcom', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('DESCOM', 'Descom', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addColumn('CODTCO', 'Codtco', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('NUMPAR', 'Numpar', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('NUMSER', 'Numser', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('POSICI', 'Posici', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('TIEACU', 'Tieacu', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('INSPOR', 'Inspor', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECINS', 'Fecins', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('VIDEST', 'Videst', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('VIDACT', 'Vidact', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FECREE', 'Fecree', 'int', CreoleTypes::DATE, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 