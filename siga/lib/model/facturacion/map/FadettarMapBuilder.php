<?php



class FadettarMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FadettarMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fadettar');
		$tMap->setPhpName('Fadettar');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fadettar_SEQ');

		$tMap->addColumn('REFTAR', 'Reftar', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('DESART', 'Desart', 'string', CreoleTypes::VARCHAR, false, 2000);

		$tMap->addColumn('NUITEM', 'Nuitem', 'string', CreoleTypes::VARCHAR, false, 5);

		$tMap->addColumn('FECPLA', 'Fecpla', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECCUL', 'Feccul', 'int', CreoleTypes::DATE, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 