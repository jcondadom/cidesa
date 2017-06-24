<?php



class DetpublicMapBuilder {

	
	const CLASS_NAME = 'lib.model.sima_user.map.DetpublicMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('detpublic');
		$tMap->setPhpName('Detpublic');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('detpublic_SEQ');

		$tMap->addColumn('TITPUB', 'Titpub', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DESPUB', 'Despub', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('LINKPUB', 'Linkpub', 'string', CreoleTypes::VARCHAR, false, 200);

		$tMap->addColumn('ID_PUB', 'IdPub', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::VARCHAR, true, null);

	} 
} 