<?php


abstract class BaseLiasigdechisPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'liasigdechis';

	
	const CLASS_DEFAULT = 'lib.model.licitaciones.Liasigdechis';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const LISICACT_ID = 'liasigdechis.LISICACT_ID';

	
	const FECDECLA = 'liasigdechis.FECDECLA';

	
	const DETDECMOD = 'liasigdechis.DETDECMOD';

	
	const ANAPOR = 'liasigdechis.ANAPOR';

	
	const ANAPORCAR = 'liasigdechis.ANAPORCAR';

	
	const STATUS = 'liasigdechis.STATUS';

	
	const NUMDOC = 'liasigdechis.NUMDOC';

	
	const TABLA = 'liasigdechis.TABLA';

	
	const NUMDEC = 'liasigdechis.NUMDEC';

	
	const TIPCONPUB = 'liasigdechis.TIPCONPUB';

	
	const ID = 'liasigdechis.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('LisicactId', 'Fecdecla', 'Detdecmod', 'Anapor', 'Anaporcar', 'Status', 'Numdoc', 'Tabla', 'Numdec', 'Tipconpub', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LiasigdechisPeer::LISICACT_ID, LiasigdechisPeer::FECDECLA, LiasigdechisPeer::DETDECMOD, LiasigdechisPeer::ANAPOR, LiasigdechisPeer::ANAPORCAR, LiasigdechisPeer::STATUS, LiasigdechisPeer::NUMDOC, LiasigdechisPeer::TABLA, LiasigdechisPeer::NUMDEC, LiasigdechisPeer::TIPCONPUB, LiasigdechisPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('lisicact_id', 'fecdecla', 'detdecmod', 'anapor', 'anaporcar', 'status', 'numdoc', 'tabla', 'numdec', 'tipconpub', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('LisicactId' => 0, 'Fecdecla' => 1, 'Detdecmod' => 2, 'Anapor' => 3, 'Anaporcar' => 4, 'Status' => 5, 'Numdoc' => 6, 'Tabla' => 7, 'Numdec' => 8, 'Tipconpub' => 9, 'Id' => 10, ),
		BasePeer::TYPE_COLNAME => array (LiasigdechisPeer::LISICACT_ID => 0, LiasigdechisPeer::FECDECLA => 1, LiasigdechisPeer::DETDECMOD => 2, LiasigdechisPeer::ANAPOR => 3, LiasigdechisPeer::ANAPORCAR => 4, LiasigdechisPeer::STATUS => 5, LiasigdechisPeer::NUMDOC => 6, LiasigdechisPeer::TABLA => 7, LiasigdechisPeer::NUMDEC => 8, LiasigdechisPeer::TIPCONPUB => 9, LiasigdechisPeer::ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('lisicact_id' => 0, 'fecdecla' => 1, 'detdecmod' => 2, 'anapor' => 3, 'anaporcar' => 4, 'status' => 5, 'numdoc' => 6, 'tabla' => 7, 'numdec' => 8, 'tipconpub' => 9, 'id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/licitaciones/map/LiasigdechisMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.licitaciones.map.LiasigdechisMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LiasigdechisPeer::getTableMap();
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
		return str_replace(LiasigdechisPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LiasigdechisPeer::LISICACT_ID);

		$criteria->addSelectColumn(LiasigdechisPeer::FECDECLA);

		$criteria->addSelectColumn(LiasigdechisPeer::DETDECMOD);

		$criteria->addSelectColumn(LiasigdechisPeer::ANAPOR);

		$criteria->addSelectColumn(LiasigdechisPeer::ANAPORCAR);

		$criteria->addSelectColumn(LiasigdechisPeer::STATUS);

		$criteria->addSelectColumn(LiasigdechisPeer::NUMDOC);

		$criteria->addSelectColumn(LiasigdechisPeer::TABLA);

		$criteria->addSelectColumn(LiasigdechisPeer::NUMDEC);

		$criteria->addSelectColumn(LiasigdechisPeer::TIPCONPUB);

		$criteria->addSelectColumn(LiasigdechisPeer::ID);

	}

	const COUNT = 'COUNT(liasigdechis.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT liasigdechis.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiasigdechisPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiasigdechisPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LiasigdechisPeer::doSelectRS($criteria, $con);
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
		$objects = LiasigdechisPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LiasigdechisPeer::populateObjects(LiasigdechisPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LiasigdechisPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LiasigdechisPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinLisicact(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiasigdechisPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiasigdechisPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LiasigdechisPeer::LISICACT_ID, LisicactPeer::ID);

		$rs = LiasigdechisPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinLisicact(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LiasigdechisPeer::addSelectColumns($c);
		$startcol = (LiasigdechisPeer::NUM_COLUMNS - LiasigdechisPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LisicactPeer::addSelectColumns($c);

		$c->addJoin(LiasigdechisPeer::LISICACT_ID, LisicactPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiasigdechisPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LisicactPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLisicact(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addLiasigdechis($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLiasigdechiss();
				$obj2->addLiasigdechis($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiasigdechisPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiasigdechisPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(LiasigdechisPeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = LiasigdechisPeer::doSelectRS($criteria, $con);
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

		LiasigdechisPeer::addSelectColumns($c);
		$startcol2 = (LiasigdechisPeer::NUM_COLUMNS - LiasigdechisPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LisicactPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LiasigdechisPeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiasigdechisPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = LisicactPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getLisicact(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addLiasigdechis($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initLiasigdechiss();
					$obj2->addLiasigdechis($obj1);
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
		return LiasigdechisPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LiasigdechisPeer::ID); 

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
			$comparison = $criteria->getComparison(LiasigdechisPeer::ID);
			$selectCriteria->add(LiasigdechisPeer::ID, $criteria->remove(LiasigdechisPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LiasigdechisPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LiasigdechisPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Liasigdechis) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LiasigdechisPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Liasigdechis $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LiasigdechisPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LiasigdechisPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LiasigdechisPeer::DATABASE_NAME, LiasigdechisPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LiasigdechisPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LiasigdechisPeer::DATABASE_NAME);

		$criteria->add(LiasigdechisPeer::ID, $pk);


		$v = LiasigdechisPeer::doSelect($criteria, $con);

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
			$criteria->add(LiasigdechisPeer::ID, $pks, Criteria::IN);
			$objs = LiasigdechisPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLiasigdechisPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/licitaciones/map/LiasigdechisMapBuilder.php';
	Propel::registerMapBuilder('lib.model.licitaciones.map.LiasigdechisMapBuilder');
}
