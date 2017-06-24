<?php


abstract class BaseHcregmedlabPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'hcregmedlab';

	
	const CLASS_DEFAULT = 'lib.model.hcm.Hcregmedlab';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODMEDLAB = 'hcregmedlab.CODMEDLAB';

	
	const NOMMEDLAB = 'hcregmedlab.NOMMEDLAB';

	
	const TIPMEDLAB = 'hcregmedlab.TIPMEDLAB';

	
	const ESPMEDLAB = 'hcregmedlab.ESPMEDLAB';

	
	const DIRMEDLAB = 'hcregmedlab.DIRMEDLAB';

	
	const TELMEDLAB = 'hcregmedlab.TELMEDLAB';

	
	const ID = 'hcregmedlab.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codmedlab', 'Nommedlab', 'Tipmedlab', 'Espmedlab', 'Dirmedlab', 'Telmedlab', 'Id', ),
		BasePeer::TYPE_COLNAME => array (HcregmedlabPeer::CODMEDLAB, HcregmedlabPeer::NOMMEDLAB, HcregmedlabPeer::TIPMEDLAB, HcregmedlabPeer::ESPMEDLAB, HcregmedlabPeer::DIRMEDLAB, HcregmedlabPeer::TELMEDLAB, HcregmedlabPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codmedlab', 'nommedlab', 'tipmedlab', 'espmedlab', 'dirmedlab', 'telmedlab', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codmedlab' => 0, 'Nommedlab' => 1, 'Tipmedlab' => 2, 'Espmedlab' => 3, 'Dirmedlab' => 4, 'Telmedlab' => 5, 'Id' => 6, ),
		BasePeer::TYPE_COLNAME => array (HcregmedlabPeer::CODMEDLAB => 0, HcregmedlabPeer::NOMMEDLAB => 1, HcregmedlabPeer::TIPMEDLAB => 2, HcregmedlabPeer::ESPMEDLAB => 3, HcregmedlabPeer::DIRMEDLAB => 4, HcregmedlabPeer::TELMEDLAB => 5, HcregmedlabPeer::ID => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('codmedlab' => 0, 'nommedlab' => 1, 'tipmedlab' => 2, 'espmedlab' => 3, 'dirmedlab' => 4, 'telmedlab' => 5, 'id' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hcm/map/HcregmedlabMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hcm.map.HcregmedlabMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = HcregmedlabPeer::getTableMap();
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
		return str_replace(HcregmedlabPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(HcregmedlabPeer::CODMEDLAB);

		$criteria->addSelectColumn(HcregmedlabPeer::NOMMEDLAB);

		$criteria->addSelectColumn(HcregmedlabPeer::TIPMEDLAB);

		$criteria->addSelectColumn(HcregmedlabPeer::ESPMEDLAB);

		$criteria->addSelectColumn(HcregmedlabPeer::DIRMEDLAB);

		$criteria->addSelectColumn(HcregmedlabPeer::TELMEDLAB);

		$criteria->addSelectColumn(HcregmedlabPeer::ID);

	}

	const COUNT = 'COUNT(hcregmedlab.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT hcregmedlab.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HcregmedlabPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HcregmedlabPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = HcregmedlabPeer::doSelectRS($criteria, $con);
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
		$objects = HcregmedlabPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return HcregmedlabPeer::populateObjects(HcregmedlabPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			HcregmedlabPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = HcregmedlabPeer::getOMClass();
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
		return HcregmedlabPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(HcregmedlabPeer::ID); 

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
			$comparison = $criteria->getComparison(HcregmedlabPeer::ID);
			$selectCriteria->add(HcregmedlabPeer::ID, $criteria->remove(HcregmedlabPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(HcregmedlabPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(HcregmedlabPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Hcregmedlab) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(HcregmedlabPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Hcregmedlab $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(HcregmedlabPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(HcregmedlabPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(HcregmedlabPeer::DATABASE_NAME, HcregmedlabPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = HcregmedlabPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(HcregmedlabPeer::DATABASE_NAME);

		$criteria->add(HcregmedlabPeer::ID, $pk);


		$v = HcregmedlabPeer::doSelect($criteria, $con);

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
			$criteria->add(HcregmedlabPeer::ID, $pks, Criteria::IN);
			$objs = HcregmedlabPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseHcregmedlabPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hcm/map/HcregmedlabMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hcm.map.HcregmedlabMapBuilder');
}
