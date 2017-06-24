<?php



class FamantartraMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FamantartraMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('famantartra');
		$tMap->setPhpName('Famantartra');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('famantartra_SEQ');

		$tMap->addColumn('REFTAR', 'Reftar', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODMAN', 'Codman', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('HORPLA', 'Horpla', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('HOREJE', 'Horeje', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 