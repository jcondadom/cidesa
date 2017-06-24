<?php



class LidefempMapBuilder {

	
	const CLASS_NAME = 'lib.model.licitaciones.map.LidefempMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('lidefemp');
		$tMap->setPhpName('Lidefemp');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('lidefemp_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('NOMEMP', 'Nomemp', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('DIREMP', 'Diremp', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('TELEMP', 'Telemp', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('FAXEMP', 'Faxemp', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('EMAEMP', 'Emaemp', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('UNITRI', 'Unitri', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PTOCTA', 'Ptocta', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PREBAS', 'Prebas', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('EXPDIE', 'Expdie', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('NUMEMO', 'Numemo', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('SOLEGR', 'Solegr', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('COMINT', 'Comint', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PLIEGO', 'Pliego', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('ACLARA', 'Aclara', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('OFERTA', 'Oferta', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('ANAOFE', 'Anaofe', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('RECOME', 'Recome', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PTOCUECON', 'Ptocuecon', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('NOTIFI', 'Notifi', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('NUMDEC', 'Numdec', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('CONTRAT', 'Contrat', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('ORDCOM', 'Ordcom', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('ENTREGAS', 'Entregas', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('ANAEMP', 'Anaemp', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PENALIZACIONES', 'Penalizaciones', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('ACTDESCONT', 'Actdescont', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('OBPTOCTA', 'Obptocta', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('OBPREBAS', 'Obprebas', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('OBEXPDIE', 'Obexpdie', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('OBNUMEMO', 'Obnumemo', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('OBSOLEGR', 'Obsolegr', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('OBPLIEGO', 'Obpliego', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('OBACLARA', 'Obaclara', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('OBOFERTA', 'Oboferta', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('OBANAOFE', 'Obanaofe', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('OBRECOME', 'Obrecome', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('OBPTOCUECON', 'Obptocuecon', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('OBNOTIFI', 'Obnotifi', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('OBNUMDEC', 'Obnumdec', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('OBCONTRAT', 'Obcontrat', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('OBACTAS', 'Obactas', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('OBVALUACIONES', 'Obvaluaciones', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('OBINSPECCIONES', 'Obinspecciones', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('OBSOLPAG', 'Obsolpag', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('OBENTREGAS', 'Obentregas', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('OBANAEMP', 'Obanaemp', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('OBPENALIZACIONES', 'Obpenalizaciones', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('OBACTDESCONT', 'Obactdescont', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('OBMODCONT', 'Obmodcont', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('OBADDENDUM', 'Obaddendum', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('CODIFILI', 'Codifili', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CODIFIOB', 'Codifiob', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 