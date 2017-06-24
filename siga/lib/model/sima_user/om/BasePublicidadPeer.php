<?php


abstract class BasePublicidadPeer {

	
	const DATABASE_NAME = 'sima_user';

	
	const TABLE_NAME = 'publicidad';

	
	const CLASS_DEFAULT = 'lib.model.sima_user.Publicidad';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const TITPUB = 'publicidad.TITPUB';

	
	const DESPUB = 'publicidad.DESPUB';

	
	const IMGPUB = 'publicidad.IMGPUB';

	
	const CATPUB = 'publicidad.CATPUB';

	
	const LINKPUB = 'publicidad.LINKPUB';

	
	const CREATED_AT = 'publicidad.CREATED_AT';

	
	const ID = 'publicidad.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Titpub', 'Despub', 'Imgpub', 'Catpub', 'Linkpub', 'CreatedAt', 'Id', ),
		BasePeer::TYPE_COLNAME => array (PublicidadPeer::TITPUB, PublicidadPeer::DESPUB, PublicidadPeer::IMGPUB, PublicidadPeer::CATPUB, PublicidadPeer::LINKPUB, PublicidadPeer::CREATED_AT, PublicidadPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('titpub', 'despub', 'imgpub', 'catpub', 'linkpub', 'created_at', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Titpub' => 0, 'Despub' => 1, 'Imgpub' => 2, 'Catpub' => 3, 'Linkpub' => 4, 'CreatedAt' => 5, 'Id' => 6, ),
		BasePeer::TYPE_COLNAME => array (PublicidadPeer::TITPUB => 0, PublicidadPeer::DESPUB => 1, PublicidadPeer::IMGPUB => 2, PublicidadPeer::CATPUB => 3, PublicidadPeer::LINKPUB => 4, PublicidadPeer::CREATED_AT => 5, PublicidadPeer::ID => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('titpub' => 0, 'despub' => 1, 'imgpub' => 2, 'catpub' => 3, 'linkpub' => 4, 'created_at' => 5, 'id' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/sima_user/map/PublicidadMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.sima_user.map.PublicidadMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = PublicidadPeer::getTableMap();
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
		return str_replace(PublicidadPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(PublicidadPeer::TITPUB);

		$criteria->addSelectColumn(PublicidadPeer::DESPUB);

		$criteria->addSelectColumn(PublicidadPeer::IMGPUB);

		$criteria->addSelectColumn(PublicidadPeer::CATPUB);

		$criteria->addSelectColumn(PublicidadPeer::LINKPUB);

		$criteria->addSelectColumn(PublicidadPeer::CREATED_AT);

		$criteria->addSelectColumn(PublicidadPeer::ID);

	}

	const COUNT = 'COUNT(publicidad.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT publicidad.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PublicidadPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PublicidadPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = PublicidadPeer::doSelectRS($criteria, $con);
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
		$objects = PublicidadPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return PublicidadPeer::populateObjects(PublicidadPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			PublicidadPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = PublicidadPeer::getOMClass();
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
		return PublicidadPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(PublicidadPeer::ID); 

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
			$comparison = $criteria->getComparison(PublicidadPeer::ID);
			$selectCriteria->add(PublicidadPeer::ID, $criteria->remove(PublicidadPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(PublicidadPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(PublicidadPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Publicidad) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(PublicidadPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Publicidad $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(PublicidadPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(PublicidadPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(PublicidadPeer::DATABASE_NAME, PublicidadPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = PublicidadPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(PublicidadPeer::DATABASE_NAME);

		$criteria->add(PublicidadPeer::ID, $pk);


		$v = PublicidadPeer::doSelect($criteria, $con);

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
			$criteria->add(PublicidadPeer::ID, $pks, Criteria::IN);
			$objs = PublicidadPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasePublicidadPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/sima_user/map/PublicidadMapBuilder.php';
	Propel::registerMapBuilder('lib.model.sima_user.map.PublicidadMapBuilder');
}
