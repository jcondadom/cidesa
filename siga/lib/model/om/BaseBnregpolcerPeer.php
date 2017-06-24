<?php


abstract class BaseBnregpolcerPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'bnregpolcer';

	
	const CLASS_DEFAULT = 'lib.model.Bnregpolcer';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMPOL = 'bnregpolcer.NUMPOL';

	
	const FECPOL = 'bnregpolcer.FECPOL';

	
	const NUMREC = 'bnregpolcer.NUMREC';

	
	const FECINI = 'bnregpolcer.FECINI';

	
	const FECVEN = 'bnregpolcer.FECVEN';

	
	const NUMSOLPAG = 'bnregpolcer.NUMSOLPAG';

	
	const NUMSOL = 'bnregpolcer.NUMSOL';

	
	const ID = 'bnregpolcer.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numpol', 'Fecpol', 'Numrec', 'Fecini', 'Fecven', 'Numsolpag', 'Numsol', 'Id', ),
		BasePeer::TYPE_COLNAME => array (BnregpolcerPeer::NUMPOL, BnregpolcerPeer::FECPOL, BnregpolcerPeer::NUMREC, BnregpolcerPeer::FECINI, BnregpolcerPeer::FECVEN, BnregpolcerPeer::NUMSOLPAG, BnregpolcerPeer::NUMSOL, BnregpolcerPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numpol', 'fecpol', 'numrec', 'fecini', 'fecven', 'numsolpag', 'numsol', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numpol' => 0, 'Fecpol' => 1, 'Numrec' => 2, 'Fecini' => 3, 'Fecven' => 4, 'Numsolpag' => 5, 'Numsol' => 6, 'Id' => 7, ),
		BasePeer::TYPE_COLNAME => array (BnregpolcerPeer::NUMPOL => 0, BnregpolcerPeer::FECPOL => 1, BnregpolcerPeer::NUMREC => 2, BnregpolcerPeer::FECINI => 3, BnregpolcerPeer::FECVEN => 4, BnregpolcerPeer::NUMSOLPAG => 5, BnregpolcerPeer::NUMSOL => 6, BnregpolcerPeer::ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('numpol' => 0, 'fecpol' => 1, 'numrec' => 2, 'fecini' => 3, 'fecven' => 4, 'numsolpag' => 5, 'numsol' => 6, 'id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/BnregpolcerMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.BnregpolcerMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = BnregpolcerPeer::getTableMap();
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
		return str_replace(BnregpolcerPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(BnregpolcerPeer::NUMPOL);

		$criteria->addSelectColumn(BnregpolcerPeer::FECPOL);

		$criteria->addSelectColumn(BnregpolcerPeer::NUMREC);

		$criteria->addSelectColumn(BnregpolcerPeer::FECINI);

		$criteria->addSelectColumn(BnregpolcerPeer::FECVEN);

		$criteria->addSelectColumn(BnregpolcerPeer::NUMSOLPAG);

		$criteria->addSelectColumn(BnregpolcerPeer::NUMSOL);

		$criteria->addSelectColumn(BnregpolcerPeer::ID);

	}

	const COUNT = 'COUNT(bnregpolcer.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT bnregpolcer.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BnregpolcerPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BnregpolcerPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = BnregpolcerPeer::doSelectRS($criteria, $con);
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
		$objects = BnregpolcerPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return BnregpolcerPeer::populateObjects(BnregpolcerPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			BnregpolcerPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = BnregpolcerPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return BnregpolcerPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(BnregpolcerPeer::ID); 

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
			$comparison = $criteria->getComparison(BnregpolcerPeer::ID);
			$selectCriteria->add(BnregpolcerPeer::ID, $criteria->remove(BnregpolcerPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(BnregpolcerPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(BnregpolcerPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Bnregpolcer) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(BnregpolcerPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Bnregpolcer $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(BnregpolcerPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(BnregpolcerPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(BnregpolcerPeer::DATABASE_NAME, BnregpolcerPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = BnregpolcerPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(BnregpolcerPeer::DATABASE_NAME);

		$criteria->add(BnregpolcerPeer::ID, $pk);


		$v = BnregpolcerPeer::doSelect($criteria, $con);

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
			$criteria->add(BnregpolcerPeer::ID, $pks, Criteria::IN);
			$objs = BnregpolcerPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseBnregpolcerPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/BnregpolcerMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.BnregpolcerMapBuilder');
}
