<?php


abstract class BaseFaemptraPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'faemptra';

	
	const CLASS_DEFAULT = 'lib.model.facturacion.Faemptra';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMPTRA = 'faemptra.CODEMPTRA';

	
	const RIFEMPTRA = 'faemptra.RIFEMPTRA';

	
	const NOMEMPTRA = 'faemptra.NOMEMPTRA';

	
	const DIREMPTRA = 'faemptra.DIREMPTRA';

	
	const CODZON = 'faemptra.CODZON';

	
	const TLFEMPTRA = 'faemptra.TLFEMPTRA';

	
	const NOMPERRES = 'faemptra.NOMPERRES';

	
	const ID = 'faemptra.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemptra', 'Rifemptra', 'Nomemptra', 'Diremptra', 'Codzon', 'Tlfemptra', 'Nomperres', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FaemptraPeer::CODEMPTRA, FaemptraPeer::RIFEMPTRA, FaemptraPeer::NOMEMPTRA, FaemptraPeer::DIREMPTRA, FaemptraPeer::CODZON, FaemptraPeer::TLFEMPTRA, FaemptraPeer::NOMPERRES, FaemptraPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemptra', 'rifemptra', 'nomemptra', 'diremptra', 'codzon', 'tlfemptra', 'nomperres', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemptra' => 0, 'Rifemptra' => 1, 'Nomemptra' => 2, 'Diremptra' => 3, 'Codzon' => 4, 'Tlfemptra' => 5, 'Nomperres' => 6, 'Id' => 7, ),
		BasePeer::TYPE_COLNAME => array (FaemptraPeer::CODEMPTRA => 0, FaemptraPeer::RIFEMPTRA => 1, FaemptraPeer::NOMEMPTRA => 2, FaemptraPeer::DIREMPTRA => 3, FaemptraPeer::CODZON => 4, FaemptraPeer::TLFEMPTRA => 5, FaemptraPeer::NOMPERRES => 6, FaemptraPeer::ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('codemptra' => 0, 'rifemptra' => 1, 'nomemptra' => 2, 'diremptra' => 3, 'codzon' => 4, 'tlfemptra' => 5, 'nomperres' => 6, 'id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/facturacion/map/FaemptraMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.facturacion.map.FaemptraMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FaemptraPeer::getTableMap();
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
		return str_replace(FaemptraPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FaemptraPeer::CODEMPTRA);

		$criteria->addSelectColumn(FaemptraPeer::RIFEMPTRA);

		$criteria->addSelectColumn(FaemptraPeer::NOMEMPTRA);

		$criteria->addSelectColumn(FaemptraPeer::DIREMPTRA);

		$criteria->addSelectColumn(FaemptraPeer::CODZON);

		$criteria->addSelectColumn(FaemptraPeer::TLFEMPTRA);

		$criteria->addSelectColumn(FaemptraPeer::NOMPERRES);

		$criteria->addSelectColumn(FaemptraPeer::ID);

	}

	const COUNT = 'COUNT(faemptra.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT faemptra.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FaemptraPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FaemptraPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FaemptraPeer::doSelectRS($criteria, $con);
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
		$objects = FaemptraPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FaemptraPeer::populateObjects(FaemptraPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FaemptraPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FaemptraPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinFadefzon(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FaemptraPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FaemptraPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FaemptraPeer::CODZON, FadefzonPeer::CODZON);

		$rs = FaemptraPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinFadefzon(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FaemptraPeer::addSelectColumns($c);
		$startcol = (FaemptraPeer::NUM_COLUMNS - FaemptraPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		FadefzonPeer::addSelectColumns($c);

		$c->addJoin(FaemptraPeer::CODZON, FadefzonPeer::CODZON);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FaemptraPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FadefzonPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getFadefzon(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addFaemptra($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initFaemptras();
				$obj2->addFaemptra($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FaemptraPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FaemptraPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(FaemptraPeer::CODZON, FadefzonPeer::CODZON);
	
		$rs = FaemptraPeer::doSelectRS($criteria, $con);
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

		FaemptraPeer::addSelectColumns($c);
		$startcol2 = (FaemptraPeer::NUM_COLUMNS - FaemptraPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			FadefzonPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + FadefzonPeer::NUM_COLUMNS;
	
			$c->addJoin(FaemptraPeer::CODZON, FadefzonPeer::CODZON);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FaemptraPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = FadefzonPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getFadefzon(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addFaemptra($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initFaemptras();
					$obj2->addFaemptra($obj1);
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
		return FaemptraPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FaemptraPeer::ID); 

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
			$comparison = $criteria->getComparison(FaemptraPeer::ID);
			$selectCriteria->add(FaemptraPeer::ID, $criteria->remove(FaemptraPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FaemptraPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FaemptraPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Faemptra) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FaemptraPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Faemptra $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FaemptraPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FaemptraPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FaemptraPeer::DATABASE_NAME, FaemptraPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FaemptraPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FaemptraPeer::DATABASE_NAME);

		$criteria->add(FaemptraPeer::ID, $pk);


		$v = FaemptraPeer::doSelect($criteria, $con);

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
			$criteria->add(FaemptraPeer::ID, $pks, Criteria::IN);
			$objs = FaemptraPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFaemptraPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/facturacion/map/FaemptraMapBuilder.php';
	Propel::registerMapBuilder('lib.model.facturacion.map.FaemptraMapBuilder');
}
