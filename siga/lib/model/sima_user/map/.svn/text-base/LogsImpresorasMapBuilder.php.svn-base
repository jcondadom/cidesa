<?php



class LogsImpresorasMapBuilder {

	
	const CLASS_NAME = 'lib.model.sima_user.map.LogsImpresorasMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap('sima_user');

		$tMap = $this->dbMap->addTable('logs_impresoras');
		$tMap->setPhpName('LogsImpresoras');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('logs_impresoras_SEQ');

		$tMap->addColumn('FACTURA_ID', 'FacturaId', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('NUMERO_FACTURA', 'NumeroFactura', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('NUMERO_DEVOLUCION', 'NumeroDevolucion', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('ERROR', 'Error', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('SERIAL_IMPRESORA', 'SerialImpresora', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('FECHA', 'Fecha', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('HORA', 'Hora', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 