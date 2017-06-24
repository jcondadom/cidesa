<?php



class FaordtraMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FaordtraMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('faordtra');
		$tMap->setPhpName('Faordtra');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('faordtra_SEQ');

		$tMap->addColumn('REFORD', 'Reford', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECORD', 'Fecord', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('REFCOT', 'Refcot', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('REFPRE', 'Refpre', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CODCLI', 'Codcli', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('CODSED', 'Codsed', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODEMB', 'Codemb', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('DESORD', 'Desord', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('DIACUL', 'Diacul', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('REAPOR', 'Reapor', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('APRORDTRA', 'Aprordtra', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('USUAPRORD', 'Usuaprord', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECAPRORD', 'Fecaprord', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('OBSAPRORD', 'Obsaprord', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('RECORDTRA', 'Recordtra', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('USURECORD', 'Usurecord', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECRECORD', 'Fecrecord', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('OBSRECORD', 'Obsrecord', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 