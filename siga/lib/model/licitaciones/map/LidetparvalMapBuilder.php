<?php



class LidetparvalMapBuilder {

	
	const CLASS_NAME = 'lib.model.licitaciones.map.LidetparvalMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('lidetparval');
		$tMap->setPhpName('Lidetparval');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('lidetparval_SEQ');

		$tMap->addForeignKey('NUMVAL', 'Numval', 'string', CreoleTypes::VARCHAR, 'livaluaciones', 'NUMVAL', false, 8);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('UNIMED', 'Unimed', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CANTID', 'Cantid', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PREUNI', 'Preuni', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONREC', 'Monrec', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('SUBTOT', 'Subtot', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CANTIDVALU', 'Cantidvalu', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('SUBTOTVALU', 'Subtotvalu', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('APROBADO', 'Aprobado', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addForeignKey('LIREGCONDET_ID', 'LiregcondetId', 'int', CreoleTypes::INTEGER, 'liregcondet', 'ID', false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 