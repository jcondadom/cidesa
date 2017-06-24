<?php


abstract class BaseLidetparinsPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'lidetparins';

	
	const CLASS_DEFAULT = 'lib.model.licitaciones.Lidetparins';

	
	const NUM_COLUMNS = 6;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMINS = 'lidetparins.NUMINS';

	
	const LIDETPARVAL_ID = 'lidetparins.LIDETPARVAL_ID';

	
	const CANTIDINS = 'lidetparins.CANTIDINS';

	
	const SUBTOTINS = 'lidetparins.SUBTOTINS';

	
	const APROBADO = 'lidetparins.APROBADO';

	
	const ID = 'lidetparins.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numins', 'LidetparvalId', 'Cantidins', 'Subtotins', 'Aprobado', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LidetparinsPeer::NUMINS, LidetparinsPeer::LIDETPARVAL_ID, LidetparinsPeer::CANTIDINS, LidetparinsPeer::SUBTOTINS, LidetparinsPeer::APROBADO, LidetparinsPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numins', 'lidetparval_id', 'cantidins', 'subtotins', 'aprobado', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numins' => 0, 'LidetparvalId' => 1, 'Cantidins' => 2, 'Subtotins' => 3, 'Aprobado' => 4, 'Id' => 5, ),
		BasePeer::TYPE_COLNAME => array (LidetparinsPeer::NUMINS => 0, LidetparinsPeer::LIDETPARVAL_ID => 1, LidetparinsPeer::CANTIDINS => 2, LidetparinsPeer::SUBTOTINS => 3, LidetparinsPeer::APROBADO => 4, LidetparinsPeer::ID => 5, ),
		BasePeer::TYPE_FIELDNAME => array ('numins' => 0, 'lidetparval_id' => 1, 'cantidins' => 2, 'subtotins' => 3, 'aprobado' => 4, 'id' => 5, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/licitaciones/map/LidetparinsMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.licitaciones.map.LidetparinsMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LidetparinsPeer::getTableMap();
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
		return str_replace(LidetparinsPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LidetparinsPeer::NUMINS);

		$criteria->addSelectColumn(LidetparinsPeer::LIDETPARVAL_ID);

		$criteria->addSelectColumn(LidetparinsPeer::CANTIDINS);

		$criteria->addSelectColumn(LidetparinsPeer::SUBTOTINS);

		$criteria->addSelectColumn(LidetparinsPeer::APROBADO);

		$criteria->addSelectColumn(LidetparinsPeer::ID);

	}

	const COUNT = 'COUNT(lidetparins.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT lidetparins.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LidetparinsPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LidetparinsPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LidetparinsPeer::doSelectRS($criteria, $con);
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
		$objects = LidetparinsPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LidetparinsPeer::populateObjects(LidetparinsPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LidetparinsPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LidetparinsPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinLiinspecciones(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LidetparinsPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LidetparinsPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LidetparinsPeer::NUMINS, LiinspeccionesPeer::NUMINS);

		$rs = LidetparinsPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinLidetparval(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LidetparinsPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LidetparinsPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LidetparinsPeer::LIDETPARVAL_ID, LidetparvalPeer::ID);

		$rs = LidetparinsPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinLiinspecciones(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LidetparinsPeer::addSelectColumns($c);
		$startcol = (LidetparinsPeer::NUM_COLUMNS - LidetparinsPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LiinspeccionesPeer::addSelectColumns($c);

		$c->addJoin(LidetparinsPeer::NUMINS, LiinspeccionesPeer::NUMINS);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LidetparinsPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LiinspeccionesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLiinspecciones(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addLidetparins($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLidetparinss();
				$obj2->addLidetparins($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinLidetparval(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LidetparinsPeer::addSelectColumns($c);
		$startcol = (LidetparinsPeer::NUM_COLUMNS - LidetparinsPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LidetparvalPeer::addSelectColumns($c);

		$c->addJoin(LidetparinsPeer::LIDETPARVAL_ID, LidetparvalPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LidetparinsPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LidetparvalPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLidetparval(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addLidetparins($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLidetparinss();
				$obj2->addLidetparins($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LidetparinsPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LidetparinsPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(LidetparinsPeer::NUMINS, LiinspeccionesPeer::NUMINS);
	
			$criteria->addJoin(LidetparinsPeer::LIDETPARVAL_ID, LidetparvalPeer::ID);
	
		$rs = LidetparinsPeer::doSelectRS($criteria, $con);
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

		LidetparinsPeer::addSelectColumns($c);
		$startcol2 = (LidetparinsPeer::NUM_COLUMNS - LidetparinsPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LiinspeccionesPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LiinspeccionesPeer::NUM_COLUMNS;
	
			LidetparvalPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LidetparvalPeer::NUM_COLUMNS;
	
			$c->addJoin(LidetparinsPeer::NUMINS, LiinspeccionesPeer::NUMINS);
	
			$c->addJoin(LidetparinsPeer::LIDETPARVAL_ID, LidetparvalPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LidetparinsPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = LiinspeccionesPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getLiinspecciones(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addLidetparins($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initLidetparinss();
					$obj2->addLidetparins($obj1);
				}
	

							
				$omClass = LidetparvalPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getLidetparval(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addLidetparins($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initLidetparinss();
					$obj3->addLidetparins($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptLiinspecciones(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(LidetparinsPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LidetparinsPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LidetparinsPeer::LIDETPARVAL_ID, LidetparvalPeer::ID);
		
			$rs = LidetparinsPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptLidetparval(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(LidetparinsPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LidetparinsPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LidetparinsPeer::NUMINS, LiinspeccionesPeer::NUMINS);
		
			$rs = LidetparinsPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptLiinspecciones(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LidetparinsPeer::addSelectColumns($c);
		$startcol2 = (LidetparinsPeer::NUM_COLUMNS - LidetparinsPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LidetparvalPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LidetparvalPeer::NUM_COLUMNS;
	
			$c->addJoin(LidetparinsPeer::LIDETPARVAL_ID, LidetparvalPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LidetparinsPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = LidetparvalPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getLidetparval(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addLidetparins($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLidetparinss();
					$obj2->addLidetparins($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptLidetparval(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LidetparinsPeer::addSelectColumns($c);
		$startcol2 = (LidetparinsPeer::NUM_COLUMNS - LidetparinsPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LiinspeccionesPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LiinspeccionesPeer::NUM_COLUMNS;
	
			$c->addJoin(LidetparinsPeer::NUMINS, LiinspeccionesPeer::NUMINS);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LidetparinsPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = LiinspeccionesPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getLiinspecciones(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addLidetparins($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLidetparinss();
					$obj2->addLidetparins($obj1);
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
		return LidetparinsPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LidetparinsPeer::ID); 

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
			$comparison = $criteria->getComparison(LidetparinsPeer::ID);
			$selectCriteria->add(LidetparinsPeer::ID, $criteria->remove(LidetparinsPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LidetparinsPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LidetparinsPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Lidetparins) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LidetparinsPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Lidetparins $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LidetparinsPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LidetparinsPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LidetparinsPeer::DATABASE_NAME, LidetparinsPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LidetparinsPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LidetparinsPeer::DATABASE_NAME);

		$criteria->add(LidetparinsPeer::ID, $pk);


		$v = LidetparinsPeer::doSelect($criteria, $con);

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
			$criteria->add(LidetparinsPeer::ID, $pks, Criteria::IN);
			$objs = LidetparinsPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLidetparinsPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/licitaciones/map/LidetparinsMapBuilder.php';
	Propel::registerMapBuilder('lib.model.licitaciones.map.LidetparinsMapBuilder');
}
