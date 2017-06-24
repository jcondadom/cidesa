<?php



class LidetactsolpagMapBuilder {

	
	const CLASS_NAME = 'lib.model.licitaciones.map.LidetactsolpagMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('lidetactsolpag');
		$tMap->setPhpName('Lidetactsolpag');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('lidetactsolpag_SEQ');

		$tMap->addForeignKey('NUMSOLPAG', 'Numsolpag', 'string', CreoleTypes::VARCHAR, 'lisolpag', 'NUMSOLPAG', false, 8);

		$tMap->addForeignKey('NUMACT', 'Numact', 'string', CreoleTypes::VARCHAR, 'liactas', 'NUMACT', false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 