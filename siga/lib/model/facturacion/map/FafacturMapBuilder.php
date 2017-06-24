<?php



class FafacturMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FafacturMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fafactur');
		$tMap->setPhpName('Fafactur');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fafactur_SEQ');

		$tMap->addColumn('REFFAC', 'Reffac', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECFAC', 'Fecfac', 'int', CreoleTypes::DATE, true, null);

		$tMap->addForeignKey('CODCLI', 'Codcli', 'string', CreoleTypes::VARCHAR, 'facliente', 'CODPRO', true, 15);

		$tMap->addColumn('DESFAC', 'Desfac', 'string', CreoleTypes::VARCHAR, false, 1000);

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

		$tMap->addColumn('PROFORM', 'Proform', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('CODUBI', 'Codubi', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('TIPOVEN', 'Tipoven', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('OBSFAC', 'Obsfac', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('CODCENACO', 'Codcenaco', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('STAENT', 'Staent', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECENT', 'Fecent', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('USUENT', 'Usuent', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('BTUFIN', 'Btufin', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PUEDPH', 'Puedph', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('PUEDES', 'Puedes', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('BUQUE', 'Buque', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FADESCRIPFAC_ID', 'FadescripfacId', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('CODPRG', 'Codprg', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addColumn('CONPAG', 'Conpag', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addForeignKey('CODALMUSU', 'Codalmusu', 'string', CreoleTypes::VARCHAR, 'cadefalm', 'CODALM', false, 6);

		$tMap->addColumn('NROORDFAC', 'Nroordfac', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CODPROPAT', 'Codpropat', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODPRORAD', 'Codprorad', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('RIFPROD', 'Rifprod', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('VERSION', 'Version', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECTRADES', 'Fectrades', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECTRAHAS', 'Fectrahas', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FRECTRA', 'Frectra', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DURACION', 'Duracion', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('OBSTRA', 'Obstra', 'string', CreoleTypes::VARCHAR, false, 200);

		$tMap->addColumn('MUELLE', 'Muelle', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('BUQUE2', 'Buque2', 'string', CreoleTypes::VARCHAR, false, 250);

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

		$tMap->addColumn('FECPER1', 'Fecper1', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECPER2', 'Fecper2', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODDIREC', 'Coddirec', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('IMPFISSTA', 'Impfissta', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('CREATED_BY_USER', 'CreatedByUser', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('UPDATED_BY_USER', 'UpdatedByUser', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 