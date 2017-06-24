<?php


abstract class BaseManactestPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'manactest';

	
	const CLASS_DEFAULT = 'lib.model.mantenimiento.Manactest';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODACT = 'manactest.CODACT';

	
	const DESACT = 'manactest.DESACT';

	
	const CEDEMP = 'manactest.CEDEMP';

	
	const CODGRU = 'manactest.CODGRU';

	
	const PRIORI = 'manactest.PRIORI';

	
	const CEDRES = 'manactest.CEDRES';

	
	const CODTMA = 'manactest.CODTMA';

	
	const TIPORD = 'manactest.TIPORD';

	
	const FECCRE = 'manactest.FECCRE';

	
	const CODGRR = 'manactest.CODGRR';

	
	const ID = 'manactest.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codact', 'Desact', 'Cedemp', 'Codgru', 'Priori', 'Cedres', 'Codtma', 'Tipord', 'Feccre', 'Codgrr', 'Id', ),
		BasePeer::TYPE_COLNAME => array (ManactestPeer::CODACT, ManactestPeer::DESACT, ManactestPeer::CEDEMP, ManactestPeer::CODGRU, ManactestPeer::PRIORI, ManactestPeer::CEDRES, ManactestPeer::CODTMA, ManactestPeer::TIPORD, ManactestPeer::FECCRE, ManactestPeer::CODGRR, ManactestPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codact', 'desact', 'cedemp', 'codgru', 'priori', 'cedres', 'codtma', 'tipord', 'feccre', 'codgrr', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codact' => 0, 'Desact' => 1, 'Cedemp' => 2, 'Codgru' => 3, 'Priori' => 4, 'Cedres' => 5, 'Codtma' => 6, 'Tipord' => 7, 'Feccre' => 8, 'Codgrr' => 9, 'Id' => 10, ),
		BasePeer::TYPE_COLNAME => array (ManactestPeer::CODACT => 0, ManactestPeer::DESACT => 1, ManactestPeer::CEDEMP => 2, ManactestPeer::CODGRU => 3, ManactestPeer::PRIORI => 4, ManactestPeer::CEDRES => 5, ManactestPeer::CODTMA => 6, ManactestPeer::TIPORD => 7, ManactestPeer::FECCRE => 8, ManactestPeer::CODGRR => 9, ManactestPeer::ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('codact' => 0, 'desact' => 1, 'cedemp' => 2, 'codgru' => 3, 'priori' => 4, 'cedres' => 5, 'codtma' => 6, 'tipord' => 7, 'feccre' => 8, 'codgrr' => 9, 'id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/mantenimiento/map/ManactestMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.mantenimiento.map.ManactestMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ManactestPeer::getTableMap();
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
		return str_replace(ManactestPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ManactestPeer::CODACT);

		$criteria->addSelectColumn(ManactestPeer::DESACT);

		$criteria->addSelectColumn(ManactestPeer::CEDEMP);

		$criteria->addSelectColumn(ManactestPeer::CODGRU);

		$criteria->addSelectColumn(ManactestPeer::PRIORI);

		$criteria->addSelectColumn(ManactestPeer::CEDRES);

		$criteria->addSelectColumn(ManactestPeer::CODTMA);

		$criteria->addSelectColumn(ManactestPeer::TIPORD);

		$criteria->addSelectColumn(ManactestPeer::FECCRE);

		$criteria->addSelectColumn(ManactestPeer::CODGRR);

		$criteria->addSelectColumn(ManactestPeer::ID);

	}

	const COUNT = 'COUNT(manactest.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT manactest.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ManactestPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ManactestPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ManactestPeer::doSelectRS($criteria, $con);
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
		$objects = ManactestPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ManactestPeer::populateObjects(ManactestPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ManactestPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ManactestPeer::getOMClass();
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
		return ManactestPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ManactestPeer::ID); 

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
			$comparison = $criteria->getComparison(ManactestPeer::ID);
			$selectCriteria->add(ManactestPeer::ID, $criteria->remove(ManactestPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(ManactestPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ManactestPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Manactest) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ManactestPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Manactest $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ManactestPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ManactestPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ManactestPeer::DATABASE_NAME, ManactestPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ManactestPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ManactestPeer::DATABASE_NAME);

		$criteria->add(ManactestPeer::ID, $pk);


		$v = ManactestPeer::doSelect($criteria, $con);

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
			$criteria->add(ManactestPeer::ID, $pks, Criteria::IN);
			$objs = ManactestPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseManactestPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/mantenimiento/map/ManactestMapBuilder.php';
	Propel::registerMapBuilder('lib.model.mantenimiento.map.ManactestMapBuilder');
}
