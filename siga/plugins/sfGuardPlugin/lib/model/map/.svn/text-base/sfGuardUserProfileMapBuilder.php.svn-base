<?php



class sfGuardUserProfileMapBuilder {

	
	const CLASS_NAME = 'plugins.sfGuardPlugin.lib.model.map.sfGuardUserProfileMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('sf_guard_user_profile');
		$tMap->setPhpName('sfGuardUserProfile');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('sf_guard_user_profile_SEQ');

		$tMap->addForeignKey('USER_ID', 'UserId', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', true, null);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, false, 80);

		$tMap->addColumn('INFORMATION', 'Information', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('FULLNAME', 'Fullname', 'string', CreoleTypes::VARCHAR, false, 80);

		$tMap->addColumn('INSTITUTION', 'Institution', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('PAIS', 'Pais', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('COMENTARIO', 'Comentario', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('VALIDATE', 'Validate', 'string', CreoleTypes::VARCHAR, false, 33);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 