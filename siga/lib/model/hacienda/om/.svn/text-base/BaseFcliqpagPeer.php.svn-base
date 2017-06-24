<?php


abstract class BaseFcliqpagPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcliqpag';

	
	const CLASS_DEFAULT = 'lib.model.hacienda.Fcliqpag';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMLIQ = 'fcliqpag.NUMLIQ';

	
	const FECLIQ = 'fcliqpag.FECLIQ';

	
	const CTABAN = 'fcliqpag.CTABAN';

	
	const NRODEP = 'fcliqpag.NRODEP';

	
	const CODTIP = 'fcliqpag.CODTIP';

	
	const DESLIQ = 'fcliqpag.DESLIQ';

	
	const MONLIQ = 'fcliqpag.MONLIQ';

	
	const ID = 'fcliqpag.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numliq', 'Fecliq', 'Ctaban', 'Nrodep', 'Codtip', 'Desliq', 'Monliq', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcliqpagPeer::NUMLIQ, FcliqpagPeer::FECLIQ, FcliqpagPeer::CTABAN, FcliqpagPeer::NRODEP, FcliqpagPeer::CODTIP, FcliqpagPeer::DESLIQ, FcliqpagPeer::MONLIQ, FcliqpagPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numliq', 'fecliq', 'ctaban', 'nrodep', 'codtip', 'desliq', 'monliq', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numliq' => 0, 'Fecliq' => 1, 'Ctaban' => 2, 'Nrodep' => 3, 'Codtip' => 4, 'Desliq' => 5, 'Monliq' => 6, 'Id' => 7, ),
		BasePeer::TYPE_COLNAME => array (FcliqpagPeer::NUMLIQ => 0, FcliqpagPeer::FECLIQ => 1, FcliqpagPeer::CTABAN => 2, FcliqpagPeer::NRODEP => 3, FcliqpagPeer::CODTIP => 4, FcliqpagPeer::DESLIQ => 5, FcliqpagPeer::MONLIQ => 6, FcliqpagPeer::ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('numliq' => 0, 'fecliq' => 1, 'ctaban' => 2, 'nrodep' => 3, 'codtip' => 4, 'desliq' => 5, 'monliq' => 6, 'id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hacienda/map/FcliqpagMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hacienda.map.FcliqpagMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcliqpagPeer::getTableMap();
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
		return str_replace(FcliqpagPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcliqpagPeer::NUMLIQ);

		$criteria->addSelectColumn(FcliqpagPeer::FECLIQ);

		$criteria->addSelectColumn(FcliqpagPeer::CTABAN);

		$criteria->addSelectColumn(FcliqpagPeer::NRODEP);

		$criteria->addSelectColumn(FcliqpagPeer::CODTIP);

		$criteria->addSelectColumn(FcliqpagPeer::DESLIQ);

		$criteria->addSelectColumn(FcliqpagPeer::MONLIQ);

		$criteria->addSelectColumn(FcliqpagPeer::ID);

	}

	const COUNT = 'COUNT(fcliqpag.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcliqpag.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcliqpagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcliqpagPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcliqpagPeer::doSelectRS($criteria, $con);
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
		$objects = FcliqpagPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcliqpagPeer::populateObjects(FcliqpagPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcliqpagPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcliqpagPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinTstipmov(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcliqpagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcliqpagPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FcliqpagPeer::CODTIP, TstipmovPeer::CODTIP);

		$rs = FcliqpagPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinTstipmov(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FcliqpagPeer::addSelectColumns($c);
		$startcol = (FcliqpagPeer::NUM_COLUMNS - FcliqpagPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		TstipmovPeer::addSelectColumns($c);

		$c->addJoin(FcliqpagPeer::CODTIP, TstipmovPeer::CODTIP);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FcliqpagPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TstipmovPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getTstipmov(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addFcliqpag($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initFcliqpags();
				$obj2->addFcliqpag($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcliqpagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcliqpagPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(FcliqpagPeer::CODTIP, TstipmovPeer::CODTIP);
	
		$rs = FcliqpagPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FcliqpagPeer::addSelectColumns($c);
		$startcol2 = (FcliqpagPeer::NUM_COLUMNS - FcliqpagPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			TstipmovPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + TstipmovPeer::NUM_COLUMNS;
	
			$c->addJoin(FcliqpagPeer::CODTIP, TstipmovPeer::CODTIP);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FcliqpagPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = TstipmovPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getTstipmov(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addFcliqpag($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initFcliqpags();
					$obj2->addFcliqpag($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}

	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return FcliqpagPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FcliqpagPeer::ID); 

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
			$comparison = $criteria->getComparison(FcliqpagPeer::ID);
			$selectCriteria->add(FcliqpagPeer::ID, $criteria->remove(FcliqpagPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcliqpagPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcliqpagPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcliqpag) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcliqpagPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcliqpag $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcliqpagPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcliqpagPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcliqpagPeer::DATABASE_NAME, FcliqpagPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcliqpagPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcliqpagPeer::DATABASE_NAME);

		$criteria->add(FcliqpagPeer::ID, $pk);


		$v = FcliqpagPeer::doSelect($criteria, $con);

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
			$criteria->add(FcliqpagPeer::ID, $pks, Criteria::IN);
			$objs = FcliqpagPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcliqpagPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hacienda/map/FcliqpagMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hacienda.map.FcliqpagMapBuilder');
}
