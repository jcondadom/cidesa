<?php



class HcregmedlabMapBuilder {

	
	const CLASS_NAME = 'lib.model.hcm.map.HcregmedlabMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('hcregmedlab');
		$tMap->setPhpName('Hcregmedlab');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('hcregmedlab_SEQ');

		$tMap->addColumn('CODMEDLAB', 'Codmedlab', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('NOMMEDLAB', 'Nommedlab', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('TIPMEDLAB', 'Tipmedlab', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ESPMEDLAB', 'Espmedlab', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DIRMEDLAB', 'Dirmedlab', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('TELMEDLAB', 'Telmedlab', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 