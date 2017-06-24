<?php



class LidetactcroentMapBuilder {

	
	const CLASS_NAME = 'lib.model.licitaciones.map.LidetactcroentMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('lidetactcroent');
		$tMap->setPhpName('Lidetactcroent');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('lidetactcroent_SEQ');

		$tMap->addForeignKey('NUMSOLPAG', 'Numsolpag', 'string', CreoleTypes::VARCHAR, 'lisolpag', 'NUMSOLPAG', false, 8);

		$tMap->addForeignKey('NUMACT', 'Numact', 'string', CreoleTypes::VARCHAR, 'liactas', 'NUMACT', false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 