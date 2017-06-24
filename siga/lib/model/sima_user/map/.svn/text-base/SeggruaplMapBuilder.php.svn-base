<?php



class SeggruaplMapBuilder {

	
	const CLASS_NAME = 'lib.model.sima_user.map.SeggruaplMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('seggruapl');
		$tMap->setPhpName('Seggruapl');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('seggruapl_SEQ');

		$tMap->addForeignKey('CODGRU', 'Codgru', 'string', CreoleTypes::VARCHAR, 'seggrupo', 'CODGRU', true, 3);

		$tMap->addColumn('CODAPL', 'Codapl', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('NOMOPC', 'Nomopc', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('PRIUSE', 'Priuse', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('DESOPC', 'Desopc', 'string', CreoleTypes::VARCHAR, false, 2500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 