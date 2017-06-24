<?php


abstract class BaseFapreequartPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fapreequart';

	
	const CLASS_DEFAULT = 'lib.model.facturacion.Fapreequart';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFPRE = 'fapreequart.REFPRE';

	
	const CODART = 'fapreequart.CODART';

	
	const CODEQU = 'fapreequart.CODEQU';

	
	const UNIEQU = 'fapreequart.UNIEQU';

	
	const CANEQU = 'fapreequart.CANEQU';

	
	const COSEQU = 'fapreequart.COSEQU';

	
	const TOTEQU = 'fapreequart.TOTEQU';

	
	const ID = 'fapreequart.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refpre', 'Codart', 'Codequ', 'Uniequ', 'Canequ', 'Cosequ', 'Totequ', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FapreequartPeer::REFPRE, FapreequartPeer::CODART, FapreequartPeer::CODEQU, FapreequartPeer::UNIEQU, FapreequartPeer::CANEQU, FapreequartPeer::COSEQU, FapreequartPeer::TOTEQU, FapreequartPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refpre', 'codart', 'codequ', 'uniequ', 'canequ', 'cosequ', 'totequ', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refpre' => 0, 'Codart' => 1, 'Codequ' => 2, 'Uniequ' => 3, 'Canequ' => 4, 'Cosequ' => 5, 'Totequ' => 6, 'Id' => 7, ),
		BasePeer::TYPE_COLNAME => array (FapreequartPeer::REFPRE => 0, FapreequartPeer::CODART => 1, FapreequartPeer::CODEQU => 2, FapreequartPeer::UNIEQU => 3, FapreequartPeer::CANEQU => 4, FapreequartPeer::COSEQU => 5, FapreequartPeer::TOTEQU => 6, FapreequartPeer::ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('refpre' => 0, 'codart' => 1, 'codequ' => 2, 'uniequ' => 3, 'canequ' => 4, 'cosequ' => 5, 'totequ' => 6, 'id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/facturacion/map/FapreequartMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.facturacion.map.FapreequartMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FapreequartPeer::getTableMap();
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
		return str_replace(FapreequartPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FapreequartPeer::REFPRE);

		$criteria->addSelectColumn(FapreequartPeer::CODART);

		$criteria->addSelectColumn(FapreequartPeer::CODEQU);

		$criteria->addSelectColumn(FapreequartPeer::UNIEQU);

		$criteria->addSelectColumn(FapreequartPeer::CANEQU);

		$criteria->addSelectColumn(FapreequartPeer::COSEQU);

		$criteria->addSelectColumn(FapreequartPeer::TOTEQU);

		$criteria->addSelectColumn(FapreequartPeer::ID);

	}

	const COUNT = 'COUNT(fapreequart.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fapreequart.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FapreequartPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FapreequartPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FapreequartPeer::doSelectRS($criteria, $con);
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
		$objects = FapreequartPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FapreequartPeer::populateObjects(FapreequartPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FapreequartPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FapreequartPeer::getOMClass();
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
		return FapreequartPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FapreequartPeer::ID); 

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
			$comparison = $criteria->getComparison(FapreequartPeer::ID);
			$selectCriteria->add(FapreequartPeer::ID, $criteria->remove(FapreequartPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FapreequartPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FapreequartPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fapreequart) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FapreequartPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fapreequart $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FapreequartPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FapreequartPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FapreequartPeer::DATABASE_NAME, FapreequartPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FapreequartPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FapreequartPeer::DATABASE_NAME);

		$criteria->add(FapreequartPeer::ID, $pk);


		$v = FapreequartPeer::doSelect($criteria, $con);

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
			$criteria->add(FapreequartPeer::ID, $pks, Criteria::IN);
			$objs = FapreequartPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFapreequartPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/facturacion/map/FapreequartMapBuilder.php';
	Propel::registerMapBuilder('lib.model.facturacion.map.FapreequartMapBuilder');
}
