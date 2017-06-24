<?php



class FamattartraMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FamattartraMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('famattartra');
		$tMap->setPhpName('Famattartra');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('famattartra_SEQ');

		$tMap->addColumn('REFTAR', 'Reftar', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODMAT', 'Codmat', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('NUMPLA', 'Numpla', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DOCREF', 'Docref', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 