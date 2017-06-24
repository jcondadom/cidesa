<?php


abstract class BaseFaartordPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'faartord';

	
	const CLASS_DEFAULT = 'lib.model.facturacion.Faartord';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ORDCOM = 'faartord.ORDCOM';

	
	const CODART = 'faartord.CODART';

	
	const CODUNIMED = 'faartord.CODUNIMED';

	
	const CANORD = 'faartord.CANORD';

	
	const CANREC = 'faartord.CANREC';

	
	const PREART = 'faartord.PREART';

	
	const MONRGO = 'faartord.MONRGO';

	
	const PORRGO = 'faartord.PORRGO';

	
	const ID = 'faartord.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Ordcom', 'Codart', 'Codunimed', 'Canord', 'Canrec', 'Preart', 'Monrgo', 'Porrgo', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FaartordPeer::ORDCOM, FaartordPeer::CODART, FaartordPeer::CODUNIMED, FaartordPeer::CANORD, FaartordPeer::CANREC, FaartordPeer::PREART, FaartordPeer::MONRGO, FaartordPeer::PORRGO, FaartordPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('ordcom', 'codart', 'codunimed', 'canord', 'canrec', 'preart', 'monrgo', 'porrgo', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Ordcom' => 0, 'Codart' => 1, 'Codunimed' => 2, 'Canord' => 3, 'Canrec' => 4, 'Preart' => 5, 'Monrgo' => 6, 'Porrgo' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (FaartordPeer::ORDCOM => 0, FaartordPeer::CODART => 1, FaartordPeer::CODUNIMED => 2, FaartordPeer::CANORD => 3, FaartordPeer::CANREC => 4, FaartordPeer::PREART => 5, FaartordPeer::MONRGO => 6, FaartordPeer::PORRGO => 7, FaartordPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('ordcom' => 0, 'codart' => 1, 'codunimed' => 2, 'canord' => 3, 'canrec' => 4, 'preart' => 5, 'monrgo' => 6, 'porrgo' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/facturacion/map/FaartordMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.facturacion.map.FaartordMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FaartordPeer::getTableMap();
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
		return str_replace(FaartordPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FaartordPeer::ORDCOM);

		$criteria->addSelectColumn(FaartordPeer::CODART);

		$criteria->addSelectColumn(FaartordPeer::CODUNIMED);

		$criteria->addSelectColumn(FaartordPeer::CANORD);

		$criteria->addSelectColumn(FaartordPeer::CANREC);

		$criteria->addSelectColumn(FaartordPeer::PREART);

		$criteria->addSelectColumn(FaartordPeer::MONRGO);

		$criteria->addSelectColumn(FaartordPeer::PORRGO);

		$criteria->addSelectColumn(FaartordPeer::ID);

	}

	const COUNT = 'COUNT(faartord.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT faartord.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FaartordPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FaartordPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FaartordPeer::doSelectRS($criteria, $con);
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
		$objects = FaartordPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FaartordPeer::populateObjects(FaartordPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FaartordPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FaartordPeer::getOMClass();
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
		return FaartordPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FaartordPeer::ID); 

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
			$comparison = $criteria->getComparison(FaartordPeer::ID);
			$selectCriteria->add(FaartordPeer::ID, $criteria->remove(FaartordPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FaartordPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FaartordPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Faartord) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FaartordPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Faartord $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FaartordPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FaartordPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FaartordPeer::DATABASE_NAME, FaartordPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FaartordPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FaartordPeer::DATABASE_NAME);

		$criteria->add(FaartordPeer::ID, $pk);


		$v = FaartordPeer::doSelect($criteria, $con);

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
			$criteria->add(FaartordPeer::ID, $pks, Criteria::IN);
			$objs = FaartordPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFaartordPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/facturacion/map/FaartordMapBuilder.php';
	Propel::registerMapBuilder('lib.model.facturacion.map.FaartordMapBuilder');
}
