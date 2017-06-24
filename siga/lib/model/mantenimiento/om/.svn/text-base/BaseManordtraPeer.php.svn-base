<?php


abstract class BaseManordtraPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'manordtra';

	
	const CLASS_DEFAULT = 'lib.model.mantenimiento.Manordtra';

	
	const NUM_COLUMNS = 28;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMORD = 'manordtra.NUMORD';

	
	const NUMEQU = 'manordtra.NUMEQU';

	
	const REFEST = 'manordtra.REFEST';

	
	const FECEMI = 'manordtra.FECEMI';

	
	const CODACT = 'manordtra.CODACT';

	
	const PRIORI = 'manordtra.PRIORI';

	
	const CEDEMP = 'manordtra.CEDEMP';

	
	const CEDRES = 'manordtra.CEDRES';

	
	const CODTMA = 'manordtra.CODTMA';

	
	const DESORD = 'manordtra.DESORD';

	
	const TIPORD = 'manordtra.TIPORD';

	
	const CODART = 'manordtra.CODART';

	
	const INCREE = 'manordtra.INCREE';

	
	const CODSOR = 'manordtra.CODSOR';

	
	const CODGRR = 'manordtra.CODGRR';

	
	const CODSIS = 'manordtra.CODSIS';

	
	const CODSFA = 'manordtra.CODSFA';

	
	const CODDFA = 'manordtra.CODDFA';

	
	const CODCFA = 'manordtra.CODCFA';

	
	const PARFAL = 'manordtra.PARFAL';

	
	const FECICI = 'manordtra.FECICI';

	
	const FECCCI = 'manordtra.FECCCI';

	
	const CEDREC = 'manordtra.CEDREC';

	
	const VALHCI = 'manordtra.VALHCI';

	
	const DEMCIE = 'manordtra.DEMCIE';

	
	const CODCFC = 'manordtra.CODCFC';

	
	const OBSCIE = 'manordtra.OBSCIE';

	
	const ID = 'manordtra.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numord', 'Numequ', 'Refest', 'Fecemi', 'Codact', 'Priori', 'Cedemp', 'Cedres', 'Codtma', 'Desord', 'Tipord', 'Codart', 'Incree', 'Codsor', 'Codgrr', 'Codsis', 'Codsfa', 'Coddfa', 'Codcfa', 'Parfal', 'Fecici', 'Feccci', 'Cedrec', 'Valhci', 'Demcie', 'Codcfc', 'Obscie', 'Id', ),
		BasePeer::TYPE_COLNAME => array (ManordtraPeer::NUMORD, ManordtraPeer::NUMEQU, ManordtraPeer::REFEST, ManordtraPeer::FECEMI, ManordtraPeer::CODACT, ManordtraPeer::PRIORI, ManordtraPeer::CEDEMP, ManordtraPeer::CEDRES, ManordtraPeer::CODTMA, ManordtraPeer::DESORD, ManordtraPeer::TIPORD, ManordtraPeer::CODART, ManordtraPeer::INCREE, ManordtraPeer::CODSOR, ManordtraPeer::CODGRR, ManordtraPeer::CODSIS, ManordtraPeer::CODSFA, ManordtraPeer::CODDFA, ManordtraPeer::CODCFA, ManordtraPeer::PARFAL, ManordtraPeer::FECICI, ManordtraPeer::FECCCI, ManordtraPeer::CEDREC, ManordtraPeer::VALHCI, ManordtraPeer::DEMCIE, ManordtraPeer::CODCFC, ManordtraPeer::OBSCIE, ManordtraPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numord', 'numequ', 'refest', 'fecemi', 'codact', 'priori', 'cedemp', 'cedres', 'codtma', 'desord', 'tipord', 'codart', 'incree', 'codsor', 'codgrr', 'codsis', 'codsfa', 'coddfa', 'codcfa', 'parfal', 'fecici', 'feccci', 'cedrec', 'valhci', 'demcie', 'codcfc', 'obscie', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numord' => 0, 'Numequ' => 1, 'Refest' => 2, 'Fecemi' => 3, 'Codact' => 4, 'Priori' => 5, 'Cedemp' => 6, 'Cedres' => 7, 'Codtma' => 8, 'Desord' => 9, 'Tipord' => 10, 'Codart' => 11, 'Incree' => 12, 'Codsor' => 13, 'Codgrr' => 14, 'Codsis' => 15, 'Codsfa' => 16, 'Coddfa' => 17, 'Codcfa' => 18, 'Parfal' => 19, 'Fecici' => 20, 'Feccci' => 21, 'Cedrec' => 22, 'Valhci' => 23, 'Demcie' => 24, 'Codcfc' => 25, 'Obscie' => 26, 'Id' => 27, ),
		BasePeer::TYPE_COLNAME => array (ManordtraPeer::NUMORD => 0, ManordtraPeer::NUMEQU => 1, ManordtraPeer::REFEST => 2, ManordtraPeer::FECEMI => 3, ManordtraPeer::CODACT => 4, ManordtraPeer::PRIORI => 5, ManordtraPeer::CEDEMP => 6, ManordtraPeer::CEDRES => 7, ManordtraPeer::CODTMA => 8, ManordtraPeer::DESORD => 9, ManordtraPeer::TIPORD => 10, ManordtraPeer::CODART => 11, ManordtraPeer::INCREE => 12, ManordtraPeer::CODSOR => 13, ManordtraPeer::CODGRR => 14, ManordtraPeer::CODSIS => 15, ManordtraPeer::CODSFA => 16, ManordtraPeer::CODDFA => 17, ManordtraPeer::CODCFA => 18, ManordtraPeer::PARFAL => 19, ManordtraPeer::FECICI => 20, ManordtraPeer::FECCCI => 21, ManordtraPeer::CEDREC => 22, ManordtraPeer::VALHCI => 23, ManordtraPeer::DEMCIE => 24, ManordtraPeer::CODCFC => 25, ManordtraPeer::OBSCIE => 26, ManordtraPeer::ID => 27, ),
		BasePeer::TYPE_FIELDNAME => array ('numord' => 0, 'numequ' => 1, 'refest' => 2, 'fecemi' => 3, 'codact' => 4, 'priori' => 5, 'cedemp' => 6, 'cedres' => 7, 'codtma' => 8, 'desord' => 9, 'tipord' => 10, 'codart' => 11, 'incree' => 12, 'codsor' => 13, 'codgrr' => 14, 'codsis' => 15, 'codsfa' => 16, 'coddfa' => 17, 'codcfa' => 18, 'parfal' => 19, 'fecici' => 20, 'feccci' => 21, 'cedrec' => 22, 'valhci' => 23, 'demcie' => 24, 'codcfc' => 25, 'obscie' => 26, 'id' => 27, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/mantenimiento/map/ManordtraMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.mantenimiento.map.ManordtraMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ManordtraPeer::getTableMap();
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
		return str_replace(ManordtraPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ManordtraPeer::NUMORD);

		$criteria->addSelectColumn(ManordtraPeer::NUMEQU);

		$criteria->addSelectColumn(ManordtraPeer::REFEST);

		$criteria->addSelectColumn(ManordtraPeer::FECEMI);

		$criteria->addSelectColumn(ManordtraPeer::CODACT);

		$criteria->addSelectColumn(ManordtraPeer::PRIORI);

		$criteria->addSelectColumn(ManordtraPeer::CEDEMP);

		$criteria->addSelectColumn(ManordtraPeer::CEDRES);

		$criteria->addSelectColumn(ManordtraPeer::CODTMA);

		$criteria->addSelectColumn(ManordtraPeer::DESORD);

		$criteria->addSelectColumn(ManordtraPeer::TIPORD);

		$criteria->addSelectColumn(ManordtraPeer::CODART);

		$criteria->addSelectColumn(ManordtraPeer::INCREE);

		$criteria->addSelectColumn(ManordtraPeer::CODSOR);

		$criteria->addSelectColumn(ManordtraPeer::CODGRR);

		$criteria->addSelectColumn(ManordtraPeer::CODSIS);

		$criteria->addSelectColumn(ManordtraPeer::CODSFA);

		$criteria->addSelectColumn(ManordtraPeer::CODDFA);

		$criteria->addSelectColumn(ManordtraPeer::CODCFA);

		$criteria->addSelectColumn(ManordtraPeer::PARFAL);

		$criteria->addSelectColumn(ManordtraPeer::FECICI);

		$criteria->addSelectColumn(ManordtraPeer::FECCCI);

		$criteria->addSelectColumn(ManordtraPeer::CEDREC);

		$criteria->addSelectColumn(ManordtraPeer::VALHCI);

		$criteria->addSelectColumn(ManordtraPeer::DEMCIE);

		$criteria->addSelectColumn(ManordtraPeer::CODCFC);

		$criteria->addSelectColumn(ManordtraPeer::OBSCIE);

		$criteria->addSelectColumn(ManordtraPeer::ID);

	}

	const COUNT = 'COUNT(manordtra.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT manordtra.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ManordtraPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ManordtraPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ManordtraPeer::doSelectRS($criteria, $con);
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
		$objects = ManordtraPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ManordtraPeer::populateObjects(ManordtraPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ManordtraPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ManordtraPeer::getOMClass();
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
		return ManordtraPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ManordtraPeer::ID); 

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
			$comparison = $criteria->getComparison(ManordtraPeer::ID);
			$selectCriteria->add(ManordtraPeer::ID, $criteria->remove(ManordtraPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(ManordtraPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ManordtraPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Manordtra) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ManordtraPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Manordtra $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ManordtraPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ManordtraPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ManordtraPeer::DATABASE_NAME, ManordtraPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ManordtraPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ManordtraPeer::DATABASE_NAME);

		$criteria->add(ManordtraPeer::ID, $pk);


		$v = ManordtraPeer::doSelect($criteria, $con);

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
			$criteria->add(ManordtraPeer::ID, $pks, Criteria::IN);
			$objs = ManordtraPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseManordtraPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/mantenimiento/map/ManordtraMapBuilder.php';
	Propel::registerMapBuilder('lib.model.mantenimiento.map.ManordtraMapBuilder');
}
