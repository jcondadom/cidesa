<?php



class ViaciuenteMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ViaciuenteMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap('');

		$tMap = $this->dbMap->addTable('viaciuente');
		$tMap->setPhpName('Viaciuente');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('viaciuente_SEQ');

		$tMap->addColumn('OCCIUDAD_ID', 'OcciudadId', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addForeignKey('VIAREGENTE_ID', 'ViaregenteId', 'int', CreoleTypes::INTEGER, 'viaregente', 'ID', false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 