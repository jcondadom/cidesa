<?php



class LidetparinsMapBuilder {

	
	const CLASS_NAME = 'lib.model.licitaciones.map.LidetparinsMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('lidetparins');
		$tMap->setPhpName('Lidetparins');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('lidetparins_SEQ');

		$tMap->addForeignKey('NUMINS', 'Numins', 'string', CreoleTypes::VARCHAR, 'liinspecciones', 'NUMINS', false, 8);

		$tMap->addForeignKey('LIDETPARVAL_ID', 'LidetparvalId', 'int', CreoleTypes::INTEGER, 'lidetparval', 'ID', false, null);

		$tMap->addColumn('CANTIDINS', 'Cantidins', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('SUBTOTINS', 'Subtotins', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('APROBADO', 'Aprobado', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 