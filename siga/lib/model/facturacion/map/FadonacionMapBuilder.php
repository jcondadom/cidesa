<?php



class FadonacionMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FadonacionMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fadonacion');
		$tMap->setPhpName('Fadonacion');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fadonacion_SEQ');

		$tMap->addColumn('NRODON', 'Nrodon', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECDON', 'Fecdon', 'int', CreoleTypes::DATE, true, null);

		$tMap->addForeignKey('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, 'facliente', 'CODPRO', true, 15);

		$tMap->addColumn('DESDON', 'Desdon', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('MONDON', 'Mondon', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('REAPOR', 'Reapor', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 