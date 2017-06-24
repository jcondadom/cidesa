<?php



class FapregruMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FapregruMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fapregru');
		$tMap->setPhpName('Fapregru');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fapregru_SEQ');

		$tMap->addColumn('REFPRE', 'Refpre', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODCLA', 'Codcla', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 