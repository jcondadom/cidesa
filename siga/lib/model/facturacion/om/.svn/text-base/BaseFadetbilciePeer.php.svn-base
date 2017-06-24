<?php


abstract class BaseFadetbilciePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fadetbilcie';

	
	const CLASS_DEFAULT = 'lib.model.facturacion.Fadetbilcie';

	
	const NUM_COLUMNS = 4;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODCIE = 'fadetbilcie.CODCIE';

	
	const CODBIL = 'fadetbilcie.CODBIL';

	
	const CANBIL = 'fadetbilcie.CANBIL';

	
	const ID = 'fadetbilcie.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codcie', 'Codbil', 'Canbil', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FadetbilciePeer::CODCIE, FadetbilciePeer::CODBIL, FadetbilciePeer::CANBIL, FadetbilciePeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codcie', 'codbil', 'canbil', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codcie' => 0, 'Codbil' => 1, 'Canbil' => 2, 'Id' => 3, ),
		BasePeer::TYPE_COLNAME => array (FadetbilciePeer::CODCIE => 0, FadetbilciePeer::CODBIL => 1, FadetbilciePeer::CANBIL => 2, FadetbilciePeer::ID => 3, ),
		BasePeer::TYPE_FIELDNAME => array ('codcie' => 0, 'codbil' => 1, 'canbil' => 2, 'id' => 3, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/facturacion/map/FadetbilcieMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.facturacion.map.FadetbilcieMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FadetbilciePeer::getTableMap();
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
		return str_replace(FadetbilciePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FadetbilciePeer::CODCIE);

		$criteria->addSelectColumn(FadetbilciePeer::CODBIL);

		$criteria->addSelectColumn(FadetbilciePeer::CANBIL);

		$criteria->addSelectColumn(FadetbilciePeer::ID);

	}

	const COUNT = 'COUNT(fadetbilcie.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fadetbilcie.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FadetbilciePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FadetbilciePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FadetbilciePeer::doSelectRS($criteria, $con);
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
		$objects = FadetbilciePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FadetbilciePeer::populateObjects(FadetbilciePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FadetbilciePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FadetbilciePeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinFaciecaj(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FadetbilciePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FadetbilciePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FadetbilciePeer::CODCIE, FaciecajPeer::ID);

		$rs = FadetbilciePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinFaciecaj(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FadetbilciePeer::addSelectColumns($c);
		$startcol = (FadetbilciePeer::NUM_COLUMNS - FadetbilciePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		FaciecajPeer::addSelectColumns($c);

		$c->addJoin(FadetbilciePeer::CODCIE, FaciecajPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FadetbilciePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FaciecajPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getFaciecaj(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addFadetbilcie($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initFadetbilcies();
				$obj2->addFadetbilcie($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FadetbilciePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FadetbilciePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(FadetbilciePeer::CODCIE, FaciecajPeer::ID);
	
		$rs = FadetbilciePeer::doSelectRS($criteria, $con);
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

		FadetbilciePeer::addSelectColumns($c);
		$startcol2 = (FadetbilciePeer::NUM_COLUMNS - FadetbilciePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			FaciecajPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + FaciecajPeer::NUM_COLUMNS;
	
			$c->addJoin(FadetbilciePeer::CODCIE, FaciecajPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FadetbilciePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = FaciecajPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getFaciecaj(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addFadetbilcie($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initFadetbilcies();
					$obj2->addFadetbilcie($obj1);
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
		return FadetbilciePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FadetbilciePeer::ID); 

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
			$comparison = $criteria->getComparison(FadetbilciePeer::ID);
			$selectCriteria->add(FadetbilciePeer::ID, $criteria->remove(FadetbilciePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FadetbilciePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FadetbilciePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fadetbilcie) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FadetbilciePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fadetbilcie $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FadetbilciePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FadetbilciePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FadetbilciePeer::DATABASE_NAME, FadetbilciePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FadetbilciePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FadetbilciePeer::DATABASE_NAME);

		$criteria->add(FadetbilciePeer::ID, $pk);


		$v = FadetbilciePeer::doSelect($criteria, $con);

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
			$criteria->add(FadetbilciePeer::ID, $pks, Criteria::IN);
			$objs = FadetbilciePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFadetbilciePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/facturacion/map/FadetbilcieMapBuilder.php';
	Propel::registerMapBuilder('lib.model.facturacion.map.FadetbilcieMapBuilder');
}
