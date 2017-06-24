<?php



class CarefcruartMapBuilder {

	
	const CLASS_NAME = 'lib.model.compras.map.CarefcruartMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('carefcruart');
		$tMap->setPhpName('Carefcruart');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('carefcruart_SEQ');

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('STCCOD', 'Stccod', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('REFERE', 'Refere', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 