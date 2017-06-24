<?php


abstract class BaseContabb1hisPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'contabb1his';

	
	const CLASS_DEFAULT = 'lib.model.contabilidad.Contabb1his';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODCTA = 'contabb1his.CODCTA';

	
	const FECINI = 'contabb1his.FECINI';

	
	const FECCIE = 'contabb1his.FECCIE';

	
	const PEREJE = 'contabb1his.PEREJE';

	
	const TOTDEB = 'contabb1his.TOTDEB';

	
	const TOTCRE = 'contabb1his.TOTCRE';

	
	const SALACT = 'contabb1his.SALACT';

	
	const SALPRGPER = 'contabb1his.SALPRGPER';

	
	const SALPRGPERFOR = 'contabb1his.SALPRGPERFOR';

	
	const ID = 'contabb1his.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codcta', 'Fecini', 'Feccie', 'Pereje', 'Totdeb', 'Totcre', 'Salact', 'Salprgper', 'Salprgperfor', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Contabb1hisPeer::CODCTA, Contabb1hisPeer::FECINI, Contabb1hisPeer::FECCIE, Contabb1hisPeer::PEREJE, Contabb1hisPeer::TOTDEB, Contabb1hisPeer::TOTCRE, Contabb1hisPeer::SALACT, Contabb1hisPeer::SALPRGPER, Contabb1hisPeer::SALPRGPERFOR, Contabb1hisPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codcta', 'fecini', 'feccie', 'pereje', 'totdeb', 'totcre', 'salact', 'salprgper', 'salprgperfor', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codcta' => 0, 'Fecini' => 1, 'Feccie' => 2, 'Pereje' => 3, 'Totdeb' => 4, 'Totcre' => 5, 'Salact' => 6, 'Salprgper' => 7, 'Salprgperfor' => 8, 'Id' => 9, ),
		BasePeer::TYPE_COLNAME => array (Contabb1hisPeer::CODCTA => 0, Contabb1hisPeer::FECINI => 1, Contabb1hisPeer::FECCIE => 2, Contabb1hisPeer::PEREJE => 3, Contabb1hisPeer::TOTDEB => 4, Contabb1hisPeer::TOTCRE => 5, Contabb1hisPeer::SALACT => 6, Contabb1hisPeer::SALPRGPER => 7, Contabb1hisPeer::SALPRGPERFOR => 8, Contabb1hisPeer::ID => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('codcta' => 0, 'fecini' => 1, 'feccie' => 2, 'pereje' => 3, 'totdeb' => 4, 'totcre' => 5, 'salact' => 6, 'salprgper' => 7, 'salprgperfor' => 8, 'id' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/contabilidad/map/Contabb1hisMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.contabilidad.map.Contabb1hisMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Contabb1hisPeer::getTableMap();
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
		return str_replace(Contabb1hisPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Contabb1hisPeer::CODCTA);

		$criteria->addSelectColumn(Contabb1hisPeer::FECINI);

		$criteria->addSelectColumn(Contabb1hisPeer::FECCIE);

		$criteria->addSelectColumn(Contabb1hisPeer::PEREJE);

		$criteria->addSelectColumn(Contabb1hisPeer::TOTDEB);

		$criteria->addSelectColumn(Contabb1hisPeer::TOTCRE);

		$criteria->addSelectColumn(Contabb1hisPeer::SALACT);

		$criteria->addSelectColumn(Contabb1hisPeer::SALPRGPER);

		$criteria->addSelectColumn(Contabb1hisPeer::SALPRGPERFOR);

		$criteria->addSelectColumn(Contabb1hisPeer::ID);

	}

	const COUNT = 'COUNT(contabb1his.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT contabb1his.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Contabb1hisPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Contabb1hisPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Contabb1hisPeer::doSelectRS($criteria, $con);
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
		$objects = Contabb1hisPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Contabb1hisPeer::populateObjects(Contabb1hisPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Contabb1hisPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Contabb1hisPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinContabb(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Contabb1hisPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Contabb1hisPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(Contabb1hisPeer::CODCTA, ContabbPeer::CODCTA);

		$rs = Contabb1hisPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinContabb(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		Contabb1hisPeer::addSelectColumns($c);
		$startcol = (Contabb1hisPeer::NUM_COLUMNS - Contabb1hisPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ContabbPeer::addSelectColumns($c);

		$c->addJoin(Contabb1hisPeer::CODCTA, ContabbPeer::CODCTA);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = Contabb1hisPeer::getOMClass();

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
										$temp_obj2->addContabb1his($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initContabb1hiss();
				$obj2->addContabb1his($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Contabb1hisPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Contabb1hisPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(Contabb1hisPeer::CODCTA, ContabbPeer::CODCTA);
	
		$rs = Contabb1hisPeer::doSelectRS($criteria, $con);
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

		Contabb1hisPeer::addSelectColumns($c);
		$startcol2 = (Contabb1hisPeer::NUM_COLUMNS - Contabb1hisPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			ContabbPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + ContabbPeer::NUM_COLUMNS;
	
			$c->addJoin(Contabb1hisPeer::CODCTA, ContabbPeer::CODCTA);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = Contabb1hisPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = ContabbPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getContabb(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addContabb1his($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initContabb1hiss();
					$obj2->addContabb1his($obj1);
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
		return Contabb1hisPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(Contabb1hisPeer::ID); 

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
			$comparison = $criteria->getComparison(Contabb1hisPeer::ID);
			$selectCriteria->add(Contabb1hisPeer::ID, $criteria->remove(Contabb1hisPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Contabb1hisPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Contabb1hisPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Contabb1his) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Contabb1hisPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Contabb1his $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Contabb1hisPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Contabb1hisPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Contabb1hisPeer::DATABASE_NAME, Contabb1hisPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Contabb1hisPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Contabb1hisPeer::DATABASE_NAME);

		$criteria->add(Contabb1hisPeer::ID, $pk);


		$v = Contabb1hisPeer::doSelect($criteria, $con);

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
			$criteria->add(Contabb1hisPeer::ID, $pks, Criteria::IN);
			$objs = Contabb1hisPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseContabb1hisPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/contabilidad/map/Contabb1hisMapBuilder.php';
	Propel::registerMapBuilder('lib.model.contabilidad.map.Contabb1hisMapBuilder');
}
