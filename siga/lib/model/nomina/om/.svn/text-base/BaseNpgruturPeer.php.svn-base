<?php


abstract class BaseNpgruturPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npgrutur';

	
	const CLASS_DEFAULT = 'lib.model.nomina.Npgrutur';

	
	const NUM_COLUMNS = 20;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODTUR = 'npgrutur.CODTUR';

	
	const CODNOM = 'npgrutur.CODNOM';

	
	const FECINI = 'npgrutur.FECINI';

	
	const FECFIN = 'npgrutur.FECFIN';

	
	const CODGRU = 'npgrutur.CODGRU';

	
	const FECLUN = 'npgrutur.FECLUN';

	
	const JORLUN = 'npgrutur.JORLUN';

	
	const FECMAR = 'npgrutur.FECMAR';

	
	const JORMAR = 'npgrutur.JORMAR';

	
	const FECMIE = 'npgrutur.FECMIE';

	
	const JORMIE = 'npgrutur.JORMIE';

	
	const FECJUE = 'npgrutur.FECJUE';

	
	const JORJUE = 'npgrutur.JORJUE';

	
	const FECVIE = 'npgrutur.FECVIE';

	
	const JORVIE = 'npgrutur.JORVIE';

	
	const FECSAB = 'npgrutur.FECSAB';

	
	const JORSAB = 'npgrutur.JORSAB';

	
	const FECDOM = 'npgrutur.FECDOM';

	
	const JORDOM = 'npgrutur.JORDOM';

	
	const ID = 'npgrutur.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codtur', 'Codnom', 'Fecini', 'Fecfin', 'Codgru', 'Feclun', 'Jorlun', 'Fecmar', 'Jormar', 'Fecmie', 'Jormie', 'Fecjue', 'Jorjue', 'Fecvie', 'Jorvie', 'Fecsab', 'Jorsab', 'Fecdom', 'Jordom', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpgruturPeer::CODTUR, NpgruturPeer::CODNOM, NpgruturPeer::FECINI, NpgruturPeer::FECFIN, NpgruturPeer::CODGRU, NpgruturPeer::FECLUN, NpgruturPeer::JORLUN, NpgruturPeer::FECMAR, NpgruturPeer::JORMAR, NpgruturPeer::FECMIE, NpgruturPeer::JORMIE, NpgruturPeer::FECJUE, NpgruturPeer::JORJUE, NpgruturPeer::FECVIE, NpgruturPeer::JORVIE, NpgruturPeer::FECSAB, NpgruturPeer::JORSAB, NpgruturPeer::FECDOM, NpgruturPeer::JORDOM, NpgruturPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codtur', 'codnom', 'fecini', 'fecfin', 'codgru', 'feclun', 'jorlun', 'fecmar', 'jormar', 'fecmie', 'jormie', 'fecjue', 'jorjue', 'fecvie', 'jorvie', 'fecsab', 'jorsab', 'fecdom', 'jordom', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codtur' => 0, 'Codnom' => 1, 'Fecini' => 2, 'Fecfin' => 3, 'Codgru' => 4, 'Feclun' => 5, 'Jorlun' => 6, 'Fecmar' => 7, 'Jormar' => 8, 'Fecmie' => 9, 'Jormie' => 10, 'Fecjue' => 11, 'Jorjue' => 12, 'Fecvie' => 13, 'Jorvie' => 14, 'Fecsab' => 15, 'Jorsab' => 16, 'Fecdom' => 17, 'Jordom' => 18, 'Id' => 19, ),
		BasePeer::TYPE_COLNAME => array (NpgruturPeer::CODTUR => 0, NpgruturPeer::CODNOM => 1, NpgruturPeer::FECINI => 2, NpgruturPeer::FECFIN => 3, NpgruturPeer::CODGRU => 4, NpgruturPeer::FECLUN => 5, NpgruturPeer::JORLUN => 6, NpgruturPeer::FECMAR => 7, NpgruturPeer::JORMAR => 8, NpgruturPeer::FECMIE => 9, NpgruturPeer::JORMIE => 10, NpgruturPeer::FECJUE => 11, NpgruturPeer::JORJUE => 12, NpgruturPeer::FECVIE => 13, NpgruturPeer::JORVIE => 14, NpgruturPeer::FECSAB => 15, NpgruturPeer::JORSAB => 16, NpgruturPeer::FECDOM => 17, NpgruturPeer::JORDOM => 18, NpgruturPeer::ID => 19, ),
		BasePeer::TYPE_FIELDNAME => array ('codtur' => 0, 'codnom' => 1, 'fecini' => 2, 'fecfin' => 3, 'codgru' => 4, 'feclun' => 5, 'jorlun' => 6, 'fecmar' => 7, 'jormar' => 8, 'fecmie' => 9, 'jormie' => 10, 'fecjue' => 11, 'jorjue' => 12, 'fecvie' => 13, 'jorvie' => 14, 'fecsab' => 15, 'jorsab' => 16, 'fecdom' => 17, 'jordom' => 18, 'id' => 19, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NpgruturMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NpgruturMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpgruturPeer::getTableMap();
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
		return str_replace(NpgruturPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpgruturPeer::CODTUR);

		$criteria->addSelectColumn(NpgruturPeer::CODNOM);

		$criteria->addSelectColumn(NpgruturPeer::FECINI);

		$criteria->addSelectColumn(NpgruturPeer::FECFIN);

		$criteria->addSelectColumn(NpgruturPeer::CODGRU);

		$criteria->addSelectColumn(NpgruturPeer::FECLUN);

		$criteria->addSelectColumn(NpgruturPeer::JORLUN);

		$criteria->addSelectColumn(NpgruturPeer::FECMAR);

		$criteria->addSelectColumn(NpgruturPeer::JORMAR);

		$criteria->addSelectColumn(NpgruturPeer::FECMIE);

		$criteria->addSelectColumn(NpgruturPeer::JORMIE);

		$criteria->addSelectColumn(NpgruturPeer::FECJUE);

		$criteria->addSelectColumn(NpgruturPeer::JORJUE);

		$criteria->addSelectColumn(NpgruturPeer::FECVIE);

		$criteria->addSelectColumn(NpgruturPeer::JORVIE);

		$criteria->addSelectColumn(NpgruturPeer::FECSAB);

		$criteria->addSelectColumn(NpgruturPeer::JORSAB);

		$criteria->addSelectColumn(NpgruturPeer::FECDOM);

		$criteria->addSelectColumn(NpgruturPeer::JORDOM);

		$criteria->addSelectColumn(NpgruturPeer::ID);

	}

	const COUNT = 'COUNT(npgrutur.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npgrutur.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpgruturPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpgruturPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpgruturPeer::doSelectRS($criteria, $con);
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
		$objects = NpgruturPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpgruturPeer::populateObjects(NpgruturPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpgruturPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpgruturPeer::getOMClass();
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
		return NpgruturPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpgruturPeer::ID); 

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
			$comparison = $criteria->getComparison(NpgruturPeer::ID);
			$selectCriteria->add(NpgruturPeer::ID, $criteria->remove(NpgruturPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpgruturPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpgruturPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npgrutur) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpgruturPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npgrutur $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpgruturPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpgruturPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpgruturPeer::DATABASE_NAME, NpgruturPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpgruturPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpgruturPeer::DATABASE_NAME);

		$criteria->add(NpgruturPeer::ID, $pk);


		$v = NpgruturPeer::doSelect($criteria, $con);

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
			$criteria->add(NpgruturPeer::ID, $pks, Criteria::IN);
			$objs = NpgruturPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpgruturPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NpgruturMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NpgruturMapBuilder');
}
