<?php


abstract class BaseFapreserartPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fapreserart';

	
	const CLASS_DEFAULT = 'lib.model.facturacion.Fapreserart';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFPRE = 'fapreserart.REFPRE';

	
	const CODART = 'fapreserart.CODART';

	
	const CODSER = 'fapreserart.CODSER';

	
	const UNISER = 'fapreserart.UNISER';

	
	const CANSER = 'fapreserart.CANSER';

	
	const COSSER = 'fapreserart.COSSER';

	
	const TOTSER = 'fapreserart.TOTSER';

	
	const ID = 'fapreserart.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refpre', 'Codart', 'Codser', 'Uniser', 'Canser', 'Cosser', 'Totser', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FapreserartPeer::REFPRE, FapreserartPeer::CODART, FapreserartPeer::CODSER, FapreserartPeer::UNISER, FapreserartPeer::CANSER, FapreserartPeer::COSSER, FapreserartPeer::TOTSER, FapreserartPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refpre', 'codart', 'codser', 'uniser', 'canser', 'cosser', 'totser', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refpre' => 0, 'Codart' => 1, 'Codser' => 2, 'Uniser' => 3, 'Canser' => 4, 'Cosser' => 5, 'Totser' => 6, 'Id' => 7, ),
		BasePeer::TYPE_COLNAME => array (FapreserartPeer::REFPRE => 0, FapreserartPeer::CODART => 1, FapreserartPeer::CODSER => 2, FapreserartPeer::UNISER => 3, FapreserartPeer::CANSER => 4, FapreserartPeer::COSSER => 5, FapreserartPeer::TOTSER => 6, FapreserartPeer::ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('refpre' => 0, 'codart' => 1, 'codser' => 2, 'uniser' => 3, 'canser' => 4, 'cosser' => 5, 'totser' => 6, 'id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/facturacion/map/FapreserartMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.facturacion.map.FapreserartMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FapreserartPeer::getTableMap();
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
		return str_replace(FapreserartPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FapreserartPeer::REFPRE);

		$criteria->addSelectColumn(FapreserartPeer::CODART);

		$criteria->addSelectColumn(FapreserartPeer::CODSER);

		$criteria->addSelectColumn(FapreserartPeer::UNISER);

		$criteria->addSelectColumn(FapreserartPeer::CANSER);

		$criteria->addSelectColumn(FapreserartPeer::COSSER);

		$criteria->addSelectColumn(FapreserartPeer::TOTSER);

		$criteria->addSelectColumn(FapreserartPeer::ID);

	}

	const COUNT = 'COUNT(fapreserart.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fapreserart.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FapreserartPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FapreserartPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FapreserartPeer::doSelectRS($criteria, $con);
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
		$objects = FapreserartPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FapreserartPeer::populateObjects(FapreserartPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FapreserartPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FapreserartPeer::getOMClass();
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
		return FapreserartPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FapreserartPeer::ID); 

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
			$comparison = $criteria->getComparison(FapreserartPeer::ID);
			$selectCriteria->add(FapreserartPeer::ID, $criteria->remove(FapreserartPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FapreserartPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FapreserartPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fapreserart) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FapreserartPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fapreserart $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FapreserartPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FapreserartPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FapreserartPeer::DATABASE_NAME, FapreserartPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FapreserartPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FapreserartPeer::DATABASE_NAME);

		$criteria->add(FapreserartPeer::ID, $pk);


		$v = FapreserartPeer::doSelect($criteria, $con);

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
			$criteria->add(FapreserartPeer::ID, $pks, Criteria::IN);
			$objs = FapreserartPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFapreserartPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/facturacion/map/FapreserartMapBuilder.php';
	Propel::registerMapBuilder('lib.model.facturacion.map.FapreserartMapBuilder');
}
