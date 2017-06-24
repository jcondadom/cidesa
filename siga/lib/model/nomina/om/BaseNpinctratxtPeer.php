<?php


abstract class BaseNpinctratxtPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npinctratxt';

	
	const CLASS_DEFAULT = 'lib.model.nomina.Npinctratxt';

	
	const NUM_COLUMNS = 37;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const FECINC = 'npinctratxt.FECINC';

	
	const STATUS = 'npinctratxt.STATUS';

	
	const TIPREG = 'npinctratxt.TIPREG';

	
	const NACEMP = 'npinctratxt.NACEMP';

	
	const CEDEMP = 'npinctratxt.CEDEMP';

	
	const PRIAPE = 'npinctratxt.PRIAPE';

	
	const SEGAPE = 'npinctratxt.SEGAPE';

	
	const PRINOM = 'npinctratxt.PRINOM';

	
	const SEGNOM = 'npinctratxt.SEGNOM';

	
	const FECNAC = 'npinctratxt.FECNAC';

	
	const MONING = 'npinctratxt.MONING';

	
	const FECING = 'npinctratxt.FECING';

	
	const ACTECO = 'npinctratxt.ACTECO';

	
	const CARGO = 'npinctratxt.CARGO';

	
	const SEXO = 'npinctratxt.SEXO';

	
	const ESTCIV = 'npinctratxt.ESTCIV';

	
	const URBANI = 'npinctratxt.URBANI';

	
	const AVENID = 'npinctratxt.AVENID';

	
	const CONJUN = 'npinctratxt.CONJUN';

	
	const NUMERO = 'npinctratxt.NUMERO';

	
	const CIUDAD = 'npinctratxt.CIUDAD';

	
	const ESTADO = 'npinctratxt.ESTADO';

	
	const PAIS = 'npinctratxt.PAIS';

	
	const TELEFONO = 'npinctratxt.TELEFONO';

	
	const FAX = 'npinctratxt.FAX';

	
	const CELULAR = 'npinctratxt.CELULAR';

	
	const INTERNET = 'npinctratxt.INTERNET';

	
	const ZONPOS = 'npinctratxt.ZONPOS';

	
	const ACCION = 'npinctratxt.ACCION';

	
	const TIPEMP = 'npinctratxt.TIPEMP';

	
	const CODARE = 'npinctratxt.CODARE';

	
	const TELTRAB = 'npinctratxt.TELTRAB';

	
	const TIPCUEN = 'npinctratxt.TIPCUEN';

	
	const CODOFI = 'npinctratxt.CODOFI';

	
	const NUMCUE = 'npinctratxt.NUMCUE';

	
	const FILLER = 'npinctratxt.FILLER';

	
	const ID = 'npinctratxt.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Fecinc', 'Status', 'Tipreg', 'Nacemp', 'Cedemp', 'Priape', 'Segape', 'Prinom', 'Segnom', 'Fecnac', 'Moning', 'Fecing', 'Acteco', 'Cargo', 'Sexo', 'Estciv', 'Urbani', 'Avenid', 'Conjun', 'Numero', 'Ciudad', 'Estado', 'Pais', 'Telefono', 'Fax', 'Celular', 'Internet', 'Zonpos', 'Accion', 'Tipemp', 'Codare', 'Teltrab', 'Tipcuen', 'Codofi', 'Numcue', 'Filler', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpinctratxtPeer::FECINC, NpinctratxtPeer::STATUS, NpinctratxtPeer::TIPREG, NpinctratxtPeer::NACEMP, NpinctratxtPeer::CEDEMP, NpinctratxtPeer::PRIAPE, NpinctratxtPeer::SEGAPE, NpinctratxtPeer::PRINOM, NpinctratxtPeer::SEGNOM, NpinctratxtPeer::FECNAC, NpinctratxtPeer::MONING, NpinctratxtPeer::FECING, NpinctratxtPeer::ACTECO, NpinctratxtPeer::CARGO, NpinctratxtPeer::SEXO, NpinctratxtPeer::ESTCIV, NpinctratxtPeer::URBANI, NpinctratxtPeer::AVENID, NpinctratxtPeer::CONJUN, NpinctratxtPeer::NUMERO, NpinctratxtPeer::CIUDAD, NpinctratxtPeer::ESTADO, NpinctratxtPeer::PAIS, NpinctratxtPeer::TELEFONO, NpinctratxtPeer::FAX, NpinctratxtPeer::CELULAR, NpinctratxtPeer::INTERNET, NpinctratxtPeer::ZONPOS, NpinctratxtPeer::ACCION, NpinctratxtPeer::TIPEMP, NpinctratxtPeer::CODARE, NpinctratxtPeer::TELTRAB, NpinctratxtPeer::TIPCUEN, NpinctratxtPeer::CODOFI, NpinctratxtPeer::NUMCUE, NpinctratxtPeer::FILLER, NpinctratxtPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('fecinc', 'status', 'tipreg', 'nacemp', 'cedemp', 'priape', 'segape', 'prinom', 'segnom', 'fecnac', 'moning', 'fecing', 'acteco', 'cargo', 'sexo', 'estciv', 'urbani', 'avenid', 'conjun', 'numero', 'ciudad', 'estado', 'pais', 'telefono', 'fax', 'celular', 'internet', 'zonpos', 'accion', 'tipemp', 'codare', 'teltrab', 'tipcuen', 'codofi', 'numcue', 'filler', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Fecinc' => 0, 'Status' => 1, 'Tipreg' => 2, 'Nacemp' => 3, 'Cedemp' => 4, 'Priape' => 5, 'Segape' => 6, 'Prinom' => 7, 'Segnom' => 8, 'Fecnac' => 9, 'Moning' => 10, 'Fecing' => 11, 'Acteco' => 12, 'Cargo' => 13, 'Sexo' => 14, 'Estciv' => 15, 'Urbani' => 16, 'Avenid' => 17, 'Conjun' => 18, 'Numero' => 19, 'Ciudad' => 20, 'Estado' => 21, 'Pais' => 22, 'Telefono' => 23, 'Fax' => 24, 'Celular' => 25, 'Internet' => 26, 'Zonpos' => 27, 'Accion' => 28, 'Tipemp' => 29, 'Codare' => 30, 'Teltrab' => 31, 'Tipcuen' => 32, 'Codofi' => 33, 'Numcue' => 34, 'Filler' => 35, 'Id' => 36, ),
		BasePeer::TYPE_COLNAME => array (NpinctratxtPeer::FECINC => 0, NpinctratxtPeer::STATUS => 1, NpinctratxtPeer::TIPREG => 2, NpinctratxtPeer::NACEMP => 3, NpinctratxtPeer::CEDEMP => 4, NpinctratxtPeer::PRIAPE => 5, NpinctratxtPeer::SEGAPE => 6, NpinctratxtPeer::PRINOM => 7, NpinctratxtPeer::SEGNOM => 8, NpinctratxtPeer::FECNAC => 9, NpinctratxtPeer::MONING => 10, NpinctratxtPeer::FECING => 11, NpinctratxtPeer::ACTECO => 12, NpinctratxtPeer::CARGO => 13, NpinctratxtPeer::SEXO => 14, NpinctratxtPeer::ESTCIV => 15, NpinctratxtPeer::URBANI => 16, NpinctratxtPeer::AVENID => 17, NpinctratxtPeer::CONJUN => 18, NpinctratxtPeer::NUMERO => 19, NpinctratxtPeer::CIUDAD => 20, NpinctratxtPeer::ESTADO => 21, NpinctratxtPeer::PAIS => 22, NpinctratxtPeer::TELEFONO => 23, NpinctratxtPeer::FAX => 24, NpinctratxtPeer::CELULAR => 25, NpinctratxtPeer::INTERNET => 26, NpinctratxtPeer::ZONPOS => 27, NpinctratxtPeer::ACCION => 28, NpinctratxtPeer::TIPEMP => 29, NpinctratxtPeer::CODARE => 30, NpinctratxtPeer::TELTRAB => 31, NpinctratxtPeer::TIPCUEN => 32, NpinctratxtPeer::CODOFI => 33, NpinctratxtPeer::NUMCUE => 34, NpinctratxtPeer::FILLER => 35, NpinctratxtPeer::ID => 36, ),
		BasePeer::TYPE_FIELDNAME => array ('fecinc' => 0, 'status' => 1, 'tipreg' => 2, 'nacemp' => 3, 'cedemp' => 4, 'priape' => 5, 'segape' => 6, 'prinom' => 7, 'segnom' => 8, 'fecnac' => 9, 'moning' => 10, 'fecing' => 11, 'acteco' => 12, 'cargo' => 13, 'sexo' => 14, 'estciv' => 15, 'urbani' => 16, 'avenid' => 17, 'conjun' => 18, 'numero' => 19, 'ciudad' => 20, 'estado' => 21, 'pais' => 22, 'telefono' => 23, 'fax' => 24, 'celular' => 25, 'internet' => 26, 'zonpos' => 27, 'accion' => 28, 'tipemp' => 29, 'codare' => 30, 'teltrab' => 31, 'tipcuen' => 32, 'codofi' => 33, 'numcue' => 34, 'filler' => 35, 'id' => 36, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NpinctratxtMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NpinctratxtMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpinctratxtPeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(NpinctratxtPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpinctratxtPeer::FECINC);

		$criteria->addSelectColumn(NpinctratxtPeer::STATUS);

		$criteria->addSelectColumn(NpinctratxtPeer::TIPREG);

		$criteria->addSelectColumn(NpinctratxtPeer::NACEMP);

		$criteria->addSelectColumn(NpinctratxtPeer::CEDEMP);

		$criteria->addSelectColumn(NpinctratxtPeer::PRIAPE);

		$criteria->addSelectColumn(NpinctratxtPeer::SEGAPE);

		$criteria->addSelectColumn(NpinctratxtPeer::PRINOM);

		$criteria->addSelectColumn(NpinctratxtPeer::SEGNOM);

		$criteria->addSelectColumn(NpinctratxtPeer::FECNAC);

		$criteria->addSelectColumn(NpinctratxtPeer::MONING);

		$criteria->addSelectColumn(NpinctratxtPeer::FECING);

		$criteria->addSelectColumn(NpinctratxtPeer::ACTECO);

		$criteria->addSelectColumn(NpinctratxtPeer::CARGO);

		$criteria->addSelectColumn(NpinctratxtPeer::SEXO);

		$criteria->addSelectColumn(NpinctratxtPeer::ESTCIV);

		$criteria->addSelectColumn(NpinctratxtPeer::URBANI);

		$criteria->addSelectColumn(NpinctratxtPeer::AVENID);

		$criteria->addSelectColumn(NpinctratxtPeer::CONJUN);

		$criteria->addSelectColumn(NpinctratxtPeer::NUMERO);

		$criteria->addSelectColumn(NpinctratxtPeer::CIUDAD);

		$criteria->addSelectColumn(NpinctratxtPeer::ESTADO);

		$criteria->addSelectColumn(NpinctratxtPeer::PAIS);

		$criteria->addSelectColumn(NpinctratxtPeer::TELEFONO);

		$criteria->addSelectColumn(NpinctratxtPeer::FAX);

		$criteria->addSelectColumn(NpinctratxtPeer::CELULAR);

		$criteria->addSelectColumn(NpinctratxtPeer::INTERNET);

		$criteria->addSelectColumn(NpinctratxtPeer::ZONPOS);

		$criteria->addSelectColumn(NpinctratxtPeer::ACCION);

		$criteria->addSelectColumn(NpinctratxtPeer::TIPEMP);

		$criteria->addSelectColumn(NpinctratxtPeer::CODARE);

		$criteria->addSelectColumn(NpinctratxtPeer::TELTRAB);

		$criteria->addSelectColumn(NpinctratxtPeer::TIPCUEN);

		$criteria->addSelectColumn(NpinctratxtPeer::CODOFI);

		$criteria->addSelectColumn(NpinctratxtPeer::NUMCUE);

		$criteria->addSelectColumn(NpinctratxtPeer::FILLER);

		$criteria->addSelectColumn(NpinctratxtPeer::ID);

	}

	const COUNT = 'COUNT(npinctratxt.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npinctratxt.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpinctratxtPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpinctratxtPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpinctratxtPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = NpinctratxtPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpinctratxtPeer::populateObjects(NpinctratxtPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpinctratxtPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpinctratxtPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return NpinctratxtPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpinctratxtPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(NpinctratxtPeer::ID);
			$selectCriteria->add(NpinctratxtPeer::ID, $criteria->remove(NpinctratxtPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(NpinctratxtPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(NpinctratxtPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npinctratxt) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpinctratxtPeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(Npinctratxt $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpinctratxtPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpinctratxtPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(NpinctratxtPeer::DATABASE_NAME, NpinctratxtPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpinctratxtPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(NpinctratxtPeer::DATABASE_NAME);

		$criteria->add(NpinctratxtPeer::ID, $pk);


		$v = NpinctratxtPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(NpinctratxtPeer::ID, $pks, Criteria::IN);
			$objs = NpinctratxtPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpinctratxtPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NpinctratxtMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NpinctratxtMapBuilder');
}
