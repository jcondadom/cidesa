<?php



class LidetactpenMapBuilder {

	
	const CLASS_NAME = 'lib.model.licitaciones.map.LidetactpenMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('lidetactpen');
		$tMap->setPhpName('Lidetactpen');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('lidetactpen_SEQ');

		$tMap->addForeignKey('NUMPEN', 'Numpen', 'string', CreoleTypes::VARCHAR, 'lipenalizaciones', 'NUMPEN', false, 8);

		$tMap->addForeignKey('NUMACT', 'Numact', 'string', CreoleTypes::VARCHAR, 'liactas', 'NUMACT', false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 