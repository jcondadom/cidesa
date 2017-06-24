<?php



class HcdefgenMapBuilder {

	
	const CLASS_NAME = 'lib.model.hcm.map.HcdefgenMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('hcdefgen');
		$tMap->setPhpName('Hcdefgen');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('hcdefgen_SEQ');

		$tMap->addColumn('HCMCOB', 'Hcmcob', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MATCOB', 'Matcob', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('ODOCOB', 'Odocob', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FUNCOB', 'Funcob', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FECVIG', 'Fecvig', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('CODREEM', 'Codreem', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('DURCARAVA', 'Durcarava', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('CODREEO', 'Codreeo', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODRAMHCM', 'Codramhcm', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addColumn('CODRAMGASFUN', 'Codramgasfun', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addColumn('NOTDEF', 'Notdef', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('DURAUT', 'Duraut', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('FIREMP1', 'Firemp1', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('FIREMP2', 'Firemp2', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('FECHA', 'Fecha', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 