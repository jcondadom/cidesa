<?php


abstract class BaseHcexaconPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'hcexacon';

	
	const CLASS_DEFAULT = 'lib.model.hcm.Hcexacon';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NOMCONTRA = 'hcexacon.NOMCONTRA';

	
	const REFEXACON = 'hcexacon.REFEXACON';

	
	const TIPEXACON = 'hcexacon.TIPEXACON';

	
	const FECEXACON = 'hcexacon.FECEXACON';

	
	const CODEMP = 'hcexacon.CODEMP';

	
	const CEDFAM = 'hcexacon.CEDFAM';

	
	const CODMEDLAB = 'hcexacon.CODMEDLAB';

	
	const TRAEXACON = 'hcexacon.TRAEXACON';

	
	const NOTEXACON = 'hcexacon.NOTEXACON';

	
	const DUREXACON = 'hcexacon.DUREXACON';

	
	const LOGUSE = 'hcexacon.LOGUSE';

	
	const ID = 'hcexacon.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Nomcontra', 'Refexacon', 'Tipexacon', 'Fecexacon', 'Codemp', 'Cedfam', 'Codmedlab', 'Traexacon', 'Notexacon', 'Durexacon', 'Loguse', 'Id', ),
		BasePeer::TYPE_COLNAME => array (HcexaconPeer::NOMCONTRA, HcexaconPeer::REFEXACON, HcexaconPeer::TIPEXACON, HcexaconPeer::FECEXACON, HcexaconPeer::CODEMP, HcexaconPeer::CEDFAM, HcexaconPeer::CODMEDLAB, HcexaconPeer::TRAEXACON, HcexaconPeer::NOTEXACON, HcexaconPeer::DUREXACON, HcexaconPeer::LOGUSE, HcexaconPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('nomcontra', 'refexacon', 'tipexacon', 'fecexacon', 'codemp', 'cedfam', 'codmedlab', 'traexacon', 'notexacon', 'durexacon', 'loguse', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Nomcontra' => 0, 'Refexacon' => 1, 'Tipexacon' => 2, 'Fecexacon' => 3, 'Codemp' => 4, 'Cedfam' => 5, 'Codmedlab' => 6, 'Traexacon' => 7, 'Notexacon' => 8, 'Durexacon' => 9, 'Loguse' => 10, 'Id' => 11, ),
		BasePeer::TYPE_COLNAME => array (HcexaconPeer::NOMCONTRA => 0, HcexaconPeer::REFEXACON => 1, HcexaconPeer::TIPEXACON => 2, HcexaconPeer::FECEXACON => 3, HcexaconPeer::CODEMP => 4, HcexaconPeer::CEDFAM => 5, HcexaconPeer::CODMEDLAB => 6, HcexaconPeer::TRAEXACON => 7, HcexaconPeer::NOTEXACON => 8, HcexaconPeer::DUREXACON => 9, HcexaconPeer::LOGUSE => 10, HcexaconPeer::ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('nomcontra' => 0, 'refexacon' => 1, 'tipexacon' => 2, 'fecexacon' => 3, 'codemp' => 4, 'cedfam' => 5, 'codmedlab' => 6, 'traexacon' => 7, 'notexacon' => 8, 'durexacon' => 9, 'loguse' => 10, 'id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hcm/map/HcexaconMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hcm.map.HcexaconMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = HcexaconPeer::getTableMap();
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
		return str_replace(HcexaconPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(HcexaconPeer::NOMCONTRA);

		$criteria->addSelectColumn(HcexaconPeer::REFEXACON);

		$criteria->addSelectColumn(HcexaconPeer::TIPEXACON);

		$criteria->addSelectColumn(HcexaconPeer::FECEXACON);

		$criteria->addSelectColumn(HcexaconPeer::CODEMP);

		$criteria->addSelectColumn(HcexaconPeer::CEDFAM);

		$criteria->addSelectColumn(HcexaconPeer::CODMEDLAB);

		$criteria->addSelectColumn(HcexaconPeer::TRAEXACON);

		$criteria->addSelectColumn(HcexaconPeer::NOTEXACON);

		$criteria->addSelectColumn(HcexaconPeer::DUREXACON);

		$criteria->addSelectColumn(HcexaconPeer::LOGUSE);

		$criteria->addSelectColumn(HcexaconPeer::ID);

	}

	const COUNT = 'COUNT(hcexacon.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT hcexacon.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HcexaconPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HcexaconPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = HcexaconPeer::doSelectRS($criteria, $con);
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
		$objects = HcexaconPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return HcexaconPeer::populateObjects(HcexaconPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			HcexaconPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = HcexaconPeer::getOMClass();
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
		return HcexaconPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(HcexaconPeer::ID); 

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
			$comparison = $criteria->getComparison(HcexaconPeer::ID);
			$selectCriteria->add(HcexaconPeer::ID, $criteria->remove(HcexaconPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(HcexaconPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(HcexaconPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Hcexacon) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(HcexaconPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Hcexacon $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(HcexaconPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(HcexaconPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(HcexaconPeer::DATABASE_NAME, HcexaconPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = HcexaconPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(HcexaconPeer::DATABASE_NAME);

		$criteria->add(HcexaconPeer::ID, $pk);


		$v = HcexaconPeer::doSelect($criteria, $con);

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
			$criteria->add(HcexaconPeer::ID, $pks, Criteria::IN);
			$objs = HcexaconPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseHcexaconPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hcm/map/HcexaconMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hcm.map.HcexaconMapBuilder');
}
