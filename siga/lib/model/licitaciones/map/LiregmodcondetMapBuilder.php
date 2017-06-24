<?php



class LiregmodcondetMapBuilder {

	
	const CLASS_NAME = 'lib.model.licitaciones.map.LiregmodcondetMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('liregmodcondet');
		$tMap->setPhpName('Liregmodcondet');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('liregmodcondet_SEQ');

		$tMap->addForeignKey('NUMMOD', 'Nummod', 'string', CreoleTypes::VARCHAR, 'limodcont', 'NUMMOD', false, 8);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('UNIMED', 'Unimed', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CANTID', 'Cantid', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PREUNI', 'Preuni', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONREC', 'Monrec', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CANTIDAUM', 'Cantidaum', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CANTIDDIS', 'Cantiddis', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PREUNIREC', 'Preunirec', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONRECREC', 'Monrecrec', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CANTIDADD', 'Cantidadd', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PREUNIADD', 'Preuniadd', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONRECADD', 'Monrecadd', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CANTIDTOT', 'Cantidtot', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('SUBTOT', 'Subtot', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TIPCONPUB', 'Tipconpub', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ELIMINADA', 'Eliminada', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addForeignKey('LIREGCONDET_ID', 'LiregcondetId', 'int', CreoleTypes::INTEGER, 'liregcondet', 'ID', false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 