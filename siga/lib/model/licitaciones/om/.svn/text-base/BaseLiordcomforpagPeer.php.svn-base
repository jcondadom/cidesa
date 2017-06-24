<?php


abstract class BaseLiordcomforpagPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'liordcomforpag';

	
	const CLASS_DEFAULT = 'lib.model.licitaciones.Liordcomforpag';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMORD = 'liordcomforpag.NUMORD';

	
	const DESANT = 'liordcomforpag.DESANT';

	
	const PORANT = 'liordcomforpag.PORANT';

	
	const MONTOT = 'liordcomforpag.MONTOT';

	
	const MONREC = 'liordcomforpag.MONREC';

	
	const SUBTOT = 'liordcomforpag.SUBTOT';

	
	const PORAMOANT = 'liordcomforpag.PORAMOANT';

	
	const NETPAG = 'liordcomforpag.NETPAG';

	
	const FECANT = 'liordcomforpag.FECANT';

	
	const CONDIC = 'liordcomforpag.CONDIC';

	
	const ID = 'liordcomforpag.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numord', 'Desant', 'Porant', 'Montot', 'Monrec', 'Subtot', 'Poramoant', 'Netpag', 'Fecant', 'Condic', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LiordcomforpagPeer::NUMORD, LiordcomforpagPeer::DESANT, LiordcomforpagPeer::PORANT, LiordcomforpagPeer::MONTOT, LiordcomforpagPeer::MONREC, LiordcomforpagPeer::SUBTOT, LiordcomforpagPeer::PORAMOANT, LiordcomforpagPeer::NETPAG, LiordcomforpagPeer::FECANT, LiordcomforpagPeer::CONDIC, LiordcomforpagPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numord', 'desant', 'porant', 'montot', 'monrec', 'subtot', 'poramoant', 'netpag', 'fecant', 'condic', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numord' => 0, 'Desant' => 1, 'Porant' => 2, 'Montot' => 3, 'Monrec' => 4, 'Subtot' => 5, 'Poramoant' => 6, 'Netpag' => 7, 'Fecant' => 8, 'Condic' => 9, 'Id' => 10, ),
		BasePeer::TYPE_COLNAME => array (LiordcomforpagPeer::NUMORD => 0, LiordcomforpagPeer::DESANT => 1, LiordcomforpagPeer::PORANT => 2, LiordcomforpagPeer::MONTOT => 3, LiordcomforpagPeer::MONREC => 4, LiordcomforpagPeer::SUBTOT => 5, LiordcomforpagPeer::PORAMOANT => 6, LiordcomforpagPeer::NETPAG => 7, LiordcomforpagPeer::FECANT => 8, LiordcomforpagPeer::CONDIC => 9, LiordcomforpagPeer::ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('numord' => 0, 'desant' => 1, 'porant' => 2, 'montot' => 3, 'monrec' => 4, 'subtot' => 5, 'poramoant' => 6, 'netpag' => 7, 'fecant' => 8, 'condic' => 9, 'id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/licitaciones/map/LiordcomforpagMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.licitaciones.map.LiordcomforpagMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LiordcomforpagPeer::getTableMap();
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
		return str_replace(LiordcomforpagPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LiordcomforpagPeer::NUMORD);

		$criteria->addSelectColumn(LiordcomforpagPeer::DESANT);

		$criteria->addSelectColumn(LiordcomforpagPeer::PORANT);

		$criteria->addSelectColumn(LiordcomforpagPeer::MONTOT);

		$criteria->addSelectColumn(LiordcomforpagPeer::MONREC);

		$criteria->addSelectColumn(LiordcomforpagPeer::SUBTOT);

		$criteria->addSelectColumn(LiordcomforpagPeer::PORAMOANT);

		$criteria->addSelectColumn(LiordcomforpagPeer::NETPAG);

		$criteria->addSelectColumn(LiordcomforpagPeer::FECANT);

		$criteria->addSelectColumn(LiordcomforpagPeer::CONDIC);

		$criteria->addSelectColumn(LiordcomforpagPeer::ID);

	}

	const COUNT = 'COUNT(liordcomforpag.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT liordcomforpag.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiordcomforpagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiordcomforpagPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LiordcomforpagPeer::doSelectRS($criteria, $con);
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
		$objects = LiordcomforpagPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LiordcomforpagPeer::populateObjects(LiordcomforpagPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LiordcomforpagPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LiordcomforpagPeer::getOMClass();
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
		return LiordcomforpagPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LiordcomforpagPeer::ID); 

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
			$comparison = $criteria->getComparison(LiordcomforpagPeer::ID);
			$selectCriteria->add(LiordcomforpagPeer::ID, $criteria->remove(LiordcomforpagPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LiordcomforpagPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LiordcomforpagPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Liordcomforpag) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LiordcomforpagPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Liordcomforpag $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LiordcomforpagPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LiordcomforpagPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LiordcomforpagPeer::DATABASE_NAME, LiordcomforpagPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LiordcomforpagPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LiordcomforpagPeer::DATABASE_NAME);

		$criteria->add(LiordcomforpagPeer::ID, $pk);


		$v = LiordcomforpagPeer::doSelect($criteria, $con);

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
			$criteria->add(LiordcomforpagPeer::ID, $pks, Criteria::IN);
			$objs = LiordcomforpagPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLiordcomforpagPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/licitaciones/map/LiordcomforpagMapBuilder.php';
	Propel::registerMapBuilder('lib.model.licitaciones.map.LiordcomforpagMapBuilder');
}
