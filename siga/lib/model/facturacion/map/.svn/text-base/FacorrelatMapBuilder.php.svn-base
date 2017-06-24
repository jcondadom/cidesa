<?php



class FacorrelatMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FacorrelatMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('facorrelat');
		$tMap->setPhpName('Facorrelat');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('facorrelat_SEQ');

		$tMap->addColumn('CORPRE', 'Corpre', 'double', CreoleTypes::NUMERIC, true, 8);

		$tMap->addColumn('CORPED', 'Corped', 'double', CreoleTypes::NUMERIC, true, 8);

		$tMap->addColumn('CORFAC', 'Corfac', 'double', CreoleTypes::NUMERIC, true, 8);

		$tMap->addColumn('CORNOT', 'Cornot', 'double', CreoleTypes::NUMERIC, true, 8);

		$tMap->addColumn('CORDPH', 'Cordph', 'double', CreoleTypes::NUMERIC, true, 8);

		$tMap->addColumn('CORDEV', 'Cordev', 'double', CreoleTypes::NUMERIC, true, 8);

		$tMap->addColumn('CORAJU', 'Coraju', 'double', CreoleTypes::NUMERIC, true, 8);

		$tMap->addColumn('CODPRO', 'Codpro', 'double', CreoleTypes::NUMERIC, false, 8);

		$tMap->addColumn('PROFORM', 'Proform', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CORFACCONT', 'Corfaccont', 'double', CreoleTypes::NUMERIC, true, 10);

		$tMap->addColumn('CODPRGD', 'Codprgd', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addColumn('CONPAGD_ID', 'ConpagdId', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('CORPREROT', 'Corprerot', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('CORPREPAT', 'Corprepat', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('BLONUMFAC', 'Blonumfac', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('CORANTCLI', 'Corantcli', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addForeignKey('FATIPMOV_ID', 'FatipmovId', 'int', CreoleTypes::INTEGER, 'fatipmov', 'ID', true, null);

		$tMap->addColumn('FIRPREP1', 'Firprep1', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CARPREP1', 'Carprep1', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('FIRPREP2', 'Firprep2', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CARPREP2', 'Carprep2', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('FIRPREP3', 'Firprep3', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CARPREP3', 'Carprep3', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('NOMREPPRE', 'Nomreppre', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('COSMANOBR', 'Cosmanobr', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PORGASADM', 'Porgasadm', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PORUTILID', 'Porutilid', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PORCARFAB', 'Porcarfab', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addForeignKey('FATIPMOV_DEB_ID', 'FatipmovDebId', 'int', CreoleTypes::INTEGER, 'fatipmov', 'ID', true, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 