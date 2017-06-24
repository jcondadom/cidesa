<?php



class ContatitMapBuilder {

	
	const CLASS_NAME = 'lib.model.contabilidad.map.ContatitMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('contatit');
		$tMap->setPhpName('Contatit');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('contatit_SEQ');

		$tMap->addColumn('CODTIT', 'Codtit', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESTIT', 'Destit', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addColumn('ORDTIT', 'Ordtit', 'double', CreoleTypes::NUMERIC, true, 2);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 