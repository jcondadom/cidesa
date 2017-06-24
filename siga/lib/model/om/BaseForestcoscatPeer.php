<?php


abstract class BaseForestcoscatPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'forestcoscat';

	
	const CLASS_DEFAULT = 'lib.model.Forestcoscat';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODCAT = 'forestcoscat.CODCAT';

	
	const CODART = 'forestcoscat.CODART';

	
	const CODPAR = 'forestcoscat.CODPAR';

	
	const CANUNI = 'forestcoscat.CANUNI';

	
	const CANART = 'forestcoscat.CANART';

	
	const MONART = 'forestcoscat.MONART';

	
	const TOTPRE = 'forestcoscat.TOTPRE';

	
	const CODFIN = 'forestcoscat.CODFIN';

	
	const CODTIP = 'forestcoscat.CODTIP';

	
	const OBSERV = 'forestcoscat.OBSERV';

	
	const ID = 'forestcoscat.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codcat', 'Codart', 'Codpar', 'Canuni', 'Canart', 'Monart', 'Totpre', 'Codfin', 'Codtip', 'Observ', 'Id', ),
		BasePeer::TYPE_COLNAME => array (ForestcoscatPeer::CODCAT, ForestcoscatPeer::CODART, ForestcoscatPeer::CODPAR, ForestcoscatPeer::CANUNI, ForestcoscatPeer::CANART, ForestcoscatPeer::MONART, ForestcoscatPeer::TOTPRE, ForestcoscatPeer::CODFIN, ForestcoscatPeer::CODTIP, ForestcoscatPeer::OBSERV, ForestcoscatPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codcat', 'codart', 'codpar', 'canuni', 'canart', 'monart', 'totpre', 'codfin', 'codtip', 'observ', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codcat' => 0, 'Codart' => 1, 'Codpar' => 2, 'Canuni' => 3, 'Canart' => 4, 'Monart' => 5, 'Totpre' => 6, 'Codfin' => 7, 'Codtip' => 8, 'Observ' => 9, 'Id' => 10, ),
		BasePeer::TYPE_COLNAME => array (ForestcoscatPeer::CODCAT => 0, ForestcoscatPeer::CODART => 1, ForestcoscatPeer::CODPAR => 2, ForestcoscatPeer::CANUNI => 3, ForestcoscatPeer::CANART => 4, ForestcoscatPeer::MONART => 5, ForestcoscatPeer::TOTPRE => 6, ForestcoscatPeer::CODFIN => 7, ForestcoscatPeer::CODTIP => 8, ForestcoscatPeer::OBSERV => 9, ForestcoscatPeer::ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('codcat' => 0, 'codart' => 1, 'codpar' => 2, 'canuni' => 3, 'canart' => 4, 'monart' => 5, 'totpre' => 6, 'codfin' => 7, 'codtip' => 8, 'observ' => 9, 'id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ForestcoscatMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ForestcoscatMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ForestcoscatPeer::getTableMap();
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
		return str_replace(ForestcoscatPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ForestcoscatPeer::CODCAT);

		$criteria->addSelectColumn(ForestcoscatPeer::CODART);

		$criteria->addSelectColumn(ForestcoscatPeer::CODPAR);

		$criteria->addSelectColumn(ForestcoscatPeer::CANUNI);

		$criteria->addSelectColumn(ForestcoscatPeer::CANART);

		$criteria->addSelectColumn(ForestcoscatPeer::MONART);

		$criteria->addSelectColumn(ForestcoscatPeer::TOTPRE);

		$criteria->addSelectColumn(ForestcoscatPeer::CODFIN);

		$criteria->addSelectColumn(ForestcoscatPeer::CODTIP);

		$criteria->addSelectColumn(ForestcoscatPeer::OBSERV);

		$criteria->addSelectColumn(ForestcoscatPeer::ID);

	}

	const COUNT = 'COUNT(forestcoscat.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT forestcoscat.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ForestcoscatPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ForestcoscatPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ForestcoscatPeer::doSelectRS($criteria, $con);
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
		$objects = ForestcoscatPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ForestcoscatPeer::populateObjects(ForestcoscatPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ForestcoscatPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ForestcoscatPeer::getOMClass();
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
		return ForestcoscatPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ForestcoscatPeer::ID); 

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
			$comparison = $criteria->getComparison(ForestcoscatPeer::ID);
			$selectCriteria->add(ForestcoscatPeer::ID, $criteria->remove(ForestcoscatPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(ForestcoscatPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ForestcoscatPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Forestcoscat) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ForestcoscatPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Forestcoscat $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ForestcoscatPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ForestcoscatPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ForestcoscatPeer::DATABASE_NAME, ForestcoscatPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ForestcoscatPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ForestcoscatPeer::DATABASE_NAME);

		$criteria->add(ForestcoscatPeer::ID, $pk);


		$v = ForestcoscatPeer::doSelect($criteria, $con);

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
			$criteria->add(ForestcoscatPeer::ID, $pks, Criteria::IN);
			$objs = ForestcoscatPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseForestcoscatPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ForestcoscatMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ForestcoscatMapBuilder');
}
