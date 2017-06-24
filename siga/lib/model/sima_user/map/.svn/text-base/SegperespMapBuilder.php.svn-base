<?php



class SegperespMapBuilder {

	
	const CLASS_NAME = 'lib.model.sima_user.map.SegperespMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap('sima_user');

		$tMap = $this->dbMap->addTable('segperesp');
		$tMap->setPhpName('Segperesp');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('segperesp_SEQ');

		$tMap->addForeignKey('CEDEMP', 'Cedemp', 'string', CreoleTypes::VARCHAR, 'usuarios', 'CEDEMP', true, 10);

		$tMap->addColumn('PASUSE', 'Pasuse', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('PROCESO', 'Proceso', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('CODAPL', 'Codapl', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 