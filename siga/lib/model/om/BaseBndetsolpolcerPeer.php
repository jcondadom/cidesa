<?php


abstract class BaseBndetsolpolcerPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'bndetsolpolcer';

	
	const CLASS_DEFAULT = 'lib.model.Bndetsolpolcer';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMSOL = 'bndetsolpolcer.NUMSOL';

	
	const CODACT = 'bndetsolpolcer.CODACT';

	
	const CODMUE = 'bndetsolpolcer.CODMUE';

	
	const MONPRI = 'bndetsolpolcer.MONPRI';

	
	const NUMDEP = 'bndetsolpolcer.NUMDEP';

	
	const MONDEP = 'bndetsolpolcer.MONDEP';

	
	const ID = 'bndetsolpolcer.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numsol', 'Codact', 'Codmue', 'Monpri', 'Numdep', 'Mondep', 'Id', ),
		BasePeer::TYPE_COLNAME => array (BndetsolpolcerPeer::NUMSOL, BndetsolpolcerPeer::CODACT, BndetsolpolcerPeer::CODMUE, BndetsolpolcerPeer::MONPRI, BndetsolpolcerPeer::NUMDEP, BndetsolpolcerPeer::MONDEP, BndetsolpolcerPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numsol', 'codact', 'codmue', 'monpri', 'numdep', 'mondep', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numsol' => 0, 'Codact' => 1, 'Codmue' => 2, 'Monpri' => 3, 'Numdep' => 4, 'Mondep' => 5, 'Id' => 6, ),
		BasePeer::TYPE_COLNAME => array (BndetsolpolcerPeer::NUMSOL => 0, BndetsolpolcerPeer::CODACT => 1, BndetsolpolcerPeer::CODMUE => 2, BndetsolpolcerPeer::MONPRI => 3, BndetsolpolcerPeer::NUMDEP => 4, BndetsolpolcerPeer::MONDEP => 5, BndetsolpolcerPeer::ID => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('numsol' => 0, 'codact' => 1, 'codmue' => 2, 'monpri' => 3, 'numdep' => 4, 'mondep' => 5, 'id' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/BndetsolpolcerMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.BndetsolpolcerMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = BndetsolpolcerPeer::getTableMap();
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
		return str_replace(BndetsolpolcerPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(BndetsolpolcerPeer::NUMSOL);

		$criteria->addSelectColumn(BndetsolpolcerPeer::CODACT);

		$criteria->addSelectColumn(BndetsolpolcerPeer::CODMUE);

		$criteria->addSelectColumn(BndetsolpolcerPeer::MONPRI);

		$criteria->addSelectColumn(BndetsolpolcerPeer::NUMDEP);

		$criteria->addSelectColumn(BndetsolpolcerPeer::MONDEP);

		$criteria->addSelectColumn(BndetsolpolcerPeer::ID);

	}

	const COUNT = 'COUNT(bndetsolpolcer.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT bndetsolpolcer.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BndetsolpolcerPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BndetsolpolcerPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = BndetsolpolcerPeer::doSelectRS($criteria, $con);
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
		$objects = BndetsolpolcerPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return BndetsolpolcerPeer::populateObjects(BndetsolpolcerPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			BndetsolpolcerPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = BndetsolpolcerPeer::getOMClass();
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
		return BndetsolpolcerPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(BndetsolpolcerPeer::ID); 

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
			$comparison = $criteria->getComparison(BndetsolpolcerPeer::ID);
			$selectCriteria->add(BndetsolpolcerPeer::ID, $criteria->remove(BndetsolpolcerPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(BndetsolpolcerPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(BndetsolpolcerPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Bndetsolpolcer) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(BndetsolpolcerPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Bndetsolpolcer $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(BndetsolpolcerPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(BndetsolpolcerPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(BndetsolpolcerPeer::DATABASE_NAME, BndetsolpolcerPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = BndetsolpolcerPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(BndetsolpolcerPeer::DATABASE_NAME);

		$criteria->add(BndetsolpolcerPeer::ID, $pk);


		$v = BndetsolpolcerPeer::doSelect($criteria, $con);

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
			$criteria->add(BndetsolpolcerPeer::ID, $pks, Criteria::IN);
			$objs = BndetsolpolcerPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseBndetsolpolcerPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/BndetsolpolcerMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.BndetsolpolcerMapBuilder');
}
