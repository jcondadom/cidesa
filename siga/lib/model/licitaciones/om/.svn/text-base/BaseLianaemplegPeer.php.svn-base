<?php


abstract class BaseLianaemplegPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'lianaempleg';

	
	const CLASS_DEFAULT = 'lib.model.licitaciones.Lianaempleg';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMANAEMP = 'lianaempleg.NUMANAEMP';

	
	const CODCRI = 'lianaempleg.CODCRI';

	
	const PUNEMP = 'lianaempleg.PUNEMP';

	
	const POREMP = 'lianaempleg.POREMP';

	
	const OBSERV = 'lianaempleg.OBSERV';

	
	const TIPCONPUB = 'lianaempleg.TIPCONPUB';

	
	const ID = 'lianaempleg.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numanaemp', 'Codcri', 'Punemp', 'Poremp', 'Observ', 'Tipconpub', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LianaemplegPeer::NUMANAEMP, LianaemplegPeer::CODCRI, LianaemplegPeer::PUNEMP, LianaemplegPeer::POREMP, LianaemplegPeer::OBSERV, LianaemplegPeer::TIPCONPUB, LianaemplegPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numanaemp', 'codcri', 'punemp', 'poremp', 'observ', 'tipconpub', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numanaemp' => 0, 'Codcri' => 1, 'Punemp' => 2, 'Poremp' => 3, 'Observ' => 4, 'Tipconpub' => 5, 'Id' => 6, ),
		BasePeer::TYPE_COLNAME => array (LianaemplegPeer::NUMANAEMP => 0, LianaemplegPeer::CODCRI => 1, LianaemplegPeer::PUNEMP => 2, LianaemplegPeer::POREMP => 3, LianaemplegPeer::OBSERV => 4, LianaemplegPeer::TIPCONPUB => 5, LianaemplegPeer::ID => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('numanaemp' => 0, 'codcri' => 1, 'punemp' => 2, 'poremp' => 3, 'observ' => 4, 'tipconpub' => 5, 'id' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/licitaciones/map/LianaemplegMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.licitaciones.map.LianaemplegMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LianaemplegPeer::getTableMap();
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
		return str_replace(LianaemplegPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LianaemplegPeer::NUMANAEMP);

		$criteria->addSelectColumn(LianaemplegPeer::CODCRI);

		$criteria->addSelectColumn(LianaemplegPeer::PUNEMP);

		$criteria->addSelectColumn(LianaemplegPeer::POREMP);

		$criteria->addSelectColumn(LianaemplegPeer::OBSERV);

		$criteria->addSelectColumn(LianaemplegPeer::TIPCONPUB);

		$criteria->addSelectColumn(LianaemplegPeer::ID);

	}

	const COUNT = 'COUNT(lianaempleg.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT lianaempleg.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LianaemplegPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LianaemplegPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LianaemplegPeer::doSelectRS($criteria, $con);
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
		$objects = LianaemplegPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LianaemplegPeer::populateObjects(LianaemplegPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LianaemplegPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LianaemplegPeer::getOMClass();
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
		return LianaemplegPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LianaemplegPeer::ID); 

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
			$comparison = $criteria->getComparison(LianaemplegPeer::ID);
			$selectCriteria->add(LianaemplegPeer::ID, $criteria->remove(LianaemplegPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LianaemplegPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LianaemplegPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Lianaempleg) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LianaemplegPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Lianaempleg $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LianaemplegPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LianaemplegPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LianaemplegPeer::DATABASE_NAME, LianaemplegPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LianaemplegPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LianaemplegPeer::DATABASE_NAME);

		$criteria->add(LianaemplegPeer::ID, $pk);


		$v = LianaemplegPeer::doSelect($criteria, $con);

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
			$criteria->add(LianaemplegPeer::ID, $pks, Criteria::IN);
			$objs = LianaemplegPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLianaemplegPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/licitaciones/map/LianaemplegMapBuilder.php';
	Propel::registerMapBuilder('lib.model.licitaciones.map.LianaemplegMapBuilder');
}
