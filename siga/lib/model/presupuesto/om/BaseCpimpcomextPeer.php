<?php


abstract class BaseCpimpcomextPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cpimpcomext';

	
	const CLASS_DEFAULT = 'lib.model.presupuesto.Cpimpcomext';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFCOMEXT = 'cpimpcomext.REFCOMEXT';

	
	const CODPRE = 'cpimpcomext.CODPRE';

	
	const MONIMP = 'cpimpcomext.MONIMP';

	
	const MONCAU = 'cpimpcomext.MONCAU';

	
	const MONPAG = 'cpimpcomext.MONPAG';

	
	const MONAJU = 'cpimpcomext.MONAJU';

	
	const STAIMP = 'cpimpcomext.STAIMP';

	
	const REFERE = 'cpimpcomext.REFERE';

	
	const ID = 'cpimpcomext.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refcomext', 'Codpre', 'Monimp', 'Moncau', 'Monpag', 'Monaju', 'Staimp', 'Refere', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CpimpcomextPeer::REFCOMEXT, CpimpcomextPeer::CODPRE, CpimpcomextPeer::MONIMP, CpimpcomextPeer::MONCAU, CpimpcomextPeer::MONPAG, CpimpcomextPeer::MONAJU, CpimpcomextPeer::STAIMP, CpimpcomextPeer::REFERE, CpimpcomextPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refcomext', 'codpre', 'monimp', 'moncau', 'monpag', 'monaju', 'staimp', 'refere', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refcomext' => 0, 'Codpre' => 1, 'Monimp' => 2, 'Moncau' => 3, 'Monpag' => 4, 'Monaju' => 5, 'Staimp' => 6, 'Refere' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (CpimpcomextPeer::REFCOMEXT => 0, CpimpcomextPeer::CODPRE => 1, CpimpcomextPeer::MONIMP => 2, CpimpcomextPeer::MONCAU => 3, CpimpcomextPeer::MONPAG => 4, CpimpcomextPeer::MONAJU => 5, CpimpcomextPeer::STAIMP => 6, CpimpcomextPeer::REFERE => 7, CpimpcomextPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('refcomext' => 0, 'codpre' => 1, 'monimp' => 2, 'moncau' => 3, 'monpag' => 4, 'monaju' => 5, 'staimp' => 6, 'refere' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/presupuesto/map/CpimpcomextMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.presupuesto.map.CpimpcomextMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CpimpcomextPeer::getTableMap();
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
		return str_replace(CpimpcomextPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CpimpcomextPeer::REFCOMEXT);

		$criteria->addSelectColumn(CpimpcomextPeer::CODPRE);

		$criteria->addSelectColumn(CpimpcomextPeer::MONIMP);

		$criteria->addSelectColumn(CpimpcomextPeer::MONCAU);

		$criteria->addSelectColumn(CpimpcomextPeer::MONPAG);

		$criteria->addSelectColumn(CpimpcomextPeer::MONAJU);

		$criteria->addSelectColumn(CpimpcomextPeer::STAIMP);

		$criteria->addSelectColumn(CpimpcomextPeer::REFERE);

		$criteria->addSelectColumn(CpimpcomextPeer::ID);

	}

	const COUNT = 'COUNT(cpimpcomext.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cpimpcomext.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpimpcomextPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpimpcomextPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CpimpcomextPeer::doSelectRS($criteria, $con);
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
		$objects = CpimpcomextPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CpimpcomextPeer::populateObjects(CpimpcomextPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CpimpcomextPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CpimpcomextPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCpcomext(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpimpcomextPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpimpcomextPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CpimpcomextPeer::REFCOMEXT, CpcomextPeer::REFCOMEXT);

		$rs = CpimpcomextPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCpdeftit(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpimpcomextPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpimpcomextPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CpimpcomextPeer::CODPRE, CpdeftitPeer::CODPRE);

		$rs = CpimpcomextPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCpcomext(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CpimpcomextPeer::addSelectColumns($c);
		$startcol = (CpimpcomextPeer::NUM_COLUMNS - CpimpcomextPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CpcomextPeer::addSelectColumns($c);

		$c->addJoin(CpimpcomextPeer::REFCOMEXT, CpcomextPeer::REFCOMEXT);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpimpcomextPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CpcomextPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCpcomext(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCpimpcomext($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCpimpcomexts();
				$obj2->addCpimpcomext($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCpdeftit(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CpimpcomextPeer::addSelectColumns($c);
		$startcol = (CpimpcomextPeer::NUM_COLUMNS - CpimpcomextPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CpdeftitPeer::addSelectColumns($c);

		$c->addJoin(CpimpcomextPeer::CODPRE, CpdeftitPeer::CODPRE);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpimpcomextPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CpdeftitPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCpdeftit(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCpimpcomext($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCpimpcomexts();
				$obj2->addCpimpcomext($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpimpcomextPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpimpcomextPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CpimpcomextPeer::REFCOMEXT, CpcomextPeer::REFCOMEXT);
	
			$criteria->addJoin(CpimpcomextPeer::CODPRE, CpdeftitPeer::CODPRE);
	
		$rs = CpimpcomextPeer::doSelectRS($criteria, $con);
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

		CpimpcomextPeer::addSelectColumns($c);
		$startcol2 = (CpimpcomextPeer::NUM_COLUMNS - CpimpcomextPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CpcomextPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CpcomextPeer::NUM_COLUMNS;
	
			CpdeftitPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CpdeftitPeer::NUM_COLUMNS;
	
			$c->addJoin(CpimpcomextPeer::REFCOMEXT, CpcomextPeer::REFCOMEXT);
	
			$c->addJoin(CpimpcomextPeer::CODPRE, CpdeftitPeer::CODPRE);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpimpcomextPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CpcomextPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCpcomext(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCpimpcomext($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCpimpcomexts();
					$obj2->addCpimpcomext($obj1);
				}
	

							
				$omClass = CpdeftitPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCpdeftit(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCpimpcomext($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCpimpcomexts();
					$obj3->addCpimpcomext($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCpcomext(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CpimpcomextPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CpimpcomextPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CpimpcomextPeer::CODPRE, CpdeftitPeer::CODPRE);
		
			$rs = CpimpcomextPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCpdeftit(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CpimpcomextPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CpimpcomextPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CpimpcomextPeer::REFCOMEXT, CpcomextPeer::REFCOMEXT);
		
			$rs = CpimpcomextPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCpcomext(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CpimpcomextPeer::addSelectColumns($c);
		$startcol2 = (CpimpcomextPeer::NUM_COLUMNS - CpimpcomextPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CpdeftitPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CpdeftitPeer::NUM_COLUMNS;
	
			$c->addJoin(CpimpcomextPeer::CODPRE, CpdeftitPeer::CODPRE);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpimpcomextPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CpdeftitPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCpdeftit(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCpimpcomext($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCpimpcomexts();
					$obj2->addCpimpcomext($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCpdeftit(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CpimpcomextPeer::addSelectColumns($c);
		$startcol2 = (CpimpcomextPeer::NUM_COLUMNS - CpimpcomextPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CpcomextPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CpcomextPeer::NUM_COLUMNS;
	
			$c->addJoin(CpimpcomextPeer::REFCOMEXT, CpcomextPeer::REFCOMEXT);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpimpcomextPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CpcomextPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCpcomext(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCpimpcomext($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCpimpcomexts();
					$obj2->addCpimpcomext($obj1);
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
		return CpimpcomextPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CpimpcomextPeer::ID); 

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
			$comparison = $criteria->getComparison(CpimpcomextPeer::ID);
			$selectCriteria->add(CpimpcomextPeer::ID, $criteria->remove(CpimpcomextPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CpimpcomextPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CpimpcomextPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cpimpcomext) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CpimpcomextPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cpimpcomext $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CpimpcomextPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CpimpcomextPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CpimpcomextPeer::DATABASE_NAME, CpimpcomextPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CpimpcomextPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CpimpcomextPeer::DATABASE_NAME);

		$criteria->add(CpimpcomextPeer::ID, $pk);


		$v = CpimpcomextPeer::doSelect($criteria, $con);

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
			$criteria->add(CpimpcomextPeer::ID, $pks, Criteria::IN);
			$objs = CpimpcomextPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCpimpcomextPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/presupuesto/map/CpimpcomextMapBuilder.php';
	Propel::registerMapBuilder('lib.model.presupuesto.map.CpimpcomextMapBuilder');
}
