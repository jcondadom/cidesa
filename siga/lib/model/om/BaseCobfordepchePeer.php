<?php


abstract class BaseCobfordepchePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cobfordepche';

	
	const CLASS_DEFAULT = 'lib.model.Cobfordepche';

	
	const NUM_COLUMNS = 6;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMTRA = 'cobfordepche.NUMTRA';

	
	const NUMCHE = 'cobfordepche.NUMCHE';

	
	const FABANCOS_ID = 'cobfordepche.FABANCOS_ID';

	
	const MONCHE = 'cobfordepche.MONCHE';

	
	const COBDETFOR_ID = 'cobfordepche.COBDETFOR_ID';

	
	const ID = 'cobfordepche.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numtra', 'Numche', 'FabancosId', 'Monche', 'CobdetforId', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CobfordepchePeer::NUMTRA, CobfordepchePeer::NUMCHE, CobfordepchePeer::FABANCOS_ID, CobfordepchePeer::MONCHE, CobfordepchePeer::COBDETFOR_ID, CobfordepchePeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numtra', 'numche', 'fabancos_id', 'monche', 'cobdetfor_id', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numtra' => 0, 'Numche' => 1, 'FabancosId' => 2, 'Monche' => 3, 'CobdetforId' => 4, 'Id' => 5, ),
		BasePeer::TYPE_COLNAME => array (CobfordepchePeer::NUMTRA => 0, CobfordepchePeer::NUMCHE => 1, CobfordepchePeer::FABANCOS_ID => 2, CobfordepchePeer::MONCHE => 3, CobfordepchePeer::COBDETFOR_ID => 4, CobfordepchePeer::ID => 5, ),
		BasePeer::TYPE_FIELDNAME => array ('numtra' => 0, 'numche' => 1, 'fabancos_id' => 2, 'monche' => 3, 'cobdetfor_id' => 4, 'id' => 5, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CobfordepcheMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CobfordepcheMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CobfordepchePeer::getTableMap();
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
		return str_replace(CobfordepchePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CobfordepchePeer::NUMTRA);

		$criteria->addSelectColumn(CobfordepchePeer::NUMCHE);

		$criteria->addSelectColumn(CobfordepchePeer::FABANCOS_ID);

		$criteria->addSelectColumn(CobfordepchePeer::MONCHE);

		$criteria->addSelectColumn(CobfordepchePeer::COBDETFOR_ID);

		$criteria->addSelectColumn(CobfordepchePeer::ID);

	}

	const COUNT = 'COUNT(cobfordepche.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cobfordepche.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CobfordepchePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CobfordepchePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CobfordepchePeer::doSelectRS($criteria, $con);
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
		$objects = CobfordepchePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CobfordepchePeer::populateObjects(CobfordepchePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CobfordepchePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CobfordepchePeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinFabancos(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CobfordepchePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CobfordepchePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CobfordepchePeer::FABANCOS_ID, FabancosPeer::ID);

		$rs = CobfordepchePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCobdetfor(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CobfordepchePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CobfordepchePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CobfordepchePeer::COBDETFOR_ID, CobdetforPeer::ID);

		$rs = CobfordepchePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinFabancos(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CobfordepchePeer::addSelectColumns($c);
		$startcol = (CobfordepchePeer::NUM_COLUMNS - CobfordepchePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		FabancosPeer::addSelectColumns($c);

		$c->addJoin(CobfordepchePeer::FABANCOS_ID, FabancosPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CobfordepchePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FabancosPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getFabancos(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCobfordepche($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCobfordepches();
				$obj2->addCobfordepche($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCobdetfor(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CobfordepchePeer::addSelectColumns($c);
		$startcol = (CobfordepchePeer::NUM_COLUMNS - CobfordepchePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CobdetforPeer::addSelectColumns($c);

		$c->addJoin(CobfordepchePeer::COBDETFOR_ID, CobdetforPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CobfordepchePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CobdetforPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCobdetfor(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCobfordepche($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCobfordepches();
				$obj2->addCobfordepche($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CobfordepchePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CobfordepchePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CobfordepchePeer::FABANCOS_ID, FabancosPeer::ID);
	
			$criteria->addJoin(CobfordepchePeer::COBDETFOR_ID, CobdetforPeer::ID);
	
		$rs = CobfordepchePeer::doSelectRS($criteria, $con);
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

		CobfordepchePeer::addSelectColumns($c);
		$startcol2 = (CobfordepchePeer::NUM_COLUMNS - CobfordepchePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			FabancosPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + FabancosPeer::NUM_COLUMNS;
	
			CobdetforPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CobdetforPeer::NUM_COLUMNS;
	
			$c->addJoin(CobfordepchePeer::FABANCOS_ID, FabancosPeer::ID);
	
			$c->addJoin(CobfordepchePeer::COBDETFOR_ID, CobdetforPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CobfordepchePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = FabancosPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getFabancos(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCobfordepche($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCobfordepches();
					$obj2->addCobfordepche($obj1);
				}
	

							
				$omClass = CobdetforPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCobdetfor(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCobfordepche($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCobfordepches();
					$obj3->addCobfordepche($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptFabancos(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CobfordepchePeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CobfordepchePeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CobfordepchePeer::COBDETFOR_ID, CobdetforPeer::ID);
		
			$rs = CobfordepchePeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCobdetfor(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CobfordepchePeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CobfordepchePeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CobfordepchePeer::FABANCOS_ID, FabancosPeer::ID);
		
			$rs = CobfordepchePeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptFabancos(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CobfordepchePeer::addSelectColumns($c);
		$startcol2 = (CobfordepchePeer::NUM_COLUMNS - CobfordepchePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CobdetforPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CobdetforPeer::NUM_COLUMNS;
	
			$c->addJoin(CobfordepchePeer::COBDETFOR_ID, CobdetforPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CobfordepchePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CobdetforPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCobdetfor(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCobfordepche($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCobfordepches();
					$obj2->addCobfordepche($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCobdetfor(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CobfordepchePeer::addSelectColumns($c);
		$startcol2 = (CobfordepchePeer::NUM_COLUMNS - CobfordepchePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			FabancosPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + FabancosPeer::NUM_COLUMNS;
	
			$c->addJoin(CobfordepchePeer::FABANCOS_ID, FabancosPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CobfordepchePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = FabancosPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getFabancos(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCobfordepche($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCobfordepches();
					$obj2->addCobfordepche($obj1);
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
		return CobfordepchePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CobfordepchePeer::ID); 

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
			$comparison = $criteria->getComparison(CobfordepchePeer::ID);
			$selectCriteria->add(CobfordepchePeer::ID, $criteria->remove(CobfordepchePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CobfordepchePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CobfordepchePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cobfordepche) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CobfordepchePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cobfordepche $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CobfordepchePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CobfordepchePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CobfordepchePeer::DATABASE_NAME, CobfordepchePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CobfordepchePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CobfordepchePeer::DATABASE_NAME);

		$criteria->add(CobfordepchePeer::ID, $pk);


		$v = CobfordepchePeer::doSelect($criteria, $con);

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
			$criteria->add(CobfordepchePeer::ID, $pks, Criteria::IN);
			$objs = CobfordepchePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCobfordepchePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CobfordepcheMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CobfordepcheMapBuilder');
}
