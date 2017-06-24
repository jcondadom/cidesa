<?php


abstract class BaseSeggruaplPeer {

	
	const DATABASE_NAME = 'sima_user';

	
	const TABLE_NAME = 'seggruapl';

	
	const CLASS_DEFAULT = 'lib.model.sima_user.Seggruapl';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODGRU = 'seggruapl.CODGRU';

	
	const CODAPL = 'seggruapl.CODAPL';

	
	const CODEMP = 'seggruapl.CODEMP';

	
	const NOMOPC = 'seggruapl.NOMOPC';

	
	const PRIUSE = 'seggruapl.PRIUSE';

	
	const DESOPC = 'seggruapl.DESOPC';

	
	const ID = 'seggruapl.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codgru', 'Codapl', 'Codemp', 'Nomopc', 'Priuse', 'Desopc', 'Id', ),
		BasePeer::TYPE_COLNAME => array (SeggruaplPeer::CODGRU, SeggruaplPeer::CODAPL, SeggruaplPeer::CODEMP, SeggruaplPeer::NOMOPC, SeggruaplPeer::PRIUSE, SeggruaplPeer::DESOPC, SeggruaplPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codgru', 'codapl', 'codemp', 'nomopc', 'priuse', 'desopc', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codgru' => 0, 'Codapl' => 1, 'Codemp' => 2, 'Nomopc' => 3, 'Priuse' => 4, 'Desopc' => 5, 'Id' => 6, ),
		BasePeer::TYPE_COLNAME => array (SeggruaplPeer::CODGRU => 0, SeggruaplPeer::CODAPL => 1, SeggruaplPeer::CODEMP => 2, SeggruaplPeer::NOMOPC => 3, SeggruaplPeer::PRIUSE => 4, SeggruaplPeer::DESOPC => 5, SeggruaplPeer::ID => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('codgru' => 0, 'codapl' => 1, 'codemp' => 2, 'nomopc' => 3, 'priuse' => 4, 'desopc' => 5, 'id' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/sima_user/map/SeggruaplMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.sima_user.map.SeggruaplMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = SeggruaplPeer::getTableMap();
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
		return str_replace(SeggruaplPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(SeggruaplPeer::CODGRU);

		$criteria->addSelectColumn(SeggruaplPeer::CODAPL);

		$criteria->addSelectColumn(SeggruaplPeer::CODEMP);

		$criteria->addSelectColumn(SeggruaplPeer::NOMOPC);

		$criteria->addSelectColumn(SeggruaplPeer::PRIUSE);

		$criteria->addSelectColumn(SeggruaplPeer::DESOPC);

		$criteria->addSelectColumn(SeggruaplPeer::ID);

	}

	const COUNT = 'COUNT(seggruapl.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT seggruapl.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SeggruaplPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SeggruaplPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = SeggruaplPeer::doSelectRS($criteria, $con);
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
		$objects = SeggruaplPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return SeggruaplPeer::populateObjects(SeggruaplPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			SeggruaplPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = SeggruaplPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinSeggrupo(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SeggruaplPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SeggruaplPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SeggruaplPeer::CODGRU, SeggrupoPeer::CODGRU);

		$rs = SeggruaplPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinSeggrupo(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SeggruaplPeer::addSelectColumns($c);
		$startcol = (SeggruaplPeer::NUM_COLUMNS - SeggruaplPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		SeggrupoPeer::addSelectColumns($c);

		$c->addJoin(SeggruaplPeer::CODGRU, SeggrupoPeer::CODGRU);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SeggruaplPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = SeggrupoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getSeggrupo(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addSeggruapl($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initSeggruapls();
				$obj2->addSeggruapl($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SeggruaplPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SeggruaplPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(SeggruaplPeer::CODGRU, SeggrupoPeer::CODGRU);
	
		$rs = SeggruaplPeer::doSelectRS($criteria, $con);
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

		SeggruaplPeer::addSelectColumns($c);
		$startcol2 = (SeggruaplPeer::NUM_COLUMNS - SeggruaplPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			SeggrupoPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + SeggrupoPeer::NUM_COLUMNS;
	
			$c->addJoin(SeggruaplPeer::CODGRU, SeggrupoPeer::CODGRU);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SeggruaplPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = SeggrupoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getSeggrupo(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addSeggruapl($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initSeggruapls();
					$obj2->addSeggruapl($obj1);
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
		return SeggruaplPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(SeggruaplPeer::ID); 

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
			$comparison = $criteria->getComparison(SeggruaplPeer::ID);
			$selectCriteria->add(SeggruaplPeer::ID, $criteria->remove(SeggruaplPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(SeggruaplPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(SeggruaplPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Seggruapl) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(SeggruaplPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Seggruapl $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(SeggruaplPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(SeggruaplPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(SeggruaplPeer::DATABASE_NAME, SeggruaplPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = SeggruaplPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(SeggruaplPeer::DATABASE_NAME);

		$criteria->add(SeggruaplPeer::ID, $pk);


		$v = SeggruaplPeer::doSelect($criteria, $con);

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
			$criteria->add(SeggruaplPeer::ID, $pks, Criteria::IN);
			$objs = SeggruaplPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseSeggruaplPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/sima_user/map/SeggruaplMapBuilder.php';
	Propel::registerMapBuilder('lib.model.sima_user.map.SeggruaplMapBuilder');
}
