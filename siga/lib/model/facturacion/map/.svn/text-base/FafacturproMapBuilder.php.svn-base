<?php



class FafacturproMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FafacturproMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fafacturpro');
		$tMap->setPhpName('Fafacturpro');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fafacturpro_SEQ');

		$tMap->addColumn('REFFAC', 'Reffac', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECFAC', 'Fecfac', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('CODCLI', 'Codcli', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('DESFAC', 'Desfac', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('TIPREF', 'Tipref', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('MONFAC', 'Monfac', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONDESC', 'Mondesc', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODCONPAG', 'Codconpag', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('NUMCOM', 'Numcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('REAPOR', 'Reapor', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('TIPMON', 'Tipmon', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('VALMON', 'Valmon', 'double', CreoleTypes::NUMERIC, false, 12);

		$tMap->addColumn('NUMCOMORD', 'Numcomord', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('NUMCOMINV', 'Numcominv', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('SUCURSAL', 'Sucursal', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('MOTANU', 'Motanu', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('VUELTO', 'Vuelto', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODCAJ', 'Codcaj', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('NUMCONTROL', 'Numcontrol', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('CODUBI', 'Codubi', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('MUELLE', 'Muelle', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('BUQUE', 'Buque', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('EXPEDI', 'Expedi', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('BELE', 'Bele', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('FACTURA', 'Factura', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('EMBARCA', 'Embarca', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('DESCARGA', 'Descarga', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CANBUL', 'Canbul', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODPROD', 'Codprod', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('TMDESC', 'Tmdesc', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FECATRA', 'Fecatra', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECINIDESC', 'Fecinidesc', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECFINDESC', 'Fecfindesc', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('VALCIFS', 'Valcifs', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FADESCRIPFAC_ID', 'FadescripfacId', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 