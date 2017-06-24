<?php



class FaantcliMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FaantcliMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('faantcli');
		$tMap->setPhpName('Faantcli');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('faantcli_SEQ');

		$tMap->addColumn('NROANT', 'Nroant', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECANT', 'Fecant', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('REFPED', 'Refped', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CODCLI', 'Codcli', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('DESANT', 'Desant', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('TOTANT', 'Totant', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TOTXAN', 'Totxan', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addForeignKey('NUMCUE', 'Numcue', 'string', CreoleTypes::VARCHAR, 'tsdefban', 'NUMCUE', true, 20);

		$tMap->addForeignKey('CODTIP', 'Codtip', 'string', CreoleTypes::VARCHAR, 'tstipmov', 'CODTIP', true, 4);

		$tMap->addColumn('NUMCOM', 'Numcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('RESANT', 'Resant', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TIPANT', 'Tipant', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 