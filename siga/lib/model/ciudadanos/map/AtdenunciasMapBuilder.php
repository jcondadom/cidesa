<?php



class AtdenunciasMapBuilder {

	
	const CLASS_NAME = 'lib.model.ciudadanos.map.AtdenunciasMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('atdenuncias');
		$tMap->setPhpName('Atdenuncias');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('atdenuncias_SEQ');

		$tMap->addColumn('NROEXP', 'Nroexp', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addForeignKey('ATCIUDADANO_ID', 'AtciudadanoId', 'int', CreoleTypes::INTEGER, 'atciudadano', 'ID', false, null);

		$tMap->addColumn('ATSOLICI', 'Atsolici', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('DESDEN', 'Desden', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addColumn('TELEFONO', 'Telefono', 'string', CreoleTypes::VARCHAR, false, 60);

		$tMap->addForeignKey('ATUNIDADES_ID', 'AtunidadesId', 'int', CreoleTypes::INTEGER, 'atunidades', 'ID', false, null);

		$tMap->addColumn('PERSONA', 'Persona', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('RESPUESTA', 'Respuesta', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('FECHAA', 'Fechaa', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECHAR', 'Fechar', 'int', CreoleTypes::DATE, false, null);

		$tMap->addForeignKey('ATTIPSOL_ID', 'AttipsolId', 'int', CreoleTypes::INTEGER, 'attipsol', 'ID', false, null);

		$tMap->addForeignKey('ATINSREFIER_ID', 'AtinsrefierId', 'int', CreoleTypes::INTEGER, 'atinsrefier', 'ID', false, null);

		$tMap->addForeignKey('ATESTAYU_ID', 'AtestayuId', 'int', CreoleTypes::INTEGER, 'atestayu', 'ID', false, null);

		$tMap->addColumn('USUCRE', 'Usucre', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('USUMOD', 'Usumod', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 