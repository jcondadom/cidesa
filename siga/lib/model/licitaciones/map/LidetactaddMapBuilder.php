<?php



class LidetactaddMapBuilder {

	
	const CLASS_NAME = 'lib.model.licitaciones.map.LidetactaddMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('lidetactadd');
		$tMap->setPhpName('Lidetactadd');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('lidetactadd_SEQ');

		$tMap->addForeignKey('NUMADD', 'Numadd', 'string', CreoleTypes::VARCHAR, 'liaddendum', 'NUMADD', false, 8);

		$tMap->addForeignKey('NUMACT', 'Numact', 'string', CreoleTypes::VARCHAR, 'liactas', 'NUMACT', false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 