<?php



class LidetactactdescontMapBuilder {

	
	const CLASS_NAME = 'lib.model.licitaciones.map.LidetactactdescontMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('lidetactactdescont');
		$tMap->setPhpName('Lidetactactdescont');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('lidetactactdescont_SEQ');

		$tMap->addForeignKey('NUMACTDES', 'Numactdes', 'string', CreoleTypes::VARCHAR, 'liactdescont', 'NUMACTDES', false, 8);

		$tMap->addForeignKey('NUMACT', 'Numact', 'string', CreoleTypes::VARCHAR, 'liactas', 'NUMACT', false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 