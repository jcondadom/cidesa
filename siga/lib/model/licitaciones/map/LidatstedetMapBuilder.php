<?php



class LidatstedetMapBuilder {

	
	const CLASS_NAME = 'lib.model.licitaciones.map.LidatstedetMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('lidatstedet');
		$tMap->setPhpName('Lidatstedet');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('lidatstedet_SEQ');

		$tMap->addColumn('CODUNISTE', 'Coduniste', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('NOMEMP', 'Nomemp', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('NOMCAR', 'Nomcar', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('RESOLU', 'Resolu', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FECRES', 'Fecres', 'int', CreoleTypes::DATE, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 