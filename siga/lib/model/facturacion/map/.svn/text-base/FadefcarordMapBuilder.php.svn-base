<?php



class FadefcarordMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FadefcarordMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fadefcarord');
		$tMap->setPhpName('Fadefcarord');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fadefcarord_SEQ');

		$tMap->addColumn('NIVFAM', 'Nivfam', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addForeignKey('CODPRG', 'Codprg', 'string', CreoleTypes::VARCHAR, 'fadefprg', 'CODPRG', false, 6);

		$tMap->addForeignKey('CONPAGPRE_ID', 'ConpagpreId', 'int', CreoleTypes::INTEGER, 'faconpag', 'ID', false, null);

		$tMap->addForeignKey('CONPAGPED_ID', 'ConpagpedId', 'int', CreoleTypes::INTEGER, 'faconpag', 'ID', false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 