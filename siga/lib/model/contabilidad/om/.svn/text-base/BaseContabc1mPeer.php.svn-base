<?php


abstract class BaseContabc1mPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'contabc1m';

	
	const CLASS_DEFAULT = 'lib.model.contabilidad.Contabc1m';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMCOM = 'contabc1m.NUMCOM';

	
	const FECCOM = 'contabc1m.FECCOM';

	
	const DEBCRE = 'contabc1m.DEBCRE';

	
	const CODCTA = 'contabc1m.CODCTA';

	
	const NUMASI = 'contabc1m.NUMASI';

	
	const REFASI = 'contabc1m.REFASI';

	
	const DESASI = 'contabc1m.DESASI';

	
	const MONASI = 'contabc1m.MONASI';

	
	const ID = 'contabc1m.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numcom', 'Feccom', 'Debcre', 'Codcta', 'Numasi', 'Refasi', 'Desasi', 'Monasi', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Contabc1mPeer::NUMCOM, Contabc1mPeer::FECCOM, Contabc1mPeer::DEBCRE, Contabc1mPeer::CODCTA, Contabc1mPeer::NUMASI, Contabc1mPeer::REFASI, Contabc1mPeer::DESASI, Contabc1mPeer::MONASI, Contabc1mPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numcom', 'feccom', 'debcre', 'codcta', 'numasi', 'refasi', 'desasi', 'monasi', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numcom' => 0, 'Feccom' => 1, 'Debcre' => 2, 'Codcta' => 3, 'Numasi' => 4, 'Refasi' => 5, 'Desasi' => 6, 'Monasi' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (Contabc1mPeer::NUMCOM => 0, Contabc1mPeer::FECCOM => 1, Contabc1mPeer::DEBCRE => 2, Contabc1mPeer::CODCTA => 3, Contabc1mPeer::NUMASI => 4, Contabc1mPeer::REFASI => 5, Contabc1mPeer::DESASI => 6, Contabc1mPeer::MONASI => 7, Contabc1mPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('numcom' => 0, 'feccom' => 1, 'debcre' => 2, 'codcta' => 3, 'numasi' => 4, 'refasi' => 5, 'desasi' => 6, 'monasi' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/contabilidad/map/Contabc1mMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.contabilidad.map.Contabc1mMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Contabc1mPeer::getTableMap();
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
		return str_replace(Contabc1mPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Contabc1mPeer::NUMCOM);

		$criteria->addSelectColumn(Contabc1mPeer::FECCOM);

		$criteria->addSelectColumn(Contabc1mPeer::DEBCRE);

		$criteria->addSelectColumn(Contabc1mPeer::CODCTA);

		$criteria->addSelectColumn(Contabc1mPeer::NUMASI);

		$criteria->addSelectColumn(Contabc1mPeer::REFASI);

		$criteria->addSelectColumn(Contabc1mPeer::DESASI);

		$criteria->addSelectColumn(Contabc1mPeer::MONASI);

		$criteria->addSelectColumn(Contabc1mPeer::ID);

	}

	const COUNT = 'COUNT(contabc1m.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT contabc1m.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Contabc1mPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Contabc1mPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Contabc1mPeer::doSelectRS($criteria, $con);
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
		$objects = Contabc1mPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Contabc1mPeer::populateObjects(Contabc1mPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Contabc1mPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Contabc1mPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinContabcm(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Contabc1mPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Contabc1mPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(Contabc1mPeer::NUMCOM, ContabcmPeer::NUMCOM);

		$rs = Contabc1mPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinContabb(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Contabc1mPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Contabc1mPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(Contabc1mPeer::CODCTA, ContabbPeer::CODCTA);

		$rs = Contabc1mPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinContabcm(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		Contabc1mPeer::addSelectColumns($c);
		$startcol = (Contabc1mPeer::NUM_COLUMNS - Contabc1mPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ContabcmPeer::addSelectColumns($c);

		$c->addJoin(Contabc1mPeer::NUMCOM, ContabcmPeer::NUMCOM);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = Contabc1mPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ContabcmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getContabcm(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addContabc1m($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initContabc1ms();
				$obj2->addContabc1m($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinContabb(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		Contabc1mPeer::addSelectColumns($c);
		$startcol = (Contabc1mPeer::NUM_COLUMNS - Contabc1mPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ContabbPeer::addSelectColumns($c);

		$c->addJoin(Contabc1mPeer::CODCTA, ContabbPeer::CODCTA);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = Contabc1mPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ContabbPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getContabb(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addContabc1m($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initContabc1ms();
				$obj2->addContabc1m($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Contabc1mPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Contabc1mPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(Contabc1mPeer::NUMCOM, ContabcmPeer::NUMCOM);
	
			$criteria->addJoin(Contabc1mPeer::CODCTA, ContabbPeer::CODCTA);
	
		$rs = Contabc1mPeer::doSelectRS($criteria, $con);
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

		Contabc1mPeer::addSelectColumns($c);
		$startcol2 = (Contabc1mPeer::NUM_COLUMNS - Contabc1mPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			ContabcmPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + ContabcmPeer::NUM_COLUMNS;
	
			ContabbPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + ContabbPeer::NUM_COLUMNS;
	
			$c->addJoin(Contabc1mPeer::NUMCOM, ContabcmPeer::NUMCOM);
	
			$c->addJoin(Contabc1mPeer::CODCTA, ContabbPeer::CODCTA);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = Contabc1mPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = ContabcmPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getContabcm(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addContabc1m($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initContabc1ms();
					$obj2->addContabc1m($obj1);
				}
	

							
				$omClass = ContabbPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getContabb(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addContabc1m($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initContabc1ms();
					$obj3->addContabc1m($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptContabcm(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(Contabc1mPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(Contabc1mPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(Contabc1mPeer::CODCTA, ContabbPeer::CODCTA);
		
			$rs = Contabc1mPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptContabb(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(Contabc1mPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(Contabc1mPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(Contabc1mPeer::NUMCOM, ContabcmPeer::NUMCOM);
		
			$rs = Contabc1mPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptContabcm(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		Contabc1mPeer::addSelectColumns($c);
		$startcol2 = (Contabc1mPeer::NUM_COLUMNS - Contabc1mPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			ContabbPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + ContabbPeer::NUM_COLUMNS;
	
			$c->addJoin(Contabc1mPeer::CODCTA, ContabbPeer::CODCTA);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = Contabc1mPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = ContabbPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getContabb(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addContabc1m($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initContabc1ms();
					$obj2->addContabc1m($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptContabb(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		Contabc1mPeer::addSelectColumns($c);
		$startcol2 = (Contabc1mPeer::NUM_COLUMNS - Contabc1mPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			ContabcmPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + ContabcmPeer::NUM_COLUMNS;
	
			$c->addJoin(Contabc1mPeer::NUMCOM, ContabcmPeer::NUMCOM);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = Contabc1mPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = ContabcmPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getContabcm(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addContabc1m($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initContabc1ms();
					$obj2->addContabc1m($obj1);
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
		return Contabc1mPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(Contabc1mPeer::ID); 

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
			$comparison = $criteria->getComparison(Contabc1mPeer::ID);
			$selectCriteria->add(Contabc1mPeer::ID, $criteria->remove(Contabc1mPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Contabc1mPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Contabc1mPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Contabc1m) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Contabc1mPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Contabc1m $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Contabc1mPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Contabc1mPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Contabc1mPeer::DATABASE_NAME, Contabc1mPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Contabc1mPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Contabc1mPeer::DATABASE_NAME);

		$criteria->add(Contabc1mPeer::ID, $pk);


		$v = Contabc1mPeer::doSelect($criteria, $con);

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
			$criteria->add(Contabc1mPeer::ID, $pks, Criteria::IN);
			$objs = Contabc1mPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseContabc1mPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/contabilidad/map/Contabc1mMapBuilder.php';
	Propel::registerMapBuilder('lib.model.contabilidad.map.Contabc1mMapBuilder');
}
