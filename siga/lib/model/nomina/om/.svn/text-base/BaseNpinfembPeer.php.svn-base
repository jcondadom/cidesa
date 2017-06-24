<?php


abstract class BaseNpinfembPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npinfemb';

	
	const CLASS_DEFAULT = 'lib.model.nomina.Npinfemb';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMP = 'npinfemb.CODEMP';

	
	const FECEMB = 'npinfemb.FECEMB';

	
	const TRIBEM = 'npinfemb.TRIBEM';

	
	const MOTEMB = 'npinfemb.MOTEMB';

	
	const BENEMB = 'npinfemb.BENEMB';

	
	const MONEMB = 'npinfemb.MONEMB';

	
	const OBSERV = 'npinfemb.OBSERV';

	
	const ID = 'npinfemb.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp', 'Fecemb', 'Tribem', 'Motemb', 'Benemb', 'Monemb', 'Observ', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpinfembPeer::CODEMP, NpinfembPeer::FECEMB, NpinfembPeer::TRIBEM, NpinfembPeer::MOTEMB, NpinfembPeer::BENEMB, NpinfembPeer::MONEMB, NpinfembPeer::OBSERV, NpinfembPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp', 'fecemb', 'tribem', 'motemb', 'benemb', 'monemb', 'observ', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp' => 0, 'Fecemb' => 1, 'Tribem' => 2, 'Motemb' => 3, 'Benemb' => 4, 'Monemb' => 5, 'Observ' => 6, 'Id' => 7, ),
		BasePeer::TYPE_COLNAME => array (NpinfembPeer::CODEMP => 0, NpinfembPeer::FECEMB => 1, NpinfembPeer::TRIBEM => 2, NpinfembPeer::MOTEMB => 3, NpinfembPeer::BENEMB => 4, NpinfembPeer::MONEMB => 5, NpinfembPeer::OBSERV => 6, NpinfembPeer::ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp' => 0, 'fecemb' => 1, 'tribem' => 2, 'motemb' => 3, 'benemb' => 4, 'monemb' => 5, 'observ' => 6, 'id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NpinfembMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NpinfembMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpinfembPeer::getTableMap();
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
		return str_replace(NpinfembPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpinfembPeer::CODEMP);

		$criteria->addSelectColumn(NpinfembPeer::FECEMB);

		$criteria->addSelectColumn(NpinfembPeer::TRIBEM);

		$criteria->addSelectColumn(NpinfembPeer::MOTEMB);

		$criteria->addSelectColumn(NpinfembPeer::BENEMB);

		$criteria->addSelectColumn(NpinfembPeer::MONEMB);

		$criteria->addSelectColumn(NpinfembPeer::OBSERV);

		$criteria->addSelectColumn(NpinfembPeer::ID);

	}

	const COUNT = 'COUNT(npinfemb.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npinfemb.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpinfembPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpinfembPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpinfembPeer::doSelectRS($criteria, $con);
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
		$objects = NpinfembPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpinfembPeer::populateObjects(NpinfembPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpinfembPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpinfembPeer::getOMClass();
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
		return NpinfembPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpinfembPeer::ID); 

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
			$comparison = $criteria->getComparison(NpinfembPeer::ID);
			$selectCriteria->add(NpinfembPeer::ID, $criteria->remove(NpinfembPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpinfembPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpinfembPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npinfemb) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpinfembPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npinfemb $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpinfembPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpinfembPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpinfembPeer::DATABASE_NAME, NpinfembPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpinfembPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpinfembPeer::DATABASE_NAME);

		$criteria->add(NpinfembPeer::ID, $pk);


		$v = NpinfembPeer::doSelect($criteria, $con);

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
			$criteria->add(NpinfembPeer::ID, $pks, Criteria::IN);
			$objs = NpinfembPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpinfembPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NpinfembMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NpinfembMapBuilder');
}
