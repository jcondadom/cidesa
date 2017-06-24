<?php



class LidetactmodMapBuilder {

	
	const CLASS_NAME = 'lib.model.licitaciones.map.LidetactmodMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('lidetactmod');
		$tMap->setPhpName('Lidetactmod');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('lidetactmod_SEQ');

		$tMap->addForeignKey('NUMMOD', 'Nummod', 'string', CreoleTypes::VARCHAR, 'limodcont', 'NUMMOD', false, 8);

		$tMap->addForeignKey('NUMACT', 'Numact', 'string', CreoleTypes::VARCHAR, 'liactas', 'NUMACT', false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 