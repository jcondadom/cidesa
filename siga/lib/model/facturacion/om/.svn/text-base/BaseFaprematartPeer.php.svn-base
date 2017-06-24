<?php


abstract class BaseFaprematartPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'faprematart';

	
	const CLASS_DEFAULT = 'lib.model.facturacion.Faprematart';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFPRE = 'faprematart.REFPRE';

	
	const CODART = 'faprematart.CODART';

	
	const CODMAT = 'faprematart.CODMAT';

	
	const UNIMAT = 'faprematart.UNIMAT';

	
	const CANMAT = 'faprematart.CANMAT';

	
	const COSMAT = 'faprematart.COSMAT';

	
	const TOTMAT = 'faprematart.TOTMAT';

	
	const ID = 'faprematart.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refpre', 'Codart', 'Codmat', 'Unimat', 'Canmat', 'Cosmat', 'Totmat', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FaprematartPeer::REFPRE, FaprematartPeer::CODART, FaprematartPeer::CODMAT, FaprematartPeer::UNIMAT, FaprematartPeer::CANMAT, FaprematartPeer::COSMAT, FaprematartPeer::TOTMAT, FaprematartPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refpre', 'codart', 'codmat', 'unimat', 'canmat', 'cosmat', 'totmat', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refpre' => 0, 'Codart' => 1, 'Codmat' => 2, 'Unimat' => 3, 'Canmat' => 4, 'Cosmat' => 5, 'Totmat' => 6, 'Id' => 7, ),
		BasePeer::TYPE_COLNAME => array (FaprematartPeer::REFPRE => 0, FaprematartPeer::CODART => 1, FaprematartPeer::CODMAT => 2, FaprematartPeer::UNIMAT => 3, FaprematartPeer::CANMAT => 4, FaprematartPeer::COSMAT => 5, FaprematartPeer::TOTMAT => 6, FaprematartPeer::ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('refpre' => 0, 'codart' => 1, 'codmat' => 2, 'unimat' => 3, 'canmat' => 4, 'cosmat' => 5, 'totmat' => 6, 'id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/facturacion/map/FaprematartMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.facturacion.map.FaprematartMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FaprematartPeer::getTableMap();
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
		return str_replace(FaprematartPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FaprematartPeer::REFPRE);

		$criteria->addSelectColumn(FaprematartPeer::CODART);

		$criteria->addSelectColumn(FaprematartPeer::CODMAT);

		$criteria->addSelectColumn(FaprematartPeer::UNIMAT);

		$criteria->addSelectColumn(FaprematartPeer::CANMAT);

		$criteria->addSelectColumn(FaprematartPeer::COSMAT);

		$criteria->addSelectColumn(FaprematartPeer::TOTMAT);

		$criteria->addSelectColumn(FaprematartPeer::ID);

	}

	const COUNT = 'COUNT(faprematart.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT faprematart.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FaprematartPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FaprematartPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FaprematartPeer::doSelectRS($criteria, $con);
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
		$objects = FaprematartPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FaprematartPeer::populateObjects(FaprematartPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FaprematartPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FaprematartPeer::getOMClass();
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
		return FaprematartPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FaprematartPeer::ID); 

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
			$comparison = $criteria->getComparison(FaprematartPeer::ID);
			$selectCriteria->add(FaprematartPeer::ID, $criteria->remove(FaprematartPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FaprematartPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FaprematartPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Faprematart) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FaprematartPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Faprematart $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FaprematartPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FaprematartPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FaprematartPeer::DATABASE_NAME, FaprematartPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FaprematartPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FaprematartPeer::DATABASE_NAME);

		$criteria->add(FaprematartPeer::ID, $pk);


		$v = FaprematartPeer::doSelect($criteria, $con);

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
			$criteria->add(FaprematartPeer::ID, $pks, Criteria::IN);
			$objs = FaprematartPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFaprematartPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/facturacion/map/FaprematartMapBuilder.php';
	Propel::registerMapBuilder('lib.model.facturacion.map.FaprematartMapBuilder');
}
